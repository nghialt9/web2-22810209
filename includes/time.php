<?php
$_micro      = microtime(true);
$_ms         = sprintf('%03d', ($_micro - floor($_micro)) * 1000);
$_serverTime = date('d/m/Y H:i:s') . '.' . $_ms;
echo json_encode(['time' => $_serverTime]);