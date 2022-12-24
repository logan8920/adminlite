  <?php $session = session(); ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
<?php 
//get gavatr from email
$email = $session->user['name'];
$default = "https://www.glamsham.com/wp-content/uploads/2020/02/joker-20190404113545639.jpg";
$size = 50;
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

 ?>
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
           <div class="user-panel d-flex">
        <div class="image">
          <img src="<?php echo $grav_url ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        
      </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         
          
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>Profile
          </a> <div class="dropdown-divider"></div>
         
           <a target="_blank" href="<?= add_fund_url?>" class="dropdown-item">
            <i class="fas fa-circle nav-icon mr-2"></i>Add Fund
          </a> <div class="dropdown-divider"></div>
         
           <a href="#" class="dropdown-item">
            <i class="fas fa-circle nav-icon mr-2"></i>Logout
          </a>
          
         
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->