<?= $this->extend('Layouts/auth') ?>

<?= $this->section('content') ?>


	<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
   <p class="h1"><b><?= SITENAME ?></b></p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new member</p>
         <?php echo form_open(route_to('signup.post'), ['method' => 'post']); ?>
            <?php echo csrf_field() ?>
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" value="Prashant" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
            <?php  if (isset($validator)){ echo $validator->hasError('name') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('name').'</span>') : ""; } ?>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email"  value="Prashant@gmal.com" >
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>

          </div>
          <?php  if (isset($validator)){ echo $validator->hasError('email') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('email').'</span>') : ""; } ?>
        </div>
        <div class="input-group mb-3">
          <input type="number" name="phone" class="form-control" placeholder="Enter WhatsApp number"  value="9988675423" >
          <div class="input-group-append">
            <div class="input-group-text">

              <span class="fas fa-phone"></span>
            </div>
          </div>
          <?php  if (isset($validator)){ echo $validator->hasError('phone') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('phone').'</span>') : ""; } ?>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password"  value="123456" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
           <?php  if (isset($validator)){ echo $validator->hasError('password') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('password').'</span>') : ""; } ?>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="c_password" class="form-control" placeholder="Retype password" value="123456" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?php  if (isset($validator)){ echo $validator->hasError('c_password') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('c_password').'</span>') : ""; } ?>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" onclick="validate(event)">Register</button>
          </div>
        </div>
      <?php echo form_close(); ?>
       
      <a href="<?= base_url().route_to('admin.login') ?>" class="text-center">I already have a Account?</a>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script type="text/javascript">
    function validate(e){ 
    var remember = document.getElementById('agreeTerms');
    if (remember.checked){
      return true;
       
    }else{
      e.preventDefault();
        alert("Please check Agree Terms ") ;
         
       
    }
}
</script>
<?= $this->endSection() ?>