<?php /* Smarty version 2.6.18, created on 2018-02-08 16:11:59
         compiled from Dataface_QuickForm_element.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strtolower', 'Dataface_QuickForm_element.html', 20, false),array('block', 'translate', 'Dataface_QuickForm_element.html', 53, false),array('function', 'actions_menu', 'Dataface_QuickForm_element.html', 72, false),)), $this); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['field']['Type'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)) == 'text' || ((is_array($_tmp=$this->_tpl_vars['field']['Type'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)) == 'longtext' || ((is_array($_tmp=$this->_tpl_vars['field']['Type'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)) == 'tinytext' || ((is_array($_tmp=$this->_tpl_vars['field']['Type'])) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)) == 'mediumtext' || $this->_tpl_vars['field']['widget']['type'] == 'portal'): ?>
	<?php $this->assign('isText', 1); ?>
<?php else: ?>
	<?php $this->assign('isText', 0); ?>
<?php endif; ?>
<tr>
<td <?php if ($this->_tpl_vars['isText']): ?>colspan="2" class="Dataface_QuickForm-textarea-label-cell"<?php endif; ?> valign="top" <?php if (! $this->_tpl_vars['isText']): ?>align="right" class="Dataface_QuickForm-label-cell"<?php endif; ?>>
<div class="field <?php if ($this->_tpl_vars['error']): ?>error<?php endif; ?>" id="<?php echo $this->_tpl_vars['field']['tablename']; ?>
-<?php echo $this->_tpl_vars['field']['name']; ?>
-wrapper">

	<label><?php echo $this->_tpl_vars['field']['widget']['label']; ?>
</label>

	<?php if ($this->_tpl_vars['required']): ?>
		<span style="color: #ff0000" class="fieldRequired" title="required">&nbsp;</span>
	<?php endif; ?>
<?php if (! $this->_tpl_vars['isText']): ?>
</div>
</td>
<td class="Dataface_QuickForm-widget-cell<?php if ($this->_tpl_vars['isText']): ?> Dataface_QuickForm-textarea-widget-cell<?php endif; ?>">
<div class="field <?php if ($this->_tpl_vars['error']): ?>error<?php endif; ?>" id="<?php echo $this->_tpl_vars['field']['tablename']; ?>
-<?php echo $this->_tpl_vars['field']['name']; ?>
-wrapper">
<?php endif; ?>
	<?php if ($this->_tpl_vars['error']): ?>
		<div class="fieldError" style="color: #ff0000"><?php echo $this->_tpl_vars['error']; ?>
</div>
	<?php endif; ?>
<?php if ($this->_tpl_vars['isText']): ?>
	<?php if (! $this->_tpl_vars['frozen']): ?>
	<div class="formHelp"><?php echo $this->_tpl_vars['field']['widget']['description']; ?>
</div>
	<?php endif; ?>
<?php endif; ?>
	
	<?php if ($this->_tpl_vars['properties']['image_preview']): ?>
	<img src="<?php echo $_SERVER['HOST_URI']; ?>
<?php echo $this->_tpl_vars['properties']['image_preview']; ?>
" style="display: block; max-height: 200px" alt="<?php echo $this->_tpl_vars['field']['name']; ?>
 preview image"/>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['properties']['preview']): ?>
	<a href="<?php echo $_SERVER['HOST_URI']; ?>
<?php echo $this->_tpl_vars['properties']['preview']; ?>
" target="_blank"><?php $this->_tag_stack[] = array('translate', array('id' => "scripts.GLOBAL.MESSAGE_VIEW_FIELD_CONTENT")); $_block_repeat=true;$this->_plugins['block']['translate'][0][0]->translate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>View Field Content in new Window<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['translate'][0][0]->translate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
	<?php endif; ?>

	<div>
	<?php if ($this->_tpl_vars['field']['widget']['question']): ?>
	<div class="formHelp"><?php echo $this->_tpl_vars['field']['widget']['question']; ?>
</div>
	<?php endif; ?>
	<?php echo $this->_tpl_vars['element']; ?>

	<?php if ($this->_tpl_vars['field']['widget']['type'] == 'select' && $this->_tpl_vars['field']['widget']['editvalues']): ?>
	    <script language="javascript"><!--
	    require('<?php echo $this->_tpl_vars['ENV']['DATAFACE_URL']; ?>
/js/ajax.js');
	    makeSelectEditable('<?php echo $this->_tpl_vars['field']['tablename']; ?>
', '<?php echo $this->_tpl_vars['field']['vocabulary']; ?>
', document.getElementById('<?php echo $this->_tpl_vars['field']['name']; ?>
'));
	    //--></script>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['properties']['link']): ?>
		<a href="<?php echo $this->_tpl_vars['properties']['link']; ?>
">Go</a>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['field']['actions']): ?>
		<?php echo $this->_plugins['function']['actions_menu'][0][0]->actions_menu(array('class' => 'field_actions','id' => "field_actions-".($this->_tpl_vars['field']['name']),'category' => $this->_tpl_vars['field']['actions'],'var' => 'actions'), $this);?>

	<?php endif; ?>
	
	</div>
<?php if (! $this->_tpl_vars['isText']): ?>
	<?php if (! $this->_tpl_vars['frozen']): ?>
	<div class="formHelp"><?php echo $this->_tpl_vars['field']['widget']['description']; ?>
</div>
	<?php endif; ?>
<?php endif; ?>
	<?php if ($this->_tpl_vars['field']['widget']['focus']): ?>
	<script language="javascript" type="text/javascript"><!--
	try<?php echo '{'; ?>
quickForm.setFocus('<?php echo $this->_tpl_vars['field']['name']; ?>
');<?php echo '} catch(err){}'; ?>

	//--></script>
	
	
	<?php endif; ?>
</div>
</td>
</tr>