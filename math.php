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


function equation_a($low, $hi, $count, $unknowns = ["x"], $unknowns_count_max = 2){
    $r = equation($low, $hi, $count, $unknowns, $unknowns_count_max, ["+"]);
    $r->eq = str_replace(["*", "/"], ["&bull;", ":"], $r->eq);
    return $r;
}

function equation_s($low, $hi, $count, $unknowns = ["x"], $unknowns_count_max = 2){
    $r = equation($low, $hi, $count, $unknowns, $unknowns_count_max, ["-"]);
    $r->eq = str_replace(["*", "/"], ["&bull;", ":"], $r->eq);
    return $r;
}

function equation_as($low, $hi, $count, $unknowns = ["x"], $unknowns_count_max = 2){
    $r = equation($low, $hi, $count, $unknowns, $unknowns_count_max, ["+", "-"]);
    $r->eq = str_replace(["*", "/"], ["&bull;", ":"], $r->eq);
    return $r;
}

function equation_m($low, $hi, $count, $unknowns = ["x"], $unknowns_count_max = 2){
    $r = equation($low, $hi, $count, $unknowns, $unknowns_count_max, ["*"]);
    $r->eq = str_replace(["*", "/"], ["&bull;", ":"], $r->eq);
    return $r;
}

function equation_d($low, $hi, $count, $unknowns = ["x"], $unknowns_count_max = 2){
    $r = equation($low, $hi, $count, $unknowns, $unknowns_count_max, ["/"]);
    $r->eq = str_replace(["*", "/"], ["&bull;", ":"], $r->eq);
    return $r;
}


function equation_asmd($low, $hi, $count, $unknowns = ["x"], $unknowns_count_max = 2){
    $r = equation($low, $hi, $count, $unknowns, $unknowns_count_max, ["+", "-", "*", "/"]);
    $r->eq = str_replace(["*", "/"], ["&bull;", ":"], $r->eq);
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

function placeUnknown($number, $unknown){
    if (is_numeric($number)){
        $number .= $unknown;
    }else{
        $number = substr($number, 0, -1) . $unknown . ')';
    }
    return $number;
}

function equation($low, $hi, $count, $unknowns = ["x"], $unknowns_count_max = 2, $signs = ["+", "-"]){
    $tokens = [];
    $tokensh = [];

    // LEFT
    $numbers_pos = [];
    for ($i = 0; $i < $count; $i++){
        $sign = $signs[array_rand($signs)];
        $n = rand($low, $hi);
        $tokens[] = $n;
        $tokensh[] = $i == 0? $n : surround($n);
        $numbers_pos[] = count($tokens)-1;
        $tokens[] = $sign;
        $tokensh[] = $sign;
    }
    array_pop($tokens);
    array_pop($tokensh);

    $tokens[] = "=";
    $tokensh[] = "=";
    // RIGHT
    $count = rand(1, $count);
    for ($i = 0; $i < $count; $i++){
        $sign = $signs[array_rand($signs)];
        $n = rand($low, $hi);
        $tokens[] = $n;
        $tokensh[] = $i == 0? $n : surround($n);
        $numbers_pos[] = count($tokens)-1;
        $tokens[] = $sign;
        $tokensh[] = $sign;
    }
    array_pop($tokens);
    array_pop($tokensh);

    $unknowns_count_max = rand(1, min(count($numbers_pos) - 1, $unknowns_count_max));
    shuffle($numbers_pos);
    $place_pos = array_slice($numbers_pos, 0, $unknowns_count_max);
    foreach($place_pos as $pos){
        $tokensh[$pos] = placeUnknown($tokensh[$pos], $unknowns[array_rand($unknowns)]);
    }

    return (object)[
        'eq' => join(" ", $tokensh),
        'np' => $numbers_pos,
        'pp' => $place_pos,
        'ucm' => $unknowns_count_max,
    ];
}
