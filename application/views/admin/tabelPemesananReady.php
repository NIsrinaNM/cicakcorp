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
              <table class="table table-striped" id="table">
                  <thead>
                    <th>Tanggal</th>
                    <th>Kode</th>
                    <th>Pemesan</th>
                    <th>Harga</th>
                    <th>Status</th>
                  </thead>
                  <tbody class="produk">
                    <?php foreach ($order as $o) { ?>
                    <tr>
                      <td><?php echo $o->date ?></td>
                      <td><?php echo $o->kode_order ?></td>
                      <td><?php echo $o->customer ?></td>
                      <td><?php echo $o->subtotal ?></td>
                      <td><?php echo $o->status_bayar ?></td>
                      <td><a data-toggle="modal" data-target="#myModal" class="btn btn-primary" href="#" onclick="barang_more('<?php echo $o->id?>')" >More</a></td>
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
      <div class="modal-body" id="modalorder">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
