<?php include('config.php');?>
<html>
    <head>
    	<meta charset='UTF-8' />
        <title>Đăng nhập</title>
        <link rel='stylesheet' href='css/style.css' />
    </head>
    <body>
        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Bat dau xu ly form. Tao bien $errors
            $errors = array();
            // Validate username and password
            if((isset($_POST['username'])) && (isset($_POST['password']))) {
                $username = $_POST['username'];
                $password = $_POST['password'];
            } else {
                $errors[] = 'username';
            }
            if(empty($errors)) {
                // Bat dau truy van CSDL de lay thong tin nguoi dung
                $q = " SELECT username,password,fullname FROM users WHERE (username =  '{$username}' AND PASSWORD =  '{$password}') LIMIT 1 ";
                $r = mysqli_query($dbc, $q); 
                confirm_query($r, $q);
                if(mysqli_num_rows($r) == 1) {
                    // Neu tim thay thong tin nguoi dung trong CSDL, se chuyen huong nguoi dung ve trang thich hop. 
                   list($username1, $password1, $fullname1) = mysqli_fetch_array($r, MYSQLI_NUM);
                   $_SESSION['user'] = $username1;
                   $_SESSION['pass'] = $password1;
                   $_SESSION['full'] = $fullname1;
                  redirect_to('home.php');
                } else {
                    echo "<script type='text/javascript'>alert('Username hoặc Password không trùng khớp!')</script>";
                }
            } else {
                echo "<script type='text/javascript'>alert('Xin điền đầy đủ thông tin yêu cầu!')</script>";
            }
        
            } // END MAIN IF
        ?>
        <div class="menu">
           <table>
           <tr>
            <td class="image"><img src="images/logo.png"/></td>
            <td>
                <form id="login" action="" method="post">
                <table class="table2">
                    <tr>
                        <td class="canhphai"><span style="color: FFFFFF;">User Name :&nbsp; </span></td>
                        <td><input type="text" name="username"/><span style="color: red;">&nbsp;*</td>
                    </tr>
                    <tr>
                        <td class="canhphai"><span style="color: FFFFFF;">Password :&nbsp; </span></td>
                        <td><input type="password" name="password"/><span style="color: red;">&nbsp;*</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="thesubmit">
                            <input type="submit" name="dangnhap" value="ĐĂNG NHẬP" class="theinputsubmit"/><br />
                           
                        </td>
                    </tr>
                </table>
                </form>
            </td>
           </tr>
           </table>
        
        
        </div>
    
    
    
    </body>
</html>