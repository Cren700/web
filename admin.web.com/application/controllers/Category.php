<?php
/**
 * Category.php
 * Author   : cren
 * Date     : 16/8/2
 * Time     : 下午12:01
 */

class Category extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service/category_service_model');
    }

    public function index()
    {
        $res = $this->category_service_model->getCate();
        $this->smarty->assign('data', $res['data']);
        $this->smarty->display('category/index.tpl');
    }

    public function add()
    {
        $this->smarty->assign('fun_name', '新增栏目');
        $this->smarty->display('category/detail.tpl');
    }

    public function doAdd()
    {
        $catename = $this->input->post('cateame');
        $priority = $this->input->post('priority');
        $res = $this->category_service_model->add($catename, $priority);
        if ($res === 0){
            echo "添加出错";
        } else {
            header("Location:/category.html");
        }
    }

    public function update()
    {
        $id = $this->input->get('id');
        $res = $this->category_service_model->getCateInfoById($id);
        if($res['code'] === 0) {
            $this->smarty->assign('fun_name', '修改栏目');
            $this->smarty->assign('data', $res['data']);
            $this->smarty->display('category/detail.tpl');
        }
        else {
            show_error($res['msg']);
        }
        
    }

    public function doUpdate()
    {
        $id = $this->input->post('id');
        $cate_name = $this->input->post('cateName');
        $status = $this->input->post('status');
        $priority = $this->input->post('priority');
        $res = $this->category_service_model->Update($id, $cate_name, $priority, $status);
        if ($res['code'] !== 0){
            echo $res['msg'];
        } else {
            header("Location:/category.html");
        }
    }

    public function change()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $res = $this->category_service_model->change($id, $status);
        echo json_encode($res);
    }
    
    public function cateTag()
    {
        $cate_id = $this->input->get('cate_id');
        $res = $this->category_service_model->getCateTagByCateId($cate_id);
        if($res['code'] !== 0) {
            echo "cateTag wrong!";
        } else {
            $this->smarty->assign('cate_id', $cate_id);
            $this->smarty->assign('data', $res['data']);
            $this->smarty->display('category/tag.tpl');
        }
    }

    public function addTag()
    {
        $cate_id = $this->input->get('cate_id');
        $this->smarty->assign('cate_id', $cate_id);
        $this->smarty->display('category/addTag.tpl');
    }

    public function doAddTag()
    {
        $cate_id = $this->input->post('cate_id');
        $tag_name = $this->input->post('tagName');
        $priority = $this->input->post('priority');
        $res = $this->category_service_model->addTag($cate_id, $tag_name, $priority);
        if ($res === 0){
            echo "添加出错";
        } else {
            header("Location:/category.html");
        }
    }

    public function tagList()
    {
        $res = $this->category_service_model->getTagList();
        if($res['code'] !== 0) {
            header("Location:/category.html");
        } else {
            $this->smarty->assign('data', $res['data']);
            $this->smarty->display('category/tagList.tpl');
        }
    }

    public function manageTagStatus()
    {
        $tagId = intval($this->input->get('tag_id'));
        $status = intval($this->input->get('status'));
        $where = array('id' => $tagId);
        $data = array('status' => 1- $status);
        $res = $this->category_service_model->updateTag($where, $data);
        echo json_encode($res);
    }

    public function manageTag()
    {
        $tag_id = $this->input->get('tag_id');
        $res = $this->category_service_model->getTagInfoByTagId($tag_id);
        if ($res['code'] === 0) {
            $tagInfo = $res['data'];
            $cate_id = $tagInfo['cate_id'];
        } else {
            header("Location:/category.html");
        }
        $this->smarty->assign('tagInfo', $tagInfo);
        $this->smarty->assign('tag_id', $tag_id);
        $this->smarty->assign('cate_id', $cate_id);
        $this->smarty->display('category/addTag.tpl');
    }
    
    public function doManageTag()
    {
        $cate_id = intval($this->input->post('cate_id'));
        $tag_id = intval($this->input->post('tag_id'));
        $tag_name = $this->input->post('tagName');
        $priority = intval($this->input->post('priority'));
        $status = intval($this->input->post('status'));

        $where = array('id' => $tag_id);
        $data = array('tag_name' => $tag_name, 'priority' => $priority, 'status' => $status, 'last_time' => time());
        $res = $this->category_service_model->updateTag($where, $data);
        if ($res['code'] !== 0){
            echo "添加出错";
        } else {
            header("Location:/category/taglist.html");
        }
    }

    


}