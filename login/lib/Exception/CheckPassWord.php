<?php

namespace MyApp\Exception;

class CheckPassWord extends \Exception {
  protected $message = 'パスワードポリシーにしたがって入力してください。';
}
