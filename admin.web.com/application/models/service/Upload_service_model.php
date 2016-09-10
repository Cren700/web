<?php
// 加载第三方七牛类
require_once 'application/third_party/Qiniu/Auth.php';
require_once 'application/third_party/Qiniu/Http/Client.php';
require_once 'application/third_party/Qiniu/Http/Request.php';
require_once 'application/third_party/Qiniu/Http/Response.php';
require_once 'application/third_party/Qiniu/Http/Error.php';
require_once 'application/third_party/Qiniu/Storage/BucketManager.php';
require_once 'application/third_party/Qiniu/Storage/UploadManager.php';
require_once 'application/third_party/Qiniu/Storage/FormUploader.php';

use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;


class Upload_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function token($type, $file)
    {
        $file = explode('.', $file);
        $ext = array_pop($file);
        $data = array('type' => $type, 'ext' => $ext);

        $ret = $this->myCurl('uploadify', 'getToken', $data);

        return array('uptoken' => isset($ret['data']['token']) ? $ret['data']['token'] : '');
    }

    public function kindeditor()
    {
        $res = array(
            'error'     => 1,
            'message'   => '上传错误'
        );
        if(isset($_FILES['imgFile']['error']) and $_FILES['imgFile']['error'] == 0)
        {
            $this->load->config('qiniu');
            $accessKey = $this->config->item('accessKey');
            $secretKey = $this->config->item('secretKey');
            $bucket    = $this->config->item('bucket');

            $auth = new Auth($accessKey, $secretKey);
            $uploadMgr = new UploadManager();

            $token = $this->token('productdescription', $_FILES['imgFile']['name']);

            $token = $token['uptoken'];

            list($ret, $err) = $uploadMgr->putFile($token, null, $_FILES['imgFile']['tmp_name']);
            if($err === null)
            {
                $res = array(
                    'error'     => 0,
                    'url'       => $ret['data']['url']
                );
            }
        }
        return $res;
    }
}