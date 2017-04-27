<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>cPanel Cicak</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/adminStyle.css" />
</head>
<body>
<div class="container">
  <section id="content">
    <form action="<?php echo site_url('home/masukadmin')?>" method="POST">
      <h1>Login Admin</h1>
      <div>
        <input type="text" placeholder="Username" required="" name="usernameAdmin" id="username"/>
      </div>
      <div>
        <input type="password" placeholder="Password" required="" name="passwordAdmin" id="password" />
      </div>
      <div>
        <input type="submit" value="Login" />
        <a href="#">Register</a>
      </div>
    </form><!-- form -->
  </section><!-- content -->
</div><!-- container -->
</body>
</html>