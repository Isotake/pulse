<?php
/* This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://sam.zoy.org/wtfpl/COPYING for more details. */

ini_set('display_errors', 1);
error_reporting(E_ALL);

require(__DIR__ . '/lib/SplClassLoader.php');

$classLoader = new SplClassLoader('WebSocket', __DIR__ . '/lib');
$classLoader->register();

/*
$server = new \WebSocket\Server('127.0.0.1', 8000, false);
// server settings:
$server->setMaxClients(100);
$server->setCheckOrigin(true);
$server->setAllowedOrigin('foo.lh');
$server->setMaxConnectionsPerIp(100);
$server->setMaxRequestsPerMinute(2000);
*/

$server = new \WebSocket\Server('takehaya.jp', 8000, true);
// server settings: www12205u.sakura.ne.jp
$server->setMaxClients(100);
$server->setCheckOrigin(true);
$server->setAllowedOrigin('takehaya.jp');
$server->setMaxConnectionsPerIp(100);
$server->setMaxRequestsPerMinute(2000);

/*
$server = new \WebSocket\Server('takehaya.jp', 8000, false);
// server settings: takehaya.jp
$server->setMaxClients(100);
$server->setCheckOrigin(true);
$server->setAllowedOrigin('takehaya.jp');
$server->setMaxConnectionsPerIp(100);
$server->setMaxRequestsPerMinute(2000);
*/

// Hint: Status application should not be removed as it displays usefull server informations:
$server->registerApplication('home', \WebSocket\Application\HomeApplication::getInstance());

$server->run();
