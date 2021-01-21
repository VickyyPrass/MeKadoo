<?php 
session_start();
if(isset($_POST["update_user"])){
    $usernameUser = $_POST['usernameUser'];
    $passwordUser = $_POST['passwordUser'];
    include "../../koneksi.php";
    $dataUser = $_SESSION['user'];

    $query = mysqli_query($mysqli_connect,"UPDATE user SET username='$usernameUser', password='$passwordUser' 
    WHERE username= '$dataUser' ");

}else{
    echo "Data gagal dimasukkan!";
}

header("location:logout.php");
?>