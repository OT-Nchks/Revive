<?php
session_start();
require_once "user_guard.php";
require_once "../partials/header_tcpc.php";
require_once "../classes/User.php";

$user_id=$_SESSION['useronline'];

$user = new User();
$email= $user->fetch_user_email($user_id);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="keywords" content="Sleep, Insomnia, Sleep App, Sleep Tracking, Meditation, Mental health, Mindfulness, Stress and Anxiety"/>
	<meta name="description" content="Revive is designed to provide comprehensive support and guidance for individuals struggling with insomnia. Leveraging cutting-edge technology and evidence-based techniques, Revive aims to empower users to understand, manage, and improve their sleep patterns effectively."/>
	<meta name="author" content="Revive"/>

    <title>Revive | Your Personal Sleep Companion | Awaken Your Vitality. </title>

    <link rel="icon" href="../assets/images/favicon-revive.png" type="image/png">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link href="../assets/css/bootstrap/bootstrap.css" rel="stylesheet">
   
<style>
    body{
        font-family:poppins, sans-serif;
        background-image: url("../assets/images/bg3b.PNG");
    }
   a{
    color:#fff;
    text-decoration: none;
   }
    .wrapper{
        background-image: url("../assets/images/bg3b.PNG");
        background-repeat: no-repeat;
        background-position: center;
        padding: 0 20px 0 20px;
    }
    .main{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        transition:height .2s ease;
    }
    .side-image{
        background-image: url("../assets/images/pdirect.jpg");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 10px 0 0 10px;
        position: relative;
        height:100%;
    }
    .row{
      width:  670px;
      height:360px;
      border-radius: 10px;
      border: 2px solid rgba(141, 127, 117,0.2);
    background:rgba(141, 127, 117,0.2); 
    backdrop-filter: blur(12px);
      padding-top: 0px;
      box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.2);
      z-index:100;
    }
   
    i{
        font-weight: 400;
        font-size: 12px;
        color:#d7cdbb;
    }
    .right{
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      
    }
    .input-box{
      width: 330px;
      box-sizing: border-box;
    }

   .logo{
        width: 110px;
        position: fixed;
        top: 20px;
        left: 0;
    }
    .logo2{
        width: 140px;
        position:absolute;
        top: 20px;
        left: 5px;
    }
    .input-box header{
        font-weight: 600;
        color:#d7cdbb;
        font-size:27px;
        text-align: center;
        margin-top: 25px;
        margin-bottom: 45px;
    }
    .input-field{
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 0 10px 0 10px;
    }
 
    .input{
        height: 45px;
        width: 100%;
        font-size:13px;
        background: transparent;
        border: none;
        border-bottom: 1px solid #e0dacf;
        outline: none;
        margin-bottom: 20px;
        color:#dde6f2;
    }
   
    .input-box .input-field label{
        position: absolute;
        color:#d7cdbb;
        top: 10px;
        left: 10px;
        font-size:14px;
        pointer-events: none;
        transition: .5s;
    }
    .input-field input:focus ~ label
       {
        top: -10px;
        font-size: 13px;
      }
      .input-field input:valid ~ label
      {
       top: -10px;
       font-size: 13px;
       color: #93b2d7;
     }
     .input-field .input:focus, .input-field .input:valid{
        border-bottom: 1px solid #93b2d7;
     }
     select{
        background:transparent;
        border:transparent;
        font-size:12px;
        font-style: italic;
        color:#d7cdbb;
        position: relative;
        padding: 24px 0 0 20px;
        border-bottom: 1px solid #e0dacf;
     }

     .submit{
    width:100%;
    border: none;
    outline: none;
    height: 45px;
    color:white;
    background: linear-gradient(135deg, rgb(46, 111, 59) 0%, rgb(56, 121, 175) 100%);
    border-radius: 10px;
    transition: .4s;
     }
     .submit:hover{
        opacity: 0.8;
        font-weight: 600;
        color: #fff;
     }
  
  
    @media only screen and (max-width: 768px){
        .side-image{
        border-radius: 10px 10px 0 0;
        background-image: url("../assets/images/pdirect.jpg");
        background-position: center;
        background-size: cover;
        height:60px;
        }
    
         .logo{
         width: 72px;
        top: -4px;
        left: 35%;
        }
        .logo2{
        display: none;
        }
        .text{
        position: absolute;
        top: 70%;
        text-align: center;
        }
        p, i{
            font-size: 12px;
        }
        .input-box header{
        font-size:18px;
        margin-top:15px;
        }
        .row{
        max-width:450px;
        width: 110%;
        height:320px;
        }
        .submit{
            width:auto;
        }
    }
    @media only screen and (max-width: 1280px){
        .logo2{
        display: none;
        }
    }
</style>
</head>
<body>

<div class="wrapper">
        <div class="container main">
            
            <div class="row animate__animated animate__fadeInUp animate__delay-0.9s">

                <div class="col-md-6 side-image">
                    <img src="../assets/images/logo.PNG" class="logo" id="logo">
                </div>
                <div class="col-md-6 right">
                    
                <form>
    <div class="input-box">
        <header>Thank you for your payment!
            <h6><i>Now you can fully experience the App.</i></h6>
        </header>

        <div class="input-field">
            <input type="email" class="input" value="<?php echo $email ?>"> 
        </div>
       
        <div class="input-field">
            <button class="submit"><a href="dashboard.php">Go to Dashboard</a></button>
        </div>
        
    </div> 
    </form>
</div>
            </div>
        </div>
    </div>
</div>
</div>



     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>