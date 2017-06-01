<?php

require_once 'lib/class.websocket_client.php';
$client = new WebsocketClient;
$client->connect('takehaya.jp', 8000, '/home', 'takehaya.jp');
$client->sendData('1');
$client->disconnect();

?>
