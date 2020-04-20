<?php
session_start(); include "db-req.php";
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
	<form method='post'>
	
        <textarea cols='60' rows='8' wrap='soft' name='txt' 
		type='text' placeholder='Текст письма...'></textarea><br>
		
		<button type='sumbit'>Годнопостить</button>
	
		<input type="radio" id="type"
           name="ptype" value="type1">
		<label for="ptype">Type 1</label>
		<input type="radio" id="type"
           name="ptype" value="type2">
		<label for="ptype">Type 2</label>
		<p align='center'>Навести бы тут красоту, да?</p>
    
	</form>
	</div>
	
	<div class='posts'>
<?php
$post = $_POST['txt'];
$type = $_POST['ptype'];
$autor = $_SESSION['user'];
	if(!empty($post) and !empty($type))
		{	
			go_post($post, $autor, $type, $db_user);
			
			show_posts($db_user);
		}
	else
		{
			print "<p class='warn'>Нет сообщения или не выбран тип поста.</p>";
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