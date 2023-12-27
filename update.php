<?php
include 'db_config.php';

if(isset($_POST["submit"])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name=?, email=? WHERE id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $email, $id);

    if($stmt->execute()){
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="post">
    ID: <input type="text" name="id">
    Name: <input type="text" name="name">
    Email: <input type="email" name="email">
    <input type="submit" name="submit" value="Update">
</form>