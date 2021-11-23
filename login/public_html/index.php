<?php

// ログイン出来たら、ユーザーの一覧が表示される

require_once(__DIR__ . '/../config/config.php');

// このViewに表示されるするデータはControllerから引っ張って来るようにする
$app = new MyApp\Controller\index();

// メソッド
$app->run();
// ユーザーの一覧データを取得する

// ログインしているユーザ情報の取得
$app->me();

// 登録してされているユーザーの情報を取得する
$app->getValues()->users;

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>一覧表示</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <div class="" id="container">
      <!-- このページ自体に飛ばす -->
      <form class="" action="logout.php" method="post" id="logout">
        <?= h($app->me()->email); ?> <input type="submit" name="logout" value="logout">
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </form>
      <h1>USERs <span class='fs12'>(<?= count($app->getValues()->users); ?>)</span></h1>
      <ul>
        <?php foreach ($app->getValues()->users as $user) : ?>
          <li><?= h($user->email); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </body>
</html>
