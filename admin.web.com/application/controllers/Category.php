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
        $this->smarty->display('category/add.tpl');
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
            $this->smarty->display('category/add.tpl');
        }
        else {
            show_error($res['msg']);
        }
        
    }

    public function doUpdate()
    {
        $id = $this->input->post('id');
        $cate_name = $this->input->post('cateName');
        $is_delete = $this->input->post('is_delete');
        $priority = $this->input->post('priority');
        $res = $this->category_service_model->Update($id, $cate_name, $priority, $is_delete);
        if ($res['code'] !== 0){
            echo $res['msg'];
        } else {
            header("Location:/category.html");
        }
    }

    public function change()
    {
        $id = $this->input->get('id');
        $res = $this->category_service_model->change($id);
        if ($res['code'] !== 0){
            echo $res['msg'];
        } else {
            header("Location:/category.html");
        }
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

    


}