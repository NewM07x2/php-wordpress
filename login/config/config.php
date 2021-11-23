<?php

// ブラウザの方にエラー表示してくれるので、便利。
ini_set('display_errors',1);

define('DSN','mysql:dbhost=localhost;dbname=login_test');
define('DB_USERNAME','dbuser');
define('DB_PASSWORD','test');
define('SITE_URL','http://' . $_SERVER['HTTP_HOST']);

// function.phpを読み込む
require_once(__DIR__ . '/../lib/function.php');
// →現在configファイルの中にはあるので、１つ階層を戻ってlibの中に入る

// クラスのオートロード設定
require_once(__DIR__ . '/autoload.php');

// 何かとsessionは使うので、いれておく
session_start();
