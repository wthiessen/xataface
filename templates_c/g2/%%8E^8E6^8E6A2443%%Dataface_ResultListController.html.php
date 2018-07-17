<?php /* Smarty version 2.6.18, created on 2018-01-22 15:30:06
         compiled from Dataface_ResultListController.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'actions_menu', 'Dataface_ResultListController.html', 23, false),array('function', 'limit_field', 'Dataface_ResultListController.html', 34, false),array('function', 'prev_link', 'Dataface_ResultListController.html', 39, false),array('function', 'next_link', 'Dataface_ResultListController.html', 43, false),array('block', 'translate', 'Dataface_ResultListController.html', 30, false),)), $this); ?>
<?php if (! $this->_tpl_vars['ENV']['APPLICATION_OBJECT']->prefs['hide_resultlist_controller'] && ! ( $this->_tpl_vars['ENV']['APPLICATION_OBJECT']->prefs['show_resultlist_controller_only_when_needed'] && $this->_tpl_vars['ENV']['resultSet']->found() < $this->_tpl_vars['ENV']['resultSet']->limit() )): ?>
	<div class="resultlist-controller">
		<div class="result-list-actions list-actions xf-button-bar-actions">
			<?php echo $this->_plugins['function']['actions_menu'][0][0]->actions_menu(array('category' => 'resultlist_controller_actions','mincount' => 1,'maxcount' => 2), $this);?>

		</div>
	
		<div class="result-stats">
			<span class="start"><?php echo $this->_tpl_vars['ENV']['resultSet']->start()+1; ?>
</span> 
			- 
			<span class="end"><?php echo $this->_tpl_vars['ENV']['resultSet']->end()+1; ?>
</span>
			<?php $this->_tag_stack[] = array('translate', array('id' => "single_words.of")); $_block_repeat=true;$this->_plugins['block']['translate'][0][0]->translate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>of<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['translate'][0][0]->translate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			<span class="found"><?php echo $this->_tpl_vars['ENV']['resultSet']->found(); ?>
</span>
			
			<div class="limit-field">
				<?php echo $this->_plugins['function']['limit_field'][0][0]->limit_field(array(), $this);?>

			</div>
		</div>
		
		<div class="prev-link">
			<?php echo $this->_plugins['function']['prev_link'][0][0]->prev_link(array(), $this);?>

		</div>
		
		<div class="next-link">
			<?php echo $this->_plugins['function']['next_link'][0][0]->next_link(array(), $this);?>

		</div>
		
		
		
	</div>
<?php endif; ?>
