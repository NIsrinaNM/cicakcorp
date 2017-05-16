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
    	<h2>Pemesanan Ready Stock</h2>
    </div>
    	<div class="row mb40">        
              <table class="table table-striped">
                  <thead>
                    <th>Tanggal</th>
                    <th>Kode</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Pemesan</th>
                    <th>Kirim</th>
                    <th>Harga</th>
                    <th>Status</th>
                  </thead>
                  <tbody class="produk">
                    <?php foreach ($order as $o) { ?>
                    <tr>
                      <td><?php echo $o->date ?></td>
                      <td><?php echo $o->kode_order ?></td>
                      <td><?php echo $o->kode ?></td>
                      <td><?php echo $o->kuantitas ?></td>
                      <td><?php echo $o->deskripsi ?></td>
                      <td><?php echo $o->customer ?></td>
                      <td><?php echo $o->metode ?></td>
                      <td><?php echo $o->subtotal ?></td>
                      <td><?php echo $o->status_bayar ?> <a class="btn btn-primary" href="">Edit status</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
		</div>
	</div>
</div>
