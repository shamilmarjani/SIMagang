<?php
session_start();

function redirectWithError($message) {
    $_SESSION['error'] = $message;
    header("Location: register.php");
    exit;
}

if (empty($_POST['nama'])) {
    redirectWithError("Nama tidak boleh kosong");
}

if (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    redirectWithError("Email tidak valid");
}

if (empty($_POST['no_tlp'])) {
    redirectWithError("Nomor telepon tidak boleh kosong");
}

if (strlen($_POST['password']) < 8) {
    redirectWithError("Password minimal 8 karakter");
}

if ( ! preg_match("/[a-z]/i", $_POST['password'])) {
    redirectWithError("Password harus mengandung huruf");
}

if ( ! preg_match('/[0-9]/', $_POST['password'])) {
    redirectWithError("Password harus mengandung angka");
}
if ($_POST['konfirmasi_password'] != $_POST['password']) {
    redirectWithError("Password tidak cocok");
}

$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (nama, email, no_tlp, password_hash, created_at)
        VALUES (?, ?, ?, ?, NOW())";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    redirectWithError("Ada kesalahan pada query: " . $mysqli->error);
}

$stmt->bind_param("ssss",
    $_POST['nama'],
    $_POST['email'],
    $_POST['no_tlp'],
    $password_hash);

$stmt->execute();

$_SESSION['success'] = "Pendaftaran berhasil";
header("Location: login.php");
exit;
