<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
<div class="bagian-str">
    <h3>CICAK CORP STORE</h3>
    <span class="garis" style="width: 100%; height: 3px; background-color: white"></span>
</div>
		<div class="isi-shop">
        <div class="container" style="margin-top: 15px">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
			<div class="col-md-3 mb5" style="margin-bottom: 20px;">
				<div class="bagian-cari">
				    <div class="title">
                        <h4>Category</h4>
                    </div>
                    <ul>
                        <li><a href="<?php echo base_url()."Home/category/"?>">ALL CATEGORY</a><span class=""></span></li>
                    <?php foreach ($data as $d) { ?>
                        <li><a href="<?php echo base_url()."Home/detilcategory/".$d->nama ?>"><?php echo $d->nama ?></a><span class=""></span></li>
                    <?php } ?>
                    </ul>
				</div>		
			</div>
			<div class="col-md-9">
            <div class="demo-grid row" style="margin-bottom: 40px;border:none;">
            <div class="form-group bagian-cari" data-spy="affix" data-offset-top="197">
                <form>
                    <input type="text" name="cari" class="form-control" placeholder="cari barang yang kamu inginkan disini">
                    <button type="submit" class="btn btn-src"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
                <?php foreach ($jualan as $j) { ?>
                <div class="col-sm-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="thumbnail" style="margin: 0">
                            <div class="gambar" style="background-image: url('<?php echo base_url()."$j->thumbnail" ?>');"></div>
                            <h4></h4>
                            <div class="caption">
                                <h5><a href="<?php echo base_url()."Home/barang/".$j->id?>"><?php echo substr($j->judul, 0,20) ?></a></h5>
                                <p><span class="blue">IDR <?php echo $j->harga ?></span> <span class="border"><?php echo $j->kategori ?></span></p>
                            </div>
                        </div>
                        <div class="klik">
                        <a href="<?php echo base_url()."Home/barang/".$j->id?>" class="btn btn-cck">
                            More</a>
                        </div>
                    </div>
                </div>
                <?php } ?>  	
			</div>
            </div>
        	</div>
        	</div>
        </div>
        </div>