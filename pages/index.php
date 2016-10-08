<?php
include '../class/kernel/Connection.php';
use Kernel\Connection;

include("../include/header.php");

$connect=new Connection();

$tablQ=$connect->request('select donnees_LRY_enedis.14300186, Date from donnees_LRY_enedis');

var_dump($tablQ);

