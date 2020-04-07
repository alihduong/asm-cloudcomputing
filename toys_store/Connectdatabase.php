<?php
$conn_string = "host=ec2-3-229-210-93.compute-1.amazonaws.com user=zvuefagwinjhbz password=7b32051a4f76b737dc94390bcc62f891ab8173a95e466246124dceb5685f1075 database=daicqmolrvagae port=5432";
$dbconn = pg_connect($conn_string);
if (isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['password'])){
    $password = $_POST['password'];
}
$result = pg_result($dbconn, "select * from  tblaccout where username= '".$username."' and password= '"  .$password. "'");
if(!$result)
{
  echo "Ngon rồi ^^";
  //header('Location:../');
}
 else {
    echo 'Toang :(('; 
}
 ?>