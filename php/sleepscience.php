<?php
session_start();
/*require_once "../php/user_guard.php";*/
require_once "../classes/User.php";

if (isset($_SESSION['useronline'])) {
    require_once "../partials/header_loggedin.php";
} else {
    require_once "../partials/header.php";
}

$user=new User();
  $reviews=$user->get_reviews_by_IdRange(13, 18);
?>


<style>
    body { 
    background: rgb(117, 110, 100);
    font-family: 'Poppins', sans-serif;
  }
</style>



  <main>
    <article>
      <!--HERO BANNER-->
      
      <section class="hero2" id="home">
        <div class="container">
              <video autoplay loop muted plays-inline class="back-video">
                <source src="../assets/images/video/sleep-hero.mp4" type="video/mp4">
              </video>
          <h2 class="h1 hero-title2">Sleep Science</h2>

          <p class="hero-text2">
            Unlocking the Science of Sleep: A Guide to Achieving Quality Rest.
          </p>

        </div>
      </section>

  


<!-- #ARTICLE WRITEUP STARTS HERE -->
     
      <section class="article" id="destination"> 
        
        <div class="container2">  
          <p class="article-text">In a world pulsating with activity, the significance of sleep often gets sidelined. Yet, sleep is not merely a state of inactivity but a vital process that rejuvenates both body and mind. Understanding the science behind sleep can illuminate the path to achieving quality rest. Let's delve into the intricacies of sleep science and unveil strategies to optimize your sleep experience.</p>
        </div>
            
<br>
         
            <div class="container2">
              <h3 class="article-title">The Importance of Quality Sleep:</h3>
              <p class="article-text">Quality sleep is not just about the duration but also about its depth and restorative effects. Adequate sleep is crucial for physical health, cognitive function, emotional well-being, and overall productivity. Conversely, chronic sleep deprivation can lead to a myriad of health issues, including obesity, diabetes, cardiovascular diseases, and impaired cognitive function.</p>
        </div>
        <br>

        
          <div class="section-video container2">
            <h3 style="text-align: center; font-size:25px; font-weight:600; color:#60a1ca;margin-bottom:15px;">Meet Smt. Hansa Ji Yogendra</h3>
            <video controls class="watch-video">
              <source src="../assets/images/video/howtosleep.mp4#t=1" type="video/mp4">
            </video>
          </div>
       
            <br>
        <div class="container2">
          <h3 class="article-title">Tips for Achieving Good Sleep:</h3>
       
          <ol class="article-text">
            <li><b>Maintain a Consistent Sleep Schedule:</b><br> Set a regular sleep-wake cycle by going to bed and waking up at the same time every day, even on weekends. Consistency helps regulate your body's internal clock, promoting better sleep quality.</li>
            <br>
            <li><b>Create a Relaxing Sleep Environment: </b><br>Design your bedroom for optimal sleep: cool, dark, and quiet. Invest in a comfortable mattress and pillows to support your body and minimize disturbances.</li>
            <br> 
            <li><b>Limit Exposure to Screens Before Bed:</b><br> The blue light emitted by screens can disrupt your circadian rhythm and inhibit melatonin production. Aim to wind down at least an hour before bedtime by engaging in relaxing activities like reading or meditating.</li>
            <br>
            <li><b>Watch Your Diet and Hydration:</b><br> Avoid heavy meals, caffeine, and alcohol close to bedtime, as they can interfere with your sleep. Stay hydrated throughout the day but reduce fluid intake before bed to minimize nocturnal awakenings.</li>
            <br>
            <li><b>Establish a Pre-Sleep Routine:</b><br> Engage in calming activities to signal to your body that it's time to wind down, such as taking a warm bath or practicing gentle yoga. Develop a consistent pre-sleep ritual to cue your mind and body for sleep.</li>
            <br>
            <li><b>Manage Stress and Anxiety:</b><br> Practice stress-reduction techniques like deep breathing, progressive muscle relaxation, or mindfulness meditation to alleviate bedtime worries. Keep a worry journal to jot down concerns before bed, allowing your mind to release them before sleep.</li>
            <br>
            <li><b>Exercise Regularly:</b><br> Engage in moderate exercise during the day, but avoid vigorous workouts close to bedtime, as they can increase alertness and disrupt sleep. Regular physical activity promotes better sleep quality and helps regulate sleep patterns.</li>
          </ol>
          
    </div>
      </section>
<!-- #ARTICLE WRITEUP STARTS HERE -->


      
     
<!--- #SOUND GALLERY STARTS HERE --->

      <section class="gallery" id="gallery">
        <div class="container2">

          <p class="section-subtitle" style="text-align: center; font-weight:500;">WANNA SEE SOMETHING COOL?</p>

          <h2 class="h2 section-title" style="text-align: center;">Sleep Sounds</h2>

          <p class="section-text" style="font-weight:500;">
            Click on any image and have a listen to different calming, nature sounds.
          </p>

          <ul class="gallery-list">

            <li class="gallery-item">
              <figure class="gallery-image">
                <img id="play-song"src="../assets/images/gallery10.jpg" alt="Gallery image" style="cursor: pointer;">
                <audio id="song" src="../assets/images/audio/Le-Calme.mp3" type="audio/mp3"></audio>
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img  id="play-song1" src="../assets/images/gallery8.jpg" alt="Gallery image" style="cursor: pointer;">
                <audio id="song1" src="../assets/images/audio/Luminary_Creek.mp3" type="audio/mp3"></audio>
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img  id="play-song2" src="../assets/images/gallery1.jpg" alt="Gallery image" style="cursor: pointer;">
                <audio id="song2" src="../assets/images/audio/Peaceful_Rain_Ambience.mp3" type="audio/mp3"></audio>
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img  id="play-song3" src="../assets/images/gallery2.jpg" alt="Gallery image" style="cursor: pointer;">
                <audio id="song3" src="../assets/images/audio/417Hz_Calma.mp3" type="audio/mp3"></audio>
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img  id="play-song4" src="../assets/images/gallery11.jpg" alt="Gallery image" style="cursor: pointer;">
                <audio id="song4" src="../assets/images/audio/Serale.mp3" type="audio/mp3"></audio>
              </figure>
            </li>

          </ul>
          <button href="questionnaire.php" id="sound-list" class="btn btn-primary" style="justify-content: center; margin-top:20px;">Unlock more Free Content</button>
        </div>
      </section>
 <!-- - #SOUND GALLERY ENDS HERE-->




 <!--- #TESTIMONIALS SECTION STARTS HERE --->
     <section class="package" id="package">
      <h3 class="h2 section-title" style="text-align: center; font-size:30px;">Join  <i>Sound   Sleepers  </i>     nationwide!.</h3>
      <br>
          
              <div class="owl-carousel">
            <!--testimonial reviews starts here-->

            <?php 
            foreach ($reviews as $review){
              ?>
        <div class="item">
            <div class="clientname reviewtitle">
                <span><?php echo htmlspecialchars($review['client_name']); ?></span><br>
            </div>
            <div class="container2">
                <ul class="reviewstars">
                    <?php 
                    for ($i = 0; $i < 5; $i++){
                      ?>
                        <?php 
                        if ($i < $review['review_rating']){
                          ?>
                            <li><i class="ri-star-fill"></i></li>
                        <?php 
                        }else{
                          ?>
                          <li><i class="ri-star-line"></i></li>
                        <?php
                      }?>
                    <?php
                  }?>
                </ul>
            </div>
            <article style="padding:0.5rem;">
                <p class="review" style="font-size:13px; padding:0.5rem;">"<?php echo htmlspecialchars($review['review_message']); ?>"</p>
            </article>
        </div>
        <?php 
        }?>
        </div>
      </section>
<!--- #TESTIMONIALS SECTION ENDS HERE --->

  


  <!---#FAQ SECTION STARTS HERE-->
      <section>
      <div class="container2" id="faq">
          <h2 class="h2 section-title" style="text-align: center; font-size:27px;">Frequently Asked Questions</h2>
  
          <!--1-->
          <div class="accordion">
              <div class="faq-icon"></div>
              <h5 style="font-size:15px;">Why is sleep important?</h5>
              </div>
              <div class="panel">
              <p style="font-size:14px; text-align: justify; font-family: poppins;">
                Sleep is essential for physical and mental health. Explore the significance of sleep for physical health, cognitive function, emotional well-being, and overall quality of life, with <a href="index.php" style="color:#60a1ca;">Revive.</a>
              </p>
              </div>
  
          <!--2-->
              <div class="accordion">
                  <div class="faq-icon"></div>
                  <h5 style="font-size:15px; font-family: poppins;">How much sleep do I need?</h5>
                  </div>
                  <div class="panel">
                  <p style="font-size:14px;">
                    <ul>
                    <li><b>Adults:</b> 7-9 hours per night</li><br>
                    <li><b>Teenagers:</b> 8-10 hours per night</li><br>
                    <li><b>School-aged children:</b> 9-12 hours per night</li><br>
                    <li><b>Preschoolers:</b> 10-13 hours per night</li><br>
                    <li><b>Infants:</b> 14-17 hours per night</li>
                  </ul>
                </p>
                  </div>
  
           <!--3-->
           <div class="accordion">
              <div class="faq-icon"></div>
              <h5 style="font-size:15px;">What factors affect sleep quality?</h5>
              </div>
              <div class="panel">
              <p style="font-size:14px; font-family: poppins;">
                Several factors can influence sleep quality, including stress, anxiety, poor sleep environment (e.g., noise, light), irregular sleep schedules, caffeine and alcohol consumption, and underlying medical conditions (e.g., sleep disorders, chronic pain).
          </p>
              </div>
  
  
           <!--4-->
           <div class="accordion">
              <div class="faq-icon"></div>
              <h5 style="font-size:15px;">What are common sleep disorders?</h5>
              </div>
              <div class="panel">
              <p style="font-size:14px; font-family: poppins;">
                Common sleep disorders include insomnia (difficulty falling or staying asleep), sleep apnea (breathing interruptions during sleep), restless legs syndrome (uncomfortable sensations in the legs), and narcolepsy (excessive daytime sleepiness).
              </p>
              </div>
  
  
           <!--5-->
           <div class="accordion">
              <div class="faq-icon"></div>
              <h5 style="font-size:15px;">What should I do if I have trouble sleeping?</h5>
              </div>
              <div class="panel">
              <p style="font-size:14px; font-family: poppins;">
                If you're experiencing persistent sleep problems, consider consulting a healthcare professional or sleep specialist. Luckily, with Revive, you can have sessions with qualified professionals in the field, who can help evaluate your sleep patterns, identify underlying issues, and recommend appropriate treatment options to improve your sleep quality.
              </p>
              </div>
  
              <br><br>
  
          </div>
  </section>
  <!---#FAQ SECTION ENDS HERE-->



     
<!--- #CTA SECTION STARTS HERE---> 

      <section class="ctab" id="contact">
        <div class="container">

          <div class="ctab-content">
            <h2 class="h2 section-title">Start Your Free Trial of Revive Premium.</h2>
            <p class="section-text">
              After your free trial, the yearly subscription is US$39.99, and automatically renews each year until cancelled.
            </p>
          </div>

          <div class="ctab-content2">
  
            <div class="card-rating2">
              <span>  3-DAY FREE TRIAL  </span>
            </div>
            <p class="card-subtitle2">YEARLY,  US$39.99 /yr.</p>
            <h3 class="h3 card-title2">US$3.33 /month.</h3>
            <p class="ctab-btn">
              <a href="payment.php">Continue</a>
            </p>

          </div>
        </div>
      </section>
<!--- #CTA SECTION STARTS HERE --->



    </article>
  </main>



  <?php
  require_once "../partials/footer.php";
  ?>
</body>

</html>
