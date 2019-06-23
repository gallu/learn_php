<?php

/*
 * ディープコピー(Deep Copy)
 */

class Hoge
{
    //
    public function __clone()
    {
        echo __METHOD__ , "\n";
        // 実際に必要な処理
        $this->obj = clone $this->obj;
    }
    
    public $obj;
    public $v;
}

class Foo
{
    public $v;
}

// インスタンスの生成
$h = new Hoge();
$f = new Foo();
// 値の代入(Hogeにはオブジェクトを入れる)
$f->v = 10;
$h->obj = $f;
$h->v = 'vvv';

// インスタンスの状態の表示
var_dump($h);

// インスタンスのcloneによる複製
$h2 = clone($h);
var_dump($h2);

// $h2の中身の変更(問題ないほう)
$h2->v = 'www';
var_dump($h2);

// $hの中身の変更(問題が無くなった)
echo "\n";
var_dump($h);
$h->obj->v = 'vvv';
var_dump($h2); // h2のほうは変更していないので変更されていない)
