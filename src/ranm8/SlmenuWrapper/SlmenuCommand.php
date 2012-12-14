<?php

namespace ranm8\SlmenuWrapper;

use Symfony\Component\Console as Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ranm8\SlmenuWrapper\SlmenuManager\SlmenuManager;

class SlmenuCommand extends Command {

  /**
   * The array of the class commands
   * @var Array
   */
  protected $config;

  /**
   * @inheritDoc
   */
  public function __construct($name = NULL) {
    parent::__construct($name);

    $this->setDescription('This is the product of the great cornholio.');
    $this->setHelp('Tap and start using! (-;');
  }

  /**
   * @inheritDoc
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    // @TODO find the right way to shell execute using the console component / impalement decorator
    $manager = new SlmenuManager();
    $manager->exec();

  }
}