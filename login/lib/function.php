<?php

// データを表示する際にエスケープするための関数
function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
