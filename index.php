<?php
$commands = yaml_parse_file('./config/db.yml');

$firstLevel = array_keys($commands);

$secondLevel = shell_exec('printf "' . implode('\n', $firstLevel) . '" | slmenu');
$newList = $commands[removeLineBreaks($secondLevel)];

$thirdLevel = array_keys($newList);

$command = shell_exec('printf "' . implode('\n', $thirdLevel) . '" | slmenu');

function removeLineBreaks($var) {
  $var = str_replace(PHP_EOL, '', $var);
  return $var;
}