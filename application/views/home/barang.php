<?php $this->load->view("home/navigasilogin")?>
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.css">
<style type="text/css">
	.chosen-container{
	width: 100%;
	}
</style>


<div class="isi-shop">
	<div class="navi-barang">
	<div class="container">
	<p><a href="<?php echo base_url()."Home/category"?>">Store</a> > <a href="<?php echo base_url()."Home/detilcategory/".$barang->kategori ?>"><?php echo ucfirst(strtolower($barang->kategori))?></a> > <a href="<?php echo base_url()."Home/barang/".$barang->id?>"><?php echo $barang->judul?></a></p>
	</div>
	</div>
		<div class="container" style="margin-top: 15px">
			<div class="row mb40">
    		<div class="chute chute-center text-center">

    		<div class="col-md-8 mb5" style="margin-bottom: 10px">
    		<div class="demo-grid row">
			<div class="col-md-6 mb5">
				
					<img height=210px width=210px src="<?php echo base_url()?><?php echo $barang->thumbnail?>"/>
				
			</div>
			<div class="col-md-6 mb5">
				<div class="con con-up">
					<h4><?php echo $barang->judul?></h4>
					<h3><strong>IDR <?php echo number_format($barang->harga)?></strong></h3>
					<p>Berat : <?php echo $barang->berat?> Gram</p>
					<p>Sisa Stok : <?php echo $barang->stok?> PCs</p>
				</div>
				<div class="con con-down">

					<?php if (strcmp($barang->status_barang,"Tersedia")==1) {
						$color = 'border-green';
					}else{
						$color = 'border-red';
						} ?>

					<span class="<?php echo $color?>"><?php echo $barang->status_barang ?></span>
					<span class="border"><?php echo ucfirst(strtolower($barang->kategori)) ?></span>	
				</div>
				
			</div>
			</div>
			</div>

			<div class="col-md-4 mb5">
				<div class="demo-grid-wht">
					<div class="chute chute-center text-center">
					<h4><strong>Order Now!!!</strong></h4>
					</div>
					<form method="post" action="<?php echo base_url()?>Order/add">
					<input type="hidden" name="name" value="<?php echo $barang->judul?>">
					<input type="hidden" name="price" value="<?php echo $barang->harga?>">
					
					<input type="hidden" name="id" value="<?php echo $barang->kode?>">
						<table>
							<tr>
								<td>Banyaknya</td>
								<td style="padding: 5px"><input type="number" min="0" max="1000" class="form-control" name="qty"></td>
							</tr>
							<tr>
								<td>Pesan</td>
								<td style="padding: 5px"><textarea name="deskripsi" type="text" class="form-control" placeholder="Tuliskan request khusus anda terkait produk kepada penjual. ex: Warna, ukuran, dll"></textarea></td>
							</tr>
							<tr>
								<div class="chute chute-center text-center">
								<td></td>
								<td style="padding: 5px"><input type="submit" class="btn" name="submit" value="Add to Cart Now" <?php if (strcmp($barang->status_barang,"Tersedia")==1) {
						echo '';
					}else{
						echo 'disabled="" data-poin="disable" style="pointer-events: unset;"';
						} ?>></td>
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
					<h4><strong>Deskripsi</strong></h4>
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
			<div class="row mb40" style="margin-top: 15px; margin-bottom: 20px;">
			<div class="col-md-12 mb5">
				<div class="demo-grid">
					<h4><strong>Cek Ongkir</strong></h4>
					<div>
						<form method="post" action="">
						<div class="bagian-ongk">
						
						<select data-placeholder="Pilih kota penguriman..." style="width:100%;" class="chosen-select form-control">
							<?php foreach($kota as $k){?>
							<option><?php echo $k->name?></option>
							<?php }?>
						</select>
						</div>
						<div class="bagian-ongk">
						<input placeholder="berat barang yang dikirim" class="form-control" type="text" name="berat" indc="ongkir">
						</div>
						<div class="bagian-ongk" >
							<button class="btn btn-success" type="submit">CEK</button>
						</div>
						
						</form>
						<label>Biaya</label>
						<div class="biaya"></div>
					</div>
				</div>
			</div>
			</div>
        </div>
        </div>

<?php $this->load->view("home/footer")?>

<script type="text/javascript">
$(document).ready(function(){
   $("#search").keyup(function(){
  if($("#search").val().length>3){
  $.ajax({
   type: "post",
   url: '<?php echo base_url()?>Order/getKota',
   cache: false,    
   data:'cari='+$("#search").val(),
   success: function(response){
    $('#finalResult').html("");

    var obj = JSON.parse(response);
    // console.log(obj);
    if(obj.length>0){
     try{
      var items=[];  
      $.each(obj, function(i,val){           
          items.push($('<option/>').text(val.name));
      }); 
      $('#finalResult').append.apply($('#finalResult'), items);
     }catch(e) {  
      alert('Exception while request..');
     }  
    }else{
     $('#finalResult').html($('<option/>').text("Kota tidak ditemukan"));  
    }  
    
   },
   error: function(){      
    alert('Error while request..');
   }
  });
  }
 $('#finalResult').html("");
   });
 });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.jquery.min.js"></script>
<script type="text/javascript">
	$(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); 
</script>