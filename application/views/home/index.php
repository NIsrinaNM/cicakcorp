
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
                <h4>CICAK CORP merupakan sebuah bla bla bla</h4>
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
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> CicakCorp</a>
                </div>
                <span class="garis"></span>
                <div class="list-kontak">
                    <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i> Cicak Corp.</a>
                </div>
                <span class="garis"></span>
                <div class="list-kontak">
                    <a href="#"><i class="fa fa-instagram" ></i> CicakCorp</a>
                </div>
                <span class="garis"></span>
                <div class="list-kontak">
                    <a href="#">+621331242342 (Daud)</a>
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
    center: new google.maps.LatLng(51.5, -0.12),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.HYBRID
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9npFBimR7tq1OO4Ibbuya8FEmlGsOYHA&callback=myMap"></script>