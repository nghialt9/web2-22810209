<?php
require_once __DIR__ . '/lib/functions.php';

define('D2026_DIR', __DIR__);

$_docRoot    = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$_projectUrl = str_ireplace($_docRoot, '', str_replace('\\', '/', dirname(dirname(__DIR__))));
$_pageUrl    = str_ireplace($_docRoot, '', str_replace('\\', '/', __DIR__)) . '/indexb.php';

$page = in_array($_GET['page'] ?? '', ['home', 'upload']) ? $_GET['page'] : 'home';

// Xử lý POST upload
$formErrors = [];
$formData   = [];
$uploadResult = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $page === 'upload') {
    $formData = [
        'mssv'  => trim($_POST['mssv']  ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'hoten' => trim($_POST['hoten'] ?? ''),
    ];

    // Validate thông tin sinh viên
    $formErrors = validateStudentInfo($formData);

    // Validate từng file slot
    $validSlots = [];
    for ($i = 1; $i <= UPLOAD_MAX_FILES; $i++) {
        $file = $_FILES['file' . $i] ?? null;
        if (!$file) continue;
        $result = validateUploadedFile($file);
        if ($result === null) continue;      // slot trống
        if ($result === '') {
            $validSlots[$i] = $file;         // hợp lệ
        } else {
            $formErrors[] = $result;         // lỗi
        }
    }

    if (count($validSlots) < UPLOAD_MIN_FILES && empty($formErrors)) {
        $formErrors[] = 'Bạn chưa chọn tệp nào. Vui lòng chọn từ 1 đến 4 tệp trước khi Submit.';
    } elseif (count($validSlots) < UPLOAD_MIN_FILES) {
        $formErrors[] = 'Vui lòng chọn ít nhất 1 tệp hợp lệ.';
    }

    // Upload nếu không có lỗi
    if (empty($formErrors)) {
        if (!is_dir(UPLOAD_DIR)) {
            mkdir(UPLOAD_DIR, 0755, true);
        }

        $uploadedFiles = [];
        foreach ($validSlots as $slot => $file) {
            $serverName = buildServerName($file['name'], $slot);
            move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $serverName);
            $uploadedFiles[] = [
                'slot'       => $slot,
                'original'   => $file['name'],
                'type'       => strtoupper(pathinfo($file['name'], PATHINFO_EXTENSION)),
                'size'       => formatFileSize($file['size']),
                'serverName' => $serverName,
            ];
        }

        $uploadResult = [
            'count' => count($uploadedFiles),
            'mssv'  => $formData['mssv'],
            'hoten' => $formData['hoten'],
            'time'  => date('d/m/Y H:i:s'),
            'files' => $uploadedFiles,
        ];
        $formData = []; // reset form sau khi submit thành công
    }
}

include __DIR__ . '/template/head.php';
include __DIR__ . '/template/nav.php';

if ($page === 'home') {
    include __DIR__ . '/template/page-home.php';
} else {
    include __DIR__ . '/template/page-upload.php';
}

include __DIR__ . '/template/footer.php';
