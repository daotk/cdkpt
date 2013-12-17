<?php include('config.php');?>
<html>
    <head>
    	<meta charset='UTF-8' />
        <title>Đăng ký</title>
        <link rel='stylesheet' href='css/style.css' />
    </head>
    <body>
       
        <div class="register">
           <table>
           <tr>
            <td class="image">
                <div class="imageregister">
                <img src="images/logo.png"/>
                </div>
            
            </td>
            <td>
                <?php
                    if(isset($_GET['id'])){
                        $q = "SELECT p.ProductID, p.ProductName, s.CompanyName, p.UnitsInStock FROM suppliers AS s, products AS p
                                WHERE p.SupplierID = s.SupplierID AND p.ProductID =".$_GET['id'];
                         $r = mysqli_query($dbc, $q); 
                        confirm_query($r, $q);
                        if(mysqli_num_rows($r) == 1) {
                          $product = mysqli_fetch_array($r, MYSQLI_ASSOC); 
                         echo "                   
                            <table class='table2'>
                                <tr>
                                    <td class='canhphai'><span style='color: 83340A;'>Mã sản phẩm :&nbsp; </span></td>
                                    <td>".$product['ProductID']."</td>
                                </tr>
                                <tr>
                                    <td class='canhphai'><span style='color: 83340A;'>Tên sản phẩm :&nbsp; </span></td>
                                    <td>".$product['ProductName']."</td>
                                </tr>
                                <tr>
                                    <td class='canhphai'><span style='color: 83340A;'>Xuất xứ :&nbsp; </span></td>
                                    <td>".$product['CompanyName']."</td>
                                </tr>
                                <tr>
                                    <td class='canhphai'><span style='color: 83340A;'>Giá tiền :&nbsp; </span></td>
                                    <td>".$product['UnitsInStock']."</td>
                                </tr>
                                <tr>
                                    <td colspan='2'><a style='font-size: 20pt;' href='home.php'>Quay lai</a> </td>
                                </tr>
                            </table>";
                        }
                        
                    }
                
                ?>            
            
            </td>
           </tr>
           </table>
        
        
        </div>
    
    
    
    </body>
</html>