<?php
session_start();
if(($_SESSION['atrangi'])!=911)
header("Location: ./index.php?error = 00");
?>