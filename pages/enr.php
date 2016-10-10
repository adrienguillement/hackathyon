<?php

include("../include/header.php");
include '../class/kernel/Connection.php';
use Kernel\Connection;

$connect=new Connection();



if(!isset($_POST['building']) && !isset($_POST['surfacePP'])){
    $categorie = $connect->request('SELECT * from correspondance_PDL');
    echo '<form action="./enr.php" method="POST">
<div class="form-group has-success">
    <label class="control-label">Rechercher un bâtiment  :</label><input class="form-control" type="text" id="realtxt" onkeyup="javascript:searchSel();"/>
    </div>
    

    <select id="realitems" name="building">
    <option value="test">- - -</option>';


    for($i=0;$i<sizeof($categorie);$i++)
    {
        if($categorie[$i][2]=='null')
        {
            echo '<option name="'.$categorie[$i][0].'" value="'.$categorie[$i][0].'">'.$categorie[$i][0].'</option>';
        }
        else
        {
            echo '<option name="'.$categorie[$i][0].'" value="'.$categorie[$i][0].'">'.$categorie[$i][2].'</option>';
        }
    }
    echo '</select>
    <button class="btn btn-success" type="submit">GO</button>
    </form>';
}
else
{
    //Calcul des couts
    if(isset($_POST["surfacePP"])==null){
        $html='<form action="./enr.php" method="POST">
    <label class="text-success">Sélectionner la surface de panneaux photovoltaîque :</label>
    <input type="text" name="surfacePP" /></br>
    <label  class="text-success">Sélectionner le nombres d\'éoliennes :</label>
    <input type="text" name="nbEolienne" /></br>
    <input type="hidden" name="building" value="'.$_POST['building'].'"/></br>
    <button class="btn btn-success" type="submit">Calculer</button>
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
        $html .= '<th>Coût installation panneaux photovoltaïque</th><th>Coût installation éoliennes</th><th>Coût kWh</th>';
        $html .= '</thead>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>' . $coutPanneau . ' €</td>';
        $html .= '<td>' . $coutEolienne . ' €</td>';
        $html .= '<td>0,15 €</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        echo $html;

        $consoKWH = $connect->request('SELECT kwh from conso where numBat = "'.$_POST['building'].'"');


        $prix = intval($consoKWH[0][0])*0.15;
        $html = '<table class="table table-striped table-hover ">';
        $html .= '<thead>';
        $html .= '<th>Consomation du bâtiment</th><th>Coût avant installation par kWh</th>';
        $html .= '</thead>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$consoKWH[0][0].' kWh</td><td>'.$prix.' €</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        echo $html;

        echo 'Production d\'une éolienne : 5kWh'.'<br>'.' Panneau : 3 kWh';
        $consoFinale = $consoKWH[0][0]-($eolienne*5 + $metre*3);
        $prix = intval($consoKWH[0][0])*0.15;
        $html = '<table class="table table-striped table-hover ">';
        $html .= '<thead>';
        $html .= '<th>conso finale</th>';
        $html .= '</thead>';
        $html .= '<tbody>';
        $html .= '<tr>';
        $html .= '<td>'.$consoFinale.' kWh</td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        echo $html;


    }
}
//calcul de consommation pour chaque batiment en kW
$connect = new Connection();
include("../include/footer.php");