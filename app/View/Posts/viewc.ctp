<h1 class="content">Post in category : <?php echo $posts[0]['Post']['category']; ?></h1>
<table>
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Created</th>
		<th></th>
	</tr>
	
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo $post['Post']['id'];?></td>
		<td>
			<?php 
			echo $this->Html->link(
				$post['Post']['title'],
				array('controller' => 'posts' , 'action' => 'view' , $post['Post']['id'])
				);
			?>
		</td>
		<td>
			<?php echo $post['Post']['created']; ?>
		</td>
		<td>
			<?php
				echo $this->Html->link(
					'Edit',
					array('action'=>'edit',$post['Post']['id'])
				);
			?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($post);?>
</table>

<p><?php echo $this->Html->link(
	'Back to all Posts',
	array('controller' => 'posts','action' => 'index')
);?> 
