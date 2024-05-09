<?php
$servername ="localhost";
$username ="root";
$password ="";
$database ="gamer";

$conn =  new mysqli($servername,$username,$password,$database);

if($conn->connect_error){
  die("connection failed: " . $conn->connect_error);
}


  $email = $_POST['email'];
  $password = $_POST['password'];

  $check_query = "SELECT * FROM signin WHERE  email = '$email' AND password = '$password'";

  $check_query =$conn->query($check_query);
if($check_result->num_rows>0){
  echo "error: ";

}
else{
  $insert_query = "INSERT INTO signup (email, password) VALUES('$email','$password')";
   
  if($conn->query($insert_query) === TRUE){
    echo"success";
    header("Location:index.html");
  }
else {
  echo "error";
}
}

$conn->close();
?>