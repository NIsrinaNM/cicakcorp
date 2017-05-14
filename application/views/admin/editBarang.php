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
</div>';      } ?>

    <div class="cols-grids panel-widget">
    <div class="chute chute-center text-center">
    	<h2><?php echo $headtitle ?></h2>
    </div>
    	<div class="row mb40">
            
            <form action="<?php echo base_url(); ?>admin/Product/update/<?php echo $barang[0]->kode?>" method="POST" enctype="multipart/form-data">
            <div class="nav-add row" data-spy="affix" data-offset-top="400">
              <input style="width: auto; float: right; margin: 5px;" type="submit" class="btn btn-primary" id="upload" value="Update"> <a href="<?php echo base_url(); ?>admin/Product" class="btn btn-danger">Cancel</a>
            </div>
            <br>
            <div class="inputan">
              
                <div class="form-group">
                  <label>Gambar Thumbnail</label>
                   <p>Gambar untuk preview di halaman daftar barang.</p>
                  <label id="pickfile" class="uploader" ondragover="return false">
                    <i class="fa fa-plus" ></i>
                    <input id="file" type="file" name="filethumb" accept="image/*" >
                    <img src="<?php echo base_url().$barang[0]->thumbnail?>">
                    <!-- <span class="loader"></span> -->
                  </label>
                  </div>
                <div class="form-group">
                <div class="col-md-6" style="padding-left: 0;">
                  <label>Nama barang</label>
                  <input value="<?php echo $barang[0]->judul?>" class="form-control" type="text" name="nama">
                </div>
                <div class="col-md-6">
                  <label>Kode Barang</label>
                  <input value="<?php echo $barang[0]->kode?>" type="text" class="form-control" name="kode" readonly>
                </div>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori">
                    <?php foreach($kategori as $k){?>
                    <option <?php if($k->nama == $barang[0]->kategori){ echo 'selected="selected"'; } ?> value="<?php echo $k->nama; ?>"><?php echo $k->nama; ?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="form-group">
                <label>Harga</label>
                  <p><span class="satuan">IDR</span> <input value="<?php echo $barang[0]->harga?>" class="number form-control" style="width: 40%; display: inline-block;" type="text" name="harga"></p>
                </div>
                <div class="form-group">
                <label>Berat</label>
                  <p><span class="satuan">Gram(g)</span> <input value="<?php echo $barang[0]->berat?>" class="number form-control" style="width: 40%; display: inline-block;" type="text" name="berat"></p>
                </div>
                <div class="form-group">
                <label>Stok barang</label>
                  <input value="<?php echo $barang[0]->stok?>" class="number form-control" type="text" name="stok">
                </div>
                <div class="form-group">
                <label>Upload gambar</label>
                <p>Gunakan foto terbaik untuk menunjang penjualan anda. (JPEG, JPG, PNG)</p>
                  
               <!--  <div id="filediv" style="display: inline-block;"><input style="display: inline-block;" name="file[]" type="file" id="file"/></div> -->
                  <a type="button" id="add_more" class="upload btn btn-default" value="">Tambah Gambar</a>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" name="desc"><?php echo $barang[0]->deskripsi?></textarea>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" value="Tidak tesedia">
                    <option <?php if('Tesedia' == $barang[0]->status_barang){ echo 'selected="selected"'; } ?> value="Tesedia">Tesedia</option>
                    <option <?php if('Tidak tesedia' == $barang[0]->status_barang){ echo 'selected="selected"'; } ?> value="Tidak tesedia">Tidak tesedia</option>
                  </select>
                </div>
              </form>
            </div>
		</div>
	</div>
</div>


<!-- Modal ABOUT -->
<div id="tambah-about" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah ABOUT</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Tambah SLIDER -->
<div id="tambah-slider" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah SLIDER</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>admin/Create/addSlider" enctype='multipart/form-data'>
        <div class="form-group">
            <label>Gambar Slider</label>
            <input type="file" name="file" required="">
        </div>
        <div class="form-group">
            <label>Caption</label>
            <textarea class="form-control" name="caption"></textarea> 
        </div>
        <input type="submit" name="submit" value="Tambahkan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Edit SLIDER -->
<div id="edit-slider" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit SLIDER</h4>
      </div>
      <div class="modal-body">
      <form id="edit-slider" method="POST" action="<?php echo base_url();?>admin/Create/updateSlider/" enctype='multipart/form-data'>
        <input type="hidden" name="id">
        <div class="form-group">
            <label>Gambar Slider</label>
            <input type="file" name="file">
        </div>
        <div class="form-group">
            <label>Caption</label>
            <textarea class="form-control" name="captionEdit"></textarea> 
        </div>
        <input type="submit" name="submit" value="Tambahkan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

