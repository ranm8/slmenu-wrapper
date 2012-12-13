<?php

namespace ranm8\SlmenuWrapper\Parser;

use ranm8\SlmenuWrapper\Parser\CommandsParserInterface;

class YamlParser implements CommandsParserInterface {

  /**
   * The path of the YAML file
   */
  const YAML_PATH = '../Resources/config/db.yml';

  /**
   * @inheritDoc
   */
  public function parse() {
    return yaml_parse_file(self::YAML_PATH);
  }
}