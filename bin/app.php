#!/usr/bin/env php
<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;

$console = new Application();
$console->add(new \Acme\DemoImport\Command\ImportCommand());

$console->run();
