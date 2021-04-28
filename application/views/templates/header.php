<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyReviews | <?php echo $title?> Page</title>

    <!-- Bootstrap CDNs -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>

    <!-- CSS and JavaScript -->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/script.js"></script> 
    <script type="text/javascript">
      window.base_url = <?php echo json_encode(base_url()); ?>;
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
  <a class="navbar-brand" href="<?php echo site_url('pages/view/home') ?>">MyReviews</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Businesses</a>
          <a class="dropdown-item" href="#">Products</a>
          <a class="dropdown-item" href="#">Services</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('product/write_review') ?>">Write Review</a>
      </li>
      <?php if ( $this->session->userdata('logged_in') ) : ?>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('profile/profile_view') ?>">Profile</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('login/logout') ?>">Logout</a>
      </li>
    <?php else : ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('login/login_view') ?>">Login</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('login/register_view')  ?>">Register</a>
      </li>
    <?php endif; ?>
      
    </ul>
  </div>
  </div>
</nav>
<div class = "container">