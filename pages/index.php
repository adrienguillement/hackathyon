<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;

include("../include/header.php");


$connect=new Connection();
if(isset($_POST['category']))
{
    $tablQ=$connect->request('select donnees_LRY_enedis.'.$_POST['category'].', Date from donnees_LRY_enedis');
    $sizeTableQ = sizeof($tablQ);
}

$categorie = $connect->request('SELECT * from correspondance_PDL');

?>
<form action="#" method="POST">
    Rechercher un bâtiment <input type="text" id="realtxt" onkeyup="javascript:searchSel();"/>
    <select id="realitems" name="category">
        <option value="">- - -</option>
        <?php
        for($i=0;$i<sizeof($categorie);$i++)
        {
            if($categorie[$i][2]=='null')
            {
                echo '<option value="'.$categorie[$i][0].'">'.$categorie[$i][0].'</option>';
            }
            else
            {
                echo '<option value="'.$categorie[$i][0].'">'.$categorie[$i][2].'</option>';
            }
        }
        ?>
    </select>
    <button type="submit">GO!</button>
</form>
<?php
include("../include/footer.php");
?>


