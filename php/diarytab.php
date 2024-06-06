<?php
session_start();
require_once "../partials/dashboard_header.php";
require_once "../classes/User.php";

$user_id=$_SESSION['useronline'];
if (isset($_GET['id'])) {
  $no = $_GET['id'] ;
  $edit = new User();
  $userStats = $edit->get_user_by_id($no);

} else {
 //header("location:profiletab.php");
 exit();
}
?>




<style>
        body{
            font-family:poppins, sans-serif;
        }
        #main2 {
      row-gap: 1.5rem;
      margin-inline: 1.5rem;
      margin-top: -1rem;
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

        /* .main{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            transition:height .2s ease;
        } */
      
        .row{
          width:  400px;
          height:485px;
          border-radius: 10px;
        border: 2px solid rgba(141, 127, 117,0.2);
      background:rgba(145, 125, 112, 0.381); 
      backdrop-filter: blur(9px);
          padding-top: 0px;
          box-shadow: 5px 5px 10px 1px rgba(0,0,0,0.2);
          z-index:10;
        }
      
        textarea{
            background: rgb(200,200,200,0.4);
            border:1px solid white;
            border-radius: 0.4rem;
            color:white;
        }
        textarea::placeholder{
            font-size:16px;
            font-style:italic;
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

        .input-box header{
            font-weight: 600;
            color:#fff;
            font-size:24px;
            text-align: center;
            margin-top: 7px;
            margin-bottom: 24px;
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
            color:#fff;
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
            height:530px;
            }
          .copyright{
            text-align: center;
          }
        }
</style>

<main class="main">

<!----- DIARY TAB STARTS HERE ----->
  <section class="music" id="main2">
            <div class="tab__content tab__content--active" data-tab="6">

            <a href="diarylists.php?id=<?php echo $_SESSION['useronline'] ?>"><i class="ri-arrow-left-s-line nav__link" style="border:2px solid white; border-radius:50%; padding:3px; font-weight:600;"></i></a>
            <h3 class="card__title">Diary Form</h3>

            <!--diary input starts here-->
            <div class="container">
            <div class="input-box">
                            <?php
                              if(isset($_SESSION['user_errormessage'])&& is_array($_SESSION['user_errormessage'])){
                                $err = $_SESSION['user_errormessage'];
                                foreach($err as $er){
                                  echo "<div class ='alert alert-danger-var'>".$er."</div>";
                                }
                                unset($_SESSION['user_errormessage']);
                              }
                              ?>
                    
            <form method="post" class="row form-container" id="diaryForm" action="../process/process_diary.php">
    <header>How are you feeling today?</header>
    <p id="resp"></p>
    <div class="input-field">
      <?php date_default_timezone_set('Africa/Lagos'); ?>
    <input type="text" class="input" id="date" name="date" value="<?php echo date ('Y-m-d H:i:s'); ?>" disabled>
        <label for="diary date"></label>
    </div> 
    <div class="input-field">
        <input type="time" class="input" id="sleepstart" name="sleepstart">
        <label for="sleep start">Sleep Start:</label>
    </div>
    <div class="input-field">
        <input type="time" class="input" id="sleepend" name="sleepend">
        <label for="sleep end">Sleep End:</label>
    </div>
    <div class="input-field" style="margin-bottom:1rem;">
        <label for="message"></label>
        <textarea name="message" id="message" class="form-control" rows="9" placeholder="Talk to me..."></textarea>
    </div>
    <div class="input-field">
        <input type="hidden" name="id" id="id" class="submit" value="<?php echo $user_id;?>">
    </div> 
    <div class="input-field">
        <input type="submit" name="diaryBtn" id="diaryBtn" class="submit" value="Submit">
    </div> 
</form>

            </div>
         </section>
         <!----- DIARY TAB ENDS HERE ----->


         </div>
</main>







<?php
//showing exact time
  function getCurrentDateTime() {
    date_default_timezone_set('Africa/Lagos');
    $currentDateTime = date('Y-m-d H:i:s');
    return $currentDateTime;
}
// echo getCurrentDateTime();
 ?>

         <script src="../assets/dashboard/assets/js/swiper-bundle.min.js"></script>
      <script src="../assets/dashboard/assets/js/main.js"></script>

   </body>
</html>