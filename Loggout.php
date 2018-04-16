<?php
session_start();
unset($_SESSION['a']);
session_destroy();
header("location: index.php");

