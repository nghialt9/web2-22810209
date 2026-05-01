<!-- Hiển thị ngày giờ hiện hành của máy chủ và trình duyệt -->
 <!-- Bắt đầu khai báo biến -->
<?php
$_micro      = microtime(true);
$_ms         = sprintf('%03d', ($_micro - floor($_micro)) * 1000);
$_serverTime = date('d/m/Y H:i:s') . '.' . $_ms;

$_docRoot     = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$_includesUrl = str_ireplace($_docRoot, '', str_replace('\\', '/', __DIR__));
$_projectUrl  = str_ireplace($_docRoot, '', str_replace('\\', '/', dirname(__DIR__)));
?>
<!-- Hết khai báo biến -->

<p><strong>Ngày giờ hiện hành của máy chủ Web:</strong> <span id="server-time"><?= $_serverTime ?></span></p>
<p><strong>Ngày giờ hiện hành của trình duyệt:</strong> <span id="browser-time">...</span></p>

<!-- Gán Time_URL để clock.js có thể gọi AJAX lấy thời gian từ time.php -->
<script>window.TIME_URL = '<?= $_includesUrl ?>/time.php';</script>
<script src="<?= $_projectUrl ?>/js/clock.js?v=<?= filemtime(__DIR__ . '/../js/clock.js') ?>"></script>
