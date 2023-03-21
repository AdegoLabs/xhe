<?php
/**
 * The bootstrap file creates and returns the container.
 */

use DI\ContainerBuilder; 
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use Psr\Log\LoggerInterface;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/definitions.php';

$containerBuilder = new \DI\ContainerBuilder;
$containerBuilder->addDefinitions(__DIR__ . '/config.php');

$container = $containerBuilder->build();

$container->set('db', DI\create(Mysqlidb::class)->constructor('localhost', 'root', '', 'workflow'));
$container->set(LoggerInterface::class, DI\factory(function () {
    $logger = new Logger('mylog');

    $fileHandler = new StreamHandler(LOGS_DIR . DIRECTORY_SEPARATOR . 'logs', Logger::DEBUG);
    $fileHandler->setFormatter(new LineFormatter());
    $logger->pushHandler($fileHandler);

    return $logger;
}));

$db = $container->get('db');
dbObject::autoload("models");

return $container;