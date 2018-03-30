<h2><?= $title ?></h2>

<ul class="list-group">
	<?php foreach ($sellers as $seller) : ?>
		<li class="list-group-item">
			<?php echo 'Name: '.$seller['UserName']; ?><br>
			<?php echo 'Email: '.$seller['Email']; ?><br>
			<?php echo 'Phone: '.$seller['Phone']; ?><br>
			<?php echo 'Address: '.$seller['Address']; ?><br>
			<?php echo '# of Tickets Allocated: '.$seller['AllocatedTickets']; ?>
		</li>
	<?php endforeach; ?>
</ul>

<!---->