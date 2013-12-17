<?php include('config.php');?>
<?php // Kiem tra xem nguoi dung da dang nhap hay chua?
        is_logged_in();
?>

<html>
    <head>
    	<meta charset='UTF-8' />
        <title>Trang chủ</title>
        <link rel='stylesheet' href='css/style.css' />
    </head>
    <body>
        <table style="width: 100%;">  
            <tr>
                <td style="width: 300;">
                    <div class="img-wrap"><img src="images/logo.png" style=""/></div>
                </td>
                
                <td style="text-align: center;">
                <span style="color: 83340A; font-size: 28; font-family:Times New Roman, Times, serif;">DANH SÁCH SẢN PHẨM</span><br />
                    <div id="search">
                        <form class="searchform" action="" method="get">
                        <input class="s" onfocus="if (this.value == 'Search this website …') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search this website …';}" type="text" name="search" />
                        <input  type="submit" value="Search" />
                        </form>
                    </div>
                    
                </td>
            </tr>
            
            <tr>
                <td>
                  <div class="hello-wrap "><p>Xin chào,&nbsp;<?php echo (isset($_SESSION['user'])) ? $_SESSION['full'] : "bạn hiền!"; ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php" class="thoat">Thoát</a></p></div>
                </td>
                <td><center><a href="add.php" >Thên sản phẩm</a></center></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <table width="100%" border="3" style=" border-collapse: collapse; ">
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Xuất xứ</th>
                            <th>Giá tiền</th>
                        </tr>
                         <?php
                            // Validate username and password
                            if((isset($_GET['search']))) {
                                $search = $_GET['search'];
                                 $q = " CALL GETProductByName('".$search."')";
                            }else{                         
                                $q = "SELECT p.ProductID, p.ProductName, s.CompanyName, p.UnitsInStock FROM suppliers AS s, products AS p
                                WHERE p.SupplierID = s.SupplierID ";
                            }
                           $r = mysqli_query($dbc, $q);
                           confirm_query($r, $q);
                           while($product = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                    echo "<tr>";
                                    //cot thu 1
                                    echo "<td>";
                                    echo ($product['ProductID']);
                                    echo "</td>";
                                    //cot thu 2
                                    echo "<td>";
                                    echo "<a href='detail.php?id=".$product['ProductID']."'>".$product['ProductName']."</a>";
                                    echo "</td>";
                                    //cot thu 3
                                    echo "<td>";
                                    echo ($product['CompanyName']);                                   
                                    echo "</td>";
                                    //cot thu 4
                                    echo "<td>";
                                    echo ($product['UnitsInStock']);
                                    echo "</td>";
                                    echo "<tr>";
                                }
                        ?>
                        
         </table>
          </td>
            
            </tr>
        
        </table>
    
    
    </body>
</html>