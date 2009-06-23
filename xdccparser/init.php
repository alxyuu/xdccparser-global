<?php

/**
 * XDCC Parser
 * |- Initialize Module
 *
 * This software is free software and you are permitted to
 * modify and redistribute it under the terms of the GNU General
 * Public License version 3 as published by the Free Sofware
 * Foundation.
 *
 * @link http://xdccparser.is-fabulo.us/
 * @version 1.1
 * @revision Global r3
 * @author Alex 'xshadowfire' Yu <ayu@xshadowfire.net>
 * @author DrX
 * @copyright 2008-2009 Alex Yu and DrX
 */

define('SKIN', 2); //comes with 2 skins, set to 1 or 2.
define('PACKDIR', "./packlists/");
define('XCACHE_VAR', "xp_bots");

/* ############################################# */
/* #             DO NOT EDIT BELOW             # */
/* ############################################# */
error_reporting(1);
if(function_exists("xcache_isset") && xcache_isset(XCACHE_VAR)) {
	$bots = xcache_get(XCACHE_VAR);
} else {
	if($bots = unserialize(file_get_contents("./cache/xp_cache"))) {
		function_exists("xcache_set") ? xcache_set(XCACHE_VAR,$bots) : null;
	} else {
		$bots = array();
		$sizes = array('K' => 1.0/1024, 'M' => 1, 'G' => 1024, 'T' => 1048576);
		$dir = scandir(PACKDIR);
		natcasesort($dir);
		foreach($dir as $file) {
			if($file == "." || $file == ".." || stristr($file,".txt~"))
				continue;
			if($xdccList = file_get_contents(PACKDIR.$file)) {
				$bot = array();
				preg_match_all("/#(\d+)\s+\d+x\s+\[.*?(\d+\.?\d+?)(\D)\]\s+(.*)\.(.*?)\W/mi",$xdccList,$bot['packs']);
				preg_match("/\s+\*\*\s+To\s+request\s+a\s+file,\s+type\s+\"\/msg\s+(.*?)\s+xdcc\s+send|get\s+#x\"\s+\*\*\s+\W/mi",$xdccList,$data['nick']);
				$bot['nick'] = $data['nick'][1];
				for($i=0;$i<count($bot['packs'][0]);$i++) {
					$bot['packs'][2][$i] = round($bot['packs']['2'][$i]*doubleval($sizes[$bot['packs'][3][$i]]));
					$bot['packs'][4][$i] .= ".".$bot['packs'][5][$i];
					$bot['packs'][6][$i] = preg_replace("/(.+)(\[|\()[a-f0-9]{8}(\]|\))/i","$1",$bot['packs'][4][$i]);
				}
				unset($bot['packs'][0],$bot['packs'][5],$bot['packs'][3]);
				$bots[] = $bot;
			}
		}
		file_put_contents("./cache/xp_cache",serialize($bots));
		function_exists("xcache_set") ? xcache_set(XCACHE_VAR,$bots) : null;
	}
}

?>
