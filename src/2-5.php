<?php

/*
 * 前提。配列の加算は「＋演算子」と「array_merge()関数」の2つの方法があります
 */

// 「keyに重複のない」hash配列の場合、+演算子もarray_merge()関数も「同じ」挙動になります。
$a1 = [
    'k1' => 1,
    'k2' => 2,
];
$a2 = [
    'k3' => 3,
    'k4' => 4,
];
//
$merge_1 = $a1 + $a2;
var_dump($merge_1);
$merge_2 = array_merge($a1, $a2);
var_dump($merge_2);
echo "\n";

// 「keyに重複がある」場合、+演算子はは左辺値が有効(先出し有利)、array_merge()は右辺値が有効(上書き)になります
$a3 = [
    'k1' => 1,
    'k2' => 2,
];
$a4 = [
    'k2' => 200,
    'k3' => 300,
];
//
$merge_3 = $a3 + $a4;
var_dump($merge_3);
$merge_4 = array_merge($a3, $a4);
var_dump($merge_4);
echo "\n";

// 数値keyの場合、+演算子は「(hashと同様に)左辺値が有効」、array_merge()は「後ろに足される」ような動きになります
$a5 = [1, 2, 3];
$a6 = [100, 200, 300];
//
$merge_5 = $a5 + $a6;
var_dump($merge_5);
$merge_6 = array_merge($a5, $a6);
var_dump($merge_6);
echo "\n";

// array_merge()で数値keyの場合、元の配列の数値keyに関係なく「ゼロから始まる連続した数値に置き換えられる」点に注意しましょう
$a7 = [
    10 => 10,
    20 => 20,
];
$a8 = [
    100 => 100,
    200 => 200,
];
$merge_7 = array_merge($a7, $a8);
var_dump($merge_7);
echo "\n";



