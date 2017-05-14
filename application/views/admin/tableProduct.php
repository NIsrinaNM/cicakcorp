<div class="inner-block">
<?php
                            if ($this->session->flashdata('error')) {
                                echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Oops!</strong> '.$this->session->flashdata('error').'
</div>';
                             }elseif($this->session->flashdata('success')){
                                echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> '.$this->session->flashdata('success').'.
</div>';
                                } ?>

    <div class="cols-grids panel-widget">
    <div>
      <a class="btn btn-primary" href="<?php echo base_url()?>admin/Product/add">Tambah barang</a>
    </div>
    <div class="chute chute-center text-center">
    	<h2>Produk</h2>
    </div>
    	<div class="row mb40">
      <div class="form-group">
      <form action="<?php echo base_url()?>admin/Product/search" method="POST">
        <input class="form-control" type="text" name="cari" placeholder="Cari barang" required="" value="<?php echo isset($pencarian) ? $pencarian : ''; ?>">
        <input class="btn btn-success" type="submit" name="caribtn" value="Cari" style="width: auto; margin: 5px; float: right;">
        </form>
      </div>
      <form method="POST" action="<?php echo base_url()?>admin/Product/hapus_multi">
        <button type="submit" class="btn btn-danger" style="margin: 10px;">Hapus tercentang</button> 
              <table class="table table-striped" id="table">
                <tbody class="produk">
                <?php 
                 if (!empty($jualan)) {
                  foreach ($jualan as $j) { ?>
                  <tr>
                  <td><input type="checkbox" name="del[]" value="<?php echo $j->id ?>"></td>
                  </form>
                    <td>
                        <img src="<?php echo base_url().$j->thumbnail?>"><?php echo $j->judul ?><br>
                        <p><?php echo $j->kategori ?></p>
                    </td>
                    <td><form method="POST" action="<?php echo base_url()?>admin/Product/updateHarga/<?php echo $j->kode?>">
                        <p>IDR <input class="number form-custom" type="text" name="harga" value="<?php echo $j->harga ?>"></p>
                        <p><button style="margin: 5px auto; display: block;" class="btn btn-primary" type="submit" href="">Ubah harga</button></p>
                        </form>
                        <p>Kode barang : <?php echo $j->kode; ?></p>
                    </td>
                    <td>
                        <p>Berat : <?php echo $j->berat ?></p>
                        <p>Stok : <?php echo $j->stok ?></p>
                        <p>Status barang : <?php echo $j->status_barang ?></p>
                    </td>
                    <td>
                        <p><a href="<?php echo base_url()?>admin/Product/edit_barang/<?php echo $j->kode ?>"><span class="glyphicon glyphicon-pencil"></span> Edit barang</a></p>
                        <p><a href="<?php echo base_url()?>admin/Product/_hapus/<?php echo $j->id ?>" onclick="javascript:confirmationDelete($(this));return false;"><span class="glyphicon glyphicon-trash"></span> Hapus barang</a></p>
                    </td>
                  </tr>
                  <?php }}else{
                    echo   "Tidak ada data.";
                    } ?>
                  
                </tbody>
              </table>
              <ul class="pagination">
              <?php echo $this->pagination->create_links();?>
              </ul>
		</div>
	</div>
</div>

<script type="text/javascript">
  function confirmationDelete(anchor){
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
  }
</script>