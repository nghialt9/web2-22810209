<?php
$_micro      = microtime(true);
$_ms         = sprintf('%03d', ($_micro - floor($_micro)) * 1000);
$_serverTime = date('d/m/Y H:i:s') . '.' . $_ms;
?>
<p><strong>Ngày giờ hiện hành của máy chủ Web:</strong> <span id="server-time"><?= $_serverTime ?></span></p>
<p><strong>Ngày giờ hiện hành của trình duyệt:</strong> <span id="browser-time">...</span></p>
<script src="js/clock.js"></script>
