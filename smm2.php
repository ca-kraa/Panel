<?php
require_once('db/koneksi.php');
$cat = $_GET['hasilnya'];
$kota = mysql_query("SELECT * FROM services WHERE id='$cat' order by id");

while($k = mysql_fetch_array($kota)){

$rate1 = $k['rate'];
$jadi = number_format($rate1,0,',','.');
    echo "<option value=\"".$k['rate']."\">Rp. ".$jadi."/".$k['unit']."</option>\n";
    echo "<option value=\"".$k['rate']."\"> ".$k['ket']." </option>\n";
    
}
?>