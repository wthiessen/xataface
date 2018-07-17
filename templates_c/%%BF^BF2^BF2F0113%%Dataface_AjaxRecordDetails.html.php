<?php /* Smarty version 2.6.18, created on 2018-04-26 16:52:40
         compiled from Dataface_AjaxRecordDetails.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'block', 'Dataface_AjaxRecordDetails.html', 32, false),array('block', 'define_slot', 'Dataface_AjaxRecordDetails.html', 33, false),array('block', 'if_allowed', 'Dataface_AjaxRecordDetails.html', 49, false),)), $this); ?>
<?php echo $this->_plugins['function']['block'][0][0]->block(array('name' => 'before_ajax_record_details','record' => $this->_tpl_vars['record']), $this);?>

<?php $this->_tag_stack[] = array('define_slot', array('name' => 'ajax_record_details','record' => $this->_tpl_vars['record'])); $_block_repeat=true;$this->_plugins['block']['define_slot'][0][0]->define_slot($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>

Workorder <input type="text" id="workorder"> <?php echo $this->_tpl_vars['record']; ?>
<br>
User <input type="text" id="employee">

<table class="details_table_wrapper">
	<tr>
		<td>
			<table class="details_table">
				

<?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
	<?php if ($this->_tpl_vars['field']['name'] == $this->_tpl_vars['first_field_second_col']): ?>
	</table></td><td><table class="details_table">
	<?php endif; ?>
	<?php if ($this->_tpl_vars['field']['visibility']['browse'] == 'visible'): ?>
	<?php $this->_tag_stack[] = array('if_allowed', array('permission' => 'view','record' => $this->_tpl_vars['record'],'field' => $this->_tpl_vars['field']['name'])); $_block_repeat=true;$this->_plugins['block']['if_allowed'][0][0]->if_allowed($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<tr>
		<td <?php if ($this->_tpl_vars['table']->isText($this->_tpl_vars['field']['name'])): ?>colspan="2" <?php endif; ?>class="details_label_cell">
			<label>
				<?php echo $this->_tpl_vars['field']['widget']['label']; ?>
:
			</label>
		</td>
		<?php if ($this->_tpl_vars['table']->isText($this->_tpl_vars['field']['name'])): ?></tr><tr><?php endif; ?>
		<td id="ajax-details-<?php echo $this->_tpl_vars['record']->getId(); ?>
#<?php echo $this->_tpl_vars['field']['name']; ?>
" <?php if ($this->_tpl_vars['table']->isText($this->_tpl_vars['field']['name'])): ?>colspan="2" <?php endif; ?>class="details_value_cell df__editable df__editable_wrapper <?php if ($this->_tpl_vars['table']->isText($this->_tpl_vars['field']['name'])): ?>max-10-rows<?php endif; ?>">

			<?php echo $this->_tpl_vars['record']->htmlValue($this->_tpl_vars['field']['name']); ?>

			
		</td>
	</tr>
	<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['if_allowed'][0][0]->if_allowed($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	<?php endif; ?>
	
	
<?php endforeach; endif; unset($_from); ?>
			</table>
		</td>
	</tr>
</table>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['define_slot'][0][0]->define_slot($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php echo $this->_plugins['function']['block'][0][0]->block(array('name' => 'after_ajax_record_details','record' => $this->_tpl_vars['record']), $this);?>