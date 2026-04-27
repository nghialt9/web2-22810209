<!-- Trang bài tập (indexb.php) -->
 <!-- Bắt đầu khai báo biến -->
<?php
//khai bao document root va project url de su dung trong link va src

//$_SERVER['DOCUMENT_ROOT'] có đang C:\xampp\htdocs\... thì đổi thành C:/xampp/htdocs/...
$_docRoot    = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');

//dirname(__DIR__) có đang C:\xampp\htdocs\2026-01-Web2-22010209-BT1 thì đổi thành C:/xampp/htdocs/2026-01-Web2-22010209-BT1
//__DIR__ là đường dẫn của file hiện tại, tức là C:\xampp\htdocs\2026-01-Web2-22010209-BT1\baitap22810209\A-2026
//str_replace('\\', '/', __DIR__) đổi thành C:/xampp/htdocs/2026-01-Web2-22010209-BT1/baitap22810209/A-2026
//str_ireplace($_docRoot, '', ...) sẽ cắt bỏ phần C:/xampp/htdocs khỏi đường dẫn, chỉ còn phần sau, tức là /2026-01-Web2-22010209-BT1/baitap22810209/A-2026 
$_projectUrl = str_ireplace($_docRoot, '', str_replace('\\', '/', dirname(dirname(__DIR__))));

// Lấy tham số bt từ URL, chỉ giữ chữ cái và chuyển thành chữ hoa, mặc định là 'A' nếu không hợp lệ
$bt = strtoupper(preg_replace('/[^a-zA-Z]/', '', $_GET['bt'] ?? 'A'));
if (strlen($bt) !== 1 || $bt < 'A' || $bt > 'Z') {
    $bt = 'A';
}

// Lấy tham số sub từ URL, loại bỏ thẻ HTML và khoảng trắng ở đầu/cuối, mặc định là chuỗi rỗng nếu không có
$subtitle = trim(strip_tags($_GET['sub'] ?? ''));
?>
<!-- Hết khai báo biến -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập <?= htmlspecialchars($bt) ?> – 22810209</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $_projectUrl ?>/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid p-0">
    <div class="row g-0">

        <!-- Sidebar -->
        <div class="col-auto sidebar px-3" style="min-width:160px">
            <p class="menu-title">Main menu</p>
            <nav class="nav flex-column">
                <a class="nav-link" href="<?= $_projectUrl ?>/indexa.php">Host Home</a>
                <a class="nav-link active" href="indexb.php?bt=<?= urlencode($bt) ?>">Home</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="col p-4">
            <h1 class="display-5 fw-bold mb-1">
                Bài tập <?= htmlspecialchars($bt) ?> của sinh viên 22810209
            </h1>
            <?php if ($subtitle !== ''): ?>
            <h4 class="text-secondary mb-3"><?= htmlspecialchars($subtitle) ?></h4>
            <?php endif; ?>
            <hr>
            <!-- Gọi include để hiển thị ngày giờ hiện hành của máy chủ và trình duyệt -->
            <?php include __DIR__ . '/../../includes/datetime.php'; ?>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
