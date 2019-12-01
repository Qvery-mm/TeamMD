<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Эко лаборатория</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style2.css">
	<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row menu-2">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="index.html">ECO LAB</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="index.php">Главная</a></li>
						<li><a href="projects.php">Проекты</a></li>
						<li><a href="news.php">Новости</a></li>
						<li><a href="ivents.php">События</a></li>
						<li class="active"><a href="contact.php">Контакты</a></li>
						<?php if(!isset($_COOKIE["autorization"])): ?>
						<li class="btn-cta"><a href="aut_main.php"><span>Войти</span></a></li>

						<?php else:?>
							<li><a href="personal.php">Личный кабинет</a></li>
						<li class="btn-cta"><a href="aut_exit.php"><span>Выйти</span></a></li>

					<?php endif?>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>
	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_2.jpg);-webkit-background-size: cover;background-size: cover;background-position: center top;  background-repeat: no-repeat; height: 120px">
		<div class="overlay"></div>
	</header>
	
	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xs-push-3 animate-box">
					<h3>Обратная связь</h3>
					<p>Задайте свой любой вопрос</p>
					<form action="#">
						<div class="row form-group">
							<div class="col-md-6 ">
								<input type="text" id="fname" class="form-control" placeholder="Ваше имя">
							</div>
							<div class="col-md-6">
								<input type="text" id="lname" class="form-control" placeholder="Ваша фамилия">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="email" class="form-control" placeholder="Ваш email">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="subject" class="form-control" placeholder="Тема обращения">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<textarea name="message" id="message" cols="20" rows="10" class="form-control" placeholder="Сообщение"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Отправить" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>

	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Присоединиться к нам</h2>
					<p>Стань участником самого интересного проекта по защите окружающей среды, проведи своё расследование и поделись его результати с другими пользователями прямо сейчас</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
							<a href="#" class="btn btn-block">Присоединиться</a>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>ECO LAB</h3>
					<p>За всё время мы решили более n экологических проблем, убрали m тонн отходов и вынесли на обсуждение в администрацию k проектов</p>
				</div>
				<div class="footter_up clearfix">
				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="index.php">Главная</a></li>
						<li><a href="projects.php">Проекты</a></li>
						<li><a href="news.php">Новости</a></li>
						<li><a href="ivents.php">События</a></li>
						<li><a href="contact.php">Контакты</a></li>
					</ul>
				</div>

				<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
					<ul class="fh5co-footer-links">
						<li><a href="personal.php">Личный кабинет</a></li>
					</ul>
				</div>
		</div>
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2019 EcoLab. All Rights Reserved.</small> 
						<small class="block">Designed by Team MD</small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-vk-alternitive"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>

