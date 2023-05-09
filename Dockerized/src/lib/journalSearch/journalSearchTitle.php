<?php
require_once ('journalSearchManager.php');
function getJournalByTitle($db, $queryStr){
    $q_where = '1=0';
    $q = str_replace(':','',str_replace('(','',str_replace(')','',$queryStr)));
    $qwords=explode(" ",$q);
    $num_user_words=count($qwords);
    if($num_user_words>0) 
	{
	    $q_where='';
        for ($i=0;$i<$num_user_words;$i++) 
		{
            if (issdStopword($db, $qwords[$i])==0) 
			{
                    if(findme($qwords[$i],"'")) $q_where.='journalTitle like "%'.$qwords[$i].'%" AND ';
                    else $q_where.="journalTitle like '%".$qwords[$i]."%' AND ";
            }
        }
        $q_where=substr($q_where,0,-5);
	}
    
    $qString = "SELECT * FROM sdJournals WHERE $q_where";
	$res=$db->query($qString);
	if($db->numrows($res)>0) $return = $res;
	else $return = false;
	return $return;
}