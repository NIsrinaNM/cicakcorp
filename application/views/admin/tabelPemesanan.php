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
              <table class="table table-striped" id="table">
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
                    <?php 
                    if(empty($orderjasa)) {
                      echo '';
                    } else {
                    foreach ($orderjasa as $j) { ?>
                    <tr>
                      <td><?php echo $j->tanggal ?></td>
                      <td><?php echo $j->kode ?></td>
                      <td><?php echo $j->namabarang ?></td>
                      <td><?php echo $j->jumlah ?></td>
                      <form method="POST" action="<?php echo base_url()."admin/Pemesanan/updateHarga/"."$j->kode"?>">
                      <td><input style="width: 50%" class="input-group" type="text" name="ubahharga" value="<?php echo $j->total ?>">
                        <input style="width: auto" class="btn btn-primary" type="submit" name="submit" value="Ubah Harga">
                      </td>
                      </form>
                      <form method="POST" action="<?php echo base_url()."admin/Pemesanan/updateStatus/"."$j->kode"?>">
                      <td>
                        <select class="input-group" name="status">
                          <option <?php if('Belum Dibayar' == $j->statusorder){ echo 'selected="selected"'; } ?> value="Belum Dibayar">Belum Dibayar</option>
                          <option <?php if('Sudah Dibayar' == $j->statusorder){ echo 'selected="selected"'; } ?> value="Sudah Dibayar">Sudah Dibayar</option>
                          <option <?php if('Sedang Dikerjakan' == $j->statusorder){ echo 'selected="selected"'; } ?> value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                          <option <?php if('Telah Dikirim' == $j->statusorder){ echo 'selected="selected"'; } ?> value="Telah Dikirim">Telah Dikirim</option>
                          <option <?php if('Sudah Diterima' == $j->statusorder){ echo 'selected="selected"'; } ?> value="Telah Dikirim">Sudah Diterima</option>
                          <option <?php if('Order Selesai' == $j->statusorder){ echo 'selected="selected"'; } ?> value="Order Selesai">Order Selesai</option>
                        </select>
                        <input style="width: auto" class="btn btn-primary" type="submit" name="submit" value="Ubah Status">
                        </td>
                      </form>
                      <td><a data-toggle="modal" data-target="#myModal" class="btn btn-primary" href="#" onclick="jasa_more('<?php echo $j->kode?>')" >More</a></td>
                    </tr>
                    <?php } } ?>
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
        <h4 class="modal-title">Detail Order</span></h4>
      </div>
      <div class="modal-body" id="modalorder">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
