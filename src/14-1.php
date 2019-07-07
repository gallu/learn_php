<?php

// ジェネレータの実装例として「フィボナッチ数」を求めてみる
function Fibonacci() {
    $i = 1;
    $j = 1;
    while(true) {
        yield $i;
        $x = $j;
        $j = $i + $j;
        $i = $x;
    }
}

$i = 0;
foreach(Fibonacci() as $v) {
    echo $v, ", ";
    if (++$i > 30) {
        break;
    }
}
echo "\n";

