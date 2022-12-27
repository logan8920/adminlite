<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | <?= SITENAME ?></title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition login-page">
<?= $this->renderSection('css') ?>
</head>
<body>
  
<!-- =================================================== -->
<!-- content  -->
<!-- =================================================== -->
<?= $this->renderSection('content') ?>
<!-- =================================================== -->
<!-- end content -->
<!-- =================================================== -->


<script src="<?= base_url() ?>/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js?v=3.2.0"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>
<?= $this->renderSection('js') ?>
<script>
   $(function($) {
  let url = window.location.href;
  $('a').each(function() {
    if (this.href === url) {
      $(this).closest('a').addClass('active');
    }
  });
});

  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
});
</script>
<script>
$(function(){
    <?php if(session()->has("error")) { ?>
       toastr.error('<?= session("error") ?>')
    <?php } ?>
});
$(function(){
    <?php if(session()->has("success")) { ?>
       toastr.success('<?= session("success") ?>')
    <?php } ?>
});

</script>
</body>
</html>