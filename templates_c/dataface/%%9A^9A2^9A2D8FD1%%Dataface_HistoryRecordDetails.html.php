<?php /* Smarty version 2.6.18, created on 2018-01-30 16:40:44
         compiled from Dataface_HistoryRecordDetails.html */ ?>
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
	<?php if ($this->_tpl_vars['field']['visibility']['history'] != 'hidden'): ?>
	<tr>
		<td <?php if ($this->_tpl_vars['table']->isText($this->_tpl_vars['field']['name'])): ?>colspan="2" <?php endif; ?>class="details_label_cell">
			<label>
				<?php echo $this->_tpl_vars['field']['widget']['label']; ?>
:
			</label>
		</td>
		<?php if ($this->_tpl_vars['table']->isText($this->_tpl_vars['field']['name'])): ?></tr><tr><?php endif; ?>
		<td <?php if ($this->_tpl_vars['table']->isText($this->_tpl_vars['field']['name'])): ?>colspan="2" <?php endif; ?>class="details_value_cell <?php if ($this->_tpl_vars['table']->isText($this->_tpl_vars['field']['name'])): ?>max-10-rows<?php endif; ?>">

			<?php echo $this->_tpl_vars['history_record']->htmlValue($this->_tpl_vars['field']['name']); ?>

			
		</td>
	</tr>
	<?php endif; ?>
	
	
<?php endforeach; endif; unset($_from); ?>
			</table>
		</td>
	</tr>
</table>