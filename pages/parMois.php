
<?php
include '../class/kernel/Connection.php';

use Kernel\Connection;
$connect=new Connection();
include("../include/header.php");

if(isset($_POST["month"])==null){
    $categorie = $connect->request('SELECT * from correspondance_PDL');
    echo "<form action=\"./parMois.php\" method=\"POST\">
    <label>Sélectionner le mois :</label>
    <select name=\"month\">
        <option value=\"12/2015\">Décembre 2015</option>
        <OPTION value=\"01/2016\">Janvier 2016</option>
        <OPTION value=\"02/2016\">Février 2016</option>
        <OPTION value=\"03/2016\">Mars 2016</option>
        <OPTION value=\"04/2016\">Avril 2016</option>
        <OPTION value=\"05/2016\">Mai 2016</option>
        <OPTION value=\"06/2016\">Juin 2016</option>
        <option value=\"07/2016\">Juillet 2016</option>
        <option value=\"08/2016\">Aout 2016</option>
        <option value=\"09/2016\">Septembre 2016</option>
    </select>
    <select id=\"realitems\" name=\"building\">
        <option value=\"test\">- - -</option>";

        for($i=0;$i<sizeof($categorie);$i++)
        {
            if($categorie[$i][2]=='null')
            {
                echo '<option name=\"'.$categorie[$i][0].'\" value=\"'.$categorie[$i][0].'\">'.$categorie[$i][0].'</option>';
            }
            else
            {
                echo '<option name=\"'.$categorie[$i][0].'\" value=\"'.$categorie[$i][2].'\">'.$categorie[$i][2].'</option>';
            }
        }

    echo "</select>
    <button type=\"submit\">GO!</button>
    </form>";
}
else{
    $building=$_POST["building"];
    $month=$_POST["month"];
    echo $building;
    echo $month;
    $tablQ=$connect->request("select Date,'.$categorie[$i][0].' from donnees_LRY_enedis WHERE Date LIKE '%".$month."%'");
    var_dump($tablQ);
}


include("../include/footer.php");
?>

