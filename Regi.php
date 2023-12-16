<?php
$User_name = $_POST['User_name'];
$pass=$_POST['pass'];


// Database connection
$conn=new mysqli('localhost','root','','member');
if ($conn->connect_error) {
    die('Connection Failed:'. $conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into users(User_name,pass)values(?,?)");
$stmt->bind_param("ss",$User_name,$pass);

$stmt->execute();
echo "resgistration successfull";
$stmt->close();
$conn->close();
}

?>
