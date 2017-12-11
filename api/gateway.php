<?php
session_start();
require_once(dirname(__FILE__) . '/../util/helper.php');
require_once(dirname(__FILE__) . '/./article.php');
require_once(dirname(__FILE__) . '/./cat.php');
require_once(dirname(__FILE__) . '/./admin.php');

function parse_param($uri){
  $uri = explode('?', $uri)[0];
  $uri = explode('/', trim($uri, '/'));
  $model = @$uri[1];
  $action = @$uri[2];

  $param = array_merge($_GET, $_POST);
  $klass = ucfirst($model);
  $method = $action;

  // has_permission_to($model, $action);

  if ( ! has_permission_to($model, $action)) {
    echo json(e('PERMISSION_DENIED'));
    return;
  }

  $db = new_db();

  $model = new $klass($db);

  $res = $model->$method($param);

  echo json($res);
}

function has_permission_to($model, $action){

  // dd($model);
  $public = [
    'admin' => ['login'],
    'article' => ['read'],
    'cat' => ['read']
  ];
  $private = [
    'article' => [
      'add' => ['author'],
    ],
    'cat'=> [
      'add' => ['author']
    ],
    'admin' => [
      'logout' => ['author']
    ]
  ];

  if (! key_exists($model, $private) && ! key_exists($model, $public)) {
    return false;
  }

  $public_model = @$public[$model];

  if($public_model && in_array($action, $public_model)){
    return true;
  }

  $action_arr = $private[$model];
  if ( ! $action_arr || ! key_exists($action, $action_arr))
    return false;

  $permission_arr = $action_arr[$action];

  $user_permission = @$_SESSION['user'];

  if ( ! in_array($user_permission, $permission_arr))
    return false;
  return true;
}