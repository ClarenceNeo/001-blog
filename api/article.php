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
    $s = $this->db->prepare("select last_insert_id()");
    $s->execute();
    $last_id = $s->fetchAll(2)['0']['last_insert_id()'];
    return $r ?
      ['success' => true,'last_id' => $last_id] :
      ['success' => false, 'msg' => 'db_internal_error'];
  }
}