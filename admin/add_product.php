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
    
    $_SESSION['urlpage'] = "<a href='index.php'>�������</a> / <a href='tovar.php'>������</a> / <a>���������� ������</a>";
    
    include("include/db_connect.php");
    
     include("include/functions.php"); 
    

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="admin" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
    
	<title>������ ����������</title>
</head>

<body>

<div id="block-body">
<?php
	include("include/block-header.php");
    
   
?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page">���������� ������</p>
</div>

<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';
 
         if(isset($_SESSION['message']))
        {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        }
         
     if(isset($_SESSION['answer']))
        {
        echo $_SESSION['answer'];
        unset($_SESSION['answer']);
        } 
?>
 
<form enctype="multipart/form-data" method="post">
<ul id="edit-tovar">
 
<li>
<label>�������� ������</label>
<input type="text" name="form_title" />
</li>
 
<li>
<label>����</label>
<input type="text" name="form_price"  />
</li>
 
<li>
<label>�������� �����</label>
<input type="text" name="form_seo_words"  />
</li>
 
<li>
<label>������� ��������</label>
<textarea name="form_seo_description"></textarea>
</li>
<li>
<label>��� ������</label>
<select name="form_type" id="type" size="1" >
 
<option value="mobile" >��������� ��������</option>
<option value="notebook" >��������</option>
<option value="notepad" >��������</option>
 
</select>
</li>
 
<li>
<label>���������</label>
<select name="form_category" size="10" >
 
<?php
$category = mysqli_query($connection, "SELECT * FROM category");
     
If (mysqli_num_rows($category) > 0)
{
$result_category = mysqli_fetch_array($category);
do
{
   
  echo '
   
  <option value="'.$result_category["id"].'" >'.$result_category["brand"].'</option>
   
  ';
     
}
 while ($result_category = mysqli_fetch_array($category));
}
?> 
 
</select>
</ul> 
<label class="stylelabel" >�������� ��������</label>
 
<div id="baseimg-upload">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
<input type="file" name="upload_image" />
 
</div>
 
<h3 class="h3click" >������� �������� ������</h3>
<div class="div-editor1" >
<textarea id="editor1" name="txt1" cols="100" rows="20"></textarea>
        <script type="text/javascript">
            var ckeditor1 = CKEDITOR.replace( "editor1" );
            AjexFileManager.init({
                returnTo: "ckeditor",
                editor: ckeditor1
            });
        </script>
 </div>       
  
<h3 class="h3click" >�������� ������</h3>
<div class="div-editor2" >
<textarea id="editor2" name="txt2" cols="100" rows="20"></textarea>
        <script type="text/javascript">
            var ckeditor1 = CKEDITOR.replace( "editor2" );
            AjexFileManager.init({
                returnTo: "ckeditor",
                editor: ckeditor1
            });
        </script>
 </div>          
 
<h3 class="h3click" >������� ��������������</h3>
<div class="div-editor3" >
<textarea id="editor3" name="txt3" cols="100" rows="20"></textarea>
        <script type="text/javascript">
            var ckeditor1 = CKEDITOR.replace( "editor3" );
            AjexFileManager.init({
                returnTo: "ckeditor",
                editor: ckeditor1
            });
        </script>
 </div>        
 
<h3 class="h3click" >��������������</h3>
<div class="div-editor4" >
<textarea id="editor4" name="txt4" cols="100" rows="20"></textarea>
        <script type="text/javascript">
            var ckeditor1 = CKEDITOR.replace( "editor4" );
            AjexFileManager.init({
                returnTo: "ckeditor",
                editor: ckeditor1
            });
        </script>
  </div> 
 
<label class="stylelabel" >�������� ��������</label>
 
<div id="objects" >
 
<div id="addimage1" class="addimage">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
<input type="file" name="galleryimg[]" />
</div>
 
</div>
 
<p id="add-input" >��������</p>
      
<h3 class="h3title" >��������� ������</h3>   
<ul id="chkbox">
<li><input type="checkbox" name="chk_visible" id="chk_visible" /><label for="chk_visible" >���������� �����</label></li>
<li><input type="checkbox" name="chk_new" id="chk_new"  /><label for="chk_new" >����� �����</label></li>
<li><input type="checkbox" name="chk_leader" id="chk_leader"  /><label for="chk_leader" >���������� �����</label></li>
<li><input type="checkbox" name="chk_sale" id="chk_sale"  /><label for="chk_sale" >����� �� �������</label></li>
</ul> 
 
 
    <p align="right" ><input type="submit" id="submit_form" name="submit_add" value="�������� �����"/></p>     
</form>
 

</div>

</body>
</html>
<?php
	}
  //else{
   //   header("Location: login.php");
  //    }
?>