<?php

/*
MyApp
index.php controller
MyApp\Controller\Index
-> lib/Controller/Index.php
*/
// 全体の名前空間をMyAppにしつつ
// Controller とか Model のクラスはサブ名前空間に配置

spl_autoload_register(function($class){
  $prefix='MyApp\\';
  if(strpos($class,$prefix) === 0 ) {
    $className = substr($class , strlen($prefix));
    $classFilePath = __DIR__ . '/../lib/' . str_replace('\\','/',$className).'.php';

    if(file_exists($classFilePath)){
      require $classFilePath;
    }
  }
});
