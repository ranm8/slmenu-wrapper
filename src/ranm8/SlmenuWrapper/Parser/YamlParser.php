<?php

namespace ranm8\SlmenuWrapper\Parser;

use ranm8\SlmenuWrapper\Parser\CommandsParserInterface;

class YamlParser implements CommandsParserInterface {

  /**
   * The path of the YAML file
   */
  const YAML_PATH = '/usr/local/var/www/slmenu-wrapper/src/ranm8/SlmenuWrapper/Resources/config/db.yml';

  /**
   * @inheritDoc
   */
  public function parse() {
    return yaml_parse_file(self::YAML_PATH);
  }
}