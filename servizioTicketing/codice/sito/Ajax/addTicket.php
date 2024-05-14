<?php

if (!isset($_SESSION)) {
    session_start();
}

$conn = new mysqli("localhost", "root", "", "limonta_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["email"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $email = $_POST["email"];

    $insert = "INSERT INTO `tickets`(`possibleAction`, `state`, `area`, `operator`, `title`, `openDate`, `effectiveStart`, `closeDate`, `customerDescription`, `solutionDescription`, `eventualNotes`, `referenceEmail`, `assignedFrom`, `attached`) VALUES (NULL, NULL, NULL, NULL, ?, ?, NULL, NULL, ?, NULL, NULL, ?, NULL, NULL)";
    $stmt = $conn->prepare($insert);
    $date = date("Y-m-d H:i:s");
    $stmt->bind_param("ssss", $title, $date, $description, $email);
   

    if ($stmt->execute()) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error"));
    }
} else {
    echo json_encode(array("status" => "error"));
}