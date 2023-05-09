<?php
require_once ('journalSearchManager.php');
function getJournalByID($db, $journalID){
    $q_where = "journalID  = $journalID";
    $qString = "SELECT * FROM sdJournals WHERE $q_where";
	$res=$db->query($qString);
	if($db->numrows($res)>0) $return = $res;
	else $return = false;
	return $return;
}