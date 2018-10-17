<?php ?>
<div class="main_right">
<h4><?php echo $typename?></h4>
<ul class="ul1">
    <?php
    $sql="select * from detailtype where typeid={$typeid}";
    $stmb=$pdo->query($sql);
    while($rp=$stmb->fetch(PDO::FETCH_ASSOC)){?>
    <li><a href="newslist.php?detailid=<?php echo $rp['detailid']?>"><?php echo ' &gt; '. $rp['detailname']?></a></li>
    <?php }?>
</ul>
<h4>最新新闻</h4>
<ul>
    <?php 
        $sql="select * from news order by fdate desc limit 0,6";
        $stmc=$pdo->query($sql);
        $rows=$stmc->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $rs){
    ?>
    <li><a href="newsview.php?id=<?php echo $rs['id']?>&detailid=<?php echo $rs['detailid']?>"><?php echo getstr1($rs['title'],13)?></a></li>
    <?php }?>
</ul>
</div>

