<?php 
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $query = "select * from member where '$username' =username ";
    $result = $connect->query($query);
    if(mysqli_num_rows($result)!=0) {
        $alert= "Đã có người dùng nhập tên đăng nhập này !!";
    }
    else {
        $password =md5( $_POST['password']);
        $mobile = $_POST['user_sdthoai'];
        $useremail = $_POST['useremail'];
        $fullname = $_POST['fullname'];
        $query_them = "insert member(username,password,mobile,email,fullname) values('$username','$password','$mobile','$useremail','$fullname')";
        $result_them= $connect->query($query_them);
        echo"<script>alert('Bạn đã đăng ký thành công !!!');location='?option=signin'</script>";
    }
}


?>

<section>
    <span style="color: red;"><?=isset($alert)?$alert:""?></span>
    <h1>Đăng ký tài khoản</h1>
</section>
<section>
    <section>
        <form onsubmit="if(repassword.value!=password.value)
            {alert('Xác nhận mật khẩu không chính xác !!');return false;}" method="post">
            <section>
                <label for="name">Nhập tên đăng nhập : </label>
                <input type="text" name="username" id="" required>
            </section>
            <section>
                <label for="name">Nhập mật khẩu : </label>
                <input type="password" name="password" id="" required>
            </section>
            <section>
                <label for="name">Nhập lại mật khẩu : </label>
                <input type="password" name="repassword" id="" required>
            </section>
            <section>
                <label for="name">Nhập số đthoại</label>
                <input type="text" name="user_sdthoai" id="">
            </section>
            <section>
                <label for="name">Họ và tên : </label>
                <input type="text" name="fullname" id="" required>
            </section>
            <section>
                <label for="name">Nhập email : </label>
                <input type="email" name="useremail" id="" required>
            </section>
            <section>
                <input type="submit" value="Đăng nhập ">
            </section>
        </form>
    </section>
</section>