<?php
if(!isset($_POST['submit'])){
 $nama = $_POST['username'];
 $email = $_POST['email'];
 $pass = $_POST['password'];
 $twitter = $_POST['twitter'];
$tanggal = gmdate("d-m-Y H:i:s", time()+60*60*7);
require_once('db/koneksi.php');
 $nama1 = $_POST['username'];

 

  
$cand21 = mysql_query("SELECT * FROM users WHERE email='$email' or username='$nama'");
if(mysql_num_rows($cand21) > 0){
header('location:daftar.php?error=1');

  } else{
$activation = md5(uniqid(rand(), true));
   $hasil = mysql_query("insert into users(username, email, password, kode, created) values('$nama','$email','$pass','$activation','$tanggal')");
   $pesan = "Halo $nama, \n\nberikut adalah detail akun kamu \nusername : $nama \nPassword : $pass \n\nUntuk aktivasi pendaftaran silahkan klik link konfirmasi yang ada dibawah ini, \n\nKlik link aktivasi: $link/daftar.php?email=".$email."&key=".$activation;
   mail($email,'Aktivasi Pendaftaran',$pesan,'From: admin@indososmed.id');
   header('location:daftar.php?sukses=daftarnya');
   
  }
 
}
?>