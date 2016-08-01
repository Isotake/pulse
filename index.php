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
	<script type="text/javascript">
		window.onload = function(){
			var socket;
			socket = new WebSocket('ws://www12205u.sakura.ne.jp:8000/home');
			socket.onopen = function(msg){
				console.log('online');
			};
			socket.onmessage = function(msg){
				var response = JSON.parse(msg.data);
				document.getElementById('container').textContent = response;
			};
			socket.onclose = function(msg){
				console.log('offline');
			};
		};
	</script>
</head>
<body>
    <div id="container">
		0000/00/00 00:00
    </div>
<!-- google analytics
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-26081171-2']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
-->
</body>
</html>
