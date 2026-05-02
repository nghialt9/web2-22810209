<?php
/*
 * Hàm tính tổng, hiệu, tích, thương của 2 số nhập từ form
 * Sử dụng hàm calcalator() để thực hiện phép tính, trả về kết quả hoặc lỗi nếu có
 */

function calcalator($so1, $so2, $pheptinh) {
    $result = 0;
    switch ($pheptinh) {
        case '+':
            $result = $so1 + $so2;
            break;
        case '-':
            $result = $so1 - $so2;
            break;
        case '*':
            $result = $so1 * $so2;
            break;
        case '/':
            if ($so2 != 0) {
                $result = $so1 / $so2;
            } else {
                $result = 'Không thể chia cho 0';
            }
            break;
        default:
            $result = 'Phép tính không hợp lệ';
    }

    return $result;
}