<?php
$lines = file_get_contents("inputfile.txt");
$explodes = [];
$commands = [];
$commandBlocks = explode("$", $lines);

foreach ($commandBlocks as $block) {
    $trimmedBlock = trim($block);
    if ($trimmedBlock == "") {
        continue;
    }
    $explodeCommand = explode("\n", $trimmedBlock);
    $command = $explodeCommand[0];
    $outputs = [];
    if (count($explodeCommand) > 1) {
        $outputs = array_slice($explodeCommand, 1);
    }
    $commands[] = [
        "command" => $command,
        "output" => $outputs,
    ];
}
$locations = [];
$sumsOfLocations = [];
foreach ($commands as $command) {

    $explode = explode(" ", $command['command']);
    $firstPart = $explode[0];
    $commandLocation = count($explode) > 1 ? $explode[1] : "";

    if ($firstPart == "cd") {
        if ($commandLocation == "..") {
            array_pop($locations);
        } else {
            $locations[] = $commandLocation;
        }
    }
    if ($firstPart == "ls") {
        $sum = 0;
        foreach ($command['output'] as $output) {
            $explodeOutput = explode(" ", $output);
            if ($explodeOutput[0] == "dir") {
                continue;
            }

            $sum += intval($explodeOutput[0]);
        }
        $sumsOfLocations[implode("/", $locations)] = $sum;
        foreach ($locations as $key => $value) {
            if ($key == count($locations) - 1) {
                break;
            }
            $locationItems = array_slice($locations, 0, $key + 1);
            $implodedLocationItems = implode("/", $locationItems);
            if (!isset($sumsOfLocations[$implodedLocationItems])) {
                $sumsOfLocations[$implodedLocationItems] = 0;
            }
            $sumsOfLocations[$implodedLocationItems] += $sum;
        }
    }
}
$atMosts = 0;
foreach ($sumsOfLocations as $sumsOfLocation) {
    if ($sumsOfLocation <= 100000) {
        $atMosts += $sumsOfLocation;
    }
}
print_r($atMosts);