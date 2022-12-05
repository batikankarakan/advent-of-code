<?php

$lines = file('inputfile.txt');
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
    if (intval($split[0][0]) <= intval($split[1][0]) && intval($split[0][1]) >= intval($split[1][1]) || intval($split[1][0]) <= intval($split[0][0]) && intval($split[1][1]) >= intval($split[0][1])) {
        $fullyContain++;
    }
}

print_r($fullyContain);
