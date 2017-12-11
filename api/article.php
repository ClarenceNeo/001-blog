<?php
class Article
{
  public $db;
  public function __construct($db){
    $this->db = $db;
  }
  public function read($param)
  {
    $stmt = $this->db->prepare("select * from post");
    $r = $stmt->execute();
    $data = $stmt->fetchAll(2);
    // dd($data);
    return $r ?
      ['success' => true, 'data' => $data] :
      ['success' => false, 'msg' => 'db_internal_error'];
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