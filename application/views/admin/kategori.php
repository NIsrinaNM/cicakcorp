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

<div class="inner-block" style="min-height: 100vh">
    <div class="cols-grids panel-widget">
    <div class="chute chute-center text-center">
    	<h2>Kategori barang</h2>
    </div>
    	<div class="row mb40">
        <div class="col-md-6">
          <table class="table table-striped" id="table">
            <thead>
              <!-- <th>ID</th> -->
              <th>Nama Kategori</th>
              <th>Action</th>
            </thead>
            <tbody>
            <?php
             if (!empty($kate)) {
              // var_dump($kate);
                foreach ($kate as $kat) {
                ?>
              <tr>
                    <!-- <td><?php echo $kat->id;?></td> -->
                    <td><?php echo $kat->nama ?></td>
                    <td><a class="btn btn-danger" href="<?php echo base_url();?>admin/Product/hapus/kategori/<?php echo $kat->id;?>">Del</a></td>
                </tr>
                <?php
            }}else{
                // var_dump($slider);
           
             echo   "Tidak ada data.";
              
                 } ?>

            </tbody>
          </table>
        </div>
        <div class="col-md-6">
        <div id="notif"></div>
        <h3>Tambah kategori</h3>
          <form id="add-kategori" method="POST" action="">
            <div class="form-group">
              <input class="form-control" type="text" name="nama" required="">
            </div>
            <input class="btn btn-success" value="Tambah" type="" name="" onclick="addKategori()">
          </form>
        </div>
		</div>
	</div>
</div>
