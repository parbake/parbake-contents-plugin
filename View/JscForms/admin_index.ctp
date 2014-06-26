<div class="jscForms index">
	<h2><?php echo __('Jsc Forms'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('form'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($jscForms as $jscForm): ?>
	<tr>
		<td><?php echo h($jscForm['JscForm']['id']); ?>&nbsp;</td>
		<td><?php echo h($jscForm['JscForm']['name']); ?>&nbsp;</td>
		<td><?php echo h($jscForm['JscForm']['form']); ?>&nbsp;</td>
		<td><?php echo h($jscForm['JscForm']['created']); ?>&nbsp;</td>
		<td><?php echo h($jscForm['JscForm']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $jscForm['JscForm']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $jscForm['JscForm']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $jscForm['JscForm']['id']), null, __('Are you sure you want to delete # %s?', $jscForm['JscForm']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Jsc Form'), array('action' => 'add')); ?></li>
	</ul>
</div>

<?php

$simpleForm = json_decode('{"Form":{"0":["JscForm"],"name":{"type":"text"},"email":{"type":"email"},"message":{"type":"textarea"},"submit":["Submit"]}}', true);
$advancedForm = json_decode('{"Form":{"0":["JscForm",{"url":"\/admin\/contents\/jsc_forms\/add\/","role":"form","inputDefaults":{"div":{"class":"form-group"},"class":"form-control","required":false}}],"name":{"type":"text"},"email":{"type":"email"},"message":{"type":"textarea"},"submit":["Submit",{"div":{"class":"form-group"},"class":"btn btn-default"}]}}', true);

debug($simpleForm);

echo $this->Form->create(
	(isset($simpleForm['Form'][0][0])?$simpleForm['Form'][0][0]:$simpleForm['Form'][0]),
	(isset($simpleForm['Form'][0][1])?$simpleForm['Form'][0][1]:array())
);

foreach($simpleForm['Form'] as $key => $value):
	if(!in_array($key, array('0', 'submit'))):
		echo $this->Form->input(
			$key,
			(isset($value)?$value:array())
		);
	endif;
endforeach;

if(isset($simpleForm['Form']['submit'])):
	
	debug($simpleForm['Form']['submit'][0]);

	echo $this->Form->submit(
		$simpleForm['Form']['submit'][0], 
		(isset($simpleForm['Form']['submit'][1])?$simpleForm['Form']['submit'][1]:array())
	);
	
	echo $this->Form->end();
	
else:
	echo $this->Form->end(__('Submit'));		
endif;

debug($advancedForm);



