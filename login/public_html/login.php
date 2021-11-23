<?php

// ログイン

require_once(__DIR__ . '/../config/config.php');

$app = new MyApp\Controller\Login();

// メソッド
$app->run();
// // echo "login OK";
// exit;

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1>ログイン画面</h1>
    <div class="" id="container">
      <!-- このページ自体に飛ばす -->
      <form class="" action="" method="post" id="login">
        <p>
          <input type="text" name="email" value="<?= isset($app->getValues()->email) ? h($app->getValues()->email) : ''; ?>" placeholder="email">
        </p>
        <p>
          <input type="password" name="password" value="" placeholder="password">
        </p>
        <p class='err'><?= h($app->getErrors('login')); ?></p>
        <div class="btn" onclick="document.getElementById('login').submit();">
          Login
        </div>
        <p>
          <a href="signUp.php" class="fs12">Sign Up</a>
          <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
        </p>
      </form>

    </div>
  </body>
</html>
