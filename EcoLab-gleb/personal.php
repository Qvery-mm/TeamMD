<?php
header('Content-Type: text/html; charset=utf-8');
			$serverName = "LAPTOP-LSBPF23O"; //если instance и port стандартные, то можно не указывать
			$connectionInfo = ARRAY("Database"=>"ecolab","CharacterSet" => "UTF-8");
			$conn = sqlsrv_connect( $serverName, $connectionInfo);
			$log = $_COOKIE['autorization'];


$sql="SELECT * FROM users_list WHERE login = '$log'";
$result = sqlsrv_query( $conn, $sql);
$row = sqlsrv_fetch_array($result,SQLSRV_FETCH_NUMERIC);
//print_r($row);

$sql2="SELECT * FROM articles_list WHERE author_id = '$row[0]' ORDER BY date  DESC";
$result2 = sqlsrv_query( $conn, $sql2);
$j=0;
$article[20][20];
while(sqlsrv_fetch($result2) === true) {
	for($i=0;$i<11;$i++)
    $article[$j][$i] = sqlsrv_get_field($result2,$i); //gets the first field -
    $j++;
}

sqlsrv_close( $conn );
?>

<!DOCTYPE  html>
<html lang="ru">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Эко лаборатория</title>
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
						<li><a href="contact.php">Контакты</a></li>
						<li class="active personal"><a>Личный кабинет</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover personal_info" role="banner" style="background-image:url(images/img_bg_2.jpg);-webkit-background-size: cover;background-size: cover;background-position: center top;  background-repeat: no-repeat;">
		<div class="overlay"></div>
		<div class="progress">
  		<div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?=$row[7]?>%" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	</header>

	<div id="fh5co-services" class="fh5co-bg-section personality">	
		<div class="container">
  		<div class="row">
    		<div class="col-6 col-sm-5">
    			<div class="more_information">
  			<div class="h1_contact">
        <h3>Волонтерская карточка</h3>
      </div>
        <div class="row inform">
        	<div class="img_user text-center col-12">
        	<img src="<?=$row[4]?>" alt="user_logo">
        	</div>
        	<div class="info_user col-12">
  				<ul>
  					<li><span>Логин :</span> <?=$row[1]?></li>
  					<li><span>Телефон :</span><?=$row[5]?></li>
  					<li><span>Email :</span> <?=$row[6]?></li>
  					<li><span>Район :</span> <?=$row[3]?></li>
  				</ul>
  				</div>
  			</div>
        <div class="h1_contact_down">
        	<p>Ваш уровень: <span><?=$row[7]?></span></p>
      </div>
  	</div>
    </div>
    	<div class="last_views col-5 col-sm-7">
    		<h2 class="hot_suggestion">Последняя активность</h2>
				<div class="col-md-6 col-sm-6 text-center index_post">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem">
							<img src="<?=$article[0][9]?>" alt="#">
						</div>
						<h3><?=$article[0][1]?></h3>
						<p data-parent="<?=$article[0][10]?>"><?=$article[0][1]?></p>
						<span  data-parent="<?=$row[1]?>">Автор: </span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
				<div class="col-md-6 col-sm-6 text-center index_post">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem">
							<img src="<?=$article[1][9]?>" alt="#">
						</div>
						<h3><?=$article[1][1]?></h3>
						<p data-parent="<?=$article[1][10]?>"><?=$article[1][1]?></p>
						<span  data-parent="<?=$row[1]?>">Автор:</span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
			</div>

		</div>
	</div>
  </div>

	<header id="fh5co-header" class="fh5co-cover personal_info" role="banner" style="background: #0dc70a;">
		<div class="overlay">
			<button type="submit" class="btn btn-primary crt">Создать событие</button>
			<button type="submit" class="btn btn-primary opn">Активное событие</button>
			<button type="button" class="btn btn-primary danger displayed">Закрыть</button>
		</div>
	</header>
	<div id="fh5co-contact" class="fh5co-contact displayed">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xs-push-3 animate-box">
					<p>Для организации события пожалуйста введите:</p>
					<div class="form_creat">
					<form action="personal-forms.php" method="post" class="visible_form unvisible">
						<div class="row form-group">
							<div class="col-md-6 ">
								<input type="text" id="ename" class="form-control" placeholder="Название мероприятия">
							</div>
							<div class="col-md-6">
								<input type="text" id="etime" name ="etime" class="form-control" placeholder="Дата(XX/XX/XXXX)">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="eplace" name="eplace" class="form-control" placeholder="Место проведения">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="file" class="custom-file-input" name ="efile" id="customFile">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<textarea name="message" id="emessage" cols="20" rows="10" class="form-control"  name ="emessage" placeholder="Опишите цель создания события"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Отправить" name="esend" class="btn btn-primary cls">
						</div>
					</form>		
				</div>
				</div>
			</div>		
		</div>
	</div>
		<div id="fh5co-project" class="event_fh5co displayed">
		<div class="container">
		<div class="project-content">
			<div class="col-half">
				<div class="project-grid animate-box">
					<div class="desc" style=" background-color: #0dc70a !important;">
						<h3>Название</h3>
						<p>Приглашаем вас принять участие в одной из наших акций. </p>
						<form class="act_event" method="post">
							<button type="submit" class="btn-post take_a_part dis">Отказаться от участия</button>
						</form>
					</div>
				</div>
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
						<li><a href="personal.html">Личный кабинет</a></li>
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

	<script src="js/person.js"></script>

	</body>
</html>

