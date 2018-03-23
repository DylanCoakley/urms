<?php echo validation_errors(); ?>

<?php echo form_open('raffles/create'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Enter Raffle Name" autofocus>
			</div>
			<div class="form-group">
				<textarea name="description" class="form-control" placeholder="Enter Description" autofocus>
				</textarea>
			</div>
			<div class="form-group">
				<input type="text" name="start_date" class="form-control" placeholder="Enter Start Date" autofocus>
			</div>
			<div class="form-group">
				<input type="text" name="end_date" class="form-control" placeholder="Enter End Date" autofocus>
			</div>
			<div class="form-group">
				<input type="text" name="max_tickets" class="form-control" placeholder="Enter Maximum Number of Tickets" autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Create</button>
		</div>
	</div>
	
<?php form_close(); ?>