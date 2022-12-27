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
      <?php $cont = explode(",", $contact_data) ?>
      <div class="row">
        <!-- ********************************************************** -->
        <div class="col-lg-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $page_title ?? 'Add Product' ?></h3>
            </div>

            <?php echo form_open(route_to('dmin.site.setting.post'), ['method' => 'post','enctype' => 'multipart/form-data']); ?>
            <div class="card-body">
                <div class="form-group">
                	
                  <label for="exampleInputEmail1">WhatsApp Number<small>(With Country Code +92)</small></label>
                  <input type="text" name="whatsapp" class="form-control" id="exampleInputEmail1" placeholder="Enter contact WhatsApp number with +92" value="<?=   $cont[0] ?>">
                  <?php  if (isset($validator)){ echo $validator->hasError('name') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('name').'</span>') : ""; } ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Facebokk URL</label>
                  <input type="text" name="fb" class="form-control" id="exampleInputEmail1" placeholder="Enter facebook profile url" value="<?=   $cont[1] ?>">
                   <?php  if (isset($validator)){ echo $validator->hasError('img') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('img').'</span>') : ""; } ?>
                 
                </div>
             
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">SAVE</button>
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