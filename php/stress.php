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
$reviews=$user->get_reviews_by_IdRange(13, 18);
?>

<style>
        ul{
          list-style-type: none;
        }
        body { background: rgb(143, 136, 124);  font-family: 'Poppins', sans-serif;}
</style>


  <main>
    <article>
<!--- #HERO BANNER STARTS HERE --->
      
      <section class="hero3" id="home">
        <div class="container">
              <video autoplay loop muted plays-inline class="back-video">
                <source src="../assets/images/video/stress1.mp4" type="video/mp4">
              </video>
          <h2 class="h1 hero-title2">Stress & Anxiety</h2>

          <p class="hero-text2">
            Unraveling Stress and Anxiety: Keys to Better Sleep.
          </p>

        </div>
      </section>
<!--- #HERO BANNER ENDS HERE --->
  


<!--- #ARTICLE WRITEUP STARTS HERE --->
     
      <section class="article " id="destination"> 
        
        <div class="container2">  
          <p class="article-text">In our fast-paced world, stress and anxiety often disrupt our sleep. But there's hope! By managing stress with relaxation techniques, establishing a consistent sleep routine, and addressing the root causes, we can enjoy better sleep and wake up feeling refreshed. Prioritizing mental health leads to restful nights and brighter days.</p>
        </div>
            
        <br>
         
            <div class="container2">
              <p class="article-text">So, how do we break free from this cycle?, It starts with understanding the connection between stress, anxiety, and sleep. By learning to manage stress through relaxation techniques like deep breathing and meditation, we can calm our nervous system and create a conducive environment for sleep.</p>
        </div>
        <br>

        
          <div class="section-video container2">
            <h3 style="text-align: center; font-size:25px; font-weight:600; color:#60a1ca;margin-bottom:15px;">Try a Quick Breathing Exercise to ease your Stress</h3>
            <video autoplay loop muted plays-inline class="watch-video">
                <source src="../assets/images/video/Four Square Breathing Technique.mp4#t=18,60" type="video/mp4">
            </video>
          </div>
       
            <br>
      </section>
<!--- #ARTICLE WRITEUP ENDS HERE-->


 

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




<!--- #FAQ SECTION STARTS HERE-->
      <section>
      <div class="container2" id="faq">
        <h2 class="h2 section-title" style="text-align: center; font-size:27px;">Frequently Asked Questions</h2>

        <!--1-->
        <div class="accordion">
            <div class="faq-icon"></div>
            <h5 style="font-size:14px;">What is stress, and how does it affect sleep?</h5>
            </div>
            <div class="panel">
            <p style="font-size:13px;">
                Stress is the body's response to challenges or demands, whether they are real or perceived. It can disrupt sleep by causing racing thoughts, increased heart rate, and difficulty relaxing.
            </p>
            </div>

        <!--2-->
            <div class="accordion">
                <div class="faq-icon"></div>
                <h5 style="font-size:14px;">How does anxiety impact sleep quality?</h5>
                </div>
                <div class="panel">
                <p style="font-size:13px;">
                    Anxiety can lead to excessive worrying, making it challenging to relax and fall asleep. It may also cause frequent awakenings during the night and lead to unrefreshing sleep.
                </p>
                </div>

         <!--3-->
         <div class="accordion">
            <div class="faq-icon"></div>
            <h5 style="font-size:14px;">What are some effective strategies for managing stress and anxiety before bedtime?</h5>
            </div>
            <div class="panel">
            <p style="font-size:13px;"><ul>
                <li>Practicing relaxation techniques such as deep breathing, meditation, or progressive muscle relaxation.</li><br>
                <li>Establishing a consistent bedtime routine to signal to the body that it's time to wind down.
                Limiting exposure to screens and stimulating activities before bedtime.</li><br>
                <li>Engaging in regular physical activity during the day to promote relaxation and reduce tension.</li>
            </ul>
        </p>
            </div>


         <!--4-->
         <div class="accordion">
            <div class="faq-icon"></div>
            <h5 style="font-size:14px;">What is stress, and how does it affect sleep?</h5>
            </div>
            <div class="panel">
            <p style="font-size:13px;">
                Yes, chronic stress and anxiety can contribute to insomnia, a sleep disorder characterized by difficulty falling asleep, staying asleep, or waking up too early and not being able to return to sleep.
            </p>
            </div>


         <!--5-->
         <div class="accordion">
            <div class="faq-icon"></div>
            <h5 style="font-size:14px;">When should I seek professional help for stress and anxiety-related sleep problems?</h5>
            </div>
            <div class="panel">
            <p style="font-size:13px;">
                If stress and anxiety significantly impact your daily functioning or quality of life, or if sleep problems persist despite trying self-help strategies, it's essential to consult with a healthcare provider or mental health professional. Luckily, Revive has qualified therapists that can provide personalized recommendations and treatment options tailored to your needs.
            </p>
            </div>

            <br><br>

        </div>
</section>
<!--- #FAQ SECTION ENDS HERE-->




<!--- #CTA SECTION STARTS HERE---> 

      <section class="ctac" id="contact">
        <div class="container">

          <div class="ctac-content">
            <h2 class="h2 section-title">Start Your Free Trial of Revive Premium.</h2>
            <p class="section-text">
              After your free trial, the yearly subscription is US$39.99, and automatically renews each year until cancelled.
            </p>
          </div>

          <div class="ctac-content2">
  
            <div class="card-rating2">
              <span>  3-DAY FREE TRIAL  </span>
            </div>
            <p class="card-subtitle2">YEARLY,  US$39.99 /yr.</p>
            <h3 class="h3 card-title2">US$3.33 /month.</h3>
            <p class="ctac-btn">
              <a href="payment.php">Continue</a>
            </p>

          </div>
        </div>
      </section>

    </article>
  </main>
<!--- #CTA SECTION ENDS HERE---> 




<?php
require_once "../partials/footer.php";
?>

</body>

</html>
