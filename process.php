<?php
if(isset($_POST["submit"])){
  $Name = isset($_POST["Name"]) ? $_POST["Name"] : "";
  $email = isset($_POST["email"]) ? $_POST["email"] : "";
  $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
  $message = isset($_POST["message"]) ? $_POST["message"] : "";

  if(!empty($Name) && !empty($email) && !empty($phone) && !empty($message)){
    $link = mysqli_connect("localhost", "root", "", "register");
    
    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "INSERT INTO users (Name, email, phone, message) VALUES ('$Name', '$email', '$phone', '$message')";

    if(mysqli_query($link, $sql)){
      echo "Records inserted successfully.";
    } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    mysqli_close($link);
  } else {
    echo "All fields are required";
  }
}
?>

