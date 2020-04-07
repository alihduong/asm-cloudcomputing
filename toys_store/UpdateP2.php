<?Php
session_start();
if ($_SESSION['acc'] == NULL) {
    header('Location:Login\Login.php');
}
echo'Chào ' . $_SESSION['acc'] . '<br>';
echo '<a href="Manager.php">Quay lại</a>';
?>
<div class="page-header">
    <h1>Cập nhật thông tin sản phẩm</h1>
</div>

<?php
include 'Connectdatabase.php';
$IdP=$_POST['txtid'];
$name = $_POST['txtName'];
$quantity = $_POST['txtQuantity'];
$price = $_POST['txtPrice'];
$description = $_POST['txtDes'];
$img = $_POST['txtImg'];
$query = "UPDATE tblproduct SET namep='$name', price='$price', des='$description', img='$img' WHERE idp='$IdP' ";
$result = mysqli_query($conn, $query);
if($result){
         echo "sua sản phẩm thành công";
    }else{
        die('Loi');
    }
?>