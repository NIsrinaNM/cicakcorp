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
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">

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
        </div>
        <!-- /.container -->
    </nav>

<!-- Formulir -->
<div id="formlogin" class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1" class="tab">Masuk</label></input>
        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Daftar</label></input>
        <input id="tab-3" type="radio" name="tab" class="reset"><label for="tab-3" class="tab">Reset Akun</label></input>
        <div class="login-form">
            <div class="sign-in-htm">
                <form method="POST", action="<?php echo site_url("Home/masukuser")?>">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input" name="usernameUser">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="passwordUser">
                </div>
                <div class="group">
                    <input id="check" type="checkbox" class="check">
                    <label for="check"><span class="icon"></span> Biarkan saya tetap masuk</label>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Masuk">
                </div>
                </form>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-3">Lupa Password?</a></label>
                    <label>||</label>
                    <label for="tab-2">Buat Akun Baru</a></label>
                </div>
            </div>
            <div class="sign-up-htm">
                <form action="<?php echo base_url()."Home/insertDaftar"?>" method="POST">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input" name="userdaftar">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="passdaftar">
                </div>
                <div class="group">
                    <label for="pass" class="label">Repeat Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="repassdaftar">
                </div>
                <div class="group">
                    <label for="pass" class="label">Nama Lengkap</label>
                    <input id="pass" type="text" class="input" name="namadaftar">
                </div>
                <div class="group">
                    <label for="pass" class="label">Email</label>
                    <input id="pass" type="email" class="input" name="emaildaftar">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Daftar">
                </div>
                </form>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">Sudah Punya Akun?</a>
                </div>
            </div>
            <div class="reset-htm">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Email</label>
                    <input id="pass" type="email" class="input">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Reset Password">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">Masuk</a></label>
                    <label>||</label>
                    <label for="tab-2">Buat Akun Baru</a></label>
                </div>
            </div>
        </div>
    </div>
</div>