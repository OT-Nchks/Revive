<?php
session_start(); 
require '../classes/Transaction.php'; 


if(isset($_POST["subBtn"])) {
    $email = $_POST["email"];
    $plan = $_POST["plan"];
    $amount = $_POST["amount"];
    $user_id = $_SESSION["useronline"];
    
    // Validate form fields
    $errors = [];
    if(empty($email) || empty($plan) || empty($amount)) {
        $errors[] = "Please fill in all fields.";
    }
   
    
    if($errors) {
        $_SESSION['user_errormessage'] = $errors;
        header("Location: ../php/payment.php");
        exit();
    } else {
        $ref = time() . rand();
        $_SESSION['refno'] = $ref;

      
        $transaction = new Transaction();
        try {
            $trans_id = $transaction->sub_pay($email, $plan, $ref, $amount, $user_id);
            if($trans_id) {
                // If insertion is successful,
                echo "<script>
                    window.location.href = '../php/pay_direct.php';
                </script>";
            exit();
            } else {
               
                $_SESSION['user_errormessage'] = "Failed to process the payment.";
                header("Location: ../php/payment.php");
                exit();
            }
        } catch (Exception $e) {
            
            $_SESSION['user_errormessage'] = "An error occurred: " . $e->getMessage();
            header("Location: ../php/payment.php");
            exit();
        }
    }
} else {
    // Redirect if the form is not submitted
    $_SESSION['user_errormessage'] = "Please complete the form.";
    header("Location: ../php/payment.php");
    exit();
}
?>

