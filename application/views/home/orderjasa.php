<?php $this->load->view("home/navigasilogin")?>
<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
		<div class="container">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
    		<h1>Custom Order</h1>
			<div class="col-md-2 mb5">		
			</div>
			<div class="col-md-8 mb5">		
			<div class="demo-grid">
				<div id="konf">
				<form action="<?php echo base_url()."Order/insertCustomOrder"?>" method="POST" enctype="multipart/form-data">
                            <table style="font-size: 12px" width="100%">
                                <tr>
                                    <td style="padding: 5px">Kode Booking</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="kodebooking" value="<?php echo $kode?>" readonly/></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Nama Barang</td>
                                    <td style="padding: 5px">
                                    <select class='form-control' id='barang' name='brg' required>
                                        <option value='0'>-- Pilih Barang --</option>
                                    <?php 
                                        foreach ($jasa as $j) {
                                            echo "<option value='$j[id]'>$j[name]</option>";
                                        }
                                    ?>
                                    </select></td>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Jenis Barang</td>
                                    <td style="padding: 5px"><select class='form-control' id='jenisjasa' name='jnjs' required>
                                        <option value='0'>-- Pilih Jenis Barang --</option>
                                    </select></td>
                                <tr>
                                    <td style="padding: 5px">Jumlah Barang</td>
                                    <td style="padding: 5px"><input class="form-control" type="number" min="1" max="1000" name="jumlahbarang" placeholder="misalnya: 100" required/></td>
                                </tr>
                                <tr style="padding: 5px">
                                    <td style="padding: 5px">Deskripsi</td>
                                    <td style="padding: 5px"><textarea rows="5" cols="80" class="form-control" name="deskripsi" placeholder="Deskripsikan barang yang anda inginkan, misalnya: Blocknote lem di sisi samping" required/></textarea></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Desain (*cdr)</td>
                                    <td style="padding: 5px"><input class="form-control" type="file" name="desain" required ></td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px">Nama Penerima</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="namapenerima" value="<?php echo $nama?>" required/></td>
                                </tr>
                                <tr style="padding: 5px">
                                    <td style="padding: 5px">Alamat</td>
                                    <td style="padding: 5px"><input type="text" class="form-control" name="alamat" value="<?php echo $alamat.', '.$kec.', '.$kotkab.', '.$prop.' - '.$kodepos?>" required/></textarea></td>
                                </tr>
                                <tr style="padding: 5px">
                                    <td style="padding: 5px">Nomor Telepon</td>
                                    <td style="padding: 5px"><input class="form-control" type="text" name="notelp" value="<?php echo $notelp?>" required/></textarea></td>
                                </tr>
                                <tr style="padding: 5px; align: center">
                                	<td colspan="2" style="padding: 5px; text-align: center"><input class="btn btn-primary" type="submit" name="submit" value="Pesan Sekarang" /> </td>
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
<br>
<?php $this->load->view("home/footer")?>

<script type="text/javascript">
$(function(){
    $.ajaxSetup({
        type:"POST",
        url: "<?php echo base_url()?>Home/ambil_data",
        cache: false,
    });

$("#barang").change(function(){
    var value=$(this).val();
    if(value>0){
        $.ajax({
            data:{modul:'jenisjasa',id:value},
            success: function(respond){
            $("#jenisjasa").html(respond);
            }
        })
    }
})

$("#jenisjasa").change(function(){
                                
});
});
</script>