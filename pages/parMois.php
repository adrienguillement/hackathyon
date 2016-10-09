<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;
$connect=new Connection();
include("../include/header.php");
if(isset($_POST["month"]))
{
    $building=$_POST["building"];
    $month=$_POST["month"];
    $date = explode('/',$month);
    $tablQ=$connect->request('select donnees_LRY_enedis.'.$building.', Date from donnees_LRY_enedis WHERE STR_TO_DATE(`Date`, "%d/%m/%Y %k:%i:00") BETWEEN "'.$date[0].'" AND "'.$date[1].'"');
    $sizeTableQ = sizeof($tablQ);
}
else{
    $categorie = $connect->request('SELECT * from correspondance_PDL');
    echo '<form action="./parMois.php" method="POST">
    <label>Sélectionner le mois :</label>
    <select name="month">
        <option value="2015-12-01/2015-12-31">Décembre 2015</option>
        <OPTION value="2016-01-01/2016-01-31">Janvier 2016</option>
        <OPTION value="2016-02-01/2016-02-31">Février 2016</option>
        <OPTION value="2016-03-01/2016-03-31">Mars 2016</option>
        <OPTION value="2016-04-01/2016-04-31">Avril 2016</option>
        <OPTION value="2016-05-01/2016-05-31">Mai 2016</option>
        <OPTION value="2016-06-01/2016-06-31">Juin 2016</option>
        <option value="2016-07-01/2016-07-31">Juillet 2016</option>
        <option value="2016-08-01/2016-08-31">Aout 2016</option>
        <option value="2016-09-01/2016-09-31">Septembre 2016</option>
    </select><br>
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
include("../include/footer.php");
