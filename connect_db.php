<?php
$dsn = "mysql:host=localhost;port=3306;dbname=to_do";
try {
  $pdo = new PDO($dsn, 'root', '');
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  header("Location:http://localhost:8080/ltw/to-do-list/fail-connect.php");
}
