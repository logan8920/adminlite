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
          <img src="<?= base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $session->user['name'] ?? SITENAME ?></a>
        </div>
      </div>

      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
            
          </li>

                <li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-table"></i>
    <p> Products <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: none;">
     <li class="nav-item">
      <a href="<?= base_url().route_to('admin.product_list') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Product List</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url().route_to('admin.add_product') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add Product</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url().route_to('admin.add_plan') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add Plan</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url().route_to('admin.add_account') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add Accounts</p>
      </a>
    </li>
  </ul>
</li>



          <li class="nav-item">
            <a href="<?= base_url().route_to('add.product') ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Product
               
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?= base_url().route_to('user.list') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User List
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url().route_to('add.balance') ?>" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Add Balance
               
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>