<?php
namespace WebSocket\Application;
class HomeApplication extends Application {
	private $_clients = array();

	public function onConnect($client){
		$id = $client->getClientId();
		$this->_clients[$id] = $client;

		$date = $this->pulse();
		$this->sendTo($id, $date);
	}

	public function onDisconnect($client){
		$id = $client->getClientId();
		unset($this->_clients[$id]);
	}

	public function onData($data, $client){
		$date = $this->pulse();
		$this->sendAll($date);
	}

	private function sendAll($data){
		foreach(array_keys($this->_clients) as $clientId){
			$this->sendTo($clientId, $data);
		}
	}

	private function sendTo($clientId, $data){
		$this->_clients[$clientId]->send($data);
	}

	private function pulse(){
		date_default_timezone_set('Asia/Tokyo');
		$data = date('Y/m/d H:i e');
		return json_encode($data);
	}
}
?>
