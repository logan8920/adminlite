<?= $this->extend('Layouts/master') ?>
<?= $this->section('content') ?>
<div class="content-wrapper" style="min-height: 1302.32px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $page_title ?? 'Page' ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $page_title ?? 'Page' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
         <h3 class="card-title">Add Product</h3>
      </div>
      <form>
         <div class="card-body">
            <div class="form-group">
               <label for="exampleInputEmail1">Product Name</label>
               <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Product name">
            </div>
            
         </div>
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Product</button>
         </div>
      </form>
   </div>
</div>
<!-- ********************************************************** -->
     <!-- ********************************************************** -->
  <div class="col-lg-12">
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Add Price and Days</h3>
      </div>
      <form>
         <div class="card-body">
                   <div class="form-group">
<label>Select Product</label>
<select class="form-control select2 " style="width: 100%;" aria-hidden="true">
<option selected="selected" value ="3">Select Product</option>
<option value ="SEMrush">SEMrush</option>
<option value ="Jasper">Jasper</option>
<option value ="Moz">Moz</option>
<option value ="SuferSEO">SuferSEO</option>
</select>
</div>
            <div class="form-group">
               <label for="exampleInputPassword1">Price (PKR)</label>
               <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Account Pricer">
            </div>
            <div class="form-group">
               <label for="exampleInputPassword1">Validiy</label>
               <input type="text" name="validiy" class="form-control" id="exampleInputPassword1" placeholder="Enter Trail Day's">
            </div>
           
           
            
         </div>
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
         </div>
      </form>
   </div>
</div>
<!-- ********************************************************** -->

     <!-- ********************************************************** -->
  <div class="col-lg-12">
   <div class="card card-primary">
      <div class="card-header">
         <h3 class="card-title">Add Account</h3>
      </div>
      <form>
         <div class="card-body">
                   <div class="form-group">
<label>Select Product</label>
<select class="form-control select2 " style="width: 100%;" aria-hidden="true">
<option selected="selected" value ="3">Select Product</option>
<option value ="SEMrush">SEMrush-3 Days-399 PKR</option>
<option value ="SEMrush">SEMrush-7 Days-599 PKR</option>
<option value ="SEMrush">SEMrush-14 Days-699 PKR</option>
<option value ="SEMrush">SEMrush-30 Days-799 PKR</option>
<option value ="Jasper">Jasper-5 Days-399 PKR</option>
<option value ="Moz">Moz-30 Days-399 PKR</option>
<option value ="SuferSEO">SuferSEO-30 Days-399 PKR</option>
</select>
</div>


          <div class="form-group">
         <label>Select Account CVS file</label> <br> 
       <input type="file" id="myFile" name="filename">
      
         </div>
         <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Product</button>
         </div>
      </form>
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