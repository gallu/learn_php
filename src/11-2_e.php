<?php
/*
起動方法
php -S 0.0.0.0:8080
で動かすと、簡易にテストが可能です
 */

//
class SessionHandler implements \SessionHandlerInterface
{
    /**
     * open: session_start() が実行されたりしたときにコール。多くは、なにもしない
     */
    public function open($save_path, $name): bool
    {
        return true;
    }

    /**
     * close: セッションを閉じるときに自動的にコール。多くは、なにもしない
     */
    public function close(): bool
    {
        return true;
    }

    /**
     * read: セッションデータの読み込み
     */
    public function read($session_id): string
    {
    }

    /**
     * write: セッションデータの書き込み
     */
    public function write($session_id, $session_data): bool
    {
    }

    /**
     * destroy: セッションの破棄
     */
    public function destroy($session_id): bool
    {
    }

    /**
     * gc: 時間経過によるセッションのお掃除
     */
    public function gc($maxlifetime): bool
    {
    }
}

// バッファリングの開始
ob_start();

// セッションの保存や読み込みを「自力で制御したい」場合用。多くはDBやKVSなどに入れる
session_set_save_handler(new SessionHandler());

// sessionの開始
session_start();

// sessionの読み込み(設定前情報)
var_dump($_SESSION);
echo "<br>\n";

// 値の設定
$name = 'rand';
$value = mt_rand(0, 9999);
//
echo "set value: {$value}<br>\n";
$_SESSION[$name] = $value;

// sessionの読み込み(設定直後の情報も見れる)
var_dump($_SESSION);

ob_end_flush(); // バッファリングの終了：バッファ内容を出力


