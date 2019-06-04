<?php
//declare(strict_types=1);

// 「条件付きの関数定義」も可能です。その場合、条件が満たされない限り関数は定義されません。
//func_conditionally(); // ここではまだcallできません(条件が満たされていないので)
if (!function_exists('func_conditionally')) {
    function func_conditionally()
    {
       echo __FUNCTION__ , "\n";
    }
}
func_conditionally(); // ここではcall可能です
echo "\n";

// 引数に「デフォルトの値」を設定することも出来ます
function func_4($a = 100)
{
    echo __FUNCTION__ , ': ', $a, "\n";
}
func_4(20);
func_4();
echo "\n";

// デフォルトの引数について。「デフォルト値を有する引数はデフォルト値がない引数の右側に全てある必要がある」点に注意しましょう。
// 関数定義ではなく、使用時にエラーが判明します
function func_5_e($a = 100, $b) {
    echo __FUNCTION__ , ': ', $a + $b, "\n";
}
func_5_e(100, 200); // この使い方だと(結果的に)エラーは発生しません
//func_5_e(200); // この使い方だとエラーが発生します "Fatal error: Uncaught ArgumentCountError: Too few arguments to function func_5_e(), 1 passed ...."
echo "\n";

// これはOKです
function func_5($a, $b = 200) {
    echo __FUNCTION__ , ': ', $a + $b, "\n";
}
func_5(100);
func_5(100, 999);
echo "\n";

// 「全部デフォルトがある」は、勿論OKです
function func_6($a = 100, $b = 200) {
    echo __FUNCTION__ , ': ', $a + $b, "\n";
}
func_6();
func_6(20);
func_6(20, 30);
echo "\n";

// 「引数の値を変更したい(破壊したい)場合」は、引数に&をつけて参照渡しにする必要があります
// 参照渡しは、比較的「好まれない事が多い」ので注意しましょう
$g_i = 10;
function func_8(&$a)
{
    $a += 100;
    echo __FUNCTION__ , ': ', $a , "\n";
}
func_8($g_i);
echo $g_i, "\n";
echo "\n";

// クラスオブジェクト(インスタンス)は「元々の値が参照」なので、関数側で参照渡しをしなくても「関数内で値を変更(破壊)出来る」ので、注意が必要です
$g_obj = new stdClass();
var_dump($g_obj);
function func_9($obj)
{
    $obj->test = __FUNCTION__;
}
func_9($g_obj);
var_dump($g_obj);
echo "\n";

// 可変長引数がサポートされています
function func_10()
{
    // 引数の取得には func_get_args() を使うとよいでしょう
    $params = func_get_args();
    echo __FUNCTION__ , "\n";
    var_dump($params);
}
func_10();
func_10(1);
func_10(1, 'aaa');
echo "\n";

// PHP5.6以降の場合、 ... トークンを使って引数を受け取る事もできます
function func_11(...$params)
{
    echo __FUNCTION__ , "\n";
    var_dump($params);
}
func_11();
func_11(1);
func_11(1, 'aaa');
echo "\n";

// 引数には型宣言(PHP5の頃はタイプヒンティングと呼ばれてました)をする事もできます
// PHP5.0.0またはPHP5.1.0以降で可能な型宣言
function func_12(stdClass $a, array $b)
{
    echo __FUNCTION__ , "\n";
}
func_12(new stdClass, []);
//func_12('string', []); エラーになります "Fatal error: Uncaught TypeError: Argument 1 passed to func_12() must be an instance of stdClass, ............."
echo "\n";

// PHP5.4.0以降で可能な型宣言
function func_13(callable $a)
{
    echo __FUNCTION__ , "\n";
}
func_13('func_12'); // 存在する関数なのでOK
//func_13('func_hoge'); // 存在しない関数なのでNG
//func_13([]); // callableではないのでNG
func_13( function() {;} ); // 無名関数なのでOK
echo "\n";

// PHP7.0.0以降で可能な型宣言
function func_14(bool $a, float $b, int $c, string $d)
{
    echo __FUNCTION__ , "\n";
}
func_14(true, 1.1, 2, 'string');
func_14(true, 1.1, '2', 'string'); // 「変換可能」な場合、型をキャストして受け取れられるので要注意。declare(strict_types=1); が宣言されていればエラーになる
func_14('1', '1e2', '2a', 333); // strict_typesが宣言されていなければ、結果的にこれも通る(全てキャストされている): int は Notice が出る
echo "\n";

// PHP7.1.0以降で可能な型宣言
// iterableは「配列、またはTraversable instanceof(foreachで使えるインタフェース)」なら許可される
function func_15(iterable $a)
{
    echo __FUNCTION__ , "\n";
}
func_15([]); // 配列なのでOK
func_15(new arrayObject()); // arrayObjectは「implements IteratorAggregate(IteratorAggregate は  extends Traversable)」なのでOK
echo "\n";


// PHP7.0.0以降、戻り値にも型宣言が出来ます
function func_r_2(): string
{
    return __FUNCTION__ . ': return';
}
$v = func_r_2();
var_dump($v);
echo "\n";


// 「違う型」をreturnした場合、通常はキャスト、強い型付けをしていたらエラー、となります
function func_r_3(): string
{
    echo __FUNCTION__ , "\n";
    return 100;
}
$v = func_r_3();
var_dump($v);
echo "\n";

