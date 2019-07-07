<?php

// 初期処理
require_once('./initialize.php');

// 入力値の受け取り

// validateとCRUD
Model::insert($data);

// 画面への出力を含む終了処理
$template_file_name = 'sample.tpl';
require_once('./finalize.php');
