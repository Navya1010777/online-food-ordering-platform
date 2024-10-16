<?php
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['message'];

    $conn = new mysqli('localhost', 'root', '', 'contactDB');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO contact (fullname, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $fullname, $email, $phone, $msg);
        $stmt->execute();
        echo "Thank you for reaching out";
        $stmt->close();
        $conn->close();
    }
?>
