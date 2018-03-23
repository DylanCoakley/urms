<h2><?= $title ?></h2>

<ul class="list-group">
	<?php foreach ($requests as $request) : ?>
		<li class="list-group-item">
			<h4><?php echo 'Name: '.$request['Name']; ?></h4>
			<?php echo 'Type: '.$request['Type']; ?>
			<br>
			<?php if($request['Type'] === 'Allocate Tickets') : ?>
				<?php echo 'Quantity: '.$request['Quantity']; ?>
			<?php endif; ?>
			<br>
			<?php echo 'Request Date: '.$request['RequestDate']; ?>
			<br>
			<?php echo $request['Notes']; ?>
			<br>
			<?php if($request['Resolved']) : ?>
				<?php echo 'Resolved: True' ?>
			<?php else : ?>
				<?php echo 'Resolved: False' ?>
			<?php endif; ?>
			<!--<a href="<?php echo site_url('/raffles/view/'.$raffle['RaffleID']); ?>">
				<?php echo $raffle['Name']; ?>
			</a>-->
		</li>

	<?php endforeach; ?>
</ul>