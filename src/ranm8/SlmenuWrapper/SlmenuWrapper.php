<?php

namespace ranm8\SlmenuWrapper;

use Symfony\Component\Console as Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class SlmenuWrapper extends Command {

  public function __construct($name = null) {
    parent::__construct($name);

    $this->setDescription('This is the product of the great cornholio.');
    $this->setHelp('Tap and start using! (-;');
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $output->writeln(array('hi', 'hi'));
  }
}