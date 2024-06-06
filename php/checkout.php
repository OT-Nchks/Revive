<?php
session_start();
require_once "user_guard.php";
require_once "../partials/header_tcpc.php";
require_once "../classes/User.php";
require_once "../classes/Transaction.php";

#WE WANT TO RETRIEVE THE IDS OF THE ITEMS IN $_SESSION['TOPICS'] AND INSERT INTO TRANSACTION TABLE
/*$sub1 = new Transaction();
$user_id= $_SESSION['useronline'];

if(isset($_SESSION['trans'])&& !empty($_SESSION['trans'])){
  $ref = (time()).rand();  //generates a unique reference number and keeps in session
  $_SESSION['refno'] = $ref;

  $trans_id = $cart1->insert_trans_details($ref, $_SESSION['useronline'],$_SESSION['trans']);
//$_session['useronline']->is for the "trans_by"  
//$_session["topics"]->to get all topic ids

          if($trans_id){
              #WE WANT TO SEND THE DETAILS TO PAYSTACK
              header("location:confirm.php");
              exit();

          }
     
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out Page</title>
    <!--external css-->
<link rel="stylesheet" href="../assets/css/style.css">
 <style>
    body{
        font-family:poppins, sans-serif;
        background-image: url("../assets/images/bg3b.PNG");
    }
</style>

<?php

#WE WANT TO RETRIEVE THE IDS OF THE ITEMS IN $_SESSION['TOPICS'] AND INSERT INTO TRANSACTION TABLE

$trans_id=$sub1->get_trans_byuser($user_id);

echo "<pre>";
print_r($trans_id);
echo "</pre>";

?>
<button type="submit"><a href="pay.php">confirm</a></button>







<!-- FOOTER -->
<?php
require_once "../partials/footer_tcpc.php";
?>

     </body>
</html>*/










# Instantiate the Transaction class
$sub1 = new Transaction();
$user_id = $_SESSION['useronline'];

if (isset($_SESSION['trans']) && !empty($_SESSION['trans'])) {
    $ref = time() . rand();  // generates a unique reference number and keeps in session
    $_SESSION['refno'] = $ref;

    $trans_id = $sub1->insert_trans_details($ref, $_SESSION['useronline']);
    
    // Insert topics into trans_details table
    foreach ($_SESSION['topics'] as $topic_id) {
        $sub1->insert_trans_detail($trans_id, $topic_id);
    }

    if ($trans_id) {
        # Redirect to confirm.php to proceed with payment
        header("Location: confirm.php");
        exit();
    } else {
        $_SESSION['errormessage'] = "Transaction could not be created.";
        header("Location: checkout.php");
        exit();
    }
} else {
    $_SESSION['errormessage'] = "No transaction data found.";
    header("Location: checkout.php");
    exit();
}
?>
