<?php
    require_once '../core/init.php';
$air=$_POST['air'];

$db->query("INSERT INTO sensor (air) VALUES ($air)");
?>
