<?php

                      include "header.php";
                    include "db/koneksi.php";
                    $data= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil= mysql_fetch_array($data);
$id = $hasil['id'];
$username = $hasil['username'];
$balance = number_format($hasil['balance'],0,',','.');
$level = $hasil['role'];

	if ($_GET['error'] == Vk) {
		$error1 = '<div class="text-center">
<div class="alert bg-danger alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">GAGAL TOP UP! Silahkan transfer dulu sebelum konfirmasi.</span>
</div></div>
		<div style="width: 300px; right: 560px; top: 86px; opacity: 1; display: block; overflow: visible; cursor: auto;" class="ui-pnotify "><div style="min-height: 16px; overflow: hidden;" class="alert ui-pnotify-container alert-danger ui-pnotify-shadow"><button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button><div style="cursor: pointer;" class="ui-pnotify-closer"></div><div style="cursor: pointer; visibility: hidden;" class="ui-pnotify-sticker"><span title="Stick" class="glyphicon glyphicon-play"></span></div><div class="ui-pnotify-icon"><span class="icon-blocked"></span></div><h4 class="ui-pnotify-title">GAGAL TOP UP! Silahkan transfer dulu sebelum konfirmasi.</h4><div class="ui-pnotify-text"></div><div style="margin-top: 10px; clear: both; text-align: right; display: none;"></div></div></div>';
	} 
if ($_GET['error'] == VkK) {
$error2 =  '
<div class="text-center">
<div class="alert bg-danger alert-styled-left">
<button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button>
<span class="text-semibold">Data yang di input kurang dari Rp. 5.000!</span>
</div></div>
';
		
	} 
$ui2 = $_GET['message'];
if($ui2){
$data2= mysql_query("SELECT * FROM users WHERE balance= '$ui2'");
$hasil2= mysql_fetch_array($data2); 
$username2 = $hasil2['username'];
$balance2 = $hasil2['balance'];
$sebelum2 = $hasil2['saldo'];
$sukess = "
<div class=\"text-center\">
<div class=\"alert bg-success alert-styled-left\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>&times;</span>
<span class=\"sr-only\">Close</span></button>
<span class=\"text-semibold\">Terimakasih $username2<br/>saldo telah ditambahkan!</h4><div class=\"ui-pnotify-text\">Detail :<br/>Saldo sebelum = $sebelum2<br/>Saldo sesudah = $balance2<br/>Semoga berkah untuk kita semua ^_^ - Admin</span>
</div></div>

<div style=\"width: 230px; right: 560px; top: 86px; opacity: 1; display: block; overflow: visible; cursor: auto;\" class=\"ui-pnotify\"><div style=\"min-height: 16px; overflow: hidden;\" class=\"alert ui-pnotify-container alert-success ui-pnotify-shadow\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>&times;</span>
<span class=\"sr-only\">Close</span></button><div style=\"cursor: pointer;\" class=\"ui-pnotify-closer\"></div><div style=\"cursor: pointer; visibility: hidden;\" class=\"ui-pnotify-sticker\"><span title=\"Stick\" class=\"glyphicon glyphicon-play\"></span></div><div class=\"ui-pnotify-icon\"><span class=\"icon-checkmark4\"></span></div><h4 class=\"ui-pnotify-title\">Terimakasih $username2<br/>Saldo telah ditambahkan</h4><div class=\"ui-pnotify-text\">Detail :<br/>Saldo sebelum = $sebelum2<br/>Saldo sesudah = $balance2<br/>Semoga berkah untuk kita semua ^_^</div><div style=\"margin-top: 10px; clear: both; text-align: right; display: none;\"></div></div></div>";

}
$data= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil= mysql_fetch_array($data); 
$ui = $hasil['id'];
$username = $hasil['username'];
$balance = $hasil['balance'];

$data5= mysql_query("SELECT * FROM topuppulsa WHERE user_id = '".$_SESSION['username']."' and status='0' order by id DESC");
if(mysql_num_rows($data5) > 0){
while($hasil5= mysql_fetch_array($data5)){ 
$saldo = $hasil5['saldo'];
$waktu = $hasil5['tanggal'];
$wkwk = "<div style=\"width: 230px; right: 20px; top: 150px; opacity: 1; display: block; overflow: visible; cursor: auto;\" class=\"ui-pnotify\"><div style=\"min-height: 16px; overflow: hidden;\" class=\"alert ui-pnotify-container alert-danger ui-pnotify-shadow\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>&times;</span>
<span class=\"sr-only\">Close</span></button><div style=\"cursor: pointer;\" class=\"ui-pnotify-closer\"></div><div style=\"cursor: pointer; visibility: hidden;\" class=\"ui-pnotify-sticker\"><span title=\"Stick\" class=\"glyphicon glyphicon-play\"></span></div><div class=\"ui-pnotify-icon\"><span class=\"icon-warning\"></span></div><h4 class=\"ui-pnotify-title\">Halo $username</h4><div class=\"ui-pnotify-text\">Saldo kamu : $balance<br>SALDO belum dibayar: $saldo<br>Harap segera dibayar!<br/><a href=\"./bank.php?msg=$saldo\"><p style=\"color:black;\">Konfirmasi Top Up!</p></a></div><div style=\"margin-top: 10px; clear: both; text-align: right; display: none;\"></div></div></div>";

}
}
else{

$wkwkwkwkwk = "<div style=\"width: 230px; right: 20px; top: 150px; opacity: 1; display: block; overflow: visible; cursor: auto;\" class=\"ui-pnotify\"><div style=\"min-height: 16px; overflow: hidden;\" class=\"alert ui-pnotify-container alert-danger ui-pnotify-shadow\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>&times;</span>
<span class=\"sr-only\">Close</span></button><div style=\"cursor: pointer;\" class=\"ui-pnotify-closer\"></div><div style=\"cursor: pointer; visibility: hidden;\" class=\"ui-pnotify-sticker\"><span title=\"Stick\" class=\"glyphicon glyphicon-play\"></span></div><div class=\"ui-pnotify-icon\"><span class=\"icon-info22\"></span></div><h4 class=\"ui-pnotify-title\">Halo $username</h4><div class=\"ui-pnotify-text\">Saldo kamu: $balance<br>SALDO belum dibayar: 0<br>Silahkan top up saldo.</div><div style=\"margin-top: 10px; clear: both; text-align: right; display: none;\"></div></div></div>";

}
$ui22 = $_GET['msg'];
if($ui22){
$ui21 = $ui22* 0.8;
$data2= mysql_query("SELECT * FROM topuppulsa WHERE saldo= '$ui22' and user_id = '".$_SESSION['username']."' and status='0' order by id DESC");
if(mysql_num_rows($data2) > 0){
$hasil2= mysql_fetch_array($data2); 
$username2 = $hasil2['user_id'];
$token = $hasil2['token'];
$tiket = "
<div class=\"text-center\">
<div class=\"alert bg-info alert-styled-left\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span>&times;</span>
<span class=\"sr-only\">Close</span></button>
<span class=\"text-semibold\">Terima kasih $username2 tiket telah diterima</h4><div class=\"ui-pnotify-text\">Detail :<br/>Total = $ui22<br/>Saldo yangg ditambah = $ui21<br/>TOKEN = $token<br/>Silahkan transfer ke nomor DIBAWAH dengan jumlah $ui22 PERSIS!<br/>Jika sudah, konfirmasi token kamu ke <b>ADMIN</b><br/></span>
</div></div>

";

}else
$error3 = '<div style="width: 300px; right: 560px; top: 86px; opacity: 1; display: block; overflow: visible; cursor: auto;" class="ui-pnotify "><div style="min-height: 16px; overflow: hidden;" class="alert ui-pnotify-container alert-danger ui-pnotify-shadow"><button type="button" class="close" data-dismiss="alert"><span>&times;</span>
<span class="sr-only">Close</span></button><div style="cursor: pointer;" class="ui-pnotify-closer"></div><div style="cursor: pointer; visibility: hidden;" class="ui-pnotify-sticker"><span title="Stick" class="glyphicon glyphicon-play"></span></div><div class="ui-pnotify-icon"><span class="icon-blocked"></span></div><h4 class="ui-pnotify-title">Not Found!</h4><div class="ui-pnotify-text"></div><div style="margin-top: 10px; clear: both; text-align: right; display: none;"></div></div></div>';

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title><?php echo"$site";?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
                        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-dark-head-light.css"/>
        <!-- EOF CSS INCLUDE -->             
        
<script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
			$('#bayar').keyup(function(){
			
			var bayar=parseInt($('#bayar').val());
		
			var total_bayar=bayar*0.8;
			$('#Tbayar').val(total_bayar);
			});
		});
        </script>
    </head>
    <body>
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
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
              <?php include('kanan.inc'); ?>
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                           <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">Aditya@indososmed.id</span>
                                    <p>Terimakasih telah memilih Indososmed</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Ramadhani@indososmed.id</span>
                                    <p>Lancar dan Cepat!</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Semoga tambah sukses :)</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-offline"></div>
                                    <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                                    <span class="contacts-title">Darth Vader</span>
                                    <p>Best Services lah! :D</p>
                                </a>
                            </div>      
                            <div class="panel-footer text-center">
                                <a href="#">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                   
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                   
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                   
                    <li class="active">Deposit</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Deposit Saldo</h2>
                </div>
                <!-- END PAGE TITLE -->                
                <?php echo"$error1";?>
<?php echo"$error2";?>
<?php echo"$error3";?>
<?php echo"$sukess";?>
<?php echo"$tiket";?>

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-6">
<div class="panel panel-default">
                                    <div class="panel-body">
                  

                                <form class="form-horizontal" action="aa.php" method="POST" role="form">                   <div class="form-group">

												
				<center>
<img height="50" src="http://cdn.utekno.com/wp-content/uploads/2015/02/telkomsel-logo.png" width="100" title="TSEL"/><br/>
<b>NOMER 0812-5055-7745</b><br/>

<img height="50" src="http://www.bingkaiberita.com/wp-content/uploads/2014/01/daftar-paket-IM3.jpg" width="100" title="IM3"/><br/>
<b>NOMER 0857-6960-1141</b><br/>

												

				           </center>     			</div>
 <b>Input Saldo :</b><br />
    	<input class="form-control" name="topup" id="bayar" required="required">
</input>



<label>TOTAL Saldo yang Ditambahkan :</label><br/>
<input class="form-control" name="Tbayar" id="Tbayar" disabled="disabled"></input><br/>
    	<input class="btn" class="form-control" type="submit" name="submit" value="Top Up Now!" />

</form></div></div>
                           
                            <!-- END DEFAULT FORM ELEMENTS -->

                          
                          
                          
                        </div>
                        <div class="col-md-6">                        

                            <div class="block">
                                
                                <div class="panel panel-default">
                                   <div class="panel-body">
<center><b>INFO!!</b></center><br/>
<center><b>======</b><br>
Silahkan pilih top-up via IM3/TSEL.<br>
Minimal top-up adalah Rp. 5.000,- pulsa.<br>
Disarankan untuk transfer ke TELKOMSEL, karena konfirmasi cepat.<br>
Harap ikuti langkah - langkah dengan benar!<br>
Input data sesuai yg diperlukan!<br>
Jika Mengalami Kesulitan Silahkan HUB <b>Admin</b>.<br>
<b>======</b><br></center>
<br>
<center><?php echo"$wkwk"; ?></center>
<center><?php echo"$wkwkwkwkwk"; ?></center>

</div>
</div></div></div></div>

</div>

                            <!-- END HORIZONTAL FORM SAMPLE -->                        

                        </div>

                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="login.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->             
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
        <!-- END THIS PAGE PLUGINS -->       
        
        <!-- START TEMPLATE -->
      
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->                   
    </body>
</html>






