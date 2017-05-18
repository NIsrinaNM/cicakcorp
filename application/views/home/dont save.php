                            <table class="table" id="" width="95%" style="border: 1px solid black">
                                <tr style="border: 1px solid black">
                                    <th style="border: 1px solid black">Kode Order</th>
                                    <th style="border: 1px solid black">Tanggal</th>
                                    <th style="border: 1px solid black">Jenis barang</th>
                                    <th style="border: 1px solid black">Jumlah</th>
                                    <th style="border: 1px solid black">Total Harga</th>
                                    <th style="border: 1px solid black">Status</th>
                                    <th style="border: 1px solid black">Action</th>
                                </tr>
                                <?php foreach ($order as $o) { ?>
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black"><?php echo $o->kode ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->tanggal ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->namabarang ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->jumlah ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->total ?></td>
                                    <td style="border: 1px solid black"><?php echo $o->statusorder ?></td>
                                    <td style="border: 1px solid black"><a href="<?php echo base_url()."Home/confirm/"."$o->kode"?>">Konfirmasi Pembayaran</a></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($order1 as $o1) { ?>
                                <tr style="border: 1px solid black">
                                    <td style="border: 1px solid black"><?php echo $o1->kode_order ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->date ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->kode ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->kuantitas ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->subtotal ?></td>
                                    <td style="border: 1px solid black"><?php echo $o1->status_bayar ?></td>
                                    <td style="border: 1px solid black"><a href="<?php echo base_url()."Home/confirm/"."$o1->kode_order"?>">Konfirmasi Pembayaran</a></td>
                                </tr>
                                <?php } ?>
                            </table>




                <div class="demo-grid form-over">
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
                    <div class="row">
                        <div id="general" class=" form">
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

                        <div id="change" class=" form" style="display: none;">
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
                                    <td><input class="btn btn-primary" type="submit" name="submitchange" value="Submit" /> <a href="#generalprofile" type="button" class="btn btn-danger">Cancel</a></td>
                                </tr>
                            </table>
                            </form>
                            
                        </div>

                        <div id="ganti" class=" form" style="display: none;">
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
                                    <td><input class="btn btn-primary" type="submit" name="submitedit" value="Submit Edit" /> <a href="#generalprofile" type="button" class="btn btn-danger">Cancel</a></td>
                                </tr>
                            </table>
                            </form>
                        </div>

                        <div id="order" class=" form" style="display: none;">
                            <h2 style="text-align: center">Riwayat Order</h2>
                        <div style="margin: 20px;">
                            <h4>Custom Order</h4>
                        </div>
                        <div class="table-responsive">
                          <table class="table" id="">
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
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>                            