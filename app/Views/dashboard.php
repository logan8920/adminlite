<?= $this->extend('Layouts/master') ?>
<?= $this->section('content') ?>
<div class="content-wrapper" style="min-height: 1302.32px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
   <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
         <div class="inner">
            <h3>150</h3>
            <p>Total Account Stocks</p>
         </div>
         <div class="icon">
            <i class="ion ion-bag"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <div class="col-lg-3 col-6">
      <div class="small-box bg-success">
         <div class="inner">
            <h3>53</h3>
            <p>Your Accounts</p>
         </div>
         <div class="icon">
            <i class="ion ion-stats-bars"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
         <div class="inner">
            <h3>44</h3>
            <p>Used Fund</p>
         </div>
         <div class="icon">
            <i class="ion ion-person-add"></i>
         </div>
         <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
   </div>
   <div class="col-lg-3 col-6">
      <div class="small-box bg-danger">
         <div class="inner">
            <h3>6500</h3>
            <p>Available Fund</p>
         </div>
         <div class="icon">
            <i class="ion ion-pie-graph"></i>
         </div>
         <a href="#" class="small-box-footer">Add More Fund</i></a>
      </div>
   </div>
</div>


        <div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title">Resent Last 10 Activity</h3>
         </div>
         <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
               <thead>
                  <tr>
                     <th>Product</th>
                     <th>Validity</th>
                     <th>Price</th>
                     <th>Date</th>
                     <th>View</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>
                        <img src="<?= semrush ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                        SEMrsuh
                     </td>
                     <td>20 Day's</td>
                     <td>$13 USD</td>
                     <td>23-34-55</td>
                     <td> <a class="btn btn-success" href="#">VIEW</a> </td>
                  </tr>
                  <tr>
                     <td>
                        <img src="<?= jasper ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                        JAsper
                     </td>
                     <td>20 Day's</td>
                     <td>$29 USD</td>
                     <td>23-34-55</td>
                      <td> <a class="btn btn-success" href="#">VIEW</a> </td>
                  </tr>
                  <tr>
                     <td>
                        <img src="<?= moz ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Moz PRo
                     </td>
                     <td>20 Day's</td>
                     <td>$29 USD</td>
                     <td>23-34-55</td>
                      <td> <a class="btn btn-success" href="#">VIEW</a> </td>
                  </tr>
               </tbody>
            </table>
            <div class="card-footer clearfix">
<a href="#" class="btn btn-primary float-right">View More</a>
</div>
         </div>
      </div>
      <!-- /.card -->
   </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>

  <?= $this->endSection() ?>