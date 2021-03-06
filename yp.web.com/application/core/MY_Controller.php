<?php

/**
 * Created by PhpStorm.
 * User: cren
 * Date: 16/7/9
 * Time: 上午1:34
 */
class MY_Controller extends CI_Controller
{
    protected $_uid = '';
    protected $_username = '';
    public function __construct(){
        parent::__construct();
        $this->load->library("session");

        //Smarty

        require_once ROOT_PATH.'/system/third_party/smarty/Smarty.class.php';

        //创建一个smarty类的对象$smarty
        $this->smarty = new Smarty();

        //设置所有模板文件存放目录
        $this->smarty->template_dir = 'application/views';
        //设置所有编译过的模板文件的存放目录
        $this->smarty->compile_dir = 'application/cache/compiles/';
        //设置存放smarty缓存文件的目录
        $this->smarty->cache_dir = 'application/cache/caches/';
        //设置模板中所有特殊配置文件的存放目录
        $this->smarty->config_dir = 'application/third_party/smarty/configs/';

        //开启smarty缓存模板功能
        $this->smarty->caching = 0;

        //设置模板缓存有效时间段的长度为1天
        // $this->marty->cache_lifetime = 60 * 60 * 24;

        //设置模板语言中的左结束符，默认为“{”
        $this->smarty->left_delimiter = '<{';

        //设置模板语言中的右结束符，默认为“}”
        $this->smarty->right_delimiter = '}>';

        $seoArr = array(
            'keywords' => '惠东, 招聘, 优聘, HD, HD优聘, 兼职',
            'description' => 'HD优聘由惠东人亲自打造的兼职招聘平台,发布真是的惠东兼职招聘工作,HD优聘为你提供优质的兼职信息,找工作到HD优聘,www.hdyoupin.com',
            'title' => '惠东兼职-惠东兼职招聘信息-兼职招聘网-HD优聘'
        );
        $this->smarty->assign('seo_keywords', $seoArr['keywords']);
        $this->smarty->assign('seo_description', $seoArr['description']);
        $this->smarty->assign('seo_title', $seoArr['title']);
        $this->smarty->assign('cssArr', array());
        $this->smarty->assign('jsArr', array());

        $this->_uid = $this->session->userdata('id');
        $this->_username = $this->session->userdata('username');
        $this->smarty->assign('username', $this->_username);
        $this->smarty->assign('uid', $this->_uid);
    }

    /**
     * 格式化post和get数据
     */
    private function filterPostAndGet(){
        isset($_POST) and $_POST and $_POST = $this->filterInputData($_POST);
        isset($_GET) and $_GET and $_GET = $this->filterInputData($_GET);
    }

    /**
     * 格式化输入信息 (不对string数据进行addslashes,会影响数据的完整性)
     * @param $data
     * @return string
     */
    private function filterInputData($data){
        if (is_array($data)) {
            foreach ($data as &$v){
                $v =  $this->filterInputData($v);
            }
        }
        elseif(is_string($data)){
            $data = trim($data);
        }
        return $data;
    }

}

class BaseController extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        if (!$this->_uid) {
            header("Location: /login/index", true, 302);
            exit;
        }
    }


}