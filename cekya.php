<?php
require_once('db/koneksi.php');

session_start();

//tangkap data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
	//kalau username dan password kosong
	header('location:login.php?error=1');
	
} else if (empty($username)) {
	//kalau username saja yang kosong
	header('location:login.php?error=2');
	
} else if (empty($password)) {
	//kalau password saja yang kosong
	header('location:login.php?error=3');
	
}

$q = mysql_query("select * from users where username='$username' and password='$password' and aktif='y'");

if (mysql_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
	
	$_SESSION['username'] = $username;
	
	//redirect ke halaman index
	header('location:dasbor.php');
} else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:login.php?error=4');
}
?>