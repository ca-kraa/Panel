<?php
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	//redirect ke halaman login
	header('location:login.php');
}
require_once('db/koneksi.php');
$tanggal = gmdate("d-m-Y H:i:s", time()+60*60*7);
$text = '12345789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
$panj = 10;
$txtl = strlen($text)-1;
$resultan = '';
for($i=1; $i<=$panj; $i++){
 $resultan .= $text[rand(0, $txtl)];
}
$pass1 = $_POST['topup'];
if (($_POST['topup']) < 10000){

header("Location: ./bank.php?error=VkK");
}
else{

$data212= mysql_query("SELECT * FROM users WHERE username= '".$_SESSION['username']."'");
$hasil2= mysql_fetch_array($data212); 
$id2 = $hasil2['id'];
$se = $hasil2['balance'];
$total = $_POST['topup'];

$query = mysql_query("update users set saldo='$se' where username='".$_SESSION['username']."'");
$data2= mysql_query("SELECT * FROM topup WHERE user_id= '".$_SESSION['username']."' and status='0'");
if(mysql_num_rows($data2) > 0){
$hasil21= mysql_fetch_array($data2); 
$username2 = $hasil21['user_id'];
$query = mysql_query("update topup set saldo='$total', tanggal='$tanggal', token='$resultan', status='0' where user_id='".$_SESSION['username']."' and status='0'");
header("Location: ./bank.php?msg=$total");
}else{
$query = mysql_query("INSERT into topup(user_id,saldo,tanggal,token) VALUES('".$_SESSION['username']."','$total','$tanggal','$resultan')");
header("Location: ./bank.php?msg=$total");
}
}


?>