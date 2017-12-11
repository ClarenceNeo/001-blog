<?php
class Cat
{
  public $db;
  public function __construct($db){
    $this->db = $db;
  }
  public function read($param)
  {
    $stmt = $this->db->prepare("select * from cat");
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

    // dd($title);

    if(!$title){
      return ['success' => false, msg =>"invalid: title;"];
    }

    $stmt = $this->db->prepare("insert into tag (title) value (:title)");
    // dd($stmt);
    $r = $stmt->execute(['title'=>$title]);

    return $r ?
      ['success' => true] :
      ['success' => false, 'msg' => 'db_internal_error'];
  }
}