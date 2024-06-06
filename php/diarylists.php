<?php
session_start();
require_once "../partials/dashboard_header.php";
require_once "../classes/Diary.php";
require_once "../classes/User.php";

// Instantiate the Diary class
$diary = new Diary();
$user_id = $_SESSION['useronline'];
$userdiary= $diary->display_diarylists($user_id);
// print_r($user_id);
// die();
?>



<style>
  body{
      font-family:poppins, sans-serif;
  }
  a{
    color:#fff;
  }
  #main2 {
    row-gap: 1.5rem;
    margin-inline: 1.5rem;
    margin-top: -1rem;
  }
  .container{
    max-width:65rem;
    padding: 0 2rem;
    margin: 0 auto;
  }
  .diary-lists {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px; 
  }

  .card{
      border-radius: 10px;
      border: 2px solid rgba(141, 127, 117,0.2);
    background:rgba(145, 125, 112, 0.4); 
    backdrop-filter: blur(9px);
    margin-bottom: 20px;
    margin-right:10px;
    width:200px;
    height:150px;
  }
  .card-header{
    background-color: #93b2d7d7;
    border-radius:1rem; 
    padding: 10px;
  }
  .card-body{
    padding: 10px;
  }

</style>

<main class="main">

<!----- ASSESSMENT FORM STARTS HERE ----->
  <section class="music" id="main2" style="margin-top:1rem;">
            <div class="tab__content tab__content--active" data-tab="6">

            <a href="profiletab.php?id=<?php echo $_SESSION['useronline'] ?>"><i class="ri-arrow-left-s-line nav__link" style="border:2px solid white; border-radius:50%; padding:3px; font-weight:600;"></i></a>
            <h5 style="font-size:20px;" class="card__title">Diary Logs</h5>

            
            <a href="diarytab.php?id=<?php echo $_SESSION['useronline'] ?>"><i class="ri-arrow-right-s-line" style="border:2px solid white; border-radius:50%; padding:3px; font-weight:600;"></i></a>
            <h5 style="font-size:20px;" class="card__title">Write Diary</h5>
            


            <div class="container">
    <div class="diary-logs">
        <div class="diary-lists">
            <?php
            foreach ($userdiary as $diary) {
            ?>
            <div class="card">
                <div class="card-header">
                    <?php echo $diary['diary_date']; ?>
                </div>
                <div class="card-body">
                    <p class="card-text" style="font-style: italic; font-size: 0.8rem;"><?php echo $diary['diary_notes']; ?></p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</main>





         <script src="../assets/dashboard/assets/js/swiper-bundle.min.js"></script>
      <script src="../assets/dashboard/assets/js/main.js"></script>

   </body>
</html>