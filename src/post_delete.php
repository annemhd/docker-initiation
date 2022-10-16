<?php
include('auth.php');
require('db.php');

$id = $_POST['id'];
$sql = "DELETE FROM `posts` WHERE ID = '$id'";

if ($con->query($sql) === TRUE) {
    header('location:dashboard.php');
} else {
    echo 'Erreur: ' . $sql . '<br>' . $con->error;
}
