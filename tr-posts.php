<?php
session_start(); include "db-req.php"; include "picture/uplpic.php";
print "<h2>Ну привет, ". $_SESSION['user'] . ".</h2>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf8'>
	<link rel="stylesheet" href="styl.css">
	<title>Посты</title>
</head>

<body style= "background: #D8D8D8">

<p> <a href='index.php'>На главную</a> <a href='tr-posts.php'>Обновить</a></p>

<div class='main'>

	<div class='make_post'>
		<p>Запости и ты, <b><?php print $_SESSION['user']; ?></b>:</p>
		
	<form method='post' enctype='multipart/form-data'>
	
        <textarea cols='60' rows='8' name='txt' 
		type='text' placeholder='Текст письма...'></textarea>
		<p>Для постинга нужно набрать сообщение и выбрать типа поста.</p>
		
	<div class='button'>	
		<input type="radio" id="type" name="ptype" value="type1">
		<label for="ptype">Type 1</label>
		
		<input type="radio" id="type" name="ptype" value="type2"> 
		<label for="ptype">Type 2</label>
	</div><br>
		<input type='file' name='pict' action='picture/uplpic.php'>
		<p>Только файлы форматов: <b>JPG</b>, <b>PNG</b>, <b>GIF</b></p>
		<button type='sumbit'>Годнопостить</button>
		

	</form>
	</div>
	
	<div class='posts'>
<?php
$post = $_POST['txt'];
$type = $_POST['ptype'];
$file = $_FILES['pict']['name'];
$autor = $_SESSION['user'];
$timep = date("d.m.Y - H:i", time()+4*60*60);

if(!empty($post) and !empty($type))
	{	
		go_post($post, $autor, $type, $timep, $file, $db_user);
		show_posts($db_user);
	}
if($_SESSION['user'])
	{
		show_posts($db_user);
	}
?>
	</div>
</div>

</body>
</html>