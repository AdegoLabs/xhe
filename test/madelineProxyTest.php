<?php

use danog\MadelineProto\Settings\Connection;
use danog\MadelineProto\Stream\Proxy\HttpProxy;

if (!file_exists('madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}

include 'madeline.php';

$proxyIp = "193.233.31.36";
$proxyPort = 45785;
$proxyLogin = "Selyansolo2021";
$proxyPassword = "E3k2LiP";

$settings = new Connection;
$settings->addProxy(
    HttpProxy::class, 
    [
        'address'  => $proxyIp,
        'port'     =>  $proxyPort,
        'username' => $proxyLogin,
        'password' => $proxyPassword,
    ]
);

$MP = new \danog\MadelineProto\API('session.madeline3', $settings);
//$MP->start();

$MP->close();