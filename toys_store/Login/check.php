<?php 
//include '../Connectdatabase.php';
//session_start();
//$severname = "localhost";
//$username = "root";
//$password ="";
//$db = "demo";
//$u = $_POST['User'];
//$p = $_POST['Pass'];
//$query = "SELECT * FROM accout WHERE UserName ='$u' AND PassWord='$p'";
//echo $query;
//$result = mysqli_query($conn,$query);
//$count = mysqli_num_rows($result);
//if($count==1){
//    $_SESSION['acc'] = $u;
//    header('location:../index.php');
//    
//}else{
//    echo 'Login Fail';
//}
$conn_string = "host=ec2-3-229-210-93.compute-1.amazonaws.com user=zvuefagwinjhbz password=7b32051a4f76b737dc94390bcc62f891ab8173a95e466246124dceb5685f1075 database=daicqmolrvagae port=5432";
$dbconn = pg_connect($conn_string);
if (isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
}
$result = pg_result($dbconn, "select * from where tblaccout username= '".$username."' and password= '"  .$password. "'");
if(!$result)
{
  echo "Ngon rồi ^^";
  //header('Location:../');
}
 else {
    echo 'Toang :(('; 
}
 ?>