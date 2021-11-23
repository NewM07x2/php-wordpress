<?php

// 新規登録

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\SignUp();
// メソッド
$app->run();

// CSRF対策
// 変なフォームから投稿されていないかチェック
// セッションに token を仕込みつつ、
// フォームから渡された token と一致するか見てあげます。
// token をまず作りたいのですが、
// こちらのインスタンスができた時に仕込んでいきたいと思うので、
// Controller.php のコンストラクターでやっていけば良いでしょう。

?>


<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>新規登録画面</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1>新規登録画面</h1>
    <div class="" id="container">
      <!-- このページ自体に飛ばす -->
      <form class="" action="" method="post" id="signup">
        <p>
          <input type="text" name="email" value="<?= isset($app->getValues()->email) ? h($app->getValues()->email) : ''; ?>" placeholder="email">
        </p>
        <p class='err'><?= h($app->getErrors('email')); ?></p>
        <p>
          <input type="password" name="password" value="" placeholder="password">
        </p>
        <p class='err'><?= h($app->getErrors('password')); ?></p>
        <div class="btn" onclick="document.getElementById('signup').submit();">
          Sign Up
        </div>
        <p><a href="login.php" class="fs12">Login</a></p>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </form>

    </div>
  </body>
</html>
