<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;
$connect=new Connection();
include("../include/header.php");
if(isset($_POST['building']))
{
    $building=$_POST["building"];
    $building = explode("/",$building);

    echo 'Nom du bâtiment : '.$building[1];
    $tablQ=$connect->request('select donnees_LRY_enedis.'.$building[0].', Date from donnees_LRY_enedis');
    $sizeTableQ = sizeof($tablQ);
}
else{
    $categorie = $connect->request('SELECT * from correspondance_PDL');
    echo '<form action="./import.php" method="POST">
    <label>Rechercher un bâtiment </label><input type="text" id="realtxt" onkeyup="javascript:searchSel();"/>
    <select id="realitems" name="building">
    <option value="test">- - -</option>';
    for($i=0;$i<sizeof($categorie);$i++)
    {
        if($categorie[$i][2]=='null')
        {
            echo '<option name="'.$categorie[$i][0].'" value="'.$categorie[$i][0].'/'.$categorie[$i][2].'">'.$categorie[$i][0].'</option>';
        }
        else
        {
            echo '<option name="'.$categorie[$i][0].'" value="'.$categorie[$i][0].'/'.$categorie[$i][2].'">'.$categorie[$i][2].'</option>';
        }
    }
    echo "</select>
    <button type=\"submit\">GO!</button>
    </form>";
}
include("../include/footer.php");