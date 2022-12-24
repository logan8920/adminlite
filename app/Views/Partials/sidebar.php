<?php $session = session(); ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url() ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= SITENAME  ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
<?php 
//get gavatr from email
$email = $session->user['name'];
$default = "https://www.glamsham.com/wp-content/uploads/2020/02/joker-20190404113545639.jpg";
$size = 50;
$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

 ?>

          <img src="<?php echo $grav_url ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url(). "/" ?>" class="d-block"><?= $session->user['name'] ?? SITENAME ?></a>
        </div>
      </div>

      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url(). "/" ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="<?= base_url().route_to('show.my') ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accounts
               
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?= base_url().route_to('show.buy.new') ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Buy New
               
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>