<?

$bots = array();
$bots['name'] = "http://www.hi.com/packlist.txt";

foreach($bots as $name => $bot)
	file_put_contents("./packlists/".$name.".txt",file_get_contents($bot));

if(function_exists("xcache_unset")) xcache_unset("xp_bots");
unlink("./cache/xp_cache");
require_once "init.php";

?>
