<?php
$container = require(__DIR__ . '/../app/bootstrap.php');

use \Symfony\Component\Filesystem\Exception\IOExceptionInterface;

try {
    $container->get('filesystem')->remove(XHE_DIR . DIRECTORY_SEPARATOR . '7016');
} catch (IOExceptionInterface $exception) {
    echo "An error occurred while deleting your directory at ".$exception->getPath();
}