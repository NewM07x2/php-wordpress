<?php

// ログアウト処理
require_once(__DIR__ . '/../config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    echo "Invalid Token!";
    exit;
  }

  // セッションの削除
  $_SESSION = [];

  // セッションの管理にクッキーを使用しているので、空にしてやる
  if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 86400, '/');
  }

  // セッションデータの削除
  session_destroy();

}
// リダイレクト
header('Location: '. SITE_URL .'/Login/public_html/login.php' );
