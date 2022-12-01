<?php

$lines = file('inputfile.txt');
$sum = 0;
$elves = [];
$result = 0;
foreach ($lines as $line) {
    if ($line == "\n") {
        $elves[] = $sum;
        $sum = 0;
    }
    $sum += intval($line);
}
echo "max value is: ".max($elves).PHP_EOL;
rsort($elves);
$sumArr = $elves[0] + $elves[1] + $elves[2];

echo "sum of max three value is: ".$sumArr.PHP_EOL;


