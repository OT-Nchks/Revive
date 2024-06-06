<?php
session_start();
require_once "../partials/dashboard_header.php";
require_once "../classes/Stats.php";

?>

<style>
      body{
          font-family:poppins, sans-serif;
      }
      fieldset{
        margin-top:2rem;
        font-size:14px;
        padding:1rem;
        margin:1rem;
      }
      a{
        color:#fff;
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

      .row{
        width:  550px;
        height:auto;
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

      .form-container header{
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
          .form-container header{
          font-size:24px;
          }
          .row{
          max-width:500px;
          width: 100%;
          height:auto;
          }
          fieldset{
            font-size:12px;
          }
        .copyright{
          text-align: center;
        }
        .flex{
          font-size:14px;
        }
      }
</style>


<main class="main">

        <!----- ASSESSMENT FORM STARTS HERE ----->
          <section class="music" id="main2" style="margin-top:0.8rem;">
            <div class="tab__content tab__content--active" data-tab="6">

            <div class="flex">
            <a href="profiletab.php"><i class="ri-arrow-left-s-line nav__link" style="border:2px solid white; border-radius:50%; padding:3px; font-weight:600; font-size:0.85rem;"></i></a>
            <h4 class="card__title">Stats Profile</h4>
            </div>
            <div class="flex">
            <a href="editstatsprofile.php?id=<?php echo $_SESSION['useronline'] ?>">
  	        <i class="ri-arrow-right-s-line" style="border:2px solid white; border-radius:50%; padding:3px; font-weight:600;"></i></a>
            <h4 class="card__title">Update Stats Form</h4>
            </div>

            <div class="container">
            <form method="post" class="row form-container" id="statsForm" action="../process/process_stats.php">
             <header>Let Us Understand You Better</header>


<!--question1-->
         <fieldset class="mb-3">
            <legend>How have you been feeling lately?:</legend>
            <div class="form-check">
              <input type="radio" name="quest1" value="1" class="form-check-input" id="radio1">
              <label class="form-check-label" for="quest1">Good</label>
            </div>
            
            <div class="mb-3 form-check">
              <input type="radio" name="quest1" value="2" class="form-check-input" id="radio2">
              <label class="form-check-label" for="quest1">Stressed/Tired</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest1" value="3" class="form-check-input" id="radio3">
              <label class="form-check-label" for="quest1">Sad</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest1" value="4" class="form-check-input" id="radio4">
              <label class="form-check-label" for="quest1">Indifferent</label>
            </div>
          </fieldset>


<!--question2-->
          <fieldset class="mb-3">
            <legend>Sleep Habits-How many hours of sleep do you typically get per night?:</legend>
            <div class="form-check">
              <input type="radio" name="quest2" value="1" class="form-check-input" id="radio1">
              <label class="form-check-label" for="quest2">Less than 5hours</label>
            </div>
            
            <div class="mb-3 form-check">
              <input type="radio" name="quest2" value="2" class="form-check-input" id="radio2">
              <label class="form-check-label" for="quest2">5 hours</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest2" value="3" class="form-check-input" id="radio3">
              <label class="form-check-label" for="quest2">6-7 hours</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest2" value="4" class="form-check-input" id="radio4">
              <label class="form-check-label" for="quest2">More than 7 hours</label>
            </div>
          </fieldset>


<!--question3-->
          <fieldset class="mb-3">
            <legend>Sleep Habits-How often do you wake up during the night?:</legend>
            <div class="form-check">
              <input type="radio" name="quest3" value="1" class="form-check-input" id="radio1">
              <label class="form-check-label" for="quest3">Every hour or more</label>
            </div>
            
            <div class="mb-3 form-check">
              <input type="radio" name="quest3" value="2" class="form-check-input" id="radio2">
              <label class="form-check-label" for="quest3">Frequently</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest3" value="3" class="form-check-input" id="radio3">
              <label class="form-check-label" for="quest3">Occassionally</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest3" value="4" class="form-check-input" id="radio4">
              <label class="form-check-label" for="quest3">Rarely</label>
            </div>
          </fieldset>


<!--question4-->
          <fieldset class="mb-3">
            <legend>Stress Level-What's typically the biggest source of stress for you?:</legend>
            <div class="form-check">
              <input type="radio" name="quest4" value="1" class="form-check-input" id="radio1">
              <label class="form-check-label" for="quest4">Work or School</label>
            </div>
            
            <div class="mb-3 form-check">
              <input type="radio" name="quest4" value="2" class="form-check-input" id="radio2">
              <label class="form-check-label" for="quest4">Health</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest4" value="3" class="form-check-input" id="radio3">
              <label class="form-check-label" for="quest4">Money</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest4" value="4" class="form-check-input" id="radio4">
              <label class="form-check-label" for="quest4">Family Responsibilities</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest4" value="5" class="form-check-input" id="radio4">
              <label class="form-check-label" for="quest4">Relationships</label>
            </div>
          </fieldset>
   

<!--question5-->
        <fieldset class="mb-3">
            <legend>Do you have any medical conditions that may disrupt your sleep?:</legend>
            <div class="form-check">
              <input type="radio" name="quest5" value="1" class="form-check-input" id="radio1">
              <label class="form-check-label" for="quest5">Yes</label>
            </div>

            <div class="mb-3 form-check">
              <input type="radio" name="quest5" value="2" class="form-check-input" id="radio2">
              <label class="form-check-label" for="quest5">No</label>
            </div>
          </fieldset>


          <!--question6-->
        <fieldset class="mb-3">
            <legend>If Yes, Please let us know:</legend>
            <div class="form-check">
              <textarea name="quest5b" value="1" class="input" id="quest5b"></textarea>
            </div>
          </fieldset>
    
    <div class="input-field" style="margin-top:0.8rem; margin-bottom:0.8rem;">
        <input type="submit" name="statBtn" id="statBtn" class="submit" value="Submit">
    </div> 
</form>
</div>
         </section>
         <!-----ASSESSMENT FORM ENDS HERE ----->


         </div>
</main>