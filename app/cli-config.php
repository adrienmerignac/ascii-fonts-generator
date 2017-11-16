<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use ASCII\Manager\Manager;

require_once __DIR__ . './../vendor/autoload.php';

return ConsoleRunner::createHelperSet(Manager::getDoctrine());