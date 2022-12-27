<?= $this->extend('Layouts/admin_layout') ?>
<?= $this->section('content') ?>
<?php $session = session(); ?>
<div class="content-wrapper" style="min-height: 1302.32px;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> <?= $page_title ?? 'Page' ?> </h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="
                        <?= base_url(route_to('admin.dashboard')) ?>">Home </a>
            </li>
            <li class="breadcrumb-item active"> <?= $page_title ?? 'Page' ?> </li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- ********************************************************** -->
        <div class="col-lg-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $page_title ?? 'Add Product' ?></h3>
            </div><div class="card-body">
              <?php echo form_open(route_to('admin.add_product.post'), ['method' => 'post','enctype' => 'multipart/form-data']); ?>
             <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Product name">
                  <?php  if (isset($validator)){ echo $validator->hasError('name') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('name').'</span>') : ""; } ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Product logo URL</label>
                  <input type="text" name="img" class="form-control" id="exampleInputEmail1" placeholder="Enter Product img url">
                   <?php  if (isset($validator)){ echo $validator->hasError('img') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('img').'</span>') : ""; } ?>
                   <p>like: https://static.ahrefs.com/images/ahrefs-logo.jpg</p>
                </div>
             
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Product</button>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
        <!-- ********************************************************** -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

  <?= $this->endSection() ?>