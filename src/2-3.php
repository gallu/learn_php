<?php


// スクリプトに渡された引数の配列。[0]にプログラム名、[1]以降にコマンドラインから渡された引数が入ります
echo "スクリプトに渡された引数の配列\n";
var_dump( $argv );

/*
 * 以下は全て「スーパーグローバル」と呼ばれ、プログラムのどの位置からでもアクセスすることが出来ます
 */

// サーバー情報および実行時の環境情報。アクセスしてきた相手の情報、現在実行しているプログラムの情報などが入ります
echo "\n";
echo "サーバー情報および実行時の環境情報\n";
var_dump( $_SERVER );

// 環境変数。
echo "\n";
echo "環境変数\n";
var_dump( $_ENV );

// グローバルスコープで使用可能なすべての変数への参照。「グローバルスコープ」については「5. 関数、および変数のスコープ」で学習します
echo "\n";
echo "グローバルスコープで使用可能なすべての変数への参照\n";
var_dump( $GLOBALS );

// 



/*
var_dump( $_GET );
var_dump( $_POST );
var_dump( $_FILES );
var_dump( $_SESSION );
var_dump( $_COOKIE );
*/
