<?= $this->extend('Layouts/auth') ?>

<?= $this->section('content') ?>


	<div class="login-box">
   <div class="card card-outline card-primary">
      <div class="card-header text-center">
         <b><?= SITENAME ?></b> 
      </div>
      <div class="card-body">
         <p class="login-box-msg">Welcome to Admin Login</p>
         <?php 
	  		$invalid_pass = \Config\Services::session()->getFlashdata('invalid_pass');
	  		if ($invalid_pass) 
	  			echo '<p class="text-danger">Please enter valid username and password</p>';

        
	  	   $error = \Config\Services::session()->getFlashdata('error');
         if ($error) 
            echo '<p class="text-danger">Something Went wrong. Please Contact to the developer.</p>'     
      

	  	?>
        <?php echo form_open(route_to('admin.log.post'), ['method' => 'post']); ?>
				<?php echo csrf_field() ?>
            <div class="input-group mb-3">
               <input type="email" name="email" class="form-control" placeholder="Email">
               <div class="input-group-append">
                  <div class="input-group-text">
                     <span class="fas fa-envelope"></span>
                  </div>
               </div>
            </div>
            <div class="input-group mb-3">
               <input type="password"  name="password" class="form-control" placeholder="Password">
               <div class="input-group-append">
                  <div class="input-group-text">
                     <span class="fas fa-lock"></span>
                  </div>
               </div>
            </div>
            <div class="row">
              <div class="col">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
               </div>
            </div>
           <?php echo form_close(); ?>
        
      </div>
   </div>
</div>

<?= $this->endSection() ?>