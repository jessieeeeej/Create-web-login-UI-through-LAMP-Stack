<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>LOGIN.php</title>
</head>
<body>
<?php
session_start();
$host = 'localhost'; $dbuser = 'root'; $dbpw = 'A1234567'; $dbname = 'demo';

// get user input
$username=""; $password="";
if (isset($_POST["username"])) $username = $_POST["username"];
if (isset($_POST["password"])) $password = $_POST["password"];


if ($username!="" && $password!=""){
  $link = @mysqli_connect($host, $dbuser, $dbpw, $dbname);

  if ($link) {
    //return true means connected, set connection UTF-8
    mysqli_query($link, "SET NAMES utf8");
    $sql = "SELECT * FROM member WHERE password='";
    $sql.= $password."' AND username='".$username."'";
    $result = mysqli_query($link, $sql);
    $total_records = mysqli_num_rows($result);

    if ($total_records > 0){	// login success
      $_SESSION["login_session"] = true;
      header("Location: test2.php");
    }
    else{				// login fail
      echo "<center><font color='red'>";
      echo "USER ID or PASSWORD error<br/>";
      echo "</font>";
      $_SESSION["login_session"] = false;
    }
  }
  else {
    echo "fail to connect: <br/>", mysqli_connect_error();
    exit();
  }
}

mysqli_close($link);
?>
<form action="test1.php" method="post">
  <div align="center" style="background-color:#DDDDDD;padding:50px;margin-bottom:50px;">
    <br>
    <label for="username">USER ID: </label>
    <input type="text" name="username" id="username" required autofocus/>
    <br>
    <br>
    <label for="password">PASSWORD: </label>
    <input type="password" name="password" id="password" required autofocus/>
    <br>
    <br>
    <input type="submit" value="LOGIN"/>
  <div>
</form>
</body>
</html>
