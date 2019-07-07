<?php

// 初期処理
require_once('./initialize.php');

class Sample
{
    public function index()
    {
        // 入力値の受け取り

        // validateとCRUD
        Model::insert($data);

        //
        $this->template_file_name = 'sample.tpl';
    }
}

