<?php

class Hoge {
    // コンストラクタ
    public function __construct() {
        echo __METHOD__ , "\n";
    }
    // デストラクタ
    public function __destruct() {
        echo __METHOD__ , "\n";
    }

    // 「存在しないメソッド」がcallされた時
    public function __call($name, $arguments)
    {
        echo "存在しないメソッド {$name} が呼ばれました\n";
        var_dump($arguments);
    }
    public static function __callStatic($name, $arguments)
    {
        echo "存在しない静的メソッド {$name} が呼ばれました\n";
        var_dump($arguments);
    }
    
    /* 存在しないプロパティへのアクセス */
    // 書き込み
    public function __set($name, $value)
    {
        //throw new \ErrorException('ダイレクトに代入すんな！！');
        echo "存在しない {$name} に書き込みをしようとしています\n";
    }
    // 読み込み
    public function __get($name)
    {
        //throw new \ErrorException('ダイレクトに読みだそうとすんな！！');
        echo "存在しない {$name} を読みだそうとしています\n";
        return null;
    }
    // 存在確認
    public function __isset($name)
    {
        //throw new \ErrorException('ダイレクトに存在確認すんな！！');
        echo "存在しない {$name} の存在確認をしています\n";
        return false;
    }
    // データの消去
    public function __unset($name)
    {
        //throw new \ErrorException('ダイレクトに消そうとすんな！！');
        echo "存在しない {$name} を削除しようとしています\n";
    }

    // シリアライズの時の処理
    // XXX resource型は保存できないので、resource型がプロパティにある時に除外される事が多い
    public function __sleep()
    {
        return ['v', 'w'];
    }
    // アンシリアライズの時の処理
    // XXX resource型は保存できないので、resource型がプロパティにある時に再接続処理などをする事が多い
    public function __wakeup()
    {
        echo __METHOD__ , "\n";
    }

    // 「文字列として」扱われた時の処理
    public function __toString()
    {
        return '文字列として処理したいの？';
    }

    // 「関数として」扱われた時の処理
    public function __invoke(...$param)
    {
        echo __METHOD__ , "\n";
        var_dump($param);
        return 'ret';
    }

public $v;
public $w;
public $x;
}

// コンストラクタ(作成時に動く)とデストラクタ(インスタンス破棄時に動く)
$obj = new Hoge();
//sleep(1);
unset($obj);

// 存在しないメソッドのcall
echo "\n";
$obj = new Hoge();
$obj->ttt();
$obj->ttt(1, 2, 3);
//
Hoge::yyy();
Hoge::yyy('a');

// 存在しないプロパティへのアクセスとの比較として、存在するほうへのアクセス
echo "\n";
$obj = new Hoge();
var_dump($obj);
$obj->v = 10;
var_dump($obj->v);
var_dump(isset($obj->v));
unset($obj->v);
var_dump($obj);
// 存在しないプロパティへのアクセス
echo "\n";
$obj->vv = 10;
var_dump($obj->vv);
var_dump(isset($obj->vv));
unset($obj->vv);

// シリアライズとアンシリアライズ
echo "\n";
$obj = new Hoge();
$obj->v = 10;
$obj->w = 'w';
$obj->x = 999;
var_dump($obj);

$s = serialize($obj);
var_dump($s);
$obj2 = unserialize($s);
var_dump($obj2);

// オブジェクトを「文字列として」扱いたい時の処理
echo "\n";
$obj = new Hoge();
echo $obj , "\n";

// オブジェクトを「関数」として扱いたい時の処理
echo "\n";
$r = $obj(1, 2, 3);
var_dump($r);


