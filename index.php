<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Language" content="ja">
	<meta http-equiv="Content-Script-Type" content="text/javascript">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<title>home.html</title>
	<style type="text/css">
		html, body, div {
			margin:0;
			padding:0;
		}
		div {
			box-sizing: border-box;
		}
		html{
			width: 100%;
			height:100%;
		}
		body{
			width: 100%;
			height:100%;
			font: 12px/18px Helvetica, Arial, Verdana, Sans-Serif;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #eee;
			background-color: #292929;
		}
		#container {
			display: flex;
			align-items: center;
			justify-content: center;
		}
	</style>
    <script src="./pulse/client/js/jquery.min.js"></script>
</head>
<body>
    <div id="container">
		0000/00/00 00:00
    </div>
	<script type="text/javascript">
		$(function(){
			var socket;
			if ( $.browser.mozilla ){
				socket = new MozWebSocket('ws://www12205u.sakura.ne.jp:8000/home');
			} else {
				socket = new WebSocket('ws://www12205u.sakura.ne.jp:8000/home');
			}
			socket.onopen = function(msg){
				console.log('online');
			};
			socket.onmessage = function(msg){
				var response = JSON.parse(msg.data);
				$('#container').text(response);
			};
			socket.onclose = function(msg){
				console.log('offline');
			};
		});
	</script>
</body>
</html>
