<?php
$lines = file("inputfile.txt");
$treesByLine = [];
foreach ($lines as $line) {
    $tree = str_split(trim($line), 1);
    $treesByLine[] = $tree;
}
//print_r($treesByLine);

function isTreeVisibleFromTop(array $trees, int $row, int $column): bool
{
    for ($i = 0; $i < $row; $i++) {
        if (intval($trees[$i][$column]) == intval($trees[$row][$column])){
            return false;
        }
        if (intval($trees[$i][$column]) > intval($trees[$row][$column])) {
            return false;
        }
    }
    return true;
}


function isTreeVisibleFromBottom(array $trees, int $row, int $column): bool
{
    for ($i = $row + 1; $i < count($trees); $i++) {
        if (intval($trees[$i][$column]) == intval($trees[$row][$column])){
            return false;
        }
        if (intval($trees[$i][$column]) > intval($trees[$row][$column])) {
            return false;
        }
    }
    return true;
}

function isTreeVisibleFromLeft(array $trees, int $row, int $column): bool
{
    for ($i = 0; $i < $column; $i++) {
        if (intval($trees[$row][$i]) == intval($trees[$row][$column])){
            return false;
        }
        if (intval($trees[$row][$i]) > intval($trees[$row][$column])) {
            return false;
        }
    }
    return true;
}

function isTreeVisibleFromRight(array $trees, int $row, int $column): bool
{
    for ($i = $column + 1; $i < count($trees[$row]); $i++) {
        if (intval($trees[$row][$i]) == intval($trees[$row][$column])){
            return false;
        }
        if (intval($trees[$row][$i]) > intval($trees[$row][$column])) {
            return false;
        }
    }
    return true;
}

$count = 0;

foreach ($treesByLine as $row => $lines) {
    foreach ($lines as $column => $value) {
        if (isTreeVisibleFromRight($treesByLine, $row, $column) || isTreeVisibleFromBottom($treesByLine, $row, $column) || isTreeVisibleFromLeft($treesByLine, $row, $column) || isTreeVisibleFromTop($treesByLine, $row, $column)) {
            var_dump($value);
            $count++;
        }
    }
}
print_r($count);

//isTreeVisibleFromTop($treesByLine, 0, 0);
//isTreeVisibleFromBottom($treesByLine, 4, 0);
//isTreeVisibleFromLeft($treesByLine, 0, 4);
//isTreeVisibleFromRight($treesByLine, 0, 0);

