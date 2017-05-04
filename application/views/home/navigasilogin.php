<?php $this->load->view("home/header")?>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">Cicak Corps.</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url() ?>#About">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>#Service">Layanan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>#Contact">Kontak</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url("home/galeri")?>">Galeri</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nama User<b class="caret" id="loginuser"></b></a>
                        <ul class="dropdown-menu drp-mnu">
                            <li> <a href="<?php echo site_url("home/profiluser") ?>"><i class="fa fa-user"></i> My Profile</a> </li> 
                            <li> <a href="<?php echo site_url("home/shoppingcart") ?>"><i class="fa fa-shopping-cart"></i> Shopping Cart</a> </li> 
                            <li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>