<?php echo validation_errors(); ?>
<?php echo form_open('raffles/settings'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="number" min = "1" max = "1000" name="quantity" class="form-control" placeholder="Enter Number of Tickets to Add to Raffle" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Add</button>
		</div>
	</div>
<?php form_close(); ?>


<h3>Print All Tickets</h3>
<button class="btn btn-info btn-block">Get PDF</button>

<h3>Close Raffle</h3>
<p>CAUTION! This clears all seller, ticket, and request data</p>

<a href="<?php echo site_url('/raffles/close'); ?>" class="btn btn-danger btn-block">To Raffle Close Page</a>
