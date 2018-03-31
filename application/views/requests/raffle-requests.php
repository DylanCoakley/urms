<!-- View for the Admins Requests -->

<h2><?= $title ?></h2>

<ul class="list-group">
	<?php foreach ($requests as $request) : ?>
		<li class="list-group-item">
			<h4><?php echo 'Name: '.$request['UserName']; ?></h4>
			<h5><?php echo 'Email: '.$request['Email']; ?></h5>
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

			<a class="btn btn-success" href="<?php echo site_url('/requests/approve/'.$request['RequestID']); ?>">
				Approve</a>
			<a class="btn btn-danger" href="<?php echo site_url('/requests/decline/'.$request['RequestID']); ?>">
				Decline</a>
		</li>

	<?php endforeach; ?>
</ul>