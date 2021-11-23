<?php
// 今回作るモデルは User だけなのですが、
// 拡張性も考えて、共通処理を Model.php に書いて、
// それ以外のものを Model フォルダの中に入れて、
// User クラスなどはその中に入れていくとしていきましょう。
namespace MyApp;

class Model {
  // DB接続
  protected $db;

  public function __construct(){
    try{
      $this->db = new \PDO(DSN,DB_USERNAME,DB_PASSWORD);
    } catch (\PDOException $e) {
      // DBに接続するできなかった場合
      echo $e->getMessage();
      exit;
    }
  }
}
