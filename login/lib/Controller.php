<?php

namespace MyApp;

class Controller{

  // 継承したクラスからも使用するためprotectedにする
  protected function isLoggedIn(){
    // どのようにログイン状態を判定するかは、
    // ログインした時にセッションに me というキーで情報を保持しておき、
    // その中身を見てログインしているかどうかを判定してあげる。
    // もし $_SESSION['me'] がセットされていて、
    // なおかつ空じゃなかったら、
    // としてあげるとログイン状態が判定できる.
    return isset($_SESSION['me']) && !empty($_SESSION['me']);
  }

  // エラーに関する共通の処理
  // クラス変数=エラー情報を格納する為の変数
  private $_errors;
  private $_values;

  public function __construct(){
    // CSRF対策
    // トークン作成
    // 推測されにくい文字列にすれば良いのですが、
    // 最近は openssl_random_pseudo_bytes(16) という命令を使うのが一般的
    if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    }

    // この stdClass() は、PHP デフォルトのクラスで
    // 宣言することなくいきなり new して使うことができる特殊なオブジェクト
    // オブジェクト型のデータをさっと作りたい時に便利
    $this->_errors = new \stdClass();
    $this->_values = new \stdClass();
  }

  protected function setValues($key, $value) {
  $this->_values->$key = $value;
  }

  public function getValues() {
    return $this->_values;
  }

// これは継承されたクラスから使うので protected にしてあげつつ、
// setErrors としてあげて、$key と$error を渡してあげるとしてあげましょう。
  protected function setErrors($key,$error){
    $this->_errors->$key = $error;
  }

  // getErrors() に関しては、インスタンスから呼ぶので public にしないと駄目
  public function getErrors($key){
    return isset($this->_errors->$key) ? $this->_errors->$key : '';
  }

  protected function hasError() {
    // get_object_vars：プロパティを取得
    return !empty(get_object_vars($this->_errors));
  }

  public function me() {
    return $this->isLoggedIn() ? $_SESSION['me'] : null ;
  }


}
