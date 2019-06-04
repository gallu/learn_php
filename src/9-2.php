<?php

/*
起動方法
php -S 0.0.0.0:8080
で動かすと、簡易にテストが可能です
*/

//var_dump($_FILES);
//var_dump($_FILES['test']); // １ファイルの場合
//var_dump($_FILES['t2']); // 複数ファイルの場合

//
if (true ===isset($_FILES['test'])) {
    echo "使ってよい情報：実ファイルが存在している場所(テンポラリファイル(プログラム終了時に消えるファイル)なので、このプログラム内で処理する事):<br>\n";
    var_dump($_FILES['test']['tmp_name']);
    echo "<br>\n";

    echo "使ってよい情報：エラーの有無(int(0)ならエラーなし)<br>\n";
    var_dump($_FILES['test']['error']);
    echo "<br>\n";
    //
    echo "上述以外の、nameやtypeは使ってはいけない<br>\n";
    echo "<br>\n";
    // ファイルの確認：不要ともいわれているので、必須ではない(古いPHPだと必要だった)
    if (true === is_uploaded_file($_FILES['test']['tmp_name'])) {
        echo "ファイル確認ok<br>\n";
    } else {
        echo "ファイル確認 失敗<br>\n";
        exit;
    }
    // ファイルを移動させる。移動先のファイル名は「自力で、かぶらないものを作成する」とよい
    // ファイルの実在には、例えば is_file() などが使える
    // ファイルが存在した場合「警告を出さずに上書き」するので、仕様によっては注意
    //move_uploaded_file($_FILES['test']['tmp_name'], $移動先のファイル名); // サンプルコードなのでコメントアウトしている

}
