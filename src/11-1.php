<?php
/*
起動方法
php -S 0.0.0.0:8080
で動かすと、簡易にテストが可能です
 */

// バッファリングの開始
ob_start();

// Cookieの設定
$name = 'rand';
$value = mt_rand(0, 9999);
//
echo "set value: {$value}<br>\n";

//
setcookie($name, $value); // ブラウザを閉じるまで有効なCookie
/*
setcookie($name, $value, time() + 60*60 ); // 「今から1時間」有効なCookie: 第三引数の「60*60」が1時間(を表す秒)
setcookie($name, $value, 0, '/' ); // ブラウザを閉じるまで有効なCookie。かつ、Cookieが「domain 配下の全てで有効」となる(昨今よくあるURIの設計時に有効)。
setcookie($name, $value, time() + 60*60, '/' ); // 「今から1時間」有効なCookie: 第三引数の「60*60」が1時間(を表す秒)。かつ、Cookieが「domain 配下の全てで有効」となる(昨今よくあるURIの設計時に有効)。
//
$secure = true;
$httponly = true;
setcookie($name, $value, 0, '/', '', $secure, $httponly); // ブラウザを閉じるまで有効なCookie。かつ、Cookieが「domain 配下の全てで有効」となる(昨今よくあるURIの設計時に有効)。かつ「HTTPS 接続の場合にのみクッキーが送信される」。かつ「HTTP を通してのみクッキーにアクセスできるようになる(JavaScriptからCookieを読めない：紳士協定)。
*/

// Cookieの読み込み(設定直後の情報は見れないので注意)
var_dump($_COOKIE);

ob_end_flush(); // バッファリングの終了：バッファ内容を出力
