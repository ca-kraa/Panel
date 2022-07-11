<?php 
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['error'])) {
	if ($_GET['error'] == 1) {
		$error1 = '<div class="text-center">
<div class="alert bg-danger alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Harus login dulu!</span>
</div></div>';
	} else if ($_GET['error'] == 2) {
		$error2 = '<div class="text-center">
<div class="alert bg-danger alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Username belum diisi!</span>
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
<span class="text-semibold">Diisi dengan benar!</span>
</div></div>';
	}
}
require_once('db/koneksi.php');

?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->

	<title><?php echo"$site";?> - Login</title>           
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->  


 
                                  
    </head>

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
    <body>

        <div class="login-container">
               <?php echo"$error1"; ?>		
<?php echo"$error2"; ?>		
<?php echo"$error3"; ?>		
<?php echo"$error4"; ?> 

            <div class="login-box animated fadeInDown">
                 <div class="login-banner text-center">
                    <h1><font color="white"><i class="fa fa-shopping-cart"></i> INDOSOSMED Corp.</font></h1>
                </div><br>
                <div class="login-body">
                    <div class="login-title"><strong><b>Welcome,</b></strong></font> Please Login</div>
                    <form action="cekya.php" class="form-horizontal" method="post">
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
                        <div class="col-md-6">
                             <a href="daftar.php" class="btn btn-link btn-block">Register</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Login</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2016 INDOSOSMED Corp.
                    </div>
                    <div class="pull-right">
                        <a href="http://indososmed.id/faq.php">About</a> |
                        <a href="http://indososmed.id/trems.php">Privacy</a> |
                        <a href="mailto:admin@indososmed.id">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
      </body>
</html>






