<?php
include '../../conf/admin/config.php';
session_destroy();
General::voidRedirectUrl('index.php');
?>