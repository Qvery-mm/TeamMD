<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Форма авторизации</title>
	<link rel="stylesheet" type="text/css"
	 href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
	<div class="container mt-4" id ="aut_form">
		<div class="row">
			<div class="col">
				<h1>Войти</h1>
				<?php if(isset($_COOKIE['aut_err'])): ?>
				 <div class="message"><b>Неверное имя пользователя или пароль</b></div><br>
				<?php endif;?>
				<form action="aut_check.php" method="post" class="messages">
				<input type="text" class="form-control"
				name="login" id="login" placeholder="Введите логин"><br>
				<input type="password" class="form-control pass"
				name="password" id="password" placeholder="Введите пароль"><br>
				<button class="btn btn-success" type="submit">Войти </button>
				</form>
 			</div>
 		</div>
	</div>

</body>
</html>