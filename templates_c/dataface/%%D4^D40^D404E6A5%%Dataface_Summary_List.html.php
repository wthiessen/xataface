<?php /* Smarty version 2.6.18, created on 2018-03-22 13:58:52
         compiled from Dataface_Summary_List.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'Dataface_Summary_List.html', 7, false),array('function', 'record_actions', 'Dataface_Summary_List.html', 8, false),array('function', 'actions_menu', 'Dataface_Summary_List.html', 9, false),)), $this); ?>

<ul class="Dataface_Summary_List">
	<?php $_from = $this->_tpl_vars['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['recd']):
?>

		<li class="Dataface_Summary_List-item">
			<div class="Dataface_Summary_List-item-actions">
				<?php echo $this->_plugins['function']['block'][0][0]->block(array('name' => 'before_summary_actions','record' => $this->_tpl_vars['recd']), $this);?>

				<?php echo $this->_plugins['function']['record_actions'][0][0]->record_actions(array('record' => $this->_tpl_vars['recd']), $this);?>

				<?php echo $this->_plugins['function']['actions_menu'][0][0]->actions_menu(array('record' => $this->_tpl_vars['recd'],'category' => 'summary_actions'), $this);?>

				<?php echo $this->_plugins['function']['block'][0][0]->block(array('name' => 'after_summary_actions','record' => $this->_tpl_vars['recd']), $this);?>

			</div>
			<div class="Dataface_Summary_List-item-content">
				<?php echo $this->_plugins['function']['block'][0][0]->block(array('name' => 'before_summary','record' => $this->_tpl_vars['recd']), $this);?>

				<?php echo $this->_tpl_vars['list']->showSummary($this->_tpl_vars['recd']); ?>

				<?php echo $this->_plugins['function']['block'][0][0]->block(array('name' => 'after_summary','record' => $this->_tpl_vars['recd']), $this);?>

			</div>
			<div style="clear:both"></div>
		</li>
	<?php endforeach; endif; unset($_from); ?>
</ul>