<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf8'>
    <title>Авторизация</title>
    </head>
<body>
    <div>
    <form method='post'>
        <input name='log' type='text' placeholder='Логин'><br>
        <input name='pas' type='password' placeholder='Пароль'><br>
        <button type='sumbit'>Войти</button><br>
        <a href='regis.php'>Регистрация</a><br>
		<a href='main-page.php'>На главную</a><br>
    </form> </div>
<?php
$log = $_POST['log'];
$pas = $_POST['pas'];
include "db-req.php";
//var_dump($log, $pas); 

if ($log and $pas)
    {
        logtest ($log, $pas, $db_user);
    }
else
	{
		print "Для входа требуется ввод логина и пароля.";
	}
?>
</body>
</html>