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

<div class="inner-block">
    <div class="cols-grids panel-widget">
    <div>
      <a class="btn btn-primary" href="<?php echo base_url()?>admin/Product/add">Tambah barang</a>
    </div>
    <div class="chute chute-center text-center">
    	<h2>Produk</h2>
    </div>
    	<div class="row mb40">        
              <table class="table table-striped">
                <tbody class="produk">
                  <tr>
                    <td>
                        <img src="https://gloimg.gearbest.com/gb/pdm-product-pic/Electronic/2017/03/02/goods-img/1489111037193025149.jpg">Judul<br>
                        <p>Kategori</p>
                    </td>
                    <td>
                        <p>IDR <input class="form-custom" type="text" name="" value="13,000"></p>
                        <p><a href="">Ubah harga</a></p>
                    </td>
                    <td>
                        <p>Stok : 100</p>
                        <p>Status barang : Tidak tersedia</p>
                    </td>
                    <td>
                        <p><a href="">Edit barang</a></p>
                        <p><a href="">Hapus barang</a></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <img src="https://gloimg.gearbest.com/gb/pdm-product-pic/Electronic/2017/03/02/goods-img/1489111037193025149.jpg">Judul<br>
                        <p>Kategori</p>
                    </td>
                    <td>
                        <p>IDR <input class="form-custom" type="text" name="" value="13,000"></p>
                        <p><a href="">Ubah harga</a></p>
                    </td>
                    <td>
                        <p>Stok : 100</p>
                        <p>Status barang : Tidak tersedia</p>
                    </td>
                    <td>
                        <p><a href="<?php echo base_url() ?>admin/Product/edit_barang">Edit barang</a></p>
                        <p><a href="">Hapus barang</a></p>
                    </td>
                  </tr>
                </tbody>
              </table>
		</div>
	</div>
</div>
