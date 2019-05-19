<?php
declare(strict_types=1); // 強い型付け

// 「変数名」を変数に入れて、それをつかう事が出来る。
$test = 100;
$s = 'test'; // 「変数名」を文字列として代入
var_dump( $$s ); // $test の内容が出力される

// 「PHPとしては許容されない」変数名でも使えてしまうので注意
$s = 'a-b';
$$s = 999;
var_dump( get_defined_vars() ); // 「全ての定義済の変数を配列で返す」PHPの内部関数

// 以下のような複雑な記述も、出来なくはない(が、推奨はされない)
$a1 = 'a2';
$a2 = 'a3';
$a3 = 'test';
var_dump( $$$a1 ); // 最終的には $a3 の内容が出力される

// 曖昧になりそうな記述がある場合、{}を使って明確にするとよい
$a = 'abcdefg';
$b = '0123456';
$abcdefg = 'ABCDEFG';
//
var_dump( ${$a}[1] ); // $abcdefg[1] が出力される
var_dump( ${$a[1]} ); // $b が出力される


echo "\n";
// 「関数名」を変数に入れて、それを使う事が出来る
function func()
{
    echo __FUNCTION__, "\n";
}
$f = 'func'; // 「関数名」を文字列として代入
$f(); // func()がcallされる


echo "\n";
// この「(定義された)関数名が入っている文字列」は、「コールバック / Callable」の引数として使う事ができる
function func_callable(Callable $f)
{
    echo __FUNCTION__, "\n";
    var_dump($f);
}
func_callable($f);
// 「コールバック / Callable」には、すでに前述の通り「無名関数」も、引数として使う事が出来る(復習)
func_callable(function() {
    // 処理
});

