<?php

// 名前空間で宣言されたクラスの使い方
require_once('./13-3_name.php');

// useを別名で使う時の使い方
use Name\Test\Hoge as Foo;

$obj = new Foo();
var_dump($obj);
