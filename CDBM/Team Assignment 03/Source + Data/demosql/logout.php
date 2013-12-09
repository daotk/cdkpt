<?php include('config.php');?>
<?php 
        if(!isset($_SESSION['user'])) {
            // Neu nguoi dung chua dang nhap va khong co thong tin trong he thong
            redirect_to('index.php');
        } else {
            // Neu co thong tin nguoi dung, va da dang nhap, se logout nguoi dung.
            $_SESSION = array(); // Xoa het array cua SESSIOM
            session_destroy(); // Destroy session da tao
        } 
        echo "<script type='text/javascript'>alert('Bạn sẽ thoát ngay bây giờ. Bấm OK dể tiêp tục!')</script>";
        redirect_to('index.php');
    ?>