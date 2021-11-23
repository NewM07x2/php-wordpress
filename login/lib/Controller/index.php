<?php

namespace MyApp\Controller;

class index extends \MyApp\Controller{

  public function run(){
    // isLoggedIn():ログインしているかを調べるメソッド
    if (!$this->isLoggedIn()){
      // Not Login
      // ログインならログイン画面に遷移するリダイレクトをかける
      header('Location:' . SITE_URL . '/Login/public_html/login.php');
      exit;
    }

      // 登録しているユーザーの取得
      $userModel = new \MyApp\Model\User();
      $this->setValues('users',$userModel->findAll());

  }

}
