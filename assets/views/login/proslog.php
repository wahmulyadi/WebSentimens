<?php
session_start();
include 'config.php';
$username = mysqli_real_escape_string($koneksi,$_GET['user']);
$password = mysqli_real_escape_string($koneksi, $_GET['password']);
$password = md5($password);
$data = mysqli_query($koneksi,"select * from tb_login where user='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
if($cek > 0){
	$row = mysqli_fetch_array($data);
    $_SESSION['user'] = $row['user'];
	// $_SESSION['user'] = $username;
	// $_SESSION['status'] = "login";
	
	 echo "<script>
    alert('Login Berhasil');
    window.location.href='../../../home.php';
    </script>";
	//header("location:../../../home.php");
}else{
	echo "<script>
    alert('Login Gagal');
    window.location.href='../../../index.php';
    </script>";
	//header("location:../../../index.php");
}
?>