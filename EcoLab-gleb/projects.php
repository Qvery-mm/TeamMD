<?php		
			header('Content-Type: text/html; charset=utf-8');
			$serverName = "LAPTOP-LSBPF23O"; //если instance и port стандартные, то можно не указывать
			$connectionInfo = ARRAY("Database"=>"ecolab","CharacterSet" => "UTF-8");
			$conn = sqlsrv_connect( $serverName, $connectionInfo);
			$sql = "SELECT * FROM articles_list ORDER BY popularity DESC";
			if (isset($_COOKIE["way"])) 
					{
						if ($_COOKIE['way']==='popularity') $sql = "SELECT * FROM articles_list ORDER BY popularity DESC";
						else if ($_COOKIE['way']==='author_id')$sql = "SELECT * FROM articles_list ORDER BY author_id DESC";
						else $sql = "SELECT * FROM articles_list ORDER BY date DESC";
					}
			
			$result = sqlsrv_query( $conn, $sql);
			$res[20][20];
			$j=0;
			$sql_count = "SELECT  COUNT (*) FROM articles_list";
		//	$amount = sqlsrv_fetch_array(sqlsrv_query( $conn, $sql_count), SQLSRV_FETCH_NUMERIC);

		 while(sqlsrv_fetch($result) === true) {
			for($i=0;$i<11;$i++) $res[$j][$i] = sqlsrv_get_field($result,$i); //gets the first field -
    		$j++;
    	//	echo"LOK";
			}
			//echo "$j";
			
		 for($i=0;$i<$j;$i++){			
				$title[$i] = $res[$i][1];
				$text[$i] = $res[$i][2];
				$src[$i] = $res[$i][9];	
				$author[$i] = $res[$i][3];
				$date[$i] = $i;
			 $popul[$i]=$res[$i][10];
			///echo "string";
		}		 sqlsrv_close( $conn );
?>
<!DOCTYPE  html>
<html lang="ru">
	<head>
	<meta charset="utf-8">
	<title>Эко лаборатория</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/slider.css">
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
						<li class="active"><a href="projects.php">Проекты</a></li>
						<li><a href="news.php">Новости</a></li>
						<li>
							<a href="ivents.php">События</a>
						</li>
						<li>
							<a href="contact.html">Контакты</a>
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

	<header id="fh5co-header" class="fh5co-cover" role="banner"  style="background-image: url(images/nature.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Проекты</h1>
							<h2>Присоединяйся к любым проектам и решай реальные проблемы</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<ul>
						<li class="has-dropdown_news">
							<a>Сортировать по: </a>
							<ul class="sort_info">
								<li><a href="#" onclick="<?php setcookie("way",'popularity',time()+20); header('Location:/')?>">просмотрам</a></li>
								<li><a href="#" onclick="<?php setcookie("way",'author_id',time()+20);header('Location:/')?>">авторам</a></li>
								<li><a href="#" onclick="<?php setcookie("way",'date',time()+20);header('Location:/')?>">дате</a></li>
							</ul>
						</li>
					</ul>

			<div class="row">
				<div class="col-md-6 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img/problem1">
							<img src="<?=$src[0]?>" alt="#">
						</div>
						<h3><?=$title[0]?></h3>
						<p data-parent="<?=$popul[0]?>"><?=file_get_contents($text[2])?></p>
						<span  data-parent=""><?=$author[0].", ".$date[0]?> </span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
				<div class="col-md-6 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem">
							<img src="<?=$src[1]?>" alt="#">
						</div>
						<h3><?=$title[1]?></h3>
						<p data-parent="122"><?=file_get_contents($text[1])?></p>
						<span  data-parent=""><?=$author[1].", ".$date[1]?> </span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem">
							<img src="<?=$src[2]?>" alt="#">
						</div>
						<h3><?=$title[2]?></h3>
						<p data-parent="142"><?=file_get_contents($text[2])?></p>
						<span  data-parent=""><?=$author[2].", ".$date[2]?></span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
				<div class="col-md-6 col-sm-4 text-center">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem">
							<img src="<?=$src[3]?>" alt="#">
						</div>
						<h3><?=$title[3]?></h3>
						<p data-parent="12"><?=file_get_contents($text[3])?></p>
						<span  data-parent=""><?=$author[3].", ".$date[3]?></span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
			</div>
		</div>
			<div class="container more_container">
				</div>
			<div class="bottom_more_posts">
				<form class="chat-form" method="post">
					<button type="submit" class="btn-post to_main_posts">Узнать больше</button>
				</form>
			</div>
		</div>
	</div>

	<template id="project-template">
				<div class="row">
				<div class="col-md-6 col-sm-4 text-center">
					<div class="feature-center">
						<div class="img_top_problem">
							<img src="images/cat.jpg" alt="#">
						</div>
						<h3>Название статьи</h3>
						<p data-parent="142">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
						<span  data-parent="Михаил">Автор: </span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
				<div class="col-md-6 col-sm-4 text-center">
					<div class="feature-center">
						<div class="img_top_problem">
							<img src="images/cat.jpg" alt="#">
						</div>
						<h3>Название статьи</h3>
						<p data-parent="12">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</p>
						<span  data-parent="Александр">Автор: </span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
			</div>
    </template>


<div id="fh5co-contact">
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
            <li><a href="index.html">Главная</a></li>
						<li><a href="projects.html">Проекты</a></li>
						<li><a href="news.html">Новости</a></li>
						<li><a href="ivents.html">События</a></li>
						<li><a href="contact.html">Контакты</a></li>
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

	<script src="js/projects.js"></script>

	</body>
</html>

