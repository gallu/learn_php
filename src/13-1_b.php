<?php

// 基本的なclass: メソッド
class クラスA
{
    // クラス内関数(メソッド)
    public function 公開メソッド()
    {
        echo "クラスA#公開メソッド\n";
        $this->継承クラス内公開メソッド();
        $this->非公開メソッド();
    }
    //
    protected function 継承クラス内公開メソッド()
    {
        echo "クラスA#継承クラス内公開メソッド\n";
    }
    private function 非公開メソッド()
    {
        echo "クラスA#非公開メソッド\n";
    }


}

//
$obj = new クラスA();
$obj->公開メソッド();
//$obj->継承クラス内公開メソッド(); // Fatal error: Uncaught Error: Call to protected method クラスA::継承クラス内公開メソッド() ...
//$obj->非公開メソッド(); // Fatal error: Uncaught Error: Call to private method クラスA::非公開メソッド() ...


// 基本的なclass：プロパティ
class クラスB
{
    //
    public function set非公開変数($v)
    {
        $this->非公開変数 = $v;
    }
    public function get非公開変数()
    {
        return $this->非公開変数;
    }
    //
    public function set継承クラス内公開変数($v)
    {
        $this->継承クラス内公開変数 = $v;
    }
    public function get継承クラス内公開変数()
    {
        return $this->継承クラス内公開変数;
    }


public $公開変数;
protected $継承クラス内公開変数;
private $非公開変数;
}

//
echo "\n";
$obj = new クラスB();
// publicは触れる
$obj->公開変数 = 'pub';
echo $obj->公開変数, "\n";
// protected / privateは、外からは触れない
//$obj->継承クラス内公開変数 = 'pro'; // Fatal error: Uncaught Error: Cannot access protected property クラスB::$継承クラス内公開変数 ...
//$obj->非公開変数 = 'pri'; // Fatal error: Uncaught Error: Cannot access private property クラスB::$非公開変数 ...

// (publicな)メソッド経由なら触れる：これをアクセサ(セッター/ゲッター)と呼称する
$obj->set継承クラス内公開変数('pro');
echo $obj->get継承クラス内公開変数(), "\n";
$obj->set非公開変数('pri');
echo $obj->get非公開変数(), "\n";


// 「クラスを継承」すると、親メソッド/プロパティを「引き継ぐ」事ができます
class 継承クラスA extends クラスA
{
    public function 公開メソッド2()
    {
        $this->継承クラス内公開メソッド();
        //$this->非公開メソッド(); // Fatal error: Uncaught Error: Call to private method クラスA::非公開メソッド() ...
    }
}

//
echo "\n";
$obj = new 継承クラスA();
$obj->公開メソッド();
//$obj->公開メソッド2(); // Fatal error: Uncaught Error: Call to private method クラスA::非公開メソッド() ...


// 静的(static)メソッド
class クラスC
{
    //
    public function 非静的メソッド()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
    //
    public static function 静的メソッド()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
}
//
echo "\n";
//クラスC::非静的メソッド(); // Deprecated: Non-static method クラスC::非静的メソッド() should not be called statically in ...
クラスC::静的メソッド();
//
$obj = new クラスC();
$obj->非静的メソッド();
$obj->静的メソッド(); // XXX エラーにはならない


// インタフェース
interface インタフェースA
{
    public function 実装A();
    //protected function 実装B(); // Fatal error: Access type for interface method インタフェースA::実装B() must be omitted in ...
    //private function 実装C(); // Fatal error: Access type for interface method インタフェースA::実装C() must be omitted in ...
}
// インタフェースを実装する
class インタフェース実装クラスA implements インタフェースA
{
    //
    public function 実装A()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
}
//
echo "\n";
$obj = new インタフェース実装クラスA();
$obj->実装A();


// 抽象クラス
abstract class 抽象クラスA
{
    abstract public function 実装A();
    abstract protected function 実装B();
    //abstract private function 実装C(); // Fatal error: Abstract function 抽象クラスA::実装C() cannot be declared private in 
    //
    public function hoge()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
//
private $foo;
}
// 抽象クラスを実装する
class 抽象クラスを実装A extends 抽象クラスA
{
    public function 実装A()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
    protected function 実装B()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
}
//
echo "\n";
$obj = new 抽象クラスを実装A();


// trait(PHP5.4+)
trait トレイト
{
    public function トレイトメソッド()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
}
// トレイトを使うクラス
class トレイト入りクラス
{
    use トレイト;

    //
    public function メソッド()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
}
//
echo "\n";
$obj = new トレイト入りクラス();
$obj->トレイトメソッド();
$obj->メソッド();


