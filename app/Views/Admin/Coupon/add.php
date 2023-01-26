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
              <h3 class="card-title"> <?= $page_title ?? 'Page' ?></h3>
            </div>
             <?= form_open_multipart(route_to('coupon.add.store'), ['method' => 'post']); ?> 
              <?= csrf_field() ?> 
              <div class="card-body">
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Coupon Name <span style="font-size: 10px;color: red;">(Eg:DIS20 For 20 ₹)</span></label>
                      <input type="text" name="coupon_code" value="<?=set_value('coupon_code')?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Coupon Name">
                      <?php if(isset($validator) && $validator->hasError('coupon_code'))
                              echo '<p style="font-size: 10px;color: red;">'.$validator->showError('coupon_code').'</p>';
                      ?>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Discount Amount <span style="font-size: 10px;color: red;">(In Rupees)</span></label>
                      <input type="number" name="discount" class="form-control" value="<?=set_value('discount')?>" placeholder="Enter Discount Amount">
                      <?php if(isset($validator) && $validator->hasError('discount'))
                              echo '<p style="font-size: 10px;color: red;">'.$validator->showError('discount').'</p>';
                      ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Set Limit</label>
                      <input type="number" name="used_limit" class="form-control" value="<?=set_value('used_limit')?>" placeholder="Enter Limit">
                      <?php if(isset($validator) && $validator->hasError('used_limit'))
                              echo '<p style="font-size: 10px;color: red;">'.$validator->showError('used_limit').'</p>';
                      ?>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Select Product</label>
                      <select class="form-control" name="product_code">
                        <option value="">Select</option>
                        <?php foreach($product as $key => $value): 
                          $select = ($value['id'] == set_value('product_code')) ? 'selected' : '';
                        echo '<option value="'.$value['id'].'" '.$select.'>'.$value['product_name'].'- '.$value['price'].' for '.$value['validity'].' Days</option>';
                        endforeach; ?>
                      </select>
                      <?php if(isset($validator) && $validator->hasError('product_code'))
                              echo '<p style="font-size: 10px;color: red;">'.$validator->showError('product_code').'</p>';
                      ?>
                    </div>
                  </div>
                </div>  
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Coupon</button>
              </div>
            <?=form_close()?>
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