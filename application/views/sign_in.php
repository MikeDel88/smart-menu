<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section id="container" class="container my-3 py-3 text-center bg-light border shadow ">
	<? echo heading('Connexion Administration', 3, 'class="py-3 bg-dark text-light"'); ?>
	<div id="body">
		<? echo form_open('/sign-in') ?>
  			<div class="form-group">
  			  <label for="exampleInputEmail1">Email address</label>
  			  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  			</div>
  			<div class="form-group">
  			  <label for="exampleInputPassword1">Password</label>
  			  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  			</div>
  			<button type="submit" class="btn btn-info shadow">Connexion</button>
		<? echo form_close() ?>
	</div>
	<?php echo validation_errors('<div class="container alert alert-warning my-3" role="alert">', '</div>'); ?>
	<div class="my-3">
		<a href="<?='/sign-up'?>">Pas encore inscrit ? Inscription</a>
	</div>
</section>
