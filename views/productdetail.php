<?php 
    $id= $_GET['id'];
    $query = "select *from product where id = '$id'";
    $result = $connect->query($query);
    $item = mysqli_fetch_array($result);
?>

<h2>Chi tiet san pham</h2>
<section class="product-detail">
    <section class="img-product-detail"><img src="images/<?=$item['image']?>"></section>
    <section class="name-product-detail"><?=$item['name']?></section>
    <section class="price-product-detail"><?=number_format($item['price'],0,',','.')?>VNĐ</section>
    <section class="description-product-detail"><?=$item['description']?></section>
    <button type="button">Mua</button>
</section>