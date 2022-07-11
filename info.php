<?php
   class Api
   {
      public $api_url = 'http://sosmedpedia.com/api.php'; // API URL

      public $api_key = 'SOSPED-18620b1243a428da9ff5a192dcd7e09c'; // Your API key

      public function order($link, $type, $quantity) { // Add order
        return json_decode($this->connect(array(
          'api' => $this->api_key,
          'action' => 'tambah',
          'linknya' => $link,
          'hasilnya' => $type,
          'quantitynya' => $quantity
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
        echo $result;
        if (curl_errno($ch) != 0 && empty($result)) {
          $result = false;
        }
        curl_close($ch);
        return $result;
      }
   }

   
   
require_once('db/koneksi.php');

   $datanyawkwkwk = mysql_query("SELECT * FROM orders order by id DESC");

while($hasilwkwkwk= mysql_fetch_array($datanyawkwkwk)){
$idbulk = $hasilwkwkwk['idbulk'];
$status = $hasilwkwkwk['status'];
$api = new Api();


   $status = $api->status($idbulk); // $order_id: return Order status, return Remains or Error
$statuse = $status->data->statusnya;
$start_countnya = $status->data->start_count;
$update1212= mysql_query("update orders set status='$statuse', start_count='$start_countnya' where idbulk='$idbulk'");
echo"$statuse";
}
   ?>