<?php echo validation_errors(); ?>
<?php echo form_open('users/reduce_tickets/'.$user['UserID']); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1><br>
			<p><?php echo $user['UserName']; ?> is currently allocated <?php echo $user['AllocatedTickets']; ?> tickets</p><br>
			<div class="form-group">
				<input type="number" min="1" max="<?php echo $user['AllocatedTickets']; ?>" name="reduce_quantity" class="form-control" placeholder="Enter Allocated Ticket Reduction Quanitity" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Reduce</button>
		</div>
	</div>
	
<?php form_close(); ?>