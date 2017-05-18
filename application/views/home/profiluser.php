<script type="text/javascript">
    var BASE_URL = '<?= base_url()?>';
</script>
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url()?>assets/css/animate-custom.css" rel="stylesheet" type="text/css" media="all">
<div class="isi-pro">
<div class="container">
<div class="inner-block">
    <div class="cols-grids panel-widget">
    <div class="chute chute-center text-center">
    	<h2>My Profile</h2>
    </div>
    	<div class="row mb40" style="margin-bottom: 20px;">
    		<div class="chute chute-center text-center">
    		<div class="col-md-4 mb5">
				<div class="demo-grid">
					<img height=250px width=250px src="<?php echo base_url()."$foto"?>"/><br />
					<a id="gp" href="#">General Profile</a><br />
					<a id="cp" href="#">Change Password</a><br />
                    <a id="do" href="#">Daftar Order</a><br />
				</div>
			</div>
			</div>
			<div class="col-md-8 mb5">
                <div class="demo-grid form-over">
                    <div class="wrapper">
                        <div id="gen" class=" form">
                            <table>
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo $username; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><?php echo $nama; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $alamat; ?><br>
                                        <?php echo $kec; ?> - <?php echo $kotkab; ?><br>
                                        <?php echo $prop; ?>  <?php echo $kodepos; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td><?php echo $notelp; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><a class="btn btn-primary" id="cpro" href="#" />Edit Profile</a></td>
                                </tr>
                            </table>
                        </div> <!-- general  -->

                        <div id="ch" class=" form" style="display: none;">
                            <form action="<?php echo base_url()?>Home_dashboard/chgpass/<?php echo $username;?>" method="POST">
                            <table>
                                <tr>
                                    <td>Username</td>
                                    <td><input class="input-group" type="text" value="<?php echo $username; ?>" name="usern" disabled /></td>
                                </tr>
                                <tr>
                                    <td>Old Password</td>
                                    <td><input class="input-group" type="password" name="opassword"/></td>
                                </tr>
                                <tr>
                                    <td>New Password</td>
                                    <td><input class="input-group" type="password" name="npassword"  /></td>
                                </tr>
                                <tr>
                                    <td>Confirm New Password</td>
                                    <td><input class="input-group" type="password" name="cpassword"  /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="btn btn-primary" type="submit" name="submitchange" value="Submit" /> <a id="gp1" href="#" type="button" class="btn btn-danger">Cancel</a></td>
                                </tr>
                            </table>
                            </form>
                        </div> <!-- change -->

                        <div id="gan" class=" form" style="display: none;">
                            <form action="<?php echo base_url() ?>Home_dashboard/chgProfile" method="POST" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Username</td>
                                    <td><input class="input-group" type="text" value="<?php echo $username; ?>" name="uname" disabled /></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input class="input-group" value="<?php echo $nama?>" type="text" name="nama" required/></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input class="input-group" value="<?php echo $email?>" type="email" name="email" required/></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input class="input-group" value="<?php echo $alamat?>" type="text" name="alamat" placeholder="Isi nama Jalan" required/></td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td><select class='input-group' id='provinsi' name='prop' required>
                                        <option value='0'>-- Pilih Propinsi --</option>
                                    <?php 
                                        foreach ($provinsi as $prov) {
                                            echo "<option value='".$prov[id]."'>".$prov[name]."</option>";
                                        }
                                    ?>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td><select class='input-group' id='kabupaten-kota' name='kotkab' required>
                                        <option value='0'>-- Pilih Kota --</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td><select class='input-group' id='kecamatan' name='kec'>
                                        <option value='0'>-- Pilih Kecamatan --</option>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Kode Pos</td>
                                    <td><input class="input-group" value="<?php echo $kodepos?>" type="text" name="kodepos" required/></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td><input class="input-group" value="<?php echo $notelp?>" type="text" name="notelp" required/></td>
                                </tr>
                                <tr>
                                    <td>Foto Profil</td>
                                    <td><input class="input-group" type="file" name="image" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="btn btn-primary" type="submit" name="submitedit" value="Submit Edit" /> <a id="gp1" href="#" type="button" class="btn btn-danger">Cancel</a></td>
                                </tr>
                            </table>
                            </form>
                        </div> <!-- ganti -->

                     <div id="or" class=" form" style="display: none;">
                            <h2 style="text-align: center">Riwayat Order</h2>
                        <div style="margin: 20px;">
                            <h4>Ready Stok Order</h4>
                        </div>
                        <div class="table-responsive">
                          <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Total Pembayaran</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=0; foreach ($order1 as $o1) { $i++;?>
                                <tr >
                                    <td><?= $i;?></td>
                                    <td><a  data-toggle="modal" data-target="#detilorder" href="#" onclick="detil_order('<?= $o1->id ?>')"><?php echo $o1->kode_order ?></a></td>
                                    <td><?php echo $o1->date ?></td>
                                    <td><?php echo ($o1->subtotal)+($o1->biaya) ?></td>
                                    <td><?php echo $o1->status_bayar ?></td>
                                    <td><a href="<?php echo base_url()."Home/confirm/"."$o1->kode_order"?>">Konfirmasi Pembayaran</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                          </table>
                        </div> 

                         <div style="margin: 20px;">
                            <h4>Custom Order</h4>
                        </div>
                        <div class="table-responsive">
                          <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Order</th>
                                    <th>Tanggal</th>
                                    <th>Jenis barang</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i=0; foreach ($order as $o) { $i++;?>
                                <tr >
                                    <td><?= $i;?></td>
                                    <td><?php echo $o->kode ?></td>
                                    <td><?php echo $o->tanggal ?></td>
                                    <td><?php echo $o->namabarang ?></td>
                                    <td><?php echo $o->jumlah ?></td>
                                    <td><?php echo $o->total ?></td>
                                    <td><?php echo $o->statusorder ?></td>
                                    <td><a href="<?php echo base_url()."Home/confirm/"."$o->kode"?>">Konfirmasi Pembayaran</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                          </table>
                        </div> 
                        </div> <!-- order -->


                    </div>
                </div>
            </div>
    </div>
</div>

<?php $this->load->view('home/footer'); ?>

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
            <table>
                <tr>
                    <td>Kode</td>
                    <td>kodenya</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>kodenya</td>
                </tr>
                <tr>
                    <td>Alamat Pengiriman</td>
                    <td>kodenya</td>
                </tr>
                <tr>
                    <td>Metode</td>
                    <td>kodenya</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>kodenya</td>
                </tr>
            </table>
        </div>
        <div id="ket_barang">
            
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript" src="<?= base_url()?>assets/js/user.js"></script>

<script type="text/javascript">
     $(document).ready(function(){
        $('#table').DataTable();
        $('#table1').DataTable();
    });
</script>

                        <script type="text/javascript">
                        $(function(){
                            $.ajaxSetup({
                                type:"POST",
                                url: "<?php echo base_url()?>Home_dashboard/ambil_data",
                                cache: false,
                            });

                            $("#provinsi").change(function(){
                                var value=$(this).val();
                                if(value>0){
                                    $.ajax({
                                        data:{modul:'kabupaten',id:value},
                                        success: function(respond){
                                            $("#kabupaten-kota").html(respond);
                                        }
                                    })
                                }
                            })

                            $("#kabupaten-kota").change(function(){
                                var value=$(this).val();
                                if(value>0){
                                    $.ajax({
                                        data:{modul:'kecamatan',id:value},
                                        success: function(respond){
                                            $("#kecamatan").html(respond);
                                        }
                                    })
                                }
                            })

                            $("#kecamatan").change(function(){

                            });
                        });
                        </script>
