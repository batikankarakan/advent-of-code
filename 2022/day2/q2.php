<?php
$lines = file('jobs.txt');

$conditions = [
    "A X" => 3,
    "A Y" => 4,
    "A Z" => 8,
    "B X" => 1,
    "B Y" => 5,
    "B Z" => 9,
    "C X" => 2,
    "C Y" => 6,
    "C Z" => 7,
];

$sums = 0;

foreach ($lines as $line) {
    $sums += $conditions[trim($line)];
}

print_r($sums);


