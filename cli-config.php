<?php

set_time_limit(0);

require_once __DIR__ . '/vendor/autoload.php';

use Comrade42\PhpBBParser\Application;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$app = new Application(__DIR__);
/** @var \Doctrine\ORM\EntityManager $em */
$em = $app->getContainer()->get('doctrine');

return ConsoleRunner::createHelperSet($em);
