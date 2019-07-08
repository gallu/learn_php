<?php

// 初期処理
require_once('./initialize.php');

class Sample2
{
    public function update()
    {
        // 入力値の受け取り

        // validateとCRUD
        $model = new Model();
        $model->update($data, $where);

        //
        $this->template_file_name = 'sample2.tpl';
    }
}

