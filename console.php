<?php
require_once __DIR__.'/src/autoload.php';

use Symfony\Component\Console as Console;
use ranm8\SlmenuWrapper\SlmenuCommand;

$application = new Console\Application();
$application->add(new SlmenuCommand('slmenu', 'cool'));
$application->run();
