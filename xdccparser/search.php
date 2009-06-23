<?php

/**
 * XDCC Parser
 * |- Search Module
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
header( "Expires: Mon, 20 Dec 1998 01:00:00 GMT" );
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" );

function literalSearch($search) {
	global $t;
	if(($index = strpos($search,'"'))!== false && ($lastindex = strpos(substr($search,$index+1),'"'))!== false) {
		$t[] = addslashes(substr($search,$index+1,$lastindex));
		simpleSearch(substr($search,0,$index));
		literalSearch(substr($search,$index+$lastindex+2));
	} else {
		simpleSearch($search);
	}
}
function simpleSearch($search) {
	global $t;
	$search = str_replace(array("_", ";", "'", ".")," ",$search);
	$search = explode(" ",$search);
	$t = array_merge($t,$search);
}

$x = 0;
$t = array();
literalSearch(stripslashes($_GET['t']));
if($_GET['nick']) foreach($bots as $key => &$bot) if($bot['nick'] != $_GET['nick']) unset($bots[$key]);
foreach($t as $key => $arg)
	if(!$arg) unset($t[$key]);
$match = preg_match("/.*?[a-f0-9]{7}.*?/i",$_GET['t']) ? 4 : 6;

foreach($bots as &$bot) {
	$xpacks = array();
	$key = count($bot['packs']['1']);
	for($i=0;$i<$key;$i++) {
		foreach($t as $arg) {
			if(!stristr($bot['packs'][$match][$i],$arg)) {
				continue 2;
			}
		}
		$xpacks[$bot['packs'][1][$i]]['number'] = $bot['packs'][1][$i];
		$xpacks[$bot['packs'][1][$i]]['name'] = $bot['packs'][4][$i];
		$xpacks[$bot['packs'][1][$i]]['size'] = $bot['packs'][2][$i];
	}

	foreach($xpacks as $pack)
		print("packlist.packs[".$x++."] = {bot:\"".$bot['nick']."\", number:".$pack['number'].", size:".$pack['size'].", name:\"".$pack['name']."\"};\n");

}
?>
