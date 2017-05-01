<?php
$con = mysql_connect("localhost","root","root");
if(!$con){
	die("Can not connet!");
}
mysql_select_db("myDB", $con);
$sql = "SELECT * FROM currentTable";
$data = mysql_query($sql,$con);

while($record = mysql_fetch_array($data)){
		$ctemp = $record['ctemp'];
		$chumi = $record['chumi'];
}

echo "<h1>"."Current temperature:"." ".$ctemp."°C"."</h1>";
echo "<h1>"."and humidity:"." "."<span class='font-xxl'>".$chumi."</span>"."%"."</h1>";

mysql_close($con);

?>
