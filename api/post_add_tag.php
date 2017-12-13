<?php

class Postag
{
    public $db;
    public function __construct($db){
      $this->db = $db;
    }
    public function add($param){
      // dd($param);
      $post_id = @$param['post_id'];
      $tag_id_arr = @$param['tag_id'];

      if (!$post_id || !$tag_id_arr) {
        return ['success' => false, 'msg' => 'invaild: post_id || tag_id'];
      }

      foreach ($tag_id_arr as $tag_id) {
        $sql = "insert into post_and_tag (post_id, tag_id) value (:post_id, :tag_id)";
        $stmt = $this->db->prepare($sql);
        $r = $stmt->execute(['post_id'=>$post_id,'tag_id'=>$tag_id]);
        if (!$r) {
          return ['success' => false];
        }
      }
      return ['success' => true];
    }

    public function read($param){
      $id = @$param['id'];
      if (!$id) {
        return ['success' => false, 'msg' => 'invaild: id'];
      }
      $sql = "select tag.title from post_and_tag 
              left join tag on post_and_tag.tag_id = tag.id 
              left join post on post.id = post_and_tag.post_id 
              where post.id = :id";

      $stmt = $this->db->prepare($sql);
      $r = $stmt->execute(['id'=>$id]);

      $data = $stmt->fetchAll(2);

      return $r ?
      ['success' => true, 'data' => $data] :
      ['success' => false, 'msg' => 'db_internal_error'];
    }
}