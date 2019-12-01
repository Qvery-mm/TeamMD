<?php 
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	$a=7;
  $serverName = "LAPTOP-LSBPF23O"; //если instance и port стандартные, то можно не указывать
	$connectionInfo = ARRAY("Database"=>"ecolab","CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$sql_count = "SELECT  COUNT (*) FROM news_list";
	$amount = sqlsrv_fetch_array(sqlsrv_query( $conn, $sql_count), SQLSRV_FETCH_NUMERIC);
	$sql_min = "SELECT MIN(id) FROM news_list";
	$min = sqlsrv_fetch_array(sqlsrv_query( $conn, $sql_min), SQLSRV_FETCH_NUMERIC);
					 	for ($i=$min[0];$i<=$min[0]+$amount[0];$i++)
								{
								$sql = "SELECT * FROM news_list WHERE id = '$i' ";
						  	$result = sqlsrv_query( $conn, $sql);
								$res = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC);
								//print_r($res);
						
						    $sql2 =  "SELECT login FROM users_list WHERE id = '$res[8]'";
								$result2 = sqlsrv_query( $conn, $sql2);
								$res2=sqlsrv_fetch_array($result2, SQLSRV_FETCH_NUMERIC);
								if(count($res)>0){
										$news_title[$i-2] = $res[1];
										$news_text[$i-2] = $res[2];	
										$news_src[$i-2] = $res[7];
										$news_date[$i-2]=$res[3];
										$news_author[$i-2]=$res2[0];
							 }
}

								sqlsrv_close( $conn );

?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Эко лаборотория</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />

	<!-- <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style2.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
				<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="index.php">ECO LAB</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="index.php">Главная</a></li>
						<li><a href="projects.php">Проекты</a></li>
						<li class="active"><a href="news.php">Новости</a></li>
						<li>
							<a href="ivents.php">События</a>
						</li>
						<li>
							<a href="contact.php">Контакты</a>
						</li>
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
	
	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row news">
				<div class="col-xs-12 col-sm-12 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img">
							<img src="<?=$news_src[1]?>" alt="#">
						</div>
						<h3 class="h3_news"><?=$news_title[1]?></h3>
						<p data-parent='321'> <?=file_get_contents($news_text[1])?></p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img">
							<img src="<?=$news_src[2]?>" alt="#">
						</div>
						<h3 class="h3_news"><?=$news_title[2]?></h3>
						<p data-parent='314'><?=file_get_contents($news_text[2])?></p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img">
							<img src="<?=$news_src[3]?>" alt="#">
						</div>
						<h3 class="h3_news"><?=$news_title[3]?></h3>
						<p data-parent='124'><?=file_get_contents($news_text[3])?></p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img">
							<img src="<?=$news_src[4]?>" alt="#">
						</div>
						<h3 class="h3_news"><?=$news_title[4]?></h3>
						<p data-parent="111"><?=file_get_contents($news_text[4])?></p>
					</div>
				</div>
				<div class="container more_container"></div>
			<div class="bottom_more_posts news_bottom_more">
				<form class="chat-form" method="post" action="news_script.php">
					<input type="submit" class="btn btn-primary" value="Другие новости" name="send">
				</form>
			</div>
		</div>
	</div>

	<div hidden = "true" class="col-xs-12 col-sm-12 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img">
							<img src="<?=$news_src[5]?>" alt="#">
						</div>
						<h3 class="h3_news"><?=$news_title[5]?></h3>
						<p data-parent="111"><?=file_get_contents($news_text[5])?></p>
					</div>
				</div>
				<div hidden = "true" class="col-xs-12 col-sm-12 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img">
							<img src="<?=$news_src[6]?>" alt="#">
						</div>
						<h3 class="h3_news"><?=$news_title[6]?></h3>
						<p data-parent="111"><?=file_get_contents($news_text[6])?></p>
					</div>
				</div>
				<div hidden = "true" class="col-xs-12 col-sm-12 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img">
							<img src="<?=$news_src[4]?>" alt="#">
						</div>
						<h3 class="h3_news"><?=$news_title[7]?></h3>
						<p data-parent="111"><?=file_get_contents($news_text[7])?></p>
					</div>
				</div>
				<div hidden = "true" class="col-xs-12 col-sm-12 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img">
							<img src="<?=$news_src[4]?>" alt="#">
						</div>
						<h3 class="h3_news"><?=$news_title[7]?></h3>
						<p data-parent="111"><?=file_get_contents($news_text[7])?></p>
					</div>
				</div>


	<template id="news-template">
			<div class="col-xs-12 col-sm-12 text-center">
					<div class="feature-center">
						<div class="img_top_problem news_img">
							<img src="<?=$news_src[$a];
						;?>" alt="#">
						</div>
						<h3 class="h3_news"><?=$news_title[8]?></h3>
						<p class="p_news"><?=file_get_contents($news_text[8])?></p>
					</div>
				</div>
    </template>

		<div id="fh5co-contact" class="news_call">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xs-push-3 animate-box">
					<h3>Обратная связь</h3>
					<p>Задайте свой любой вопрос</p>
					<form action="#">
						<div class="row form-group">
							<div class="col-md-6 ">
								<!-- <label for="fname">First Name</label> -->
								<input type="text" id="fname" class="form-control" placeholder="Ваше имя">
							</div>
							<div class="col-md-6">
								<!-- <label for="lname">Last Name</label> -->
								<input type="text" id="lname" class="form-control" placeholder="Ваша фамилия">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="text" id="email" class="form-control" placeholder="Ваш email">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input type="text" id="subject" class="form-control" placeholder="Тема обращения">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
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
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

<script src="js/news.js"></script>

	</body>
</html>

