<?php
// 解答
$answer = "huzi";
$answer_check = $_POST["answer"];
if($answer === $answer_check ){
  // 正解処理
  echo "OK";
}else{
  // 不正解
}
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>animetion</title>
    <link rel="stylesheet" href="css.css">
  </head>
  <body>
    <section>
      <div class="answer-top">
        <div class="answer">

        </div>
      </div>
    </section>
    <a href="imgQuiz.php">TOPページへ</a>
  </body>
</hmtl>
