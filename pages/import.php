<?php
include '../class/kernel/Connection.php';
include '../include/function.php';
use Kernel\Connection;
$connect=new Connection();
$date = '01/12/2015';
$tablQ=[];
while($date!='30/09/2016'){
    $tablQ+=[];
    $tablQ=$connect->request('SELECT AVG(donnees_LRY_enedis.14303937) FROM donnees_LRY_enedis WHERE `Date` LIKE "'.$date.'%"');

    $date = addDate($date);
}
var_dump($tablQ);

include("../include/footer.php");