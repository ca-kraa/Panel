<?php
require_once('db/koneksi.php');
$cat = $_GET['hasilnya'];
$kota = mysql_query("SELECT * FROM hargapulsa WHERE id_sub='$cat' and enabled='1' order by id_sub");
echo "<option>-- Pilih Produk--</option>";
while($k = mysql_fetch_array($kota)){
$rate1 = $k['rate'];

    echo "<option value=\"".$k['id']."\">".$k['name']."</option>\n";

    
}
?>