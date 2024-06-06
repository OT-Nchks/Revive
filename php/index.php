
 <?php
session_start();
/*require_once "user_guard.php";*/
require_once "../classes/User.php";

if (isset($_SESSION['useronline'])) {
    require_once "../partials/header_loggedin.php";
} else {
    require_once "../partials/header.php";
}


  $user=new User();
  $reviews=$user->get_reviews_excl_IdRange(13,18);
  $blogs=$user->fetch_allBlogs();
?>
  <main>
    <!--HERO BANNER STARTS HERE-->

    <section class="hero4 banner">
        <div class="container">
    
            <div class="container"><img src="../assets/images/landingpage/cloud_leftbi.PNG" class="cloud1" data-speed="0.1" style="width:1000px;"></div>

            <div class="container"><img src="../assets/images/landingpage/cloud_rightbii.PNG" class="cloud2" data-speed="0.1" style="width:1000px;"></div>

            <div class="container"><img src="../assets/images/landingpage/title.PNG" class="title" data-speed="0.1" style="width:1000px;"></div>

        </div>
      </section>

<!--HERO BANNER ENDS HERE-->



<!-- ARTICLE WRITEUP STARTS HERE-->
     
<section class="article" id="destination"> 
        <br><br><br>
  <div class="container2">
    <h2 class="h2 section-title" style="text-align: center; font-size:34px;">Awaken Your Vitality, with Revive!.</h2>

    <p class="article-text"> Revive is not just another sleep app; it's your personalized sleep sanctuary. With cutting-edge features tailored to your unique sleep patterns, Revive helps you effortlessly drift into a world of deep, rejuvenating sleep.<br>
      Discover a wealth of tools designed to enhance every aspect of your sleep journey. From soothing sounds and guided meditations to customizable sleep schedules, Revive empowers you to create the perfect ambiance for a night of uninterrupted bliss.<br>
      Join thousands of users worldwide who have embraced the transformative power of Revive. Take control of your sleep today and wake up refreshed, energized, and ready to conquer the day.<br>
      Experience the difference with Revive. <i>Sweet dreams await!</i></p>
  </div>
      
  <br>
   
      <div class="container2 cta2c">
        <a href="questionnaire.php">Try Revive For FREE</a>
  </div>
  <br>

      <hr style="opacity:0.3;">
</section>
<!-- ARTICLE WRITEUP ENDS HERE-->



 <!-- TESTIMONIALS -->
  <section class="package" id="package">
    <h3 class="h2 section-title" style="text-align: center; font-size:25px; padding:1rem;">Heartfelt <i>testimonials</i> that illuminate<br> the journey from restless nights to restorative rest.</h3>
    <br>
        <div class="owl-carousel">
            <!--testimonial reviews starts here-->

            <?php 
            foreach ($reviews as $review){
              ?>
        <div class="item2">
            <div class="clientname">
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
    <br><br>
    <!--testimonial reviews ends here-->


    <div class="container2 cta2c">
        <a id="leaveReviewBtn" href="javascript:void(0);">Leave a Review</a>
  </div>
   
  <!-- The Modal -->
<div id="reviewModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form id="reviewForm" action="../process/process_submitreview.php" method="post">

        <label for="client_name">Name:</label>
        <input type="text" id="client_name" name="client_name" required><br>

        <label for="review_score">Rating:</label>
        <select id="review_score" name="review_score" required>
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5">5 Stars</option>
        </select><br><br>

        <label for="review_text">Review:</label>
        <textarea id="review_text" name="message" required></textarea><br>

        <button type="submit" class="revBtn" name="revBtn">Submit</button>
    </form>
  </div> 
</div>
<br>
<hr style="opacity:0.3;">
    </section>
<!-- END OF TESTIMONIALS -->


<!--- #FEATURES TAB STARTS HERE---> 
   
<section class="features" id="contact">
  <h3 class="article-title" style="text-align: center; font-size:25px;">Variety of Sounds on Our App.</h3>

  <div class="container2 filter-container" role="tablist">  
    <button type="button" role="tab" aria-selected="true" class="filter-item  active-filter" data-filter="sleepstories">SleepStories</button>
    <button type="button" role="tab" aria-selected="true" class="filter-item" data-filter="soundscapes">Soundscapes</button>
    <button type="button" role="tab" aria-selected="false" class="filter-item" data-filter="meditation">Meditation</button>
    <button type="button" role="tab" aria-selected="false" class="filter-item" data-filter="music">Music</button>
</div> 

<br>
<div class="container2 content-container">
    <ul class="package-list">
        <!-- TAB 1 sleepstories -->
        <li data-category="sleepstories" class="package-card1">
            <div class="package-card" style="background:transparent;">
                <div class="card-banner">
                    <img src="../assets/images/mob2b.PNG">
                </div>
                <div class="card-price">
                    <div class="wrapper">
                        <p class="cardr-text" style="font-family: montserrat; color:white; font-weight:600; font-size:16px; text-align: justify;">Snowy Stories for Dreaming</p>
                        <p class="card-text">Sleep stories will guide you off to sleep quickly<br> and naturally. Choose from 100+ titles, which<br> includes unique voices.</p>
                        <p class="features-tag" style="text-align: center;">Free Sample</p>
                        <p class="card-text" style="font-family: montserrat; color:white; font-weight:300; font-size:13px; text-align: justify;">Narrated by Michelle's Sanctuary</p>
                        <ul class="card-meta-list">
                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <audio controls id="song" src="../assets/images/audio/michelle1.m4a" type="audio/m4a"></audio>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-secondary"><a href="sleeptab.php" style="color:#fff;">Unlock More Content</a></button>
                </div>
            </div>
        </li>

        <!-- TAB 2 soundscapes -->
        <li data-category="soundscapes" class="package-card1" style="display: none;">
            <div class="package-card" style="background:transparent;">
                <div class="card-banner">
                    <img src="../assets/images/mob1c.PNG">
                </div>
                <div class="card-price">
                    <div class="wrapper">
                        <p class="cardr-text" style="font-family: montserrat; color:white; font-weight:600; font-size:16px; text-align: justify;">Soundscapes: Escape the everyday</p>
                        <p class="card-text">Unwind with captivating soundscapes<br>that transport you to serene environments. Leave <br> the noise of daily life behind and find solace in calming sounds.</p>
                        <p class="features-tag" style="text-align: center;">Free Sample</p>
                        <p class="card-text" style="font-family: montserrat; color:white; font-weight:300; font-size:13px; text-align: justify;">Tranquility Flow by Niclas Lundqvist</p>
                        <ul class="card-meta-list">
                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <audio controls id="song1" src="../assets/images/audio/Tranquility_Flow.mp3" type="audio/mp3"></audio>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-secondary"><a href="musictab.php" style="color:#fff;">Unlock More Content</a></button>
                </div>
            </div>
        </li>

        <!-- TAB 3 meditation -->
        <li data-category="meditation" class="package-card1" style="display: none;">
            <div class="package-card" style="background:transparent;">
                <div class="card-banner">
                    <img src="../assets/images/mob4.PNG">
                </div>
                <div class="card-price">
                    <div class="wrapper">
                        <p class="cardr-text" style="font-family: montserrat; color:white; font-weight:600; font-size:16px; text-align: justify;">Quiet your mind, awaken your rest:</p>
                        <p class="card-text">Discover guided meditations designed to<br> melt away daily anxieties and prepare your<br>body and mind for restful sleep.</p>
                        <p class="features-tag" style="text-align: center;">Free Sample</p>
                        <p class="card-text" style="font-family: montserrat; color:white; font-weight:300; font-size:13px; text-align: justify;">Affirmations For Manifesting</p>
                        <ul class="card-meta-list">
                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <audio controls id="song2" src="../assets/images/audio/Guided_Meditation.mp3" type="audio/mp3"></audio>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-secondary"><a href="meditatetab.php" style="color:#fff;">Unlock More Content</a></button>
                </div>
            </div>
        </li>

        <!-- TAB 4 music -->
        <li data-category="music" class="package-card1" style="display: none;">
            <div class="package-card" style="background:transparent;">
                <div class="card-banner">
                    <img src="../assets/images/mob3.PNG">
                </div>
                <div class="card-price">
                    <div class="wrapper">
                        <p class="cardr-text" style="font-family: montserrat; color:white; font-weight:600; font-size:16px; text-align: justify;">Music: Find your sleep melody</p>
                        <p class="card-text">Revive curates a collection of calming music  <br>specifically designed to promote relaxation and sleep. <br> Unwind with soothing melodies and gentle rhythms.</p>
                        <p class="features-tag" style="text-align: center;">Free Sample</p>
                        <p class="card-text" style="font-family: montserrat; color:white; font-weight:300; font-size:13px; text-align: justify;">Idea 22, by Gilbran Alcocer</p>
                        <ul class="card-meta-list">
                            <li class="card-meta-item">
                                <div class="meta-box">
                                    <audio controls id="song3" src="../assets/images/audio/Idea_22.mp3" type="audio/mp3"></audio>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <button class="btn btn-secondary"><a href="musictab.php" style="color:#fff;">Unlock More Content</a></button>
                </div>
            </div>
        </li>
    </ul>
</div>
<br><br>
<hr style="opacity:0.3;">

        </section>
<!--- #FEATURES TABS ENDS HERE --->




<!---BLOG SECTION STARTS HERE--->
  <section>
  <h3 class="h2 section-title" style="text-align: center; font-size:25px; padding:1rem;">Check our <i>blogs</i> for more sleep health resources.</h3>
  <div class="containerb swiper">
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">

            <?php
            foreach($blogs as $b){
            ?>

           
          <div class="card swiper-slide">
            <a href="blog.php?id=<?php echo $b['blog_id']; ?>" class="blog-link">
            <div class="image-box" style="padding:0.8rem;">
              <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
            </div>
            <div class="profile-details">
              <img src="../assets/images/logo3.PNG" alt="" />
              <div class="title-subt">
                <h4 class="titlee"><b><?php echo $b['blog_title'];?></b></h4>
                <h5 class="subt"><?php echo $b['blog_subtitle'];?></h5>
              </div>
            </div>
          </a>
          </div>
          <?php
            }?>
        </div>
      </div>
      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
    </div>

    <div class="container2 cta2c">
        <a href="blog.php">View All Blogs</a>
  </div>
  <br><br><br><br>
  </section>
<!---BLOG SECTION ENDS HERE--->



<!---FAQ SECTION STARTS HERE-->
      <section>
      <div class="container2" id="faq">
        <h2 class="h2 section-title" style="text-align: center; font-size:27px;">Frequently Asked Questions</h2>

        <!--1-->
        <h3 class="mb-2" style="color:#eee; font-size:20px;">GENERAL</h3>
        <div class="accordion">
            <div class="faq-icon"></div>
            <h5 style="font-size:15px;">What does Revive do exactly?</h5>
            </div>
            <div class="panel">
            <p style="font-size:14px;">
              The Revive app is designed to help people improve their sleep quality and overall well-being by providing a range of tools, content, and features aimed at enhancing sleep habits and promoting restful nights.
            </p>
            </div>

        <!--2-->
            <div class="accordion">
                <div class="faq-icon"></div>
                <h5 style="font-size:15px;">Is the Revive app free?</h5>
                </div>
                <div class="panel">
                <p style="font-size:14px;">
                  The app is entirely free to download and use to improve your sleep. However, not all content will be accessible unless you upgrade to the Premium plan. Purchasing a Premium plan will unlock the entire library of sleep content from soundscapes and SleepTales to music and more.
                </p>
                </div><br>

         <!--3-->
         <h3 class="my-2" style="color:#eee; font-size:20px;">SLEEP</h3>
         <div class="accordion">
            <div class="faq-icon"></div>
            <h5 style="font-size:15px;">How much sleep do I need?</h5>
            </div>
            <div class="panel">
            <p style="font-size:14px;">While the recommended amount of sleep for adults is generally 7 to 9 hours per night, individual requirements can vary person to person, depending on factors such as age, lifestyle, and genetics. Pay attention to your body's signals, strive for consistency in your sleep routine to help regulate your body's internal clock, and prioritize both sleep duration and quality.
        </p>
            </div>


         <!--4-->
         <div class="accordion">
            <div class="faq-icon"></div>
            <h5 style="font-size:15px;">Why do I have trouble sleeping?</h5>
            </div>
            <div class="panel">
            <p style="font-size:14px;">
              There can be various reasons why you may be experiencing trouble sleeping.<br>

              Here are a few common factors that can contribute to sleep difficulties:

              <ol><li>Stress and Anxiety: High levels of stress or anxiety can make it difficult to relax and fall asleep. Racing thoughts, worry, or an overactive mind can keep you awake at night.</li>
              <li>Poor Sleep Habits: Irregular sleep patterns, inconsistent bedtime routines, excessive caffeine or alcohol consumption, and engaging in stimulating activities before bed can disrupt your sleep.</li>
              <li>Environmental Factors: Uncomfortable sleeping environment, excessive noise, extreme temperatures, or inadequate lighting can interfere with your ability to fall asleep or stay asleep.</li>
              <li>Medical Conditions: Certain medical conditions, such as chronic pain, sleep apnea, restless leg syndrome, or hormonal imbalances can disrupt your sleep.</li>
              <li>Mental Health Issues: Depression, anxiety, bipolar disorder, post-traumatic stress disorder (PTSD), and other mental health challenges can affect sleep patterns and quality.</li></ol>
              If you're consistently having trouble sleeping, it's advisable to consult with a healthcare professional who can help assess your specific situation and provide guidance that's tailored to your needs.
            </p>
            </div>


         <!--5-->
         <div class="accordion">
            <div class="faq-icon"></div>
            <h5 style="font-size:15px;">How can I sleep better?</h5>
            </div>
            <div class="panel">
            <p style="font-size:14px;">
              We recommend starting with our Sleep Sounds collection in the Revive app, which features our most popular Sound-scapes®, music, and meditations based on your goals:

              <ul><li>Help falling asleep: natural sleep aids</li>
              <li>Getting back to sleep: reactive tools used to soothe you back to sleep</li>
              <li>Unwinding before bed: proactive tools to help start a sleep routine, focused on sleep hygiene - this means building habits and an environment for optimal sleep</li></ul>
              
              We also have soothing soundscapes and music that have been sonically-engineered to help you sleep. Choose from nature sounds such as rainstorms and ocean waves, to different frequency pitches including white, brown, and green noise. If you're looking for something that provides a bit more guidance, there's a variety of sleep meditations and breathwork. These exercises help lower the heart rate, which shifts your nervous system out of fight or flight and into a relaxed parasympathetic mode, enabling your body to fall into a deeper sleep.<br><br>

              Lastly, we also have a Sleep Check-In feature which offers a new way to track your sleep. Check in with your nightly sleep quality, and we'll show you patterns to guide you towards better sleep habits and health.
            </p>
            </div>
            <br>



            <!--6-->
            <h3 class="my-2" style="color:#eee; font-size:20px;">MEDITATION, STRESS, SOUNDS</h3>
         <div class="accordion">
          <div class="faq-icon"></div>
          <h5 style="font-size:15px;">What is Meditation?</h5>
          </div>
          <div class="panel">
          <p style="font-size:14px;">
            Meditation is the practice of allowing thoughts to come and go, as you learn to recognize and release them without judgment. Studies show that a long-term meditation practice can actually help shift your nervous system out of fight or flight and into the relaxed parasympathetic mode producing a wide array of benefits* including:

            <ul><li>Decreased anxiety and depression symptoms</li>
            <li>Improved sleep quality</li>
            <li>Lower stress levels</li>
            <li>Chronic pain management</li>
            </ul>
          </p>
          </div>


          <!--7-->
         <div class="accordion">
          <div class="faq-icon"></div>
          <h5 style="font-size:15px;">How can I manage my stress and anxiety?</h5>
          </div>
          <div class="panel">
          <p style="font-size:14px;">
            We recommend using Revive app's Breathwork exercise, as it elicits the body's relaxation response which reduces tension and lowers stress.<br>

            We also have other content programs, including our Overcome Stress and Anxiety collection in partnership with many clinical psychologists. In this series, they guide listeners through high stress moments in real time, including panic attacks, negative thought spirals, and more.<br>

            Let experts help guide you into peaceful mindfulness and relaxation.
          </p>
          </div>


           <!--8-->
         <div class="accordion">
          <div class="faq-icon"></div>
          <h5 style="font-size:15px;">How can I manage my stress and anxiety?</h5>
          </div>
          <div class="panel">
          <p style="font-size:14px;">
            We recommend using Revive app's Breathwork exercise, as it elicits the body's relaxation response which reduces tension and lowers stress.<br>

            We also have other content programs, including our Overcome Stress and Anxiety collection in partnership with many clinical psychologists. In this series, they guide listeners through high stress moments in real time, including panic attacks, negative thought spirals, and more.<br>

            Let experts help guide you into peaceful mindfulness and relaxation.
          </p>
          </div>


           <!--9-->
         <div class="accordion">
          <div class="faq-icon"></div>
          <h5 style="font-size:15px;">How do sound frequencies affect your brain?</h5>
          </div>
          <div class="panel">
          <p style="font-size:14px;">
            Although it's commonly known now that there are different 'colors' of noises, it might not be known what the difference between them are:<br>

            <ul><li><u>White Noise:</u> Contains all audible frequencies with equal intensity. It masks background sounds and promotes relaxation, helping to drown out distractions and create a consistent sleep environment.</li><br>

            <li><u>Pink Noise:</u> Has a consistent power per octave, making lower frequencies more prominent. It has a softer, more soothing sound compared to white noise and is believed to improve deep sleep and memory consolidation.</li><br>

            <li><u>Brown Noise:</u> Similar to pink noise but with even more emphasis on lower frequencies. It has a deeper, rumbling sound and is often used for relaxation and stress reduction.</li><br>

            <li><u>Blue Noise:</u> Contains higher frequencies with more intensity, creating a sharper sound compared to white noise. It can enhance focus and cognitive function but may not be as effective for promoting sleep.</li><br>

            <li><u>Green Noise:</u> Not as well-known as other types, green noise falls between white and pink noise in terms of frequency distribution. It's thought to have a calming effect and may help improve concentration and relaxation.</li></ul><br>

            Overall, the effectiveness of each type of noise for sleep may vary from person to person, depending on individual preferences and sensitivities.
          </p>
          </div>


            <br><br>

        </div>
</section>
<!---FAQ SECTION ENDS HERE-->




<!--- #CTA STARTS HERE---> 

      <section class="cta" id="contact">
        <div class="container">

          <div class="cta-content">
            <h2 class="h2 section-title">Start Your Free Trial of Revive Premium.</h2>
            <p class="section-text">
              After your free trial, the yearly subscription is US$39.99, and automatically renews each year until cancelled.
            </p>
          </div>

          <div class="cta-content2">
  
            <div class="card-rating2">
              <span>  3-DAY FREE TRIAL  </span>
            </div>
            <p class="card-subtitle2">YEARLY,  US$39.99 /yr.</p>
            <h3 class="h3 card-title2">US$3.33 /month.</h3>
            <p class="cta-btn">
              <a href="payment.php">Continue</a>
            </p>

          </div>
        </div>
      </section>

    </article>
  </main>
<!--- #CTA ENDS HERE---> 



  <?php
  require_once "../partials/footer.php";
  ?>
  
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            // Your owl carousel options
        });

        var modal = document.getElementById("reviewModal");

        var btn = document.getElementById("leaveReviewBtn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
</script>
<script>
    const title =  document.querySelector('.title')
    const cloud1 =  document.querySelector('.cloud1')
    const cloud2 =  document.querySelector('.cloud2')

    document.addEventListener('scroll', function(){
        let value = window.scrollY;

        title.style.marginBottom = -value  + "px";
        cloud1.style.marginLeft = -value  + "px";
        cloud2.style.marginLeft = value  + "px";
    });

</script>
<script>
      var swiper = new Swiper(".slide-container", {
      slidesPerView: 4,
      spaceBetween: 20,
      sliderPerGroup: 4,
      loop: true,
      centerSlide: "true",
      fade: "true",
      grabCursor: "true",
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        520: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        1000: {
          slidesPerView: 4,
        },
        1250: {
          slidesPerView: 5,
        },
      },
    });
</script>
<script>
   const filterButtons = document.querySelectorAll('.filter-item');
  const contentItems = document.querySelectorAll('.package-card1');

  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      const filter = button.dataset.filter;

      // Reset active state and aria-selected for all buttons
      filterButtons.forEach(btn => {
        btn.classList.remove('active-filter');
        btn.setAttribute('aria-selected', 'false');
      });

      // Set active state and aria-selected for clicked button
      button.classList.add('active-filter');
      button.setAttribute('aria-selected', 'true');

      // Hide all content items
      contentItems.forEach(item => item.style.display = 'none');

      // Show only content items matching the filter
      contentItems.forEach(item => {
        if (item.dataset.category === filter) {
          item.style.display = 'block';
        }
      });
    });
  });
</script>


</body>
</html>
