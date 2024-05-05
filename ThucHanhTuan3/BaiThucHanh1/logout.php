<?php
session_start();

// Hủy session
session_destroy();

// Chuyển hướng về trang đăng nhập
header('Location: login.html');
exit();
?>
