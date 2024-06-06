<?php
session_start();
/*require_once "user_guard.php";*/
 require_once "../partials/header_tcpc.php";
require_once "../classes/User.php";

$user = new User();
$states = $user->fetch_state();
?>

<link href="../assets/css/bootstrap/bootstrap.css" rel="stylesheet">
   
<style>
    body{
        font-family:poppins, sans-serif;
        background-image: url("../assets/images/bg3b.PNG");
    }
    .alert-danger-var{
    color:#FF5B61;
    font-size:13.5px;
    border:1px solid #FF5B61;
    background: #FFD7DD;
    border-radius:10px;
    padding:10px 10px 10px 10px;
    justify-content: center;
    margin-bottom: 10px;
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
        background-image: url("../assets/images/signup1.jpg");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 10px 0 0 10px;
        position: relative;
        height:100%;
    }
    .row{
      width:  900px;
      height:665px;
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
    .input-field2{
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 0 10px 0 10px;
    }
    .input-field3{
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 0 10px 0 10px;
    }
   .input-field3 label{
        color:#d7cdbb;
        top: 10px;
        left: 10px;
        font-size:14px;
        pointer-events: none;
        transition: .5s;
    }
    .input-field4 label{
        color:#d7cdbb;
        top: 10px;
        left: 10px;
        font-size:11px;
        pointer-events: none;
        transition: .5s;
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
    .input2{
        height: 25px;
        width: 100%;
        font-size:12px;
        background: transparent;
        border: none;
        border-bottom: 1px solid #e0dacf;
        outline: none;
        margin-bottom: 10px;
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
     .terms{
     font-size:0.7em;
    color:#d7cdbb;
    text-align: center;
    }

    .terms span  a{
     text-decoration: none;
     color:#93b2d7;
    }
    .terms span a:hover{
    text-decoration: underline;
    }
     .submit{
    width:100%;
    border: none;
    outline: none;
    height: 45px;
    color:white;
    background: #93b2d7d7;
    border-radius: 10px;
    transition: .4s;
     }
     .submit:hover{
        opacity: 0.8;
        font-weight: 600;
        color: #fff;
     }
     .signin{
        text-align: center;
        color:#d7cdbb;
        font-size: small;
        margin-top: 25px;
    }
   .error{
    font-size:11px;
    font-style: italic;
   }
   .login-register{
     font-size:0.9em;
    color:#d7cdbb;
    text-align: center;
     font-weight:500;
    margin:25px 0 10px;
    }
     .login-register p a{
     color:#93b2d7;
    text-decoration: none;
    font-weight:600;  
    }
    .login-register p a:hover{
     text-decoration: underline;
    }
  
    @media only screen and (max-width: 768px){
        .side-image{
        border-radius: 10px 10px 0 0;
        background-image: url("../assets/images/signup1.jpg");
        background-position: center;
        background-size: cover;
        height:70px;
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
        font-size:22px;
        margin-top:15px;
        }
        .row{
        max-width:450px;
        width: 100%;
        height:700px;
        }
        .error{
        font-size:10px;
        font-style: italic;
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
            <br><br>
            
            <div class="row animate__animated animate__fadeInUp animate__delay-0.9s">

                <div class="col-md-6 side-image">
                    <img src="../assets/images/logo.PNG" class="logo" id="logo">
                </div>
                <div class="col-md-6 right">
                    
                <form method="post" action="../process/process_signup.php">
    <div class="input-box">
        <header>Welcome to Revive!
            <h6><i>Register to create your Profile.</i></h6>
        </header>

                        <?php

                        if(isset($_SESSION['errormessage'])){
                            echo "<p class='alert alert-danger-var'>".$_SESSION['errormessage']."</p>";
                            unset($_SESSION['errormessage']);
                        }
                        ?>

        
        <p id="displayError" style="color: rgb(248, 69, 69); display: none;" class="error">Please fill in all fields</p>
        
            <div class="input-field">
            <input type="text" class="input" id="firstname" name="firstname" required>
            <label for="firstname">First Name</label> 
        </div>

        <div class="input-field">
            <input type="text" class="input" id="lastname" name="lastname" required>
            <label for="lastname">Last Name</label> 
        </div>

        <div class="input-field">
            <input type="email" class="input" id="email" name="email" required>
            <label for="email">Email Address</label> 
            <p id="emailError" style="color: rgb(248, 69, 69); display: none;" class="error">Please enter a valid email address</p>
        </div>

        <div class="input-field3 mb-1">
           <label for="gender">What is your Gender?</label>

             <div class="d-flex">
             <div class="col-3">
              <input type="radio" name="gender" id="male" value="male" class="pr-3"/>
              <label>Male</label><br>
              </div>
                                            
            <div class="col-3">
           <input type="radio" name="gender" id="female" value="female"/>
           <label>Female</label><br>
            </div>
            </div></div>


        <div class="d-flex">
            <div class="input-field">
            <input type="date" name="dob" class="input" id="dob"> 
        </div>

        <div class="input-field2">
          <select name="state">
          <option value="0">select state of origin...</option>
           <?php
             foreach($states as $state){
             $state_name = $state["state_name"];
             $state_id = $state["state_id"];
              echo "<option value='$state_id'>$state_name</option>";
              }
              ?>
            </select>
             </div>
        </div>

       
            <div class="input-field">
            <input type="password" class="input" id="password" name="password" required>
            <label for="password">Password</label> 
        </div>
                    

          <div class="input-field4 content-check my-3 d-flex">
           <input type="checkbox" name="terms" id="terms" class="terms">
           <label>Check this box to get first access to amazing offers & awesome new content.</label>
            </div> 

        <div class="input-field">
            <input type="submit" name="signupBtn" id="signup" class="submit" value="Create an Account">
        </div> 

        <div class="terms">
            <span>By continuing, you agree to Revive's <a href="#">Terms of Service</a>.</span>           
         </div>
    </div> 
        </form>
    </div>
        <div class="input-field login-register">
           <p>Already have an account?<a href="login.php" class="login-link">Log In</a>.</p>
         </div>
</div>
        </div>
    </div>
</div>
</div>



    <script src="../assets/js/jquery.min.js"></script>
<script>
     
        $(document).ready(function(){
    //email validation
        $('#email').blur(function() {
        var email = $(this).val();
        if (!email.includes('.com')) {
            $('#emailError').show();
        } else {
            $('#emailError').hide();
        }
    });
        });
</script>
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>