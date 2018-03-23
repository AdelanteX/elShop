<?php

function clear_string($cl_str){
    
   $cl_str = strip_tags($cl_str); //очистка урл от спецсимволов
   $cl_str = mysql_real_escape_string($cl_str); //экранирует спецсимволы '' и тд
   $cl_str = trim($cl_str); ////удаление пробелов урла
    
    return $cl_str; //возвращие к конечной переменной
}



?>