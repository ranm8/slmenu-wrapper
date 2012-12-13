<?php

namespace ranm8\SlmenuWrapper\Parser;

interface CommandsParserInterface {

  /**
   * Parse the DB file to compatible array - key => array || key => command
   * @return array
   */
  public function parse();
}