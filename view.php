<?php

function vheader(){
    echo '<style>
        *{color:blue;
font-family:"Courier New";
}
.eq{
margin:0;
padding:0;
margin-bottom:3em;
}
.sol{
display:inline-block;
margin-right:20px;
width:100px;
font-size:12px;
}
.sol small{
display:inline-block;
width:20px;
}
.equations{
display:block;
}
.equations{
display:block;
column-count:2;
}
.solutions{
display:block;
column-count:10;
page-break-before: always;
}
</style>';
}

function veq($equations){
    for($i = 0; $i < count($equations); $i++){
        $eq = $equations[$i];
        $num = $i + 1;
        echo "<p class='eq'><small>{$num}.</small> <strong>{$eq->eq}</strong></p>";
    }
}

function vsol($equations){
    for($i = 0; $i < count($equations); $i++){
        $eq = $equations[$i];
        $num = $i + 1;
        if ($eq->solution == "!"){
            $sol = $eq->solution;
        }else{
            $sol = number_format($eq->solution, 2, ",", " ");
        }
        echo "<span class=sol><small>{$num}.</small> {$sol}</span>";
    }
}
