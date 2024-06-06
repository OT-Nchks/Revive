<?php

require_once "../classes/Message.php";

$email = $_POST['email'];


// echo $message . $email;

$msg = new Message();
$send = $msg->sendMail($email);