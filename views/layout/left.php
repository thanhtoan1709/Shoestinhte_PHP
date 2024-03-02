<?php 
$query = "select * from brandproduct where status=1";
$result = $connect->query($query);

?>
<?php foreach($result as $item):?>
<section>
    <a href="?option=showproducts&brandid=<?=$item['id']?>"><?=$item['name']?></a>
</section>
<?php endforeach;?>