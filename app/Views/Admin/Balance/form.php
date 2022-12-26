<?= $this->extend('Layouts/admin_layout') ?>
<?= $this->section('content') ?>
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
              <h3 class="card-title"><?= $page_title ?? 'Edit' ?></h3>
            </div>
            <?php $error = \Config\Services::session()->getFlashdata('error');
             if ($error) 
                echo '<p class="text-danger">Something Went Wrong! DB API</p>';
              $invalid_email = \Config\Services::session()->getFlashdata('invalid_email');
             if ($invalid_email) 
                echo '<p class="text-danger">Email Address Not found</p>';
             ?>
            <?= form_open(route_to($action), ['method' => 'post']) ?>
              <?= csrf_field() ?>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Enter Email Address</label>
                      <input class="form-control" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Enter Email Address">
                       
                      <?php  if (isset($validator)){ echo $validator->hasError('user_id') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('user_id').'</span>') : ""; } ?>
                    </div>
                  </div>
                </div>
                

                <div class="row">                  
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Amount</label>
                      <input type="number" name="amount" class="form-control" id="amount" value="<?= set_value('phone') ?>" placeholder="Enter Amount">
                      <?php  if (isset($validator)){ echo $validator->hasError('amount') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('amount').'</span>') : ""; } ?>
                    </div>
                  </div>
                </div>

              </div>
              <div style="margin-top:-30px" class="card-footer">
                <button type="submit" class="btn btn-primary"><span><i class="fas fa-paper-plane"></i></span> Submit</button>
              </div>
            <?= form_close() ?>
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