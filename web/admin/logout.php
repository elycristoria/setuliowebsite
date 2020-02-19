<?php
include '../../conf/config.php';
session_destroy();
General::voidRedirectUrl('index.php');
?>