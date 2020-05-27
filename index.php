<?php
session_start(); 
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
	</div> -->
<div style='
	margin-top: 14%;
    margin-left: 32%;
    margin-right: 32%;
    border-radius: 15px;
    background-color: rgba(0, 0, 0, 0.3);
    border: 2px solid black;
    width: max-content;
'>
<table cellpadding='8px' 
	style='
		margin: 4%;		
'>
<tr>
<td>
<div style="
	padding: 2%;
	border-right: 2px solid grey;
	float: left;
">
    <form method="post" class="form-signin">
	<h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
        <input class="form-control" name="rlog" type="text" placeholder="Логин"><br>
        <input class="form-control" name="rpas" type="password" placeholder="Пароль"><br>
        <button type="sumbit" class="btn-block">Регистрация</button><br>
    </form>
</div>
</td>

<td>
<div style="
    padding: 2%;
    border-left: 2px solid grey;
	float: right;
    ">
     
    <form method="post" class="form-signin">
	<h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
        <input class="form-control" name="alog" type="text" placeholder="Логин"><br>
        <input class="form-control" name="apas" type="password" placeholder="Пароль"><br>
        <button type="sumbit" class="btn-block">Войти</button><br>
    </form>
</div>
</td>
</tr>

<tr>
<td colspan='2' cellspacing='1px' style="
    border-style: dashed;
	border-width: 2px;
	border-radius: 10px;
	border-color: red;
	margin: 9px;
	//color: red;
">
<div>
<?php
$log = $_POST['rlog'];
$pas = $_POST['rpas'];

if ($log != NULL)
    {
        include "db-req.php";
        adduser ($log, $pas, $db_user);
		exit;
    }

$log = $_POST['alog'];
$pas = $_POST['apas'];
include "db-req.php"; 

if ($log and $pas)
    {
        logtest ($log, $pas, $db_user);
		
		exit;
    }
else
	{
		print "Для входа требуется ввод логина и пароля.";
	}
?>
</div>
</td></tr>

</table></div>
</body>
</html>