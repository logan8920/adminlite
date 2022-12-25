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
            <?= form_open(route_to($action), ['method' => 'post']) ?>
              <?= csrf_field() ?>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="<?= (isset($all_data['name'])) ? $all_data['name'] : set_value('name') ?>" placeholder="Name">
                      <?php  if (isset($validator)){ echo $validator->hasError('name') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('name').'</span>') : ""; } ?>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" id="email" value="<?= (isset($all_data['email'])) ? $all_data['email'] : set_value('email') ?>" placeholder="Email">
                      <?php  if (isset($validator)){ echo $validator->hasError('email') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('email').'</span>') : ""; } ?>
                    </div>
                  </div>
                </div>
                

                <div class="row">                  
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Moblie No.</label>
                      <input type="number" name="phone" class="form-control" id="phone" value="<?= (isset($all_data['phone'])) ? $all_data['phone'] : set_value('phone') ?>" placeholder="Mobile">
                      <?php  if (isset($validator)){ echo $validator->hasError('phone') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('phone').'</span>') : ""; } ?>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>

                      <select class="form-control" name="status">
                        <option>Select</option>
                        <option value="1" <?= (isset($all_data['status']) && $all_data['status'] == 1) ? 'selected' : ((set_value('status') == '1') ? 'selected' : '') ?>>Block</option>
                        <option value="0" <?= (isset($all_data['status']) && $all_data['status'] == 0) ? 'selected' : ((set_value('status') == '0') ? 'selected' : '') ?>>Unblock</option>
                      </select>
                      <?php  if (isset($validator)){ echo $validator->hasError('status') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('status').'</span>') : ""; } ?>
                      
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" name="password" class="form-control" id="pass" value="<?= (isset($all_data['password'])) ? $all_data['password'] : set_value('password') ?>" placeholder="Password">
                  <?php  if (isset($validator)){ echo $validator->hasError('password') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('password').'</span>') : ""; } ?>
                </div>

              </div>
              <div style="margin-top:-30px" class="card-footer">
                <button type="submit" class="btn btn-primary"><span><i class="fas fa-edit"></i></span> Edit</button>
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