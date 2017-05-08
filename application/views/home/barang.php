<?php $this->load->view("home/navigasilogin")?>
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
		<div class="container" style="margin-top: 15px">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
			<div class="col-md-3 mb5">
				<div class="demo-grid">
					<img height=210px width=210px src="<?php echo base_url()?>assets/image/ok.png"/>
				</div>
			</div>
			</div>
			<div class="col-md-5 mb5">
				<div class="demo-grid">
					<h2><strong>[Ini Nama Barangnya]</strong></h2>
					<h3><strong>[Ini Harga Barangnya]</strong></h3>
					<p>fox jump over dog</p>
					<br><br>
					<div class="chute chute-center text-center">
						<a href="#"><button style="margin-right: 100px" class="btn btn-primary">Order</button></a><a href="#"><button class="btn btn-default">Back</button></a>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb5">
				<div class="demo-grid">
					<div class="chute chute-center text-center">
					<h3><strong>Order Now!!!</strong></h3>
					</div>
					<form>
						<table>
							<tr>
								<td>Banyaknya</td>
								<td style="padding: 5px"><input type="number" min="0" max="1000" class="form-control" name="quantity"></td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td style="padding: 5px"><textarea type="text" class="form-control"></textarea></td>
							</tr>
							<tr>
								<div class="chute chute-center text-center">
								<td></td>
								<td style="padding: 5px"><input type="submit" class="form-control" name="submit" value="Add to Shopping Cart Now"></td>
								</div>
							</tr>
						</table>
					</form>
				</div>
			</div>
			</div>
		    <div class="row mb40" style="margin-top: 15px">
			<div class="col-md-12 mb5">
				<div class="demo-grid">
					<h3><strong>Deskripsi</strong></h3>
					<p>lorem ipsum</p>
				</div>
			</div>
			</div>
			<div class="row mb40" style="margin-top: 15px">
			<div class="col-md-12 mb5">
				<div class="demo-grid">
					<h3><strong>Cek Ongkir</strong></h3>
				</div>
			</div>
			</div>
        </div>

<?php $this->load->view("home/footer")?>