<?php
/*
起動方法
php -S 0.0.0.0:8080
で動かすと、簡易にテストが可能です
 */

// バッファリングの開始
ob_start();

/*
// Location: 指定されたURIに移動させる
$uri = 'https://www.google.com/';
header("Location: {$uri}"); // デフォルトは302
header("Location: {$uri}", true, 301); // 301 statusで移動させる
*/

/*
// Content-typeを指定して出力する
// 画像
header('Content-Type: image/jpeg'); // jpeg

// PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="downloaded.pdf"'); // ファイル名の指定

// CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="downloaded.csv"'); // ファイル名の指定
*/

ob_end_flush(); // バッファリングの終了：バッファ内容を出力
