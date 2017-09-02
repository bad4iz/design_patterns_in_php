<?php

class Logger {
  const LOG_NAME = 'control.log';
  static private $_instance;

  private function __construct() { }

  private function __clone() {
    // TODO: Implement __clone() method.
  }

  static function getInstance() {
    if (!self::$_instance) {
      self::$_instance = new self;
    }
    return self::$_instance;
  }

  function log($msg) {
    file_put_contents(self::LOG_NAME, $msg . '\n', FILE_APPEND);
  }
}

$log = Logger::getInstance();
$log->log('ros'.__LINE__);


$log = Logger::getInstance();
$log->log('ros'.__LINE__);