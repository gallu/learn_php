<?php

// 代数演算子
$x = 10;
$y = 5;
echo "前提 x({$x}) 演算子 y({$y})\n";
//
echo "加算演算子\n";
$z = $x + $y;
var_dump( $z );
//
echo "減算演算子\n";
$z = $x - $y;
var_dump( $z );
//
echo "乗算演算子\n";
$z = $x * $y;
var_dump( $z );
//
echo "除算演算子\n";
$z = $x / $y;
var_dump( $z );
//
echo "剰余演算子(あまり)\n";
$z = $x % $y;
var_dump( $z );
//
echo "累乗演算子(PHP5.6以降)\n";
$z = $x ** $y;
var_dump( $z );
// 「文字」を代数演算子で計算すると、適当に数値にされます
echo "'10' + '20'\n";
$z = '10' + '20';
var_dump( $z );
echo "'10aaa' + 'bbb'\n"; // 一応計算されますが、PHP7.1以降だと "Notice: A non well formed numeric value encountered in ...."という警告が出ます
$z = '10aaa' + 'bbb';
var_dump( $z );


// 比較演算子
echo "\n";
echo "2 == 2 : ";
var_dump(2 == 2);
echo "2 == '2' : ";
var_dump(2 == '2');
echo "2 == '2a' (要注意構文) : ";
var_dump(2 == '2a');
echo "2 === 2 : ";
var_dump(2 === 2);
echo "2 === '2' : ";
var_dump(2 === '2');
echo "2 === '2a' : ";
var_dump(2 === '2a');
echo "10 > 10 : ";
var_dump(10 > 10);
echo "10 >= 10 : ";
var_dump(10 >= 10);
echo "10 < 10 : ";
var_dump(10 < 10);
echo "10 <= 10 : ";
var_dump(10 <= 10);
echo "1 <=> 10 (PHP7以降) : ";
var_dump(1 <=> 10);
echo "10 <=> 10 (PHP7以降) : ";
var_dump(10 <=> 10);
echo "11 <=> 10 (PHP7以降) : ";
var_dump(11 <=> 10);

// 代入演算子
echo "\n";
$i = 10;
var_dump($i);
// 「代入演算子(式)」は「代入した値」を値として返すので、「代入しつつ判定」といった記述が可能
var_dump( 10 === ($i = 10), $i);

// ビット演算
echo "\n";
$x = 10;
$y = 5;
echo "前提 x({$x}) 演算子 y({$y})\n";
//
echo "ビット積\n";
$z = $x & $y;
var_dump( $z );
//
echo "ビット和\n";
$z = $x | $y;
var_dump( $z );
//
echo "排他的論理和(XOR)\n";
$z = $x ^ $y;
var_dump( $z );
//
echo "否定(xを否定)\n";
$z = ~$x;
var_dump( $z );
//
echo "左シフト( << 1)\n";
$z = $x << 1;
var_dump( $z );
//
echo "右シフト( >> 1)\n";
$z = $x >> 1;
var_dump( $z );

// エラー制御演算子
// エラー制御演算子をつけると「その1行(正確にはその式)のエラー」のみを無視してくれます。
// XXX 原則「使ってはいけない」ものだと覚えておいてください
echo "\n";
echo "エラーを伴う関数のcall\n";
@fopen('hoge', 'r'); // 本来なら "Warning: fopen(hoge): failed to open stream: No such file or directory in ........"が出る

// 実行演算子
echo "\n";
echo "uuidgen -r の実行\n";
$s = `uuidgen -r`;
var_dump($s);
// shell_exec() で同じ事が出来ます
$s = shell_exec('uuidgen -r');
var_dump($s);

// 加算子/減算子
// 前置と後置で値が変わりうるので気をつけましょう
echo "\n";
$i = 10;
echo '$i   : ';
var_dump( $i );
echo '++$i : ';
var_dump( ++$i );
echo '$i++ : ';
var_dump( $i++ );
echo '$i   : ';
var_dump( $i );
echo '--$i : ';
var_dump( --$i );
echo '$i-- : ';
var_dump( $i-- );
echo '$i   : ';
var_dump( $i );
// 文字列も操作可能ですが、動きに気をつけながら行いましょう
$s = 'a';
echo "a から\n";
var_dump( ++$s );
var_dump( ++$s );
var_dump( ++$s );
$s = 'y';
echo "y から\n";
var_dump( ++$s );
var_dump( ++$s );
var_dump( ++$s );

// 論理演算子
// booleanな値の演算です。主にif文などで使われるでしょう
// and && と or || が二種類あるのは、演算子の優先順位が異なるから、になります。が、それよりは括弧を適切に使うとよいでしょう
echo "\n";
echo "true && true : ";
var_dump(true and true);
echo "true and true : ";
var_dump(true && true);
echo "true && false : ";
var_dump(true and false);
echo "true || true : ";
var_dump(true || true);
echo "true or true : ";
var_dump(true or true);
echo "true || false : ";
var_dump(true || false);
echo "false || false : ";
var_dump(false || false);
echo "!true : ";
var_dump( !true );
echo "!false : ";
var_dump( !false );
echo "true xor true : ";
var_dump(true xor true);
echo "false xor true : ";
var_dump(false xor true);
echo "false xor false : ";
var_dump(false xor false);

// 文字列結合
echo "\n";
$s = 'string' . ' hoge';
var_dump($s);
// 数値が入っても「文字として」結合されます
$s = 'string' . 100;
var_dump($s);
$s = 100 . 100;
var_dump($s);

// 配列演算子
echo "\n";
// 結合(+)は、 2-5.php でやったので省略します
// 比較
$awk = [
    'key1' => 'val',
    'key2' => 'val',
    'key3' => 'val',
];
$awk2 = [
    'key2' => 'val',
    'key1' => 'val',
    'key3' => 'val',
];
$awk3 = [
    'key1' => 'val',
    'key2' => 'val',
    'key3' => 'val',
];
$awk_error = [
    'key1' => 'val1',
    'key2' => 'val2',
    'key3' => 'val3',
];
$awk_error_2 = [
    'key1' => 'val',
];
// == は「keyとvalueのペア」が等しければtrue
echo '同じフォーマットの比較(==) : ';
var_dump( $awk == $awk3 );
echo 'keyとvalueのペアは等しいが順番が違う場合(==) : ';
var_dump( $awk == $awk2 );
echo 'keyとvalueのペアが等しくない場合(==) : ';
var_dump( $awk == $awk_error );
var_dump( $awk == $awk_error_2 );
echo '同じフォーマットの比較(===) : ';
var_dump( $awk === $awk3 );
echo 'keyとvalueのペアは等しいが順番が違う場合(===) : ';
var_dump( $awk === $awk2 );
echo 'keyとvalueのペアが等しくない場合(===) : ';
var_dump( $awk === $awk_error );
var_dump( $awk === $awk_error_2 );

// 型演算子
// インスタンス(後述)が「特定のクラスに属しているか」を調べる事が出来ます
echo "\n";
class Hoge {}
class Foo extends Hoge {}
class Bar {}
//
$hoge = new Hoge(); 
$foo = new Foo(); 
echo "Hogeインスタンスに対して instanceof Hoge :";
var_dump($hoge instanceof Hoge);
echo "Hogeインスタンスに対して instanceof Foo :";
var_dump($hoge instanceof Foo);
echo "Hogeインスタンスに対して instanceof Bar :";
var_dump($hoge instanceof Bar);
echo "Fooインスタンスに対して instanceof Hoge :";
var_dump($foo instanceof Hoge);
echo "Fooインスタンスに対して instanceof Foo :";
var_dump($foo instanceof Foo);
echo "Fooインスタンスに対して instanceof Bar :";
var_dump($foo instanceof Bar);
