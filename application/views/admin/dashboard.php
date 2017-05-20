
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
<!--market updates updates-->
	 <div class="market-updates">
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-8 market-update-left">
						<h3>
							<?php $num = $this->db->where('verify','1')->count_all_results('user');
							if(empty($num)) {
								echo '0';
							} else {
								echo $num;
							} ?>
						</h3>
						<h4>User Terverifikasi</h4>
						<p><?php $num1 = $this->db->count_all_results('user');
							if(empty($num1)) {
								echo '0';
							} else {
								echo $num1;
							} ?> Total User</p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file-text-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-2">
				 <div class="col-md-8 market-update-left">
					<h3>
						<?php 
						$query = $this->db->select_sum('kuantitas', 'Kuantitas');
						$query = $this->db->get('detil_order');
						$result = $query->result();
							if(empty($result[0]->Kuantitas)) {
								echo '0';
							} else {
								echo $result[0]->Kuantitas;
							} ?>
					</h3>
					<h4>Barang Terjual</h4>
					<p><?php $num1 = $this->db->count_all_results('order');
							if(empty($num1)) {
								echo '0';
							} else {
								echo $num1;
							} ?> Total Ready Order</p>
				  </div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-8 market-update-left">
						<h3>
						<?php 
						$query = $this->db->select_sum('jumlah', 'Jumlah');
						$query = $this->db->get('orderanjasa');
						$result = $query->result();
							if(empty($result[0]->Jumlah)) {
								echo '0';
							} else {
								echo $result[0]->Jumlah;
							} ?>
						</h3>
						<h4>Barang Pesanan</h4>
						<p><?php $num1 = $this->db->count_all_results('orderanjasa');
							if(empty($num1)) {
								echo '0';
							} else {
								echo $num1;
							} ?> Total Custom Order</p>
					</div>
					<div class="col-md-4 market-update-right">
						<i class="fa fa-envelope-o"> </i>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
<!--market updates end here-->
<!--mainpage chit-chating-->
<div class="chit-chat-layer1">
	<div class="col-md-6 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Ready Stock Order Stats
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Status</th>
                                      <th>Total Order</th>                                                                  
                                      <th>Prosentase</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Belum Dibayar</td>
                                  <td style="text-align: center"><?php echo $this->db->where('status_bayar','Belum Dibayar')->count_all_results('order')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('status_bayar','Belum Dibayar')->count_all_results('order');
                                  	$total = $this->db->count_all_results('order');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>Sudah Dibayar</td>
                                  <td style="text-align: center"><?php echo $this->db->where('status_bayar','Sudah Dibayar')->count_all_results('order')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('status_bayar','Sudah Dibayar')->count_all_results('order');
                                  	$total = $this->db->count_all_results('order');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>Packing</td>
                                  <td style="text-align: center"><?php echo $this->db->where('status_bayar','Packing')->count_all_results('order')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('status_bayar','Packing')->count_all_results('order');
                                  	$total = $this->db->count_all_results('order');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>Telah Dikirim</td>
                                  <td style="text-align: center"><?php echo $this->db->where('status_bayar','Telah Dikirim')->count_all_results('order')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('status_bayar','Telah Dikirim')->count_all_results('order');
                                  	$total = $this->db->count_all_results('order');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>Sudah Diterima</td>
                                  <td style="text-align: center"><?php echo $this->db->where('status_bayar','Telah Dikirim')->count_all_results('order')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('status_bayar','Telah Dikirim')->count_all_results('order');
                                  	$total = $this->db->count_all_results('order');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                             <tr>
                             	<td>6</td>
                                <td>Order Selesai</td>
                                <td style="text-align: center"><?php echo $this->db->where('status_bayar','Order Selesai')->count_all_results('order')?></td>
                                <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('status_bayar','Order Selesai')->count_all_results('order');
                                  	$total = $this->db->count_all_results('order');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
             </div>
      </div>

      	<div class="col-md-6 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Ready Stock Order Stats
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Status</th>
                                      <th>Total Order</th>                                                                  
                                      <th>Prosentase</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Belum Dibayar</td>
                                  <td style="text-align: center"><?php echo $this->db->where('statusorder','Belum Dibayar')->count_all_results('orderanjasa')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('statusorder','Belum Dibayar')->count_all_results('orderanjasa');
                                  	$total = $this->db->count_all_results('orderanjasa');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>Sudah Dibayar</td>
                                  <td style="text-align: center"><?php echo $this->db->where('statusorder','Sudah Dibayar')->count_all_results('orderanjasa')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('statusorder','Sudah Dibayar')->count_all_results('orderanjasa');
                                  	$total = $this->db->count_all_results('orderanjasa');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>Sedang Dikerjakan</td>
                                  <td style="text-align: center"><?php echo $this->db->where('statusorder','Sedang Dikerjakan')->count_all_results('orderanjasa')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('statusorder','Sedang Dikerjakan')->count_all_results('orderanjasa');
                                  	$total = $this->db->count_all_results('orderanjasa');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>Telah Dikirim</td>
                                  <td style="text-align: center"><?php echo $this->db->where('statusorder','Telah Dikirim')->count_all_results('orderanjasa')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('statusorder','Telah Dikirim')->count_all_results('orderanjasa');
                                  	$total = $this->db->count_all_results('orderanjasa');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                             <tr>
                             	<td>5</td>
                                <td>Sudah Diterima</td>
                                <td style="text-align: center"><?php echo $this->db->where('statusorder','Sudah Diterima')->count_all_results('orderanjasa')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('statusorder','Sudah Diterima')->count_all_results('orderanjasa');
                                  	$total = $this->db->count_all_results('orderanjasa');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                              <tr>
                             	<td>6</td>
                                <td>Order Selesai</td>
                                <td style="text-align: center"><?php echo $this->db->where('statusorder','Order Selesai')->count_all_results('orderanjasa')?></td>
                                  <td><span class="badge badge-info">
                                  	<?php
                                  	$num = $this->db->where('statusorder','Order Selesai')->count_all_results('orderanjasa');
                                  	$total = $this->db->count_all_results('orderanjasa');
                                  	echo number_format((($num/$total)*100),2) . '%';
                                  	?>
                                  </span></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
             </div>
      </div>

     <div class="clearfix"> </div>
</div>
<!--main page chit chating end here-->
<!--main page chart start here-->
<div class="main-page-charts">
   <div class="main-page-chart-layer1">
		<div class="col-md-12 chart-layer1-left"> 
			<div class="geo-chart">
			<div class="span-2c">  
                        <h3 class="tlt">Persebaran User</h3>
                        <div id="regions_div" style="width: 1000px"></div>
     
     <script type='text/javascript'>
      google.charts.load('current', {'packages':['geochart']});
      google.charts.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
          ['Region',   'Jumlah User'],
			['Jakarta', <?php echo $this->db->where('prop','DKI JAKARTA')->count_all_results('profile') ?> ],
			['East Java', <?php echo $this->db->where('prop','JAWA TIMUR')->count_all_results('profile') ?> ],
			['West Java', <?php echo $this->db->where('prop','JAWA BARAT')->count_all_results('profile') ?>],
			['Yogyakarta', <?php echo $this->db->where('prop','DI YOGYAKARTA')->count_all_results('profile') ?>],
			['Central Java', <?php echo $this->db->where('prop','JAWA TENGAH')->count_all_results('profile') ?>],
			['North Sumatra', <?php echo $this->db->where('prop','SUMATERA UTARA')->count_all_results('profile') ?>],
			['Banten', <?php echo $this->db->where('prop','BANTEN')->count_all_results('profile') ?>],
			['South Sumatra', <?php echo $this->db->where('prop','SUMATERA SELATAN')->count_all_results('profile') ?>],
			['Riau', <?php echo $this->db->where('prop','RIAU')->count_all_results('profile') ?>],
			['Bali', <?php echo $this->db->where('prop','BALI')->count_all_results('profile') ?>],
			['South Sulawesi', <?php echo $this->db->where('prop','SULAWESI SELATAN')->count_all_results('profile') ?>],
			['Lampung', <?php echo $this->db->where('prop','LAMPUNG')->count_all_results('profile') ?>],
			['West Sumatra', <?php echo $this->db->where('prop','SUMATERA BARAT')->count_all_results('profile') ?>],
			['East Kalimantan', <?php echo $this->db->where('prop','KALIMANTAN TIMUR')->count_all_results('profile') ?>],
			['Central Sulawesi', <?php echo $this->db->where('prop','SULAWESI TENGAH')->count_all_results('profile') ?>],
			['West Kalimantan', <?php echo $this->db->where('prop','KALIMANTAN BARAT')->count_all_results('profile') ?>],
			['Riau Islands', <?php echo $this->db->where('prop','KEPULAUAN RIAU')->count_all_results('profile') ?>],
			['South Kalimantan', <?php echo $this->db->where('prop','KALIMANTAN SELATAN')->count_all_results('profile') ?>],
			['North Sulawesi', <?php echo $this->db->where('prop','SULAWESI UTARA')->count_all_results('profile') ?>],
			['West Nusa Tenggara', <?php echo $this->db->where('prop','NUSA TENGGARA BARAT')->count_all_results('profile') ?>],
			['East Nusa Tenggara', <?php echo $this->db->where('prop','NUSA TENGGARA TIMUR')->count_all_results('profile') ?>],
			['Papua', <?php echo $this->db->where('prop','PAPUA')->count_all_results('profile') ?>],
			['Central Kalimantan', <?php echo $this->db->where('prop','KALIMANTAN TENGAH')->count_all_results('profile') ?>],
			['Aceh', <?php echo $this->db->where('prop','ACEH')->count_all_results('profile') ?>],
			['Bengkulu', <?php echo $this->db->where('prop','BENGKULU')->count_all_results('profile') ?>],
			['Jambi', <?php echo $this->db->where('prop','JAMBI')->count_all_results('profile') ?>],
			['Maluku', <?php echo $this->db->where('prop','MALUKU')->count_all_results('profile') ?>],
			['Gorontalo', <?php echo $this->db->where('prop','GORONTALO')->count_all_results('profile') ?>],
			['South East Sulawesi', <?php echo $this->db->where('prop','SULAWESI TENGGARA')->count_all_results('profile') ?>],
			['North Maluku', <?php echo $this->db->where('prop','MALUKU UTARA')->count_all_results('profile') ?>],
			['Bangka Belitung Islands', <?php echo $this->db->where('prop','KEPULAUAN BANGKA BELITUNG')->count_all_results('profile') ?>],
			['West Papua', <?php echo $this->db->where('prop','PAPUA BARAT')->count_all_results('profile') ?>]
      ]);

        var options = {
        region: 'ID',
        displayMode: 'markers',
        colorAxis: {colors: ['green', 'blue']}
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));
        chart.draw(data, options);
      }
    </script>

                    </div> 			  		   			
			</div>
		</div>
	 <div class="clearfix"> </div>
  </div>
 </div>
 </div>                