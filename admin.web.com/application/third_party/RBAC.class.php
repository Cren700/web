<?php
/**
 * 基于角色的数据库方式验证类
 */
class RBAC
{
    // 权限认证的过滤器方法
    static public function AccessDecision($modelName, $actionName)
    {
        $modelName = strtolower($modelName);
        $actionName = strtolower($actionName);

        // 检查是否需要认证
        if(self::checkAccess($modelName, $actionName))
        {
            // 存在认证识别号，则进行进一步的访问决策
            $accessGuid = md5('application'.$modelName.$actionName);
            if(empty($_SESSION['AUTH']['ADMIN_AUTH_KEY']))
            {
                if($_SESSION['AUTH']['USER_AUTH_TYPE'] == 2)
                {
                    // 加强验证和即时验证模式 更加安全 后台权限修改可以即时生效
                    // 通过数据库进行访问检查
                    $accessList = self::getAccessList();
                }
                else
                {
                    // 如果是管理员或者当前操作已经认证过，无需再次认证
                    if(isset($_SESSION['AUTH_LIST'][$accessGuid]) && $_SESSION['AUTH_LIST'][$accessGuid])
                    {
                        return true;
                    }
                    // 登录验证模式，比较登录后保存的权限访问列表
                    if(!$accessList = $_SESSION['AUTH']['ACCESS_LIST'])
                    {
                        $accessList = self::getAccessList();
                        $_SESSION['AUTH']['ACCESS_LIST'] = $accessList;
                    }
                }
                // 判断是否为组件化模式，如果是，验证其全模块名
                if(isset($accessList[$modelName]) && in_array($actionName, $accessList[$modelName]))
                {
                    $_SESSION['AUTH']['AUTH_LIST'][$accessGuid] = 1;
                    return true;
                }
                else
                {
                    $_SESSION['AUTH']['AUTH_LIST'][$accessGuid] = 0;
                    return false;
                }
            }
            else
            {
                // 管理员无需认证
                return true;
            }
        }
        return true;
    }

    // 检查当前操作是否需要认证
    static function checkAccess($modelName, $actionName)
    {
        $noAuth['member'] = array('pwd', 'pwdhandle', 'addhandle');
        $noAuth['software'] = array('addhandle');
        $noAuth['channel'] = array('addhandle');

        // 如果项目要求认证，并且当前模块需要认证，则进行权限认证
        if($_SESSION['AUTH']['USER_AUTH_ON'] && $_SESSION['AUTH']['AUTH_ID'] != 1 && (!isset($noAuth[$modelName]) || !in_array($actionName, $noAuth[$modelName])))
        {
            // 无需认证的模块
            $_model = array(); // NOT_AUTH_MODULE;

            // 检查当前模块是否需要认证
            if($_model && isset($_model[$modelName]) && $_model[$modelName] && in_array($actionName, $_model[$modelName]))
            {
                return false;
            }
            return true;
        }

        return false;
    }

    /**
     * 取得当前认证号的所有权限列表
     * @param integer $authId 用户ID
     * @access public
     */
    static public function getAccessList()
    {
        $role_id = $_SESSION['AUTH']['AUTH_ID'];
        $sql = "SELECT n.id, n.name, n.pid FROM node AS n, access AS a WHERE a.node_id = n.id AND n.status = 1 AND a.role_id = '{$role_id}' ORDER BY n.sort ASC";
        $ci =& get_instance();
        $query = $ci->db->query($sql);
        $access = $query->result_array();
        $access = self::node_merge($access);

        $tmp = array();
        foreach($access as $acc)
        {
            $tmp[$acc['name']] = self::array_columns($acc['child'], 'name');
        }

        return $tmp;
    }

    static private function node_merge($node, $pid = 0)
    {
        $arr = array();
        foreach($node as $v)
        {
            if($v['pid'] == $pid)
            {
                $v['child'] = self::node_merge($node, $v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }

    static private function array_columns($input, $columnKey, $indexKey = null)
    {
        $columnKeyIsNumber = (is_numeric($columnKey)) ? true : false;
        $indexKeyIsNull = (is_null($indexKey)) ? true : false;
        $indexKeyIsNumber = (is_numeric($indexKey)) ? true : false;
        $result = array();
        foreach ($input as $key => $row)
        {
            if ($columnKeyIsNumber)
            {
                $tmp = array_slice($row, $columnKey, 1);
                $tmp = (is_array($tmp) && !empty($tmp)) ? current($tmp) : null;
            }
            else
            {
                $tmp = isset($row[$columnKey]) ? $row[$columnKey] : null;
            }
            if (!$indexKeyIsNull)
            {
                if ($indexKeyIsNumber)
                {
                    $key = array_slice($row, $indexKey, 1);
                    $key = (is_array($key) && !empty($key)) ? current($key) : null;
                    $key = is_null($key) ? 0 : $key;
                }
                else
                {
                    $key = isset($row[$indexKey]) ? $row[$indexKey] : 0;
                }
            }
            if ($tmp != '')
            {
                $result[$key] = $tmp;
            }
        }
        return $result;
    }
}