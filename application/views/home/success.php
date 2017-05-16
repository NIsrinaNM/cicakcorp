<?php $this->load->view("home/navigasilogin")?>
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
		<div class="container">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
			<div class="col-md-12 mb5">
				<img height=250px width=250px src="<?php echo base_url()?>assets/image/ok.png"/>
				<div class="demo-grid">
					<h2><strong>Terima kasih telah mempercayai kami</strong></h2>
					<h3>Kode order anda: <em><?php echo $kode?></em></h3>
					<div class="secdiri table-responsive">
						<table class="table table-condensed no-border" style="text-align: left">
							<tr class="no-border">
								<td>Nama Penerima</td>
								<td>: <?php echo $nama ?></td>
							</tr>
							<tr class="no-border">
								<td>Alamat Pengiriman</td>
								<td>: <?php echo $alamat ?></td>
							</tr>
							<tr class="no-border">
								<td>Metode Pengiriman</td>
								<td>: <?php echo $metod ?></td>
							</tr>
							<tr class="no-border">
								<td>Kontak</td>
								<td>: <?php echo $notelp ?></td>
							</tr>
						</table>
					</div>
					<h3 class="panel-title">Untuk melengkapi proses order, silakan lakukan pembayaran sebesar</h3>
					<h3><em><?php echo $harga?></em></h3>
					<p>Pembayaran dapat dilakukan di</p>
					<div class="col-md-4">
						<div class="demo-grid">
							<img height=50px width=50px src="<?php echo base_url()?>assets/image/ok.png"/>
							<p><strong>[No Rekening]</strong></p>
							<p>[atas nama siapa]</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="demo-grid">
							<img height=50px width=50px src="<?php echo base_url()?>assets/image/ok.png"/>
							<p><strong>[No Rekening]</strong></p>
							<p>[atas nama siapa]</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="demo-grid">
							<img height=50px width=50px src="<?php echo base_url()?>assets/image/ok.png"/>
							<p><strong>[No Rekening]</strong></p>
							<p>[atas nama siapa]</p>
						</div>
					</div>
					<br /><br />
					<h4>Simpan kode order untuk konfirmasi Pembayaran. Batas pembayaran adalah 1x24 jam</h4>
					<a href="<?php echo base_url()."home/confirm"?>"><button class="btn btn-primary">Konfirmasikan Pembayaran</button></a>
				</div>
			</div>
			</div>
		    </div>
        </div>
    <div>

<?php $this->load->view("home/footer")?>