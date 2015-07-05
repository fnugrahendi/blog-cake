<h1 class="content">Blog Post</h1>
<table>
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Category</th>
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
			<?php echo $this->Html->link(
				$post['Post']['category'],
				array('controller' => 'posts' , 'action'=>'viewc' , $post['Post']['category'])
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
		<td>
			<?php
				echo $this->Html->link(
					'Delete',
					array('action'=>'delete',$post['Post']['id'])
				);
			?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($post);?>
</table>
<?php echo $this->Html->link(
	'Add Post',
	array('controller' => 'posts','action' => 'add')
);?>
