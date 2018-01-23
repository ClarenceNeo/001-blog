<?php
function new_db(){
  $host = config('db_host');
  $dbname = config('db_name');
  $username = config('db_username');
  $password = config('db_password');
  $charset = 'utf8';
  $collate = 'utf8_unicode_ci';
  $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

  $options = [
    PDO::ATTR_CASE => PDO::CASE_NATURAL, /*PDO::CASE_NATURAL | PDO::CASE_LOWER 小写，PDO::CASE_UPPER 大写， */
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, /*是否报错，PDO::ERRMODE_SILENT 只设置错误码，PDO::ERRMODE_WARNING 警告级，如果出错提示警告并继续执行| PDO::ERRMODE_EXCEPTION 异常级，如果出错提示异常并停止执行*/
    PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL, /* 空值的转换策略 */
    PDO::ATTR_STRINGIFY_FETCHES => false, /* 将数字转换为字符串 */
    PDO::ATTR_EMULATE_PREPARES => false, /* 模拟语句准备 */
  ];
  return new PDO($dsn, $username, $password, $options);
}

function e($msg)
{
  return['success' => false, 'msg' => $msg];
}

function s($data = null)
{
  return ['success' => true, 'data' => $data];
}

function he_is($permission)
{
  return @$_SESSION['user']['permission'] === $permission;
}

function json($data) {
  header('Content-Type: application/json');
  return json_encode($data);
}

function tpl($path)
{
  require_once(tpl_path($path));
}

function tpl_path($path){
  return dirname(__FILE__) . '/../view/' . $path . '.php';
}

function dd($data){
  foreach (func_get_args() as $item) {
    var_dump($item);
  }
  die();
}

function config($key)
{
  if (!$config = @$GLOBALS['__config']) {
    $json = file_get_contents(root('.config', 'json'));
    $config = json_decode($json, true);
    $GLOBALS['__config'] = $config;
  }

  return @$config[$key];
}

function root($path, $ext = 'php')
{
  return dirname(__FILE__) . '/../' . $path . ($ext ? '.' . $ext : '');
}