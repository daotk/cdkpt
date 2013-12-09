<?php include('config.php');?>
<html>
    <head>
    	<meta charset='UTF-8' />
        <title>Đăng ký</title>
        <link rel='stylesheet' href='css/style.css' />
    </head>
    <body>
        <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Bat dau xu ly form
            $errors = array();
            // Mac dinh cho cac truong nhap lieu la FALSE
            $username = $password = $fullname = FALSE;          
            // Validate username and password
            if((isset($_POST['username'])) && (isset($_POST['password']))&&(isset($_POST['fullname'])) ) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
            } else {
                $errors[] = 'username';
            }
                
            if($username && $password && $fullname) {
                // Neu moi thu deu day du, truy van csdl
                $q = "SELECT username FROM users WHERE username = '{$username}'";
                $r = mysqli_query($dbc, $q);
                confirm_query($r, $q);
                if(mysqli_num_rows($r) == 0) {
                    // Luc nay email van con trong, cho phep nguoi dung dang ky
                    
                    // Chen gia tri vao CSDL
                    $q = "INSERT INTO users (username, password, fullname) VALUES ('{$username}', '{$password}', '{$fullname}')";
                    $r = mysqli_query($dbc, $q);
                    confirm_query($r, $q);
                    if(mysqli_affected_rows($dbc) == 1) {
                        // Neu dien thong tin thanh cong, thi gui email kich hoat cho nguoi dung
                        echo "<script type='text/javascript'>alert('Đăng ký thành công!')</script>";
                        } 
                    } else {
                        echo "<script type='text/javascript'>alert('Username đã tồn tại!')</script>";
                    }
                    
                } else {
                    // Nhập không đủ thông tin yêu cầu
                    echo "<script type='text/javascript'>alert('Bạn hãy nhập đầy đủ thông tin yêu cầu!')</script>";
                }
            }// END main IF
        ?>
    
    
    
    
    
        <div class="register">
           <table>
           <tr>
            <td class="image">
                <div class="imageregister">
                <img src="images/logo.png"/>
                </div>
            
            </td>
            <td>
                <form action="" method="POST">
                    <table class="table2">
                        <tr>
                            <td class="canhphai"><span style="color: 83340A;">User Name :&nbsp; </span></td>
                            <td><input type="text" name="username" class="inputregister"/></td>
                        </tr>
                        <tr>
                            <td class="canhphai"><span style="color: 83340A;">Password :&nbsp; </span></td>
                            <td><input type="password" name="password"class="inputregister"/></td>
                        </tr>
                        <tr>
                            <td class="canhphai"><span style="color: 83340A;">Full Name :&nbsp; </span></td>
                            <td><input type="text" name="fullname"class="inputregister"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="thesubmit"><input type="submit" name="dangky" value="ĐĂNG KÝ" class="theinputsubmit"/></td>
                        </tr>
                    </table>
                </form>
            
            </td>
           </tr>
           </table>
        
        
        </div>
    
    
    
    </body>
</html>