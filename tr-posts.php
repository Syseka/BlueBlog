<?php
session_start(); include "db-req.php";
print "Вы вошли как жопой об косяк, нахуй. Ну привет, " . $_SESSION['user'] . ", нахуй.<br>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf8'>
	<title>Посты</title>
</head>

<body>
    <style>
        .mess
            {
                border: 2px solid black;
                padding: 7px;
                width: 420px; 
				word-wrap: break-word;
				border-radius: 10px;
				background-color: rgba(0, 0, 0, 0.3);
            }
    </style>
<?php
	if($_SESSION['user'])
		{
			show_posts($db_user);
		}
?>
</body>
</html>