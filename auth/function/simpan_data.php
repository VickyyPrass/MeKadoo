<?php 
session_start();

if(isset($_POST["simpan_data"])){
    $namaLengkap = $_POST['namaLengkap'];
    $alamat = $_POST['alamat'];
    $kodePos = $_POST['kodePos'];
    $telepon = $_POST['telepon'];
    $username = $_SESSION['user'];
    include "../../koneksi.php";

    $sql = mysqli_query($mysqli_connect,"SELECT * FROM pembeli WHERE username='$username' ");
    $row = mysqli_num_rows($sql);
    if ($row==0){
        $query = mysqli_query($mysqli_connect,"INSERT INTO pembeli VALUES 
        (NULL,'$namaLengkap','$alamat','$kodePos','$telepon','$username')");
        header("location:../../account.php");

    }else{
        echo "<script>alert('Data sudah ada!');window.location='../../account.php'</script>";
    }
    
}else{
    echo "Data gagal dimasukkan!";
}

?>