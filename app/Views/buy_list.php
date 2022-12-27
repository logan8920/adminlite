<?= $this->extend('Layouts/master') ?>
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
                         <?= base_url(route_to('home.dashboard')) ?>">Home </a>
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
            <h3 class="card-title"><?= $page_title ?? 'All Products' ?></h3>
         </div>
    
         <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
               <thead>
                  <tr>
                      <th>S. No</th>
                     <th>Product</th>
                     <th>Price/Day's</th>
                     <th>Accounts</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>

                   <?php 
                        if(count($join)){
                           $i =1;
                            foreach ($join as $key => $value) : ?>
                           <tr>
                           <td><?= $i ?></td>
                           <td>
                           <img src="<?= $value['img'] ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                           <?= $value['name'] ?>
                           </td>
                           <td><?= $value['price'].'<small>PKR </small>' ?> For <?= $value['validity'] ?> Day's</td>
                           <td><?= count_account_for_sale($value['id']).' account for sale'  ?></td>

                                              <td>
                     <?php if(count_account_for_sale($value['id']) ==0)
                     {
                        echo '<a  title="Delete" href="#" class="btn btn-danger">OUT OF STOCK</a>';
                     } else{
                         echo '<a  title="Delete" href="'.base_url().route_to('user.buy.accounts',$value['id']).'" class="btn btn-success">BUY NOW</a>';
                     } ?>
                  
                  </td>
                           
                      </tr>
                        
                          <?php  $i++; endforeach;
                        } else {
                           echo '<tr>';
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