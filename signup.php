<?php 

$signup_first_name = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$signup_last_name = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$signup_password = isset($_POST['password']) ? $_POST['password'] : '';
$signup_email = isset($_POST['email']) ? $_POST['email'] : '';
$signup_phone_number = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '';

$con = new mysqli("localhost", "root", "", "gamer"); 
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
} else {
    $insert_query = $con->prepare("INSERT INTO signin (firstname, lastname, phonenumber, email, password) VALUES (?, ?, ?, ?, ?)");
    $insert_query->bind_param("sssss", $signup_first_name, $signup_last_name, $signup_phone_number, $signup_email, $signup_password);
    $insert_query->execute();
    
    header("Location: login.html");
}
?>
