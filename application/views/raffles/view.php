<h2><?php echo $raffle['RaffleName']; ?></h2>

<small><?php echo 'From '.$raffle['StartDate']. ' til '.$raffle['EndDate'] ; ?></small>

<p><?php echo $raffle['Description']; ?></p>

<a href="<?php echo site_url('/requests/join');?>">Request Join</a>
