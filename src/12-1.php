<?php

// 例外を発生させる関数
function hoge()
{
    throw new \ErrorException('ナンカなエラーだよ？');
}

// try-catch で囲まれていない場合
//hoge();

// 囲まれている場合
try {
    hoge();
} catch (\Throwable $e) { // XXX PHP7以降の書き方。PHP5系なら \Exception で受ける
    echo $e->getMessage();
    echo "\n";
    echo $e->getFile();
    echo "\n";
    echo $e->getLine();
    echo "\n";
} finally {
    // PHP5.5以降で有効
    echo "finally な処理\n";
}


