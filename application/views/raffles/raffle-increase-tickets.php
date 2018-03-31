<?php echo validation_errors(); ?>
<?php echo form_open('raffles/increase_tickets'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="number" min = "1" max = "1000" name="quantity" class="form-control" placeholder="Enter Number of Tickets to Add to Raffle" autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Add</button>
		</div>
	</div>
<?php form_close(); ?>