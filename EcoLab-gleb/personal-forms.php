<?php
	$event = filter_var(trim($_POST['ename']),FILTER_SANITIZE_STRING);
	
	$time = filter_var(trim($_POST['etime']),FILTER_SANITIZE_STRING);
 	
 	$file = filter_var(trim($_POST['efile']),FILTER_SANITIZE_STRING);

 $message = filter_var(trim($_POST['emessage']),FILTER_SANITIZE_STRING);

 $place = filter_var(trim($_POST['eplace']),FILTER_SANITIZE_STRING);

 	$serverName = "LAPTOP-LSBPF23O"; //если instance и port стандартные, то можно не указывать
	$connectionInfo = ARRAY("Database"=>"ecolab","CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$login = $_COOKIE["autorization"];
	$sql1 = "SELECT * FROM users_list WHERE login= '$login'";
	$result = sqlsrv_query( $conn, $sql1);
	$row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_NUMERIC);
	$id = $row[0];

	$errors1 = sqlsrv_errors();

	$params = array($place,$time,$id, $event,$message);
	$sql = "INSERT INTO events_list (place,date,head_id,name,[desc],amount) VALUES (?,?,?,?,?,0)";
	$result1 = sqlsrv_query( $conn, $sql,$params);
	$errors2 = sqlsrv_errors();
	header('Location:/personal.php');

?>