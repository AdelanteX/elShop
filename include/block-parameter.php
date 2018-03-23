<script type="text/javascript">
//�������� ���
$(document).ready(function() {
    $('#blocktrackbar').trackbar({
        onMove : function() {
            document.getElementById("start-price").value = this.leftValue;
            document.getElementById("end-price").value = this.rightValue;
            },
            width : 160,
            leftLimit : 1000,
            leftValue : 1000,
            rightLimit : 50000,
            rightValue : 30000, 
            roundUp : 1000
        });
});
</script>

<div id="block-parameter">
<p class="header-title">����� �� ����������</p>

<p class="title-filter">���������</p>

<form method="GET" action="search_filter.php">

<div id="block-input-price">

<ul>
<li><p>��</p></li>
<li><input type="text" id="start-price" name="start_price" value="1000"/></li>
<li><p>��</p></li>
<li><input type="text" id="end-price" name="end_price" value="30000"/></li>
<li><p>���.</p></li>
</ul>
</div>

<div id="blocktrackbar"></div>



<p class="title-filter">�������������</p>
<ul class="checkbox-brand">
<?php
	//������� ������ �� ��������������
                $result =  mysqli_query($connection, "SELECT * FROM category WHERE type='mobile' ");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                        $checked_brand = "";
                      if($_GET["brand"])
                      {
                        if(in_array($row["id"],$_GET["brand"]))
                        {
                            $checked_brand = "checked";
                            
                        }
                      }  
                        
                        echo'<li><input  '.$checked_brand.' type="checkbox"name="brand[]" value="'.$row["id"].'" id="checkboxbrand'.$row["id"].'"/><label for="checkboxbrand'.$row["id"].'">'.$row["brand"].'</label></li>';
                         }
                    while ($row = mysqli_fetch_array($result));
                }
?>


</ul>

<center><input type="submit" name="submit" id="button-param-search" value=""/></center>

</form>


</div>