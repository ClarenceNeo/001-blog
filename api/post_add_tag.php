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
}