<?php $this->load->view("home/navigasilogin")?>
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">


<div class="isi-shop">
	<div class="navi-barang">
	<div class="container">
	<p><a href="<?php echo base_url()."Home/category"?>">Store</a> > <a href="<?php echo base_url()."Home/detilcategory/".$barang->kategori ?>"><?php echo ucfirst(strtolower($barang->kategori))?></a> > <a href="<?php echo base_url()."Home/barang/".$barang->id?>"><?php echo $barang->judul?></a></p>
	</div>
	</div>
		<div class="container" style="margin-top: 15px">
			<div class="row mb40">
    		<div class="chute chute-center text-center">

    		<div class="col-md-8 mb5">
    		<div class="demo-grid row">
			<div class="col-md-6 mb5">
				
					<img height=210px width=210px src="<?php echo base_url()?><?php echo $barang->thumbnail?>"/>
				
			</div>
			<div class="col-md-6 mb5">
				
					<h2><strong><?php echo $barang->judul?></strong></h2>
					<h3><strong><?php echo $barang->harga?></strong></h3>
					<p>Sisa Stok : <?php echo $barang->stok?></p>
					<br><br>
					<div class="chute chute-center text-center">
						
					</div>
			</div>
			</div>
			</div>

			<div class="col-md-4 mb5">
				<div class="demo-grid row">
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
			<div class="col-md-6 mb5">
				<div class="demo-grid">
					<h3><strong>Deskripsi</strong></h3>
					<textarea name="deks"><?php echo $barang->deskripsi?></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<h5 style="color: white">Gambar lainnya</h5>
				<div class="thum">
					<img src="">
				</div>
				<div class="thum">
					<img src="">
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
        </div>

<?php $this->load->view("home/footer")?>