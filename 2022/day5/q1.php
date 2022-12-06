<?php
$jobLines = file('jobs.txt');
$jobs = [];
$stacks = [
    [
        "Q", "W", "P", "S", "Z", "R", "H", "D",
    ],
    [
        "V", "B", "R", "W", "Q", "H", "F",
    ],
    [
        "C", "V", "S", "H",
    ],
    [
        "H", "F", "G",
    ],
    [
        "P", "G", "J", "B", "Z",
    ],
    [
        "Q", "T", "J", "H", "W", "F", "L",
    ],
    [
        "Z", "T", "W", "D", "L", "V", "J", "N",
    ],
    [
        "D", "T", "Z", "C", "J", "G", "H", "F",
    ],
    [
        "W", "P", "V", "M", "B", "H",
    ],


];

function removeArraysLastElement(array &$stack)
{

    return array_pop($stack);
}

function addElementToArray(array &$stack, string $element)
{
    $stack[] = $element;
}

function moveBox(array &$stacks, int $from, int $to)
{
    $removed = removeArraysLastElement($stacks[$from-1]);
    addElementToArray($stacks[$to-1], $removed);
}

function moveBoxes(array &$stacks, int $from, int $to, int $count)
{
    for ($i = 0; $i < $count; $i++) {
        moveBox($stacks, $from, $to);
    }
}


foreach ($jobLines as $line) {
    $exploded = explode(" ", trim($line));
    $count = intval($exploded[1]);
    $from = intval($exploded[3]);
    $to = intval($exploded[5]);
    moveBoxes($stacks, $from, $to, $count);
}
foreach ($stacks as $stack){
    print_r($stack[count($stack)-1]);
}







