<?php

/**
 * Session.php
 * Author   : cren
 * Date     : 16/7/17
 * Time     : 上午12:23
 */
class Session
{
    protected $sess_namespace = '';
    protected $store = array();

    public function __construct($config = array())
    {
        $this->ci = get_instance();
        $this->initialize($config);
    }

    private function initialize()
    {
        $this->ci->load->config('session');

        $this->sess_namespace = $this->ci->config->item('sess_namespace');

        if (!isset($_SESSION))
        {
            session_start();
        }

        if (isset($_SESSION[$this->sess_namespace]))
        {
            $this->store = $_SESSION[$this->sess_namespace];
        }

        $this->sess_create();
    }

    public function sess_create()
    {
        $_SESSION[$this->sess_namespace]['session_id'] = session_id();
        $this->store = $_SESSION[$this->sess_namespace];
    }

    public function userdata($value)
    {
        if(isset($this->store[$value]))
        {
            return $this->store[$value];
        }
        else
        {
            return FALSE;
        }
    }

    public function set_userdata($data = array(), $value = '')
    {
        if (is_string($data))
        {
            $data = array($data => $value);
        }
        foreach ($data as $key => $val)
        {
            $this->store[$key] = $val;
        }
        $_SESSION[$this->sess_namespace] = $this->store;
    }

    /**
     * remove array value for specific user data element
     *
     * @access public
     * @param array list of data to be removed
     * @return void
     */
    public function unset_userdata($data = array())
    {
        if (is_string($data))
        {
            $data = array($data => '');
        }

        if (count($data) > 0)
        {
            foreach ($data as $key => $val)
            {
                unset($this->store[$key]);
            }
        }

        $_SESSION[$this->sess_namespace] = $this->store;
    }

    /**
     * Fetch all session data
     *
     * @access public
     * @return array
     */
    public function all_userdata()
    {
        return $this->store;
    }

    /**
     * Delect all session data
     */

    public function destroy()
    {
        unset($_SESSION[$this->sess_namespace]);
    }
}