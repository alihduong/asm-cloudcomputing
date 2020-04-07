<?Php
        session_start();
            if($_SESSION['acc']==NULL)
            {
                header('Location:Login\Login.php');   
            }
            echo'Chào '.$_SESSION['acc'].'<br>';
            echo '<a href="index.php">Quay lại trang chủ</a>';
            ?>
    
        <div class="page-header">
            <h1>Tạo sản phẩm mới</h1>
        </div>
       
   <?php
if($_POST){
  
    // include file kết nối CSDL
    include 'Connectdatabase.php';
  
    try{
        $id=$_POST['txtId'];
        $name=$_POST['txtName'];
        $quantity=$_POST['txtQuantity'];
        $price=$_POST['txtPrice'];
        $des=$_POST['txtDes'];
        $img=$_POST['txtImg'];
        $query = "INSERT INTO tblproduct VALUES ('$id', '$name', '$quantity', '$price', '$des', '$img')"; 
        $result= mysqli_query($conn, $query);
        // Thực thi truy vấn
        if($result){
            echo "<div class='alert alert-success'>Tạo sản phẩm mới thành công.</div>";
        }else{
            echo "<div class='alert alert-danger'>Tạo sản phẩm mới thất bại.</div>";
        }
          
    }
      
    // hiển thị lỗi
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
        
  
<!-- html form, nơi các thông tin sản phẩm sẽ được nhập vào  -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type='text' name='txtId' class='form-control' /></td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type='text' name='txtName' class='form-control' /></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type='text' name='txtQuantity' class='form-control' /></td>
        </tr>
         <tr>
            <td>Giá</td>
            <td><input type='text' name='txtPrice' class='form-control' /></td>
        </tr>
         <tr>
            <td>Mô tả</td>
            <td><input type='text' name='txtDes' class='form-control' /></td>
        </tr>
         <tr>
            <td>Hình ảnh</td>
            <td><input type='text' name='txtImg' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Add Product' class='btn btn-primary' />
                <a href="Manager.php?p=1" class='btn btn-danger'> <br> Quay lại danh sách sản phẩm</a>
            </td>
        </tr>
    </table>
</form>