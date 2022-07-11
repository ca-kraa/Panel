<?php

                      include "header.php";
                    include "db/koneksi.php";
                    $data= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil= mysql_fetch_array($data);
$id = $hasil['id'];
$username = $hasil['username'];
$balance = number_format($hasil['balance'],0,',','.');
$level = $hasil['role'];
$data109= mysql_query("SELECT * FROM orders WHERE user_id = '$id'");
$jumlah09 = mysql_num_rows($data109);
$data1009= mysql_query("SELECT * FROM orderpulsa WHERE user_id = '$id'");
$jumlah009 = mysql_num_rows($data1009);
$totalorder = $jumlah09 + $jumlah009;
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
        
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.js"></script>    
         <script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=cat>
  $("#cat").change(function(){
    var cat = $("#cat").val();
    $.ajax({
        url: "wtf.php",
        data: "cat="+cat,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=hasil>
            $("#hasilnya").html(msg);
        }
    });
  });
   $("#hasilnya").change(function(){
    var hasilnya = $("#hasilnya").val();
    $.ajax({
        url: "wtf1.php",
        data: "hasilnya="+hasilnya,
        cache: false,
        success: function(msg){
            $("#pulsa").html(msg);
        }
    });
  });
    $("#pulsa").change(function(){
    var pulsa = $("#pulsa").val();
    $.ajax({
        url: "wtf2.php",
        data: "pulsa="+pulsa,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=hasil>
            $("#rate").html(msg);
        }
    });
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
                   
                    <li class="active">Orders</li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> New Orders</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-6">
<div class="panel panel-default">
                                    <div class="panel-body">
                  
                                <h4>Input new order</h4>
                                <form class="form-horizontal" action="populsa.php" method="POST" role="form">                                    
                                    <div class="form-group">
                                   	<div class="col-md-13">
											<select class="form-control" name="cat" id="cat" required="required">
<option>--Pilih kategori--</option>
<?php
//mengambil nama-nama cat yang ada di database
$cat = mysql_query("SELECT * FROM c_pulsa ORDER BY id");
while($p=mysql_fetch_array($cat)){
echo "<option value=\"$p[id]\">$p[sub_unit]</option>\n";
}

?>
</select>
                                    </div></div>
                                    <div class="form-group">
									<div class="col-md-13">
<select class="form-control" name="hasilnya" id="hasilnya" required="required">
<option>--Pilih layanan--</option>
</select>
 </div></div>
 <div class="form-group">
<div class="col-md-13">
<select class="form-control" name="pulsa" id="pulsa" required="required">
<option>--Pilih produk--</option>
</select>

 </div></div>

<tr>
  <td>Target/No.HP </td>

  <td><input class="form-control" name="link" type="text" required="required"></td>
 </tr>
     
  <tr> 
    <td>Total :</td> 
<select class="form-control" name="rate" id="rate" required="required">
            </tr>  
               <script type="text/javascript">
   

function kalkulatorTambah(rate,quantity){
var aku = eval(quantity);
var kamu = eval(rate);
var hasil =  aku * kamu;
document.getElementById('result').innerHTML = hasil;
}
    
 </script>
 <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""/>
                                            Dengan mengklik ini, Anda sudah membaca peraturan <b><?php echo"$site";?></b>
                                        </label>
                                    </div><br/>

  <tr>
 <center> <td><input class="btn btn-default large" enabled="enabled" value="Submit" type="submit"></td></center>
 </tr>


 </form></div>
                           
                            <!-- END DEFAULT FORM ELEMENTS -->

                          
                          
                          
                        </div>
                        <div class="col-md-6">                        

                            <div class="block">
                                
                                <div class="panel panel-default">
                                   <div class="panel-body">
<center><b>BACA INI SEBELUM ORDER</b></center><br/>
<ol class="list-p"><b>
<li><b>Jangan menggunakan lebih dari satu layanan sekaligus untuk halaman yang sama, harap tunggu sampai selesai.</b></li>
<li><b>Pastikan diinput dengan <b>BENAR!</b> Kami tidak akan me-refund. Pastikan Anda memasukkan data yang benar, karena kami tidak akan lagi membatalkan pesanan.</b></li>
<li><b>Jika pulsa belum masuk, silahkan <b>KOMPLAIN</b>.</li>
<li><b>Jika pesanan belum selesai dalam waktu 1x24jam, silakan hubungi Admin!</b></li>
</ol></b>

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






