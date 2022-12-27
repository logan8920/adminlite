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
   
    
    
  </div>
  <div class="h4 text-center">Send your Email or Payment Screenshot to Admin in WhatsApp</div>

  <div class="text-center">
    <a class="btn btn-success" href="https://wa.me/<?= $contact_data ?>?text=hay i want add fund in my account this is my Email Address <?= $emailaddress ?> Website-<?= base_url() ?>">SEND MSG TO WHATSAPP</a>

</div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <?= $this->endSection() ?>