<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="<?= htmlspecialchars($_projectUrl) ?>/indexa.php">
      <i class="bi bi-house-door text-primary"></i> MyWebRoot
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link<?= $page === 'home' ? ' active' : '' ?>"
             href="<?= htmlspecialchars($_pageUrl) ?>?page=home">
            <i class="bi bi-house"></i> Trang chủ
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= $page === 'routes' ? ' active' : '' ?>"
             href="<?= htmlspecialchars($_pageUrl) ?>?page=routes">
            <i class="bi bi-map"></i> Tất cả tuyến
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle<?= $page === 'route' ? ' active' : '' ?>"
             href="#" data-bs-toggle="dropdown">
            <i class="bi bi-signpost-split"></i> Xem tuyến
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <?php foreach ($arTuyen as $row): ?>
            <li>
              <a class="dropdown-item<?= ($page === 'route' && $so === $row[COL_SO]) ? ' active' : '' ?>"
                 href="<?= htmlspecialchars($_pageUrl) ?>?page=route&so=<?= $row[COL_SO] ?>">
                <span class="badge bg-<?= $row[COL_COLOR] ?> me-2"><?= $row[COL_SO] ?></span>
                <?= htmlspecialchars($row[COL_DAU]) ?> →
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
