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
            <div class="card-tools">
               <a href="<?= base_url(route_to('coupon.add')) ?>" class="btn btn-success float-end">Add Coupon</a>
            </div>
         </div>
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Coupon</th>
                     <th>Create Date</th>
                     <th>Discount</th>
                     <th>Used by</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                        <?php 
                        if(count($couponList)){
                        	$i =1;
                        	 foreach ($couponList as $key => $value) : ?>
									<tr>
									<td><?= $i ?></td>
									<td><?= $value['coupon_code'] ?></td>
									<td><?= $value['created_at'] ?></td>
                                    <td><?= $value['discount'] ?></td>
									<td><?= (!empty($value['used'])) ? $value['used'] : '0' ?><?='/'.$value['used_limit']?></td>
                                    <td><a href="<?= base_url().route_to('coupon.edit',$value['id']) ?>" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a>
                                        <a style="width:24px" href="javascript:void(0)" onclick="deletep('<?=$value['id']?>')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
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