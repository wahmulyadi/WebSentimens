<?php
session_start();
include 'config.php';
$username = mysqli_real_escape_string($koneksi,$_GET['user']);
$password = mysqli_real_escape_string($koneksi, $_GET['password']);
$password = md5($password);


/// menginput data ke database
$con 	= mysqli_query($koneksi,"insert into tb_login values('$username','$password')");
	 
if($con){
    echo "<script>
    alert('Registrasi Berhasil');
    window.location.href='../../../index.php';
    </script>";
}else{
    echo "<script>
    alert('Registrasi Gagal');
    window.location.href='../index.php';
    </script>";
//    header("location:#");
}
?>