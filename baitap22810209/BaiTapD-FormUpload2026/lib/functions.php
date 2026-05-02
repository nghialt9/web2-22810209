<?php

// Hằng số quy định file upload
define('UPLOAD_MIN_SIZE',  500 * 1024);        // 500 KB
define('UPLOAD_MAX_SIZE',  4 * 1024 * 1024);   // 4 MB
define('UPLOAD_MAX_FILES', 4);
define('UPLOAD_MIN_FILES', 1);
define('UPLOAD_ALLOWED_EXT', ['pdf', 'doc', 'docx']);
define('UPLOAD_DIR', __DIR__ . '/../uploads/');

// Kiểm tra thông tin sinh viên nộp bài
// Trả về mảng lỗi (rỗng = hợp lệ)
function validateStudentInfo(array $post): array {
    $errors = [];
    if (trim($post['mssv'] ?? '') === '') {
        $errors[] = 'Vui lòng nhập MSSV.';
    }
    if (trim($post['email'] ?? '') === '' || !filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Vui lòng nhập Email hợp lệ.';
    }
    if (trim($post['hoten'] ?? '') === '') {
        $errors[] = 'Vui lòng nhập Họ tên sinh viên.';
    }
    return $errors;
}

// Kiểm tra một slot file upload
// Trả về chuỗi lỗi, hoặc null nếu slot trống, hoặc '' nếu hợp lệ
function validateUploadedFile(array $file): ?string {
    if ($file['error'] === UPLOAD_ERR_NO_FILE) {
        return null; // slot trống, bỏ qua
    }
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return "Lỗi upload tệp '{$file['name']}' (mã lỗi: {$file['error']}).";
    }
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, UPLOAD_ALLOWED_EXT)) {
        return "Tệp '{$file['name']}' không hợp lệ. Chỉ chấp nhận PDF, DOC, DOCX.";
    }
    if ($file['size'] < UPLOAD_MIN_SIZE) {
        return "Tệp '{$file['name']}' quá nhỏ (tối thiểu 500 KB, thực tế: " . formatFileSize($file['size']) . ').';
    }
    if ($file['size'] > UPLOAD_MAX_SIZE) {
        return "Tệp '{$file['name']}' quá lớn (tối đa 4 MB, thực tế: " . formatFileSize($file['size']) . ').';
    }
    return ''; // hợp lệ
}

// Làm sạch tên file: bỏ ký tự unicode/đặc biệt → thay bằng _
function sanitizeFilename(string $name): string {
    $name = preg_replace('/[^\x20-\x7E]/', '_', $name);    // ký tự ngoài ASCII
    $name = preg_replace('/[^a-zA-Z0-9._-]/', '_', $name); // ký tự đặc biệt
    $name = preg_replace('/_+/', '_', $name);              // gộp __ liên tiếp
    return trim($name, '_') ?: 'file';
}

// Tạo tên lưu server: {sanitized}_slot{n}_{Ymd}_{His}_{rand6}.{ext}
function buildServerName(string $originalName, int $slot): string {
    $ext  = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $base = sanitizeFilename(pathinfo($originalName, PATHINFO_FILENAME));
    $rand = substr(bin2hex(random_bytes(3)), 0, 6);
    return $base . '_slot' . $slot . '_' . date('Ymd') . '_' . date('His') . '_' . $rand . '.' . $ext;
}

// Format kích thước file sang KB/MB
function formatFileSize(int $bytes): string {
    if ($bytes >= 1024 * 1024) {
        return number_format($bytes / (1024 * 1024), 2) . ' MB';
    }
    return number_format($bytes / 1024, 2) . ' KB';
}
