<?= $this->extend('Layouts/auth') ?>

<?= $this->section('content') ?>


	<div class="login-box">
   <div class="card card-outline card-primary">
      <div class="card-header text-center">
         <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body">
         <p class="login-box-msg">Sign in to start your session</p>
         <?php 
	  		$invalid_pass = \Config\Services::session()->getFlashdata('invalid_pass');
	  		if ($invalid_pass) 
	  			echo '<p class="text-danger">Please enter valid username and password</p>'		
	  	
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