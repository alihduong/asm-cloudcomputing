<h1>Danh sách sản phẩm</h1>
<style type="text/css">
    table, th, td{
        border:1px solid black;
    }
    table{
        border-collapse:collapse;
    }
</style>
<?Php
session_start();
if ($_SESSION['acc'] == NULL) {
    header('Location:../Login/Login.php?p=1');
} else {
    echo'Chào ' . $_SESSION['acc'] . '<br>';
    echo '<a href="../index.php">Quay lại trang chủ</a>';
}
?>
<?php
include 'Connectdatabase.php';
$query = "SELECT * FROM tblproduct";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
echo "<a href='AddProduct.php' class='btn btn-primary m-b-1em'>Tạo sản phẩm mới</a>";
echo "<a href='searchP.php' class='btn btn-primary m-b-1em'>Tìm kiếm sản phẩm</a>";
if ($count > 0) {

    echo "<table class='table table-hover table-responsive table-bordered'>"; //start table
    // tạo tiêu đề cho bảng dữ liệu
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Tên</th>";
    echo "<th>Giá</th>";
    echo "<th>Số lượng</th>";
    echo "<th>Mô tả</th>";
    echo "<th>Ảnh</th>";
    echo"<th>Chức năng</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($result)) {
        extract($row);
        echo "<tr>";
        echo "<td>{$IdP}</td>";
        echo "<td>{$NameP}</td>";
        echo "<td>&#36;{$Quantity}</td>";
        echo "<td>{$Price}</td>";
        echo "<td>{$Des}</td>";
        echo "<td>{$Img}</td>";
        echo "<td>";
        // liên kết gọi chức năng cập nhật sản phẩm theo ID.
        // chức năng này sẽ được thực hiện trong mục 8 của bài viết
        echo "<a href='UpdateP.php?id={$IdP}' class='btn btn-primary m-r-1em'>Sửa</a>";

        // chức năng xoá sản phẩm theo ID, sẽ được thực hiện trong phần tiếp theo
        echo "<a href='DeleteP.php?id={$IdP}'>Xoá</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<div class='alert alert-danger'>Không tìm thấy sản phẩm nào.</div>";
}
?>