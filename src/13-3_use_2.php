<?php

// 名前空間で宣言されたクラスの使い方
require_once('./13-3_name.php');

// useを使う時の使い方
use Name\Test\Hoge;

$obj = new Hoge();
var_dump($obj);
