<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bài tập B – 22810209</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
.route-number {
    font-size: 1.6rem; font-weight: 800;
    min-width: 72px; text-align: center;
    border-radius: 8px; padding: 4px 12px;
    display: inline-block;
}
/* Timeline trạm dừng */
/* done show dot default */
.stop-list { list-style: none; padding-left: 0; }
/* show line */
.stop-list li {
    position: relative;
    padding: 8px 12px 8px 36px;
    border-left: 3px solid #dee2e6;
    margin-left: 12px;
}
/* show dot self defined */
.stop-list li::before {
    content: '';
    position: absolute;
    left: -8px; top: 50%; transform: translateY(-50%);
    width: 13px; height: 13px;
    border-radius: 50%;
    background: #adb5bd;
    border: 2px solid #fff;
    box-shadow: 0 0 0 1px #adb5bd;
}
/* show special dots for first and last items */
.stop-list li:first-child::before,
.stop-list li:last-child::before {
    background: #0d6efd;
    width: 15px; height: 15px;
    left: -9px;
    box-shadow: 0 0 0 1px #0d6efd;
}
.stop-list li .stop-code {
    font-size: .75rem; color: #6c757d;
    font-family: monospace;
}
</style>
</head>
<body class="bg-light">
