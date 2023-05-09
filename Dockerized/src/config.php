<?php 
$serviceDir = '/home/gla/jl2135/public_html/Dockerized/';
$libDir = $serviceDir.'src/lib/';
// common functions
require_once($libDir.'commonFunctions.php');
require_once($libDir.'getURLquery.php');
require_once($libDir.'getFormValues.php');
require_once($libDir.'userDataCheck2.php');
require_once($libDir.'databaseConnection.php');
// to stablish a MySQL connection:
$thisdb = $database = 'jl2135';
$db = connectDB("$thisdb");
if(!$db) echo "DB-conn error";

$baseURL = $URL = 'https://www2.macs.hw.ac.uk/~jl2135/Dockerized/';
$domain = 'https://www.journaltocs.ac.uk'; 
$indexphp = 'index.php';
$inputBatchDir = $serviceDir.'inputFiles';
$outputBatchDir = $serviceDir.'outputFiles';
?>
