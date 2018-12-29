<?php
//
// ArmA Server Query STRING TABLE Version 1.00
// ------------------------------
//
// !!! UTF-8 encoding !!!
//
// Modify this file only if translating texts to new language !
// Current language is selected when creating Arma Class object - by default in ARMAQUERY.PHP 
//

// available languages array
$a_langs = array("en","cs","dk","de");	

// return text array by selected language
function a_selectText($a_lang)
{
$a_text=array();

// ENGLISH start ------
if ($a_lang=="en")
{
	$a_text["server"]["mapname"]["sara"]="Sahrani";
	$a_text["server"]["mapname"]["intro"]="Rahmadi";

	$a_text["server"]["difficulty"][0]="Standard";
	$a_text["server"]["difficulty"][1]="Veteran";

	$a_text["server"]["mod"]["ca"]="Armed Assault";

	$a_text["server"]["gameState"][1]="No mission selected";
	$a_text["server"]["gameState"][3]="Players assignment";
	$a_text["server"]["gameState"][5]="Loading mission";
	$a_text["server"]["gameState"][6]="Briefing";
	$a_text["server"]["gameState"][7]="Game in progress";
	$a_text["server"]["gameState"][8]="Debriefing";
	$a_text["server"]["gameState"][9]="Debriefing";

	$a_text["password"][0]="Public";
	$a_text["password"][1]="Private";

	$a_text["dedicated"]="Dedicated";
	$a_text["unset"]="Not set";

	$a_text["players"]["name"]="Nick";
	$a_text["players"]["team"]="Squad";
	$a_text["players"]["score"]="Score";
	$a_text["players"]["deaths"]="Deaths";

	$a_text["label"]["serverH"]="Basic server info";
	$a_text["label"]["game"]="Game";
	$a_text["label"]["arma"]="Armed Assault";
	$a_text["slabel"]["hostname"]="Hostname";
	$a_text["slabel"]["currentVersion"]="Version";
	$a_text["slabel"]["requiredVersion"]="Required version";
	$a_text["slabel"]["servertype"]="Server type";
	$a_text["slabel"]["gameState"]="Game status";
	$a_text["slabel"]["numplayers"]="# players";
	$a_text["slabel"]["maxplayers"]="Max. players";
	$a_text["label"]["serverLoad"]="Server load";

	$a_text["label"]["missionH"]="Mission details";
	$a_text["mlabel"]["mission"]="Mission";
	$a_text["mlabel"]["gametype"]="Game type";
	$a_text["mlabel"]["mapname"]="Island";
	$a_text["mlabel"]["mod"]="Mod";
	$a_text["mlabel"]["difficulty"]="Difficulty";
	$a_text["mlabel"]["timelimit"]="Time limit (minutes)";
	$a_text["mlabel"]["param1"]="param1";
	$a_text["mlabel"]["param2"]="param2";

	$a_text["label"]["playersH"]="Player table";

	$a_text["err"]["nocon"]="No connection";
	$a_text["err"]["contime"]="Connection timed out";
	$a_text["err"]["incdat"]="Incorrect data";
	$a_text["err"]["incparam"]="Incorrect parameters";
	$a_text["err"]["unable"]="Unable to contact server, probably down";

}
// ENGLISH end ------

// CZECH start ------
elseif ($a_lang=="cs")
{
	$a_text["server"]["mapname"]["sara"]="Sahrani";
	$a_text["server"]["mapname"]["intro"]="Rahmadi";

	$a_text["server"]["difficulty"][0]="Standard";
	$a_text["server"]["difficulty"][1]="Veterán";

	$a_text["server"]["mod"]["ca"]="Armed Assault";

	$a_text["server"]["gameState"][1]="Čeká se na výběr mise";
	$a_text["server"]["gameState"][3]="Přiřazení hráčů";
	$a_text["server"]["gameState"][5]="Mise se nahrává";
	$a_text["server"]["gameState"][6]="Briefing";
	$a_text["server"]["gameState"][7]="Hra probíhá";
	$a_text["server"]["gameState"][8]="Debriefing";
	$a_text["server"]["gameState"][9]="Debriefing";

	$a_text["password"][0]="Bez hesla";
	$a_text["password"][1]="Pod heslem";

	$a_text["dedicated"]="Dedikovaný";
	$a_text["unset"]="Nenastaveno";

	$a_text["players"]["name"]="Nick";
	$a_text["players"]["team"]="Squad";
	$a_text["players"]["score"]="Skóre";
	$a_text["players"]["deaths"]="Zabit";

	$a_text["label"]["serverH"]="Základní informace";
	$a_text["label"]["game"]="Hra";
	$a_text["label"]["arma"]="Armed Assault";
	$a_text["slabel"]["hostname"]="Název serveru";
	$a_text["slabel"]["currentVersion"]="Verze serveru";
	$a_text["slabel"]["requiredVersion"]="Požadovaná verze klienta";
	$a_text["slabel"]["servertype"]="Přístup";
	$a_text["slabel"]["gameState"]="Stav hry";
	$a_text["slabel"]["numplayers"]="Počet hráčů";
	$a_text["slabel"]["maxplayers"]="Max. hráčů";
	$a_text["label"]["serverLoad"]="Obsazenost serveru";

	$a_text["label"]["missionH"]="Detaily mise";
	$a_text["mlabel"]["mission"]="Mise";
	$a_text["mlabel"]["gametype"]="Druh mise";
	$a_text["mlabel"]["mapname"]="Ostrov";
	$a_text["mlabel"]["mod"]="Mod";
	$a_text["mlabel"]["difficulty"]="Obtížnost";
	$a_text["mlabel"]["timelimit"]="Časový limit (minut)";
	$a_text["mlabel"]["param1"]="param1";
	$a_text["mlabel"]["param2"]="param2";

	$a_text["label"]["playersH"]="Připojení hráči";

	$a_text["err"]["nocon"]="Nepodařilo se připojit";
	$a_text["err"]["contime"]="Nepodařilo se připojit v časovém limitu";
	$a_text["err"]["incdat"]="Nesprávná data";
	$a_text["err"]["incparam"]="Nesprávné parametry dotazu";
	$a_text["err"]["unable"]="Není možno se spojit se serverem. Zřejmě neběží, nebo je problém s komunikací.";

}
// CZECH end ------

// DANISH start ------
elseif ($a_lang=="dk")
{
	$a_text["server"]["mapname"]["sara"]="Sahrani";
	$a_text["server"]["mapname"]["intro"]="Rahmadi";

	$a_text["server"]["difficulty"][0]="Standard";
	$a_text["server"]["difficulty"][1]="Veteran";

	$a_text["server"]["mod"]["ca"]="Armed Assault";

	$a_text["server"]["gameState"][1]="Ingen missioner valgt";
	$a_text["server"]["gameState"][3]="Spillere g&oslash;res klar";
	$a_text["server"]["gameState"][5]="Indl&aelig;ser mission";
	$a_text["server"]["gameState"][6]="Briefing igang";
	$a_text["server"]["gameState"][7]="Spil igang";
	$a_text["server"]["gameState"][8]="Debriefing igang";
	$a_text["server"]["gameState"][9]="Debriefing igang";

	$a_text["password"][0]="&Aring;ben (adgang for alle)";
	$a_text["password"][1]="Lukket (kodeord p&aring;kr&aelig;vet)";

	$a_text["dedicated"]="Dedikeret";
	$a_text["unset"]="Ikke sat";

	$a_text["players"]["name"]="Navn";
	$a_text["players"]["team"]="Enhed";
	$a_text["players"]["score"]="Point";
	$a_text["players"]["deaths"]="D&oslash;dsfald";

	$a_text["label"]["serverH"]="Basis server-information";
	$a_text["label"]["game"]="Spil";
	$a_text["label"]["arma"]="Armed Assault";
	$a_text["slabel"]["hostname"]="Servernavn";
	$a_text["slabel"]["currentVersion"]="Version";
	$a_text["slabel"]["requiredVersion"]="P&aring;kr&aelig;vet version";
	$a_text["slabel"]["servertype"]="Server type";
	$a_text["slabel"]["gameState"]="Spillets status";
	$a_text["slabel"]["numplayers"]="# Spillere";
	$a_text["slabel"]["maxplayers"]="Max. Spillere";
	$a_text["label"]["serverLoad"]="Server belastning";

	$a_text["label"]["missionH"]="Detaljeret server-information";
	$a_text["mlabel"]["mission"]="Mission";
	$a_text["mlabel"]["gametype"]="Spil type";
	$a_text["mlabel"]["mapname"]="Missionen spilles p&aring;";
	$a_text["mlabel"]["mod"]="Modifikation";
	$a_text["mlabel"]["difficulty"]="Sv&aelig;rhedsgrad";
	$a_text["mlabel"]["timelimit"]="Tidsgr&aelig;nse (minutter)";
	$a_text["mlabel"]["param1"]="param1";
	$a_text["mlabel"]["param2"]="param2";

	$a_text["label"]["playersH"]="Spillerliste";

	$a_text["err"]["nocon"]="Ingen forbindelse";
	$a_text["err"]["contime"]="Forbindelsen brev afbrudt";
	$a_text["err"]["incdat"]="Forkert data";
	$a_text["err"]["incparam"]="Forkerte parametre";
	$a_text["err"]["unable"]="Ikke i stand til at oprette forbindelse til serveren";

}
// DANISH end ------

// GERMAN start ------
elseif ($a_lang=="de")
{
	$a_text["server"]["mapname"]["sara"]="Sahrani";
	$a_text["server"]["mapname"]["intro"]="Rahmadi";
	
	$a_text["server"]["difficulty"][0]="Standard";
	$a_text["server"]["difficulty"][1]="Veteran";

	$a_text["server"]["mod"]["ca"]="Armed Assault";

	$a_text["server"]["gameState"][1]="Keine Mission gew&auml;hlt";
	$a_text["server"]["gameState"][3]="Spieler werden zugewiesen";
	$a_text["server"]["gameState"][5]="Lade Mission";
	$a_text["server"]["gameState"][6]="Missionsbesprechung";
	$a_text["server"]["gameState"][7]="Spiel l&auml;uft";
	$a_text["server"]["gameState"][8]="Abschlussbesprechung";
	$a_text["server"]["gameState"][9]="Abschlussbesprechung";

	$a_text["password"][0]="Offen";
	$a_text["password"][1]="Geschlossen";

	$a_text["dedicated"]="Dediziert";
	$a_text["unset"]="Nicht gesetzt";

	$a_text["players"]["name"]="Spielername";
	$a_text["players"]["team"]="Squad";
	$a_text["players"]["score"]="Punkte";
	$a_text["players"]["deaths"]="Gestorben";

	$a_text["label"]["serverH"]="Server Info";
	$a_text["label"]["game"]="Spiel";
	$a_text["label"]["arma"]="Armed Assault";
	$a_text["slabel"]["hostname"]="Server Name";
	$a_text["slabel"]["currentVersion"]="Version";
	$a_text["slabel"]["requiredVersion"]="Ben&ouml;tigte Version";
	$a_text["slabel"]["servertype"]="Server Typ";
	$a_text["slabel"]["gameState"]="Spiel Status";
	$a_text["slabel"]["numplayers"]="# Spieler";
	$a_text["slabel"]["maxplayers"]="Max. Spieler";
	$a_text["label"]["serverLoad"]="Server Auslastung";

	$a_text["label"]["missionH"]="Missions Details";
	$a_text["mlabel"]["mission"]="Mission";
	$a_text["mlabel"]["gametype"]="Spiel Typ";
	$a_text["mlabel"]["mapname"]="Insel";
	$a_text["mlabel"]["mod"]="Mod";
	$a_text["mlabel"]["difficulty"]="Schwierigkeitsgrad";
	$a_text["mlabel"]["timelimit"]="Zeit Limit (minutes)";
	$a_text["mlabel"]["param1"]="param1";
	$a_text["mlabel"]["param2"]="param2";

	$a_text["label"]["playersH"]="Spieler Daten";

	$a_text["err"]["nocon"]="Keine Verbindung";
	$a_text["err"]["contime"]="Verbindung verloren";
	$a_text["err"]["incdat"]="Inkorrekte Datan";
	$a_text["err"]["incparam"]="Inkorrekte Parameter";
	$a_text["err"]["unable"]="Kann Server nicht erreichen, vermutlich offline";

}
// GERMAN end ------

// Language neutral common texts ------

	$a_text["credit"]="<p>Based on PHP code from <a href=\"http://www.wkk.dk\">[WKK]</a> RealTime Server Query (RTSQ) for OFP.<br/>
Rewritten for ArmA by <a href=\"mailto:mivo@post.cz\">Mivo</a> with big help of <a href=\"http://6thsense.eu\">6th Sense advSQ</a>.</p>"; 
	$a_text["credit"].="<p>Version: 1.00 (20070306)</p>";

return $a_text;

// END function a_selectText()
}

?>
