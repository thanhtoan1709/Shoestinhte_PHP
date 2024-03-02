<?php    if(isset($_GET['option'])) {
            switch ($_GET['option']) {
                case 'cart':
                    include('views/cart.php');
                    break;
                case 'showproducts':
                    include('views/showproducts.php');
                    break;
                case 'home':
                    # code...
                    include('views/home.php');
                    break;
                case 'news':
                    # code...
                    include('views/news.php');
                    break;
                case 'feedback':
                        # code...
                        include('views/feedback.php');
                        break;   
                case 'signin':
                            # code...
                            include('views/signin.php');
                            break;   
                case 'logout':
                            # code...
                            unset($_SESSION['member']);
                            header("location: ?option=home");
                            break;   
                case 'register':
                    include "views/register.php";
                    break;      
                case 'productdetail':
                    include "views/productdetail.php";
                    break;    
                // default:
                //     # code...
                //     include('.php');
                //     break;
            }
        }
        else {
            include "views/home.php";
        }
        ?>