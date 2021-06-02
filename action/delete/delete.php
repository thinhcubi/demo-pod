<?php

use App\Database\Database;

include_once "../../App/Database/Database.php";

$database = new Database();
$conn = $database->connect();

$getId = $_REQUEST['id'];

$sql = "DELETE FROM `students` WHERE id = :id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(":id",$getId);
$stmt->execute();

header("Location: ../../index.php");
