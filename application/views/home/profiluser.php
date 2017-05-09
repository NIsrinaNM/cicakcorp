<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo base_url()?>assets/css/animate-custom.css" rel="stylesheet" type="text/css" media="all">
<div class="container">
<div class="inner-block">
    <div class="cols-grids panel-widget">
    <div class="chute chute-center text-center">
    	<h2>My Profile</h2>
    </div>
    	<div class="row mb40">
    		<div class="chute chute-center text-center">
    		<div class="col-md-4 mb5">
				<div class="demo-grid">
					<img height=250px width=250px src="<?php echo base_url()?>assets/image/<?php echo $foto?>"/><br />
					<a href="#generalprofile">General Profile</a><br />
					<a href="#changepassword">Change Password</a><br />
                    <a href="#daftarorder">Daftar Order</a><br />
				</div>
			</div>
			</div>
			<div class="col-md-8 mb5">
				<div class="demo-grid">
                    <?php
                    if ($this->session->flashdata('error')) {
                        echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Oops!</strong> '.$this->session->flashdata('error').'
</div>';
                    } elseif($this->session->flashdata('success')){
                        echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> '.$this->session->flashdata('success').'.
</div>';
                    } ?>
                    <a class="hiddenanchor" id="generalprofile"></a>
                    <a class="hiddenanchor" id="changepassword"></a>
                    <a class="hiddenanchor" id="changegeneral"></a>
                    <a class="hiddenanchor" id="daftarorder"></a>
                    <div id="wrapper">
                        <div id="general" class="animate form">
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
                            		<td><a class="btn btn-primary" href="#changegeneral" />Edit Profile</a></td>
                            	</tr>
                            </table>
                        </div>

                        <div id="change" class="animate form">
                            <form action="<?php echo base_url()?>Home_Dashboard/chgpass/<?php echo $username;?>" method="POST">
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
                            		<td><input class="btn btn-primary" type="submit" name="submitchange" value="Submit" /> <a href="#generalprofile" type="button" class="btn btn-danger">Cancel</a></td>
                            	</tr>
                            </table>
                            </form>
                            
                        </div>

                        <div id="ganti" class="animate form">
                        	<form action="<?php echo base_url() ?>Home_Dashboard/chgProfile" method="POST" enctype="multipart/form-data">
                            <table>
                            	<tr>
                            		<td>Username</td>
                            		<td><input class="input-group" type="text" value="<?php echo $username; ?>" name="uname" disabled /></td>
                            	</tr>
                            	<tr>
                            		<td>Nama</td>
                            		<td><input class="input-group" type="text" name="nama" /></td>
                            	</tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input class="input-group" type="email" name="email" /></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input class="input-group" type="text" name="alamat" placeholder="Isi nama Jalan" /></td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td><select class='input-group' id='provinsi' name='prop'>
                                        <option value='0'>-- Pilih Propinsi --</option>
                                    <?php 
                                        foreach ($provinsi as $prov) {
                                            echo "<option value='$prov[id]'>$prov[name]</option>";
                                        }
                                    ?>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td><select class='input-group' id='kabupaten-kota' name='kotkab'>
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
                                    <td><input class="input-group" type="text" name="kodepos" /></td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td><input class="input-group" type="text" name="notelp" /></td>
                                </tr>
                                <tr>
                                    <td>Foto Profil</td>
                                    <td><input class="input-group" type="file" name="image" /></td>
                                </tr>
                            	<tr>
                            		<td></td>
                            		<td><input class="btn btn-primary" type="submit" name="submitedit" value="Submit Edit" /> <a href="#generalprofile" type="button" class="btn btn-danger">Cancel</a></td>
                            	</tr>
                            </table>
                            </form>
                        </div>

                        <div id="order" class="animate form">
                            <h2 style="text-align: center">Daftar Order</h2>
                            <table width="95%" style="border: 1px solid black">
                                <tr style="border: 1px solid black">
                                    <th style="border: 1px solid black">Kode Order</th>
                                    <th style="border: 1px solid black">Nama Penerima</th>
                                    <th style="border: 1px solid black">Jenis Order</th>
                                    <th style="border: 1px solid black">Jenis barang</th>
                                    <th style="border: 1px solid black">Status</th>
                                    <th style="border: 1px solid black">Action</th>
                                </tr>
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black">1002</td>
                                    <td style="border: 1px solid black">Burhan Med</td>
                                    <td style="border: 1px solid black">Jasa</td>
                                    <td style="border: 1px solid black">PIN 8cm</td>
                                    <td style="border: 1px solid black">Belum Dikonfirmasi</td>
                                    <td style="border: 1px solid black">Konfirmasi Pembayaran</td>
                                </tr>
                            </table>
                        </div>

                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('home/footer'); ?>
                        <script type="text/javascript">
                        $(function(){
                            $.ajaxSetup({
                                type:"POST",
                                url: "<?php echo base_url()?>Home_Dashboard/ambil_data",
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
