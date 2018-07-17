<?php /* Smarty version 2.6.18, created on 2018-03-21 21:16:56
         compiled from My_Main_Template.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'define_slot', 'My_Main_Template.html', 7, false),)), $this); ?>
<html>
    <head><title>My Web Site</title></head>
    <body>
    <img src="images/myHeader.jpg" alt="Header graphic" />
    <h1>My Web Site</h1>
    <div id="main-content">
    <?php $this->_tag_stack[] = array('define_slot', array('name' => 'main_content')); $_block_repeat=true;$this->_plugins['block']['define_slot'][0][0]->define_slot($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
         This slot is where the main content goes
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['define_slot'][0][0]->define_slot($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    </div>
    <div id="footer">Copyright (c) 2006 Me</div>
    </body>
</html>