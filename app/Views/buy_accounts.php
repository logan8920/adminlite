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
            <h3 class="card-title"><?= $page_title ?? 'All Accounts' ?></h3>
         </div>
    
         <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
               <thead>
                  <tr>
                      <th>S. No</th>
                     <th>Product</th>
                     <th>Price/Day's</th>
                     <th>No of Account</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>

                   <?php 
                        if(count($account_info)){
                           $i =1;
                            foreach ($account_info as $key => $value) : ?>
                           <tr>
                           <td><?= $i ?></td>
                           <td>
                           <img src="<?= $value['img'] ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                           <?= $value['name'] ?>
                           </td>
                           <td><?= $value['price'].'<small>PKR </small>' ?> For <?= $value['validity'] ?> Day's</td>
                           <td>1</td>

                            <td>
                             <a  title="BUY NOW" href="<?= base_url().route_to('user.purchase',$value['id']) ?>" class="btn btn-success alink">BUY NOW</a>
                           </td>
                           
                           
                           </tr>
                           <tr>
                           
                          
                            <td> 
                              <div class="form-group">
                                <input type="text" name="coupon_code" class="form-control mt-3" placeholder="Enter Coupon Code">
                              </div>
                            </td>
                            <td>
                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

  <?=$this->section('js')?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('[name=submit]').on('click',function() {
        var code = $('[name=coupon_code]').val();
        var productId = '<?=$account_info[0]['plan_varient_id']?>';
        if(code != ''){
          $.ajax({
              url: '<?=base_url(route_to('coupon.validate'))?>',
              type: 'post',
              data: {coupon:code,product:productId},
              dataType: 'json',
              success:function(result){
                if(result['success']){
                  $('[name=submit]').html('Applied!').addClass("btn btn-success").attr('disabled','disabled');
                  var aa = $('.alink').attr('href');
                  var ac = aa+'?code='+code;
                  $('.alink').attr('href',ac);
                }else{
                  $('[name=submit]').html('Invalid!');
                }
              }
          });
        }else{
          alert('Please Enter the Coupon Code.');
        }
      });
    });
  </script>
  <?=$this->endSection()?>