<?php /* Smarty version 2.6.22, created on 2009-04-22 04:22:08
         compiled from packlist.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Packlist</title>
	<link rel="stylesheet" href="style<?php echo $this->_tpl_vars['skin']; ?>
.css" type="text/css" />
	<script type="text/javascript" src="packlist.js"></script>
</head>
<body onload="packlist.init();<?php if ($this->_tpl_vars['nick']): ?>packlist.nickPacks('<?php echo $this->_tpl_vars['nick']; ?>
');<?php endif; ?>">
<div class='mainWrapper'>
<div class='smallWrapper'>
	<div class='header' id='header'>
		<h1 class='name'>Packlist</h1>
		<h2 class='irc'><a href='irc://irc.rizon.net/XDCCParser'>#XDCCParser@irc.rizon.net</a></h2>
	</div>
	<div class='content'>
		<div class='contentPad'>
			<div id="searchdiv">
				<form action="#" onsubmit="packlist.search();return false;">Search:&nbsp;&nbsp;<input type='text' name='search' id='search' class='search' style='width:220px; height:14px;' <?php if ($this->_tpl_vars['search']): ?>value='<?php echo $this->_tpl_vars['search']; ?>
' <?php endif; ?>/>&nbsp;&nbsp;<input type='submit' class='search' value='search' style='width:40px; height:18px;' />&nbsp;&nbsp;<span class="default">(<a href='#' onclick="window.location=packlist.last">permalink</a>)</span></form>
			</div>
		</div>
		<div style="width:465px;"><ul class='botlist'>
<?php $_from = $this->_tpl_vars['bots']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bot']):
?>
			<li><a href="javascript:packlist.nickPacks('<?php echo $this->_tpl_vars['bot']['nick']; ?>
');"><?php echo $this->_tpl_vars['bot']['nick']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
		</ul><br class='clear' /></div>
	</div>
	<div id='listtable'>
		<h1>Javascript is required for this site.</h1>
	</div>
	<div class='content' align="center"><a 
href="javascript:goTop();">&#8593;&#8593;</a></div>
	<div class='footer'>Powered by <a href="http://xdccparser.is-fabulo.us"><span class="default">XDCC Parser v<?php echo $this->_tpl_vars['ver']; ?>
</span></a></div>
	<div id="status"><p><span class="loading" style="font-weight:bold">Searching...</span></p></div>
</div>
</div>
</body>
</html>