<?php

function doesItOverlap($num1, $num2)
{
    if ($num1[0] >= $num2[0] && $num1[0] <= $num2[1] || $num1[1] >= $num2[0] && $num1[1] <= $num2[1]){
        return true;
    }
}

$lines = file('jobs.txt');
$splits = [];
$fullyContain = 0;
$ids = [];
foreach ($lines as $line) {
    $exploded = explode(",", trim($line));
    $splits[] = [
        explode("-", $exploded[0]),
        explode("-", $exploded[1]),
    ];
}
foreach ($splits as $split) {
    if (doesItOverlap($split[0], $split[1]) || doesItOverlap($split[1], $split[0])){
        $fullyContain++;
    }
}
print_r($fullyContain);
