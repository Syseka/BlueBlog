<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf8'>
    <title>Регистрация</title>
    </head>
<body>
    <div>
    <form method='post'>
        <input name='log' type='text' placeholder='Логин'><br>
        <input name='pas' type='password' placeholder='Пароль'><br>
        <button type='sumbit'>Регистрация</button><br>
        <a href='login.php'>Уже есть профиль</a><br>
		<a href='index.php'>На главную</a>
    </form> </div>
<?php
$log = $_POST['log'];
$pas = $_POST['pas'];

if ($log != NULL)
    {
        include "db-req.php";
        adduser ($log, $pas, $db_user);
		exit;
    }
else
    {
        print "Поля пустые.";
    }
?>
</body>
</html>