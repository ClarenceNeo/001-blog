<?php
session_start();
require_once(dirname(__FILE__) . '/../util/helper.php');
// require_once(dirname(__FILE__) . '/./article.php');

function parse_param($uri){
  $uri = explode('?', $uri)[0];
  $uri = explode('/', trim($uri, '/'));
  $model = @$uri[1];
  $action = @$uri[2];

  $param = array_merge($_GET, $_POST);
  $klass = ucfirst($model);
  $method = $action;

  $db = new_db();

  // $model = new $klass($db);

  // $res = $model->method($param);

  // echo json($res);
}