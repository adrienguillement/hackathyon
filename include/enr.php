

<?php

include("../include/header.php");

$prixEolien=1000; //€.kW
$prixPhotovol=51; //€.kW


//tableau
$html = '<table class="table table-striped table-hover ">';
$html.= '<thead>';
$html.= '<th>Filière Energétique</th><th>Prix (en €/kW)</th>';
$html.= '</thead>';
$html.='<tbody>';
$html.='<tr>';
$html.='<td>' .'Eolien'. '</td>';
$html.='<td>' .$prixEolien. '</td>';
$html.='</tr>';
$html.='<tr>';
$html.='<td>' .'Photovoltaic'. '</td>';
$html.='<td>' .$prixPhotovol. '</td>';
$html.='</tr>';
$html.='</tbody>';
$html.= '</table>';

echo $html;