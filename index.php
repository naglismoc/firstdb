<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>name</p>
        <input type="text" name="name">    
        <p>surname</p>
        <input type="text" name="surname">
        <p>email</p>
        <input type="text" name="email">
        <p>phoNo</p>
        <input type="text" name="phoNo">
        <button type="submit">išsaugoti</button>
    </form>

<?php
include "./models/User.php";
$servername = "localhost";
$username = "root";
$password = "";
$db = "vcs_web0711_db";
$conn = new mysqli($servername, $username, $password, $db);

?>

<?php
if($_SERVER['REQUEST_METHOD'] =="POST"){
    User::save($conn);
}


?>


<?php
//================= backend =================

$conn = new mysqli($servername, $username, $password, $db);
$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);

$users = [];
    // output data of each row
while($row = $result->fetch_assoc()) {
    $users[] = new User($row["id"], $row["name"], $row["surname"], $row["email"], $row["phone_number"]);
}
  $conn->close();

//================= frontend =================

foreach ($users as $user) {
    echo "<h1>".$user->name."</h1>";
}
?>
</body>
</html>