<?php
require_once "connect_db.php";
$noteId = $_POST['id'];
$result = $pdo->query("DELETE FROM note WHERE id = $noteId");

if ($result->rowCount() > 0) {
  echo "deleted";
} else {
  echo "not deleted";
}
