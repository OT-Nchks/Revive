<?php
session_start();
//echo password_hash('12345', PASSWORD_DEFAULT);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="keywords" content="Sleep, Insomnia, Sleep App, Sleep Tracking, Meditation, Mental health, Mindfulness, Stress and Anxiety"/>
	<meta name="description" content="Revive is designed to provide comprehensive support and guidance for individuals struggling with insomnia. Leveraging cutting-edge technology and evidence-based techniques, Revive aims to empower users to understand, manage, and improve their sleep patterns effectively."/>
	<meta name="author" content="Revive"/>

    <title>Revive | Admin </title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" href="assets/images/favicon-revive.png" type="image/png">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link href="assets/bootstrap/bootstrap.css" rel="stylesheet">

    		<!--google fonts link-->
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<style>
    body{
        background-image: url("assets/images/bg3.PNG");
        font-family:poppins, sans-serif;
    }
  .alert-danger-var{
    color:#FF5B61;
    font-size:13.5px;
    border:1px solid #FF5B61;
    background: #FFD7DD;
    border-radius:10px;
   padding:10px 10px 10px 10px;
    justify-content: center;
    margin-bottom: 14px;
    font-style:italic;
  } 

    .wrapper{
        background-image: url("assets/images/bg3.PNG");
        background-repeat: no-repeat;
        background-position: center;
    }
    .main{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        transition:height .2s ease;
    }
   
    .row{
      width:  380px;
      height:350px;
      border-radius: 10px;
      border: 2px solid rgba(141, 127, 117,0.2);
    background:rgba(167, 191, 217,0.1); 
    backdrop-filter: blur(3.5px);
      padding-top: 0px;
      box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.2);
      z-index:10;
    }
   
    p{
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
        top: 70px;
        left: 20px;
    }
    .input-box header{
        font-weight: 600;
        color:#d7cdbb;
        font-size:30px;
        text-align: center;
        margin-top: 7px;
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
  
     .submit{
        width:100%;
        border: none;
        outline: none;
        height: 45px;
        color:white;
        background: #93b2d7d7;
        border-radius: 10px;
        transition: .4s;
        font-size:16px;
     }
     .submit:hover{
        opacity: 0.8;
        font-weight: 600;
        color: #fff;
     }
     .copyright{
        text-align: center;
      }
     
  
  
    @media only screen and (max-width: 768px){
   
        .logo2{
        width:120px;
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
        font-size:28px;
        }
        .row{
        max-width:380px;
        width: 100%;
        height:340px;
        }
      .copyright{
        text-align: center;
      }
    }
  
</style>
</head>
<body>

    <div class="wrapper">
        <div class="container main">
            <a href="index.php"><img src='assets/images/logo2.PNG' class="logo2"/></a>
            
            <div class="row animate__animated animate__fadeInUp animate__delay-0.4s">
                
                <div class="col-md-6 right">
                    
                    <div class="input-box">
                       
                       <header>Admin Log In
                        <p><i>Fill in details to access your profile.</i></p>
                    </header>
                    
                                        <?php
                                        if(isset($_SESSION["admin_errormessage"])){
                                                echo "<div class='alert alert-danger-var'> ".$_SESSION['admin_errormessage']."</div>";
                                            }
                                        ?>
                    <form action="process/process_adminlogin.php" method="post">

                       <div class="input-field mt-3">
                            <input type="text" class="input" id="email" name="email">
                            <label for="email">Email Address</label> 
                        </div> 

                        <div class="input-field">
                        <input type="password" class="input" name="password" id="password">
                        <label for="password">Password</label> 
                    </div>

                       <div class="input-field">
                            <input type="submit" name="adminloginBtn" id="adminBtn" class="submit" value="Log In">
                       </div> 
                     
                      </form>
                    </div>  
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="copyright">
                    <p id="showyear" style="bottom:-20rem;"></p>
                </div>
            </div>
        </footer>
    </div>





   
     <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
     <script>
     function updateYear() {
    var currentYear = new Date().getFullYear();
    var yearSpan = document.getElementById("showyear");
    yearSpan.textContent = "© " + "Revive, "+ currentYear;
    };
    updateYear();
    </script>
</body>
</html>