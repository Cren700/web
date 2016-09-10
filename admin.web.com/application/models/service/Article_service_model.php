<?php
/**
 * Article_service_model.php
 * Author   : cren
 * Date     : 16/8/14
 * Time     : 上午12:42
 */

class Article_service_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dao/article_dao_model');
    }

    public function add($tag_id, $title, $sub_title, $author, $content, $cover_img, $issue_time)
    {
        $res = array('code' => 0);
        $data = array(
            'tag_id'            => $tag_id,
            'merchant_id'       => $this->mid,
            'title'             => $title,
            'sub_title'         => $sub_title,
            'author'            => $author,
            'content'           => $content,
            'cover_img'         => $cover_img,
            'issue_time'        => strtotime($issue_time),
            'create_time'       => time(),
            'last_time'         => time(),
        );
        $ret = $this->article_dao_model->add($data);
        if ( !$ret ) {
            $res['code'] = 1;
        }
        return $res;
    }

    public function update($article_id, $tag_id, $title, $sub_title, $author, $content, $cover_img, $issue_time)
    {
        $res = array('code' => 0);
        $where = array(
            'id'                => $article_id
        );
        $data = array(
            'tag_id'            => $tag_id,
            'merchant_id'       => $this->mid,
            'title'             => $title,
            'sub_title'         => $sub_title,
            'author'            => $author,
            'content'           => $content,
            'cover_img'         => $cover_img,
            'issue_time'        => strtotime($issue_time),
            'last_time'         => time(),
        );
        $ret = $this->article_dao_model->update($where, $data);
        if ( !$ret ) {
            $res['code'] = 1;
        }
        return $res;
    }

    public function getArticleByTagId($tag_id)
    {
        $res = array('code' => 0, 'data' => array());
        $tag_info = $this->category_service_model->getTagInfoByTagId($tag_id);
        if ($tag_info['code'] === 0){
            $res['data']['tag_info'] = $tag_info['data'];
            $res['data']['article_list'] = $this->article_dao_model->getArticleByTagId($tag_id);
        } else {
            $res['code'] = 1;
        }
        return $res;
    }
    
    public function changeStatus($article_id, $status)
    {
        $res = array('code' => 0);
        $where = array('id' => $article_id);
        $data = array('status' => 1 - $status);
        $ret = $this->article_dao_model->update($where, $data);
        if (!$ret) {
            $res['code'] = 1;
        }
        return $res;
    }

    public function getArticleByAid($id)
    {
        $res = array('code' => 0, 'data' => array());
        $ret = $this->article_dao_model->getArticleByAid($id);
        if (!empty($ret)) {
            $res['data'] = $ret;
        }
        return $res;
    }
}

