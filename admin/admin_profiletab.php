<?php
session_start(); 
require_once "partials/admin_header.php";
require_once "classes/Admin.php";



// Instantiate the Admin class
$admin = new Admin();

$adminId = $_SESSION['adminonline']; 
$adminEmail = $admin->get_admin_email($adminId);

?>
<style>
   a{
      text-decoration: none;
      color: #fff;
   }
</style>



<main class="main">

<!----- PROFILE TAB STARTS HERE ----->
  <section class="music" id="main" style="margin-top:-2rem;">
            <div class="tab__content tab__content--active" data-tab="6">
            <h3 class="card__title">Profile</h3>
            <div class="container">

               <div class="accordion"> 
               <div class="prof-btn"><i class="ri-account-circle-line"></i></div>
                  <h5><a href="updateadmin.php">Account Details</h5>
                  <div><a href="updateadmin.php?id=<?php echo $_SESSION['adminonline'] ?>"><i class="ri-arrow-right-s-line"></i></a></div>
            </div>

               <div class="accordion">
               <div class="prof-btn"><i class="ri-logout-circle-line"></i></div>
                  <h5><a href="admin_logout.php">Log Out</h5>
                <div><a href="admin_logout.php"><i class="ri-arrow-right-s-line"></i></a></div>
                </div>
            </div>
                  <p style="font-size:13px; text-align: center;">Logged in as: <?php echo $adminEmail?></p><br>

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