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
					<img height=250px width=250px src="<?php echo base_url()?>assets/image/fotokosong.jpg"/><br />
					<a href="#generalprofile">General Profile</a><br />
					<a href="#changepassword">Change Password</a><br />
                    <a href="#daftarorder">Daftar Order</a><br />
				</div>
			</div>
			</div>
			<div class="col-md-8 mb5">
				<div class="demo-grid">
                    <a class="hiddenanchor" id="generalprofile"></a>
                    <a class="hiddenanchor" id="changepassword"></a>
                    <a class="hiddenanchor" id="changegeneral"></a>
                    <a class="hiddenanchor" id="daftarorder"></a>
                    <div id="wrapper">
                        <div id="general" class="animate form">
                            <table>
                            	<tr>
                            		<td>Username</td>
                            		<td>Contoh aja</td>
                            	</tr>
                            	<tr>
                            		<td>Nama</td>
                            		<td>Test</td>
                            	</tr>
                            	<tr>
                            		<td>Alamat</td>
                            		<td>Test</td>
                            	</tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>Test</td>
                                </tr>
                            	<tr>
                            		<td></td>
                            		<td><a class="btn btn-primary" href="#changegeneral" />Edit Profile</a></td>
                            	</tr>
                            </table>
                        </div>

                        <div id="change" class="animate form">
                            <form action="#" method="POST">
                            <table>
                            	<tr>
                            		<td>Username</td>
                            		<td><input type="text" value="" name="usern" disabled="" /></td>
                            	</tr>
                            	<tr>
                            		<td>Old Password</td>
                            		<td><input type="password" name="opassword"/></td>
                            	</tr>
                            	<tr>
                            		<td>New Password</td>
                            		<td><input type="password" name="npassword"  /></td>
                            	</tr>
                            	<tr>
                            		<td>Confirm New Password</td>
                            		<td><input type="password" name="cpassword"  /></td>
                            	</tr>
                            	<tr>
                            		<td></td>
                            		<td><input class="btn btn-primary" type="submit" name="submitchange" value="Submit" /> <a href="#generalprofile" type="button" class="btn btn-danger">Cancel</a></td>
                            	</tr>
                            </table>
                            </form>
                            
                        </div>

                        <div id="ganti" class="animate form">
                        	<form action="#" method="POST">
                            <table>
                            	<tr>
                            		<td>Username</td>
                            		<td><input type="text" value="" name="uname" disabled="" /></td>
                            	</tr>
                            	<tr>
                            		<td>Nama</td>
                            		<td><input type="text" name="nama" value="" /></td>
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
