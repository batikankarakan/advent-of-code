<?php
$lines = file('inputfile.txt');

$conditions = [
    "A X" => 4,
    "A Y" => 8,
    "A Z" => 3,
    "B X" => 1,
    "B Y" => 5,
    "B Z" => 9,
    "C X" => 7,
    "C Y" => 2,
    "C Z" => 6,
];

$sums = 0;

foreach ($lines as $line) {
    $sums += $conditions[trim($line)];
}

print_r($sums);


