<?php
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
		<td id="asset<?php  echo $asset['id']; ?>"><?php echo $asset['name']; ?></td>
		<td id="treshold<?php  echo $asset['id']; ?>"><?php  echo $asset['threshold']; ?></td>
		<td></td>
	</tr>
		<?php }?>	
</table>