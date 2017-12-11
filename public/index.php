<?php
require_once('../util/helper.php');
// require_once('../api/gateway.php');

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
  case '/':
    tpl('home');
    break;
  case '/public':
    tpl('home');
    break;
  default:
    http_response_code(404);
    die('404 找不到');
}