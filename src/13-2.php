<?php

class Hoge {
public $i;
}

/* インスタンスは通常状態で「参照」なので */
// = の演算子だと「左右辺が同じもの」になります
$obj = new Hoge();
$obj2 = $obj;
$obj->i = 10;
var_dump($obj, $obj2);
var_dump(spl_object_id($obj), spl_object_id($obj2)); // PHP7.2～
var_dump(spl_object_hash($obj), spl_object_hash($obj2)); // PHP7.2～

// 比較としての配列
echo "\n";
$awk = [1, 2, 3];
$awk2 = $awk;
$awk[] = 4;
var_dump($awk, $awk2);

// copyを作りたい場合は clone 演算子を使います
echo "\n";
$obj = new Hoge();
$obj3 = clone $obj;
$obj->i = 10;
var_dump($obj, $obj3);
var_dump(spl_object_id($obj), spl_object_id($obj3)); // PHP7.2～

// 参照なので「関数先で変更が可能」なので気をつけましょう
echo "\n";
function func($obj) {
    $obj->i = 999;
}
var_dump($obj);
func($obj);
var_dump($obj);

// 宣言していないプロパティへの代入は「問題なく出来ます」
echo "\n";
$obj = new Hoge();
$obj->foo = 'bar';
var_dump($obj);

// 抑止したい場合、13-4でやるマジックメソッド「 __get 」を使いましょう
// XXX コードは 13-4 で