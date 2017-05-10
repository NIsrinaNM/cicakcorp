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
    	<h2>Users</h2>
    </div>
    	<div class="row mb40">        
              <table class="table table-striped" id="table">
                  <thead>
                    <th>no</th>
                    <th>username</th>
                    <th>Email</th>
                    <th>Action</th>
                  </thead>
                  <tbody class="produk">

                  <?php 
                  // var_dump($user);
                  if (!empty($user)) {
                foreach ($user as $s) {
                ?>
              <tr>
                    <td>1</td>
                    <td id="username_v"><?php echo $s['username'] ?></td>
                    <td><?php echo $s['email'] ?></td>
                    <td><a data-toggle="modal" data-target="#myModal" class="btn btn-primary" href="#" onclick="more_info('<?php echo $s['username'] ?>')" >More</a> <a class="btn btn-danger" href="<?php echo base_url()?>admin/User/hapus/<?php echo $s['username'] ?>" onclick="javascript:confirmationDelete($(this));return false;">Del</a></td>
                </tr>
                <?php
            }}else{
                // var_dump($slider);
           
             echo   "Tidak ada data.";
              
                 } ?>

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
        <h4 class="modal-title">Deatil <span id="nama_v1"></span></h4>
      </div>
      <div class="modal-body">
        <table class="table">
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

<script type="text/javascript">
  function confirmationDelete(anchor){
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
  }
</script>