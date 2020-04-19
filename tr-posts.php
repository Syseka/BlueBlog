<?php
session_start(); include "db-req.php";
print "<h2>Вы вошли как жопой об косяк, нахуй. Ну привет, " . $_SESSION['user'] . ", нахуй.</h2>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf8'>
	<title>Посты</title>
</head>

<body>
    <style>
		.main
			{
				
			}
        .mess
            {
                border: 2px solid black;
                padding-left: 5px;
				padding-bottom: 2px;
				padding-top: 2px;
                width: 550px; 
				//word-wrap: break-word;
				//word-break: break-all;
				table-layout: fixed;
				border-radius: 10px;
				background-color: rgba(0, 0, 0, 0.3);
				margin: 5px;
            }
		h2 {
				padding-bottom: 4px;
				border-bottom: 1px solid #cccccc;
			}
		h3 {
				padding-bottom: 2px;
				border-bottom: 1px solid #000000;
				font-family: consolas;
			}
		.mess p
			{
				word-wrap: break-word;
				table-layout:fixed;
				font-family: lucida console;

			}
    </style>
<div class='main'>
<?php
	if($_SESSION['user'])
		{
			show_posts($db_user);
		}
?></div>
</body>
</html>