<?php

$host = "localhost";
$db = "timesheet";
$user = "root";
$password = "";

$con = mysqli_connect($host, $user, $password, $db);
mysqli_select_db($con, $db) or die( "Unable to select DB");

$query = "SELECT projectname from projectnames";
$result = mysqli_query($con, $query);
//$result_set = mysqli_fetch_all($result, MYSQLI_ASSOC);

$pname = array();

while ($row = mysqli_fetch_assoc($result) ) 
{

	$projectname = $row['projectname'];
	array_push($pname, $projectname);

}
echo(json_encode($pname));


?>