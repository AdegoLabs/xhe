<?php
use \Symfony\Component\Filesystem\Exception\IOExceptionInterface;

$container = require(__DIR__ . '/../app/bootstrap.php');

try {
    $container->get('filesystem')->mkdir(XHE_DIR . DIRECTORY_SEPARATOR . 'Test folder3');
} catch (IOExceptionInterface $exception) {
    echo "An error occurred while creating your directory at ".$exception->getPath();
}