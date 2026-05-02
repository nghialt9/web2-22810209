<?php
$tuyen   = getTuyen($arTuyen, $so);
$stopsdi  = getStops($arStops, $so, 0); // chiều đi
$stopsve  = getStops($arStops, $so, 1); // chiều về
?>
<div class="container py-4">

  <?php if (!$tuyen): ?>
  <div class="alert alert-warning">Không tìm thấy tuyến <strong><?= (int)$so ?></strong>.</div>
  <?php else: ?>

  <!-- Header tuyến -->
  <div class="card shadow border-0 mb-4">
    <div class="card-body bg-<?= $tuyen[COL_COLOR] ?> text-white rounded-3">
      <div class="d-flex align-items-center gap-3 flex-wrap">
        <span class="route-number bg-white text-<?= $tuyen[COL_COLOR] ?>">
          <?= $tuyen[COL_SO] ?>
        </span>
        <div>
          <h4 class="fw-bold mb-1">
            <?= htmlspecialchars($tuyen[COL_DAU]) ?>
            <i class="bi bi-arrow-right mx-1"></i>
            <?= htmlspecialchars($tuyen[COL_CUOI]) ?>
          </h4>
          <div class="d-flex gap-3 flex-wrap small opacity-90">
            <span><i class="bi bi-clock me-1"></i><?= $tuyen[COL_GIO_BD] ?> – <?= $tuyen[COL_GIO_KT] ?></span>
            <span><i class="bi bi-arrow-repeat me-1"></i><?= htmlspecialchars($tuyen[COL_GIAN]) ?></span>
            <span><i class="bi bi-rulers me-1"></i><?= htmlspecialchars($tuyen[COL_CULY]) ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tabs chiều đi / chiều về -->
  <ul class="nav nav-tabs mb-3" id="stopTabs">
    <li class="nav-item">
      <button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#tab-di">
        <i class="bi bi-arrow-right-circle text-<?= $tuyen[COL_COLOR] ?>"></i>
        Chiều đi
        <span class="badge bg-<?= $tuyen[COL_COLOR] ?> ms-1"><?= count($stopsdi) ?></span>
      </button>
    </li>
    <li class="nav-item">
      <button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#tab-ve">
        <i class="bi bi-arrow-left-circle text-<?= $tuyen[COL_COLOR] ?>"></i>
        Chiều về
        <span class="badge bg-<?= $tuyen[COL_COLOR] ?> ms-1"><?= count($stopsve) ?></span>
      </button>
    </li>
  </ul>

  <div class="tab-content">

    <!-- Chiều đi -->
    <div class="tab-pane fade show active" id="tab-di">
      <div class="row">
        <div class="col-md-6">
          <p class="text-muted small mb-2">
            <i class="bi bi-geo-alt-fill text-<?= $tuyen[COL_COLOR] ?>"></i>
            <?= htmlspecialchars($tuyen[COL_DAU]) ?>
            → <?= htmlspecialchars($tuyen[COL_CUOI]) ?>
          </p>
          <ul class="stop-list">
            <?php foreach ($stopsdi as $i => $stop):
              $cls = ($i === 0 || $i === count($stopsdi) - 1) ? ' fw-bold' : '';
            ?>
            <li>
              <div class="stop-code"><?= htmlspecialchars($stop[0]) ?></div>
              <div class="<?= $cls ?>"><?= htmlspecialchars($stop[1]) ?></div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Chiều về -->
    <div class="tab-pane fade" id="tab-ve">
      <div class="row">
        <div class="col-md-6">
          <p class="text-muted small mb-2">
            <i class="bi bi-geo-alt-fill text-<?= $tuyen[COL_COLOR] ?>"></i>
            <?= htmlspecialchars($tuyen[COL_CUOI]) ?>
            → <?= htmlspecialchars($tuyen[COL_DAU]) ?>
          </p>
          <ul class="stop-list">
            <?php foreach ($stopsve as $i => $stop):
              $cls = ($i === 0 || $i === count($stopsve) - 1) ? ' fw-bold' : '';
            ?>
            <li>
              <div class="stop-code"><?= htmlspecialchars($stop[0]) ?></div>
              <div class="<?= $cls ?>"><?= htmlspecialchars($stop[1]) ?></div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>

  </div><!-- /tab-content -->

  <!-- Chuyển tuyến -->
  <hr>
  <div class="d-flex gap-2 flex-wrap">
    <a href="<?= htmlspecialchars($_pageUrl) ?>?page=routes"
       class="btn btn-outline-secondary btn-sm">
      <i class="bi bi-arrow-left"></i> Tất cả tuyến
    </a>
    <?php foreach ($arTuyen as $row):
      if ($row[COL_SO] === $so) continue; ?>
      <a href="<?= htmlspecialchars($_pageUrl) ?>?page=route&so=<?= $row[COL_SO] ?>"
        class="btn btn-<?= $row[COL_COLOR] ?> btn-sm">
        Tuyến <?= $row[COL_SO] ?>
      </a>
    <?php endforeach; ?>
  </div>

  <?php endif; ?>
</div>
