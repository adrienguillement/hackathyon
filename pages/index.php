<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;

include("../include/header.php");

$connect=new Connection();

$tablQ=$connect->request('select numCategorie from correspondance_PDL');
$bat=[];
$date='01/01/2016';
foreach($tablQ as $categ) {
    $bat[]=$categ[0];
    $bat[]=$date;
    $test=$connect->request('SELECT donnees_LRY_enedis.'.$categ[0].' FROM donnees_LRY_enedis WHERE Date LIKE "'.$date.'%" ');
    $bat[]=$test;
}
var_dump($bat);
