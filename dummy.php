<?php

$id = $_GET['id'];
$name = $_GET['name'];
$price = $_GET['price'];

echo $id, $name, $price;

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO orders (o_id, item, price, p_id)
VALUES ('$id', '$name', '$price','$id')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>