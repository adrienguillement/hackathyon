<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;

include("../include/header.php");

var_dump($_POST);
$connect=new Connection();

$tablQ=$connect->request('select donnees_LRY_enedis.14303937, Date from donnees_LRY_enedis');

$sizeTableQ = sizeof($tablQ);
$categorie = $connect->request('SELECT * from correspondance_PDL');

?>
<form action="http://127.0.0.1/hackathyon/hackathyon/pages/index.php" method="POST">
    Rechercher un bâtiment <input type="text" id="realtxt" onkeyup="javascript:searchSel();"/>
    <select id="realitems">
        <option value="">- - -</option>
        <?php
        for($i=0;$i<sizeof($categorie);$i++)
        {
            if($categorie[$i][2]=='null')
            {
                echo '<option name="'.$categorie[$i][0].'" value="'.$categorie[$i][0].'">'.$categorie[$i][0].'</option>';
            }
            else
            {
                echo '<option name="'.$categorie[$i][0].'" value="'.$categorie[$i][2].'">'.$categorie[$i][2].'</option>';
            }
        }
        ?>
    </select>
    <button type="submit">GO!</button>
</form>
<?php
include("../include/footer.php");
?>


