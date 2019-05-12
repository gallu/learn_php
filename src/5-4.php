<?php

// includeはファイルを読み込みます。ファイルが存在しなくてもエラーになりません
// 警告は出るので、出したくない場合は「エラー抑止演算子(@)」を使うとよいでしょう
include('./5-4.include');
include_once('./5-4.include_once');
//include('./5-4.no_include'); // こちらは警告が出る "arning: include(./5-4.no_include): failed to open stream: No such file or directory in ...."
@include('./5-4.no_include'); // こう書くとエラーが出ない

// _onceは「何回callしても1度しか読み込みません」が、includeは「何度でも読み込みます」
include('./5-4.include');
include_once('./5-4.include_once');

// requireはファイルを読み込みます。ファイルが存在しないとエラーになり、そこでプログラムが停止します
echo "\n";
require('./5-4.require');
require_once('./5-4.require_once');
//require('./5-4.no_require'); // エラーで処理が止まる "Fatal error: require(): Failed opening required './5-4.no_require' 

// _onceは「何回callしても1度しか読み込みません」が、requireは「何度でも読み込みます」
require('./5-4.require');
require_once('./5-4.require_once');





