<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cicak Corps.</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <form action="#" method="POST">
                            <table style="font-size: 12px">
                                <tr>
                                    <td style="padding: 5px">Username</td>
                                    <td style="padding: 5px"><input type="text" name="username" required/></td>
                                </tr>
                                <tr style="padding: 5px">
                                    <td style="padding: 5px">Password</td>
                                    <td style="padding: 5px"><input type="password" name="username" required/></td>
                                </tr>
                                <tr style="padding: 5px">
                                    <td style="padding: 5px"></td>
                                    <td style="padding: 5px"><input type="button" name="submit" value="Login" /></td>
                                </tr>
                                <tr style="padding: 5px">
                                    <td style="font-size: 10px; padding: 5px"><a href="#">Lupa Password</a></td>
                                    <td style="font-size: 10px; padding: 5px"><a href="<?php echo base_url()?>index.php/home/signup">Belum Punya Akun? Mendaftar Sekarang</a></td>
                                </tr>
                            </table>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>