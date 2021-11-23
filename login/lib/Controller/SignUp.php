<?php

namespace MyApp\Controller;

class SignUp extends \MyApp\Controller{

  public function run(){
    // isLoggedIn():ログインしているかを調べるメソッド
    if ($this->isLoggedIn()){
      // Login
      // ログインしていたらホームに飛ばす
      header('Location:' . SITE_URL );
      exit;
    }
    // 新規登録のフォームがpostされた場合＝登録処理が走る時。
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      // 登録処理を行う
        $this->postProcess();
    }
  }

  protected function postProcess(){
    // 1.データのチェック
    // うまくいかなかったら例外処理を走らす
    try{
       $this->DateCheck();

       // 今回発生する例外は、エラーメッセージを分かりやすくしたいので、
       // Exception クラスを継承して独自の例外クラスを作ってあげて、
       // それを catch したいと思います。
    } catch (\MyApp\Exception\CheckEmail $e){
      // メールアドレスに関する例外処理
      // echo $e->getMessage();
      // exit;
      $this->setErrors('email', $e->getMessage());
    } catch (\MyApp\Exception\CheckPassWord $e){
      // パスワードに関する例外処理
      // echo $e->getMessage();
      // exit;
      $this->setErrors('password', $e->getMessage());
    }

    $this->setValues('email', $_POST['email']);

    if ($this->hasError()){
      return;
    } else {
      try {

        // 2.チェック処理がOKな時ユーザーを作成する
        $userModel = new \MyApp\Model\User();
        $userModel->create([
          'email' => $_POST['email'],
          'password' => $_POST['password']
        ]);
      } catch (\MyApp\Exception\DuplicateEmail $e){
        // email が既に存在する場合は DuplicateEmail という例外
        $this->setErrors('email',$e->getMessage());
        return;
      }

      // 3.登録処理完了
      // リダイレクト処理を起こしてやる
      // SITE_URL：http://localhost:8888
      header('Location: '. SITE_URL . '/Login/public_html/login.php');

    }
  }

  private function DateCheck(){
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    }
    // FILTER_VALIDATE_EMAIL:値が妥当な e-mail アドレスであるかどうかを検証します。
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
      throw new \MyApp\Exception\CheckEmail();
    } else if(!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])){
      throw new \MyApp\Exception\CheckPassWord();
    }
  }

}
