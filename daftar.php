<?php 
if(isset($_GET['email']) && isset($_GET['key'])){ 
        include "db/koneksi.php"; 
        $email1 = $_GET['email'];
        $key1 = $_GET['key'];
$cand2 = mysql_query("SELECT * FROM users WHERE email='$email1' and kode='$key1'");
if(mysql_num_rows($cand2) > 0){
 $has = mysql_query("update users set aktif='y' where email='$email1' and kode='$key1'");
  $sukses1 = '<div class="text-center">
<div class="alert bg-success alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Terimakasih! Akun Anda sudah diaktivasi!</span>
</div></div>'; 
 } else{
                $error5 = '<div class="text-center">
<div class="alert bg-danger alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Gagal konfirmasi email! Silahkan hubungi Admin.</span>
</div></div>'; 
        }
}
if(isset($_GET['sukses'])) {
		$sukses = '<div class="text-center">
<div class="alert bg-success alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Silahkan cek e-mail (inbox/spam)<br/>untuk aktivasi pendaftaran!</span>
</div></div>';
}
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['error'])) {
	if ($_GET['error'] == 1) {
		$error1 = '<div class="text-center">
<div class="alert bg-danger alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Email atau username sudah terdaftar!</span>
</div></div>';
	} else if ($_GET['error'] == 2) {
		$sukses = '<div class="text-center">
<div class="alert bg-danger alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Username sudah terdaftar!</span>
</div></div>';
	} else if ($_GET['error'] == 3) {
		$error3 = '<div class="text-center">
<div class="alert bg-danger alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Password belum diisi!</span>
</div></div>';
	} else if ($_GET['error'] == 4) {
		$error4 = '<div class="text-center">
<div class="alert bg-danger alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Harus diisi dengan benar!</span>
</div></div>';
	}
}
$tanggal = gmdate("d-m-Y H:i:s", time()+60*60*7);
require_once('db/koneksi.php');
 $nama1 = $_POST['username'];
if(isset($_POST['submit'])){
 $nama = $_POST['username'];
 $email = $_POST['email'];
 $pass = $_POST['password'];
 $twitter = $_POST['twitter'];
 

  
$cand21 = mysql_query("SELECT * FROM users WHERE email='$email' or username='$nama'");
if(mysql_num_rows($cand21) > 0){
header('location:daftar.php?error=1');

  } else{
$activation = md5(uniqid(rand(), true));
   $hasil = mysql_query("insert into users(username, email, password, kode, twitter, created) values('$nama','$email','$pass','$activation','$twitter','$tanggal')");
   $pesan = "Halo $nama, \nTerimakasih telah mendaftar di Indososmed! \n\nBerikut adalah detail akun kamu ^_^ \nUsername : $nama \nPassword : $pass \n\nUntuk aktivasi pendaftaran silahkan klik link konfirmasi yang ada di bawah ini, \n\nKlik link aktivasi berikut: $link/daftar.php?email=".$email."&key=".$activation;
   mail($email,'Aktivasi Pendaftaran',$pesan,'From: admin@indososmed.id');
   header('location:daftar.php?sukses=daftarnya');
   
  }
 
}

?>

<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->

	<title><?php echo"$site";?> - Daftar</title>           
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>

        <div class="login-container">
              	
<?php echo"$error1"; ?>
<?php echo"$sukses"; ?>
<?php echo"$sukses1"; ?>
<?php echo"$error2"; ?>		
<?php echo"$error3"; ?>		
<?php echo"$error4"; ?>		
<?php echo"$error5"; ?>					
            <div class="login-box animated fadeInDown">
                <div class="login-banner text-center">
                    <h1><font color="white"><i class="fa fa-shopping-cart"></i> INDOSOSMED Corp.</font></h1>
                </div><br>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome,</strong>  Please Register</div>
                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="Email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="login.php" class="btn btn-link btn-block">Login</a>
                        </div>
                        <div class="col-md-6">
                            <button name="submit" class="btn btn-info btn-block">Register</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2016 Indososmed Corp.
                    </div>
                    <div class="pull-right">
                        <a href="http://indososmed.id/faq.php">About</a> |
                        <a href="http://indososmed.id/trems.php">Privacy</a> |
                        <a href="mailto:admin@indososmed.id">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
       <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5721f28285892d652b033a85/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
 
    </body>
</html>





