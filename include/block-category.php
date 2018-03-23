<div id="block-category">
<p class="header-title">Категории товаров</p>

<ul>
<li><a id="index1"><img src="/images/mobile-icon.gif" id="mobile-images"/>Мобильные телефоны</a>

<ul class="category-section">
<li><a href="view_cat.php?type=mobile"><strong>Все модели</strong></a></li>

<?php
//вывод категории mobile из БД
	 $result =  mysqli_query($connection, "SELECT * FROM category WHERE type='mobile'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                        echo'
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
                         
                         }
                    while ($row = mysqli_fetch_array($result));
                }
?>

</ul>

</li>

</ul>
<ul>
<li><a id="index2"><img src="/images/book-icon.gif" id="book-images"/>Ноутбуки</a>

<ul class="category-section">
<li><a href="view_cat.php?type=notebook"><strong>Все модели</strong></a></li>
<?php
//вывод категории notebook из БД
	 $result =  mysqli_query($connection, "SELECT * FROM category WHERE type='notebook'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                        echo'
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
                         
                         }
                    while ($row = mysqli_fetch_array($result));
                }
?>

</ul>

</li>

</ul>
<ul>
<li><a id="index3"><img src="/images/table-icon.gif" id="table-images"/>Планшеты</a>

<ul class="category-section">
<li><a href="view_cat.php?type=notepad"><strong>Все модели</strong></a></li>
<?php
//вывод категории notepad из БД
	 $result =  mysqli_query($connection, "SELECT * FROM category WHERE type='notepad'");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                        echo'
                        <li><a href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>';
                         
                         }
                    while ($row = mysqli_fetch_array($result));
                }
?>

</ul>

</li>

</ul>

</div>