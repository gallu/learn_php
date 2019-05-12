<?php

// for文は「決まった回数、繰り返し処理をする」時に、よく使われます
$num = 10; // 繰り返す回数
for($i = 0; $i < $num; ++$i) {
    echo '.';
}
echo "\n";

// while文も繰り返し処理をします。forと同じ動きをさせることが出来ます
$num = 10; // 繰り返す回数
$i = 0;
while($i < $num) {
    echo '.';
    ++ $i;
}
echo "\n";

// whileで条件式がfalseだと、中の文は一度も実行されません
while(false) {
    echo "実行されません\n";
}

// do-whileを使うと、「最低でも1回は中の文を実行する」事ができます
do {
    echo "実行されます\n";
} while(false);

// 繰り返しの構文(正確には  for, foreach, while, do-while, switch の各構文)を「途中でやめる」ために、break文があります
$i = 0;
while(true) { // この書き方は「無限ループ」の書き方です
    ++ $i;
    // 10回繰り返したら
    if ($i >= 10) {
        break; // ループを抜ける
    }
    echo '.';
}
echo "\n";
// ネストしたloopの中でbreakを発行すると「1つだけ」ネストから抜けます
$j = 0;
while(true) { // この書き方は「無限ループ」の書き方です
    ++ $j;
    // 10回繰り返したら
    if ($j >= 10) {
        break; // ループを抜ける
    }
    echo '+';
    //
    $i = 0;
    while(true) { // この書き方は「無限ループ」の書き方です
        ++ $i;
        // 10回繰り返したら
        if ($i >= 10) {
            break; // ループを抜ける
        }
        echo '.';
    }
}
echo "\n";

// ネストしたloopを一気に抜けるには「break 抜ける数」と書きます
$j = 0;
while(true) { // この書き方は「無限ループ」の書き方です
    ++ $j;
    // 10回繰り返したら
    if ($j >= 10) {
        break; // ループを 2つとも 抜ける
    }
    echo '+';
    //
    $i = 0;
    while(true) { // この書き方は「無限ループ」の書き方です
        ++ $i;
        // 10回繰り返したら
        if ($i >= 10) {
            break 2; // ループを抜ける
        }
        echo '.';
    }
}
echo "\n";

// continueは「ループの先頭に処理を戻す」事ができます
for($i = 0; $i < 10; ++$i) {
    if (0 === ($i % 2)) {
        echo '*';
        continue;
    }
    echo '.';
}
echo "\n";

// continueも、breakと同様に「抜け出すloopの数」を指定できます
for($i = 0; $i < 10; ++$i) {
    if (0 === ($i % 2)) {
        echo '*';
        continue;
    }
    echo '.';
    for($j = 0; $j < 10; ++$j) {
        if (0 === ($i % 2)) {
            echo '-';
            continue 2;
        }
        echo '+';
    }
}
echo "\n";


// foreachは、主に配列を反復処理する時に使われます
// 実際には「インスタンス」に対してforeachをすることも可能ですが、それは後述します
echo "\n";
$awk = [1, 2, 3, 4, 5];
foreach($awk as $k => $v) {
    echo "{$k} => {$v}\n";
}
// $vに対して代入をしても「元の配列の値は変更されない」事に注意しましょう
var_dump($awk);
foreach($awk as $k => $v) {
    $v = $v * 2;
}
var_dump($awk);

