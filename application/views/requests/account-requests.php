<!-- View for all requests made by a user -->

<h2><?= $title ?></h2>

<ul class="list-group">
	<?php foreach ($requests as $request) : ?>
		<li class="list-group-item">
			<h4><?php echo 'Name: '.$request['RaffleName']; ?></h4>
			<?php if($request['Type'] === 'Ticket_Alloc'): ?>
				<?php echo 'Type: Ticket Allocation'; ?><br>
				<?php echo 'Quantity: '.$request['Quantity']; ?>
			<?php else : ?>
				<?php echo 'Type: '.$request['Type']; ?>
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