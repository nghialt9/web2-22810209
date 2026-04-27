<?php
$bt = strtoupper(preg_replace('/[^a-zA-Z]/', '', $_GET['bt'] ?? 'A'));
if (strlen($bt) !== 1 || $bt < 'A' || $bt > 'Z') {
    $bt = 'A';
}

$subtitle = trim(strip_tags($_GET['sub'] ?? ''));
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập <?= htmlspecialchars($bt) ?> – 22810209</title>
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
                <a class="nav-link" href="indexa.php">Host Home</a>
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
            <?php include 'includes/datetime.php'; ?>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
