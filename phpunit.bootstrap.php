<?php
require_once('vendor/autoload.php');

$loader = new \Composer\Autoload\ClassLoader();
$loader->add('Noahlvb\ValueObject', ['src/']);
$loader->add('Noahlvb\ValueObject\Tests', ['tests/']);
$loader->register();
$loader->setUseIncludePath(true);
