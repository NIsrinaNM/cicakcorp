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
    <div class="chute chute-center text-center">
    	<h2>Tambah Produk Baru</h2>
    </div>
    	<div class="row mb40">
            <p>Tambahkan produk baru anda untuk dijual.</p>
            <br>
            <div class="inputan">
              <form>
                <div class="form-group">
                <label>Upload gambar</label>
                  <label class="uploader" ondragover="return false">
                    <i class="fa fa-upload"></i>
                    <img src="" class="">
                    <input type="file" accept="image/*">
                    <span class="loader"></span>
                  </label>
                </div>
                <div class="form-group">
                  <label>Nama barang</label>
                  <input class="form-control" type="text" name="">
                </div>
                <div class="form-group">
                <label>Harga</label>
                  <p>IDR <input class="form-control" style="width: 90%" type="text" name=""></p>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control"></textarea>
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

