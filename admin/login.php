<?php
    session_start();
    define('myeshop', true);
    include("include/db_connect.php");
    include("include/functions.php");
 
     
 If ($_POST["submit_enter"])
 {
    $login = clear_string($_POST["input_login"]);
    $pass  = clear_string($_POST["input_pass"]);
     
   
 if ($login && $pass)
  {
    
 
   $result = mysqli_query($connection, "SELECT * FROM reg_admin WHERE login = '$login' AND pass = '$pass'");
    
 If (mysqli_num_rows($result) > 0)
  {
    $row = mysqli_fetch_array($result);
 
    $_SESSION['auth_admin'] = 'yes_auth'; 
    
    
 
 
    header("Location: index.php");
  }else
  {
        $msgerror = "Неверный Логин и(или) Пароль."; 
  }
 
         
    }else
    {
        $msgerror = "Заполните все поля!";
    }
  
 }
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="admin" />
    <link href="css/style-login.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
	<title>Панель управления - Вход</title>
</head>

<body>

<div id="block-pass-login">

<?php
	if($msgerror)
    {
        echo '<p id="msgerror">'.$msgerror.'</p>';
    }
?>
<form method="post">

<ul id="pass-login">
<li><label>Логин</label><input type="text" name="input_login" /></li>
<li><label>Пароль</label><input type="password" name="input_pass" /></li>

</ul>

<p align="right"><input type="submit" name="submit_enter" id="submit_enter" value="Вход"/></p>
</form>






</div>

</body>
</html>