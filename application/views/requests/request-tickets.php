<?php echo validation_errors(); ?>
<?php echo $this->session->flashdata('tickets_requested');?>
<?php echo form_open('requests/request_tickets'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
				<input type="number" name="ticket_quantity" class="form-control" placeholder="Enter Ticket Quanitity" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit Request</button>
		</div>
	</div>
	
<?php form_close(); ?>