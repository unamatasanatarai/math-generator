<?php
include "math.php";
include "view.php";
vheader();

$all = [];
for($i = 0; $i < 10; $i ++){
    $all[] = addition(0, 100, 4);
}
for($i = 0; $i < 10; $i ++){
    $all[] = addition(-100, 100, 4);
}
//for($i = 0; $i < 10; $i ++){
//    $all[] = addition(-10000, 10000, 6);
//}
for($i = 0; $i < 10; $i ++){
    $all[] = subtraction(0, 100, 2);
}
for($i = 0; $i < 10; $i ++){
    $all[] = subtraction(-100, 100, 2);
}
for($i = 0; $i < 10; $i ++){
    $all[] = addsub(-10, 10, 4);
}
for($i = 0; $i < 10; $i ++){
    $all[] = multiplication(-10, 10, 2);
}
for($i = 0; $i < 10; $i ++){
    $all[] = multiplication(-10, 10, 3);
}
for($i = 0; $i < 10; $i ++){
    $all[] = multiplication(-100, 10, 3);
}
for($i = 0; $i < 10; $i ++){
    $all[] = division(-10, 10, 2);
}
for($i = 0; $i < 10; $i ++){
    $all[] = division(-10, 10, 3);
}
for($i = 0; $i < 10; $i ++){
    $all[] = asmd(-10, 10, 3);
}
for($i = 0; $i < 10; $i ++){
    $all[] = asmd(-10, 10, 4);
}


echo "<div class=equations>";
veq($all);
echo "</div>";
echo "<div class=solutions>";
vsol($all);
echo "</div>";
die;


$adding = [];
$substracting = [];
$longaddsub = [];

/*
for($i = 0; $i < 30; $i ++){
    $adding[] = rand(0, 100) . " + " . rand(0, 100) . " =";
}
for($i = 0; $i < 30; $i ++){
    $adding[] = rand(-100, 100) . " + " . rand(0, 100) . " =";
}
for($i = 0; $i < 30; $i ++){
    $adding[] = rand(0, 2222) . " + " . rand(0, 2222) . " =";
}
for($i = 0; $i < 24; $i ++){
    $adding[] = rand(-2222, 2222) . " + " . rand(0, 2222) . " =";
}
foreach($adding as $eq){
    echo "<p>$eq</p>";
}
/**/

/**
for($i = 0; $i < 30; $i ++){
    $substracting[] = rand(0, 100) . " - " . rand(0, 100) . " =";
}
for($i = 0; $i < 30; $i ++){
    $substracting[] = rand(-100, 100) . " - " . rand(0, 100) . " =";
}
for($i = 0; $i < 30; $i ++){
    $substracting[] = rand(0, 2222) . " - " . rand(0, 2222) . " =";
}
for($i = 0; $i < 24; $i ++){
    $substracting[] = rand(-2222, 2222) . " - " . rand(0, 2222) . " =";
}
foreach($substracting as $eq){
    echo "<p>$eq</p>";
}
/**/

function printSheet($array){
    foreach($array as $eq){
        echo "<p>$eq</p>";
    }
}


for ($i = 0; $i < 52; $i++){
    $len = rand(1,2);
    $low = -9000;
    $hi = 9000;
    $temp = rand($low, $hi);
    for ($n = 0; $n < $len; $n++){
        $temp .= rand(0, 100) > 50
            ? " + "
            : " - ";
        $temp .= surroundRand($low, $hi);
    }
    $longaddsub[] = $temp . " =";
}


printSheet($longaddsub);
