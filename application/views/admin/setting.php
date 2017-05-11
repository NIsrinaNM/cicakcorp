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
    	<h2>Setting your store</h2>
    </div>
    	<div class="row mb40">
    		<h3>Pengaturan halaman depan.</h3>
            <p>Pengaturan halaman depan dibuat untuk melakukan pengaturan konten pada halaman depan website sehingga akan terlihat dinamis.</p>
            <br>
            <div class="section">
            <h1>About</h1>
            <p>Mengatur about yang berada pada halaman depan.</p>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>About</td>
                    <td>aaaaaaaaaaaaaaaa</td>
                    <td><a href="#">Edit</a> <a href="#">Del</a></td>
                </tr>
            </tbody>
            </table>
             <a data-toggle="modal" data-target="#tambah" href="#" class="btn btn-primary">Tambah</a>
             </div>

             <div class="section">
            <h1>Slider</h1>
            <p>Merubah slider agar bisa lebih dinamis dan mudah untuk dicustom.</p>
            <table class="table table-hover" id="table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Caption</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if (!empty($slider)) {
                foreach ($slider as $s) {
                ?>
              <tr>
                    <td class="gambar"><img src="<?php echo base_url();?><?php echo $s->gambar;?>"></td>
                    <td><?php echo $s->caption ?></td>
                    <td><a data-toggle="modal" data-target="#edit-slider" onclick="edit_slider(<?php echo $s->id ?>)" href="#">Edit</a> <a href="<?php echo base_url();?>admin/Create/delete/<?php echo $s->id;?>">Del</a></td>
                </tr>
                <?php
            }}else{
                // var_dump($slider);
           
             echo   "Tidak ada data.";
              
                 } ?>

            </tbody>
            </table>
             <a data-toggle="modal" data-target="#tambah-slider" href="#" class="btn btn-primary">Tambah</a>
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
            <input type="file" name="file" required="" style="display: block;">
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
            <input type="file" name="file" style="display: block;">
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

