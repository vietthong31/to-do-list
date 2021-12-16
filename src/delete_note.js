let listItems = document.getElementsByTagName('li');

// Thêm sự kiện
for (let i = 0; i < listItems.length; i++) {
  listItems[i].addEventListener('click', deleteItem);
}

// Hàm lấy thông tin & gửi về server
function deleteItem() {
  let noteId = this.getAttribute('id');
  sendServer(noteId, this);
}

// Hàm gửi về server
function sendServer(noteId, listItem) {
  const httpRequest = new XMLHttpRequest();
  httpRequest.open('POST', 'delete_task.php');

  // Hàm xử lý khi gửi request & có response
  httpRequest.onload = function () {
    console.log(httpRequest.responseText);
    if (httpRequest.responseText == 'deleted') {
      listItem.setAttribute('class', 'deleted');
    }
  };

  // Tạo & thêm dữ liệu FormData
  let data = new FormData();
  data.append('id', noteId);

  // Gửi request về server
  httpRequest.send(data);
}
