<?php
require_once('../util/helper.php');
// require_once('../api/gateway.php');

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
  case '/':
    tpl('home');
    break;
  case '/admin':
    tpl('login');
    break;
  case '/post':
    tpl('admin/post');
    break;
  case '/cat':
    tpl('admin/cat');
    break;
  default:
    http_response_code(404);
    die('404 找不到');
}