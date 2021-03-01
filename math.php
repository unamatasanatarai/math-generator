<?php
function surroundRand($low, $hi){
    $num = rand($low, $hi);
    return surround($num);
}

function surround($num){
    return $num >= 0
        ? $num
        : "($num)";
}

function subtraction($low, $hi, $count){
    return simple($low, $hi, $count, ["-"]);
}

function addition($low, $hi, $count){
    return simple($low, $hi, $count, ["+"]);
}

function addsub($low, $hi, $count){
    return simple($low, $hi, $count, ["+", "-"]);
}

function asmd($low, $hi, $count){
    $r = simple($low, $hi, $count, ["+", "-", "*", "/"]);
    $r->eq = str_replace(["*", "/"], ["&bull;", ":"], $r->eq);
    return $r;
}

function multiplication($low, $hi, $count){
    $r = simple($low, $hi, $count, ["*"]);
    $r->eq = str_replace("*", "&bull;", $r->eq);
    return $r;
}

function division($low, $hi, $count){
    $r = simple($low, $hi, $count, ["/"]);
    $r->eq = str_replace("/", ":", $r->eq);
    return $r;
}

function simple($low, $hi, $count, $signs = ["+"]){
    $tokens = [];
    $tokensh = [];

    for ($i = 0; $i < $count; $i++){
        $sign = $signs[array_rand($signs)];
        $n = rand($low, $hi);
        $tokens[] = $n;
        $tokensh[] = $i == 0? $n : surround($n);
        $tokens[] = $sign;
        $tokensh[] = $sign;
    }
    array_pop($tokens);
    array_pop($tokensh);

    try{
        $solution = eval("return " . join(" ", $tokensh) . ";");
    }catch(DivisionByZeroError $e){
        $solution = "!";
    }

    return (object)[
        'eq' => join(" ", $tokensh) . " = ",
        'solution' => $solution,
    ];
}
