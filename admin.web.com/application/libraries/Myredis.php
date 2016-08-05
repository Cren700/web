<?php
class Myredis
{
	private $redis = null;

	public function __construct()
	{
		$ci =& get_instance();
		$ci->load->config('redis');
		$server = $ci->config->item('host1');
		$port = $ci->config->item('port1');
		$timeout = $ci->config->item('timeout');

		$this->redis = new Redis();
		try {
			$this->redis->connect($server, $port);
		} catch (Exception $e) {
		}
	}

    public function keys( $key_pattern )
    {
        if ( !$this->redis ) {
            return false;
        }

        return $this->redis->keys( $key_pattern );
    }

    public function expire($key, $expire_t )
    {
        if (!$this->redis) {
            return false;
        }

        return $this->redis->expire($key, $expire_t );
    }

	public function llen($key)
	{
		if (!$this->redis) {
			return 0;
		}

		return $this->redis->llen($key);
	}

	public function set($key, $value, $time_out = 0)
	{
		if (!$this->redis) {
			return false;
		}

		$value = $this->_encode($value);
		$retRes = $this->redis->set($key, $value);
		if ($time_out > 0) {
			$this->redis->setTimeout($key, $time_out);
		}
		return $retRes;
	}

	public function get($key)
	{
		if (!$this->redis) {
			return false;
		}

		$value = $this->redis->get($key);
		return $this->_decode($value);
	}

	public function delete($key)
	{
		if (!$this->redis) {
			return false;
		}

		return $this->redis->delete($key);
	}

	public function flushAll()
	{
		if (!$this->redis) {
			return false;
		}

		return $this->redis->flushAll();
	}

	public function push($key, $value, $right = true)
	{
		if(!$this->redis)
		{
			return false;
		}

		return $right ? $this->redis->rPush($key, $value) : $this->redis->lPush($key, $value);
	}

	public function lSize($key)
	{
		if(!$this->redis)
		{
			return false;
		}

		return $this->redis->lSize($key);
	}

	public function lRange($key, $start = 0, $end = -1)
	{
		if(!$this->redis)
		{
			return false;
		}

		return $this->redis->lRange($key, $start, $end);
	}

	public function pop($key, $left = false)
	{
		if(!$this->redis)
		{
			return false;
		}

		return $left ? $this->redis->lPop($key) : $this->redis->rPop($key);
	}

	public function increment($key)
	{
		if (!$this->redis) {
			return false;
		}

		return $this->redis->incr($key);
	}

	public function decrement($key)
	{
		if (!$this->redis) {
			return false;
		}

		return $this->redis->decr($key);
	}

	public function exists($key)
	{
		if (!$this->redis) {
			return false;
		}

		return $this->redis->exists($key);
	}

	public function hset($key, $field, $value)
	{
		if (!$this->redis) {
			return false;
		}
		$value = $this->_encode($value);
		return $this->redis->hset($key, $field, $value);
	}

	public function hget($key, $field)
	{
		if (!$this->redis) {
			return false;
		}

		$value = $this->redis->hget($key, $field);
		return $this->_decode($value);
	}

	public function hdel($key, $field)
	{
		if (!$this->redis) {
			return false;
		}

		$value = $this->redis->hdel($key, $field);
		return $this->_decode($value);
	}

	public function hkeys($key)
	{
		if (!$this->redis) {
			return false;
		}

		$value = $this->redis->hkeys($key);
		return $this->_decode($value);
	}

	public function hgetall($key)
	{
		if (!$this->redis) {
			return false;
		}
		return $this->redis->hgetall($key);
	}

	public function sadd( $key, $value )
	{
		if ( !$this->redis ) { return false; }

		$value = $this->_encode( $value );
		return $this->redis->sadd( $key, $value );
	}

	public function srem( $key, $value )
	{
		if ( !$this->redis ) { return false; }

		$value = $this->_encode( $value );
		return $this->redis->srem( $key, $value );
	}

	public function sismember( $key, $value )
	{
		if ( !$this->redis ) { return false; }

		$value = $this->_encode( $value );
		return $this->redis->sismember( $key, $value );
	}

    public function smembers( $key )
    {
        if ( !$this->redis ) { return array(); }
            return $this->redis->smembers( $key);
    }

	public function ltrim( $key, $start, $stop )
	{
		if ( !$this->redis ) { return 0; }
		return $this->redis->ltrim( $key, $start, $stop );
	}

	private function _encode($value)
	{
		return json_encode($value, JSON_UNESCAPED_UNICODE);
	}

	private function _decode($value)
	{
		return $value ? json_decode($value, true) : $value;
	}
}

?>
