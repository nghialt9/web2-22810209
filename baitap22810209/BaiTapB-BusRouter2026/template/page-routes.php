<div class="container py-4">

  <h4 class="fw-bold mb-4">
    <i class="bi bi-map text-primary"></i> Tuyến xe buýt – Trạm Hàm Nghi
  </h4>

  <!-- Cards tuyến -->
  <div class="row g-3 mb-5">
    <?php foreach ($arTuyen as $row): ?>
    <div class="col-sm-6 col-xl-3">
      <div class="card shadow-sm h-100 border-0">
        <div class="card-header bg-<?= $row[COL_COLOR] ?> text-white d-flex align-items-center gap-2">
          <span class="route-number bg-white text-<?= $row[COL_COLOR] ?>">
            <?= $row[COL_SO] ?>
          </span>
          <div class="lh-sm small">
            <div class="fw-bold"><?= htmlspecialchars($row[COL_DAU]) ?></div>
            <div class="opacity-75">→ <?= htmlspecialchars($row[COL_CUOI]) ?></div>
          </div>
        </div>
        <div class="card-body">
          <ul class="list-unstyled mb-0 small">
            <li class="mb-1">
              <i class="bi bi-clock text-muted me-1"></i>
              <strong>Giờ HĐ:</strong> <?= $row[COL_GIO_BD] ?> – <?= $row[COL_GIO_KT] ?>
            </li>
            <li class="mb-1">
              <i class="bi bi-arrow-repeat text-muted me-1"></i>
              <strong>Giãn cách:</strong> <?= htmlspecialchars($row[COL_GIAN]) ?>
            </li>
            <li>
              <i class="bi bi-rulers text-muted me-1"></i>
              <strong>Cự ly:</strong> <?= htmlspecialchars($row[COL_CULY]) ?>
            </li>
          </ul>
        </div>
        <div class="card-footer bg-transparent">
          <a href="<?= htmlspecialchars($_pageUrl) ?>?page=route&so=<?= $row[COL_SO] ?>"
             class="btn btn-<?= $row[COL_COLOR] ?> btn-sm w-100">
            <i class="bi bi-list-ul"></i> Xem trạm dừng
          </a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Bảng tổng hợp -->
  <h5 class="fw-bold mb-3"><i class="bi bi-table text-secondary"></i> Bảng tổng hợp</h5>
  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle mb-0">
        <thead class="table-dark">
          <tr>
            <th class="text-center">Số tuyến</th>
            <th>Điểm đầu</th>
            <th>Điểm cuối</th>
            <th class="text-center">Giờ hoạt động</th>
            <th class="text-center">Giãn cách</th>
            <th class="text-center">Cự ly</th>
            <th class="text-center">Chi tiết</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($arTuyen as $row): ?>
          <tr>
            <td class="text-center">
              <span class="badge bg-<?= $row[COL_COLOR] ?> fs-6 px-3">
                <?= $row[COL_SO] ?>
              </span>
            </td>
            <td><?= htmlspecialchars($row[COL_DAU]) ?></td>
            <td><?= htmlspecialchars($row[COL_CUOI]) ?></td>
            <td class="text-center text-nowrap">
              <?= $row[COL_GIO_BD] ?> – <?= $row[COL_GIO_KT] ?>
            </td>
            <td class="text-center"><?= htmlspecialchars($row[COL_GIAN]) ?></td>
            <td class="text-center"><?= htmlspecialchars($row[COL_CULY]) ?></td>
            <td class="text-center">
              <a href="<?= htmlspecialchars($_pageUrl) ?>?page=route&so=<?= $row[COL_SO] ?>"
                 class="btn btn-outline-<?= $row[COL_COLOR] ?> btn-sm">
                <i class="bi bi-signpost-split"></i>
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
