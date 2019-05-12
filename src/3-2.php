<?php

namespace baz;

echo 'ファイルの行数 ' . __LINE__ . "\n";
echo 'ファイル名 ' . __FILE__ . "\n";
echo 'ファイルの存在するディレクトリ名 ' . __DIR__ . "\n";

//
function hoge()
{
    echo '関数名 ' . __FUNCTION__ . "\n";
}
hoge();


trait foo
{
    public function f()
    {
        echo 'トレイト名 ' . __TRAIT__ . "\n";
    }
}

//
class bar
{
    // トレイトの使用
    use foo;

    public function b()
    {
        echo 'クラス名 ' . __CLASS__ . "\n";
        echo '(クラスの)メソッド名 ' . __METHOD__ . "\n";
        echo '名前空間名 ' . __NAMESPACE__ . "\n";
    }

}
$o = new bar();
$o->f();
$o->b();

//
echo '完全修飾のクラス名 ' . bar::class . "\n";
