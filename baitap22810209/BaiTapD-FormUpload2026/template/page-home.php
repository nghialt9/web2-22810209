<div class="container py-4">

  <!-- Hero -->
  <div class="p-4 mb-4 bg-dark text-white rounded-3 shadow">
    <div class="d-flex align-items-center gap-3">
      <i class="bi bi-cloud-upload-fill display-4 text-warning"></i>
      <div>
        <h2 class="fw-bold mb-1">Bài tập D – Upload File</h2>
        <p class="mb-0 text-white-50">Nộp bài tập qua form upload</p>
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
              <tr><th>Bài tập</th><td>D – Upload File 2026</td></tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <a href="<?= htmlspecialchars($_pageUrl) ?>?page=upload"
             class="btn btn-dark btn-sm">
            <i class="bi bi-cloud-upload"></i> Đến form nộp bài
          </a>
        </div>
      </div>
    </div>

    <!-- Quy định upload -->
    <div class="col-md-6">
      <div class="card shadow-sm h-100">
        <div class="card-header bg-secondary text-white fw-bold">
          <i class="bi bi-info-circle"></i> Quy định nộp bài
        </div>
        <div class="card-body">
          <ul class="mb-3">
            <li>Điền đầy đủ MSSV, Email và Họ tên trước khi nộp</li>
            <li>Chọn từ <strong>1 đến 4 tệp</strong> bài làm</li>
            <li>Kích thước mỗi tệp: <strong>500 KB – 4 MB</strong></li>
            <li>Định dạng chấp nhận: <strong>PDF, DOC, DOCX</strong></li>
          </ul>
          <p class="mb-0">
            Tệp lưu server sẽ được đổi tên theo định dạng:<br>
            <code class="small">{tên_gốc}_slot{n}_{ngày}_{giờ}_{random}.{ext}</code>
          </p>
        </div>
        <div class="card-footer">
          <span class="badge bg-success"><i class="bi bi-check2-circle"></i> PDF</span>
          <span class="badge bg-primary ms-1"><i class="bi bi-check2-circle"></i> DOC</span>
          <span class="badge bg-primary ms-1"><i class="bi bi-check2-circle"></i> DOCX</span>
          <span class="text-muted small ms-2">500 KB – 4 MB / tệp</span>
        </div>
      </div>
    </div>

  </div>
</div>
