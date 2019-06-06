<?php
/*
起動方法
php -S 0.0.0.0:8080
で動かすと、簡易にテストが可能です
 */

// バッファリングの開始
ob_start();

echo 'test';
header('X-test: test'); // テスト用のヘッダ出力: バッファリングしていないとエラーになる( Warning: Cannot modify header information - headers already sent by  )

ob_end_flush(); // バッファリングの終了：バッファ内容を出力
//ob_end_clean(); // バッファリングの終了：バッファ内容は出力しない
echo "\n";

// 幾分の応用
// 「バッファリングした出力を文字列に受け取れる」ので、例えば var_dumpの内容を「文字列として受け取る」事が出来る。

// バッファリングの開始
ob_start();

//
var_dump('test');

//
//$s = ob_get_contents() // 出力用バッファの内容を返す
//ob_end_clean(); // 出力用バッファをクリア(消去)し、出力のバッファリングをオフにする
// 上の2行は、以下の1行にまとめる事もできる
$s = ob_get_clean(); // 現在のバッファの内容を取得し、出力バッファを削除してオフにする
var_dump($s);
echo "\n";

// 応用：ob_startの引数に callable を指定すると「出力バッファがflushまたはclearされたタイミングで動かす関数」を登録出来る
ob_start(
    // 「出力するべき内容」をreturnする(と、出力される)
    function(string $buffer) {
        return "output data is {$buffer}";
    }
);

echo 'hogehoge';

ob_end_flush(); // バッファリングの終了：バッファ内容を出力
