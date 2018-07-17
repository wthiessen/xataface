<?php /* Smarty version 2.6.18, created on 2018-03-22 14:49:07
         compiled from Dataface_RecordGrid.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'Dataface_RecordGrid.html', 11, false),)), $this); ?>
<table id="<?php echo $this->_tpl_vars['id']; ?>
" class="listing <?php echo $this->_tpl_vars['class']; ?>
">
    <thead>
        <tr>
        <?php $_from = $this->_tpl_vars['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label']):
?>
        <th><a class="unmarked_link"><?php echo $this->_tpl_vars['label']; ?>
</a></th>
        <?php endforeach; endif; unset($_from); ?>
        </tr>
    </thead>
    <tbody>
        <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
        <tr class="listing <?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
            <?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col']):
?>
            <td><a href="" class="unmarked_link"><?php echo $this->_tpl_vars['data'][$this->_sections['row']['index']][$this->_tpl_vars['col']]; ?>
</a></td>
            <?php endforeach; endif; unset($_from); ?>
        </tr>
        <?php endfor; endif; ?>
    </tbody>
</table>