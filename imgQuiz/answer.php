<?php
// ajaxの処理

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/Quiz.php');

$quiz = new App\Quiz();
$answer = $quiz->checkAnswer();

// json形式で返してやる
header('Content-Type: application/json; charset=UTF-8');
echo json_encode([
  'answer' => $answer
]);
