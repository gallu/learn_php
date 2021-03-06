<?php

// 整数型。負の値を含む整数が扱えますが、最大値に制限があります
echo "整数型\n";
$i = 1;
var_dump($i);
// 整数型で扱える最大値を超える値を渡すと、内部で自動的に浮動小数点数に変換されます。
$i2 = PHP_INT_MAX + 1;
var_dump($i2);

// 実数。小数を含む値です。浮動小数点数になるので「精度があり」「誤差がある」点に注意しましょう
echo "\n";
echo "実数\n";
$f = 1.1;
var_dump($f);
printf("%f\n", $f);
printf("%.28f\n", $f);

// 論理型。trueまたはfalseのいずれかの値です。PHPでは大文字で書いても小文字で書いても認識します。
echo "\n";
echo "論理型\n";
$b = true;
var_dump($b);
$b = false;
var_dump($b);

// 文字列。文字を扱います。 
echo "\n";
echo "文字列\n";
// 引用符 で囲むと、引用符(')とバックスラッシュ(\)以外の全ての文字を「そのまま」出力します。
// 「文字として引用符を使いたい」場合は \' 、「文字としてバックスラッシュを使いたい」場合は \\ と記します。
$s1 = 'abc$e" \n \' \\ fin';
var_dump($s1);
// 二重引用符で囲むと、様々なエスケープ文字を扱えます。改行 \n やタブ \t はよく使われます。
$s2 = "abc \n ed fin";
var_dump($s2);
// 二重引用符は、{}で囲って中に$を書くと「変数を展開」してくれます。上述で使った $i と $f を使ってみます
$s3 = "i is {$i} and f is {$f}";
var_dump($s3);
// ヒアドキュメント構文 と呼ばれる書式です。「複数行ある文字列」の代入で使われる事があります。中の文字列の処理は、二重引用符と同じです。
$s4 = <<<EOT
Heredoc text.
i is {$i} and f is {$f}
EOT;
var_dump($s4);
// Nowdoc構文 と呼ばれる書式です。ヒアドキュメントと同じですが、文字列の処理が引用符と同じ、になります。EOTの前後に ' がある点に注目してください。
$s5 = <<<'EOT'
Nowdoc text.
i is {$i} and f is {$f}
EOT;
var_dump($s5);

// 配列。PHPでは、他言語で 配列/array/vector 等と呼ばれる「0から始まる数値keyの配列」と、他言語で 連想(hash)配列/map/hashmap などと呼ばれる「文字をkeyにした配列」の双方を「配列」として扱えます
echo "\n";
echo "配列\n";
// 通常の配列
$a1 = array(1,2,3,4,5); // 古い書式
var_dump($a1);
$a2 = [1,2,3,4,5]; // 新しい書式。PHP5.4以降のバージョンで使う事ができます
var_dump($a2);
// hash配列: 1行で書いてもよいですが、このように複数行で書く事のほうが多いようです
$a3 = array (
    "foo" => "bar",
    "bar" => "foo",
);
var_dump($a3);
$a4 = [
    "foo" => "bar",
    "bar" => "foo",
];
var_dump($a4);
// 混在させることも出来ます(あまり推奨されるものではありませんが)
$a5 = [
    1,
    "foo" => "bar",
    2,
    "bar" => "foo",
];
var_dump($a5);
// hashのkeyには「整数 または 文字列」が使えます。「数値に変換可能な文字列」は数値にキャストされてしまうので注意が必要です
// 実務的には「紛らわしい値は使わない」ようにするほうが安全でしょう
$a6 = [
    1 => 'int 1',
    '2' => 'string 2', // キャストされて、keyが「数値(整数)の2」になります
    's' => 'string s',
    3.14 => 'float 3.14', // キャストされて、keyが「整数の3」になります
    '4.12' => 'string 4.12', // これはキャストされません
    '05' => 'string 05', // これはキャストされません
];
var_dump($a6);

// オブジェクト。詳細はclassのところで学習します。インスタンス、と呼称される事もあります
echo "\n";
echo "オブジェクト\n";
$o = new stdClass();
var_dump($o);

// リソース。DB接続やファイルを扱う時などに出てきます。
echo "\n";
echo "リソース\n";
$r = fopen(__FILE__, 'r');
var_dump($r);

// NULL。PHPでは、nullは「固有の型」として扱われます。大文字小文字を区別しません。
echo "\n";
echo "NULL\n";
$n = null;
var_dump($n);

// コールバック。型としては、マニュアル表記では Callable や callback と記載されます。中身は Closure クラスのオブジェクト(インスタンス)になります。
echo "\n";
echo "コールバック\n";
$c = function() { echo 'hello world!'; }; // 今回は1行で書いてますが、実際には複数行で書かれる事が多いです
var_dump($c);
