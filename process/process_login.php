
<?php
session_start();
require_once('../classes/User.php');
require_once('../classes/sanitizer.php');


// Check if the form was submitted
if(isset($_POST["loginBtn"])){

    // Retrieve and sanitize the data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate the variables
   /* if(empty($email) || empty($password)){
        $_SESSION["errormessage"] = "Please fill in all fields.";
        header("location:../php/login.php");
    }
    else{*/
        // Instantiate the user
        $user = new User();
        $userdata = $user->login_user($email, $password);

        // Check if the login was successful
        if($userdata){
            $_SESSION["useronline"]=$userdata;
            header("location:../php/index.php");
            exit();
        }
        else{
            $_SESSION['errormessage'] = "Invalid email or password.";
            header("location:../php/login.php");
            exit();
        }
    }
/*}*/
/*else{
    $_SESSION['errormessage'] = "Please Complete the Form.";
    header("location:../php/login.php");
    exit();
}*/
else {
    # Check if the user is logged in using session data
    if(isset($_SESSION["useronline"])) {
        header("location:../php/index.php");
        exit();
    } else {
        # Redirect to login page if the form was not submitted and user is not logged in
        header("location:../php/login.php");
        exit();
    }
}
?>
