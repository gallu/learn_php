<?php

// privateプロパティは「同じクラス」であれば「別インスタンス」でも触れる
// XXX 乱用する技術ではないので注意
class クラスA
{
    public function set($o, $v)
    {
        $o->非公開変数 = $v;
    }
    public function get($o)
    {
        return $o->非公開変数;
    }
private $非公開変数;
}
//
$obj = new クラスA();
$obj2 = new クラスA();
// これは「自分のインスタンスのデータアクセス
$obj->set($obj, 10);
echo $obj->get($obj), "\n";
// これは「自分ではないインスタンスのデータアクセス
$obj->set($obj2, 'sss');
echo $obj->get($obj2), "\n";


// 「クラスを継承」で親メソッドを呼びたい時はparent::を使う
class 継承クラスA extends クラスA
{
    public function set($o, $v)
    {
        parent::set($o, $v);
        echo "継承先メソッドをcall\n";
    }
}
//
echo "\n";
$obj = new 継承クラスA();
$obj->set($obj, 10);
echo $obj->get($obj), "\n";


// 静的なメソッドで「自分自身」を呼ぶ時は、selfまたはstatic。staticのほうが適切(PHP5.3＋)
// 遅延静的束縛 (Late Static Bindings)
class クラスC
{
    //
    protected static function 静的メソッド()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
    protected static function 静的メソッド2()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
    public static function call_1()
    {
        echo "self:: でcall\n";
        self::静的メソッド();
        self::静的メソッド2();
    }
    public static function call_2()
    {
        echo "static:: でcall\n";
        static::静的メソッド();
        static::静的メソッド2();
    }
}
//
class 継承クラスC extends クラスC
{
    protected static function 静的メソッド2()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
}
//
echo "\n";
クラスC::call_1();
クラスC::call_2();
echo "\n";
継承クラスC::call_1();
継承クラスC::call_2();


// インタフェースは多重継承が出来る
// インタフェース
interface インタフェースA
{
    public function 実装A();
}
interface インタフェースB
{
    public function 実装B();
}
// インタフェースを実装する
class インタフェース実装クラスA implements インタフェースA, インタフェースB
{
    //
    public function 実装A()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
    //
    public function 実装B()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
}
//
echo "\n";
$obj = new インタフェース実装クラスA();
$obj->実装A();
$obj->実装B();


// トレイトは複数使える
trait トレイトA
{
    public function トレイトメソッド()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
}
trait トレイトB
{
    public function トレイトメソッド()
    {
        echo __CLASS__ , ':', __METHOD__ , "\n";
    }
}

// トレイトを使うクラス
class トレイト入りクラス
{
    //
    //use トレイト, トレイトB; // Fatal error: Trait method トレイトメソッド has not been applied, because there are collisions with other trait methods on トレイト入りクラス in ...
    use トレイトA, トレイトB {
        トレイトA::トレイトメソッド insteadof トレイトB; // 「トレイトメソッド」は、トレイトAのほうを使う
        トレイトB::トレイトメソッド as トレイトBメソッド; // 「トレイトB::メソッド」には、トレイトBメソッドという別名をつけておく
    }

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
$obj->トレイトBメソッド();
$obj->メソッド();
