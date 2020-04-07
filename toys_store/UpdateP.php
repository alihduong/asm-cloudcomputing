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
            <h1>Cập nhật thông tin sản phẩm</h1>
        </div>
      
       <?php
// lấy giá trị của tham số ‘id’ trên URL
// isset() là hàm trong PHP cho phép kiểm tra giá trị là có hoặc không
$_idP=isset($_GET['id']) ? $_GET['id'] : die('LỖI: Không tìm thấy ID.');
  
//include kết nối CSDL
include 'Connectdatabase.php';
  
// đọc dữ liệu của bản ghi hiện tại
try {
    // chuẩn bị câu truy vấn
    $query = "SELECT * FROM tblproduct WHERE IdP = '$_idP' LIMIT 0,1";
  
    // thực thi truy vấn
    $result= mysqli_query($conn, $query);
  
    // lưu bản ghi dữ liệu lấy được vào một biến ‘row’
    $row= mysqli_fetch_array($result);
  
    // điền giá trị lấy được từ $row vào trong form
    $name = $row['NameP'];
    $quantity = $row['Quantity'];
    $price = $row['Price'];
    $description = $row['Des'];
    $img = $row['Img'];
}
  
// hiển thị lỗi
catch(PDOException $exception){
    die('LỖI: ' . $exception->getMessage());
}
?>
  
       
  
<!-- HTML form chứa thông tin của bản ghi dữ liệu cần cập nhật -->
<form action="UpdateP2.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Ma sản phẩm</td>
            <td><input type='text' value="<?=$row[0]?>" name='txtid' class='form-control' /></td>
        </tr>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type='text' value="<?=$row[1]?>" name='txtName' class='form-control' /></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type='text'value="<?=$row[3]?>" name='txtQuantity' class='form-control' /></td>
        </tr>
         <tr>
            <td>Giá</td>
            <td><input type='text'value="<?=$row[2]?>" name='txtPrice' class='form-control' /></td>
        </tr>
         <tr>
            <td>Mô tả</td>
            <td><input type='text'value="<?=$row[4]?>" name='txtDes' class='form-control' /></td>
        </tr>
         <tr>
            <td>Hình ảnh</td>
            <td><input type='text'value="<?=$row[5]?>" name='txtImg' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Cập nhật' class='btn btn-primary' />
                <a href='Manager.php' class='btn btn-danger'>Quay lại danh sách sản phẩm</a>
            </td>
        </tr>
    </table>
</form>