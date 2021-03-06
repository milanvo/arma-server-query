<?php
error_reporting(E_ALL);

// ArmA Server Query Class
require("arma.php");

// Content begin
//
echo "<h3>Server status</h3>\n";

// *************************************************************************************************
// LANGUAGE
// **************
// Can be set by URL parameter LANG - http://www.server.com/armaquery.php?lang=dk
// or set default language - see below
// 
// Available languages :
// "en" - English
// "cs" - Czech
// "dk" - Danish
// "de" - German
// *************************************************************************************************
// Default language : 
$lang="en";

// *************************************************************************************************
// SERVER ADDRESS
// **************
// Can be set to fixed value by uncommenting following variable, by URL - http://www.server.com/armaquery.php?server=arma.server.com:2302
// format is: address:port
// address - IP or FQDN (Fully qualified domain-name of server
// port - portnumber, where game is hosted (default 2302), has to be set - even if default
// *************************************************************************************************
// $server="dedicated.server.com:2302";

if (isset($server)) {
	$server=addslashes(htmlspecialchars(strip_tags($server),ENT_QUOTES));
  @list($serveradr,$serverport)=explode(":",$server);
}

// Change language if requested by URL parameter
if (isset($_GET["lang"]))
	$lang=addslashes(htmlspecialchars(strip_tags($_GET["lang"]),ENT_QUOTES));

// create new Class object, parameter is language
$arma=new Arma($lang);

// check existence of required variables
if ((isset($serveradr) && isset($serverport)) && (!empty($serveradr) && !empty($serverport))) {

// *************************************************************************************************
// * Syntax:                                                                                       *
// * getServerinfo($serveradr,$serverport,2000,"scores"), where:                                   *
// *                                                                                               *
// * $serveradr=IP or FQDN (Fully qualified domain-name of server,                                 *
// * $serverport=portnumber, where game is hosted (default 2302), has to be set - even if default, *
// *                                                                                               *
// * 2000=timeout, leave this @ 2000 if querying, against servers with large ping.                 *
// * "score"=sortby scores, other values to sort by: "name", "team", "deaths"                   *
// *************************************************************************************************

// *************************************************************************************************
// * If $status gets defined, Success querying server, otherwise failure                           *
// *************************************************************************************************
if ($status=$arma->getServerinfo($serveradr,$serverport,2000,"team")) {

	// **********************************************************************************
	// * Print out server-values, e.g. $arma->m_servervars["hostname"], for servername   *
	// **********************************************************************************
	echo "<h4>".$arma->text["label"]["serverH"]."</h4>\n";
	echo "<table>";
	echo "<tr><td>".$arma->text["label"]["game"]."</td><td>".$arma->text["label"]["arma"]."</td></tr>\n";
	// generate table from Arrays
	foreach($arma->text["slabel"] as $key=>$value)
		echo "<tr><td>".$value."</td><td>".$arma->m_servervars[$key]."</td></tr>\n";

	if ($arma->m_servervars["maxplayers"]!=0) {
		$serverload=floor($arma->m_servervars["numplayers"]/$arma->m_servervars["maxplayers"]*100);		
		echo "<tr><td>".$arma->text["label"]["serverLoad"]."</td><td>0%|<img src=\"pixel.gif\" height=\"8\" width=\"$serverload\" alt=\"pixel\" /><img src=\"pixel2.gif\" height=\"8\" width=\"".(100-$serverload)."\" alt=\"pixel2\" />|100% (<b>$serverload%</b>)</td></tr>\n";
	} 
	echo "</table>";
	// **********************************************************************************
	// * End of Basic info table                                                        *
	// **********************************************************************************

	// **********************************************************************************
	// * If players>0, print out extended info of server                                *
	// **********************************************************************************
	if ($arma->m_servervars["numplayers"]<>0) {
		echo "<h4>".$arma->text["label"]["missionH"]."</h4>\n";
		echo "<table>\n";
		// generate table from Arrays
		foreach($arma->text["mlabel"] as $key=>$value)
			echo "<tr><td>".$value."</td><td>".$arma->m_servervars[$key]."</td></tr>\n";
		echo "</table>\n";
		// **********************************************************************************
		// * End of general Extended info table                                             *
		// **********************************************************************************

		// **********************************************************************************
		// * Print out player-info for ALL players on server
		// **********************************************************************************
		if (is_array($arma->m_playerinfo)) {
			echo "<h4>".$arma->text["label"]["playersH"]."</h4>\n";
			echo "<table>\n";
			echo $arma->playerhead();
			foreach($arma->m_playerinfo as $player) {
				echo "<tr><td>".$player["name"]."</td><td>".(empty($player["team"]) ? "&nbsp;" : $player["team"]);
				echo "</td><td>".$player["score"]."</td><td>".$player["deaths"]."</td></tr>\n";
			}
			echo "</table>\n";
			// **********************************************************************************
			// * End of player-info table                                                       *
			// **********************************************************************************
		}
	}
} else { 
	// if query unsuccessfull, call function for error handling - display error message 
	$arma->error(" - ".$server);
}
}
else
{
	// incorrect or incomplete input parameters in URL 
	if (isset($server)) {
		$arma->errmsg="incparam";
		$arma->error();
	}
}

// display credits 
echo $arma->text["credit"];

?>
