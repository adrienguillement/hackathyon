<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;

include("../include/header.php");

$connect=new Connection();
echo "oui";
$tablQ=$connect->request('select * from correspondance_PDL where numCategorie=14341016');

var_dump($tablQ);

