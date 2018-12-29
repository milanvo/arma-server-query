<?php
//
// ArmA Server Query CLASS Version 1.00
// ------------------------------
//
// Modify this file only if want change behavior of this class !
// All parameters like SERVER and LANGUAGE, web page formating etc. is set somewhere else
// - by default in ARMAQUERY.PHP 
//
// Based on PHP code from [WKK] RealTime Server Query (RTSQ) for OFP - http://www.wkk.dk
// Rewritten for ArmA by Mivo - mivo@post.cz with big help of 6th Sense advSQ - http://6thsense.eu
//

// Version history:

// 2007-03-06 (Version 1.00)
// - initial release
// - PHP code rewrite and cleanup, language file for easy translation, XHTML compatibility 
// - player table can be sorted by click on table head

//
//	Functions used to sort players by scores, deaths, teams or names.
//	Needs to be defined globally in order for usort to call it
// 	

require("arma_text.php");

function ascoresort ($a, $b) {
	if ($a["score"] == $b["score"]) return 0;
	if ($a["score"] > $b["score"]) {
		return -1;
	} else {
		return 1;
	}
}

function anamesort ($a, $b) {
	if (strtolower($a["name"]) == strtolower($b["name"])) return 0;
	if (strtolower($a["name"]) < strtolower($b["name"])) {
		return -1;
	} else {
		return 1;
	}
}	

function adeathsort ($a, $b) {
	if ($a["deaths"] == $b["deaths"]) return 0;
	if ($a["deaths"] > $b["deaths"]) {
		return -1;
	} else {
		return 1;
	}
}	

function ateamsort ($a, $b) {
	if (strtolower($a["team"]) == strtolower($b["team"])) return 0;
	if (strtolower($a["team"]) < strtolower($b["team"])) {
		return -1;
	} else {
		return 1;
	}
}	

Class Arma {
  //variables
	var $m_playerinfo		="";		// Info about players
	var $m_servervars		="";		// Info about the server 
	var $m_serverraw		="";		// RAW info about the server
	var $sortby					="";		// current player sorting order 

	var $errmsg			="";

	var $lang;      // current language
  var $text;      // texts array

	//
	// System definition. Which system is PHP running @ 0 (default) = Linux/Unix, 1 = Windows
	// This HAS to be defined, as Windows does NOT support socket_timeout functions in PHP.
	//
	// Mivo: NOT need any more ? Works on Windows too without problems.
	// 
	var $system			=0;

	// constructor - set current language and fill text array
	function Arma($set_lang="en")
  {
		if (isset($set_lang))
		{
			if (in_array($set_lang,$GLOBALS["a_langs"]))
				$this->lang=$set_lang;
			else
				$this->lang="en";
		}
		else
			$this->lang="en";
			
		$this->text=a_selectText($this->lang);
	}

	//
	// Get exact time, used for timeout counting
	//
	function timenow() {
		return doubleval(ereg_replace('^0\.([0-9]*) ([0-9]*)$','\\2.\\1',microtime()));
	}	

	//
	// Read raw data from server
	//
	function getServerData($command,$serveraddress,$portnumber,$waittime) {
		$serverdata		="";
		$serverdatalen=0;
		
		if ($waittime< 500) $waittime= 500;
		if ($waittime>2000) $waittime=2000;
		$waittime=doubleval($waittime/1000.0);

		if (!$ofpsocket=fsockopen("udp://".$serveraddress,$portnumber,$errnr)) {
			$this->errmsg="nocon";
			return false;
		}
	
		socket_set_blocking($ofpsocket,true);
		if ($this->system==0) socket_set_timeout($ofpsocket,0,500000);
		fwrite($ofpsocket,$command,strlen($command));	

		$starttime=$this->timenow();

		do {
			$serverdata.=fgetc($ofpsocket);
			$serverdatalen++;
			$socketstatus=socket_get_status($ofpsocket);
			if ($this->timenow()>($starttime+$waittime)) {
				$this->errmsg="contime";
				fclose($ofpsocket);
				return false;
			}
		} while ($socketstatus["unread_bytes"]);

		fclose($ofpsocket);
		return $serverdata;		
	}	


	//
	// Translate server states to human readeble form
	// 
	function correctdata ()
	{
		// Cycle through available server status translation array
		foreach ($this->text["server"] as $key => $value) {
			if (isset($this->m_servervars[$key]) && isset($value[strtolower($this->m_servervars[$key])]))
				$this->m_servervars[$key] = $value[strtolower($this->m_servervars[$key])];
		}

		// Password protected
		$this->m_servervars["servertype"]=$this->text["password"][$this->m_servervars["password"]];

		// max players
		if ($this->m_servervars["maxplayers"]==0)
			$this->m_servervars["maxplayers"]=$this->text["unset"];

		// timelimit
		if ($this->m_servervars["timelimit"]==0)
			$this->m_servervars["timelimit"]=$this->text["unset"];

		// version
		$this->m_servervars["currentVersion"].=" ".$this->m_servervars["platform"]." ".($this->m_servervars["dedicated"]==1 ? $this->text["dedicated"] : 0);
	}
	
	//
	// Generate HTML table head for player sorting
	// 
	function playerhead ()
	{
		$sortby=$this->sortby;
		$output="";
		$url=$_SERVER["PHP_SELF"]."?";
		$qs="";

		foreach($_GET as $key => $value) {
			if ($key!="sort")
				$qs.=$key."=".$value."&amp;";
		}

		$url.=$qs."sort=";		

		if ($this->m_servervars["numplayers"]>0) {
			$output="<tr>";
			foreach($this->text["players"] as $key => $value)
				$output.="<th>".($sortby==$key ? $value : "<a href=\"".$url.$key."\">".$value."</a>")."</th>";
			$output.="</tr>\n";
		}

		return $output;
	}


	function sortplayers ()
	{
		// If there are players on the server we sort them by defined column
		if ($this->m_servervars["numplayers"]>0)
		{
			if (isset($_GET["sort"])) {
				$sortby=$_GET["sort"];				
				$this->sortby=$sortby;
			} else {
				$sortby=$this->sortby;				
			}

			if ($sortby=="score")
				usort($this->m_playerinfo,"ascoresort");
			elseif ($sortby=="deaths")
				usort($this->m_playerinfo,"adeathsort");
			elseif ($sortby=="team")
				usort($this->m_playerinfo,"ateamsort");
			elseif ($sortby=="name")
				usort($this->m_playerinfo,"anamesort");
			else
				// If NO or INCORRECT sortvalue given - players will be sorted by score
				usort($this->m_playerinfo,"ascoresort");
		}
	}

	// **********************************************************************
	// getServerStatus
	// Read rules/setup from the gameserver into servervars
	// Return true if successful
	// **********************************************************************	
	function getServerinfo ($serveraddress,$portnumber,$timeout,$sortby) {

		$cmd=pack("c*",0xFE,0xFD,0x00,0x04,0x05,0x06,0x07,0xFF,0xFF,0xFF);
		$sig=pack("c*",0x00,0x04,0x05,0x06,0x07);
		$p_head="player_\x00team_\x00score_\x00deaths_\x00\x00";

		$this->sortby=$sortby;

		$serverdata=$this->getServerData($cmd,$serveraddress,$portnumber,$timeout);

		if ($serverdata!=false)	{
			if (substr($serverdata,0,strlen($sig))!=$sig) {
				$this->errmsg="incdat";
				return false;
			} else {
				$serverdata=substr($serverdata,strlen($sig));
	
				$g_end  = strpos($serverdata, $p_head);
				$g_info = substr($serverdata, 0, $g_end);
	 			$g_info = explode("\x00",$g_info);
	
				$p_end  = strlen($serverdata);
				$p_info = substr($serverdata, $g_end+strlen($p_head), $p_end);
	 			$p_info = explode("\x00",$p_info);
	
				// Split data and fill into array
				for ($i=0;$i<count($g_info);$i=$i+2) {
					$key=$g_info[$i];
					if ($i+1>=count($g_info)) break;
					$data=$g_info[$i+1];
					if ($key != "\x00") 
						$this->m_serverraw[$key]=$data;
				}
	
				// copy parsed RAW data for debuging etc. 
				$this->m_servervars=$this->m_serverraw;
	
				// Split player table into array
				for ($i=0;$i<count($p_info);$i=$i+4)
				{
					$name=$p_info[$i];
					if (!empty($name)) 
						$this->m_playerinfo[]=array("name"=>$name,
																				"team"=>$p_info[$i+1],
																				"score"=>$p_info[$i+2],
																				"deaths"=>$p_info[$i+3]);
				}
	
				// translate some variables to hunam readable form
				$this->correctdata();
				
				// sort player table
				$this->sortplayers();
				
				// print debug info if requested by URL ...&debug=1
				$this->debug();
	
				return true;
			}
		}
		else {
			// query unsuccessfull, set error and return FALSE
			if (empty($this->errmsg))
				$this->errmsg="unable";
			return false;
		}
	}

	// print debug info if requested by URL ...&debug=1
	function debug()
	{
		if (isset($_GET["debug"])) {
			echo "<p>";
			echo "<strong>m_serverraw:</strong><br/>";
			print_r($this->m_serverraw);
			echo "</p>";

			echo "<p>";
			echo "<strong>m_servervars:</strong><br/>";
			print_r($this->m_servervars);
			echo "</p>";

			echo "<p>";
			echo "<strong>m_playerinfo:</strong><br/>";
			print_r($this->m_playerinfo);
			echo "</p>";
		}
	}

	// print error message
	function error($message="")
	{
		echo "<p class=\"error\">";
		if (empty($this->errmsg))
			echo $message;
		else
			echo $this->text["err"][$this->errmsg]." ".$message;
		echo "</p>";
	}

}
?>
