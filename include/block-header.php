<div id="block-header">
<div id="header-top-block">

<ul id="header-top-menu">

<li>��� ����� - <span>�������</span></li>
<li><a href="o-nas.php">� ���</a></li>
<li><a href="magaziny.php">��������</a></li>
<li><a href="contacts.php">��������</a></li>

</ul>

<?php
	if ($_SESSION['auth'] == 'yes_auth'){
	   echo '<p id="auth-user-info" align="right"><img src="/images/user.png"/>������������ '.$_SESSION['auth_name'].'!</p>';
	}
    else{
        
        echo '<p id="reg-auth-title" align="right"><a class="top-auth">����</a><a href="registration.php">�����������</a>';
        
    }
?>



<div id="block-top-auth">
<div class="corner"></div>
<form method="post">

<ul id="input-email-pass"> 

<h3>����</h3>   

<p id="message-auth">�������� ����� �(���) ������</p>
<li><center><input type="text" id="auth_login" placeholder="����� ��� E-mail"/></center></li>
<li><center><input type="password" id="auth_pass" placeholder="������"/><span id="button-pass-show-hide" class="pass-show"></span></center></li>

<ul id="list-auth">
<li><input type="checkbox" name="rememberme" id="rememberme"/><label for="rememberme">��������� ����</label></li>
<li><a id="remindpass" href="#">������ ������?</a></li>
<p align="right" id="button-auth"><a>����</a></p>
<p align="right" class="auth-loading"><img src="/images/loading.gif"/></p>

</ul>
</ul>



</form>

</div>
</div>


<div id="top-line"></div>


<img id="img-logo" src="/images/logo.png"/>

<div id="personal-info">
<p align="right">������ ����������.</p>
<h3 align="right">8 (800) 100-12-34</h3>
<img src="/images/phone-icon.png" />

<p align="right">����� ������:</p>
<p align="right">������ ���: � 9:00 �� 18:00</p>
<p align="right">�������, ����������� - ��������</p>


<img src="/images/time-icon.png" />

</div>

<div id="block-search">
<span></span>
<form method="GET" action="search.php?q=">

<input type="text" id="input-search" name="q" placeholder="����� ����� ����� 100.000 �������" />

<input type="submit" id="button-search" value="�����" />

</form>

</div>

</div>
<div id="top-menu">

<ul>
<li><img src="/images/shop.png" /><a href="index.php">�������</a></li>
<li><img src="/images/new-32.png" /><a href="index.php">�������</a></li>
<li><img src="/images/bestprice-32.png" /><a href="index.php">������ ������</a></li>
<li><img src="/images/sale-32.png" /><a href="index.php">����������</a></li>


</ul>

<p align="right" id="block-basket"><img src="/images/cart-icon.png"/><a href="cart.php?action=onclick">������� �����</a></p>

<div id="nav-line"></div>

</div>