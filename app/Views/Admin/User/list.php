<?= $this->extend('Layouts/admin_layout') ?>
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
        <?php $error = \Config\Services::session()->getFlashdata('error');
         if ($error) 
            echo '<p class="text-danger">Something Went Wrong! DB API</p>';

            $update = \Config\Services::session()->getFlashdata('update');
             if ($update) 
                echo '<p class="text-success">Successfully Updated</p>'; 

            $success = \Config\Services::session()->getFlashdata('success');
             if ($success) 
                echo '<p class="text-success">Successfully Added</p>';
         ?>
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
               <a href="<?= base_url(route_to('user.list.add')) ?>" class="btn btn-primary btn-xs float-end">Add User</a>
            </div>
         </div>
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Balance<small>(PKR)</small></th>
                     <th>Mobile</th>
                     <th>Last Login</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                        <?php 
                        if(count($userList)){
                        	$i =1;
                        	 foreach ($userList as $key => $value) : ?>
									<tr>
									<td><?= $i ?></td>
									<td><?= $value['name'] ?></td>
									<td><?= $value['email'] ?></td>
                                    <td><?= $value['amount'] ?></td>
									<td><?= $value['phone'] ?></td>
									<td><?= $value['last_login'] ?? 'Not Logged In' ?></td>
                                    <td><a href="<?= base_url().route_to('user.list.edit',$value['id']) ?>" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a>
                                        <a style="width:24px" href="<?= base_url().route_to('user.list.delete',$value['id']) ?>" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
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
   </div>
</div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <?= $this->endSection() ?>