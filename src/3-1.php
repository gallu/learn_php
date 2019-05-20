<?php

// 定数の定義
// XXX 言語ルールではありませんが、慣習として「定数はすべて大文字で」かかれることが多いです
define('HOGE', 'string');
define('FOO', 100);
// 使い方
var_dump(HOGE);
var_dump(FOO);

// PHP5.6以降なら、配列も指定可能です
define('BAR', [1,2,3]);
var_dump(BAR);

// 定数の名前は「変数名と同じ」ルールになるので、「先頭1文字目の数字」はNGです
define('5HOGE', 'error');
//var_dump(5HOGE); // 宣言するときにではなく、使う時にエラーになる

// 先頭 __ は、「定義済みの定数」として使われている、または今後使われる可能性があるので、定義しないほうが安全です
define('__HOGE__', 'Undesirable');


// その定数が「定義されているかどうか」は、defined() 関数で確認できます
echo "HOGE is \n";
var_dump( defined('HOGE') );
echo "HHH is \n";
var_dump( defined('HHH') );
