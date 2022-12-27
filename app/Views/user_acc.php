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
   <div class="col-12">
      <div class="card">
         <div class="card-header">
            <h3 class="card-title">Account info</h3>
            <div class="card-tools">
               
            </div>
         </div>
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Password</th>
                     <th>Date</th>
                  </tr>
               </thead>
               <tbody>
                        <?php 
                        if(count($acc_table)){
                        	$i =1;
                        	 foreach ($acc_table as $key => $value) : ?>
									<tr>
									<td><?= $i ?></td>
									<td> <img src="<?= $value['img'] ?>" alt="Product 1" class="img-circle img-size-32 mr-2"><?= $value['product_name'] ?></td>
									<td><?= $value['email'] ?></td>
									<td><?= $value['password'] ?></td>
									<td><?= $value['used_date'] ?></td>
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
   </div>
</div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <?= $this->endSection() ?>