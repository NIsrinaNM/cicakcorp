        <div style="position:absolute;top:30px; margin:0 auto; width:70%">
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
                                }elseif($this->session->flashdata('verif')){
                                echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> '.$this->session->flashdata('verif').'.
</div>';
                                } ?>
        </div>

        <!-- About -->
        <div class="bagian">
        <div class="container">
        <div class="row">
            <div class="col-lg-12" id="About">
                <h2 class="page-header">
                    ABOUT
                </h2>
            </div>
            <div class="bagian-about col-md-6">
                <img src="<?php echo base_url()?>assets/image/icon.png">
            </div>
            <div class="col-md-6">
                <h4>CICAK CORP merupakan salah satu unit usaha Koperasi Mahasiswa Dr. Angka ITS yang menjual kaos dan jaket keren ITS. Selain itu juga menerima jasa konveksi, pembuatan sticker, blocknote, seminar kit, vendel, dan baju standar pelatihan ITS.
                    Cicak Corp berkantor di Sekretariat Kopma ITS, Gedung SCC lantai 1 Kampus ITS Sukolilo Surabaya</h4>
            </div>
        </div>
        </div>
        </div>

        <!-- Service -->
        <div class="bagian" id="Service">
        <div class="container">
        <div class="row">
        	 <div class="col-lg-12" id="About">
                <h2 class="page-header">
                   LAYANAN
                </h2>
            </div>
        	<div class="col-sm-6 col-md-6">
        		<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Ready Stock Order</h4>
                    </div>
        		<div class="thumbnail">
        			<div class="icon-lay"><span class="glyphicon glyphicon-shopping-cart"></span></div>
        			<div class="caption">
        				<p>Melayani Penujualan Marchandise khas Arek ITS, seperti kaos ITS, topi ITS, jaket ITS, gantungan kunci ITS, dll</p>
        				<p><a href="<?php echo base_url()."Home/category"?>" class="btn btn-cck" role="button">Lihat Sekarang</a></p>
        			</div>
        		</div>
        		</div>
        	</div>
        	<div class="col-sm-6 col-md-6">
        		<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Custom Order</h4>
                    </div>
        		<div class="thumbnail">
                    <div class="icon-lay"><span class="glyphicon glyphicon-calendar"></span></div>
                    <div class="caption">
                        <p>Melayani pembuatan pin, blocknote, konveksi, stiker, vendel, dan beberapa barang lainnya</p>
                        <p><a href="<?php echo base_url()."Home/customorder"?>" class="btn btn-cck" role="button">Pesan Sekarang</a></p>
                    </div>
                </div>
        		</div>
        	</div>
        </div>
        </div>
        </div>

        <!-- Kontak-->
        <div class="bagian" id="Contact">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"></h2>
            </div>
            <div class="col-md-4" style="padding-bottom: 20px">
                <h4>Kontak</h4>

                <div class="list-kontak">
                    <a href="#"><i class="fa fa-google"></i> Cicakcorp@gmail.com</a>
                </div>
                <span class="garis"></span>
                <div class="list-kontak">
                    <a href="#"><img height=15px width=15px src="http://sirivalai.com/images/social/line-messenger.svg"></img> @clg8524r</a>
                </div>
                <span class="garis"></span>
                <div class="list-kontak">
                    <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i> Cicak Corp.</a>
                </div>
                <span class="garis"></span>
                <div class="list-kontak">
                    <a href="#"><i class="fa fa-instagram" ></i> cicakCorp</a>
                </div>
                <span class="garis"></span>
                <div class="list-kontak">
                    <a href="#">081553030529 / tegar_putra20 (Tegar)</a>
                </div>
                <div class="list-kontak">
                    <a href="#">089692778300 / arsythemia (Mia)</a>
                </div>
                <span class="garis"></span>
            </div>
            <div class="col-md-4" style="padding-bottom: 20px">
                <h4>Yang Kami Tawarkan</h4>

                <div class="list-kontak">
                    <h5><a href="<?php echo base_url()."Home/category"?>">Ready Stock Order</a></h5>
                </div>
                <span class="garis"></span>
                <div class="list-kontak">
                    <h5><a href="<?php echo base_url()."Home/customorder"?>">Custom Order</a></h5>
                </div>
                <span class="garis"></span>
                <br><br>
                <h4>Kantor Kami</h4>

                <div class="list-kontak">
                    <h5><a href="#">Sekretariat Koperasi Mahasiswa Dr. Angka ITS, Gedung SCC ITS lantai 1, Kampus ITS Sukolilo Surabaya 60111</a></h5>
                </div>
                <span class="garis"></span>
            </div>
            <div class="col-md-4">
            <h5 style="color: white">MAPS</h5>
                <div id="map" style="width:300px;height:300px;background:yellow"></div>
            </div>
        </div>
        </div>
        </div>
        <!-- /.row -->

<?php
$this->load->view("home/footer");
?>
<script>
function myMap() {
var mapOptions = {
    center: new google.maps.LatLng(-7.283188, 112.793445),
    zoom: 17,
    mapTypeId: google.maps.MapTypeId.HYBRID
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9npFBimR7tq1OO4Ibbuya8FEmlGsOYHA&callback=myMap"></script>