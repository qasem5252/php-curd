<?php
include 'db_config.php';

if(isset($_POST["submit"])){
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if($stmt->execute()){
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="post">
    ID: <input type="text" name="id">
    <input type="submit" name="submit" value="Delete">
</form>