<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	if(isset($_POST["send"])) {
		//print_r($_POST);
		$from = htmlspecialchars($_POST["email"]);
		$to = htmlspecialchars("gslepenkov@gmai.com");
		$subject = htmlspecialchars($_POST["subject"]);
		$message = htmlspecialchars($_POST["message"]);
		$_SESSION["email"] = $from;
		$_SESSION["to"] = $to;
		$_SESSION["subject"] = $subject;
		$_SESSION["message"] = $message;
		$error_from = "";
		$error_to = "";
		$error_subject = "";
		$error_message = "";
		if ($from == "" || !preg_match("/@/", $from)){
			$error_from = "Введите корректный email";
			$error = true;
		}
		if ($to == "" || !preg_match("/@/", $to)){
			$error_to = "Введите корректный email";
			$error = true;
		}
		if (strlen($subject) == 0)
		{
			$error_subject = "Введите тему сообщения";
			$error = true;
		}
			if (strlen($message) == 0)
		{
			$error_message = "Введите сообщение";
			$error = true;
		}
		if (!$error){
			$subject ="=?utf-8?B?".base64_encode($subject)."?=";
			$headers= "From: $from\r\nReply-to:
			 $from\r\nContent-type: text/plain; charset=utf-8\r\n";
			 mail($to,$subject,$message,$headers);
			// header("Location: success.php?send = 1");
			}
	}
	$serverName = "LAPTOP-LSBPF23O"; //если instance и port стандартные, то можно не указывать
	$connectionInfo = ARRAY("Database"=>"ecolab","CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	$sql_min = "SELECT MIN(id) FROM events_list";
	$min_ar = sqlsrv_fetch_array(sqlsrv_query( $conn, $sql_min), SQLSRV_FETCH_NUMERIC);	
	$min_ev =	$min_ar[0];						
	for ($i=$min_ev;$i<=$min_ev+3;$i++)
								{
								$sql = "SELECT * FROM events_list WHERE id = '$i'";
								$result = sqlsrv_query( $conn, $sql,$params);
								$res = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC);
								if(count($res)>0){
										$ev_title[$i] = $res[4];
										$ev_text[$i] = $res[5];
										$ev_author[$i] = $res[3];
										$ev_date[$i] = $res[2];
										$ev_src[$i] = $res[8];
								 }
								}
					$sql_min = "SELECT MIN(id) FROM articles_list";
					$min_ar = sqlsrv_fetch_array(sqlsrv_query( $conn, $sql_min), SQLSRV_FETCH_NUMERIC);
					$min_art = $min_ar[0];
					for ($i=$min_art;$i<=$min_art+2;$i++)
								{
								$sql = "SELECT * FROM articles_list WHERE id = '$i'";

								$result = sqlsrv_query( $conn, $sql);
								$res = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC);
								if(count($res)>0){
										$art_title[$i] = $res[1];
										$art_text[$i] = $res[2];
										$art_src[$i] = $res[9];
										$art_date[$i]=$res[4];
							 }
							}

								
								$sql_min = "SELECT MIN(id) FROM news_list";
								$min_ar = sqlsrv_fetch_array(sqlsrv_query( $conn, $sql_min), SQLSRV_FETCH_NUMERIC);
								$min_news = $min_ar[0];

							 	for ($i=$min_news;$i<=$min_news+3;$i++)
								{
									if (($i>3)&&(i<9)) $j=$i+5;
									else $j=$i;
								$sql = "SELECT * FROM news_list WHERE id = '$j' ";
						  	$result = sqlsrv_query( $conn, $sql);
								$res = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC);

								$sql2 =  "SELECT login FROM users_list WHERE id = '$res[8]'";
								$result2 = sqlsrv_query( $conn, $sql2);
								$res2=sqlsrv_fetch_array($result2, SQLSRV_FETCH_NUMERIC);
								
								if(count($res)>0){
										$news_title[$i] = $res[1];
										$news_text[$i] = $res[2];	
										$news_src[$i] = $res[7];
										$news_date[$i]=$res[4];
										$news_author[$i]=$res2[0];
							 }
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
						<li class="active"><a href="index.php">Главная</a></li>
						<li><a href="projects.php">Проекты</a></li>
						<li><a href="news.php">Новости</a></li>
						<li><a href="ivents.php">События</a></li>
						<li><a href="contact.php">Контакты</a></li>
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

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image: url(images/nature.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Защитим природу вместе</h1>
							<h2 class="small_h2">За всё время мы решили более n экологических проблем, убрали m тонн отходов и вынесли на обсуждение в администрацию k проектов</h2>
							<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<div class="form-group">
											<a class="btn btn-default" href="reg_main.php">Присоединиться</a>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<h2 class="hot_suggestion">Острые проблемы</h2>
				<div class="col-md-4 col-sm-4 text-center index_post">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem">
							<img src="<?=$news_src[$min_news]?>" alt="#">
						</div>
						<h3><?=$news_title[$min_news]?></h3>
						<p data-parent="322"><?=file_get_contents($news_text[$min_news])?></p>
						<span  data-parent=""><?=$news_author[$min_news].", ".$news_date[$min_news]?> </span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
				<div class="col-md-4 col-sm-4 text-center index_post">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem">
							<img src="<?=$news_src[$min_news+1]?>" alt="#">
						</div>
						<h3><?=$news_title[$min_news+1]?></h3>
						<p data-parent="122"><?=file_get_contents($news_text[$min_news+1])?></p>
						<span  data-parent=""><?=$news_author[$min_news+1].", ".$news_date[$min_news+1]?> </span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
				<div class="col-md-4 col-sm-4 text-center index_post">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem">
							<img src="<?=$news_src[$min_news+2]?>" alt="#">
						</div>
						<h3><?=$news_title[$min_news+2]?></h3>
						<p data-parent="142"><?=file_get_contents($news_text[$min_news+2])?></p>
						<span  data-parent=""><?=$news_author[$min_news+2].", ".$news_date[$min_news+2]?> </span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
				<div class="col-md-4 col-sm-4 text-center index_post">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem">
							<img src="<?=$news_src[$min_news+3]?>" alt="#">
						</div>
						<h3><?=$news_title[$min_news+3]?></h3>
						<p data-parent="12"><?=file_get_contents($news_text[$min_news+3])?></p>
						<span  data-parent=""><?=$news_author[$min_news+3].", ".$news_date[$min_news+3]?> </span>
					</div>
					<a href="#" class="btn-post">Читать</a>
				</div>
			</div>
			<div class="bottom_more_posts">
			<a href="projects.php" class="btn-post to_main_posts">Узнать больше</a>
			</div>
		</div>
	</div>

	<div id="fh5co-project">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Мероприятия</h2>
					<p>Приглашаем вас принять участие в одной из наших акций. Сделаем наш город чище!</p>
				</div>
			</div>
		<div class="project-content">
			<div class="col-half">
				<div class="project-grid animate-box" style="background-image: url(<?=$ev_src[$min_ev]?>)!important;">
					<img src="<?=$ev_src[$min_ev]?>" style="width: 100%; height: 100%">
					<div class="desc">
						<h3><?=$ev_title[$min_ev]?></h3>
						<p>Приглашаем вас принять участие в одной из наших акций. </p>
						<a href="#" class="btn-post take_a_part">Участвовать</a>
					</div>
				</div>
				<div class="project-grid animate-box"style="background-image: url(<?=$ev_src[$min_ev+1]?>)!important;">
					<img src="<?=$ev_src[$min_ev+1]?>" style="width: 100%; height: 100%">
					<div class="desc">
						<h3><?=$ev_title[$min_ev+1]?></h3>
						<p>Приглашаем вас принять участие в одноЙ из наших акций.</p>
						<a href="#" class="btn-post take_a_part">Участвовать</a>
					</div>
				</div>
			</div>
			<div class="col-half">
				<div class="project-grid animate-box" style="background-image: url(<?=$ev_src[$min_ev+2]?>)!important;">
					<img src="<?=$ev_src[$min_ev+2]?>" style="width: 100%; height: 100%">
					<div class="desc">
						<h3><?=$ev_title[$min_ev+2]?></h3>
						<p>Приглашаем вас принять участие в одноЙ из наших акций.</p>
						<a href="#" class="btn-post take_a_part">Участвовать</a>
					</div>
				</div>
				<div class="project-grid animate-box" style="background-image:url(<?=$ev_src[$min_ev+3]?>)!important;">
					<img src="<?=$ev_src[$min_ev+3]?>" style="width: 100%; height: 100%">
					<div class="desc">
						<h3><?=$ev_title[$min_ev+3]?></h3>
						<p>Приглашаем вас принять участие в одноЙ из наших акций.</p>
						<a href="#" class="btn-post take_a_part">Участвовать</a>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="bottom_btn_post"><a href="ivents.php" class="btn-post bottom">Узнать больше</a></div>
	</div>

<div id="fh5co-blog" style="background-image:url(images/img_bg_2.jpg);-webkit-background-size: cover;background-size: cover;background-position: center top;  background-repeat: no-repeat;">
	<h2>Статьи</h2>
<div class="container">
	<div class="row news">
				<div class="col-xs-10 col-xs-offset-1 col-sm-offset-0 col-sm-12">
					<div class="row feature-index animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img col-12 col-md-6 text-center">
							<img src="<?=$art_src[$min_art]?>" alt="#">
						</div>
						<div class="col-12 col-md-6">
							<h3><?=$art_title[$min_art]?></h3>
							<p><?=file_get_contents($art_text[$min_art])?></p>
							<a href="news.php" class="btn-post read_blog">Читать</a>
						</div>
					</div>
				</div>
				<div class="col-xs-10 col-sm-12 col-xs-offset-1 col-sm-offset-0">
					<div class="row feature-index animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img col-12 col-md-6">
							<img src="<?=$art_src[$min_art+1]?>" alt="#">
						</div>
						<div class="col-12 col-md-6">
							<h3><?=$art_title[$min_art+1]?></h3>
							<p><?=file_get_contents($art_text[$min_art+1])?></p>
							<a href="news.php" class="btn-post read_blog">Читать</a>
						</div>
					</div>
				</div>
				<div class="col-xs-10 col-sm-12 col-xs-offset-1 col-sm-offset-0">
					<div class="row feature-index animate-box" data-animate-effect="fadeIn">
						<div class="img_top_problem news_img col-12 col-md-6">
							<img src="<?=$art_src[$min_art+2]?>" alt="#">
						</div>
						<div class="col-12 col-md-6">
							<h3><?=$art_title[$min_art+2]?></h3>
							<p><?=file_get_contents($art_text[$min_art+2])?></p>
							<a href="news.php" class="btn-post read_blog">Читать</a>
						</div>
					</div>
				</div>
		</div>
</div>
</div>

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

