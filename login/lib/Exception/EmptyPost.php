<?php

namespace MyApp\Exception;

class EmptyPost extends \Exception {
  protected $message = 'メールアドレスまたはパスワードを入力してください！';
}
