<?php

session_start();
session_destroy();

echo "<script>  location.href='../iniciar_sesion.php'; </script>";

?>