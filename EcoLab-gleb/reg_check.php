<?php
	$serverName = "LAPTOP-LSBPF23O"; //если instance и port стандартные, то можно не указывать
	$connectionInfo = ARRAY("Database"=>"ecolab","CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	$msg_box = ""; // в этой переменной будем хранить сообщения формы
	//$errors = array();

	$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
	
	$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
 	
 	$con_pass = filter_var(trim($_POST['conf_password']),FILTER_SANITIZE_STRING);

	$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);

	$tel_num = filter_var(trim($_POST['tel_num']),FILTER_SANITIZE_STRING);

	$place = filter_var(trim($_POST['place']),FILTER_SANITIZE_STRING);
  $sql = "SELECT login FROM users_list WHERE login = '$login' ";
  $result = sqlsrv_query( $conn, $sql);
  $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_NUMERIC);
	if($row[1]===$login){
		$error = "Логин уже используется";
		setcookie('pas_erC', $error,time()+2);
		  sqlsrv_close( $conn );
			header('Location: /reg_main.php');
	}
  else if ($password != $con_pass){
		$error = "Пароли не совпадают";
		setcookie('pas_erC', $error,time()+2);
		 sqlsrv_close( $conn );
			header('Location: /reg_main.php');
	}


	else{
	$password = hash('sha256', $password);
//	echo"$password";
	$params = array($login, $password,$place,$tel_num,$email,0);  
	$sql = "INSERT INTO users_list (login,password,place,tel_num,email,rating) VALUES (?,?,?,?,?,0)";
	$result = sqlsrv_query( $conn, $sql,$params);
	//echo "loh";
	$errors = sqlsrv_errors();
	print_r($errors);
	sqlsrv_close( $conn );
	
	$_POST['login'] == "";
	$_POST['password'] == "";
	$_POST['place'] ="";
	$_POST['email'] == "";
	$_POST['tel_num']=="";
	
	//echo "loh2";
		//echo 'Дошли до ошибок';
	header('Location: /');
 }
//echo json_encode(array('result' => $msg_box));

?>

 