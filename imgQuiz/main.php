<?php
namespace App;

class Quiz{
  private $_quizSet =[];
  // コンストラクタ設定
  public function __construct(){
    // 1問目
    $this->_setup();
    if(!isset($_SESSION['question_num'])){
      $_SESSION['question_num'] = 0;
    }
  }
  private function _setup(){
    $this->_quizSet[] = [
      'question' => 'これはなに？',
      'answer' => ['A','B','C','D']
    ];
    // ２問目
    $this->_quizSet[] = [
      'question' => 'これはなに？',
      'answer' => ['A','B','C','D']
    ];
    // ３問目
    $this->_quizSet[] = [
      'question' => 'これはなに？',
      'answer' => ['A','B','C','D']
    ];
  }
  public function getQuestion(){
    return $this->_quizSet[$_SESSION['question_num']];
  }

  public function checkAnswer(){
    $answer = $this->_quizSet[$_SESSION['question_num']]['answer'][0];
    return $answer;
  }


}
