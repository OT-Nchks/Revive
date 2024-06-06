<?php
session_start();
require_once "../classes/User.php";


if (isset($_POST['updateBtn'])) {
  $currentPassword = $_POST['current_password'];
  $newPassword = $_POST['new_password'];
  $confirmPassword = $_POST['confirm_password'];
  $user_id = $_POST['id'];

  // Validate data (consider using a validation library)
  $errors = [];
if (empty($currentPassword)) {
$errors[] = "Current password is required.";
  }
  if (empty($newPassword)) {
    $errors[] = "New password is required.";
  } else if (strlen($newPassword) < 5) {
    $errors[] = "New password must be at least 5 characters long.";
  } 
  if ($newPassword !== $confirmPassword) {
    $errors[] = "Passwords do not match.";
  }

  // If there are errors, redirect back with error messages in session
  if (!empty($errors)) {
    $_SESSION['errormessage'] = $errors;
    header("Location: ../php/updatepassword.php"); 
    exit();
  }

 
  $user = new User();

  // Verify current password before update (hashed password comparison)
 $currentHashedPassword = $user->get_hashed_password($user_id); 
 //print_r($currentHashedPassword);
 //die();
if (!password_verify($currentPassword, $currentHashedPassword)) {
 $_SESSION['errormessage'] = ["Current password is incorrect."];
header("Location: ../php/updatepassword.php"); 
 exit();
 }

  // Hash the new password
  $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

  // Update user password
  $updated = $user->update_userpwd($hashedPassword, $user_id);

  // Handle update result
  if ($updated) {
    $_SESSION['successmessage'] = "Password updated successfully.";
    header("Location: ../php/profiletab.php"); 
    exit();
  } else {
    $_SESSION['errormessage'] = ["Error updating password. Please try again."];
    header("Location: ../php/updatepassword.php"); 
    exit();
  }

} else {
  // Redirect if form is not submitted through the proper method
  header("Location: ../php/updatepassword.php"); 
  exit();
}



