<?php

session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	//redirect ke halaman login
	header('location:login.php');
}
$hasilnya1 = $_POST['pulsa'];
$quantity1 = 1;
$tanggal = gmdate("d-m-Y H:i:s", time()+60*60*7);
include('db/koneksi.php');
$cand1 = mysql_query("SELECT * FROM hargapulsa WHERE id='$hasilnya1'");
$tamvan1 = mysql_fetch_array($cand1); 
$rates1 = $tamvan1['rate'];
$minimal1 = $tamvan1['min'];
$jumlahtotal1 = $quantity1  * $rates1; //totalnya

$data= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil= mysql_fetch_array($data); 
$username = $hasil['username'];
$balance = $hasil['balance'];
if ($quantity1 < $minimal1 || ($_POST['hasilnya']) < 1 || $balance < $jumlahtotal1){

header("Location: ./historipulsa.php?error=Vk");
}
else{
class ApiPulsa
   {
      public $api_url = 'http://sosmedpedia.com/apipulsa.php'; // API URL

      public $api_key = 'SOSPED-18620b1243a428da9ff5a192dcd7e09c'; // Your API key

      public function order($nohp, $type) { // Add order
        return json_decode($this->connect(array(
          'api' => $this->api_key,
          'action' => 'tambah',
          'link' => $nohp,
          'pulsa' => $type,
        )));
      }

      public function status($order_id) { // Get status, remains
        return json_decode($this->connect(array(
          'api' => $this->api_key,
          'action' => 'cekin',
          'id' => $order_id
        )));
      }


      private function connect($post) {
        $_post = Array();
        if (is_array($post)) {
          foreach ($post as $name => $value) {
            $_post[] = $name.'='.urlencode($value);
          }
        }
        $ch = curl_init($this->api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        if (is_array($post)) {
          curl_setopt($ch, CURLOPT_POSTFIELDS, join('&', $_post));
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $result = curl_exec($ch);
        if (curl_errno($ch) != 0 && empty($result)) {
          $result = false;
        }
        curl_close($ch);
        return $result;
      }
   }
	$dataorder= mysql_query("SELECT * FROM orderpulsa order by id desc limit 1");
$inidatanya = mysql_fetch_array($dataorder);
$inidorder = $inidatanya['id'];
$cand62tamvannyabukanmain =  "CR-";
   $ui2 = $cand62tamvannyabukanmain$inidorder;
//tangkap data dari form order
$ui = $_POST['id'];
$hasilnya = $_POST['pulsa'];
$link = $_POST['link'];
$totalnya = $_POST['result'];

$cand2 = mysql_query("SELECT * FROM hargapulsa WHERE id='$hasilnya1'");
if(mysql_num_rows($cand2) > 0){
$tamvan2 = mysql_fetch_array($cand2); 
$rates = $tamvan2['rate'];
$minimal = $tamvan2['min'];
$tipegan = $tamvan2['kode'];



$jumlahtotal = $quantity1  * $rates; //totalnya

$data5= mysql_query("SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
$hasil5= mysql_fetch_array($data5); 
$username5 = $hasil5['username'];
$ui = $hasil5['id'];
$balance5 = $hasil5['balance'];
if ($balance5 >= $jumlahtotal) {
	$saldo = $balance - $jumlahtotal;
	$update= "update users set balance='$saldo' where username='$username'";
	$exe = mysql_query($update);
 $api = new ApiPulsa();

   $order = $api->order("".$link."", "".$tipegan.""); // $nohp, $type - service type
   $idbulk = $order->data->id;
	$ui2++;
	$query = ("INSERT into orderpulsa(user_id,orderid,service_id,link,charge,quantity,created,idbulk) VALUES('$ui','$ui2','$hasilnya','$link','$jumlahtotal1','$quantity1','$tanggal','$idbulk')");
	$sql = mysql_query ($query) or die (mysql_error());
		if ($sql) {
			header("Location: ./historipulsa.php?sukses=$ui2");
		} else {
			header("Location: ./index.php");	
			}
	 
   }


}
else
{
header("Location: ./historipulsa.php?error=Vk");
}
} 
?>