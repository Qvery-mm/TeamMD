<?php

	$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

	$serverName = "LAPTOP-LSBPF23O"; //если instance и port стандартные, то можно не указывать
	$connectionInfo = ARRAY("Database"=>"ecolab","CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	$sql = "SELECT password FROM users_list WHERE login = '$login' ";

	$result = sqlsrv_query( $conn, $sql);
	$row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_NUMERIC);
//	echo"$row[0]";

	$ent_pass = hash("sha256",$password);
	if (!strcmp((string)$ent_pass,(string)$row[0]))
	{
		setcookie("autorization",$login,time()+3600*24);
		header('Location: /');
	}
	else {
		setcookie("aut_err","error",time()+20);
		header('Location: /aut_main.php');
	}	
	sqlsrv_close( $conn );
?>