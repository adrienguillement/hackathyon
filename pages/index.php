<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;

include("../include/header.php");


$connect=new Connection();

$tablQ=$connect->request('select donnees_LRY_enedis.14303937, Date from donnees_LRY_enedis');

$sizeTableQ = sizeof($tablQ);
$categorie = $connect->request('SELECT DISTINCT categorie from correspondance_PDL');









?>

<?php
include("../include/footer.php");
?>


