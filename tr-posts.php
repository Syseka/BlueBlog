<?php
session_start(); 
include "db-req.php"; 
include "picture/uplpic.php";
print "
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf8'>
	<!--<link rel='stylesheet' 
	href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' 
	integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' 
	crossorigin='anonymous'>-->
		<script 
		type='text/javascript' 
		src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js'>
		</script>
	 <link rel='stylesheet' href='styl.css'> 
		
	<title>Посты</title>
</head>

<div class='navigate' style='position: sticky;'>
<form method='get' name='type' id='typp'></form>
<table> 
    <tbody>
	<tr>
        <td>
            <span class='hith'>
            Ну привет, <b>";
			if($_SESSION['user']) 
				{ 
					print $_SESSION['user'];
				}
			else 
				{
					print "гость";
				}
			print"</b>.
            </span>
        </td>
        <td> 
			<span class='hith'> <a href='index.php'><b>На главную</b></a></span>
		</td>
		<td>
			<span class='hith'><a href='tr-posts.php'><b>Обновить</b></a></span>
		</td>
        <td style='width: 70px;'>
            <img src='picture/1412262571_634760635.gif' 
			style='
            width: 50%;
            align: right;'>
        </td>

<td>
    Категория: 
</td>
    <td>
    <input type='radio' id='type' name='typo' value='type1' form='typp'>
    <label for='ptype'>Type 1</label>
</td>
    
    <td><input type='radio' id='type' name='typo' value='type2' form='typp'>
    <label for='ptype'>Type 2</label>
</td>
    
    <td><input type='radio' id='type' name='typo' value='all' form='typp'>
</td>

    <td><label for='type'>Все</label><br>
    <button type='sumbit' form='typp'>Показать</button>
</td>
	
     </tr>
</tbody></table></div>";

//<div><h2>Ну привет, ".$_SESSION['user'].".</h2></div>;
if ($_SESSION['user'])
	{
	print "
<body style='
	background: #D8D8D8; 
	padding: 0;
    margin-top: 0px;
    margin-right: 0px;
    margin-left: 0px;'>

<div class='main'>

<form method='post' enctype='multipart/form-data' id='thatform'></form>

<table class='make_post'>
	<tr>
		<th colspan='2'>Запости и ты, <b>{$_SESSION['user']}</b>:</th>
		<td>
			<span><a href='tr-posts.php'><b>Обновить</b></a></span>
		</td>
	</tr>
	<tr>
		<td colspan='3'>
		<textarea form='thatform' class='textar' cols='55' rows='8' name='txt' 
		type='text' placeholder='Текст письма...'></textarea>
		</td>
	</tr>
	<tr>
		<td colspan='3'>Для постинга нужно набрать сообщение и выбрать тип поста.</td>
	</tr>
	<tr>
		<td>
		<input form='thatform' type='radio' id='type' name='ptype' value='type1'>
		<label for='ptype'>Type 1</label>
		</td>


		<td>
		<input form='thatform' type='radio' id='type' name='ptype' value='type2'> 
		<label for='ptype'>Type 2</label>
		</td>
	</tr>
	
	<tr>
		<td colspan='3'>
			<input form='thatform' type='file' name='pict' 
			action='picture/uplpic.php'>
		</td>
	</tr>
	<tr>
		<td colspan='3'>
			Только файлы форматов: <b>JPG</b>, <b>PNG</b>, <b>GIF</b>
		</td>
	</tr>
	<tr><td colspan='3' align='center'>
		<button form='thatform' type='sumbit'>Годнопостить</button>
	</td></tr>
</table>

	<!-- <div class='make_post'>
		<p>Запости и ты, <b>{$_SESSION['user']}</b>:</p>
		
	<form method='post' enctype='multipart/form-data'>
	
        <textarea class='textar' cols='55' rows='8' name='txt' 
		type='text' placeholder='Текст письма...'></textarea>
		<p>Для постинга нужно набрать сообщение и выбрать типа поста.</p>
		
	<div class='button'>	
		<input type='radio' id='type' name='ptype' value='type1'>
		<label for='ptype'>Type 1</label>
		
		<input type='radio' id='type' name='ptype' value='type2'> 
		<label for='ptype'>Type 2</label>
	</div><br>
		<input type='file' name='pict' action='picture/uplpic.php'>
		<p>Только файлы форматов: <b>JPG</b>, <b>PNG</b>, <b>GIF</b></p>
		<button type='sumbit'>Годнопостить</button>
	</form> -->


	<div class='posts'>";
	}
else
	{
		print"
		<table align='center' style='
			width: 15%;
			height: 15%;
			border: 2px solid black;
			padding-left: 1%;
			padding-top: 2px;
			border-radius: 10px;
			background-color: rgba(0, 0, 0, 0.3);
			margin-top: 12%;'>
			
		<tr><th><span font-size='5'>Надо авторизоваться.</span></th></tr>
		</tabel>";
	}

$post = $_POST['txt'];
$type = $_POST['ptype'];
$file = $_FILES['pict']['name'];
$autor = $_SESSION['user'];
$timep = date("d.m.Y - H:i", time()+4*60*60);

if( !empty($type) and ( !empty($post) or !empty($file) ) )
	{	
		go_post($post, $autor, $type, $timep, $file, $db_user);
		show_posts($db_user);
	}
if($_SESSION['user'])
	{
		show_posts($db_user);
	}
print"
	</div>
</div>
<!--
<script 
src='https://code.jquery.com/jquery-3.4.1.slim.min.js' 
integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' 
crossorigin='anonymous'></script>
<script 
src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' 
integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' 
crossorigin='anonymous'></script>
<script 
src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' 
integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' 
crossorigin='anonymous'></script> 
-->
<script type='text/javascript' src='pict.js'></script>
</body>
</html>";