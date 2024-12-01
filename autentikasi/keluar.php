<?php
session_start();
session_destroy();
header('Location: ../halaman/landingpage.php'); // Redirect ke halaman login
exit;
?>