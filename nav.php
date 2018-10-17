<div id="nav">
	<div class="main">
    	<div class="logo"><img src="images/logo.png"></div>
        <div class="list">
        	<ul>
            	<?php
                	$sql="select * from newstype limit 0,8";
					$stmt=$pdo->query($sql);
					$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach($rows as $rs){
						echo "<li><a href={$rs['typeurl']}>{$rs['typename']}</a></li>";
					}
				?>
            </ul>
        </div>
    </div>
</div>