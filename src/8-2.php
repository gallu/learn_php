<?php
declare(strict_types=1); // 強い型付け

// PHPの内部関数であっても、可変関数として使う事ができる
$s = 'fopen';
$fp = $s(__FILE__, 'r');
var_dump($fp);

// echo, printなどは「関数ではなく 言語構造」のため、可変関数として扱えない
$s = 'echo';
//$s('test'); // エラー "Fatal error: Uncaught Error: Call to undefined function echo() in ... "


