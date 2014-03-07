<?php $this->set('title_for_layout', 'Route'); ?>
<div class="addresses index">
	<table cellpadding="0" cellspacing="0">
	<tr><th><?php echo 'Biscayne Cr';?></th></tr>
	<?php foreach ($allAddresses as $address): 
		if ($address['Subscription']): ?>
	<tr><td>
	<?php	echo h($address['Address']['street_number']);
				if(!empty($address['Address']['unit'])):
					echo h(' #'.$address['Address']['unit']);
				endif;
	?></td>	
	<td><?php foreach ($address['Subscription'] as $subscription):
				if ($subscription['active']): 
					echo h($subscription['publication'].' '); 
					echo h($subscription['subscription_type'].' ');
					echo '<i style=color:red;>'.h($subscription['instructions']).'</i>'?><br /><?php
				else: echo '<b>Vac.</b>';
				endif;	
		 endforeach;?></td><?php 
		else:
		?><td><?php echo 'SKIP';?></td>
		<?php	endif; 
	endforeach; ?>
	</table>
</div>
