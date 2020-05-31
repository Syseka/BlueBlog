<?php
session_start();
include_once "db-req.php";

$alog = $_POST['alog'];
$apas = $_POST['apas'];

$rlog = $_POST['rlog'];
$rpas = $_POST['rpas'];
?>
<!DOCTYPE html> 
<html>
<head>
	<title>Основная страница</title>
	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
</head>
<body class="text-center" style= "background: #D8D8D8;">
	<!-- <div>
		Авторизация - <a href='login.php'>Тык</a><br>
		Регистрация - <a href='regis.php'>Тык</a><br>
		Годнопосты - <a href='tr-posts.php'>Тык</a><br>
		
стили от формы
		<div align='center' style='
	margin-top: 14%;
    //margin-left: 32%;
    //margin-right: 32%;
    border-radius: 15px;
    background-color: rgba(0, 0, 0, 0.3);
    border: 2px solid black;
    width: max-content;'>
	</div> -->
<?php

// АВТОРИЗАЦИЯ
if ( $_POST['abtn'] ) 
	{
		logtest ($alog, $apas, $db_user);
		exit;
	}
	
// РЕГИСТРАЦИЯ
elseif ( $_POST['rbtn'] )
    {
        adduser ($rlog, $rpas, $db_user);
		exit;
    }
	
// ПО УМОЛЧАНИЮ
else
	{
		print "
		<table align='center' cellpadding='5px' 
		style='
		margin-top: 12%;
		border-radius: 15px;
		background-color: rgba(0, 0, 0, 0.3);
		border: 2px solid black;
		width: max-content;'>

		<tr>
		<td>
		<div style='
		padding: 2%;
		border-right: 2px solid grey;
		float: left;'>
	
		<form method='post' class='form-signin'>
			<h1 class='h3 mb-3 font-weight-normal'>Регистрация</h1>
			<input class='form-control' name='rlog' type='text' placeholder='Логин'><br>
			<input class='form-control' name='rpas' type='password' placeholder='Пароль'><br>
			<button type='submit' name='rbtn' value='true' class='btn-block'>Регистрация</button><br>
		</form>
		</div>
		</td>

		<td>
		<div style='
		padding: 2%;
		border-left: 2px solid grey;
		float: right;'>
     
		<form method='post' class='form-signin'>
			<h1 class='h3 mb-3 font-weight-normal'>Авторизация</h1>
			<input class='form-control' name='alog' type='text' placeholder='Логин'><br>
			<input class='form-control' name='apas' type='password' placeholder='Пароль'><br>
			<button type='submit' value='true' name='abtn' class='btn-block'>Войти</button><br>
		</form>
		</div>
		</td>
		</tr>

		<tr style='margin:10px'>
		<td colspan='2'>
		<div>";
	}
print"
</div>
</td></tr>

</table></div>
</body>
</html>";