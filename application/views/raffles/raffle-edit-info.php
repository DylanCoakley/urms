<?php echo validation_errors(); ?>
<?php echo form_open('raffles/edit_info'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<h5>Raffle Name</h5>
				<input type="text" name="raffle_name" value="<?php echo $raffle['RaffleName']; ?>" class="form-control" autofocus>
				<h5>Raffle Description</h5>
				<textarea name="description" class="form-control" autofocus><?php echo $raffle['Description']; ?></textarea>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Update</button>
		</div>
	</div>
<?php form_close(); ?>