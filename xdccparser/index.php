<?php

/**
 * XDCC Parser
 * |- Index
 *
 * This software is free software and you are permitted to 
 * modify and redistribute it under the terms of the GNU General 
 * Public License version 3 as published by the Free Sofware
 * Foundation.
 *
 * @link http://xdccparser.is-fabulo.us/
 * @version 1.1
 * @revision Global r2
 * @author Alex 'xshadowfire' Yu <ayu@xshadowfire.net>
 * @author DrX
 * @copyright 2008-2009 Alex Yu and DrX
 */

require_once 'init.php';
require_once 'smarty/libs/Smarty.class.php';

$s = new Smarty();
$s->caching = false;
$s->template_dir = "./tpl";
$s->compile_dir =  "./templates_c";
$s->assign("ver","1.1");
$s->assign("skin", $_REQUEST['skin'] ? $_REQUEST['skin'] : SKIN);
$s->assign("bots", $bots);
$_GET['search'] ? $s->assign("search", $_GET['search']) : null;
$_GET['nick'] ? $s->assign("nick", $_GET['nick']) : null;
$s->display("packlist.tpl");
?>
