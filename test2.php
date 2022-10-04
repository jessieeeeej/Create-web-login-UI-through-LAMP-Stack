<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>WELCOME.php</title>
</head>
<body>
<?php
session_start();

if ( $_SESSION["login_session"] != true)
  header("Location: LOGIN.php");
echo "Welcome in!<br/>";
?>
</body>
</html>
