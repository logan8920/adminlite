<?= $this->extend('Layouts/auth') ?>

<?= $this->section('content') ?>


	<div class="login-box">
   <div class="card card-outline card-primary">
      <div class="card-header text-center">
         <p class="h1"><b><?= SITENAME ?></b></p>
         
      </div>
      <div class="card-body">
         <p class="login-box-msg">Sign in to start your session</p>
         <?php 
	  		$invalid_pass = \Config\Services::session()->getFlashdata('invalid_pass');
	  		if ($invalid_pass) 
	  			echo '<p class="text-danger">Please enter valid username and password</p>';

         $success = \Config\Services::session()->getFlashdata('success');
         if ($success) 
            echo '<p class="text-success">Successfully Registered! Please Login.</p>';
	  	   $block = \Config\Services::session()->getFlashdata('block');
         if ($block) 
            echo '<p class="text-danger">Account Blocked! Please contact Admin.</p>'     
      

	  	?>
        <?php echo form_open(route_to('admin.login.post'), ['method' => 'post']); ?>
				<?php echo csrf_field() ?>
            <div class="input-group mb-3">
               <input type="email" name="email" class="form-control" placeholder="Email">
               <div class="input-group-append">
                  <div class="input-group-text">
                     <span class="fas fa-envelope"></span>
                  </div>
               </div>
               <?php  if (isset($validator)){ echo $validator->hasError('email') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('email').'</span>') : ""; } ?>
            </div>
            <div class="input-group mb-3">
               <input type="password"  name="password" class="form-control" placeholder="Password">
               <div class="input-group-append">
                  <div class="input-group-text">
                     <span class="fas fa-lock"></span>
                  </div>
               </div>
               <?php  if (isset($validator)){ echo $validator->hasError('password') ? ('<span style="display:block" class="error invalid-feedback"'.$validator->showError('password').'</span>') : ""; } ?>
            </div>
            <div class="row">
              <div class="col">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
               </div>
            </div>
           <?php echo form_close(); ?>
        <br>
        <a href="<?= base_url().route_to('signup.get') ?>" class="text-center">Register a new Account?</a>
      </div>
   </div>
</div>

<?= $this->endSection() ?>