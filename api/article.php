<?php
require_once(dirname(__FILE__) . '/Model.php');

class Article extends Model
{
  public $db;
  public $table = "post";
  public function __construct($db){
    $this->db = $db;
  }
  public function read($param)
  {

    $page = (int) @$param['page'] ?: 1;
    $id = @$param['id'];

    $data = $this->_read([
      'page' => $page,
      'id' => $id,
    ]);

    foreach ($data as $key => &$value) {
      if($value['create_at']){
        $value['create_at'] = date("Y-m-d",$value['create_at']);
      }
    }

    $count = $this->_count();

    return ['success' => true, 'data' => $data, 'count' => $count];
  }

  public function add($param)
  {
    $title = @$param['title'];
    $content = @$param['content'];
    $create_at = time();

    if(!$title || !$content){
      return ['success' => false, msg =>"invalid: title;invalid: content"];
    }

    $stmt = $this->db->prepare("insert into post (title, content, create_at) value (:title , :content, :create_at)");
    // dd($stmt);
    $r = $stmt->execute(['title'=>$title, 'content'=>$content, 'create_at'=>$create_at]);
    $s = $this->db->prepare("select last_insert_id()");
    $s->execute();
    $last_id = $s->fetchAll(2)['0']['last_insert_id()'];
    return $r ?
      ['success' => true,'last_id' => $last_id] :
      ['success' => false, 'msg' => 'db_internal_error'];
  }
}