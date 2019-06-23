<?php

// 自分で例外の実装も出来る
class HogeErrorException extends \ErrorException
{
}



// 例外を発生させる関数
function hoge()
{
    //throw new \HogeErrorException('ナンカなエラーだよ？');
    throw new \ErrorException('ナンカなエラーだよ？');
    //throw new \Exception('ナンカなエラーだよ？');
}


// 囲まれている場合
// 上から順番に引っかかる
try {
    hoge();
/*
// ここを有効にすると、 HogeErrorException にはゼッタイに入らない
} catch (\ErrorException $e) {
    echo "ErrorException\n";
*/
} catch (\HogeErrorException $e) {
    echo "HogeErrorException\n";
} catch (\ErrorException $e) {
    echo "ErrorException\n";
} catch (\Exception $e) {
    echo "Exception\n";
} catch (\Throwable $e) { // XXX PHP7以降の書き方。PHP5系なら \Exception で受ける
    echo "Throwable\n";
    echo $e->getMessage();
    echo "\n";
}

echo "--------------\n";

// PHP7.1以降だと「いくつか例外をまとめてcatchする」事ができる
try {
    hoge();
//} catch (\HogeErrorException  $e) { こっちで ErrorException や Exception がthrowされると、Throwableでキャッチされる
} catch (\HogeErrorException | ErrorException | Exception $e) {
    echo "HogeErrorException\n";
} catch (\Throwable $e) { // XXX PHP7以降の書き方。PHP5系なら \Exception で受ける
    echo "Throwable\n";
    echo $e->getMessage();
    echo "\n";
}

