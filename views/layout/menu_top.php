<a href="?option=home" id="">Home</a>
<a href="?option=news" id="">News</a>
<a href="?option=feedback" id="">Feedback</a>
<a href="?option=cart" id="">Cart</a>
<?php if(empty($_SESSION['member'])):?>
<a href="?option=signin" id="">Sign in</a>
<a href="?option=register" id="">Register</a>
<?php else: ?>
<section>
    <span style="color:red">Hello :<?= $_SESSION['member']?></span>
    <a href="?option=logout" id="">Đăng xuất </a>
</section>
<?php endif;?>