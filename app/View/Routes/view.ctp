<?php echo $this->Html->css('routes', null, array('inline' => false)); 
$this->set('title_for_layout', 'Route '.$route['Route']['name']);?>
<div> 
<h2><?php  echo __('Route '.$route['Route']['name']); ?></h2>
	<dl>
<?php echo __('Carrier'); ?>
		<dd>
			<?php echo $this->Html->link($route['Carrier']['name'], array('controller' => 'carriers', 'action' => 'view', $route['Carrier']['id'])); ?>
		</dd>
	</dl>
</div>

<div>
<br/><br/><br/>
<table>
	<th class="lr">Left Side</th><th class="lr">Right Side</th>
<?php 
if (!empty($Items)):
	foreach($Items as $item):
		if (!empty($item['Direction']['direction'])):
			echo $this->Html->tag('tr');
			echo '<td colspan="2">'.'<h3 style="text-align:center;">'.($item['Direction']['direction']."<br/>").'</h3><h2>';
			echo(!empty($item['Direction']['street_name'])?'<br/>'.($item['Direction']['street_name'].'<br/>'):'').'</h2>';
			echo '</h2></td>';
			echo $this->Html->tag('/tr');
		endif;
		if (!empty($item['Address']['address'])):
			if (!$item['RouteItem']['right_side']):
				echo $this->Html->tag('tr');
			endif; 
			echo $this->Html->tag('td', null, array('class' => 'address'));//'<td class="address">'
				if (!$item['Address']['street_number']):
					echo("<br/>");
				elseif (empty($item['Address']['Subscription'])):
					echo("SKIP<br/>");
				else:?>
				<dl>
					<dt><?php echo($item['Address']['street_number'].' '.$item['Address']['unit']);?></dt>
					<dd><?php foreach($item['Address']['Subscription'] as $subscription):
							echo($subscription['active'])?($subscription['publication']." ".$subscription['subscription_type']."<br/>"):($subscription['publication']." ".$subscription['subscription_type']."<strong> Vac.</strong><br/>");
						endforeach;?>
					</dd>
				</dl>
				<?php	
				endif;
				echo $this->Html->tag('/td');
					if ($item['RouteItem']['right_side']):
						echo $this->Html->tag('/tr');
					endif;
		endif;
	endforeach;	
endif;
?>
</table>
</div>

