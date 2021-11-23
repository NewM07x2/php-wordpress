<?php

namespace MyApp\Exception;

class UnmatchEmailOrPassword extends \Exception {
  protected $message = 'メールアドレスまたはパスワードが違います';
}
