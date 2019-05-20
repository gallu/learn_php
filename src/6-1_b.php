<?php
//declare(strict_types=1);

// 関数は以下のように定義されます
function func_1()
{
    echo __FUNCTION__ , "\n";
}
// 呼び出しは以下のように行います
func_1();
echo "\n";

// 関数名は、変数同様「アルファベット、数字、アンダースコア」が利用可能です
// XXX 変数と同様、日本語も可能ですが、推奨されない事が多いと思います
function _hoge()
{
}
function 関数()
{
}
// これはNG(先頭は英文字またはアンダースコアである必要がある
//function 4hoge()
//{
//}


// 関数は「引数」を取ることができます
function func_2($a)
{
    echo __FUNCTION__ , ': ', $a, "\n";
}
func_2(10);
echo "\n";

// 引数が2つ以上の時は、カンマ(,)でつなげます
function func_3($a, $b)
{
    echo __FUNCTION__ , ': ', $a + $b, "\n";
}
func_3(10, 20);
echo "\n";

// 引数は「値渡し」になるので、関数側で値を変更しても、元の値は変更されません
$g_i = 10;
function func_7($a)
{
    $a += 100;
    echo __FUNCTION__ , ': ', $a , "\n";
}
func_7($g_i);
echo $g_i, "\n";
echo "\n";

// PHP7.0.0以降、戻り値にも型宣言が出来ます
function func_r_2(): string
{
    return __FUNCTION__ . ': return';
}
$v = func_r_2();
var_dump($v);
echo "\n";

