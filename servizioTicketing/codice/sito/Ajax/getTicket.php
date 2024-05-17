<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["is_logged"]) && $_SESSION["is_logged"] !== true) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET["dateFrom"]) && isset($_GET["dateTo"]) && isset($_GET["ticketNumber"]) && isset($_GET["statusCall"]))
{
    $dateFrom = $_GET["dateFrom"];
    $dateTo = $_GET["dateTo"];
    $ticketNumber = $_GET["ticketNumber"];
    $statusCall = $_GET["statusCall"];
    $id = $_SESSION["ID"];
    $role = $_SESSION["role"];
    
    $conn = new mysqli("localhost", "root", "", "limonta_db");
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        echo json_encode(array("status" => "error", "message" => "Connessione al database fallita"));
        exit;
    }

    $select = "SELECT * FROM tickets WHERE openDate >= ? AND openDate <= ? AND state = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("sss", $dateFrom, $dateTo, $statusCall);
    $stmt->execute();
    $result = $stmt->get_result();
    $tickets = array();

    while ($row = $result->fetch_assoc()) {
        $tickets[] = $row;
    }

    echo json_encode($tickets);

}
else
{
    echo "Errore";
}