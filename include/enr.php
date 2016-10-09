<?php

include("../include/header.php");
include '../class/kernel/Connection.php';
use Kernel\Connection;

$prixEolien=8.2; //c€.kWh
$prixPhotovol=46; //c€.kWh

//calcul de consommation pour chaque batiment en kW

$connect=new Connection();
$numCateg=$connect->request('SELECT numCategorie from correspondance_PDL');

foreach($numCateg as $categ) {
    $bat = $connect->request('SELECT donnees_LRY_enedis.' . $categ[0] . ' from donnees_LRY_enedis ORDER BY `donnees_LRY_enedis`.`id` ASC');
    $sum=0;
    $compt=0;
        foreach ($bat as $val ) {
            $val = intval($val[0]);
            //total de valeurs supérieur à 0 (chauffage en marche)
    /*       if ($val!='0'){
                $compt++;
            }*/
            $sum += $val;
        }
    //$nombreArretChauffage=(43920-$compt);
    //sum = total de kw pour un batiment

    //conso Wh
    $nbConso=$connect->request('SELECT nbConso FROM conso');
    foreach ($nbConso as $conso){
        $conso = intval($conso[0]);
        $consoHeures=($conso/60);
        $consoEnerg=$sum/$consoHeures;
        var_dump($consoEnerg);
    }

}



//tableau
$html = '<table class="table table-striped table-hover ">';
$html.= '<thead>';
$html.= '<th>Filière Energétique</th><th>Prix (en c€/kWh)</th>';
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