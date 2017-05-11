 <style type="text/css">
     header.carouseledit{
        height: 70vh;
     }
     .navigate{
        display: inline-block;
        margin: 10px;
        position: absolute;
        top: 27vh;
     }
     .navigate span{
        font-size: 40px;
        color: white;
     }
     .right{
        right: 0;
     }
     .left{
        left: 0;
     }
 </style>
 <!-- Header Carousel -->
    <header id="myCarousel" class="carouseledit carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
            <div class="carousel-inner">
            <?php
            if (empty($slider)) {?>
                <div class="item active">
                <div class="fill" style="background-image:url('');"></div>
                <div class="carousel-caption">
                    <h2>Belum ada data yang diinputkan</h2>
                </div>
                </div>
            <?php }else{
                $first = true;
             foreach ($slider as $s) {
            ?>
            
            <div class="item <?php echo $first? ' active':''; ?>">
                <div class="fill" style="background-image:url('<?php echo base_url().$s->gambar?>');"></div>
                <div class="carousel-caption">
                    <h2><?php echo $s->caption; ?></h2>
                </div>
            </div>
            <?php
            $first = false; }}?>
        </div>
        <!-- Controls -->
        <a class="navigate left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="navigate right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </header>