<?php
require 'xataface/public-api.php';
require 'xataface/dataface-public-api.php';

include 'xataface/Dataface/ActionTool.php';

df_init(__FILE__, 'xataface/Dataface');
df_display(array(), 'My_Main_Template.html');
?>
