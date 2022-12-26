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
                        <?= base_url() ?>">Home </a>
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
              <h3 class="card-title">Add Account</h3>
            </div>
               <?php 
        $plan_empty = \Config\Services::session()->getFlashdata('plan_empty');
        if ($plan_empty) 
          echo '<p class="text-danger">Someting Went wrong!</p>';
  
     
                $account_added = \Config\Services::session()->getFlashdata('account_added');
                if ($account_added) 
                echo '<p class="text-success">CVS Accounts Added successfully!</p>';


                ?>

   

            <?php echo form_open(route_to('admin.add_account.post'), ['method' => 'post','enctype' => 'multipart/form-data']); ?>
              <div class="card-body">
                <div class="form-group">
                  <label>Select Productss</label>
         <!-- onchange="alert(this.options[this.selectedIndex].getAttribute('isred'));" -->
                  <select name="product_name" onchange="myFun(this.options[this.selectedIndex].getAttribute('validity'),this.options[this.selectedIndex].getAttribute('price'),this.options[this.selectedIndex].getAttribute('varient_id'))" class="form-control select2 " style="width: 100%;" aria-hidden="true">
                    <option selected="selected" disabled>Select Product</option>
                    <?php 
                    
                     foreach ($product_list as $key => $value) {



   echo ' <option varient_id="'.$value['id'].'" validity="'.$value['validity'].'" price="'.$value['price'].'" value="'.$value['product_name'].'">'. $value['product_name']. ' - '.$value['validity']. ' Days - '.$value['price'].' PKR </option>';
                    } ?>
                   
                  </select>
<?php  if (isset($validator)){ echo $validator->hasError('product_name') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('product_name').'</span>') : ""; } ?>
                  <input id="price1" type="hidden" name="price" value="">
                  <input  id="validity1"  type="hidden" name="validity" value="">
                  <input  id="varient_id"  type="hidden" name="plan_varient_id" value="">

                  
                </div>
                <div class="form-group">
                  <label>Select Account CVS file</label>
                  <br>
                  <input  type="file" id="myFile" name="upload_account">
                  <?php  if (isset($validator)){ echo $validator->hasError('upload_account') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('upload_account').'</span>') : ""; } ?>
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

  <?= $this->section('js') ?>
<script type="text/javascript">

  function myFun(val,pri,varient_id) {
   //alert(val +"  >  " + pri);
    $('#price1').val(pri);
    $('#validity1').val(val);
    $('#varient_id').val(varient_id);
  }
</script>
  <?= $this->endSection() ?>