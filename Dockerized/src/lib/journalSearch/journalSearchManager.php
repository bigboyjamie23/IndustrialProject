<?php
require_once ('config.php');
require_once('journalSearchID.php');
require_once('journalSearchIssn.php');
require_once('journalSearchTitle.php');
///////////////////////////////////////////////////////////////////
function journalSearch($db, $q='') 
{
	$arrayOutput= array();
	if($q!='') 
	{
	    $q = trim($q);
	    if((findme($q,'-') && is_numeric(str_replace('X','',strtoupper(str_replace('-','',$q)))) && strlen($q)==9) || 
            (is_numeric(str_replace('X','',strtoupper($q))) && strlen($q)==8 && !findme($q,'-'))) 
		{
            $thisissn = trim(str_replace('-','',$q));
            $res = getJournalByIssn($db, $thisissn);
		} 
		else if(is_numeric($q) && $q>0 && $q<50000) 
		{
		    $journalID = $q;
            $res = getJournalByID($db, $journalID);
        } 
		else 
		{
            $res = getJournalByTitle($db, $q);
        }
		$arrayOutput = journalDataManagerOutput($db, $res);
	}
    return $arrayOutput;
}
///////////////////////////////////////////////////////////////////
function journalDataManagerOutput($db, $res) 
{
	$output = array();
	if($db->numrows($res)>0) 
	{
		while($row=$db->fetcharray($res)) 
		{
			$output[] = $row;
		}
	}
	//print_r($output); exit;
    return $output;
}
///////////////////////////////////////////////////////////////////

function issdStopword($db, $word) 
{
    $res = $db->query('SELECT word FROM sdStopword WHERE word="' . $word . '"');
    return $db->numrows($res);
}
?>