<!DOCTYPE html>
<html>
	<head>
		<title>Project - AMCEWRPi</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body>
		
	<!--headerNavBar!-->
	<div class="navbar-fixed-top">
		<nav id="top-navbar" class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-trigger" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!--company title-->
					<a class="navbar-brand font-light" href="index.php">Project-AMCEWRPi</a>
				</div>
				<!--top-first-menu-->
				<div class="collapse navbar-collapse" id="collapse-trigger">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Home</a></li>
						<li><a href="history.php">History</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>	
	<!--headerNavBar end!-->
	<br/><br/><br/><br/>
	<!--main page!-->
	<div class="container">
		<h1>Automated Mashroom Cultivation <br/> Environment with Raspberry Pi</h1><hr/>
		<div id="viewData"></div>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$('#viewData').load('data.php')
			},100);
		});
	</script>
	</body>
</html>
