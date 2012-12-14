<?php

namespace ranm8\SlmenuWrapper\SlmenuManager;

use ranm8\SlmenuWrapper\Parser\CommandsParserInterface;
use ranm8\SlmenuWrapper\Parser\YamlParser;


class SlmenuManager {

  const SLMENU_COMMAND = 'slmenu';

  /**
   * Class for the commands yaml parsing
   * @var CommandsParserInterface
   */
  protected $yamlParser;

  /**
   * Array that contains the entire commands for the yaml
   * @var array
   */
  protected $commandsList;

  /**
   * Constructs the class
   */
  public function __construct() {
    // set the commands list and the yaml parser
    $this->yamlParser = new YamlParser();
    $this->setCommandsList($this->yamlParser->parse());
  }

  public function exec() {
    $this->commandRouter(null);
  }

  protected function commandRouter($currentArray = null) {
    if ($currentArray === null) {
      $commands = array_keys($this->commandsList);
      $chosenCommand = $this->outputList($commands);
      $chosenCommand = $this->deformatInput($chosenCommand);

      $chosenCommand !== '' ? $this->commandRouter($this->commandsList[$chosenCommand]) : exit;
    }

    $commands = array_keys($currentArray);
    $chosenCommand = $this->outputList($commands);
    $chosenCommand = $this->deformatInput($chosenCommand);

    if (is_array($currentArray[$chosenCommand])) {
      $this->commandRouter($chosenCommand);
    } else {
      $this->outputCommand($currentArray[$chosenCommand]);
      exit;
    }
  }

  protected function outputCommand($command) {
    shell_exec($command);
  }

  protected function deformatInput($chosenCommand) {
    $chosenCommand = str_replace(PHP_EOL, '', $chosenCommand);
    return $chosenCommand;
  }

  /**
   * Indexed array of lists to output for the user choice
   * @param array $formattedList
   * @return string
   */
  protected function outputList(array $listsArray) {
    $formattedList = $this->formatList($listsArray);
    return shell_exec('printf "' . $formattedList . '" | ' . self::SLMENU_COMMAND);
  }

  /**
   * Creates a shell compatible array of options
   * @param array $listsArray
   * @return string
   */
  protected function formatList(array $listsArray) {
    return implode('\n', $listsArray);
  }

  /**
   * Set the commandsList property
   * @param array $commandsList
   * @return SlmenuWrapperManager
   */
  public function setCommandsList($commandsList) {
    $this->commandsList = $commandsList;
    return $this;
  }
}