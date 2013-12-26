<?php include('config.php');?>
<html>
    <head>
    	<meta charset='UTF-8' />
        <title>Thêm sản phẩm</title>
        <link rel='stylesheet' href='css/style.css' />
    </head>
    <body>
    
       
        <div class="add">
           <table>
           <tr>
            <td class="image">
                <div class="imageregister">
                <img src="images/logo.png"/>
                </div>
            
            </td>
            <td>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(isset($_POST['tensanpham'])&& isset($_POST['xuatxu'])&& isset($_POST['giatien'])){           
                            $tensanpham = $_POST['tensanpham'];
                            $xuatxu = $_POST['xuatxu'];
                            $giatien = $_POST['giatien'];
                    }
                    else {
                        $errors[] = 'tensanpham';
                    }
                    if($tensanpham && $xuatxu && $giatien){
                                // Chen gia tri vao CSDL
                                $q = "INSERT INTO products (ProductName, SupplierID,UnitsInStock) VALUES ('{$tensanpham}', '{$xuatxu}','{$giatien}')";
                                $r = mysqli_query($dbc, $q);
                                confirm_query($r, $q);
                                if(mysqli_affected_rows($dbc) == 1) {
                                    // Neu dien thong tin thanh cong, thi gui email kich hoat cho nguoi dung
                                    echo "<script type='text/javascript'>alert('Thêm thành công!')</script>";
                                    redirect_to('home.php');
                                    } 
                                } else {
                                    echo "<script type='text/javascript'>alert('Bạn hãy nhập đầy đủ thông tin yêu cầu!')</script>";
                                }
                                }
                ?>      
            
            
                <form action="" method="POST">
                            <table class="table2">
                                <tr>
                                    <td class="canhphai"><span style="color: 83340A;">Tên sản phẩm :&nbsp; </span></td>
                                    <td><input type="text" name="tensanpham"/></td>
                                </tr>
                                <tr>
                                    <td class="canhphai"><span style="color: 83340A;">Xuất xứ :&nbsp; </span></td>
                                    <td><select name="xuatxu">
                                    <?php
                                        $q = " SELECT SupplierID,CompanyName FROM suppliers ";
                                        $r = mysqli_query($dbc, $q); 
                                        confirm_query($r, $q);
                                         while($supplier = mysqli_fetch_array($r, MYSQLI_ASSOC)){
                                             echo "<option value='".$supplier['SupplierID']."'>".$supplier['CompanyName']."</option>";                                            
                                            }
                                    ?>
                                     </select>  
                                    

                                    </td>
                                </tr>
                                <tr>
                                    <td class="canhphai"><span style="color: 83340A;">Giá tiền :&nbsp; </span></td>
                                    <td><input type="text" name="giatien"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Thêm"/></td>
                                </tr>
                                  <tr>
                                    <td colspan="2"><a href="home.php">Quay lại</a></td>
                                </tr>
                            </table>
          </form>
            
            </td>
           </tr>
           </table>
        
        
        </div>
    
    
    
    </body>
</html>