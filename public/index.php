<?php
require_once('../util/helper.php');
require_once('../api/gateway.php');

$uri = $_SERVER['REQUEST_URI'];

if (strpos($uri, '/a/') !== false) {
  echo parse_param($uri);
  return;
}

if (strpos($uri, '/article') !== false) {
  tpl('article');
  return;
}

if (strpos($uri, '/tag') !== false) {
  tpl('tag');
  return;
}

switch ($uri) {
  case '/':
    // var_dump($_SESSION['user']);
    tpl('home');
    break;
  case '/login':
    tpl('login');
    break;
  case '/post':
    if(!@$_SESSION['user']){
      echo '无权限';
      die();
    }
    tpl('admin/post');
    break;
  case '/cat':
    if(!@$_SESSION['user']){
      echo '无权限';
      die();
    }
    tpl('admin/cat');
    break;
  default:
    http_response_code(404);
    die('404 找不到');
}