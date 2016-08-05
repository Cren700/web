<?php

class Opcache
{
	protected $cache_conf;
	protected static $instance = null;
	function __construct(){
		$CI =& get_instance();
		$this->cache_conf = $CI->config->item('cache_conf');
	}

	private function get_instance_of($type)
	{
        if(isset(self::$instance[$type]) &&  (self::$instance[$type] != null) && !empty(self::$instance[$type]->getStats())){
			return self::$instance[$type];
		}

		$cache = new Memcache();
		self::$instance[$type] = $cache;
		$server_list = $this->cache_conf['server_list'];
		foreach($this->cache_conf['cache_list'][$type]['server_id'] as $server_id)
		{
			$cache->addServer($server_list[$server_id]['host'], $server_list[$server_id]['port']);
		}

		return $cache;
	}

	function set($type, $key, $val)
	{
		$cache = $this->get_instance_of($type);
		$conf = $this->cache_conf['cache_list'][$type];
		$new_key = $type . "-" . $key . '-' . $conf['version'];
		return $cache->set($new_key, $val, 0, $conf['timeout']);
	}

	function get($type, $key)
	{
		$cache = $this->get_instance_of($type);
		$conf = $this->cache_conf['cache_list'][$type];

		$new_key = $type . "-" . $key . '-' . $conf['version'];
		return $cache->get($new_key);
	}

	function del($type, $key)
	{
		$cache = $this->get_instance_of($type);
		$conf = $this->cache_conf['cache_list'][$type];

		$new_key = $type . "-" . $key . '-' . $conf['version'];
		return $cache->delete($new_key);
	}
}
