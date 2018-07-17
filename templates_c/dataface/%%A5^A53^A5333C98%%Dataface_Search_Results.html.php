<?php /* Smarty version 2.6.18, created on 2018-04-10 16:29:28
         compiled from Dataface_Search_Results.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'use_macro', 'Dataface_Search_Results.html', 1, false),array('block', 'fill_slot', 'Dataface_Search_Results.html', 2, false),array('modifier', 'count', 'Dataface_Search_Results.html', 3, false),array('modifier', 'escape', 'Dataface_Search_Results.html', 4, false),)), $this); ?>
<?php $this->_tag_stack[] = array('use_macro', array('file' => "Dataface_Main_Template.html")); $_block_repeat=true;$this->_plugins['block']['use_macro'][0][0]->use_macro($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<?php $this->_tag_stack[] = array('fill_slot', array('name' => 'main_section')); $_block_repeat=true;$this->_plugins['block']['fill_slot'][0][0]->fill_slot($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
		<?php if (count($this->_tpl_vars['results']) > 0): ?>
			<p>Results <?php echo $this->_tpl_vars['metadata']['start']+1; ?>
 to <?php echo $this->_tpl_vars['metadata']['end']; ?>
 of <?php echo $this->_tpl_vars['metadata']['found']; ?>
 for "<?php echo ((is_array($_tmp=$this->_tpl_vars['search_term'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"</p>
			<?php ob_start(); ?>
			<?php if ($this->_tpl_vars['metadata']['start'] > 0): ?><a href="<?php echo $_SERVER['HOST_URI']; ?>
<?php echo $this->_tpl_vars['ENV']['DATAFACE_SITE_HREF']; ?>
?-action=search_index&table=<?php echo ((is_array($_tmp=$this->_tpl_vars['metadata']['table'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&-search=<?php echo ((is_array($_tmp=$this->_tpl_vars['search_term'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&-skip=<?php echo $this->_tpl_vars['metadata']['start']-30; ?>
">[ Previous 30 Results ]</a><?php endif; ?>
			<?php if ($this->_tpl_vars['metadata']['end'] < $this->_tpl_vars['metadata']['found']): ?><a href="<?php echo $_SERVER['HOST_URI']; ?>
<?php echo $this->_tpl_vars['ENV']['DATAFACE_SITE_HREF']; ?>
?-action=search_index&table=<?php echo ((is_array($_tmp=$this->_tpl_vars['metadata']['table'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&-search=<?php echo ((is_array($_tmp=$this->_tpl_vars['search_term'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&-skip=<?php echo $this->_tpl_vars['metadata']['end']; ?>
">[ Next 30 Results ]</a><?php endif; ?>
			<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('prev_next', ob_get_contents());ob_end_clean(); ?>
			<?php echo $this->_tpl_vars['prev_next']; ?>

			<?php if (count($this->_tpl_vars['metadata']['tables']) > 1): ?>
			<table class="listing" width="100%"><thead><tr>
			<th>Filter By Type</th>
			<td <?php if (! $this->_tpl_vars['metadata']['table']): ?>class="selected-search-type"<?php endif; ?>><a href="<?php echo $_SERVER['HOST_URI']; ?>
<?php echo $this->_tpl_vars['ENV']['DATAFACE_SITE_HREF']; ?>
?-action=search_index&-search=<?php echo ((is_array($_tmp=$this->_tpl_vars['search_term'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
">All Results</a> (<?php echo $this->_tpl_vars['metadata']['total_found']; ?>
)</td>
			<?php $_from = $this->_tpl_vars['metadata']['tables']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['table'] => $this->_tpl_vars['tabledata']):
?>
				<td <?php if ($this->_tpl_vars['table'] == $this->_tpl_vars['metadata']['table']): ?>class="selected-search-type"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['smarter']['server']['HOST_URI']; ?>
<?php echo $this->_tpl_vars['ENV']['DATAFACE_SITE_HREF']; ?>
?-action=search_index&table=<?php echo ((is_array($_tmp=$this->_tpl_vars['table'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&-search=<?php echo ((is_array($_tmp=$this->_tpl_vars['search_term'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tabledata']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a> (<?php echo $this->_tpl_vars['tabledata']['found']; ?>
)</td>
			<?php endforeach; endif; unset($_from); ?>
			</tr>
			</thead>
			</table>
			<?php endif; ?>
			
			<dl>
			<?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['result']):
?>
				<dt><a href="<?php echo $this->_tpl_vars['result']['record_url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['record_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></dt>
				<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['result']['record_description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</dd>
				<dd><?php echo $this->_tpl_vars['result']['relevance_bar']; ?>
</dd>
			<?php endforeach; endif; unset($_from); ?>
			</dl>
			<?php echo $this->_tpl_vars['prev_next']; ?>

		<?php else: ?>
			<p>No matches for the query provided, please try again.</p>
		<?php endif; ?>
	<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['fill_slot'][0][0]->fill_slot($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['use_macro'][0][0]->use_macro($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>