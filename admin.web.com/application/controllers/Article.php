<?php
/**
 * Article.php
 * Author   : cren
 * Date     : 16/8/13
 * Time     : 下午11:36
 * Introduction    : 文章管理
 */

class Article extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/category_service_model');
        $this->load->model('service/article_service_model');
    }

    public function index()
    {
        $tag_id = $this->input->get('tag_id');
        $res = $this->article_service_model->getArticleByTagId($tag_id);
        if ($res['code'] !== 0) {
            show_error('输入的信息有误!');
            exit();
        }
        $this->smarty->assign('data', $res['data']);
        $this->smarty->display('article/index.tpl');
    }

    public function add()
    {
        $tag_id = $this->input->get('tag_id');
        $res = $this->category_service_model->getTagInfoByTagId($tag_id);
        if ($res['code'] !== 0) {
            show_error('输入的信息有误!');
            exit();
        } else {
            $this->smarty->assign('tag_info', $res['data']);
            $this->smarty->assign('fun_name', '添加文章');
            $this->smarty->assign('tag_id', $tag_id);
            $this->smarty->display('article/detail.tpl');
        }
    }

    public function addHandle()
    {
        $tag_id     = $this->input->post('tagId');
        $title      = $this->input->post('title');
        $sub_title  = $this->input->post('subTitle');
        $author     = $this->input->post('author');
        $content    = $this->input->post('content');
        $cover_img  = $this->input->post('coverImg');
        $issue_time = $this->input->post('issueTime');
        $ret = $this->article_service_model->add($tag_id, $title, $sub_title, $author, $content, $cover_img, $issue_time);

        if ($ret['code'] === 0) {
            $this->jump('/article.html?tag_id='.$tag_id);
        }
        if ($ret['code'] === 0) {
            $ret['url'] = '/article.html?tag_id='.$tag_id;
            echo json_encode($ret);
        } else {
            show_error('输入的信息有误!');
            exit();
        }
    }
    
    public function changeStatus()
    {
        $article_id = $this->input->get('id');
        $status = $this->input->get('status');

        $ret = $this->article_service_model->changeStatus($article_id, $status);
        echo json_encode($ret);
    }

    public function manage()
    {
        $id = $this->input->get('id');
        $res = $this->article_service_model->getArticleByAid($id);
//        echo json_encode($res);die;
        if ($res['code'] !== 0) {
            show_error('输入的信息有误!');
            exit();
        } else {
            $tag_info = $this->category_service_model->getTagInfoByTagId($res['data']['tag_id']);
            $this->smarty->assign('tag_info', $tag_info['data']);
            $this->smarty->assign('article_info', $res['data']);
            $this->smarty->assign('fun_name', '添加文章');
            $this->smarty->assign('tag_id', $res['data']['tag_id']);
            $this->smarty->display('article/detail.tpl');
        }
    }

    public function manageHandle()
    {
        $article_id = $this->input->post('articleId');
        $tag_id     = $this->input->post('tagId');
        $title      = $this->input->post('title');
        $sub_title  = $this->input->post('subTitle');
        $author     = $this->input->post('author');
        $content    = $this->input->post('content');
        $cover_img  = $this->input->post('coverImg');
        $issue_time = $this->input->post('issueTime');
        $ret = $this->article_service_model->update($article_id, $tag_id, $title, $sub_title, $author, $content, $cover_img, $issue_time);

        if ($ret['code'] === 0) {
            $ret['url'] = '/article.html?tag_id='.$tag_id;
            echo json_encode($ret);
        } else {
            show_error('输入的信息有误!');
            exit();
        }
    }

}