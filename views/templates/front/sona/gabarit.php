<?php
ob_start();
require_once __DIR__ . '/header.php';
$header = ob_get_clean();

require_once __DIR__ . '/main.php';