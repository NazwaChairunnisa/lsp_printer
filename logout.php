<?php

session_start();

unset($_SESSION["username"]);
session_destroy();
    echo"
    <script type='text/javascript'>
    alert('logout berhasil')
    window.location = 'index.php';
    </script>
    ";
?>