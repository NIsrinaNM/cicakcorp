<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>cPanel Cicak</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/adminStyle.css" />
</head>
<body>
<div class="container">
  <!-- ganti pake javascript ae ngko -->
  <?php if (isset($error)) {
    echo '<div class="alert alert-danger waduh">
  <strong>Waduh!</strong> '.$error.'
</div>';
  } ?>
  <section id="content">
    <form action="<?php echo site_url('admin/Auth/masukadmin')?>" method="POST">
      <h1>Login Admin</h1>
      <div>
        <input type="text" placeholder="Username" required="" name="usernameAdmin" id="username"/>
      </div>
      <div>
        <input type="password" placeholder="Password" required="" name="passwordAdmin" id="password" />
      </div>
      <div>
        <input type="submit" value="Login" />
        <!-- <a href="#">Register</a> -->
      </div>
    </form><!-- form -->
  </section><!-- content -->
</div><!-- container -->
</body>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $('.waduh').delay(1400).hide(1000);
</script>

</html>