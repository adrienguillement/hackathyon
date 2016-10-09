<?php
include '../class/kernel/Connection.php';
include '../include/function.php';
use Kernel\Connection;

include("../include/header.php");

$connect=new Connection();

$bat=[];
$date='01/12/2015';

while($date!='30/09/2016') {
    $test=$connect->request('SELECT "'.$date.'", AVG(donnees_LRY_enedis.14302352) FROM donnees_LRY_enedis WHERE Date LIKE "'.$date.'%"');
    $bat[]=$test[0];
    $date=addDate($date);
}


$html='<table class="table.table-striped">
       <tr>
       <th>Date</th>
       <th>Moyenne de la consommation</th>
       </tr>';
foreach($bat as $row){
    $html.='<tr>';
    foreach($row as $cel){
        $html.='<td>'.$cel.'</td>';
    }
    $html.='</tr>';
}
$html.='</table>';
var_dump($bat);