<?php
// index.phpの作成
// 定数の設定
// PDOへの接続
define('DB_DATABASE','dotinstall_db');
define('DB_USERNAME','mnitta');
define('DB_PASSWORD','mnitta');
// PDO に接続するための DSN というもの
define('PDO_DSN','mysql:host=localhost;dbname=' . DB_DATABASE);

// PDO 関連で例外が出たら、
// こちらの catch の方で捕捉して、
// エラー処理をしていくという書き方にしていくのが無難。

class User{
// public $id;
// public $name;
// public $sore;
public function show(){
  echo "$this->name ($this->score) <br>";
}
}

try {
  // 接続
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  // エラーが出た時には Exception を出すという設定 = 決まり文句
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // insert
  // exec() は結果を返す必要が無いもので、
  // 自分で完全に安全だと分かっている SQL を実行する際に便利
  // $db->exec("insert into users (name, score) values ('mnitta', 51)");
  // echo "user added!";

  // 接続を切ると方法
  // $db = null;

  /*
(1) exec(): 結果を返さない、安全なSQL
(2) query(): 結果を返す、安全、何回も実行されないSQL
(3) prepare(): 結果を返す、安全対策が必要、複数回実行されるSQL
*/
// ?：パラメーター的なもの
// $stmt = $db->prepare("insert into users (name, score) values (:name, :score)");
// $stmt->execute([':name'=>'mnitta1','score'=>70]);
// $stmt->execute(['taguchi', 44]);
// $stmt->execute(['taguchi', 54]);
// $stmt->execute(['taguchi', 22]);

// 定数の指定
// bindValue：値をbindする
// bindPaaram：変数への参照をbindする
//   $stmt = $db->prepare("insert into users (name, score) values (?, ?)");
// $name = 'taguchi';
// bindValueを用いて”?”の個所に代入するあたいを指定する
// 書き方は以下とする
// bindValue(何番目か, 代入する変数, 型);
// 名前付きパラメータの場合には:nameのように指定してやれば良い＝この方法の方が後々メンテナンスしやすい
// $stmt->bindValue(1, $name, PDO::PARAM_STR);
// $stmt->bindValue(':name', $name, PDO::PARAM_STR);
// $score = 23;
// $stmt->bindValue(2, $score, PDO::PARAM_INT);
// $stmt->execute();
// $score = 44;
// $stmt->bindValue(2, $score, PDO::PARAM_INT);
// $stmt->execute();

// bindParamを用いた流れは以下になる
// $stmt->bindParam(2, $score, PDO::PARAM_INT);
// $score = 44;
// bindValue,bindParamの違いについて
// 違いはほぼほぼ無いのが結論。（＝パラメータ化クエリ）
// あるとすれば代入する値がbindする前に存在しているか否か。

// PDO::PARAM_NULL
// PDO::PARAM_BOOL

// select All 抽出
// クエリで全検索(データを引っ張ってくるだけなので表示するは不可)
// $stmt = $db->query("select * from users");
// 検索結果を表示可能な形態にする
// FETCH_ASSOCの型(配列)で引っ張ってくる
// $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 条件付き抽出
// $stmt = $db->prepare("select score from users where score > ?");
// $stmt->execute([60]);
// $stmt = $db->prepare("select name from users where name like ?");
// $stmt->execute(['%1%']);
// $stmt = $db->prepare("select score from users order by score desc limit ?");
// $stmt->bindValue(1, 1, PDO::PARAM_INT);
// $stmt->execute();
// $stmt->execute([1]);

// PDO::FETCH_CLASS
// 抽出したデータを直接クラスにセットできる
// インストラクタ等に有効
// 描き方は以下になる
// $users = $stmt->fetchAll(PDO::FETCH_CLASS,なんのクラス？);
// $stmt = $db->query("select * from users");
// $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
// foreach ($users as $user) {
//   $user->show();
// }

// update
// $stmt = $db->prepare("update users set score = :score where name = :name");
// $stmt->execute([
//     ':score' => 100,
//     ':name' => 'mnitta12'
// ]);
// $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
// foreach ($users as $user) {
//   var_dump($user);
//   error_log('test');
// }

// トランザクション
$db->beginTransaction();
$db->exec("update users set score = score - 10 where name = 'mnitta12'");
$db->exec("update users set score = score - 10 where name = 'mnitta'");
$db->commit();

// if ($stmt){
//   echo "<br>";
//   echo "成功です！";
// }else {
//   echo "残念、失敗";
// }


} catch (PDOException $e) {
  $db->rollback();
  echo $e->getMessage();
  exit;
}
