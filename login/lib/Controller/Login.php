<?php

namespace MyApp\Controller;

class Login extends \MyApp\Controller{

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

    // ログイン画面で何も入力してされなかった場合の処理
    } catch (\MyApp\Exception\EmptyPost $e){
      $this->setErrors('login', $e->getMessage());

    }

    $this->setValues('email', $_POST['email']);

    if ($this->hasError()){
      return;
    } else {
      try {

        // 2.チェック処理がOKな時ユーザーを作成する
        $userModel = new \MyApp\Model\User();
        $user = $userModel->login([
          'email' => $_POST['email'],
          'password' => $_POST['password']
        ]);
        // IDとPWが一致しなかった場合
      } catch (\MyApp\Exception\UnmatchEmailOrPassword $e){
        // email が既に存在する場合は DuplicateEmail という例外
        $this->setErrors('login',$e->getMessage());
        return;
      }

      // 3.ログイン処理
      // セッションハイジャック対策
      // PHP ではセッションを管理する際にクッキーでセッション ID を保存していくのですが、
      // それが特定されると困るので毎回新しい値をセットしていく。
      session_regenerate_id(true);
      $_SESSION['me'] = $user;

      // リダイレクト処理を起こしてやる
      // SITE_URL：http://localhost:8888
      header('Location: '. SITE_URL .'/Login/public_html/index.php' );
      exit;
    }
  }

  private function DateCheck(){
    // トークンが異なっている時
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
      echo "ログインできません。";
      exit;
    }
    // mailとPWが入力されていなかった場合
    if(!isset($_POST['email']) || !isset($_POST['password'])){
      echo "ログインできません。";
      exit;
    }

    if($_POST['email'] === '' || $_POST['password'] === '' ) {
      throw new \MyApp\Exception\EmptyPost();

    }
  }

}
