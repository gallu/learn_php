<?php
declare(strict_types=1); // 強い型付け

// エラーを一通り非表示(本番環境でありがちなコード)
error_reporting(0);
ini_set('display_errors', '0');

// エラーを全て出力(開発環境でありがちなコード)
error_reporting(-1);
ini_set('display_errors', '1');

// Noticeエラー用
//var_dump($a);

// (PHPの内部関数を含む)全てのエラーで「例外を投げる」ように設定: 無名関数を使用
// XXX この設定だと「error_reportingでNoticeを出力する」場合、Noticeであっても例外を投げて終了させる
set_error_handler(
    function ($errno, $errstr, $errfile, $errline) {
        if (0 !== $errno & error_reporting()) {
            throw new ErrorException( $errstr, 0, $errno, $errfile, $errline);
        }
    }
);

// Noticeエラー用
//var_dump($a);

// 任意のエラーを発生させる
// XXX エラー種別はE_USER_*のみが指定可能
trigger_error('hoge error', E_USER_NOTICE);

