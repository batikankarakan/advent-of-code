<?php
$lines = file("inputfile.txt");
$treesByLine = [];
foreach ($lines as $line) {
    $tree = str_split(trim($line), 1);
    $treesByLine[] = $tree;
}
//print_r($treesByLine);

function scenicScoreFromTop(array $trees, int $row, int $column): int
{
    $scenicScore = 0;
    for ($i = $row-1; $i >= 0; $i--) {
        $scenicScore++;
        if (intval($trees[$i][$column]) >= intval($trees[$row][$column])) {
            break;
        }
    }
    return $scenicScore;
}

function scenicScoreFromLeft(array $trees, int $row, int $column): int
{
    $scenicScore = 0;
    for ($i = $column-1; $i >= 0; $i--) {
        $scenicScore++;
        if (intval($trees[$row][$i]) >= intval($trees[$row][$column])) {
            break;
        }
    }
    return $scenicScore;
}

function scenicScoreFromRight(array $trees, int $row, int $column): int
{
    $scenicScore = 0;
    for ($i = $column + 1; $i < count($trees[$row]); $i++) {
        $scenicScore++;
        if (intval($trees[$row][$i]) >= intval($trees[$row][$column])) {
            break;
        }
    }
    return $scenicScore;
}

function scenicScoreFromBottom(array $trees, int $row, int $column): int
{
    $scenicScore = 0;
    for ($i = $row + 1; $i < count($trees); $i++) {
        $scenicScore++;
        if (intval($trees[$i][$column]) >= intval($trees[$row][$column])) {
            break;
        }
    }
    return $scenicScore;
}

$scenics = [];
foreach ($treesByLine as $row => $lines) {
    foreach ($lines as $column => $value) {
        $scenicTop = scenicScoreFromTop($treesByLine, $row, $column);
        $scenicLeft = scenicScoreFromLeft($treesByLine, $row, $column);
        $scenicRight = scenicScoreFromRight($treesByLine, $row, $column);
        $scenicBottom = scenicScoreFromBottom($treesByLine, $row, $column);

        $scenics[] = $scenicTop * $scenicLeft * $scenicRight * $scenicBottom;
    }
}


print_r($scenics);
print_r(max($scenics));

