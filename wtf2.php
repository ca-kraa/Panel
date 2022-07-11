<?php
require_once('db/koneksi.php');
$cat = $_GET['pulsa'];
$kota = mysql_query("SELECT * FROM hargapulsa WHERE id='$cat' order by id");

while($k = mysql_fetch_array($kota)){
$rate1 = $k['rate'];
$jadi = number_format($rate1,2,',','.');
    echo "<option value=\"".$k['rate']."\">Rp. ".$jadi."</option>\n";
    
}
?>