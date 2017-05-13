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
    	<h2>Galeri</h2>
    </div>
    <p>Tunjukan kepada customer anda bagaimana aktifitas anda dengan fitur galeri yang tersedia.</p>
    	<div class="row mb40">
        <div class="table-responsive">          
          <table class="table" id="table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Caption</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php 
            if (!empty($galeri)) {?>
            <tbody>
                <?php foreach ($galeri as $s) {
                ?>
              <tr>
                    <td class="gambar"><img src="<?php echo base_url();?><?php echo $s->gambar;?>"></td>
                    <td><?php echo $s->caption ?></td>
                    <td><a href="<?php echo base_url();?>admin/Galleri/delete/<?php echo $s->id;?>">Del</a></td>
                </tr>
                <?php
            }}else{?>
                <tr style='color:red'>Tidak ada data.</tr>        
            </tbody>
            
            <?php } ?>

          </table>
        </div>
        <a data-toggle="modal" data-target="#tambah-galeri" href="#" class="btn btn-primary">Tambah</a>
		</div>
	</div>
</div>

<!-- Modal Tambah SLIDER -->
<div id="tambah-galeri" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah GALERI</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo base_url();?>admin/Galleri/add" enctype='multipart/form-data'>
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