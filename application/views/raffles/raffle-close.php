<h3><?= $title; ?></h3>

<?php echo validation_errors(); ?>
<?php echo form_open('raffles/close'); ?>
	<p>Type 'Delete' in the field below before clicking Close Raffle</p><br>
	<input type="text" name="confirm_message" class="form-control" placeholder="Type 'Delete' here" required autofocus><br>
	<button type="submit" class="btn btn-danger">CLOSE RAFFLE</button>
<?php form_close(); ?>