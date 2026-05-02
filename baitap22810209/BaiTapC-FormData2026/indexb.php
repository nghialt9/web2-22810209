<?php

require_once __DIR__ . '/lib/functions.php';

$_docRoot    =rtrim(str_ireplace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$_projectUrl = str_ireplace($_docRoot, '', str_ireplace('\\', '/', dirname(dirname(__DIR__))));
$_pageUrl = str_ireplace($_docRoot, '', str_ireplace('\\', '/', __DIR__)).'/indexb.php';

$page = in_array($_GET['page'] ?? '', ['home', 'calc']) ? $_GET['page'] : 'home';

if($_SERVER['REQUEST_METHOD'] === 'POST' && $page === 'calc') {
    $num1 = trim($_POST['num1'] ?? '');
    $num2 = trim($_POST['num2'] ?? '');
    $operation = $_POST['operation'] ?? '';

    $result = calcalator($num1, $num2, $operation);
}

include __DIR__ . '/template/head.php';
include __DIR__ . '/template/nav.php';
include __DIR__ . '/template/page-' . $page . '.php';
include __DIR__ . '/template/footer.php';