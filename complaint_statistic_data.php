<?php
//setting header to json
$id=$_GET['selectyear'];
header('Content-Type: application/json');
include 'connection.php';

//query to get data from the table
$query = sprintf("SELECT COUNT(complaint_id) as count , MONTHNAME(dated) AS month FROM complaint WHERE YEAR(dated)='$id' GROUP BY YEAR(complaint_id),MONTH(dated)");

//execute query
$result = $link->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$link->close();

//now print the data
print json_encode($data);
?>