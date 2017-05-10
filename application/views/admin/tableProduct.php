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
        <a href="" class="btn btn-danger" style="margin: 10px;">Hapus tercentang</a>
              <table class="table table-striped" id="table">
                <tbody class="produk">
                <?php 
                 if (!empty($jualan)) {
                  foreach ($jualan as $j) { ?>
                  <tr>
                  <td><input type="checkbox" name=""></td>
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
                        <p><a href="<?php echo base_url()?>admin/Product/edit_barang/<?php echo $j->kode ?>">Edit barang</a></p>
                        <p><a href="<?php echo base_url()?>admin/Product/_hapus/<?php echo $j->kode ?>">Hapus barang</a></p>
                    </td>
                  </tr>
                  <?php }}else{
                    echo   "Tidak ada data.";
                    } ?>
                  
                </tbody>
              </table>
		</div>
	</div>
</div>
