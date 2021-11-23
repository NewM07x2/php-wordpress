<?php

namespace MyApp\Exception;

class CheckEmail extends \Exception {
  protected $message = '正しいメールアドレスを入力してください！';
}
