<?php
class Mongos
{
	private $_mongo = null;
	private $_db = null;
	private $_conn = null;

	/**
	 * 初始化Mongos
	 */
	public function __construct($config = array())
	{
		$ci =& get_instance();
		$ci->load->config('mongo');
		// $linkstr = $ci->config->item('linkstr');
		$linkstr = $ci->config->item('linkstrbak');

		$dbname = isset($config['db']) && $config['db'] ? $config['db'] : $ci->config->item('dbname');

		$option = array(
			'readPreference' 		=> $ci->config->item('readPreference'),
			'replicaSet'     		=> $ci->config->item('replicaSet')
		);

		try
		{
			// $this->_mongo = new MongoClient($linkstr, $option);
			$this->_mongo = new MongoClient($linkstr);
			// $this->_mongo->setWriteConcern(2, 500);
			$this->_db = $this->_mongo->selectDB($dbname);
		}
		catch (Exception $e)
		{
			die(json_encode(array('code' => 10000, 'msg' => 'MongoDB out of service!')));
		}
	}

	/**
	 * 切换数据表
	 * @param  [type] $table 表名
	 * @return [type]        null
	 */
	private function _connection($table)
	{
		if(strpos($table, '.') !== false)
		{
			$dbTable = explode('.', $table);
			$config['db'] = $dbTable[0];
			$table = $dbTable[1];
			$this->__construct($config);
		}

		$this->_conn = new MongoCollection($this->_db, $table);
	}

	/**
	 * 查询返回一条数据
	 * @param  string $table 表名
	 * @param  array  $where 条件
	 * @param  array  $field 返回的字段
	 * @param  array  $sort  排序条件
	 * @return array         查询结果
	 */
	public function findOne($table, $where = array(), $field = array(), $sort = array())
	{
		$where = $this->_dealMongoCondition($where);

		$this->_connection($table);

		$result = array();
		if(count($sort))
		{
			$data = $this->_conn->find($where, $field)->sort($sort)->skip(0)->limit(1);
			while ($item = $data->getNext())
			{
				$result = $item;
				break;
			}
		}
		else
		{
			$result = $this->_conn->findOne($where, $field);
		}
		isset($result['_id']) && $result['_id'] = $result['_id']->{'$id'};

		return $result;
	}

	/**
	 * 查询返回一条数据
	 * @param  string  $table 表名
	 * @param  array   $where 条件
	 * @param  array   $field 返回的字段
	 * @param  array   $sort  排序条件
	 * @param  integer $p     页码
	 * @param  integer $num   每页条目数
	 * @return array          查询结果
	 */
	public function find($table, $where = array(), $field = array(), $sort = array(), $p = 0, $num = 0)
	{
		$where = $this->_dealMongoCondition($where);

		$this->_connection($table);
		$skip = $p ? ($p - 1) * $num : 0;
		$data = $this->_conn->find($where, $field);
		count($sort) ? $data = $data->sort($sort) : '';
		$skip = intval($skip);

		$num = isset($where['location']['$near']) ? $p * $num : intval($num);

		$p && $num ? $data = $data->skip($skip)->limit($num) : '';

		$result = array();

		try
		{
			while ($item = $data->getNext())
			{
				isset($item['_id']) && $item['_id'] = $item['_id']->{'$id'};
				$result[] = $item;
			}
		}
		catch (Exception $e){}

		return $result;
	}

	/**
	 * 单字段数字自增
	 * @param  string  $table 表名
	 * @param  string  $where 条件
	 * @param  string  $field 自增字段
	 * @param  integer $num   自增数值
	 * @return bool           成功/失败
	 */
	public function inc($table, $where, $field, $num = 1)
	{
		$where = $this->_dealMongoCondition($where);

		$this->_connection($table);
		$result = $this->_conn->update($where, array('$inc' => array($field => $num)));

		return $result['ok'] ? true : false;
	}

	/**
	 * 多字段数字自增
	 * @param  string $table 表名
	 * @param  array  $where 条件
	 * @param  array  $data  字段数值
	 * @return bool          成功/失败
	 */
	public function incs($table, $where, $data)
	{
		$where = $this->_dealMongoCondition($where);

		$this->_connection($table);
		$result = $this->_conn->update($where, array('$inc' => $data));

		return $result['ok'] ? true : false;
	}

	// $groups = array('a', 'b')
	// $fields = array('max' => array(), 'min' => array(), 'first' => array(), 'last|field' => array(), 'sum' => array(), 'num' => array());
	/**
	 * 分组查询
	 * @param  string  $table      表名
	 * @param  array   $groups     分组字段
	 * @param  array   $where      条件
	 * @param  array   $fields     字段
	 * @param  boolean $return_one 是否只返回一条数据
	 * @param  array   $sort       排序条件
	 * @param  integer $p          页码
	 * @param  integer $num        每页条目数
	 * @return array               查询结果
	 */
	public function findGroup($table, $groups, $where = array(), $fields = array('num' => 'num'), $return_one = false, $sort = array(), $p = 0, $num = 0)
	{
		$where = $this->_dealMongoCondition($where);

		$this->_connection($table);
		$group = array();

		foreach($groups as $field)
		{
			$group[$field] = 1;
		}

		// js function
		$reduce = "function (obj, prev){";
		foreach($fields as $k => $v)
		{
			switch($k)
			{
				case 'max':
					# 求最大值
					foreach($v as $i => $j)
					{
						$initial[$j] = 0;
						if(!is_numeric($i))
						{
							$reduce .= "if(prev.{$i} < obj.{$i}){prev.{$j} = obj.{$i}}";
						}
						else
						{
							$reduce .= "if(prev.{$j} < obj.{$j}){prev.{$j} = obj.{$j}}";
						}
					}
					break;
				case 'min':
					# 求最小值
					foreach($v as $i => $j)
					{
						$initial[$j] = 0;
						if(!is_numeric($i))
						{
							$reduce .= "if(prev.{$i} > obj.{$i}){prev.{$j} = obj.{$i}}";
						}
						else
						{
							$reduce .= "if(prev.{$j} > obj.{$j}){prev.{$j} = obj.{$j}}";
						}
					}
					break;
				case 'first':
					# 求第一个值
					foreach($v as $j)
					{
						$reduce .= "prev.{$j} = obj.{$j};";
					}
					break;
				case 'last':
				case 'field':
					# 求最后一个值
					foreach($v as $j)
					{
						$initial[$j] = '';
						$reduce .= "prev.{$j} = obj.{$j};";
					}
					break;
				case 'sum':
					# 求和
					foreach($v as $i => $j)
					{
						$initial[$j] = 0;
						if(!is_numeric($i))
						{
							$reduce .= "prev.{$j} += obj.{$i};";
						}
						else
						{
							$reduce .= "prev.{$j} += obj.{$j};";
						}
					}
					break;
				case 'num':
					# 计数
					$initial[$v] = 0;
					$reduce .= "prev.{$v} ++;";
					break;
				case 'strmax':
					# 求string的最大值
					foreach($v as $i => $j)
					{
						$initial[$j] = '';
						if(!is_numeric($i))
						{
							$reduce .= "if(prev.{$i} < obj.{$i}){prev.{$j} = obj.{$i}}";
						}
						else
						{
							$reduce .= "if(prev.{$j} < obj.{$j}){prev.{$j} = obj.{$j}}";
						}
					}
					break;
				case 'strmin':
					# 求string的最小值
					foreach($v as $i => $j)
					{
						$initial[$j] = '';
						if(!is_numeric($i))
						{
							$reduce .= "if(prev.{$i} > obj.{$i}){prev.{$j} = obj.{$i}}";
						}
						else
						{
							$reduce .= "if(prev.{$j} > obj.{$j}){prev.{$j} = obj.{$j}}";
						}
					}
					break;
				case 'extra':
					# 额外要显示的字段
					foreach($v as $ext)
					{
						$reduce .= "prev.{$ext} = obj.{$ext};";
					}
					break;
				default:
					# code...
					break;
			}
		}
		$reduce .= '}';

		$where = array('condition' => $where);

		$data = $this->_conn->group($group, $initial, $reduce, $where);

		$result = array();
		if($data['ok'] == 1)
		{
			$result = $return_one === true ? (isset($data['retval'][0]) ? $data['retval'][0] : array())  : $data['retval'];
		}

		if($return_one === false)
		{
			$result = $this->_sort($result, $sort);
			$result = $this->_limit($result, $p, $num);
		}

		return $result;
	}

	/**
	 * 插入一条数据
	 * @param  string $table 表名
	 * @param  array  $data  需要插入的数据
	 * @return string        插入的_id
	 */
	public function insert($table, $data)
	{
		if(isset($data[0]))
		{
			$ret = $this->_batchInsert($table, $data);
		}
		else
		{
			$this->_connection($table);
			$this->_conn->insert($data);
			$ret = isset($data['_id']->{'$id'}) ? $data['_id']->{'$id'} : false;
		}
		return $ret;
	}

	/**
	 * 更新数据
	 * @param  string  $table 表名
	 * @param  array   $data  需要更新的数据
	 * @param  array   $where 更新条件
	 * @param  boolean $tag   没有更新数据时，是否插入
	 * @return bool           成功/失败
	 */
	public function update($table, $data, $where = array(), $tag = false)
	{
		$result = true;
		$this->_connection($table);
		if($this->count($table, $where))
		{
			$where = $this->_dealMongoCondition($where);

			$result = $this->_conn->update($where, array('$set' => $data), array('multiple' => true));
			$result = $result['ok'] ? true : false;
		}
		else
		{
			if($tag === true)
			{
				if($this->_conn->insert(array_merge($where, $data)))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				$result = true;
			}
		}

		return $result;
	}

	/**
	 * 计算条目数
	 * @param  string $table 表名
	 * @param  array  $where 计算条件
	 * @return integer       条目数
	 */
	public function count($table, $where = array())
	{
		$where = $this->_dealMongoCondition($where);
		$this->_connection($table);
		return $this->_conn->count($where);
	}

	/**
	 * 删除数据
	 * @param  string $table 表名
	 * @param  array  $where 删除条件
	 * @return bool          成功/失败
	 */
	public function delete($table, $where = array())
	{
		$result = true;
		if($this->count($table, $where))
		{
			$where = $this->_dealMongoCondition($where);
			$this->_connection($table);
			$result = $this->_conn->remove($where);
			$result = $result['ok'] ? true : false;
		}
		return $result;
	}

	public function findAndModify($table, $where, $update, $fields, $options)
	{
		$this->_connection($table);
		$fields = $fields && is_array($fields) ? $fields : null;
		if($data = $this->_conn->findAndModify($where, $update, $fields, $options))
		{
			$data['_id'] = $data['_id']->{'$id'};
		}
		return $data;
	}

	/**
	 * 销毁mongo连接
	 */
	public function __destruct()
	{
		if($this->_mongo)
		{
			$this->_mongo->close(true);
		}
	}

	private function _batchInsert($table, $data)
	{
		$this->_connection($table);
		$this->_conn->batchInsert($data);
		return true;
	}

	/**
	 * findGroup方法排序
	 * @param  array $data 排序数组
	 * @param  array $sort 排序方式
	 * @return array       排序后的数组
	 */
	private function _sort($data, $sort = array())
	{
		if(count($sort) == 1)
		{
			foreach ($sort as $k => $v)
			{
				if($v == 1)
				{
					$data = _array_sorts($data, $k, 'asc');
				}
				else
				{
					$data = _array_sorts($data, $k, 'desc');
				}
			}
		}
		else if($sort)
		{
			$i = 0;
			$key1 = $key2 = '';
			$sort1 = $sort2 = SORT_DESC;
			foreach($sort as $k => $v)
			{
				$key1 = $key2;
				$key2 = $k;

				$sort1 = $sort2;
				if($v == 1)
				{
					$sort2 = SORT_ASC;
				}
				if($i == 1)
				{
					break;
				}
				$i ++;
			}

			$data = $this->_array_multisort($data, $key1, $sort1, $key2, $sort2);
		}
		return $data;
	}

	/**
	 * 处理MongoId
	 * @param  array  $where [description]
	 * @return array         [description]
	 */
	private function _dealMongoCondition($where)
	{
		if(isset($where['_id']))
		{
			if(is_array($where['_id']))
			{
				foreach($where['_id'] as $i => $v)
				{
					if(is_array($v))
					{
						foreach($v as $ii => $vv)
						{
							$where['_id'][$i][$ii] = $this->_addMongoId($vv);
						}
					}
					else
					{
						$where['_id'][$i] = $this->_addMongoId($v);
					}
				}
			}
			else
			{
				$where['_id'] = $this->_addMongoId($where['_id']);
			}
		}
		return $where;
	}

	/**
	 * 处理MongoId
	 * @param  string  $id MongoId
	 * @return MongoId     MongoId
	 */
	private function _addMongoId($id = '')
	{
		return strlen($id) == 24 ? new MongoId($id) : '';
	}

	/**
	 * 数组分页
	 * @param  array   $data 数组
	 * @param  integer $p    页码
	 * @param  integer $num  每页条目数
	 * @return array         相应页码的数据
	 */
	private function _limit($data, $p, $num)
	{
		$res = array();
		if($p && $num)
		{
			$skip = ($p - 1) * $num;
			if($skip < count($data) - 1)
			{
				$res = array_slice($data, $skip, $num);
			}
		}
		else
		{
			$res = $data;
		}
		return $res;
	}

	/**
	 * 二维数组排序
	 * @param  array  $arr   数组
	 * @param  string $key1  排序key1
	 * @param  [type] $sort1 排序方式1
	 * @param  string $key2  排序key2
	 * @param  [type] $sort2 排序方式2
	 * @return array         排序后的数组
	 */
	private function _array_multisort($arr, $key1, $sort1, $key2, $sort2)
	{
	    $data1 = $data2 = array();
	    foreach($arr as $key => $v)
	    {
	        $data1[$key] = $v[$key1];
	        $data2[$key] = $v[$key2];
	    }
	    array_multisort($data1, $sort1, $data2, $sort2, $arr);
	    return $arr;
	}
}
