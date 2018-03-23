<div id="block-news">


<center><img id="news-prev" src="/images/img-prev.png"/></center>

<div id="newstiker">

<ul>

<?php
	 $result =  mysqli_query($connection, "SELECT * FROM news ORDER BY id DESC");
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {
                        echo'
                        
                        <li>
<span>'.$row["date"].'</span>
<a href="">'.$row["title"].'</a>
<p>'.$row["text"].'</p>
</li>
                       
                         ';
                         }
                    while ($row = mysqli_fetch_array($result));
                }
?>




</ul>










</div>









<Center><img id="news-next" src="/images/img-next.png"/></Center>




</div>