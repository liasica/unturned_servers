<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Unturned PVE server online players</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-2.1.1.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<script>
			var pathyourweb = 'http://localhost/unturnedapis/online/'; // the unturnedapis/online/index.php link
			var timer = 10000; // here config timer default 10s
			var profileUrl = 'http://steamcommunity.com/profiles/' // steam profile url don't change it
			var port = '25444'; // change the port your own

			$(function(){

				// function the error functions
				function onError(jqXHR, textStatus, errorThrown){
					console.log(jqXHR);
					console.log(textStatus);
					console.log(errorThrown);
				}

				// use ajax get json data and put the data in tables
				'user script';
				function showdata(){
					$('.onlinenum i').empty();
					$('.online tbody').empty();

					data = "";
					$.ajax({
						url: pathyourweb + '?port=' + port,
						type: 'GET',
						dataType: 'json',
						success: function(data) {
							if (typeof(data.status) == 'undefined') {
								$('.onlinenum i').append(data.onlineplayers.length);
								for (var i in data.onlineplayers) {
									$('.online tbody').append('<tr><td>' + data.onlineplayers[i][0] + '</td><td>' + data.onlineplayers[i][1] + '</td><td>' + data.onlineplayers[i][2] + '</td><td><a href="' + profileUrl + data.onlineplayers[i][1] + '" target="_blank">Click</a></td></tr>');
								}
							} else {
								$('.onlinenum i').text('0');
							}
						},
						error: onError,
						// timeout: 10000,
					});

				}
				showdata();
				setInterval(showdata, timer);
			});
		</script>
		<div class="container">
			<div class="row">
				<h1 class="onlinenum">PVPOnlineplayers now <i></i> every 10s refresh</h1>
				<table class="online table table-hover">
					<thead>
						<tr>
							<th>Player's name</th>
							<th>Player's 64ID</th>
							<th>Player's position</th>
							<th>Player's profile</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php // you can use it free but please don't delete this ?>
				<footer>Powered by <a href="http://unturned.liasica.com" target="_blank">magicrolan</a></footer>
			</div>
		</div>
	</body>
</html>
