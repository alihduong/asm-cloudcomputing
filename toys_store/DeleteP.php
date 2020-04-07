<?Php
    session_start();
            if($_SESSION['acc']==NULL)
            {
                header('Location:Login\Login.php');   
            }
            echo'Chào '.$_SESSION['acc'].'<br>';
            echo '<a href="index.php">Quay lại trang chủ</a>';
            ?>
<?php
  
try {
      
    // lấy ID từ URL
   $_idP=isset($_GET['id']) ? $_GET['id'] : die('LỖI: Không tìm thấy ID.');
  
//include kết nối CSDL
    include 'Connectdatabase.php';
  
    $query = "DELETE FROM tblproduct WHERE IdP ='$_idP'";
    
    $result= mysqli_query($conn, $query);   
    if($result){
         echo "<div class='alert alert-success'>Xóa sản phẩm thành công</div>";
         header('Location: Manager.php?action=deleted');
    }else{
        die('Không thể xóa bản ghi.');
    }
}
  
// Hiển thị lỗi
catch(PDOException $exception){
    die('LỖI: ' . $exception->getMessage());
}
?>