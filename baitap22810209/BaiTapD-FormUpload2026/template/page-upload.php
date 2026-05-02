<div class="container py-4" style="max-width:860px">
    <h4 class="fw-bold mb-4">
        <i class="bi bi-cloud-upload text-primary"></i> Bài tập D – Upload File
    </h4>
    <!-- Badge thông tin chủ bài -->
    <div class="mb-4">
        <div class="owner-badge">
            <strong>MSSV:</strong> 22810209 |
            <strong>Họ tên:</strong> Lâm Trọng Nghĩa |
            <strong>Email:</strong> 22810209@student.hcmus.edu.vn
        </div>
    </div>
    <?php if (!empty($uploadResult)): ?>
    <!-- ===== KẾT QUẢ UPLOAD ===== -->
    <div class="alert alert-success d-flex align-items-center gap-2 mb-4">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <span>
            Submit thành công ✅ Đã nhận <strong><?= $uploadResult['count'] ?></strong> tệp của
            <strong><?= htmlspecialchars($uploadResult['hoten']) ?></strong>
            (MSSV: <strong><?= htmlspecialchars($uploadResult['mssv']) ?></strong>).
        </span>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="fw-bold">
                Thông tin tệp đã upload (tối đa <?= UPLOAD_MAX_FILES ?>)
            </span>
            <span class="text-muted small">
                Thời gian nhận tệp: <?= htmlspecialchars($uploadResult['time']) ?>
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width:70px">Slot</th>
                        <th>Tên tệp (gốc)</th>
                        <th class="text-center" style="width:70px">Loại</th>
                        <th class="text-center" style="width:90px">Kích thước</th>
                        <th>Tên lưu server</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($uploadResult['files'] as $f): ?>
                    <tr>
                        <td class="text-center fw-bold">File <?= $f['slot'] ?></td>
                        <td class="text-break"><?= htmlspecialchars($f['original']) ?></td>
                        <td class="text-center">
                            <span class="badge bg-secondary"><?= htmlspecialchars($f['type']) ?></span>
                        </td>
                        <td class="text-center"><?= htmlspecialchars($f['size']) ?></td>
                        <td class="text-break small text-muted"><?= htmlspecialchars($f['serverName']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>

    <!-- ===== FORM ===== -->
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form id="uploadForm" method="post" action="<?= htmlspecialchars($_pageUrl) ?>?page=upload"
                enctype="multipart/form-data" novalidate>

                <!-- Thông tin sinh viên nộp bài -->
                <h6 class="fw-bold mb-3 border-bottom pb-2">Thông tin sinh viên nộp bài</h6>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label fw-bold">MSSV</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="mssv" id="mssv" placeholder="Ví dụ: 22810209"
                            value="<?= htmlspecialchars($formData['mssv'] ?? '') ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label fw-bold">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Ví dụ: 22810209@student.hcmus.edu.vn"
                            value="<?= htmlspecialchars($formData['email'] ?? '') ?>">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label class="col-sm-3 col-form-label fw-bold">Họ tên sinh viên</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="hoten" id="hoten"
                            placeholder="Ví dụ: Lâm Trọng Nghĩa"
                            value="<?= htmlspecialchars($formData['hoten'] ?? '') ?>">
                    </div>
                </div>

                <!-- Chọn tệp -->
                <h6 class="fw-bold mb-1 border-bottom pb-2">Chọn tệp bài làm</h6>
                <p class="text-muted small mb-3 text-center">
                    Quy định: 1–4 tệp • 500 KB – 4 MB mỗi tệp • chỉ PDF / DOC / DOCX
                </p>

                <?php for ($i = 1; $i <= UPLOAD_MAX_FILES; $i++): ?>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label fw-bold">Template file <?= $i ?></label>
                    <div class="col-sm-9">
                        <div class="file-slot">
                            <input type="file" class="form-control border-0 p-0 bg-transparent" name="file<?= $i ?>"
                                id="file<?= $i ?>" accept=".pdf,.doc,.docx">
                            <div class="file-preview d-none small mt-1" id="preview<?= $i ?>"></div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>

                <!-- Buttons -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-4" id="submitBtn">
                        <i class="bi bi-send"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-secondary px-3" id="resetBtn">
                        <i class="bi bi-x-circle"></i> Reset
                    </button>
                </div>

                <!-- Lỗi PHP server-side -->
                <?php if (!empty($formErrors)): ?>
                <div class="validation-box mt-3">
                    <ul class="mb-0 ps-3">
                        <?php foreach ($formErrors as $err): ?>
                        <li><?= htmlspecialchars($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Lỗi JS client-side -->
                <div class="validation-box mt-3 d-none" id="jsErrors">
                    <ul class="mb-0 ps-3" id="jsErrorList"></ul>
                </div>

            </form>
        </div>
    </div>

</div>

<script>
(function() {
    const MIN_SIZE = <?= UPLOAD_MIN_SIZE ?>;
    const MAX_SIZE = <?= UPLOAD_MAX_SIZE ?>;
    const ALLOWED = ['pdf', 'doc', 'docx'];
    const MAX_FILES = <?= UPLOAD_MAX_FILES ?>;

    function fmtSize(bytes) {
        return bytes >= 1048576 ?
            (bytes / 1048576).toFixed(2) + ' MB' :
            (bytes / 1024).toFixed(2) + ' KB';
    }

    function showPreview(idx, file) {
        const ext = file.name.split('.').pop().toLowerCase();
        const now = new Date();
        const time = now.toTimeString().slice(0, 8);
        const date = now.getDate() + '/' + (now.getMonth() + 1) + '/' + now.getFullYear();

        let statusHtml;
        if (!ALLOWED.includes(ext)) {
            statusHtml =
                '<span class="badge bg-danger">Lỗi</span> <span class="text-danger">Sai định dạng – chỉ PDF, DOC, DOCX.</span>';
        } else if (file.size < MIN_SIZE) {
            statusHtml =
                '<span class="badge bg-danger">Lỗi</span> <span class="text-danger">Tệp quá nhỏ (tối thiểu 500 KB).</span>';
        } else if (file.size > MAX_SIZE) {
            statusHtml =
                '<span class="badge bg-danger">Lỗi</span> <span class="text-danger">Tệp quá lớn (tối đa 4 MB).</span>';
        } else {
            statusHtml = '<span class="badge bg-success">OK</span>';
        }

        const box = document.getElementById('preview' + idx);
        box.innerHTML =
            '<div>' + statusHtml + '</div>' +
            '<div><strong>Tên:</strong> <span class="text-primary">' + file.name + '</span></div>' +
            '<div><strong>Loại:</strong> ' + ext.toUpperCase() + ' &bull; <strong>Size:</strong> ' + fmtSize(file
                .size) + '</div>' +
            '<div><strong>Thời gian chọn:</strong> ' + time + ' ' + date + '</div>';
        box.classList.remove('d-none');
    }

    for (let i = 1; i <= MAX_FILES; i++) {
        document.getElementById('file' + i).addEventListener('change', function() {
            const box = document.getElementById('preview' + i);
            if (this.files[0]) {
                showPreview(i, this.files[0]);
            } else {
                box.classList.add('d-none');
                box.innerHTML = '';
            }
        });
    }

    document.getElementById('resetBtn').addEventListener('click', function() {
        for (let i = 1; i <= MAX_FILES; i++) {
            const box = document.getElementById('preview' + i);
            box.classList.add('d-none');
            box.innerHTML = '';
        }
        document.getElementById('jsErrors').classList.add('d-none');
    });

    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        const errors = [];

        // Kiểm tra thông tin sinh viên
        const mssv = document.getElementById('mssv').value.trim();
        const email = document.getElementById('email').value.trim();
        const hoten = document.getElementById('hoten').value.trim();
        const missingInfo = [];
        if (!mssv) missingInfo.push('MSSV');
        if (!email) missingInfo.push('Email');
        if (!hoten) missingInfo.push('Họ tên sinh viên');
        if (missingInfo.length) {
            errors.push('Vui lòng nhập đầy đủ ' + missingInfo.join(', ') + '.');
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            errors.push('Email không đúng định dạng.');
        }

        // Kiểm tra file
        let fileCount = 0;
        for (let i = 1; i <= MAX_FILES; i++) {
            const input = document.getElementById('file' + i);
            if (!input.files[0]) continue;
            fileCount++;
            const file = input.files[0];
            const ext = file.name.split('.').pop().toLowerCase();
            if (!ALLOWED.includes(ext)) {
                errors.push('Tệp "' + file.name + '" không hợp lệ. Chỉ chấp nhận PDF, DOC, DOCX.');
            } else if (file.size < MIN_SIZE) {
                errors.push('Tệp "' + file.name + '" quá nhỏ (tối thiểu 500 KB).');
            } else if (file.size > MAX_SIZE) {
                errors.push('Tệp "' + file.name + '" quá lớn (tối đa 4 MB).');
            }
        }
        if (fileCount === 0) {
            errors.push('Bạn chưa chọn tệp nào. Vui lòng chọn từ 1 đến 4 tệp trước khi Submit.');
        }

        const box = document.getElementById('jsErrors');
        const list = document.getElementById('jsErrorList');
        if (errors.length) {
            e.preventDefault();
            list.innerHTML = errors.map(err => '<li>' + err + '</li>').join('');
            box.classList.remove('d-none');
            box.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        } else {
            box.classList.add('d-none');
        }
    });
})();
</script>