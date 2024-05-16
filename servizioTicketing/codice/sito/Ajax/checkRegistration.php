<?php

if (!isset($_SESSION)) {
    session_start();
}


if (
    isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['username'])
    && isset($_POST['password']) && isset($_POST['email'])
    // controllo se i campi sono vuoti
    && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['nome'])
    && !empty($_POST['cognome']) && !empty($_POST['email'])
) {

    $conn = new mysqli("localhost", "root", "", "limonta_db");
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        echo json_encode(array("status" => "error", "message" => "Connessione al database fallita"));
        exit;
    }

    $nome = ucfirst(strtolower($_POST['nome']));
    $cognome = ucfirst(strtolower($_POST['cognome']));
    $username = strtolower($_POST['username']);
    /*if (!str_contains($username, "_") && $_POST['ruolo'] == "employee") {
        echo json_encode(array("status" => "error", "message" => "L'username deve contenere il carattere '_'"));
        exit;
    }

    if (!str_contains($username, ".") && !isset($_POST['ruolo'])) {
        echo json_encode(array("status" => "error", "message" => "L'username per il dipendente deve contenere il carattere '.'"));
        exit;
    }*/
    $password = $_POST['password'];
    $email = $_POST['email'];
    if (!checkEmail($email)) {
        echo json_encode(array("status" => "error", "message" => "Email non valida"));
        exit;
    }

    // faccio partire una transaction
    $conn->begin_transaction();

    try {
        if (isset($_POST['ruolo']) && $_SESSION['role'] === "admin") {
            $ruolo = $_POST['ruolo'];
            $phoneNumber = null;

            // controllo se l'username è già in uso
            $select = "SELECT * FROM employees WHERE username = ?";
            $stmt = $conn->prepare($select);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo json_encode(array("status" => "error", "message" => "Username già in uso"));
                exit;
            }

            // inserisco l'admin/dipendente
            $insert = "INSERT INTO employees (nome, cognome, username, password, email, phoneNumber, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("sssssss", $nome, $cognome, $username, $password, $email, $phoneNumber, $ruolo);
            $stmt->execute();

            // committo la transaction
            $conn->commit();
            $conn->close();

            echo json_encode(array("status" => "success", "message" => "Registrazione avvenuta con successo"));
        } else {
            // controllo se l'email è già in uso
            $select = "SELECT * FROM customers WHERE email = ?";
            $stmt = $conn->prepare($select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                echo json_encode(array("status" => "error", "message" => "Email  già in uso"));
                exit;
            }

            // vado a prendere l'ultimo valore di tessera inserito e lo incremento di 1
            $select = "SELECT idCode FROM customers ORDER BY idCode DESC LIMIT 1";
            $result = $conn->query($select);
            $row = $result->fetch_assoc();
            $idCode = intval(str_replace('S', '', $row['idCode'])) + 1;
            $idCode = "S" . str_pad($idCode, 7, "0", STR_PAD_LEFT);

            // inserisco il cliente
            $insert = "INSERT INTO customers (nome, cognome, username, password, email, idCode) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("ssssss", $nome, $cognome, $username, $password, $email, $idCode);
            $stmt->execute();

            // committo la transaction
            $conn->commit();
            $conn->close();

            $_SESSION['idCode'] = $idCode;
            $message = "<h1>Benvenuto/a " . $nome . " " . $cognome . "!</h1><br>Ecco a te il numero di tessera per effettuare la login: ";
            echo json_encode(array("status" => "success", "message" => $message));
        }

        exit;
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(array("status" => "error", "message" => "Errore nella registrazione: " . $e->getMessage()));
        exit;
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Compila tutti i campi"));
    exit;
}

function checkEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}