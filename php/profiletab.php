<?php
session_start();
require_once "../partials/dashboard_header.php";
require_once '../classes/config.php'; // Include database configuration
require_once "../classes/User.php";

// Instantiate the User class
$user = new User();

$user_id = $_SESSION['useronline']; 
$userEmail = $user->fetch_user_email($user_id);

?>

<style>
   a{
      text-decoration: none;
      color: #fff;
   }
</style>




<main class="main">

<!----- PROFILE TAB STARTS HERE ----->
  <section class="music" id="main2" style="margin-top:-1rem;">
            <div class="tab__content tab__content--active" data-tab="6">
            <h3 class="card__title">Profile</h3>
            <div class="container">
               <div class="accordion">
                  <div class="prof-btn"><i class="ri-bar-chart-fill"></i></div>
                <h5><a href="statsprofile.php">My Stats</h5>
                <div><a href="statsprofile.php?id=<?php echo $_SESSION['useronline'] ?>"><i class="ri-arrow-right-s-line"></i></a></div>
            </div>
            
            <div class="accordion">
                  <div class="prof-btn"><i class="ri-bar-chart-fill"></i></div>
                <h5><a href="diarylists.php">My Diary</h5>
                <div><a href="diarylists.php?id=<?php echo $_SESSION['useronline'] ?>"><i class="ri-arrow-right-s-line"></i></a></div>
            </div>
            
               <div class="accordion"> 
                  <div class="prof-btn"><i class="ri-account-circle-line"></i></div>
                  <h5><a href="updateuser.php">Account Details</h5>
                  <div><a href="updateuser.php?id=<?php echo $_SESSION['useronline'] ?>"><i class="ri-arrow-right-s-line"></i></a></div>
            </div>
            

               <div class="accordion">
                  <div class="prof-btn"><i class="ri-lock-2-line"></i></div>
                  <h5><a href="updatepassword.php">Change Password</h5>
                  <div><a href="updatepassword.php?id=<?php echo $_SESSION['useronline'] ?>"><i class="ri-arrow-right-s-line"></i></a></div>
            </div>
            

               <div class="accordion">
                  <div class="prof-btn"><i class="ri-logout-circle-line"></i></div>
                  <h5><a href="logout.php">Log Out</h5>
                <div><a href="logout.php"><i class="ri-arrow-right-s-line"></i></a></div>
                
            </div>
                  <p style="font-size:13px; text-align: center;">Logged in as: <?php echo $userEmail ?></p><br>

            </div>
            </div>
         </section>
         <!----- PROFILE TAB ENDS HERE ----->

         </div>
</main>




         <script src="../assets/dashboard/assets/js/swiper-bundle.min.js"></script>
         <script src="../assets/dashboard/assets/js/main.js"></script>

   </body>
</html>