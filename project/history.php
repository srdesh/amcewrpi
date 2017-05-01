<?php
$con = mysql_connect("localhost","root","root");
if(!$con){
	die("Can not connet!");
}
mysql_select_db("myDB", $con);
$sql = "SELECT * FROM myTable";
$data = mysql_query($sql,$con);

mysql_close($con);

?>

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
		<h1>HISTORY</h1>
		<table class="table table-striped">
			<thead>
				<td><b>DATE</b></td>
				<td><b>TIME</b></td>
				<td><b>TEMPERATURE</b></td>
				<td><b>HUMIDITY</b></td>
				<td><b>STATUS</b></td>
			</thead>
			<?php
				while($record = mysql_fetch_array($data)){
					echo "<tr>";
					echo "<td>".$record['date']."</td>";
					echo "<td>".$record['time']."</td>";
					echo "<td>".$record['temp']."</td>";
					echo "<td>".$record['humi']."</td>";
					echo "<td>".$record['status']."</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>
