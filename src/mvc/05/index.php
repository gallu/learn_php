<?php

// 初期処理
require_once('./initialize.php');

// 主処理(ルーティング)
$obj = new Sample();
$obj->index();

// 画面への出力を含む終了処理
$template_file_name = $obj->template_file_name;
require_once('./finalize.php');
