<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter Native Session Library
 *
 * @package Session
 * @subpackage Libraries
 * @category Session
 * @author Bo-Yi Wu (appleboy) <appleboy.tw@gmail.com>
 * @author Marko Martinović <marko@techytalk.info>
 */

class Session
{
    protected $sess_namespace = '';
    protected $ci;
    protected $store = array();

    /**
     * Constructor
     *
     * @access public
     * @param array config preferences
     *
     * @return void
     **/
    public function __construct()
    {
        $this->ci = get_instance();
        $this->initialize();
    }

    /**
     * Initialize the configuration options
     *
     * @access private
     * @return void
     */
    private function initialize()
    {
        $this->ci->load->config('session');
        $config = array(
            'sess_namespace' => $this->ci->config->item('sess_namespace')
        );

        foreach ($config as $key => $val)
        {
            if(isset($this->$key))
            {
                $this->$key = $val;
            }
        }

        if(!isset($_SESSION))
        {
            session_start();
        }

        if(isset($_SESSION[$this->sess_namespace]))
        {
            $this->store = $_SESSION[$this->sess_namespace];
        }

        $this->sess_create();
    }

    /**
     * Create Session
     *
     * @access public
     * @return void
     */
    public function sess_create()
    {
        if(isset($this->store['session_id']))
        {
            $_SESSION[$this->sess_namespace] = $this->store;
        }
        else
        {
            $_SESSION[$this->sess_namespace] = array(
                'session_id' => session_id()
            );
        }
        $this->store = $_SESSION[$this->sess_namespace];
    }

    /**
     * Destroy session
     *
     * @access public
     */
    public function sess_destroy()
    {
        // get session name.
        $name = session_name();
        if (isset($_COOKIE[$name]))
        {
            // Clear session cookie
            $params = session_get_cookie_params();
            setcookie($name, '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
            unset($_COOKIE[$name]);
        }

        $this->sess_create();
    }

    /**
     * Get specific user data element
     *
     * @access public
     * @param string element key
     * @return object element value
     */
    public function userdata($value)
    {
        if($value == 'session_id')
        {
            return $this->store['session_id'];
        }
        if (isset($this->store[$value]))
        {
            return $this->store[$value];
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Set value for specific user data element
     *
     * @access public
     * @param array list of data to be stored
     * @param object value to be stored if only one element is passed
     * @return void
     */
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
}