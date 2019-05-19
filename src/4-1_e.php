<?php

// 代入演算子
$i = 10;
// 「代入演算子(式)」は「代入した値」を値として返すので、「代入しつつ判定」といった記述が可能
var_dump( 10 === ($i = 10), $i);

// 型演算子
// インスタンス(後述)が「特定のクラスに属しているか」を調べる事が出来ます
echo "\n";
class Hoge {}
class Foo extends Hoge {}
class Bar {}
//
$hoge = new Hoge(); 
$foo = new Foo(); 
echo "Hogeインスタンスに対して instanceof Hoge :";
var_dump($hoge instanceof Hoge);
echo "Hogeインスタンスに対して instanceof Foo :";
var_dump($hoge instanceof Foo);
echo "Hogeインスタンスに対して instanceof Bar :";
var_dump($hoge instanceof Bar);
echo "Fooインスタンスに対して instanceof Hoge :";
var_dump($foo instanceof Hoge);
echo "Fooインスタンスに対して instanceof Foo :";
var_dump($foo instanceof Foo);
echo "Fooインスタンスに対して instanceof Bar :";
var_dump($foo instanceof Bar);
