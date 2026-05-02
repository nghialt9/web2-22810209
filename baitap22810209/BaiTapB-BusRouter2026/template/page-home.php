<div class="container py-4">

  <!-- Hero -->
  <div class="p-4 mb-4 bg-dark text-white rounded-3 shadow">
    <div class="d-flex align-items-center gap-3">
      <i class="bi bi-bus-front-fill display-4 text-warning"></i>
      <div>
        <h2 class="fw-bold mb-1">Bài tập B – 2026</h2>
        <p class="mb-0 text-white-50">Trạm trung chuyển Đường Hàm Nghi – Thông tin tuyến xe buýt</p>
      </div>
    </div>
  </div>

  <div class="row g-4">

    <!-- Thông tin sinh viên -->
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-header bg-secondary text-white fw-bold">
          <i class="bi bi-person-badge"></i> Thông tin sinh viên
        </div>
        <div class="card-body p-0">
          <table class="table table-striped table-bordered mb-0">
            <tbody>
              <tr><th class="w-40">Họ và tên</th><td>Lâm Trọng Nghĩa</td></tr>
              <tr><th>MSSV</th><td>22810209</td></tr>
              <tr><th>Trường</th><td>ĐH Khoa học Tự nhiên – ĐHQG HCM</td></tr>
              <tr><th>Môn học</th><td>Lập trình Web 2</td></tr>
              <tr><th>Bài tập</th><td>B – Demo TLI1 2026</td></tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <a href="<?= htmlspecialchars($_pageUrl) ?>?page=routes"
             class="btn btn-dark btn-sm">
            <i class="bi bi-map"></i> Xem tất cả tuyến
          </a>
        </div>
      </div>
    </div>

    <!-- Giới thiệu nội dung -->
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-header bg-secondary text-white fw-bold">
          <i class="bi bi-info-circle"></i> Nội dung bài tập
        </div>
        <div class="card-body">
          <p>Hiển thị thông tin các tuyến xe buýt đi qua
          <strong>Trạm trung chuyển Đường Hàm Nghi</strong>, bao gồm:</p>
          <ul class="mb-3">
            <li>Danh sách tuyến: số hiệu, điểm đầu – điểm cuối</li>
            <li>Thời gian hoạt động, giãn cách chuyến, cự ly</li>
            <li>Danh sách trạm dừng theo từng chiều</li>
          </ul>
          <p class="mb-0"><strong>Kỹ thuật:</strong> Mảng 2 chiều PHP,
          Bootstrap 5 Cards & Timeline.</p>
        </div>
        <div class="card-footer d-flex gap-2 flex-wrap">
          <?php foreach ($arTuyen as $row): ?>
          <a href="<?= htmlspecialchars($_pageUrl) ?>?page=route&so=<?= $row[COL_SO] ?>"
             class="btn btn-<?= $row[COL_COLOR] ?> btn-sm">
            <i class="bi bi-signpost"></i> Tuyến <?= $row[COL_SO] ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>
</div>
