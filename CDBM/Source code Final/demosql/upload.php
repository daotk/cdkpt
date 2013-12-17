<?php  
//Define some variables  
$dir = "images/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
//Kiều file, Gif, jpeg, zip ::bạn có thể sửa đổi nếu thích 
$types = array("image/gif","image/GIF","image/JPG","image/jpg","image/JPEG","image/jpeg","application/x-zip-compressed");     
//Check to determine if the submit button has been pressed  
if(isset($_POST['submit'])){ 
//Shorten Variables  
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name']; 
//Check MIME Type  
    if (in_array($_FILES['upload']['type'], $types)){                     
         //Move file from tmp dir to new location  
        move_uploaded_file($tmp_name,$dir . $new_name);            
        echo "<script>alert('Hinh {$_FILES['upload']['name']} upload thanh cong!');</script>"; 
    }else{                 
    //Print Error Message  
     echo "<script>alert('{$_FILES['upload']['name']} Was Not Uploaded !');</script>";       
    //Debug  
   $name =  $_FILES['upload']['name'];  
   $type =    $_FILES['upload']['type'];  
   $size =    $_FILES['upload']['size'];  
   $tmp =     $_FILES['upload']['name'];      
   echo "Name: $name<br/ >Type: $type<br />Size: $size<br />Tmp: $tmp";               
    }       
    }       
else{       
    echo 'Could Not Upload Files';   
}  
?> 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">  
    <fieldset> 
     <legend>Upload Files</legend>                                          
        <input type="file" name="upload" /> 
    </fieldset> 
        <input type="submit" name="submit" value="Upload Files" />  
</form>