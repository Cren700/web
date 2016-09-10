<?php
class MY_Controller extends CI_Controller
{
    protected $smarty = null;
    protected $language = null;
    public function __construct()
    {
        parent::__construct();
        $this->filterPostAndGet();

        require_once 'application/third_party/smarty/Smarty.class.php';

        //创建一个smarty类的对象$smarty
        $this->smarty = new Smarty();

        //设置所有模板文件存放目录
        $this->smarty->template_dir = 'application/views/'.$this->language;
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
    }

    protected function success($message , $url, $time = 2)
    {
        $this->smarty->assign('message', $message);
        $this->smarty->assign('url', $url);
        $this->smarty->assign('time', $time);

        $this->smarty->display('public/success.tpl');
    }

    protected function error($message, $url = '', $time = 2)
    {
        $this->smarty->assign('message', $message);
        $this->smarty->assign('url', $url);
        $this->smarty->assign('time', $time);

        $this->smarty->display('public/error.tpl');
    }

    public function jump($url)
    {
        header("Location: {$url}", true, 302);
    }

    private function filterPostAndGet()
    {
        // isset($_POST) && $_POST && $_POST = $this->filterInputData($_POST);
        // isset($_GET) && $_GET && $_GET = $this->filterInputData($_GET);
    }

    private function filterInputData($data)
    {
        if(is_array($data))
        {
            $tmp = array();
            foreach($data as $i => $v)
            {
                $tmp[$i] = $this->filterInputData($v);
            }
        }
        else
        {
            $tmp = trim(addslashes($data));
        }
        return $tmp;
    }

    protected function outputResponse($data)
    {
        if(IS_AJAX)
        {
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);

            // 设置HTTP响应头信息
            $header = array(
                'Content-Type'      => 'application/json; charset=UTF-8'
            );
            foreach($header as $k => $v)
            {
                header("{$k}: {$v}");
            }
            exit($data);
        }
        else if($data['code'] == 0)
        {
            $this->success($data['msg'], $data['data']);
        }
        else
        {
            $this->error($data['msg']);
        }
    }
}

class BaseController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('service/merchant_service_model');
        $this->load->model('service/category_service_model');
        $this->merchant_service_model->setUserCookie();
        $cate = $this->category_service_model->getCate(1);
        if($this->session->userdata('id') == false)
        {
            $uri = rawurlencode($_SERVER['REQUEST_URI']);
            header("Location: /?url={$uri}", true, 302);
            exit;
        }
        $url = strtolower(trim($this->input->server('REQUEST_URI'), '/'));
        $url = explode('?', $url);
        $url = $url[0];

        $class = array(
            'stat'                          => 'stat',
            'sysmassage'                    => 'sysmassage',
            'sysmassage/getmsgcount'        => 'sysmassage',
            'category'                      => 'category',
            'product/add'                   => 'product',
            'order'                         => 'order',
            'order/undeal'                  => 'order',
            'service/lists'                 => 'service',
            'service/serv'                  => 'service',
            'banner'                        => 'banner',
            'banner/add'                    => 'banner'
            

        );
        $this->smarty->assign('cate', $cate['data']);
        $this->smarty->assign('class', isset($class[$url]) ? $class[$url] : '');
        $this->smarty->assign('url', $url);


        //获取未读消息数量
//        $this->load->model('service/sysmassage_service_model');
//        $msgCount = $this->sysmassage_service_model->getMsgCount();
//        $this->smarty->assign('count', $msgCount);
    }
}
