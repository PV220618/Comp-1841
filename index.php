<?php
$title = 'GreenWich Q and A';
ob_start();
include 'template/home.html.php';
$output = ob_get_clean();
include 'template/layout.html.php';
