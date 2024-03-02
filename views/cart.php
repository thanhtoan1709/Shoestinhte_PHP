<?php 
    if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    if(!empty($_GET['action'])) {
        $id =isset($_GET['id'])?$_GET['id']:'';
        switch ($_GET['action']) {
            case 'add':
                if(array_key_exists($id,array_keys($_SESSION['cart']))){
                    $_SESSION['cart'][$id]+=1;
                }
                else {
                    $_SESSION['cart'][$id]=1;
                }
                header("location:?option=cart");
                break;
            case 'delete':
                unset($_SESSION['cart'][$id]);
                break;
            case 'delAll':
                unset($_SESSION['cart']);
                break;
        }
    }
?>
<section class="cart">
    <?php 
  if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
    $toTal=0;
    $ids = implode(',', array_keys($_SESSION['cart']));
   $query = "SELECT * FROM product WHERE id IN ($ids)";
    $result = $connect->query($query);
    ?>
    <table border="1" width="100%">
        <thead>
            <tr>
                <td>Image</td>
                <td>Tên</td>
                <td>Giá</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
                <td>...</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $item):?>
            <tr>
                <td width="20%"><img width="100%" src="images/<?=$item['image']?>"></td>
                <td><?=$item['name']?></td>
                <td><?=number_format($item['price'],0,",",".")?></td>
                <td><?=$_SESSION['cart'][$item['id']]?></td>
                <td><?=number_format($totalSub=$item['price']*$_SESSION['cart'][$item['id']],0,",",".")?></td>
                <td><input type="button" value="Xóa"
                        onclick="location= '?option=cart&action=delete&id=<?=$item['id']?>'"></td>
            </tr>
            <?php 
    $toTal+=$totalSub;
    ?>
            <?php 
    endforeach;
    ?>
        </tbody>
        <tr colspan="6">
            <section>
                <td>Tổng giá tiền : <?=number_format($toTal,0,",",".")?></td>
            </section>
            <section>
                <td><input type="button" value="Xóa hết"
                        onclick="if(confirm('are you sure ?')) location= '?option=cart&action=delAll'"></td>
            </section>
        </tr>
    </table>
    <?php 
else:
?>
    <section class="no-cart" style="text-align: center;">

        <section style="color:red;font-weight:bold;font-size:larger;">Giỏ hàng trống !!!!</section>
        <section>Chưa có sản phẩm nào trong giỏ hàng
        </section>
        <section><input type="button" value="Quay trở lại cửa hàng" onclick="location='?option=home'"></section>
    </section>
    <?php 
    endif;
    ?>
</section>