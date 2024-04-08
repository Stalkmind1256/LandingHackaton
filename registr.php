<?php
session_start();

$hostname = "mariadb";
$username = "root";
$password = "password";
$database = "zvezdaopros";
$port = "3306";
$connect = mysqli_connect($hostname,$username,$password,$database,$port);

if (!$connect){
    die('ERROR: '. mysql_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    if($login == "admin" && $password == "admin"){
        $_SESSION["admin"] = true;
        header("Location: page_for_admin.php");
        exit();
    }else{
        echo "<p style='color:red;'>Wrong password</p>";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Вход</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="generator" content="Geany 2.0" />
</head>

<body>
<header>
<h2><a href="index.php" class="logo">Logo</a></h2>
              <label for="check">
                  <i class="fas fa-bars menu-btn"></i>
                  <i class="fas fa-times close-btn"></i>
              </label>
          </header>
    <form method = "POST">
        <label for = "login">login:</label>
        <input id = "login" name = "login" type="text" required><br>

        <label for="password">password:</label>
        <input id="password" name="password" type="password" required><br>

        <button type="submit">Enter</button>
    </form>
    
</body>



</html>

<?php
mysqli_close($connect);
?>