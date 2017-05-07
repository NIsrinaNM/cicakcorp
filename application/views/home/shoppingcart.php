<?php $this->load->view("home/navigasilogin")?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/shoppingcart.css"/>
		<div class="container-fluid text-center">
			<ol class="breadcrumb">
				<li><a href="#">Beli Lagi</a></li>
				<li class="active"><a href="#">Keranjang</a></li>
				<li><a href="#">Bayar</a></li>
			</ol>
		</div>
		
		<div class="container text-center">

			<div class="col-md-5 col-sm-12">
				<table>
					<tr>
						<td style="padding: 5px">Nama Penerima</td>
						<td style="padding: 10px"><input type="text" value="" disabled></td>
					</tr>
					<tr>
						<td style="padding: 5px">Alamat Penerima</td>
						<td style="padding: 10px"><textarea rows="5" cols="22" class="input-group" name="alamat" /></textarea></td>
					</tr>
					<tr>
						<td style="padding: 5px">No Telepon Penerima</td>
						<td style="padding: 10px"><input type="text" value="" disabled></td>
					</tr>
					<tr>
						<td style="padding: 5px">Pilihan Pengiriman</td>
						<td style="padding: 5px">
						<select name="kirim" required>
							<option value="COD">COD</option>
							<option value="Pos">POS Indonesia</option>
							<option value="JNE">JNE</option>
						</select>
						</td>
					</tr>
				</table>
					
				</p>
			</div>
			
			<div class="col-md-7 col-sm-12 text-left">
				<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>
					<li class="row">
						<span class="quantity">1</span>
						<span class="itemName">Birthday Cake</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price">$49.95</span>
					</li>
					<li class="row">
						<span class="quantity">50</span>
						<span class="itemName">Party Cups</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price">$5.00</span>
					</li>
					<li class="row">
						<span class="quantity">20</span>
						<span class="itemName">Beer kegs</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price">$919.99</span>				
					</li>
					<li class="row">
						<span class="quantity">18</span>
						<span class="itemName">Pound of beef</span>
						<span class="popbtn"><a class="arrow"></a></span>
						<span class="price">$269.45</span>
					</li>
					<li class="row">
						<span class="quantity">1</span>
						<span class="itemName">Bullet-proof vest</span>
						<span class="popbtn"  data-parent="#asd" data-toggle="collapse" data-target="#demo"><a class="arrow"></a></span>
						<span class="price">$450.00</span>				
					</li>
					<li class="row totals">
						<span class="itemName">Total:</span>
						<span class="price">$1694.43</span>
						<span class="order"> <a class="text-center">ORDER</a></span>
					</li>
				</ul>
			</div>

		</div>

		<!-- The popover content -->

		<div id="popover" style="display: none">
			<a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="#"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		
		<!-- JavaScript includes -->

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="<?php echo base_url()?>assets/js/shoppingcart.js"></script>
		<?php $this->load->view("home/footer")?>