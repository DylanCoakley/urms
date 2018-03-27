<?php echo validation_errors(); ?>
<?php echo $this->session->flashdata('ticket_sale');?>
<?php echo form_open('tickets/sell_tickets'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="number" name="ticket_quantity" class="form-control" placeholder="Individual Ticket Quanitity" required autofocus>
			</div>
			<div class="form-group">
				<input type="number" name="book_quantity" class="form-control" placeholder="Number of Ticket Books" required autofocus>
			</div>
			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Customer Name" required autofocus>
			</div>
			<div class="form-group">
				<input type="text" name="phone" class="form-control" placeholder="Customer Phone Number" required autofocus>
			</div>
			<div class="form-group">
				<input type="text" name="address" class="form-control" placeholder="Customer Address" required autofocus>
			</div>
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Customer Email" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Confirm</button>
		</div>
	</div>
	
<?php form_close(); ?>