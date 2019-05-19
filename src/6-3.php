<?php

// 「無名関数」という関数を作る事ができます。これは変数に格納されます
// XXX 実態は「Closure クラスのオブジェクト(インスタンス)」になります
$func = function()
{
    echo __FUNCTION__, "\n";
}; // 最後のセミコロンは必須です
//
$func();
echo "\n";

// 関数なので、普通に引数を取ったり戻り値を得たりできます
$func = function($s)
{
    echo $s, ': ', __FUNCTION__, "\n";
    return true;
}; // 最後のセミコロンは必須です
//
$r = $func('hoge');
var_dump($r);
echo "\n";

// 無名関数は、親の変数を引き継ぐ事ができます

// グローバルスコープに書かれている場合
$g_i = 100;
$func = function() use ($g_i)
{
    echo $g_i, ': ',__FUNCTION__, "\n";
}; // 最後のセミコロンは必須です
//
$func();
echo "\n";

// ローカルスコープに書かれている場合
function func()
{
    $l_i = 999;
    $func = function() use ($l_i)
    {
        echo $l_i, ': ',__FUNCTION__, "\n";
    }; // 最後のセミコロンは必須です
    //
    $func();
    echo "\n";
}
func();
echo "\n";

// 引き継いだ変数は「初回に引き継いだタイミングの値」が保持されるので、「1度call、変数に変更を加えて再度call」しても、初回で引き継いだ値がそのまま使われる
$g_i = 100;
$func = function() use ($g_i)
{
    echo $g_i, ': ',__FUNCTION__, "\n";
}; // 最後のセミコロンは必須です
//
$func(); // 引き継いだ値は100
$g_i = 222;
$func(); // 222は使われず、初回で引き継いだ100がそのまま使われる
echo "\n";

// 「後で定義される変数」だとNotice が出る  "Notice: Undefined variable ..."
unset($g_i);
$func = function() use ($g_i)
{
    echo $g_i, ': ',__FUNCTION__, "\n";
}; // 最後のセミコロンは必須です
$g_i = 100;
echo "\n";

// 「変数の引き継ぎ」で、無名関数内での変更は、元の変数に影響されません(引数と一緒です)
$g_i = 100;
$func = function() use ($g_i)
{
    $g_i *= 2;
    echo $g_i, ': ',__FUNCTION__, "\n";
}; // 最後のセミコロンは必須です
var_dump($g_i);
$func();
var_dump($g_i);
echo "\n";

// オブジェクト(インスタンス)だと元の変数に影響が出るので、要件によっては注意
$g_o = new stdClass();
$func = function() use ($g_o)
{
    $g_o->test = __FUNCTION__;
    echo __FUNCTION__, "\n";
}; // 最後のセミコロンは必須です
var_dump($g_o);
$func();
var_dump($g_o);
echo "\n";

// 「変数の引き継ぎ」で、元の変数に影響を及ぼしたい(破壊したい)場合は、参照渡しで渡します
$g_i = 333;
$func = function() use (&$g_i)
{
    $g_i *= 3;
    echo $g_i, ': ',__FUNCTION__, "\n";
}; // 最後のセミコロンは必須です
var_dump($g_i);
$func();
var_dump($g_i);
echo "\n";


// PHP5.4以降、クラス(のメソッド)内で無名関数を定義した場合、$thisが自動的にバインドされます
// PHP5.4未満だと、$thisはUndefined variableになります
class Hoge
{
    public function test()
    {
        $func = function() {
            var_dump($this);
        };
        $func();
    }

    static public function s_test()
    {
        $func = function() {
            var_dump($this);
        };
        $func();
    }

}
//
$obj = new Hoge();
$obj->test();
//Hoge::s_test(); staticなcallだと、そもそも親に$thisがないので、これはエラーになる "Fatal error: Uncaught Error: Using $this when not in object context ...."
echo "\n";

// 「$thisへのバインド」を望まない場合、静的無名関数で宣言すると、バインドされなくなる
class Foo
{
    public function test()
    {
        $func = static function() {
            //var_dump($this); // エラーになる "Fatal error: Uncaught Error: Using $this when not in object context ..."
            echo __CLASS__, ':', __FUNCTION__ , "\n";
        };
        $func();
    }
}
//
$obj = new Foo();
$obj->test();

