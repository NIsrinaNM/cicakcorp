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
    	<h2>Pemesanan</h2>
    </div>
    	<div class="row mb40">        
              <table class="table table-striped">
                  <thead>
                    <th>no</th>
                    <th>Pemesan</th>
                    <th>Jenis</th>
                    <th>Status</th>
                  </thead>
                  <tbody class="produk">
                    <td>1</td>
                    <td>Blocknote</td>
                    <td>Pre order</td>
                    <td>Dikerjakan <a class="btn btn-primary" href="">Edit status</a></td>
                  </tbody>
              </table>
		</div>
	</div>
</div>
