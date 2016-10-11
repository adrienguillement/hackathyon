<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;
$connect=new Connection();
$date = '30/12/2015';
while(){
    $tablQ=$connect->request('SELECT AVG(donnees_LRY_enedis.14303937) FROM donnes_LRY_enedis WHERE `Date=`"'.$date.'%"');
}

include("../include/footer.php");