<?php 
    if(isset($_POST['username'])){
        $username = $_POST['username'] ;
        $password = md5($_POST['password']);
        $query = "select * from member where username='$username' and password ='$password' ";
        $result =$connect ->query($query);
      
        if(mysqli_num_rows($result)==0) {
           $alert = "Sai tên đăng nhập hoặc mật khẩu !!!";
        }
        else {
            $row = mysqli_fetch_array($result);
            if($row['status']==0){
                $alert = " tài khoản bạn đang bị khóa hoặc đang trong quá trình xử lý ";
            }
            else {
                $_SESSION['member'] = $username;
                //C1:Frontend  echo "<script>location='?option=home'</script>";
                //c2 : 
                header("location: ?option=home");
            }
        }
    }   
?>
<section>
    <h1>
        Đăng nhập tài khoản
    </h1>
    <section>
        <span style="color: red;"> <?=isset($alert)?$alert:"" ?></span>
    </section>
    <section>
        <form action="" method="post">
            <section>
                <label for="name">Nhập tên đăng nhập : </label>
                <input type="text" name="username" id="" required>
            </section>
            <section>
                <label for="name">Nhập mật khẩu : </label>
                <input type="password" name="password" id="" required>
            </section>
            <section>
                <input type="submit" value="Đăng nhập ">
            </section>
        </form>
    </section>
</section>