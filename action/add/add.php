<?php

use App\Database\Database;

include_once "../../App/Database/Database.php";

$database = new Database();
$conn = $database->connect();

$sql = "INSERT INTO `students`(name,address,email,phone) VALUES (:name,:address,:email,:phone)";
$stmt = $conn->prepare($sql);

if($_POST){
    $name = $_POST['name'];
    $add = $_POST['address'];
    $email = $_POST['email'];
    $phone = (int)$_POST['phone'];

    if(empty($name) || empty($add) || empty($email) || empty($phone)){
        echo "YOU must fill in all <span>*</span> market";
    } else {
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':address',$add);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':phone',$phone);
        $stmt->execute();
    }
    header("Location:../../index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <div class="mb-3" style="width: 25%">
        <label class="form-label">Fullname<span>*</span></label>
        <input type="text" class="form-control" name="name" placeholder="Your Fullname">
    </div>
    <div class="mb-3" style="width: 25%">
        <label class="form-label">Address<span>*</span></label>
        <input type="text" class="form-control" name="address" placeholder="Your Address">
    </div>
    <div class="mb-3" style="width: 25%">
        <label class="form-label">Email<span>*</span></label>
        <input type="email" class="form-control" name="email" placeholder="Your Email">
    </div>
    <div class="mb-3" style="width: 25%">
        <label class="form-label">Phone<span>*</span></label>
        <input type="text" class="form-control" name="phone" placeholder="Your Phone Number">
    </div>
    <button type="submit" class="btn btn-primary">Add New</button>
    <a href="../../index.php"><button type="button" class="btn btn-primary">Back</button></a>
</form>
</body>
</html>
