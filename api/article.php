<?php
class Article
{
  public $db;
  public function __construct($db){
    $this->db = $db;
  }
  public function read($param)
  {
    return $param;
  }

  public function add($param)
  {
    $title = @$param['title'];
    $content = @$param['content'];
    $create_at = @$param['create_at'];
    $update_at = @$param['update_at'];

    if(!$title || !$content){
      return ['success' => false, msg =>"invalid: title;invalid: content"];
    }

    $stmt = $this->db->prepare("insert into post (title, content) value (:title , :content)");
    // dd($stmt);
    $r = $stmt->execute(['title'=>$title, 'content'=>$content]);

    return $r ?
      ['success' => true] :
      ['success' => false, 'msg' => 'db_internal_error'];
  }
}