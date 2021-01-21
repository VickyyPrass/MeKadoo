<?php 
session_start();
include "../../koneksi.php";
$user = $_POST['username_login'];
$pass = $_POST['password_login'];

$sql = mysqli_query($mysqli_connect,"SELECT * FROM user WHERE username = '$user' AND password = '$pass' ");
$row = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);

if ($row==1){
    $_SESSION['user']=$data['username'];
    header("location:../../account.php");
}else{
    echo "<script>alert('Username atau password salah!');window.location='../../login.php'</script>";
}
?>