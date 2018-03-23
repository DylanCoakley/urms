<?php echo validation_errors(); ?>

<?php echo form_open('users/edit'); ?>
<div class="col">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center"><?= $title; ?></h1>
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" value="<?php echo $user['Name']; ?>">
		</div>
		<div class="form-group">
			<label>Address</label>
			<input type="text" class="form-control" name="address" value="<?php echo $user['Address']; ?>">
		</div>
		<div class="form-group">
			<label>Phone Number</label>
			<input type="text" class="form-control" name="phone" value="<?php echo $user['Phone']; ?>">
		</div>
		<!--
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" value="<?php echo $user['Email']; ?>">
		</div>
		
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
		</div>
	-->
		<button type="submit" class="btn btn-primary btn-block">Update</button>
	</div>
</div>
<?php echo form_close(); ?>