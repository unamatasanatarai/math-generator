<?php
include "math.php";
include "view.php";
vheader();

$all = [];
for($i = 0; $i < 10; $i ++){ $all[] = equation_a(-10, 10, 2, ["x"], 3); }
for($i = 0; $i < 10; $i ++){ $all[] = equation_s(-10, 10, 2, ["x"], 3); }
for($i = 0; $i < 10; $i ++){ $all[] = equation_as(-10, 10, 2, ["x"], 3); }
for($i = 0; $i < 10; $i ++){ $all[] = equation_m(-10, 10, 2, ["x"], 3); }
for($i = 0; $i < 10; $i ++){ $all[] = equation_d(-10, 10, 2, ["x"], 3); }
for($i = 0; $i < 10; $i ++){ $all[] = equation_asmd(-10, 10, 2, ["x"], 3); }
/*
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
 */


echo "<div class=equations>";
veq($all);
echo "</div>";
/*
echo "<div class=solutions>";
vsol($all);
echo "</div>";
die;
 */
