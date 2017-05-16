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
                    <th>Deskripsi</th>
                    <th>Pemesan</th>
                    <th>Kirim</th>
                    <th>Harga</th>
                    <th>Desain</th>
                    <th>Status</th>
                  </thead>
                  <tbody class="produk">
                    <?php foreach ($orderjasa as $j) { ?>
                    <tr>
                      <td><?php echo $j->tanggal ?></td>
                      <td><?php echo $j->kode ?></td>
                      <td><?php echo $j->namabarang ?></td>
                      <td><?php echo $j->jumlah ?></td>
                      <td><?php echo $j->deskripsi ?></td>
                      <td><?php echo $j->username ?></td>
                      <td><?php echo $j->metod ?></td>
                      <td><?php echo $j->total ?></td>
                      <td><?php echo $j->desain ?></td>
                      <td><?php echo $j->statusorder ?> <a class="btn btn-primary" href="">Edit status</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
		</div>
	</div>
</div>
