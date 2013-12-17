<?php
    session_start();
     define('LIVE', FALSE);
    // Ket noi voi CSDL
    $dbc = mysqli_connect('localhost', 'root','123456','demo');
    
    // neu ket noi khong thanh cong, thi bao loi ra
    if(!$dbc) {
        trigger_error("Could not connect to DB: " . mysqli_connect_error());
    } else {
        // dat phuong thuc ket noi la utf-8
         //mysqli_set_charset($dbc, 'utf-8');
       mysqli_set_charset($dbc,"utf8");
    }
    
    // Kiem tra xem ket qua tra ve co dung hay khong?
    function confirm_query($result, $query) {
        global $dbc;
        if(!$result && !LIVE) {
            die("Query {$query} \n<br/> MySQL Error: " .mysqli_error($dbc));
        } 
    }
    
    // Kiem tra xem nguoi dung da dang nhap hay chua?
    function is_logged_in() {
        if(!isset($_SESSION['user'])) {
         header("Location: login.php");
        }
    } // END is_logged_in
    // Tai dinh huong nguoi dung ve trang mac dinh la index
    function redirect_to($page) {
        header("Location: $page");
        exit();
    }
    
?>