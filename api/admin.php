<?php

class Admin
{
  public function login($param){
    $username = $param['username'];
    $password = $param['password'];
    $valid_username = 'nzy';
    $valid_password = $this->hash_password('123');
    // dd($valid_username, $valid_password);
    if ( ! $username || ! $password)
      return ['success' => false, 'msg' => 'required: username && password'];
    $password = $this->hash_password($password);

    if ($username === $valid_username && $password === $valid_password) {
      $_SESSION['user'] = 'admin';
      return s();
    }
  }

  public function logout(){
    unset($_SESSION['user']);
  }

  public function hash_password($password){
    return md5(md5($password) . 'nzy');
  }
}