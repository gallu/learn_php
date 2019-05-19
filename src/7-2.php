<?php
declare(strict_types=1); // 強い型付け

//
$t = microtime(true);

// 「プログラム終了時」に動くコードの設定
register_shutdown_function(
    function() {
        echo "code end\n";
        echo microtime(true) -  $GLOBALS['t'], "\n";
    }
);

// 「キャッチされない例外」を拾うための設定
set_exception_handler(
    //function (Exception $e) { // PHP5系の場合
    function (Throwable $e) { // PHP7系(以降)の場合
        echo 'get message: ' , $e->getMessage(), "\n";
    }
);

// キャッチされない例外を投げる
throw new Exception('test Exception');
