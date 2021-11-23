<?php

namespace MyApp\Model;

class User extends \MyApp\Model {
  // 新規登録処理
  public function create($values){
    // 渡って来たデータを用いて、レコードに挿入していく
    // INSERT文を変数に格納
      $sql = "insert into users (email, password, created, modified) values (:email, :password, now(), now())";
      // 挿入する値は空のまま、SQL実行の準備をする
      $stmt = $this->db->prepare($sql);
      // 挿入する値を配列に格納する
      $params = array(
        ':email' => $values['email'],
        // パスワードをそのままいれるのはセキュリティ上良くないので、ハッシュ化する
        ':password' => password_hash($values['password'],PASSWORD_DEFAULT)
      );
      // $stmt->bindParam(':email', $values['email'], PDO::PARAM_STR);
      // $stmt->bindParam(':email', password_hash($values['password'],PASSWORD_DEFAULT), PDO::PARAM_STR);
      // $stmt->bindValue(':value', 1, PDO::PARAM_INT);
      // ●bindParam は PDO::PARAM_INT を指定しても文字列として扱われる。
      // SQLインジェクションとかは心配なさそう。
      // ●bindValue は値を数値で指定します。
      // この場合は PDO::PARAM_INT 型指定が必要。

        // 挿入する値が入った変数をexecuteにセットしてSQLを実行
      $res = $stmt->execute($params);

      if($res === false){
        // DB上メールアドレスはユニークなので、重複していたらinsertされない
        throw new \MyApp\Exception\DuplicateEmail();
      }
  }

  // ログイン処理
  public function login($values){
    $sql = "select * from users where email = :email";
    // 挿入する値は空のまま、SQL実行の準備をする
    $stmt = $this->db->prepare($sql);
    // 挿入する値を配列に格納する
    $params = array(
      ':email' => $_POST['email']
    );
    // 実行
    $stmt->execute($params);
    // データはオブジェクト形式で取得したいので、FetchMode() を設定する
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    // そうすると $user が取得できる
    $user = $stmt->fetch();

    // ユーザーが存在しなかった場合
      if(empty($user)){
        throw new \MyApp\Exception\UnmatchEmailOrPassword();
      }

    // パスワードが間違っていた場合
    if(!password_verify($values['password'],$user->password)){
      throw new \MyApp\Exception\UnmatchEmailOrPassword();
    }
    return $user;
  }

  public function findAll(){
    $sql = "select * from users order by id";
    // 挿入する値は空のまま、SQL実行の準備をする
    $stmt = $this->db->query($sql);
    // 実行
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }
}
