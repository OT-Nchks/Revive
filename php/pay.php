<?php
session_start();
require_once "user_guard.php";
require_once "../classes/Paystack.php";
require_once "../classes/Transaction.php";
require_once "../classes/User.php";

$pay = new Paystack();
 $trans = new Transaction();
$user = new User();

/*$reference = isset($_SESSION['refno']) ? $_SESSION['refno']:0;

if($reference){
   $user_details = $user->get_user_by_id($_SESSION['useronline']);
   $email =$user_details['user_email'];
   $amount = $trans->get_transaction_amt($reference);

    $payresponse = $pay->paystack_initialize($email, $amount, $reference);


    if($payresponse->status==1){
        $url= $payresponse->data->authorization_url;
        header("location:$url");
    }
    else{
        $_SESSION['errormessage'] = "Please check out again";
        header("location:confirm.php");
        exit();
    }

  echo "<pre>";
    print_r($payresponse);
    echo "</pre>";
}
else{
    $_SESSION['errormessage'] = "You need to choose a payment plan";
    header("location: checkout.php");
    exit();
}

?>*/







$reference = isset($_SESSION['refno']) ? $_SESSION['refno'] : null;

if ($reference) {
    $user_details = $user->get_user_by_id($_SESSION['useronline']);
    $email = $user_details['user_email'];
    $amount = $trans->get_transaction_amt($reference);

    $payresponse = $pay->paystack_initialize($email, $amount['trans_amt'], $reference);

    if ($payresponse->status) {
        $url = $payresponse->data->authorization_url;
        header("Location: $url");
        exit(); // Ensure exit after redirect
    } else {
        $_SESSION['errormessage'] = "Please check out again";
        header("Location: confirm.php");
        exit(); // Ensure exit after redirect
    }
} else {
    $_SESSION['errormessage'] = "You need to choose a payment plan";
    header("Location: checkout.php");
    exit(); // Ensure exit after redirect
}
?>
