<?php
// microtime() trả về thời gian hiện tại tính bằng giây kể từ Unix Epoch (1/1/1970) dưới dạng số thực,
// bao gồm phần nguyên và phần thập phân (phần thập phân đại diện cho phần mili giây).
// true trả về thời gian dưới dạng số thực, false trả về chuỗi có định dạng "microseconds seconds".
$_micro      = microtime(true);
// sprintf('%03d', ...) được sử dụng để định dạng phần mili giây thành một chuỗi có độ dài 3 ký tự,
// với các số 0 được thêm vào bên trái nếu cần thiết. Ví dụ, nếu phần mili giây là 5, nó sẽ được định dạng thành "005".    
$_ms         = sprintf('%03d', ($_micro - floor($_micro)) * 1000);
// date('d/m/Y H:i:s') trả về ngày và giờ hiện tại theo định dạng "ngày/tháng/năm giờ:phút:giây".
$_serverTime = date('d/m/Y H:i:s') . '.' . $_ms;
// json_encode() được sử dụng để chuyển đổi một mảng PHP thành một chuỗi JSON.
// Trong trường hợp này, nó tạo ra một đối tượng JSON với một thuộc tính "time" chứa giá trị của $_serverTime.
echo json_encode(['time' => $_serverTime]);