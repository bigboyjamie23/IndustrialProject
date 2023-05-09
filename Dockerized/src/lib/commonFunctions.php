<?php 
////  //// ticTOCs common PHP functions  ////
if(preg_match("/commonFunctions\.php/", $_SERVER['PHP_SELF'])) { die("Access denied"); }
///////////////////////////////////////////////////////////////////
function load_file($file){
  $str = '';
  if ($fp=fopen($file, 'r')) {
     while(!feof($fp)) $str.=fgets($fp, 1024);
	 fclose($fp);
	 return $str;
  } 
  return false;
}
//////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////// 
function findme($mystring,$findme) {
  $pos = strpos($mystring, $findme);
	if ($pos === false) return false;
  else return true;
}
?>
