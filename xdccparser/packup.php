<?
if(function_exists("xcache_unset")) xcache_unset("xp_bots");
unlink("./cache/xp_cache");
require_once "init.php";

//If you uncomment the following block of code (and comment the preceding block),
//you can upload a packlist to this page and it will replace the old packlist and update cache together.

/*
if($_REQUEST['bot'] && $_FILES['packlist'] && strtoupper(end(explode(".", $_FILES['packlist']['name']))) == "TXT") 
{
	move_uploaded_file($_FILES['packlist']['tmp_name'], "./packlists/".$_POST['bot'].".txt");	
	xcache_unset("xp_bots");
	unlink("./cache/xp_cache");
	require_once "init.php";
}
*/

?>
