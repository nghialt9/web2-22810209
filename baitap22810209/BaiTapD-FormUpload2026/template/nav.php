<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="<?= htmlspecialchars($_projectUrl) ?>/indexa.php">
      <i class="bi bi-house-fill text-warning"></i> MyWebRoot
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navD">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navD">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link<?= $page === 'home' ? ' active' : '' ?>"
             href="<?= htmlspecialchars($_pageUrl) ?>?page=home">
            <i class="bi bi-house"></i> Trang chủ
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= $page === 'upload' ? ' active' : '' ?>"
             href="<?= htmlspecialchars($_pageUrl) ?>?page=upload">
            <i class="bi bi-cloud-upload"></i> Nộp bài
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
