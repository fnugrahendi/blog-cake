<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<h2><?php echo __d('cake_dev', 'The Blog'); ?></h2>
<p><?php echo $this->Html->link(
	'Recent Posts',
	array('controller' => 'posts','action' => 'index')
);?> 
&nbsp;
<?php echo $this->Html->link(
	'Users list',
	array('controller' => 'users','action' => 'index')
);?>
</p>
