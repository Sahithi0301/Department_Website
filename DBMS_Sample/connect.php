<?php
  $id = $_POST['id'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  //DB CONNECTION
  $conn = new mysqli('localhost','root','','dbms_project');
  if($conn->connect_error)
  {
    die('Connection failed ' .$conn->connect_error);
  }
  else
  {
    $stmt= $conn->prepare("insert into registration(id, email, message)
      values(?,?,?)");
    $stmt->bind_param("sss",$id,$email,$message);
    $stmt->execute();
    echo "Registration Successful";
    $stmt->close();
    $conn->close();
    }
?>
