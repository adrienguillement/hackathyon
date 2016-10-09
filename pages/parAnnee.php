<?php
include '../class/kernel/Connection.php';
include '../include/function.php';
use Kernel\Connection;

$connect=new Connection();

include '../include/header.php';

if(!isset($_POST['verif'])){
    $categorie = $connect->request('SELECT * from correspondance_PDL');
    echo '<form action="./parAnnee.php" method="POST">
        <input type="hidden" name="verif" />
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

    $building=$_POST['building'];

    $bat=[];
    $tablQ=$connect->request('SELECT donnees_LRY_enedis.'.$building.', Date FROM donnees_LRY_enedis');
    $sizeTableQ=sizeof($tablQ);

}

include '../include/footer.php';