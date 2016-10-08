<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;

include("../include/header.php");

$connect=new Connection();

$tablQ=$connect->request('select donnees_LRY_enedis.14300186, Date from donnees_LRY_enedis');
var_dump($tablQ[0]);

$html='';

$html="<table class='table-bordered table-responsive'>
            <tr>
                <th>colonne1</th>
                <th>colonne 2</th>
</tr>";
foreach ($tablQ as $t){
    $html.='<tr>';
    foreach($t as $c){
        $html.='<td>'.$c.'</td>';
    }
    $html.='</tr>';
}
$html.="</table>";
echo $html;
