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
    $password = md5($_POST["password"]);

    if (str_contains($username, "_"))
    {
        $select = "SELECT ID, username FROM customers WHERE username = ? AND password = ?";
        $_SESSION["role"] = "customer";
    }
    else if (str_contains($username, "."))
    {
        $select = "SELECT ID, username FROM employees WHERE username = ? AND password = ?";
        $_SESSION["role"] = "employee";
    }
    else if ($username === "admin")
    {
        $select = "SELECT ID, username FROM employees WHERE username = ? AND password = ?";
        $_SESSION["role"] = "admin";
    }
    else
    {
        echo json_encode(array("status" => "error"));
        return;
    }

    $stmt = $conn->prepare($select);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["ID"] = $row["ID"];
        $_SESSION["is_logged"] = true;

        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error"));
    }
} else {
    echo json_encode(array("status" => "error"));
}