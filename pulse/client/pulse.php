<?php

require_once 'lib/class.websocket_client.php';
$client = new WebsocketClient;
$client->connect('www12205u.sakura.ne.jp', 8000, '/home', 'www12205u.sakura.ne.jp');
$client->sendData('1');
$client->disconnect();

?>
