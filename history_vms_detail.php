<?php
header('Content-Type: application/json; charset=utf-8');

mysql_connect("localhost","root","masterkey");
mysql_select_db("test");
mysql_query( "SET NAMES UTF8" );

// $data = file_get_contents("php://input");
// $dataJsonDecode = json_decode($data);
// $var_room = $dataJsonDecode->var_room;

// $room = $var_room;

$sql = "SELECT * FROM visitor WHERE id LIKE '%99' ORDER BY id DESC";
$resource = mysql_query($sql);
$count_row = mysql_num_rows($resource);

if($count_row > 0) {
	while($result = mysql_fetch_assoc($resource)){
		$rows[]=$result;
	}

	$data = json_encode($rows);
	$totaldata = sizeof($rows);
	$results = '{"results":'.$data.'}';

}else{
	$results = '{"results":null}';
}

echo $results;
?>
