<?php
session_start();
session_destroy();
header('Location: login.php'); // Redireciona para a tela de login
exit();
?>
