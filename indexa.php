<!-- Home Page (indexa.php) -->
<!-- Bắt đầu khai báo biến -->
<?php
// Tạo danh sách banner và chọn ngẫu nhiên một banner để hiển thị
$banners = ['img/banner1.jpg', 'img/banner2.jpg', 'img/banner3.jpg'];
$selectedBanner = $banners[rand(0, 2)];

$mssv       = '22810209';
$hoTen      = 'Lâm Trọng Nghĩa';
$email      = 'lamtrongnghia1990@gmail.com';
$noiCongTac = 'Trường ĐH Khoa học Tự nhiên – ĐHQG HCM';

// Tạo danh sách chữ cái từ A đến Z để hiển thị các bài tập
$letters = range('A', 'Z');

// Sub cố định cho từng bài tập đã có nội dung; letter nào chưa có sẽ dùng chuỗi tự sinh
$subs = [
    'A' => 'Bài Tập A - Demo TLI1',
];

// URL cố định cho từng bài tập đã có; letter nào chưa có sẽ dùng URL tự sinh
$urls = [
    'A' => 'baitap22810209/BaiTapA-DemoTLI12026/indexb.php',
];
?>

<!-- Hết khai báo biến -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTW2 – <?= $mssv ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-0">
    <div class="row g-0">

        <!-- Sidebar -->
        <div class="col-auto sidebar px-3" style="min-width:160px">
            <p class="menu-title">Main menu</p>
            <nav class="nav flex-column">
                <a class="nav-link" href="indexa.php">Home</a>
                <a class="nav-link" href="https://class.e-learning.vn" target="_blank">Moodle</a>
                <a class="nav-link" href="https://docs.google.com/spreadsheets/d/1qiJMtk7jXoaSPgFI1_eHa4FaJ19X8A6p2q4HzitTHYg/edit?gid=0#gid=0" target="_blank">GSheet</a>
                <a class="nav-link" href="https://www.facebook.com/groups/dttx.ltweb2.hk2.2526" target="_blank">FB Group</a>
                <a class="nav-link" href="https://www.facebook.com/nghialt9/" target="_blank">My Facebook</a>
                <a class="nav-link" href="https://web2-22810209.fly.dev/" target="_blank">My Website Fly.io</a>
                <a class="nav-link" href="https://web2-22810209.onrender.com/" target="_blank">My Website Render.com</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="col p-3">

            <!-- Banner -->
            <div class="banner-wrap mb-4">
                <img src="<?= htmlspecialchars($selectedBanner) ?>" alt="Banner LTW2">
            </div>

            <!-- Nội dung 1: Thông tin sinh viên -->
            <h5 class="mb-3">Thông tin sinh viên</h5>
            <table class="table table-bordered w-auto mb-3 info-table">
                <tbody>
                    <!-- dùng htmlspecialchars để bảo vệ dữ liệu -->
                    <tr><th>MSSV</th><td><?= htmlspecialchars($mssv) ?></td></tr>
                    <tr><th>Họ tên</th><td><?= htmlspecialchars($hoTen) ?></td></tr>
                    <tr><th>Email</th><td><?= htmlspecialchars($email) ?></td></tr>
                    <tr><th>Nơi công tác</th><td><?= htmlspecialchars($noiCongTac) ?></td></tr>
                </tbody>
            </table>
            <!-- Thêm ngày giờ hiện hành bằng cách gọi include -->
            <?php include 'includes/datetime.php'; ?>

            <!-- Nội dung 2: Danh sách bài tập -->
            <h5 class="mt-4 mb-3">Danh sách bài tập</h5>

            <!-- Duyệt qua danh sách chữ cái -->
            <?php foreach ($letters as $letter):
                // Tạo tiêu đề phụ và URL cho mỗi bài tập dựa trên chữ cái nối chuỗi với '-2026'
                $sub = $subs[$letter] ?? 'Nội dung bài tập ' . $letter . '-2026';
                $url = $urls[$letter] ?? 'baitap22810209/' . $letter . '-2026/indexb.php?bt=' . urlencode($letter) . '&sub=' . urlencode($sub);
            ?>
            <div class="bt-item">
                <div class="bt-badge"><?= $letter ?></div>
                <div class="bt-info">
                    <div class="title">Bài tập <?= $letter ?>-2026</div>
                    <div class="subtitle"><?= htmlspecialchars($sub) ?></div>
                </div>
                <a href="<?= $url ?>" class="btn btn-primary btn-sm ms-auto">Xem bài tập</a>
            </div>
            <?php endforeach; ?>

        </div><!-- /main content -->
    </div><!-- /row -->
</div><!-- /container-fluid -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
