<?php
include('../includes/connection.php');
$query = "select description from package_names";
foreach($connection->query($query) as $v)
{
	$file = file_get_contents($v[0]);
	$text = unserialize($file);
	print "$v[0] <br>";
	echo "<table border=\"2\"><tr><th>Day</th><th>Event</th></tr>";
	for($j=0;$j<count($text);$j+=1)
	{
		echo "<tr><td>Day".($j+1)."</td><td>$text[$j]</td></tr>";
	}
	echo "</table>";
	
}


?>