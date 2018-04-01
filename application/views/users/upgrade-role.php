<h3><?= $title; ?></h3>

<?php echo validation_errors(); ?>
<?php echo form_open('users/upgrade/'.$user['UserID']); ?>
	<p>You wish to upgrade <?php echo $user['UserName']; ?> to an Administrator. Type <?php echo $user['Email']; ?> in the field below before clicking Upgrade</p><br>
	<input type="text" name="confirm_email" class="form-control" placeholder="Type <?php echo $user['Email']; ?> here" required autofocus><br>
	<button type="submit" class="btn btn-primary">Upgrade</button>
<?php form_close(); ?>