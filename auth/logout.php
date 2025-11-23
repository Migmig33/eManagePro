<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('successfully logged out');
window.location.href = '../public/view/login.php';
</script>";

exit;
?>