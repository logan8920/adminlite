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
      <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $page_title ?? 'Edit' ?></h3>
          </div>
        <form action="<?=PAYPAL_URL?>" method="post" id="paypal_form">
          <div class="row p-3 m-2">

            <input type="hidden" name="business" value="<?=PAYPAL_ID?>">
              <div class="col-sm-6">
                <div class="form-group">
                  <!-- Important For PayPal Checkout -->
                  <label>Payment To</label>
                  <input type="text" name="item_name" class="form-control" id="item" value="<?=SITENAME?>" disabled>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <!-- Important For PayPal Checkout -->
                  <label>Enter Amount</label>
                  <input type="number" required name="amount" class="form-control" id="amount">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <!-- Important For PayPal Checkout -->
                  <label>Select Curreny</label>
                  <select class="form-control" name="currency_code">
                    <option value="">select</option>
                    <option value="INR">Rupees</option>
                    <option value="USD">US Doller</option>
                  </select>
                </div>
              </div>
              
              
              
              <!-- Specify a Buy Now button. -->
              <input type="hidden" name="cmd" value="_xclick">
              <!-- Specify URLs -->
              <input type="hidden" name="return" value="<?=PAYPAL_RETURN_URL?>">
              <input type="hidden" name="cancel_return" value="<?=PAYPAL_CANCEL_URL?>">
              <input type="hidden" name="rm" value="2">
              <input type="hidden" name="no_shipping" value="0">
              <input type="hidden" name="no_note" value="1">
              <br><br>
              <!-- Display the payment button. -->
              <!-- /.row -->
          </div>
          <div style="margin-top:-30px;margin-left:12px ;" class="card-footer">
                <input type="submit" class="btn btn-primary" name="submit" border="0" value="Paid">
              </div>
        </form>      
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <?= $this->endSection() ?>