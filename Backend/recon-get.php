<?php
require_once 'config.php';

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Error connecting to server: " . $conn->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql_create_db) === FALSE) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$sql_create_table = "CREATE TABLE IF NOT EXISTS `user` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `link` TEXT NULL,
    `port` VARCHAR(255) NULL,
    `title` TEXT NULL,
    `status` VARCHAR(255) NULL,
    `subdomain` TEXT NULL,
    `wapplayzer` TEXT NULL,
    `whois` LONGTEXT NULL,
    `regex` TEXT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

if ($conn->query($sql_create_table) === FALSE) {
    die("Error creating table: " . $conn->error);
}

$link = "";
if (isset($_GET['link'])) {
    $link = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['link']));
}

$port = "";
if (isset($_GET['port'])) {
    $port = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['port']));
}

$title = "";
if (isset($_GET['title'])) {
    $title = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['title']));
}

$status = "";
if (isset($_GET['status'])) {
    $status = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['status']));
}

$subdomain = "";
if (isset($_GET['subdomain'])) {
    $subdomain = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['subdomain']));
}

$wapplayzer = "";
if (isset($_GET['wapplayzer'])) {
    $wapplayzer = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['wapplayzer']));
}

$whois = "";
if (isset($_GET['whois'])) {
    $whois = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['whois']));
}

$regex = "";
if (isset($_GET['regex'])) {
    $regex = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['regex']));
}

$query = "INSERT INTO user (link, port, title, status, subdomain, wapplayzer, whois, regex) VALUES ('$link', '$port', '$title', '$status', '$subdomain', '$wapplayzer', '$whois', '$regex')";

if ($conn->query($query) === TRUE) {
    echo json_encode(["result" => "ok"]);
} else {
    echo json_encode(["result" => "Error","Error" => "$conn->error"]);
}

$conn->close();
?>