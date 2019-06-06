<?php
/*
起動方法
php -S 0.0.0.0:8080
で動かすと、簡易にテストが可能です
 */

// バッファリングの開始
ob_start();

/*
// 設定周り：変えたり変えなかったり
ini_set('session.name', 'PHPSESSID'); // Cookieに設定されるセッションIDの名前
ini_set('session.gc_probability', 1); // session.gc_probabilityと session.gc_divisorの組み合わせでgc （ガーベッジコレクション）ルーチンの始動を制御します： サンプルだと 1/100 回、gcが起動します
ini_set('session.gc_divisor', 100); // session.gc_probabilityと session.gc_divisorの組み合わせでgc （ガーベッジコレクション）ルーチンの始動を制御します： サンプルだと 1/100 回、gcが起動します
ini_set('session.gc_maxlifetime', ); // データが 'ごみ' とみなされ、消去されるまでの秒数を指定します
//ini_set('session.entropy_file', '/dev/urandom'); // セッションIDを作成する際の別のエントロピーソースとして使用する 外部リソースへのパス。PHP 7.1.0 で削除されました。
//ini_set('session.entropy_length', 32); // session.entropy_fileから 読みこむバイト数。PHP 7.1.0 で削除されました。
//ini_set('session.hash_function', 1); // セッション ID を生成するために使用されるハッシュアルゴリズムを指定することが可能です。 '0' は MD5 (128 ビット) で、'1' は SHA-1 (160 ビット) を意味します。PHP 7.1.0 で削除されました。 
//ini_set('session.hash_bits_per_character', 5); // バイナリのハッシュデータを何らかの可読なデータに変換する際、 それぞれの文字に何ビットストアさせるかを定義することが可能です。 指定可能な値は、'4' (0-9, a-f)、'5' (0-9, a-v) そして '6' (0-9, a-z, A-Z, "-", ",") です。PHP 7.1.0 で削除されました。 
ini_set('session.use_strict_mode', 'On'); //  厳格なセッション ID モード： 有効にすると、初期化していないセッション ID を受け付けなくなります。
ini_set('session.cookie_lifetime', 0); // ブラウザに送信するクッキーの有効期間を秒単位で指定します。 0 を指定すると "ブラウザを閉じるまで" という意味になります。 
ini_set('session.cookie_secure', 'Off'); // セキュアな接続を通じてのみCookieを送信できるかどうかを指定します。
ini_set('session.cookie_httponly', 'On'); // セッションのクッキーに対して、HTTP を通してのみアクセスできるようにします。
ini_set('session.cookie_samesite', 'Strict'); // クロスサイトリクエストで、サーバーにクッキーを送信しないよう指示できるようにします。 これを用いると、ユーザーエージェントによる生成元とは異なる場所への情報漏洩のリスクを軽減できます。 PHP 7.3.0～
ini_set('session.sid_length', 40); // セッション ID 文字列の長さを指定します。 PHP 7.1.0～
ini_set('session.sid_bits_per_character', 5); //  エンコードされたセッション ID 文字のビット数を指定します。指定できる値は '4' (0-9, a-f)、'5' (0-9, a-v)、'6' (0-9, a-z, A-Z, "-", ",") です。 PHP 7.1.0～
*/

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
