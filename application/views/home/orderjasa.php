<?php $this->load->view("home/navigasilogin")?>
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
		<div class="container">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
    		<h1>Custom Order</h1>
			<div class="col-md-4 mb5">		
			</div>
			<div class="col-md-4 mb5">		
			<div class="demo-grid">
				<div id="konf">
				<form action="#" method="POST" enctype="multipart/form-data">
                            <table style="font-size: 12px" width="100%">
                                <tr>
                                    <td style="padding: 5px">Jenis Barang</td>
                                    <td style="padding: 5px"><input class="input-group" type="text" name="jenisbarang" placeholder="misalnya: PIN, Blocknote, Kaos" required/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Ukuran</td>
                                    <td style="padding: 5px"><input class="input-group" type="number" min="1" max="1000" name="ukuranbarang" placeholder="misalnya: 20x13, 8cm, L" required/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Jumlah Barang</td>
                                    <td style="padding: 5px"><input class="input-group" type="number" min="1" max="1000" name="jumlahbarang" placeholder="misalnya: 100" required/></td>
                                </tr>
                                <tr style="padding: 5px">
                                    <td style="padding: 5px">Deskripsi</td>
                                    <td style="padding: 5px"><textarea rows="5" cols="35" class="input-group" name="deskripsi" placeholder="misalnya: Blocknote memakai spiral" required/></textarea></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Desain (*cdr)</td>
                                    <td style="padding: 5px"><input type="file" name="buktibayar" required ></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Nama penerima</td>
                                    <td style="padding: 5px"><input class="input-group" type="text" name="jumlahbarang" placeholder="misalnya: Burhan Med" required/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Alamat Penerima</td>
                                    <td style="padding: 5px"><textarea rows="5" cols="35" class="input-group" name="deskripsi" placeholder="misalnya: Jalan Kertajaya Surabaya" required/></textarea></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Nomor Telepon Penerima</td>
                                    <td style="padding: 5px"><input class="input-group" type="text" name="jumlahbarang" placeholder="misalnya: 081234567" required/></td>
                                </tr>
                                 <tr style="padding: 5px">
                                    <td style="padding: 5px">Pilihan Pengiriman</td>
                                    <td style="padding: 5px">
                                    	<select name="bank" required>
											<option value="COD">COD</option>
											<option value="Pos">POS Indonesia</option>
											<option value="JNE">JNE</option>
										</select>
                                    </td>
                                </tr>
                                <tr style="padding: 5px">
                                	<td></td>
                                    <td style="padding: 5px" colspan="2"><input type="submit" name="submit" value="Pesan Sekarang" /></td>
                                </tr>
                            </table>
                </form>
                </div>
			</div>
			</div>
			</div>
		    </div>
			</div>
        </div>
    <div>

<?php $this->load->view("home/footer")?>