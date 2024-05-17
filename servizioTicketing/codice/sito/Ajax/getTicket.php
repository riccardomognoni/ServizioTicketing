<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] != true) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET["dateFrom"]) && isset($_GET["dateTo"]) && isset($_GET["statusCall"]))
{
    $dateFrom = $_GET["dateFrom"];
    $dateTo = $_GET["dateTo"];
    $statusCall = $_GET["statusCall"];
    
    $conn = new mysqli("localhost", "root", "", "limonta_db");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        echo json_encode(array("status" => "error", "message" => "Connessione al database fallita"));
        exit;
    }
    
    print_r($_GET);

    $firstQuery = false;
    $query = "SELECT * FROM tickets WHERE 1=1";
    $params = [];
    $types = "";

    if ($dateFrom !== '') {
        $firstQuery = true;
        $query .= " AND openDate >= ?";
        $params[] = $dateFrom;
        $types .= "s";
    }

    if ($dateTo !== '') {
        $query .= " AND openDate <= ?";
        $params[] = $dateTo;
        $types .= "s";
    }

    if ($statusCall !== '') {
        $statusCall = $conn->query("SELECT ID FROM ticket_state WHERE state = '$statusCall'")->fetch_assoc()["ID"];
        $query .= " AND state = ?";
        $params[] = $statusCall;
        $types .= "s";
    }

    $result = null;
    if (!$firstQuery) {
        $query = "SELECT * FROM tickets";
        $result = $conn->query($query);
    }
    else {
        $stmt = $conn->prepare($query);
    
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
    
        $stmt->execute();

        $result = $stmt->get_result();
    }

    $tickets = [];

    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }

    echo json_encode($tickets);
} else {
    echo json_encode(array("status" => "error", "message" => "Parametri mancanti"));
}