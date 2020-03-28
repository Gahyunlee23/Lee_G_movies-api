<h1>This is Movie API project</h1>
<?php
include './config/database.php';

$database = new Database();
$db = $database->getConnection();

var_dump($db);