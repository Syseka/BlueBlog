<?php
session_start(); include "db-req.php";
print "<h2>Ну привет, ". $_SESSION['user'] . ".</h2>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf8'>
	<title>Посты</title>
</head>

<body>
    <style>
		input
			{
				height: 100px;
				//zise: 200px;
				margin: 3px;
			}
		.main
			{
				margin: 10px;
			}
		.make_post
			{
				wight: 300px;
				float: right;
				border: 2px solid black;
                padding-left: 7px;
                padding-right: 7px;
				background-color: rgba(0, 0, 0, 0.3);
				margin: 5px;
				border-radius: 10px;
			}
		.posts
			{
				wight: 300px;
				float: left;
			}
        .mess
            {
                border: 2px solid black;
                padding-left: 5px;
				//padding-bottom: 2px;
				padding-top: 2px;
                width: 535px; 
				table-layout: fixed;
				border-radius: 10px;
				background-color: rgba(0, 0, 0, 0.3);
				margin: 5px;
            }
		h2 {
				padding-bottom: 4px;
				border-bottom: 1px solid #cccccc;
			}
		.mess h3 {
				padding-bottom: 2px;
				font-size: 97%;
				border-bottom: 1px solid #000000;
				font-family: consolas;
			}
		p.letter
			{
				word-wrap: break-word;
				table-layout:fixed;
				font-family: lucida console;
				font-size: 95%;
				padding: 3px;
				margin-left: 4px;
				margin-right: 7px;
				margin-top: 10px;
				margin-bottom: 8px;
				border-bottom: 1px solid #cccccc;
			}
		p.autor
			{
				margin: 4px;
				font-size: 90%;
				font-family: Arial;
			}
    </style>
<p> <a href='index.php'>На главную</a> <a href='tr-posts.php'>Обновить</a></p>

<div class='main'>

	<div class='make_post'>
		<p>Запости и ты, <b><?php print $_SESSION['user']; ?></b>:</p>
	<form method='post'>
        <textarea cols='60' rows='8' wrap='soft' name='txt' 
		type='text' placeholder='Текст письма...'></textarea><br>
        <button type='sumbit'>Постить</button><br>
    </form>
	</div>
	
	<div class='posts'>
<?php
$post = $_POST['txt'];
//$postpr = "<pre>".$post."</pre>";
$autor = $_SESSION['user'];
	if(!empty($post))
		{	
			go_post($post, $autor, $db_user);
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