<h2><?= $title ?></h2>

<ul class="list-group">
	<?php foreach ($sellers as $seller) : ?>
		<li class="list-group-item">
			<h4><?php echo 'Name: '.$seller['UserName']; ?></h4>
			<?php echo 'Role: '.$seller['Role']; ?><br>
			<?php echo 'Email: '.$seller['Email']; ?><br>
			<?php echo 'Phone: '.$seller['Phone']; ?><br>
			<?php echo 'Address: '.$seller['Address']; ?><br>
			<?php echo '# of Tickets Allocated: '.$seller['AllocatedTickets']; ?><br><br>
			<a href="<?php echo site_url('/users/reduce_tickets/'.$seller['UserID']); ?>" class="btn btn-warning">Reduce Allocated Tickets</a>
			<a href="<?php echo site_url('/users/upgrade/'.$seller['UserID']); ?>" class="btn btn-primary">Upgrade to Admin</a>
		</li>
	<?php endforeach; ?>
</ul>

<!---->