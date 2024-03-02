<?php 
    $option = "home";
    $query = "select * from product where status=1";
    if(isset($_GET['brandid'])) {
        $query.= " and brandid=". $_GET['brandid'];
        $option = "showproducts&brandid=". $_GET['brandid'];  
    }
    elseif(isset($_GET['keyword'])) {
        $query.= " and name like '%". $_GET['keyword']."%'";  
        $option = "showproducts&keyword=".$_GET['keyword']; 
    }
    elseif(isset($_GET['range'])) {
        $query.= " and price <= ". $_GET['range'];  
        $option= "showproducts&range=".$_GET['range'];
    }
    // $page : xem các sản phẩm ở trang ...
    $page = 1 ;
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    // số lượng sản phẩm trên một trang 
    $productspage = 4;
    // Lấy sản phẩm bắt đầu từ chỉ số bao nhiêu trong Dữ liệu ( 0 bắt đầu từ bản ghi đầu tiên ).
    $from =($page-1)*$productspage ;
    // lấy tổng số sản phẩm
    $totalProduct = $connect->query($query);
    // tính tổng số trang 
    $totalpage = ceil(mysqli_num_rows($totalProduct)/$productspage);
    // Lấy các sản phẩmở trang hiện thời 
    $query.= " LIMIT $from,$productspage"; 
    $result = $connect->query($query); 

    
?>
<section class="products">
    <?php foreach ($result as $item):?>
    <section class="product">
        <a href="?option=productdetail&id=<?=$item['id']?>">

            <section class="img-product"><img src="images/<?=$item['image']?>"></section>
            <section class="name-product"><?=$item['name']?></section>
            <section class="price-product"><?=number_format($item['price'],0,',','.')?>VNĐ</section>
        </a>
        <input type="button" value="Mua" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';"></input>
    </section>
    <?php endforeach; ?>
</section>
<section class="pages">
    <?php for($i=1;$i<=$totalpage;$i++):?>
    <a class="<?=(empty($_GET['page'])&&$i==1)||(isset($_GET['page'])&&$_GET['page']==$i)?'highligh':''?>"
        href="?option=<?=$option?>&page=<?=$i?>"><?=$i?></a>
    <?php endfor;?>
</section>