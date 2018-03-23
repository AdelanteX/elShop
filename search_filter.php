<?php include("include/db_connect.php");
include("functions/functions.php");
session_start();
//include("include/auth_cookie.php");
$cat = clear_string($_GET["cat"]);

$type = clear_string($_GET["type"]);


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
    
	<title>Поиск по параметрам</title>
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

<p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span></p>

<ul id="options-list">

<li>Вид:</li>
<li><img id="slyle-grid" src="/images/icon-grid.png"/></li>
<li><img id="slyle-list" src="/images/icon-list.png"/></li>
<li>Сортировать:</li>
<li><a id="select-sort"><?php echo $sort_name; ?></a>

<ul id="sorting-list">
<li><a href="index.php?sort=price-asc">От дешевых к дорогим</a></li>
<li><a href="index.php?sort=price-desc">От дорогих к дешевым</a></li>
<li><a href="index.php?sort=popular">Популярное</a></li>
<li><a href="index.php?sort=news">Новинки</a></li>
<li><a href="index.php?sort=brand">От А до Я</a></li>
</ul>
</li>
</ul>
</div>

<ul id="block-tovar-grid">
<?php
//выбор товаров по фильтру
if($_GET["brand"])
{
    $check_brand = implode(',',$_GET["brand"]);
}
$start_price = (int)$_GET["start_price"];
$end_price = (int)$_GET["end_price"];

if (!empty( $check_brand) OR !empty($end_price))
{
    if(!empty( $check_brand)) $query_brand = "AND brand_id IN($check_brand)";
    if(!empty($end_price)) $query_price = "AND price BETWEEN $start_price AND $end_price";

}


    
                $result =  mysqli_query($connection, "SELECT * FROM table_products WHERE visible='1' $query_brand $query_price ORDER BY products_id DESC");
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
                        <p class="style-title-grid"><a href="">'.$row["title"].'</a></p>
                        <ul class="reviews-and-counts-grid">
                        <li><img src="/images/eye-icon.png"/><p>0</p></li>
                        <li><img src="/images/comment-icon.png"/><p>0</p></li>
                        </ul>
                        <a class="add-cart-style-grid"></a>
                        <p class="style-price-grid"><strong>'.$row["price"].'</strong> грн.</p>
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
    
                $result =  mysqli_query($connection, "SELECT * FROM table_products WHERE visible='1' $query_brand $query_price ORDER BY products_id DESC");
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
                        
                        <p class="style-title-list"><a href="">'.$row["title"].'</a></p>
                        
                        <a class="add-cart-style-list"></a>
                        <p class="style-price-list"><strong>'.$row["price"].'</strong> грн.</p>
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