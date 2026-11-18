<?php
require_once __DIR__ . '/app.php';
$_SESSION = [];
session_destroy();
header('Location: index.php');
exit;
