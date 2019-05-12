<?php

// if文です。中の式が true になる場合に、if の直後にある文が実行されます。
if (true) {
    echo "実行されます\n";
}
if (false) {
    echo "実行されません\n";
}
if (1 === 1) {
    echo "実行されます\n";
}

// else で、「ifの式がfalseだった場合」の実行を指定することができます
if (true) {
    echo "実行されます\n";
} else {
    echo "実行されません\n";
}
if (false) {
    echo "実行されません\n";
} else {
    echo "実行されます\n";
}

// ifは入れ子にする(ネストする)事が出来ます
if (true) {
    echo "実行されます\n";
    if (true) {
        echo "さらに実行されます\n";
    }
}

// else ifによって「一番目のifの式がfalseだが、二番目の式がtrueの時」といった、少し複雑な判定をすることができます
// else ifとも、elseifとも、書く事ができます
if (1 === 2) {
    echo "実行されません\n";
} else if (1 === 3) {
    echo "実行されません\n";
} elseif (1 === 1) {
    echo "実行されます\n";
} else {
    echo "実行されません\n";
}
// 「一番はじめにtrueになったif」のみが有効になるので、書く順番には注意が必要です
if (1 == 1) {
    echo "実行されます\n";
} elseif (1 === 1) {
    echo "実行され ないので注意が必要です\n";
} else {
    echo "実行されません\n";
}

// 制御構造に関する別の構文
// 主に「HTMLにPHPを埋め込むとき」に、この構文が役に立つ事があります
// この書き方の時は「else if」は使えないため、必ず「elseif」と書く必要があります
if (1 == 5) :
    echo "実行されません\n";
elseif (1 == 1) :
    echo "実行されます\n";
else :
    echo "実行されません\n";
endif;


// switch文は、if-elseifを重ねて書きたいような時に、便利な事があります
$i = 10;
switch($i) {
    case 1:
        echo "実行されません\n";
        break;
    case 5:
        echo "実行されません\n";
        break;
    case 10:
        echo "実行されます\n";
        break;
}
// breakを書き忘れると危険なので注意しましょう
$i = 1;
switch($i) {
    case 1:
        echo "実行されます\n";
        break;
    case 5:
        echo "(ここも)実行されます\n";
        break;
    case 10:
        echo "(ここも)実行されます\n";
        break;
}



// caseのいずれにも引っかからない時ように「default」という文が実行されます
$i = 9;
switch($i) {
    case 1:
        echo "実行されません\n";
        break;
    case 5:
        echo "実行されません\n";
        break;
    case 10:
        echo "実行されません\n";
        break;
    default:
        echo "実行されます\n";
        break;
}

// switch文は「緩やかな比較( == )」であるために、注意が必要な場合があります
$i = '1a';
switch($i) {
    case 1:
        echo "(意図に反して)実行されます\n";
        break;
    case 5:
        echo "実行されません\n";
        break;
    case 10:
        echo "実行されません\n";
        break;
    case '1a':
        echo "(意図に反して)実行されません\n";
        break;
    default:
        echo "実行されません\n";
        break;
}


