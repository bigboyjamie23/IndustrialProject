<?php
require_once ('journalSearchManager.php');
function getJournalByIssn($db, $Issn){
    $q_where = '1=0';
    $q_where = "trim( replace( journalISSNonline , '-', '' ) ) = '$Issn' OR  trim( replace( journalISSNprint , '-', '' ) )  = '$Issn'";
    $qString = "SELECT * FROM sdJournals WHERE $q_where";
	$res=$db->query($qString);
	if($db->numrows($res)>0) $return = $res;
	else $return = false;
	return $return;
}