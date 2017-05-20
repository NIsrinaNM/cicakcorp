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
              <table id="table" class="table table-striped">
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
                      <td><?php echo 'Rp'.number_format($o->subtotal,2) ?></td>
                     <form method="POST" action="<?php echo base_url()."admin/Pemesanan/updateStatus1/"."$o->kode_order"?>">
                      <td>
                        <select class="input-group" name="status">
                          <option <?php if('Belum Dibayar' == $o->status_bayar){ echo 'selected="selected"'; } ?> value="Belum Dibayar">Belum Dibayar</option>
                          <option <?php if('Sudah Dibayar' == $o->status_bayar){ echo 'selected="selected"'; } ?> value="Sudah Dibayar">Sudah Dibayar</option>
                          <option <?php if('Packing' == $o->status_bayar){ echo 'selected="selected"'; } ?> value="Sedang Dikerjakan">Packing</option>
                          <option <?php if('Telah Dikirim' == $o->status_bayar){ echo 'selected="selected"'; } ?> value="Selesai Dikerjakan">Telah Dikirim</option>
                          <option <?php if('Sudah Diterima' == $o->status_bayar){ echo 'selected="selected"'; } ?> value="Telah Dikirim">Sudah Diterima</option>
                          <option <?php if('Order Selesai' == $o->status_bayar){ echo ' selected="selected"'; } ?> value="Order Selesai">Order Selesai</option>
                        </select>
                        <input style="width: auto" class="btn btn-primary" type="submit" name="submit" value="Ubah Status">
                        </td>
                      </form>
                      <td><a data-toggle="modal" data-target="#detilorder" class="btn btn-primary" href="#" onclick="barang_more('<?php echo $o->id?>')" >More</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
		</div>
	</div>
</div>

<!-- Modal Edit SLIDER -->
<div id="detilorder" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detil Order</h4>
      </div>
      <div class="modal-body">
        <div id="ket_atas">

        </div>
        <div>
            <table class="table">
                    <thead>
                        <tr>
                        <th>Kuantitas</th>
                        <th>Barang</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody  id="ket_barang">
                        
                    </tbody>
                    <tr> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Subtotal</th>
                            <td id="foot_order2"></td>
                        </tr>
                        <tr> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Ongkir</th>
                            <td id="foot_order1"></td>
                        </tr>
                        <tr> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Total</th>
                            <td id="foot_order"></td>
                        </tr>
            </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>