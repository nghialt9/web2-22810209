<?php

// Tạo mảng 64 ô (8x8), đặt ngẫu nhiên 40 số từ 1-60 vào 40 vị trí ngẫu nhiên
function generateMagicCells(): array {
    $pool = range(1, 60);
    /*
    * Lấy ngẫu nhiên 40 số từ pool 1-60
    * Lấy ngẫu nhiên 40 vị trí trong lưới 8x8 (64 ô)
    * Đặt 40 số vào 40 vị trí đó, các ô còn lại để null
    */
    shuffle($pool); // Xáo trộn mảng để lấy ngẫu nhiên
    $numbers = array_slice($pool, 0, 40);// Lấy 40 số đầu tiên sau khi xáo trộn
    $positions = range(0, 63);// 64 vị trí từ 0 đến 63
    shuffle($positions);// Xáo trộn vị trí
    $positions = array_slice($positions, 0, 40); // Lấy 40 vị trí đầu tiên sau khi xáo trộn

    $cells = array_fill(0, 64, null);// Khởi tạo mảng 64 ô với giá trị null
    foreach (array_values($positions) as $i => $pos) {
        $cells[$pos] = $numbers[$i];// Đặt số vào vị trí tương ứng
    }
    return $cells;
}

// Lấy các giá trị thời gian (ngày/tháng/giờ/phút/giây) trong khoảng 1-60 để tô màu
function getHighlightSet(array $t): array {
    return array_values(array_unique(array_filter( 
        array_values($t),
        fn($v) => $v >= 1 && $v <= 60 // Chỉ lấy các giá trị trong khoảng 1-60
    )));
}
