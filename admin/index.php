<?php
session_start();
	define('myeshop', true);
if($_SESSION['auth_admin'] == "yes_auth") 
{   
    //�������� ���� � �������� ������ ������ ��������� ������ � ������������� �� �������� �����
    if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        
        
    }
    
    $_SESSION['urlpage'] = "<a href='index.php'>�������</a>";
    
    include("include/db_connect.php");
    
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="admin" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
	<title>������ ����������</title>
</head>

<body>

<div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page">����� ����������</p>
</div>




</div>



</div>

</body>
</html>
<?php
	}
  //else{
   //   header("Location: login.php");
  //    }
?>