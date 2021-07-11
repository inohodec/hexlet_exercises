<?php

$last = function (string $var = "") {
    if (mb_strlen($var)) {
        return substr($var, -1);
    } else {
        return null;
    }
};

var_dump($last(''));        //null
var_dump($last('0'));       //0
var_dump($last('210'));     //0
var_dump($last('pow'));     //w
var_dump($last('kids'));    //s
$iol = 0;
