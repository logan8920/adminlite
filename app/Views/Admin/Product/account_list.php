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
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title">Avaliable Accounts List of  <b><?= $plan_data ?></b></h3>
         </div>
      
         <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
               <thead>
                  <tr>
                     <th>S. No</th>
                     <th>Product</th>
                     <th>Email</th>
                     <th>Password</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>

                 <?php 
                        if(count($all_accounts)){
                          $i =1;
                           foreach ($all_accounts as $key => $value) : ?>
                  <tr>
                  <td><?= $i ?></td>
                  <td>
                  <img src="<?= $value['img'] ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                  <?= $value['name'] ?>
                  </td>
                  <td><?= $value['email'] ?></td>
                  <td><?= $value['password'] ?></td>

                                     <td>            
              <a  title="Delete" style="width:24px" href="<?= base_url().route_to('admin.account_delete',$value['id']) ?>" class="btn btn-danger btn-xs">
                <i class="fas fa-trash"></i>
              </a>
            </td>
                  
                  
                  </tr>
                        
                          <?php  $i++; endforeach;
                        } else {
                          echo '<tr>';
                          echo '<td>no data found</td>';
                          echo '<td>no data found</td>';
                          echo '<td>no data found</td>';
                          echo '<td>no data found</td>';
                          echo '<td>no data found</td>';
                          
                          echo '</tr>';
                        }
                        ?>   
                  
               
               </tbody>
            </table>
     
         </div>
      </div>
      <!-- /.card -->
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