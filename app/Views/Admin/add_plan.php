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
         <h3 class="card-title">Add Price and Days</h3>
      </div>
           <?php echo form_open(route_to('admin.add_plan.post'), ['method' => 'post']); ?>
         <div class="card-body">

                <?php 
                $success = \Config\Services::session()->getFlashdata('plan_added');
                if ($success) 
                echo '<p class="text-success">Plan add successfully!</p>';
                ?>

                   <div class="form-group">
<label>Select Product</label>
<select name="product_name" class="form-control select2 " style="width: 100%;" aria-hidden="true">
<option selected="selected" value ="3">Select Product</option>
<?php 
if(count($product_list)){
foreach ($product_list as $key => $value) : ?>

  <option value ="<?= $value['name'] ?>"> <?= $value['name'] ?> </option>

<?php endforeach; } 
  else {
    echo '<option value ="">No product found</option>';
       } ?>



</select>
</div>
            <div class="form-group">
               <label for="exampleInputPassword1">Price (PKR)</label>
               <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Account Pricer">
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Validiy</label>
               <input type="text" name="validity" class="form-control" id="exampleInputPassword1" placeholder="Enter Trail Day's">
            </div>
           
           
            
         </div>
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
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