<?php $count =0;
?>

<table>
	<tr>
		<th>Asset</th>
		<th>threshold</th>
		<?php foreach ($assetsQuantitesDays as $assetsQuantitesDay) { ?>
			<th><?php echo $assetsQuantitesDay; ?></th>
		<?php }?>
		
	</tr>
		<?php  foreach ($assets as $asset) { // loop to add asset names?> 
	<tr>
		<td id="asset<?= $asset['id']; ?>"><?= $asset['name']; ?></td>
		<td id="treshold<?= $asset['id']; ?>"><?= $asset['threshold']; ?></td>
		<?php while (isset($assetsQuantites[$count]['id']) && $assetsQuantites[$count]['id'] == $asset['id']) { ?>
		<td ><?= $assetsQuantites[$count]['quantity'] ?></td>
		<?php $count++; } ?>

	</tr>
		<?php } ?>	
</table>