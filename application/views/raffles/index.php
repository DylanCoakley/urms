<h2><?= $title ?></h2>

<ul class="list-group">
	<?php foreach ($raffles as $raffle) : ?>
		<li class="list-group-item">
			<a href="<?php echo site_url('/raffles/view/'.$raffle['RaffleID']); ?>">
				<?php echo $raffle['Name']; ?>
			</a>
		</li>

	<?php endforeach; ?>
</ul>