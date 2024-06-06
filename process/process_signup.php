<?php
   error_reporting(E_ALL);
   session_start(); 
    require_once "../classes/User.php";
    require_once "../classes/sanitizer.php";

    #check if the form was submitted or te user vists the page directly
    if(isset($_POST["signupBtn"])){

      #retrieving the data and sanitize
        $firstname = sanitizer($_POST["firstname"]);
        $lastname = sanitizer($_POST["lastname"]);
        $email = sanitizer($_POST["email"]);
        $dob = $_POST["dob"];
        $password = sanitizer($_POST["password"]);
        
        $state = $_POST['state']; 
       /* if($state == "0"){
            echo "You must select a state";
        } else {
            echo "Selected state: " . $state;
        }*/

        /* if(!isset($_POST["gender"])){
        die("You must select a gender!");
        }*/
        if(isset($_POST["gender"])){
        $gender = $_POST["gender"]; 
        }

     
        #validating the variables
 if(empty($firstname) || empty($lastname) || empty($email) || empty($dob) || empty($state) || empty($gender) || empty($password)){
    $_SESSION["errormessage"] = "Please fill in all fields";
        header("location:../php/signup.php");
        exit();
    }
    else{
     #instantiating the user
         $user1 = new User();
        $response = $user1->insert_user($firstname, $lastname, $email, $dob, $gender, $state, $password);
#to check if it is working
if($response){
    $_SESSION["useronline"]=$response;
    header("location:../php/index.php");
}
else{
    header("location:../php/signup.php"); 
}
}

$user1->insert_user($firstname, $lastname, $email, $dob, $gender, $state,  $password);
}
else{
$_SESSION['errormessage'] = "Please Complete the Registration";
header("location:../php/signup.php");
exit();
}

?>

