<div class="container py-4" style="max-width:860px">
    <h4 class="fw-bold mb-4">
        <i class="bi bi-cloud-upload text-primary"></i> Bài tập C - Form Data 2026
    </h4>
    <!-- Badge thông tin chủ bài -->
    <div class="mb-4">
        <div class="owner-badge">
            <strong>MSSV:</strong> 22810209 |
            <strong>Họ tên:</strong> Lâm Trọng Nghĩa |
            <strong>Email:</strong> 22810209@student.hcmus.edu.vn
        </div>
    </div>
    <?php if (!empty($result)): ?>
    <!-- ===== KẾT QUẢ TÍNH TOÁN ===== -->
    <div class="alert alert-success mb-4">
        <div class="d-flex align-items-center gap-2 mb-1">
            <i class="bi bi-1-square fs-5"></i>
            <span>Số thứ nhất: <strong><?= htmlspecialchars($num1) ?></strong></span>
        </div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <i class="bi bi-2-square fs-5"></i>
            <span>Số thứ hai: <strong><?= htmlspecialchars($num2) ?></strong></span>
        </div>
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-calculator fs-5"></i>
            <span>Phép tính: <strong><?= htmlspecialchars($operation) ?></strong></span>
        </div>
    </div>
    <div class="alert alert-success d-flex align-items-center gap-2 mb-4">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <span>
            Kết quả: <strong><?= htmlspecialchars($result) ?></strong>
        </span>
    </div>
    <?php else: ?>
    <!-- ===== Show error rồi quay lại form ===== -->
    <div class="alert alert-danger d-flex align-items-center gap-2 mb-4 ">
        <i class="bi bi-x-square fs-5"></i>
        <span>
            Vui lòng điền đầy đủ thông tin và chọn phép tính trước khi Submit.
        </span>
    </div>
    <?php endif; ?>
    <?php include __DIR__ . '/form.php'; ?>
</div>