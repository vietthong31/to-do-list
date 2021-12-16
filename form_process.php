<?php

require_once "connect_db.php";

// thêm việc cần làm
if (isset($_POST['add'])) {
  // var_dump($_POST);
  $new_note = $_POST['note'];
  if (empty($new_note)) {
    echo "<p id='warn'>Chưa nhập việc cần làm</p>";
  } else {
    // Gọi hàm current_noteId (định nghĩa ở phpMyAdmin) để lấy id hiện tại
    $query = $pdo->query("SELECT current_noteId() AS id")->fetch();
    $id = $query['id'];

    // Chèn hàng mới vào bảng note
    $result = $pdo->query("INSERT INTO note(id, task) VALUES ($id, '$new_note')");
  }

  // Sau khi xử lý form, cho trở về lại trang gốc (khi F5 không hiện cảnh báo resubmitting)
  header("Location:http://localhost:8080/ltw/to-do-list/to_do_list.php");
}
