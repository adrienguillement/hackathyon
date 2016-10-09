<?php

include("../include/header.php");
include '../class/kernel/Connection.php';
use Kernel\Connection;

$prixEolien = 8.2; //c€.kWh
$prixPhotovol = 46; //c€.kWh

//tableau
$html = '<table class="table table-striped table-hover ">';
$html .= '<thead>';
$html .= '<th>Filière Energétique</th><th>Prix (en centimes d\'€/kWh)</th>';
$html .= '</thead>';
$html .= '<tbody>';
$html .= '<tr>';
$html .= '<td>' . 'Eolien' . '</td>';
$html .= '<td>' . $prixEolien . '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>' . 'Photovoltaique' . '</td>';
$html .= '<td>' . $prixPhotovol . '</td>';
$html .= '</tr>';
$html .= '</tbody>';
$html .= '</table>';

echo $html;
//Calcul des couts
if(isset($_POST["surfacePP"])==null){
    $html='<form action="./enr.php" method="POST">
    <label>Sélectionner la surface de panneaux photovoltaîque :</label>
    <input type="text" name="surfacePP" /></br>
    <label>Sélectionner le nombres d\'éoliennes :</label>
    <input type="text" name="nbEolienne" /></br>
    <button type="submit">Calculer</button>
    </form>';
    echo $html;
}
else{
    $metre=$_POST["surfacePP"];
    $eolienne=$_POST["nbEolienne"];
    $coutPanneau=1000*$metre;
    $coutEolienne=10000*$eolienne;
    $html = '<table class="table table-striped table-hover ">';
    $html .= '<thead>';
    $html .= '<th>Cout installation panneaux photovoltaîque</th><th>Cout installation éoliennes</th>';
    $html .= '</thead>';
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td>' . $coutPanneau . '</td>';
    $html .= '<td>' . $coutEolienne . '</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    $html .= '</table>';
    echo $html;
}
//calcul de consommation pour chaque batiment en kW

$connect = new Connection();




include("../include/footer.php");