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
              <table class="table table-striped">
                  <thead>
                    <th>no</th>
                    <th>username</th>
                    <th>Email</th>
                    <th>Action</th>
                  </thead>
                  <tbody class="produk">
                    <tr>
                      <td>1</td>
                      <td>Alda</td>
                      <td>ak@da.com</td>
                      <td><a data-toggle="modal" data-target="#myModal" class="btn btn-primary" href="">More</a> <a class="btn btn-danger" href="">Del</a></td>
                    </tr>
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
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <td>Nama</td><td>alda</td>
          </tr>
          <tr>
            <td>Email</td><td>ad@da.com</td>
          </tr>
          <tr>
            <td>Username</td><td>alllda</td>
          </tr>
          <tr>
            <td>Email</td><td>ad@da.com</td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
