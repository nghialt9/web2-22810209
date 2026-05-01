<?php
require_once __DIR__ . '/lib/functions.php';

define('A2026_DIR', __DIR__);

// URL helpers – __DIR__ = baitap22810209/A-2026
$_docRoot    = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$_projectUrl = str_ireplace($_docRoot, '', str_replace('\\', '/', dirname(dirname(__DIR__))));
$_pageUrl    = str_ireplace($_docRoot, '', str_replace('\\', '/', __DIR__)) . '/indexb.php';

$page = in_array($_GET['page'] ?? '', ['home', 'magic']) ? $_GET['page'] : 'home';

if ($page === 'magic') {
    $t = [
        'd' => (int)date('d'),
        'm' => (int)date('m'),
        'H' => (int)date('H'),
        'i' => (int)date('i'),
        's' => (int)date('s'),
    ];
    $serverTime = date('d/m/Y H:i:s');
    $cells      = generateMagicCells();
    $highlight  = getHighlightSet($t);
}

include __DIR__ . '/template/head.php';
include __DIR__ . '/template/header.php';
include __DIR__ . '/template/nav.php';
?>

<!-- Grid -->
<div class="w3-row">

    <!-- Blog entries -->
    <div class="w3-col l8 s12">
    <?php
    if ($page === 'home') {
        include __DIR__ . '/template/page-home.php';
    } elseif ($page === 'magic') {
        include __DIR__ . '/template/page-magic.php';
    }
    ?>
    <!-- END BLOG ENTRIES -->
    </div>

<?php include __DIR__ . '/template/sidebar.php'; ?>

<!-- END GRID -->
</div><br>

<?php include __DIR__ . '/template/footer.php'; ?>
