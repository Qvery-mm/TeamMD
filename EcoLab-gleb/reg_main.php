<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Форма регистрации</title>
	<link rel="stylesheet" type="text/css"
	 href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
</head>
<body>
	<div class="container mt-4" id ="reg_form">
		<div class="row">
			<div class="col">
				<h1>Зарегистрироваться</h1>
				<div style="color: red;"><?php if(isset(($_COOKIE["pas_erC"]))) echo $_COOKIE['pas_erC']?></div>
				<form action="reg_check.php" method="post" class="messages">
				<input type="text" class="form-control"
				name="login" id="login"
				pattern = "[/[0-9a-zA-Z_.-]{6,30}/]" 
				placeholder="Введите логин" required
				minlength="6"
				maxlength="30"><br>
				
				<input type="password" class="form-control pass"
				name="password" id="password" placeholder="Введите пароль"
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,24}"
				required><br>
				
				<input type="password" class="form-control pass"
				name="conf_password" id="conf_password" 
				placeholder="Повторите пароль"
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,24}"
			 required><br>

				<input list="dist" class="form-control"
				name="place" id="place" placeholder="В каком районе вы живете?"><br>
				<datalist id="dist">
						<option value="Адмиралтейский"/>
						<option value="Василеостровский"/ >
						<option value="Выборгский"/>
						<option value="Калининский"/>
						<option value="Кировский"/>
						<option value="Колпинский"/>
						<option value="Красногвардейский"/>
						<option value="Красносельский"/>
						<option value="Кронштадтский"/>
						<option value="Курортный"/>
						<option value="Московский"/>
						<option value="Невский"/>
						<option value="Петроградский"/>
						<option value="Петродворцовый"/>
						<option value="Приморский"/>
						<option value="Пушкинский"/>
						<option value="Фрунзенский"/>
						<option value="Центральный"/>
				</datalist>

				<input type="email" class="form-control"
				name="email" id="email" 
				placeholder="Введите e-mail"
			  required><br>
				
				<input type="text" class="form-control"
				name="tel_num" id="tel_num" 
				placeholder="Введите номер телефона"
				pattern="^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$"><br>
				
				<button class="btn btn-success" type="submit">Регистрация </button>
				</form>
 			</div>
 		</div>
	</div>
	</body>
</html>