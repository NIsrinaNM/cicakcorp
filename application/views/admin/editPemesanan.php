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
    	<h2>Edit</h2>
    </div>
    	<div class="row mb40">        
             <form>
              <table class="table">
                <tr>
                  <td>Nama </td>
                  <td>john doe</td>
                </tr>
                <tr>
                  <td>Jenis</td>
                  <td>Blocknote</td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><select class="form-control">
                    <option value="menunggu">Menunggu</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                  </select></td>
                </tr>
              </table>
              <div>
                <a class="btn btn-danger" href="<?php echo base_url()?>admin/Pemesanan">Cancel</a>
               
                  <input class="btn btn-primary" style="width: auto;" type="submit" value="Ubah" name="">
              </div>
             </form>  
		</div>
	</div>
</div>