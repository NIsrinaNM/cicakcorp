<?php  
$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: 67c97ee2507d0cfdc8eaf1c9269dfec2"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  $data = json_decode($response, true);
  //echo json_encode($k['rajaongkir']['results']);

  /*
  for ($k=0; $k < count($data['rajaongkir']['results']); $k++){
  

    echo "<li='".$data['rajaongkir']['results'][$k]['code']."'>".$data['rajaongkir']['results'][$k]['service']."</li>";
  	//echo $data['rajaongkir']['results'][$k]['code'];
  }
  */
  //echo $data['rajaongkir']['results']['costs']['service'];
}

// var_dump($data);
?>

<!-- <?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?> @<?php echo $berat;?>gram Kurir : <?php echo strtoupper($courier); ?> -->

<input type="hidden" name="provinsi_o" value="<?php echo $data['rajaongkir']['destination_details']['province'];?>">
<input type="hidden" name="kota_o" value="<?php echo $data['rajaongkir']['destination_details']['city_name'];?>">

<div class="panel panel-success">
				  <div class="panel-heading">
				    <h3 class="panel-title">Hasil</h3>
				  </div>
				  <div class="panel-body">
				  	<ol>
<?php
 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
?>
	 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
		 <table class="table table-striped">
			 <tr>
				 <th>#</th>
				 <th>Jenis Layanan</th>
				 <th>ETD</th>
				 <th>Tarif</th>
			 </tr>
			 <?php
			 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {			 
			 ?>
			 <tr>
				 <td><a href="#" id="pil_peng" onclick="ongkir(<?= $l?>)" class="peng">Pilih Pengiriman</a></td>
				 <td>
					 <div style="font:bold 16px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
					 <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
				 </td>
				 <td align="center">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> days</td>
				 <td align="right" id="hargaa<?= $l?>" class="ongkir"><?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?></td>
			 </tr>
			 <?php
			 }
			 ?>
		 </table>
	 </div>
 <?php
 }
 ?>
	  </ol>
  </div>
</div>

