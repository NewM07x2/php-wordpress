<?php

namespace MyApp\Exception;

class DuplicateEmail extends \Exception {
  protected $message = '入力されたEmailは既に登録してされています！';
}
