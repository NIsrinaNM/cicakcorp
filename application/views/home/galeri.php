<div class="container">

<!-- Service -->
        <div class="bagian">
        <div class="container">
        <div class="row">
            <div class="col-lg-12" id="About">
                <h2 class="page-header">
                    KOLEKSI KAMI
                </h2>
            </div>
            <?php
            foreach ($jualan as $j) {
            ?>
            <span>
            <div class="col-lg-4">
                <div class="thumbnail">
                    <img src="<?php echo base_url()."$j->gambar"?>" alt="<?php echo $j->judul?>">
                    <div class="caption">
                        <p><?php echo $j->caption ?></p>
                    </div>
                </div>
            </div>
            </span>
            <?php
            }
            ?>
        </div>
        </div>
        </div>

        
</div>

<?php
$this->load->view("home/footer");
?>
