<?php
session_start();
require_once "user_guard.php";
require_once "../partials/header_tcpc.php";
require_once "../classes/User.php";
require_once "../classes/Transaction.php";

#instantiate the class
/*$user1= new User();


$reference = isset($_SESSION['refno']) ? $_SESSION['refno'] : null;

if (!$reference) {
    header("location: checkout.php");
    exit; // Add exit to prevent further execution
}

$trans = new Transaction();
$trans_details = $trans->get_trans_ref($reference);

echo "<pre>";
print_r($trans_details);
echo "</pre>";

echo "<a href='pay.php' class='btn btn-success' style='background:lightblue; width:200px;'>Confirm Payment</a>";
die();
?>

<div class="container col-md-10 py-5" style="background-color: white;">



    <div class="content">
      >

        <?php
        if (isset($_SESSION['reference']) && !empty($_SESSION['reference'])) {
            echo "<a href='checkout.php' class='btn btn-dark'>Checkout</a>";
        }
        ?>
    </div>
</div>






 </div>

</div>

 
 <!-- From here till end as footer.php--> 
<!-- FOOTER -->
<?php
require_once "partials/footer.php";
?>
      
  </body>
</html>*/







# Instantiate the User and Transaction classes
$user1 = new User();
$trans = new Transaction();

$reference = isset($_SESSION['refno']) ? $_SESSION['refno'] : null;

if (!$reference) {
    $_SESSION['errormessage'] = "No reference found.";
    header("Location: checkout.php");
    exit();
}

$trans_details = $trans->get_trans_ref($reference);

echo "<pre>";
print_r($trans_details);
echo "</pre>";

echo "<a href='pay.php' class='btn btn-success' style='background:lightblue; width:200px;'>Confirm Payment</a>";
?>

<div class="container col-md-10 py-5" style="background-color: white;">
    <div class="content">
        <?php
        if (isset($_SESSION['reference']) && !empty($_SESSION['reference'])) {
            echo "<a href='checkout.php' class='btn btn-dark'>Checkout</a>";
        }
        ?>
    </div>
</div>

<!-- FOOTER -->
<?php
require_once "../partials/footer_tcpc.php";
?>
