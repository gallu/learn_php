<?php
/*
起動方法
php -S 0.0.0.0:8080
で動かすと、簡易にテストが可能です
 */

// バッファリングの開始
ob_start();

// Content-typeを指定
header('Content-Type: image/gif');

// 画像本体を出力する
// XXX 今回は「ファイルを直接読み込む」。この部分は適宜変更
echo file_get_contents('./10-3.gif');


ob_end_flush(); // バッファリングの終了：バッファ内容を出力
