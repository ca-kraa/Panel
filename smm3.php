<?php
require_once('db/koneksi.php');

$cat1 = $_GET['hasilnya'];
$kota1 = mysql_query("SELECT * FROM services WHERE id='$cat1' order by id");
 while($k1 = mysql_fetch_array($kota1)){    
 echo "<span>".$k1['ket']."</span><br/>";
echo "Deskripsi :<br/>";
 echo "<span>".$k1['des']."</span>";  
     }
?>
