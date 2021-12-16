<?php require_once "connect_db.php"; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="src/to-do-list.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="src/to_do_list.css">
  <title>To do list</title>
</head>

<body>
  <div id="notebook">
    <!-- Xử lý form -->
    <?php require_once "form_process.php" ?>

    <!-- Form thêm ghi chú -->
    <form id='add' action="" method="post">
      <label for="note">Việc cần làm:</label>
      <input type="text" name="note" id="note" autofocus />
      <button type="submit" name="add">Thêm</button>
    </form>

    <!-- Hiển thị/ xóa ghi chú -->
    <ul id='notes'>
      <?php
      $result_set = $pdo->query("SELECT id, task FROM note ORDER BY id DESC");

      while ($row = $result_set->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $task = $row['task'];
        echo "<li id='$id'>$task</li>";
      }
      ?>
    </ul>
  </div>
  <script src="src/delete_note.js"></script>
  <!-- <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script> -->
</body>

</html>