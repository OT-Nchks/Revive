<?php
error_reporting(E_ALL);
session_start();
require_once "../classes/User.php";

$user1 = new User();
$user1->logout_user();
header("location:index.php");
exit();

?>