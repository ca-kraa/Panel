<?php
require_once('db/koneksi.php');
$cat = $_GET['cat'];
$kota = mysql_query("SELECT * FROM pulsa WHERE id_sub='$cat' order by id");
echo "<option>-- Pilih Layanan --</option>";
while($k = mysql_fetch_array($kota)){
$rate1 = $k['rate'];
    echo "<option value=\"".$k['id']."\">".$k['name']."</option>\n";
    
}
?>