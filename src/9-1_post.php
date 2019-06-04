<?php

/*
起動方法
php -S 0.0.0.0:8080
で動かすと、簡易にテストが可能です
 */

//var_dump($_POST);

/* 単体の項目の取得 */
// 一番単純な記法。割と危険(Noticeが出うる、など)
$test = $_POST['test'];
var_dump($test);
$t2 = $_POST['t2'];
var_dump($t2);

// 「空の可能性」を考慮した書き方、その１
$test = @$_POST['test'];
var_dump($test);
$t2 = @$_POST['t2'];
var_dump($t2);

// 「空の可能性」を考慮した書き方、その２(PHP7.0.0以降)
$test = $_POST['test'] ?? '';
var_dump($test);
$t2 = $_POST['t2'] ?? '';
var_dump($t2);

// 「空の可能性」と「型の不一致の可能性」を排除した書き方その１
$test = (string)($_POST['test'] ?? '');
var_dump($test);
$t2 = (array)($_POST['t2'] ?? []);
var_dump($t2);

// もう一つの書き方(「空の可能性」と「型の不一致の可能性」を排除した書き方その２)
$test = filter_input(INPUT_POST, 'test');
var_dump($test);
$t2 = filter_input(INPUT_POST, 't2', FILTER_DEFAULT, ['flags' => FILTER_REQUIRE_ARRAY]); // XXX (主にクラックで)スカラ値が与えられたらNULLになる
var_dump($t2);
$t2 = filter_input(INPUT_POST, 't2', FILTER_DEFAULT, ['flags' => FILTER_FORCE_ARRAY]); // XXX (主にクラックで)スカラ値が与えられたら配列にする(その１と同じ挙動)
var_dump($t2);

// 「正しい」出力方法
// htmlspecialchars
echo 'in XSS: ', $test, "<br>\n"; // XXX ダメな書き方。XSSになるから、絶対にこれをやってはいけない！！
echo 'ok 1: ', htmlspecialchars($test, ENT_QUOTES, 'UTF-8'), "<br>\n"; // XXX 実際は関数などで処理をまとめる
echo 'ok 2: ', htmlentities($test, ENT_QUOTES, 'UTF-8'), "<br>\n"; // XXX 実際は関数などで処理をまとめる

