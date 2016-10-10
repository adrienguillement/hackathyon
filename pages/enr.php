<?php

include("../include/header.php");
include '../class/kernel/Connection.php';
use Kernel\Connection;
$connect=new Connection();

if(isset()==null){
    $categorie = $connect->request('SELECT * from correspondance_PDL');
    echo '<form action="./parMois.php" method="POST">
    <label>Rechercher un bâtiment </label><input type="text" id="realtxt" onkeyup="javascript:searchSel();"/>
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
    echo "</select>
    <button type=\"submit\">GO!</button>
    </form>";
}
else{
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
}

include("../include/footer.php");