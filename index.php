<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//================= backend =================
include "./models/User.php";

$servername = "localhost";
$username = "root";
$password = "";
$db = "vcs_web0711_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);
print_r($result);

$users = [];
    // output data of each row
while($row = $result->fetch_assoc()) {
    $users[] = new User($row["id"], $row["name"], $row["surname"], $row["email"], $row["phone_number"]);
}

  $conn->close();

//   print_r($users);


//================= frontend =================

foreach ($users as $user) {
    echo "<h1>".$user->name."</h1>";
}
?>
</body>
</html>