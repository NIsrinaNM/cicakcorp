<?php $this->load->view("home/navigasilogin")?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/shoppingcart.css"/>
<div style="min-height: 80vh">
		<div class="container-fluid text-center" style="margin-top: 20px;">
			<ol class="breadcrumb">
				<li><a href="category">Beli Lagi</a></li>
				<li class="active"><a href="#">Keranjang</a></li>
				<li><a href="#">Bayar</a></li>
			</ol>
		</div>
		
		<div class="container text-center demo-grid-wht" style="padding: 15px;margin-bottom: 20px">

			<div class="col-md-7 col-sm-12 text-left" style="padding-right: 20px;padding-left: 5px">
			<div class="">
			<div>
				<?php 
				$cart_cek = $this->cart->contents();
				if (empty($cart_cek)) {
					echo 'Tidak ada produk di shopping cart!!';
				} ?>
			</div>

			<?php
			$cart = $this->cart->contents();
			 if ($cart) {?>
				<form method="post" action="<?php echo base_url()?>Order/update_cart">
				<table id="cart" class="table table-hover table-condensed">
					<tr>
						<td style="width:auto;">QTY</td>
						<td style="width:auto;">PRODUK</td>
						<td style="width:auto;">HARGA</td>
						<td style="width:auto;">TOTAL</td>
						<td style="width:auto;">Aksi</td>
					</tr>
					<?php
					$total = 0;
					 foreach ($cart as $c) {
						echo form_hidden('cart[' . $c['id'] . '][id]', $c['id']);
						echo form_hidden('cart[' . $c['id'] . '][rowid]', $c['rowid']);
						echo form_hidden('cart[' . $c['id'] . '][name]', $c['name']);
						echo form_hidden('cart[' . $c['id'] . '][price]', $c['price']);
						echo form_hidden('cart[' . $c['id'] . '][qty]', $c['qty']);
						echo form_hidden('cart[' . $c['id'] . '][deskripsi]', $c['deskripsi']);
						?>
					<tr>

						<td><input name="<?php echo 'cart['.$c['id'].'][qty]'?>" type="number" class="form-control text-center" value="<?php echo $c['qty'];?>" style="width: 80%;"></td>
						<td><?php echo $c['name'];?></td>
						<td>IDR <?php echo number_format($c['price'],2);?></td>
						<?php $total = $total+$c['subtotal'];?>
						<td style="color: #008dd2">IDR <?php echo number_format($c['subtotal'],2);?></td>
						<td><a href="<?php echo base_url()?>Order/remove/<?php echo $c['rowid'];?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td>
					</tr>
					<?php } ?>
					<tr>
						<td>
							<button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
						</td>
						<td></td>
						<td>Total :</td>
						<td>IDR <?php echo number_format($total,2) ?></td>
					</tr>
				</table>
				</form>
				<?php } ?>
			</div>
			</div>
	<form method="POST" action="<?php echo base_url();?>Order/save_to_db">		
			<div class="col-md-5 col-sm-12">
			<!-- <?= var_dump($total);?> -->
			<input type="hidden" name="subtotal" value="<?= isset($total)? $total: ''; ?>">
			<div class="" style="margin-bottom: 20px;">
				<table>
					<tr>
						<td style="padding: 5px">Nama Penerima</td>
						<td style="padding: 10px"><input type="text" name="nama" value="<?php echo $this->session->userdata('masukin')['nama']?>" readonly="" class="form-control"></td>
					</tr>
					<tr>
						<td style="padding: 5px">Alamat Penerima</td>
						<td style="padding: 10px"><textarea style="max-width: 300px;min-width: 300px;min-height: 80px" class="form-control" name="alamat" required="" /></textarea></td>
					</tr>
					<tr>
						<td style="padding: 5px">No Telepon Penerima</td>
						<td style="padding: 10px"><input class="form-control" type="number" name="telp" readonly="" value="<?php echo $detail->noTelp ?>"></td>
					</tr>
					<tr>
						<td style="padding: 5px">Pilihan Pengiriman</td>
						<td style="padding: 5px">
						<select class="form-control" name="kirim" required>
							<option value="COD">COD</option>
							<option value="POS Indonesia">POS Indonesia</option>
							<option value="JNE">JNE</option>
						</select>
						</td>
					</tr>
				</table>
				<div class="elemen">
					<a href="" class="btn btn-primary">Lanjut Belanja</a>
					<button class="btn btn-success" <?php if (empty($cart_cek)) {
					echo 'disabled';
				} ?> href="">Lanjut Bayar</button>
				</div>

			</div>
			</div>
		</form>
		</div>
</div>		
		<!-- JavaScript includes -->
		<?php $this->load->view("home/footer")?>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="<?php echo base_url()?>assets/js/shoppingcart.js"></script>

