<table>
	<tr>
		<th>Id</th>
		<th>Username</th>
		<th></th>
		<th>Role</th>
	</tr>
	
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['id'];?></td>
		<td><?php echo $user['User']['username']." ".$this->Html->link('(edit)',array('action'=>'edit',$user['User']['id']));?></td>
		<td>
			<?php
				
			?>
		</td>
		<td>
			<?php echo $user['User']['role']; ?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($user);?>
</table>
