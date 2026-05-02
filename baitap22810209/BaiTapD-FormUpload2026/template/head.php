<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bài tập D – Upload File – 22810209</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
.file-slot {
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    padding: 10px 14px;
    background: #fafafa;
    transition: border-color .2s;
}
.file-slot:has(input:focus) { border-color: #0d6efd; }
.file-slot .file-hint { font-size: .8rem; color: #6c757d; margin-top: 4px; }
.validation-box {
    border: 1.5px dashed #dc3545;
    border-radius: 6px;
    background: #fff5f5;
    padding: 10px 16px;
    color: #dc3545;
    font-weight: 600;
}
.owner-badge {
    background: #f0f4ff;
    border: 1px solid #c7d7ff;
    border-radius: 8px;
    padding: 10px 18px;
    display: inline-block;
    font-size: .9rem;
}
</style>
</head>
<body class="bg-light">
