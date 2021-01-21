<?php 
include "../../koneksi.php";

if(isset($_POST["register"])){
    $username = $_POST['username_register'];
    $password = $_POST['password_register'];

    // cek data kosong
    if(!empty(trim($username)) && !empty(trim($password))){
        // cek username
        if(register_cek_nama($username)){
            // input database
            if(register_user($username,$password)){
                echo "<script>alert('Berhasil Mendaftar! Silahkan Login');</script>";
                echo "<script>location='../../login.php'</script>";
            }else{
                echo "<script>alert('Gagal mendaftar!');</script>";
                echo "<script>location='../../login.php'</script>";
            }
            // end input database
        }else{
            echo "<script>alert('Username sudah ada!');</script>";
            echo "<script>location='../../login.php'</script>";
        }
        // end cek username
    }else{
        echo "<script>alert('Data tidak boleh kosong!');</script>";
        echo "<script>location='../../login.php'</script>";
    }
}else{
    echo "<script>alert('Terjadi Kesalahan!');</script>";
    echo "<script>location='../../login.php'</script>";
}


function register_user($username,$password){
    global $mysqli_connect;

    $query = "INSERT INTO user (username, password) VALUES('$username','$password')";

    if(mysqli_query($mysqli_connect,$query)){
        return true;
    }else{
        return false;
    }
}

// cek username
function register_cek_nama($username){
    global $mysqli_connect;

    $query = "SELECT * FROM user WHERE username = '$username'";

    if($result = mysqli_query($mysqli_connect,$query)){
        if (mysqli_num_rows($result) == 0){
            return true;
        }else{
            return false;
        }
    }
}
?>