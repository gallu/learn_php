<?php

function hoge(int $i)
{
    return $i * 2;
}

hoge(1); // OK
hoge('1'); // エラーにならない

