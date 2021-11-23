<?php
// エラー表示の設定
// データを HTML で出力する時のエスケープの関数
// 上記の設定は別ファイルで読み込むと何かと便利(使い回し可能)
// 別ファイル読み込み
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/main.php');

// 現在何問目かを示す変数
$quiz = new App\Quiz();
// 問題の呼び出し
$data = $quiz->getQuestion();
shuffle($data['answer']);
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>animetion</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  </head>
  <body>
    <div id="box">
      <div id="errorBox">
        <div class="close">
          <div class="close-btn">
            <i class="far fa-times-circle"></i>
          </div>
          <div class="error">
            <div class="error-meg">選択してないですよ...</div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
      <span>$</span>
    </div>
    <section>
      <h1>これは何でしょう〜？</h1>
      <form class="form" action="result.php" method="post">
          <div id="huzi" class="mountain" name="mountain" value="huzi">富士山</div>
          <div id="ebe" class="mountain"  name="mountain" value="ebe">エベレスト</div>
          <div id="k2" class="mountain"   name="mountain" value="k2">K2</div>
          <div id="takao" class="mountain"name="mountain" value="takao">高尾山</div>
          <div class="">
            <input id="submit" type="submit" name="submit" value="解答！">
            <input id="answer" type="hidden" name="answer" value="">
          </div>
      </form>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="js.js"></script>
  </body>
</html>
