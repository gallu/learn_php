<?php

// 初期処理
require_once('./initialize.php');

// 主処理(ルーティング)
if (sampleを使いたいURIなら) {
    $class = 'Sample';
    $method = 'index';
} else if (sampleを使いたいURIなら) {
    $class = 'Sample2';
    $method = 'update';
}

// 実際に呼ぶ
$obj = new $class();
$obj->$method();

// 画面への出力を含む終了処理
$template_file_name = $obj->template_file_name;
require_once('./finalize.php');
