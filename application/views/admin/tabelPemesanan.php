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
    	<h2>Pemesanan Custom Order</h2>
    </div>
    	<div class="row mb40">        
              <table class="table table-striped">
                  <thead>
                    <th>Tanggal</th>
                    <th>Kode</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <tbody class="produk">
                    <?php foreach ($orderjasa as $j) { ?>
                    <tr>
                      <td><?php echo $j->tanggal ?></td>
                      <td><?php echo $j->kode ?></td>
                      <td><?php echo $j->namabarang ?></td>
                      <td><?php echo $j->jumlah ?></td>
                      <td><?php echo $j->total ?></td>
                      <td><?php echo $j->statusorder ?> </td>
                      <td><a data-toggle="modal" data-target="#myModal" class="btn btn-primary" href="#" onclick="more_info('<?php echo $j->kode?>')" >More</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail <span id="nama_v1"></span></h4>
      </div>
      <div class="modal-body">
        <table class="table">
        <tr>
          <td></td><td><img id="foto_v" src="" style="height: 40px; width: 40px;"></td>
        </tr>
          <tr>
            <td>Nama</td><td id="nama_v"></td>
          </tr>
          <tr>
            <td>Email</td><td id="email_v"></td>
          </tr>
          <tr>
            <td>Username</td><td id="uname_v"></td>
          </tr>
          <tr>
            <td>Alamat</td><td id="addrr_v"></td>
          </tr>
          <tr>
            <td>Nomor Telepon</td><td id="telp_v"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
