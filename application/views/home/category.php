<link href="<?php echo base_url()?>assets/css/profileuser.css" rel="stylesheet" type="text/css" media="all">
		<div class="container" style="margin-top: 15px">
			<div class="row mb40">
    		<div class="chute chute-center text-center">
			<div class="col-md-3 mb5">
				<div class="demo-grid">
					<h3>Category</h3>
                    <table style="text-align:left;">
                    <?php foreach ($data as $d) { ?>
                        <tr>
                            <td><a href="<?php echo base_url()."Home/detilcategory/".$d->nama ?>"><?php echo $d->nama ?> </a></td>
                        </tr>
                    <?php } ?>
                    </table>
				</div>		
			</div>
			<div class="col-md-9 mb5">
                <?php foreach ($jualan as $j) { ?>
                <div class="col-sm-4 col-md-4">
                    <div class="demo-grid">
                    <div class="panel panel-default">
                        <div class="thumbnail">
                            <img src="<?php echo base_url()."$j->thumbnail" ?>" alt="...">
                            <h4></h4>
                            <div class="caption">
                                <h4><?php echo $j->judul ?></h4>
                                <p><?php echo $j->harga ?></p>
                                <p><a href="#" class="btn btn-primary" role="button">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <?php } ?>  	
			</div>
        	</div>
        	</div>
        </div>