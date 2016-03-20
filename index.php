<?php
require __DIR__ . '/vendor/autoload.php';
?>
<html>
<body>
	<head>
		<style>
			body {
				background-color: #EEEEEE;
			}
			.chatbox {
				height: 500px;
				overflow: scroll;
			}
			.chat_single {
				border:1px solid grey;
				padding: 20px;
				margin: 4px;
			}
			.typebox {
				position: fixed;
				bottom: 20px;
			}
		</style>

	</head>
	<div class="chatbox">
		<div class="chat_single">
			test
		</div>
	</div>
	<div class="typebox">
		<input type="text" id="chattext">
		<button id="sendchat">send</button>
	</div>
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script type="text/javascript">
		var conn = new WebSocket('ws://localhost:8080');
		conn.onopen = function(e) {
			console.log("Connection established!");
		};

		conn.onmessage = function(e) {
			$('.chatbox').append('<div class="chat_single">'+e.data+'</div>');
		};
		$('#sendchat').click(function(){
			var message = $('#chattext').val();
			$(".chatbox").append('<div class="chat_single">'+message+'</div>');
			conn.send(message);
		});
	</script>
</body>
</html>