<?php
session_start();
//echo $_SESSION['useronline'];
require_once "user_guard.php";
require_once '../classes/config.php'; 
require_once "../partials/dashboard_header.php";
require_once "../classes/User.php";
require_once "../classes/Music.php";

$music = new Music();
$randomTracks=$music->fetch_random_tracks();

#to dsiplay the quotes based on time of day
$currentHour = date('H');
if($currentHour >= 1 && $currentHour < 17){
   $quote_category = 'Morning';
}
else{
   $quote_category = 'Night';
}


#instantiate the class
$user1= new User();
$quotes=$user1->fetch_random_quotes_byCategory($quote_category);

$userData = $user1->get_user_by_id($_SESSION["useronline"]);

if (!empty($userData)) {

    if (isset($userData[0]["user_fname"])) {
        $firstname = ucfirst($userData[0]["user_fname"]);
    } else {
        $firstname = "Unknown";
    }
} else {
    $firstname = "Unknown";
}
?>


<style>
   button{
      background:transparent;
   }
   .outline-heart{
      color:#fff;
   }
   .fill-heart{
      color:#e02323;
   }
   .card__img {
   border-radius: 1rem;
   width:170px!important;
   height: 240px!important;
   }
   .card__link {
   position: relative;
   display: grid;
   place-items: center;
   color: var(--white-color);
   height:240px;
   }
   .card__like {
  position: absolute;
  top: .75rem;
  right: 0.85rem;
  font-size: 1.25rem;
  cursor: pointer;
    }
  
   .music__data {
   position: absolute;
   bottom:0.9rem;
   text-align: center;
   padding-inline: .20rem;
   background:rgba(255, 255, 255, 0.858);
   border-radius: 0.25rem;
   }

   .music__name {
   font-size: 14px;
   color:rgb(86, 74, 62);
   }

   .music__category {
   font-size: 11px;
   color:black;
   font-style: italic;
   }

   @media (max-width:580px){
   .card__img {
   border-radius: 1rem;
   width:180px;
   height: 230px;
   }
   .card__article {
    width: 150.5px!important;
    margin-right: 18px;
   }
   }
   @media (min-width: 968px) {
  .card__img {
    border-radius: 1rem;
    width:215px;
    }
    .card__article {
    width: 160.5px!important;
    margin-right: 18px;
   }
   }
</style>
<!--BACKGROUND MUSIC--->
<head>
<audio id="backgroundMusic" loop volume="0.5">
  <source src="../assets/dashboard/assets/audio/symbios(ambient_sleep).mp3" type="audio/mp3">
</audio>
</head>

<div class="header__actions">
</div>

      <!--DASHBOARD SECTION -->
      <main class="main">

         <!--BANNER SECTION-->
         <div class="tab__content tab__content--active" data-tab="1">
         <section class="banner">
            <article class="banner__card">
               <a href="#" class="banner__link">
                  <img src="../assets/dashboard/assets/img/bb2.jpg" alt="image" class="banner__img">
                  <div class="banner__shadow"></div>
   
                  <div class="banner__data">
                  <h2 id="greeting" class="animate__animated animate__fadeInUp banner__title">Welcome, <?php echo $firstname?>!</h2>
                     <span class="banner__category"></span>
                  </div>
               </a>
            </article>
         </section>


      <div id="tab-content-container">
             <!----- HOME TAB STARTS HERE ----->
             <section class="music">
            <div class="tab__content tab__content--active" data-tab="1">
            <h3 class="card__title2">Today's Features</h3>

            <div class="movie__swiper swiper">
                     <div class="swiper-wrapper">

                                  <?php
                                    foreach ($randomTracks as $track){ 
                                       $imageFile = "../admin/uploads/imageupload/{$track['track_image']}";
                                       $audioFile = "../admin/uploads/audioupload/{$track['track_audio']}";
                                    ?>   

                           <article class="card__article swiper-slide" data-img-src="<?php echo $imageFile; ?>" data-title="<?php echo $track['track_name']; ?>" data-artist="<?php echo $track['track_artist']; ?>" data-audio-src="<?php echo $audioFile; ?>">

                              <a href="musictab.php?id=<?php echo $track['track_id']; ?>" class="card__link">

                              <img src="<?php echo $imageFile; ?>" alt="image" class="card__img img2">
                              <audio src="<?php echo $audioFile; ?>" type="audio/mp3" controls id="audioPlayer" hidden></audio>

                              <div class="card__shadow"></div>
                              
                                 <button class="mplay playButton" data-track-id="<?php echo $track['track_id']; ?>">
                                 <i class="ri-play-circle-line play-btn"></i></button>
                                 <button class="mplay pauseButton" data-track-id="<?php echo $track['track_id']; ?>">
                                 <i class="ri-pause-circle-line pause-btn" style="display:none;"></i>
                              </button>

                                 <div class="music__data">
                                    <h3 class="music__name"><?php echo $track['track_name'];?></h3>
                                    <span class="music__category"><?php echo $track['track_artist'];?></span>
                                 </div> 
                              </a>
                           </article>
                            <?php
                             } ?>
                        </div></div>
            </div>
         </section>

         <!-------- NEW -------->
         <section class="music new">
            <div class="tab__content tab__content--active" data-tab="1">
            <h3 class="card__title2">Quote of The Day</h3>

            <section class="banner">
                                    <?php
                                    foreach($quotes as $q){
                                    ?>   
            <article class="banner__card" style="width:300px;">
               <a href="#" class="banner__link">
                  <img src="../admin/uploads/imageupload/<?php echo $q['quote_image'];?>" alt="image" class="banner__img" width="300">
                  <div class="banner__shadow"></div>
   
                  <div class="banner__data">
                  <h4 banner__title"><?php echo $q['quote_message']?></h4>
                     <span class="banner__category" style="font-size:15px;">-<i><?php echo $q['quote_author']?></i></span>
                     
                  </div>
                 <img src="../admin/uploads/imageupload/revivelogo.PNG" width="35" style="border-radius:50%;" class="card__like"/>
               </a>
            </article>
                <?php
               }?>
         </section>
            

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
         </div>
      </section>
         <!----- HOME TAB ENDS HERE ----->

         </div>
      </main>




<script src="../assets/dashboard/assets/js/swiper-bundle.min.js"></script>
<script src="../assets/dashboard/assets/js/main.js"></script>
<script src="..assets/jquery.js"></script>
<script src="../assets/font-awesome/js/all.min.js"></script>
      
<script>
      /*---GREETING BASED ON TIME---*/
   function getGreeting() {
      const currentTime = new Date();
      const currentHour = currentTime.getHours();
   
      if (currentHour >= 1 && currentHour < 12) {
      return "Good morning";
      } else if (currentHour >= 12 && currentHour < 17) {
      return "Good afternoon";
      } else {
      return "Good evening";
      }
   }
   
   // Get the greeting message
   const greeting = getGreeting();
   
   // Updating the banner to include the greeting
   document.getElementById('greeting').innerText = `${greeting}, <?php echo $firstname?>!`;

</script>

<script>
      // Get a reference to the audio element
   var backgroundMusic = document.getElementById("backgroundMusic");

   // Function to stop the audio after 30 seconds
   function stopAudioAfterDelay() {
   setTimeout(function() {
      backgroundMusic.pause();
   }, 30000); // Milliseconds (1000 milliseconds = 1 second)
   }

   // Start playing the music
   backgroundMusic.play();

   // Call the stopAudioAfterDelay function after the music starts
   stopAudioAfterDelay();

</script>


   </body>
</html>