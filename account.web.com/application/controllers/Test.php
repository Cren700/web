<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 1234;
    }
    public function tests()
    {
        echo 5555;
    }

}
