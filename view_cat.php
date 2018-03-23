<?php include("include/db_connect.php");
include("functions/functions.php");
session_start();
include("include/auth_cookie.php");
$cat = clear_string($_GET["cat"]);

$type = clear_string($_GET["type"]);

$sorting = $_GET["sort"]; //����������� ���������� �� ������ �����o� GET 

switch($sorting)
{
    case 'price-asc';
    $sorting = 'price ASC';
    $sort_name = '�� ������� � �������';
    break;
    
     case 'price-desc';
    $sorting = 'price DESC';
    $sort_name = '�� ������� � �������';
    break;
    
     case 'popular';
    $sorting = 'count DESC';
    $sort_name = '����������';
    break;
    
     case 'news';
    $sorting = 'datetime DESC';
    $sort_name = '�������';
    break;
    
     case 'brand';
    $sorting = 'brand';
    $sort_name = '�� � �� �';
    break;
    
    default:
    $sorting = 'products_id DESC';
    $sort_name = '��� ����������';
    break;
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="admin" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="js/shopscript.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="trackbar/jquery.cookie.min.js"></script>
    
	<title>��������-������� �������� �������</title>
</head>

<body>
<div id="block-body">
<?php  include("include/block-header.php")?>

<div id="block-right">
<?php  include("include/block-category.php")?>
<?php  include("include/block-parameter.php")?>
<?php  include("include/block-news.php")?>
</div>
<div id="block-content">

<div id="block-sorting">

<p id="nav-breadcrumbs"><a href="index.php">������� ��������</a> \ <span>��� ������</span></p>

<ul id="options-list">

<li>���:</li>
<li><img id="slyle-grid" src="/images/icon-grid.png"/></li>
<li><img id="slyle-list" src="/images/icon-list.png"/></li>
<li>�����������:</li>
<li><a id="select-sort"><?php echo $sort_name; ?></a>

<ul id="sorting-list">
<li><a href="index.php?sort=price-asc">�� ������� � �������</a></li>
<li><a href="index.php?sort=price-desc">�� ������� � �������</a></li>
<li><a href="index.php?sort=popular">����������</a></li>
<li><a href="index.php?sort=news">�������</a></li>
<li><a href="index.php?sort=brand">�� � �� �</a></li>
</ul>
</li>
</ul>
</div>

<ul id="block-tovar-grid">
<?php
if (!empty($cat) && !empty($type)){
    
    $querycat = "AND brand='$cat' AND type_tovara='$type'";
    
}else
{
  if(!empty($type))
  {
  $querycat = "AND type_tovara='$type'";  
  } else{
    $querycat = "";
  } 
}


    
                $result =  mysqli_query($connection, "SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                       if ($row["image"] != "" && file_exists("./uploads_images/".$row["image"])) 
                        {
                        $img_path = './uploads_images/'.$row["image"];
                        $max_width = 230;
                        $max_height = 230;
                        list($width, $height)= getimagesize($img_path);    
                        $ratioh = $max_height/$height;
                        $ratiow = $max_width/$width;
                        $ratio = min($ratioh, $ratiow);
                        $width = intval($ratio*$width);
                        $height = intval($ratio*$height);
                        }else
                        {
                            $img_path = "/images/no-image.png";
                            $height = 200;
                            $width = 110;
                        }    
                            
                            
                            
                            
                            
                            
                    
                        echo('
                        <li>
                        <div class="block-images-grid">
                        <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
                        </div>
                        <p class="style-title-grid"><a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a></p>
                        <ul class="reviews-and-counts-grid">
                        <li><img src="/images/eye-icon.png"/><p>0</p></li>
                        <li><img src="/images/comment-icon.png"/><p>0</p></li>
                        </ul>
                        <a class="add-cart-style-grid"></a>
                        <p class="style-price-grid"><strong>'.$row["price"].'</strong> ���.</p>
                        <div class="mini-features">
                        '.$row["mini_features"].'
                        </div>
                        </li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                }
            
 
?>
</ul>

<ul id="block-tovar-list">
<?php
    
                $result =  mysqli_query($connection, "SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                       if ($row["image"] != "" && file_exists("./uploads_images/".$row["image"])) 
                        {
                        $img_path = './uploads_images/'.$row["image"];
                        $max_width = 230;
                        $max_height = 230;
                        list($width, $height)= getimagesize($img_path);    
                        $ratioh = $max_height/$height;
                        $ratiow = $max_width/$width;
                        $ratio = min($ratioh, $ratiow);
                        $width = intval($ratio*$width);
                        $height = intval($ratio*$height);
                        }else
                        {
                            $img_path = "/images/no-image.png";
                            $height = 200;
                            $width = 110;
                        }    
                            
                            
                            
                            
                            
                            
                    
                        echo('
                        <li>
                        <div class="block-images-list">
                        <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
                        </div>
                        
                       
                        <ul class="reviews-and-counts-list">
                        <li><img src="/images/eye-icon.png"/><p>0</p></li>
                        <li><img src="/images/comment-icon.png"/><p>0</p></li>
                        </ul>
                        
                        <p class="style-title-list"><a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a></p>
                        
                        <a class="add-cart-style-list"></a>
                        <p class="style-price-list"><strong>'.$row["price"].'</strong> ���.</p>
                        <div class="style-text-list">
                        '.$row["mini_description"].'
                        </div>
                        </li>
                        ');
                    }
                    while ($row = mysqli_fetch_array($result));
                }
            
 
?>
</ul>
</div>

<?php  include("include/block-footer.php")?>
</div>
</body>
</html>