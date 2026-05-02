<div class="container py-4">
    <div class="p-4 mb-4 bg-dark text-white rounded-3 shadow">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-calculator-fill display-4 text-warning"></i>
            <div>
                <h2 class="fw-bold mb-1">Bài tập C – Form Data</h2>
                <p class="mb-0 text-white-50">Nộp bài tập qua form data</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-secondary text-white fw-bold">
                    <i class="bi bi-person-badge"></i> Thông tin sinh viên
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-bordered mb-0">
                        <tbody>
                            <tr>
                                <th class="w-40">Họ và tên</th>
                                <td>Lâm Trọng Nghĩa</td>
                            </tr>
                            <tr>
                                <th>MSSV</th>
                                <td>22810209</td>
                            </tr>
                            <tr>
                                <th>Trường</th>
                                <td>ĐH Khoa học Tự nhiên – ĐHQG HCM</td>
                            </tr>
                            <tr>
                                <th>Môn học</th>
                                <td>Lập trình Web 2</td>
                            </tr>
                            <tr>
                                <th>Bài tập</th>
                                <td>C – Form Data 2026</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="<?= htmlspecialchars($_pageUrl) ?>?page=calc" class="btn btn-dark btn-sm">
                        <i class="bi bi-calculator"></i> Đến máy tính
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <?php include __DIR__ . '/form.php'; ?>
        </div>
    </div>
</div>