<?php
	$mysqli = new mysqli("127.0.0.1","root","","ecolab");
	$sql = "INSERT INTO `ecolab_news`
	( `text`, `image`, `author`, `title`, `date`)
	VALUES ('articles/news4.txt','images/News4.jpg','Georgy-Zay','Активисты убрали снег на улице...','10.12.2019')";

	$mysqli->query($sql);
	$mysqli->close();
?>

