<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['idCode']) || !isset($_POST['email']) || !isset($_POST['subject']) || !$_POST['message']){
    header("Location: ../index.php");
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include_once('./PHPMailer-master/src/PHPMailer.php');
include_once('./PHPMailer-master/src/Exception.php');
include_once('./PHPMailer-master/src/SMTP.php');

// recupero i dati dal form
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// creo un oggetto PHPMailer
$mail = new PHPMailer(true);

$conn = new mysqli("localhost", "root", "", "limonta_db");
$select = "SELECT * FROM customers WHERE email = ?";
$stmt = $conn->prepare($select);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if ($result->num_rows == 0) {
    echo json_encode(array("status" => "error", "message" => "Email non registrata"));
    exit;
}

try {
    // imposto i parametri del server SMTP
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // imposto il mittente e il destinatario
    $mail->setFrom('maxboxex0909@gmail.com');
    $mail->FromName = 'Codice Tessera';
    $mail->addAddress($email);
    
    // imposto il subject e il body del messaggio
    $mail->isHTML(true);
    $mail->Subject = $subject;
    if (isset($_SESSION['idCode']))
        $mail->Body = $message . '<h2><b>' . $_SESSION['idCode'] .'</b></h2><br>';
    else
        $mail->Body = $message . '<br>';

    // invio l'email
    $mail->send();
    session_unset();
    $_SESSION["mail-sent"] = true;
    echo json_encode(array("status" => "success"));
} catch (Exception $e) {
    $delete = "DELETE FROM customers WHERE email = ?";
    $stmt = $conn->prepare($delete);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();

    echo json_encode(array("status" => "error", "message" => "Errore nell'invio dell'email"));
}
