<?php

if (!isset($_SESSION)) {
    session_start();
}

$conn = new mysqli("localhost", "root", "", "limonta_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $select = "SELECT ID, username, password, role FROM employees WHERE username = ? AND password = ? UNION SELECT ID, username, password, idCode FROM customers WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (array_key_exists("role", $row)) {
            $_SESSION["role"] = $row["role"];
            $_SESSION["ID"] = $row["ID"];
        } else {
            $_SESSION["idCode"] = $row["idCode"];
        }

        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error"));
    }
} else {
    echo json_encode(array("status" => "error"));
}