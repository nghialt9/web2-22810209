<?php
require_once __DIR__ . '/lib/functions.php';

define('B2026_DIR', __DIR__);

$_docRoot    = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$_projectUrl = str_ireplace($_docRoot, '', str_replace('\\', '/', dirname(dirname(__DIR__))));
$_pageUrl    = str_ireplace($_docRoot, '', str_replace('\\', '/', __DIR__)) . '/indexb.php';

$page = in_array($_GET['page'] ?? '', ['home', 'routes', 'route']) ? $_GET['page'] : 'home';

// Xử lý số tuyến khi page=route
$so = 0;
if ($page === 'route') {
    $so = (int)($_GET['so'] ?? 0);
    if (!in_array($so, getAllSoTuyen($arTuyen))) {
        $page = 'routes'; // callback nếu số tuyến không hợp lệ
    }
}

include __DIR__ . '/template/head.php';
include __DIR__ . '/template/nav.php';

if ($page === 'home') {
    include __DIR__ . '/template/page-home.php';
} elseif ($page === 'routes') {
    include __DIR__ . '/template/page-routes.php';
} elseif ($page === 'route') {
    include __DIR__ . '/template/page-route.php';
}

include __DIR__ . '/template/footer.php';
