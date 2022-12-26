<?= $this->extend('Layouts/master') ?>
<?= $this->section('content') ?>
<div class="content-wrapper" style="min-height: 1302.32px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $page_title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $page_title ?></li>
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
   <div class="col-lg-12">
      <div class="card">
         <div class="card-header border-0">
            <h3 class="card-title">Account for Sale</h3>
         </div>
         <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
               <thead>
                  <tr>
                     <th>Product</th>
                     <th>Accounts Available?</th>
                     <th>Validity</th>
                     <th>Price</th>
                     <th>Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                      <td>
                        <img src="<?= semrush ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                        SEMrsuh
                     </td>
                     <td>210 Accounts</td>

                     <td>7 Day's</td>
                     <td>$13 USD</td>
                     <td>23-34-55</td>
                     <td> <a class="btn btn-success" href="#">BUY NOW</a> </td>
                  </tr>
                     <td>
                        <img src="<?= semrush ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                        SEMrsuh
                     </td>
                     <td>20 Accounts</td>

                     <td>14 Day's</td>
                     <td>$13 USD</td>
                     <td>23-34-55</td>
                     <td> <a class="btn btn-success" href="#">BUY NOW</a> </td>
                  </tr>
                  <tr>
                     <td>
                        <img src="<?= jasper ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                        JAsper
                     </td>
                      <td>201 Accounts</td>
                     <td>5 Day's</td>
                     <td>$29 USD</td>
                     <td>23-34-55</td>
                      <td> <a class="btn btn-success" href="#">BUY NOW</a> </td>
                  </tr>
                  <tr>
                     <td>
                        <img src="<?= moz ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Moz PRo
                     </td>
                      <td>120 Accounts</td>
                     <td>30 Day's</td>
                     <td>$29 USD</td>
                     <td>23-34-55</td>
                      <td> <a class="btn btn-success" href="#">BUY NOW</a> </td>
                  </tr>
               </tbody>
            </table>
     
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