<?php

/*
 * functions.php - Các hàm xử lý logic cho bài tập tuyến xe buýt Hàm Nghi
 * - Định nghĩa dữ liệu các tuyến xe buýt và trạm dừng
 * - Cung cấp hàm lấy thông tin tuyến và trạm dừng theo yêu cầu
 * - Được include vào indexb.php để sử dụng chung
 */

// $arTuyen: mảng 2 chiều thông tin các tuyến xe buýt tại Hàm Nghi
// Cột: [0]so, [1]diem_dau, [2]diem_cuoi, [3]gio_bat_dau, [4]gio_ket_thuc,
//     [5]gian_cach, [6]cu_ly, [7]bootstrap_color
$arTuyen = [
    [171, 'Bến xe Phú Chánh',              'Bến xe Buýt Sài Gòn', '05:30', '19:26', '10–120 phút', '45 km',    'success'],
    [ 19, 'Bến xe Miền Đông Mới',          'Bến xe Buýt Chợ Lớn', '05:00', '20:15', '8–12 phút',   '27.43 km', 'primary'],
    [ 56, 'Bến xe Buýt ĐHQG TP.HCM Mới',   'Bến xe Buýt Sài Gòn', '05:10', '21:00', '9–13 phút',   '29.36 km', 'danger'],
    [ 88, 'Chợ Long Phước',                'Bến xe Buýt Sài Gòn', '04:45', '22:00', '6–15 phút',   '23.60 km', 'warning'],
];

// Chỉ số cột (index) của $arTuyen
define('COL_SO',    0);
define('COL_DAU',   1);
define('COL_CUOI',  2);
define('COL_GIO_BD',3);
define('COL_GIO_KT',4);
define('COL_GIAN',  5);
define('COL_CULY',  6);
define('COL_COLOR', 7);

// $ar171: mảng 2 chiều danh sách trạm tuyến 171
// [chieu][i] = [ma_tram, ten_tram]
$ar171 = [
    0 => [ // Chiều đi: Bến xe Phú Chánh → Bến xe Buýt Sài Gòn
        ['Q1 157', 'Khách Sạn New World'],
        ['Q1 188', 'Nguyễn Thị Nghĩa'],
        ['Q1 189', 'Tôn Thất Tùng'],
        ['BX 01',  'Bến xe Buýt Sài Gòn'],
    ],
    1 => [ // Chiều về: Bến xe Buýt Sài Gòn → Bến xe Phú Chánh
        ['BX 01',  'Bến xe Buýt Sài Gòn'],
        ['Q1 189', 'Tôn Thất Tùng'],
        ['Q1 188', 'Nguyễn Thị Nghĩa'],
        ['Q1 157', 'Khách Sạn New World'],
    ],
];

// $ar19: mảng 2 chiều danh sách trạm tuyến 19
$ar19 = [
    0 => [ // Chiều đi: Bến xe Miền Đông Mới → Bến xe Buýt Chợ Lớn
        ['Q1 187', 'Khách Sạn New World'],
        ['Q1 188', 'Nguyễn Thị Nghĩa'],
        ['Q1 189', 'Tôn Thất Tùng'],
        ['BX 01',  'Bến xe Buýt Sài Gòn'],
        ['Q5 010', 'Nguyễn Trãi – Châu Văn Liêm'],
        ['Q5 011', 'Bến xe Buýt Chợ Lớn'],
    ],
    1 => [ // Chiều về: Bến xe Buýt Chợ Lớn → Bến xe Miền Đông Mới
        ['Q5 011', 'Bến xe Buýt Chợ Lớn'],
        ['Q5 010', 'Nguyễn Trãi – Châu Văn Liêm'],
        ['BX 01',  'Bến xe Buýt Sài Gòn'],
        ['Q1 189', 'Tôn Thất Tùng'],
        ['Q1 188', 'Nguyễn Thị Nghĩa'],
        ['Q1 187', 'Khách Sạn New World'],
    ],
];

// $ar56: mảng 2 chiều danh sách trạm tuyến 56
$ar56 = [
    0 => [ // Chiều đi: Bến xe Buýt ĐHQG TP.HCM Mới → Bến xe Buýt Sài Gòn
        ['Q1 040', 'Khách Sạn New World'],
        ['Q1 122', 'Nguyễn Thị Nghĩa'],
        ['Q1 118', 'Trần Hưng Đạo'],
        ['Q1 125', 'KTX Trần Hưng Đạo'],
        ['Q1 126', 'Rạp Hưng Đạo'],
        ['Q1 153', 'Nguyễn Cư Trinh'],
        ['Q1 154', 'Công Quỳnh'],
        ['Q1 155', 'Trần Đình Xu'],
        ['Q1 140', 'Nguyễn Trãi'],
        ['QS 001', 'Đại Học Sư Phạm'],
        ['QS 002', 'Chợ Bầu Sen'],
        ['QS 003', 'Huỳnh Mẫn Đạt'],
    ],
    1 => [ // Chiều về: Bến xe Buýt Sài Gòn → Bến xe Buýt ĐHQG TP.HCM Mới
        ['QS 003', 'Huỳnh Mẫn Đạt'],
        ['QS 002', 'Chợ Bầu Sen'],
        ['QS 001', 'Đại Học Sư Phạm'],
        ['Q1 140', 'Nguyễn Trãi'],
        ['Q1 155', 'Trần Đình Xu'],
        ['Q1 154', 'Công Quỳnh'],
        ['Q1 153', 'Nguyễn Cư Trinh'],
        ['Q1 126', 'Rạp Hưng Đạo'],
        ['Q1 125', 'KTX Trần Hưng Đạo'],
        ['Q1 118', 'Trần Hưng Đạo'],
        ['Q1 122', 'Nguyễn Thị Nghĩa'],
        ['Q1 040', 'Khách Sạn New World'],
    ],
];

// $ar88: mảng 2 chiều danh sách trạm tuyến 88
$ar88 = [
    0 => [ // Chiều đi: Chợ Long Phước → Bến xe Buýt Sài Gòn
        ['Q1 167', 'Khách Sạn New World'],
        ['Q1 188', 'Nguyễn Thị Nghĩa'],
        ['Q1 189', 'Tôn Thất Tùng'],
        ['BX 01',  'Bến xe Buýt Sài Gòn'],
    ],
    1 => [ // Chiều về: Bến xe Buýt Sài Gòn → Chợ Long Phước
        ['BX 01',  'Bến xe Buýt Sài Gòn'],
        ['Q1 189', 'Tôn Thất Tùng'],
        ['Q1 188', 'Nguyễn Thị Nghĩa'],
        ['Q1 167', 'Khách Sạn New World'],
    ],
];

// Gộp tất cả mảng trạm theo số tuyến
$arStops = [
    171 => $ar171,
    19  => $ar19,
    56  => $ar56,
    88  => $ar88,
];

// Hàm lấy thông tin một tuyến từ $arTuyen theo số tuyến
function getTuyen(array $arTuyen, int $so): ?array {
    foreach ($arTuyen as $row) {
        if ($row[COL_SO] === $so) return $row;
    }
    return null;
}

// Hàm lấy danh sách trạm theo số tuyến và chiều (0=đi, 1=về)
function getStops(array $arStops, int $so, int $chieu = 0): array {
    return $arStops[$so][$chieu] ?? [];
}

// Hàm lấy tất cả số hiệu tuyến từ $arTuyen
function getAllSoTuyen(array $arTuyen): array {
    return array_column($arTuyen, COL_SO);
}
