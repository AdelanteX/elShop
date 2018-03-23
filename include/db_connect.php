<?php
$connection = mysqli_connect('localhost', 'admin', '123456', 'db_shop');
if($connection == false){
    echo 'f**king error)';
    echo mysqli_connect_error();
    die();
}
mysqli_set_charset($connection, cp1251);
?>