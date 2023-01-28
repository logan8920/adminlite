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
              <li class="breadcrumb-item"><a href=" <?= base_url(route_to('admin.dashboard')) ?>">Home </a></li>
              <li class="breadcrumb-item active"><?= $page_title ?? 'User Lists' ?></li>
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
            <h3 class="card-title"><?= $page_title ?? 'All Users' ?></h3>
            
         </div>
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>Sr.no</th>
                     <th>ProducT Name</th>
                     <th>Price</th>
                     <th>Time</th>
                     <th>User Id</th>
                     <th>Status</th>
                  </tr>
               </thead>
               <tbody>
                        <?php 
                        if(count($trasactionLog)){
                        	$i =1;
                        	 foreach ($trasactionLog as $key => $value) : ?>
									<tr>
									<td><?= $i ?></td>
									<td><?= $value['product_name'] ?></td>
									<td><?= $value['product_price'] ?><?=(!empty($value['coupon_code'])) ? '<span class="badge badge-danger">'.$value['coupon_code'].'</span>':''?></td>
                                    <td><?= date_format(date_create($value['order_date_time']),'jS, M Y'); ?></td>
									<td><?= $value['user_id'] ?></td>
                                    <td><?=($value['status'] == 'success') ? '<span class="badge badge-success">Success</span>' : '<span class="badge badge-danger">Failed</span>'?></td>
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