<?php
session_start();
require_once "user_guard.php";
require_once "../classes/Paystack.php";
require_once "../classes/Transaction.php";
require_once "../classes/User.php";
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
        background-image: url("../assets/images/pic1bii.PNG");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 10px 0 0 10px;
        position: relative;
        height:100%;
    }
    .row{
      width:  950px;
      height:585px;
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
        font-size:14px;
        font-style: italic;
        color:#d7cdbb;
        position: relative;
        padding: 24px 0 0 20px;
        border-bottom: 1px solid #e0dacf;
     }
     
     .cards{
    width:50%;
    }
    .cardspan{
        display: flex;
    }

     .card-m, .card-v, .card-a{
    position:absolute;
    right:15px;
    bottom:20px;
    width:3rem;
    color:#d7cdbb;
    line-height: 57px;
    display:none;
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
   .skip{
     font-size:0.8em;
    color:#d7cdbb;
    text-align: center;
     font-weight:500;
    margin:25px 0 10px;
    }
     .skip p a{
     color:#93b2d7;
    text-decoration: none;
    font-weight:600;  
    }
    .skip p a:hover{
     text-decoration: underline;
    }
  
    @media only screen and (max-width: 768px){
        .side-image{
        border-radius: 10px 10px 0 0;
        background-image: url("../assets/images/pic1ci.jpg");
        background-position: center;
        background-size: cover;
        height:60px;
        }
        .cards{
        width:45%;
        }
         .card-m, .card-v, .card-a{
         width:2rem;
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
        }
        .row{
        max-width:600px;
        width: 100%;
        height:575px;
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
            <a href="index.php"><img src='../assets/images/logo.PNG' class="logo2"/></a>
            
            <div class="row animate__animated animate__fadeInUp animate__delay-0.9s">

                <div class="col-md-6 side-image">
                    <img src="../assets/images/logo.PNG" class="logo" id="logo">
                </div>
                <div class="col-md-6 right">
                    
                
                <form method="post"  id="subscription-form" action="../process/process_payment.php">
    <div class="input-box">
        <header>Subscription Form
            <h6><i>No commitment. Cancel anytime.</i></h6>
        </header>

        <div class="input-field ">
            <span class="cardspan mb-2"><i>cards accepted :</i>
            <img src="../assets/images/cards.PNG" alt="" class="cards"></span>
        </div>
        <p id="displayError" style="color: rgb(248, 69, 69); display: none;" class="error">Please fill in all fields</p>
        <div class="input-field mt-2">
            <input type="text" class="input" id="cardname" name="cardname" required autocomplete="off">
            <label for="cardname">Name on Card</label> 
        </div>

        <div class="input-field">
            <input type="email" class="input" id="email-address" name="email" required autocomplete="off">
            <label for="email">Email</label> 
            <p id="emailError" style="color: rgb(248, 69, 69); display: none;" class="error">Please enter a valid email address</p>
        </div>

        <div class="d-flex">
        <div class="input-field">
        <select id="plan" name="plan" class="input" required>
        <option value="0">Select plan:</option>
            <option value="1">Monthly - $3.33</option>
            <option value="2">Annually - $39.99</option>
        </select><br> 
        </div>

        <div class="input-field">
            <input type="text" class="input" id="amount" name="amount" required>
            <label for="amount">Amount</label>
        </div></div>

       <div class="input-field">
            <input type="text" class="input" id="crednum" name="crednum" required/>
            <img src="../assets/images/amex.PNG" class="card-a" name="AmEx">
            <img src="../assets/images/visa.PNG" class="card-v" name="Visa">
            <img src="../assets/images/master.PNG" class="card-m" name="MasterCard">
            <label for="crednum">Card Number</label>
        </div> 

         <div class="d-flex">
            <div class="input-field">
                <input type="text" class="input" id="expdate" name="expdate" placeholder="MM/YYYY" required autocomplete="off">
                <label for="expirydate"></label>
                <p id="expdateError" style="color: rgb(248, 69, 69); display: none;" class="error">Invalid</p> 
            </div>

            <div class="input-field">
                <input type="text" class="input" id="cvv" name="cvv" placeholder="CVV" required autocomplete="off">
                <label for="cvv"></label> 
            </div>
        </div>

        <div class="input-field">
            <button type="submit" name="subBtn" class="submit">Make Payment</button>
        </div> 
    </div> 
</form></div> 
<div class="input-field skip">
         <p>Not ready to make Payment?<a href="dashboard.php" class="skip-link"> Skip</a>.</p>
    </div></div>
    
        </div>
    </div>
</div>
</div>



<script src="../assets/js/jquery.min.js"></script>
<script>
     
        $(document).ready(function(){

         //cred card number validation    
        $('#crednum').on('input', function(){
        var cardNumber = $(this).val();
        var firstTwoDigits = cardNumber.substring(0, 2);
        if (firstTwoDigits === "51" || firstTwoDigits === "52" || firstTwoDigits === "53" || firstTwoDigits === "54" || firstTwoDigits === "55") {
        $('.card-m').show();
        } else {
        $('.card-m').hide();
        }

        if (firstTwoDigits === "41") {
        $('.card-v').show();
        } else {
        $('.card-v').hide();
        }

        if (firstTwoDigits === "34" || firstTwoDigits === "37") {
        $('.card-a').show();
        } else {
        $('.card-a').hide();
        }
        });

        $('#crednum').on('input', function() {
            let inputValue = $(this).val().replace(/-/g, ''); 
            inputValue = inputValue.replace(/\D/g, ''); 
            let formattedValue = '';
            for (let i = 0; i < inputValue.length; i++) {
                if (i > 0 && i % 4 === 0 && i < 16) {
                    formattedValue += '-';
                }
                formattedValue += inputValue[i];
            }
            $(this).val(formattedValue.slice(0, 19)); 
        });
  

    //email validation
        $('#email').blur(function() {
        var email = $(this).val();
        if (!email.includes('.com')) {
            $('#emailError').show();
        } else {
            $('#emailError').hide();
        }
    });


    //cardname validation
    $('#cardname').blur(function() {
        var cardname = $(this).val();
        if (cardname == "") {
            $('#displayError').show();
        } else {
            $('#displayError').hide();
        }
    });

    $('#submitBtn').click(function(event) {
        var cardname = $('#cardname').val();
        if (cardname == "") {
            $('#displayError').show();
            $('#logo').hide();
            event.preventDefault(); // Prevent form submission
        }
    });


    //card expdate validation
    $('#expdate').on('input', function() {
    var input = $(this);
    var inputValue = input.val().replace(/\s/g, ''); // Remove spaces
    var formattedValue = inputValue.replace(/\D/g, '').replace(/^(\d{2})(\d{0,4})/, '$1/$2'); // Format as MM/YYYY

    // Limit input to 7 characters
    if (formattedValue.length > 7) {
        formattedValue = formattedValue.slice(0, 7);
    }

    input.val(formattedValue);

    var enteredYear = formattedValue.split('/')[1];
    var currentYear = new Date().getFullYear();

    if (enteredYear && parseInt(enteredYear) < currentYear) {
        $('#expdateError').text('Invalid').show();
    } else {
        $('#expdateError').hide();
    }
    });

    //ccv validation
    $('#cvv').on('input', function() {
        var input = $(this);
        var inputValue = input.val().replace(/\D/g, ''); // Remove non-digit characters

        // Limit input to 3 characters
        if (inputValue.length > 3) {
            inputValue = inputValue.slice(0, 3);
        }

        input.val(inputValue);
    });

        });
</script>


     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>