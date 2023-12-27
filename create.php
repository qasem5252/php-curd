<?php
include 'db_config.php';

if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);

    if($stmt->execute()){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="post">
    Name: <input type="text" name="name">
    Email: <input type="email" name="email">
    <input type="submit" name="submit" value="Submit">
</form>