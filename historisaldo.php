<?php
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	//redirect ke halaman login
	header('location:login.php');
}
?>
<?php

                    include "db/koneksi.php";
                    $data= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil= mysql_fetch_array($data); 
$username = $hasil['username'];
$balance = number_format($hasil['balance'],0,',','.');
if (!empty($_GET['error'])) {
	if ($_GET['error'] == Vk) {
	$error = '<div class="text-center"><div class="alert alert-danger">Gagal! Pastikan input dengan benar!</div></div>
';
		
	} 
}
$ui2 = $_GET['sukses'];
if($ui2){
$data2= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil2= mysql_fetch_array($data2); 
$username2 = $hasil2['username'];
$balance2 = number_format($hasil2['balance'],0,',','.');
$idgan2 = $hasil2['id'];
$data3= mysql_query("SELECT * FROM orders WHERE orderid = '$ui2'");
while($hasil3= mysql_fetch_array($data3)){
$idorder3= $hasil3['orderid']; //echo ID
$servisid3 = $hasil3['service_id'];
$link3 = $hasil3['link']; //echo link
$tanggal3 = $hasil3['created']; //echo tanggal
$jumlah3 = $hasil3['quantity']; //echo jumlah
$status3 = $hasil3['status']; //echo status
$startcount3 = $hasil3['start_count']; //echo jumlah awal
$charge3 = $hasil3['charge']; //echo jumlah awal
$sukess = "<div class=\"text-center\"><div class=\"alert alert-success\">Pesanan Anda diterima! Order ID = $ui2 jumlah = $jumlah3 harga = Rp. $charge3 sisa saldo = Rp. $balance2</div></div>";
}}
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
    </head>
    <body>
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
                                    <span class="contacts-title">John Doe</span>
                                    <p>Praesent placerat tellus id augue condimentum</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Dmitry Ivaniuk</span>
                                    <p>Donec risus sapien, sagittis et magna quis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-offline"></div>
                                    <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                                    <span class="contacts-title">Darth Vader</span>
                                    <p>I want my money back!</p>
                                </a>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>  
                    <li class="active">Riwayat Deposit</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Riwayat Deposit</h2>
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Riwayat Deposit BANK</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                      <thead>
    <th><center>ID</center></center></th>
    <th><center>Jumlah</center></center></th>
    <th><center>Token</center></center></th>
    <th><center>Status</center></center></th>
    
</thead>
<?php

$data= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil= mysql_fetch_array($data); 
$username = $hasil['username'];
$balance = $hasil['balance'];
$idgan = $hasil['id'];
$data1= mysql_query("SELECT * FROM topup WHERE user_id = '$username' order by id DESC LIMIT 10");
while($hasil1= mysql_fetch_array($data1)){
$idsaldo = $hasil1['id'];
$jumlahsaldo = $hasil1['saldo'];
$ket = $hasil1['token'];
$tanggal = $hasil1['status'];
$data15= mysql_query("SELECT * FROM status WHERE id= '$tanggal'");
while($hasil15= mysql_fetch_array($data15)){
$status1 = $hasil15['status']; //echo Status
?>

        <tbody>
            <tr>
            <td><center><?php echo"$idsaldo ";?></center><br></td>
                        <td><center><?php echo"$jumlahsaldo ";?></center><br></td>
            <td><center><?php echo"$ket ";?></center><br></td>
<td><center><?php echo"$status1 ";?></center><br></td>
            </tr>
    </tbody>
    <?php }} ?>
    
                                    </table>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Riwayat Deposit PULSA</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                      <thead>
    <th><center>ID</center></center></th>
    <th><center>Jumlah</center></center></th>
    <th><center>Token</center></center></th>
    <th><center>Status</center></center></th>
    
</thead>
<?php

$data5= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil5= mysql_fetch_array($data5); 
$username5 = $hasil5['username'];
$balance5 = $hasil5['balance'];
$idgan5 = $hasil5['id'];
$data15= mysql_query("SELECT * FROM topuppulsa WHERE user_id = '$username5' order by id DESC LIMIT 10");
while($hasil15= mysql_fetch_array($data15)){
$idsaldo5 = $hasil15['id'];
$jumlahsaldo5 = $hasil15['saldo'];
$ket5 = $hasil15['token'];
$tanggal5 = $hasil15['status'];
$data155= mysql_query("SELECT * FROM status WHERE id= '$tanggal5'");
while($hasil155= mysql_fetch_array($data155)){
$status15 = $hasil155['status']; //echo Status
?>

        <tbody>
            <tr>
            <td><center><?php echo"$idsaldo5 ";?></center><br></td>
                        <td><center><?php echo"$jumlahsaldo5 ";?></center><br></td>
            <td><center><?php echo"$ket5 ";?></center><br></td>
<td><center><?php echo"$status15 ";?></center><br></td>
            </tr>
    </tbody>
    <?php }} ?>
    
                                    </table>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
 <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Riwayat Deposit Manual</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                      <thead>
    <th><center>ID</center></center></th>
    <th><center>Jumlah</center></center></th>
    <th><center>Keterangan</center></center></th>
    <th><center>Tanggal</center></center></th>
    
</thead>
<?php

$data56= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil56= mysql_fetch_array($data56); 
$username56 = $hasil56['username'];
$balance56 = $hasil56['balance'];
$idgan5 = $hasil5['id'];
$data156= mysql_query("SELECT * FROM deposit WHERE user_id = '$username5' order by id DESC LIMIT 10");
while($hasil156= mysql_fetch_array($data156)){
$idsaldo56 = $hasil156['id'];
$jumlahsaldo56 = $hasil156['saldo'];
$ket56 = $hasil156['token'];
$tanggal56 = $hasil156['tanggal'];
$data1556= mysql_query("SELECT * FROM status WHERE id= '$tanggal5'");
while($hasil1556= mysql_fetch_array($data1556)){
$status156 = $hasil1556['status']; //echo Status
?>

        <tbody>
            <tr>
            <td><center><?php echo"$idsaldo56 ";?></center><br></td>
                        <td><center><?php echo"$jumlahsaldo56 ";?></center><br></td>
            <td><center><?php echo"$ket56 ";?></center><br></td>
<td><center><?php echo"$tanggal56 ";?></center><br></td>
            </tr>
    </tbody>
    <?php }} ?>
    
                                    </table>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

                           
                        </div>
                    </div>                                
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->                                
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
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
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
        
        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>    
        <!-- END PAGE PLUGINS -->

        <!-- START TEMPLATE -->
       
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS --> 
        
    </body>
</html>






