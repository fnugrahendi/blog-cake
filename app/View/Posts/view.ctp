<h1><?php echo h($post['Post']['title']);?></h1>
<p><small>in <?php echo $post['Post']['category']; ?> | Created: <?php echo $post['Post']['created']; ?></small></p>
<p><?php echo h($post['Post']['body']);?></p>
