<?php
declare(strict_types=1); // 強い型付け

function hoge(int $i)
{
    return $i * 2;
}

hoge(1); // OK
hoge('1'); // NG "Fatal error: Uncaught TypeError: Argument 1 passed to hoge() must be of the type int, string given, called in .........."

