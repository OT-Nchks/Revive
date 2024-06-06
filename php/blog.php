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

$blog_id = ["8", "9", "10", "11", "12", "13"];
  
$blogs = [];

foreach ($blog_id as $blogId) {
  $blogs[$blogId] = $user->fetch_blog($blogId);
}
?>


<style>
        body { background: rgb(171, 164, 151); font-family: 'Poppins', sans-serif;}
           
        li { list-style: none; }
</style>


     <main>
    <article>
      <!--HERO BANNER-->
      
      <section class="hero" id="home">
        <div class="container">
        
        <h2 class="h1 hero-title2">Blog</h2>

          <p class="hero-text">
            Welcome to <b>Revive's Blog</b>, your ultimate destination for all things sleep-related. Discover expert insights, practical tips, and fascinating facts about the world of sleep. Join us as we unravel the mysteries of the night and learn how to make the most of our precious slumber. Let's embark on a journey to better sleep and brighter days ahead!
          </p>

        </div>
      </section>

  


 <!-- POPULAR ARTICLES -->
     
      <section class="popular" id="destination"> 
        
        <div class="post-filter container">  
                <span class="filter-item active-filter" data-filter="all">All</span>
                <span class="filter-item" data-filter="sleep">Sleep</span>
                <span class="filter-item" data-filter="stress">Stress</span>
                <span class="filter-item" data-filter="mentalhealth">Mental Health</span>
            </div> 

    <div class="container">
        <br>
          <h2 class="h2 section-title" style="font-size:28px; text-align:center;"><u>NEW & FEATURED ARTICLES</u></h2>

          <ul class="popular-list">
                                   
            <li>
                <?php
                  foreach ($blogs["10"]as $b){ 
                    $date= $b['blog_date'];
                    $bDate = new DateTime($date);
                    $format_bDate=$bDate->format('jS F, Y');
                 ?>  

              <div class="popular-card" data-category="<?php echo strtolower($b['blog_category']); ?>">

                <figure class="card-img">
                <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
                </figure>
                <div class="card-content">
                  <div class="card-rating">
                   <span><?php echo strtoUpper($b['blog_category']);?></span>
                  </div>

                  <p class="card-subtitle">
                    <a href="blog3.php"><?php echo $format_bDate?></a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="blog3.php"><?php echo $b['blog_title'];?></a>
                  </h3>

                  <p class="card-text">
                  <?php echo $b['blog_subtitle'];?>
                  </p>
                </div>

              </div>
              <?php
                  }?>
            </li>

            <li>
            <?php
                  foreach ($blogs["8"]as $b){ 
                    $date= $b['blog_date'];
                    $bDate = new DateTime($date);
                    $format_bDate=$bDate->format('jS F, Y');
                 ?>
              <div class="popular-card" data-category="<?php echo strtolower($b['blog_category']); ?>">

                <figure class="card-img">
                <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <span><?php echo strtoUpper($b['blog_category']);?></span>
                  </div>

                  <p class="card-subtitle">
                    <a href="blog2.php"><?php echo $format_bDate?></a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="blog2.php"><?php echo $b['blog_title'];?></a>
                  </h3>

                  <p class="card-text">
                  <?php echo $b['blog_subtitle'];?>
                  </p>

                </div>
              </div>
              <?php
                  }?>
            </li>

            <li>
            <?php
                  foreach ($blogs["11"]as $b){ 
                    $date= $b['blog_date'];
                    $bDate = new DateTime($date);
                    $format_bDate=$bDate->format('jS F, Y');
                 ?>
              <div class="popular-card" data-category="<?php echo strtolower($b['blog_category']); ?>">

                <figure class="card-img">
                <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <span><?php echo strtoUpper($b['blog_category']);?></span>
                  </div>

                  <p class="card-subtitle">
                    <a href="blog4.php"><?php echo $format_bDate?></a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="blog4.php"><?php echo $b['blog_title'];?></a>
                  </h3>

                  <p class="card-text">
                  <?php echo $b['blog_subtitle'];?>
                  </p>
                </div>
              </div>
              <?php
                  }?>
            </li>
          </ul>
      <hr>
        </div>
      </section>
<!-- POPULAR ARTICLES -->



<!--other articles-->
      <section class="popular" id="destination">
     
        <div class="container1">

          <ul class="popular-list">

            <li>
            <?php
                  foreach ($blogs["9"]as $b){ 
                    $date= $b['blog_date'];
                    $bDate = new DateTime($date);
                    $format_bDate=$bDate->format('jS F, Y');
                 ?>
              <div class="popular-card1" data-category="<?php echo strtolower($b['blog_category']); ?>">

                <figure class="card-img">
                <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                   <span><?php echo strtoUpper($b['blog_category']);?></span>
                  </div>

                  <p class="card-subtitle">
                    <a href="blog1.php"><?php echo $format_bDate?></a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="blog1.php"><?php echo $b['blog_title'];?></a>
                  </h3>

                  <p class="card-text">
                  <?php echo $b['blog_subtitle'];?>
                  </p>
                </div>
              </div>
              <?php
                  }?>
            </li>


            <li>
            <?php
                  foreach ($blogs["10"]as $b){ 
                    $date= $b['blog_date'];
                    $bDate = new DateTime($date);
                    $format_bDate=$bDate->format('jS F, Y');
                 ?>
              <div class="popular-card1" data-category="<?php echo strtolower($b['blog_category']); ?>">

                <figure class="card-img">
                <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <span><?php echo strtoUpper($b['blog_category']);?></span>
                  </div>

                  <p class="card-subtitle">
                    <a href="blog3.php"><?php echo $format_bDate?></a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="blog3.php"><?php echo $b['blog_title'];?></a>
                  </h3>

                  <p class="card-text">
                  <?php echo $b['blog_subtitle'];?>
                  </p>
                </div>
              </div>
              <?php
                  }?>
            </li>


            <li>
                <?php
                  foreach ($blogs["12"]as $b){ 
                    $date= $b['blog_date'];
                    $bDate = new DateTime($date);
                    $format_bDate=$bDate->format('jS F, Y');
                 ?>
              <div class="popular-card1" data-category="<?php echo strtolower($b['blog_category']); ?>">

                <figure class="card-img">
                <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <span><?php echo strtoUpper($b['blog_category']);?></span>
                  </div>

                  <p class="card-subtitle">
                    <a href="blog5.php"><?php echo $format_bDate?></a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="blog5.php"><?php echo $b['blog_title'];?></a>
                  </h3>

                  <p class="card-text">
                  <?php echo $b['blog_subtitle'];?>
                  </p>
                </div>
              </div>
              <?php
                  }?>
            </li>

            <li>
                <?php
                  foreach ($blogs["11"]as $b){ 
                    $date= $b['blog_date'];
                    $bDate = new DateTime($date);
                    $format_bDate=$bDate->format('jS F, Y');
                 ?>
              <div class="popular-card1" data-category="<?php echo strtolower($b['blog_category']); ?>">

                <figure class="card-img">
                <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                   <span><?php echo strtoUpper($b['blog_category']);?></span>
                  </div>

                  <p class="card-subtitle">
                    <a href="blog4.php"><?php echo $format_bDate?></a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="blog4.php"><?php echo $b['blog_title'];?></a>
                  </h3>

                  <p class="card-text">
                  <?php echo $b['blog_subtitle'];?>
                  </p>
                </div>
              </div>
              <?php
                  }?>
            </li>


            <li>
                <?php
                  foreach ($blogs["8"]as $b){ 
                    $date= $b['blog_date'];
                    $bDate = new DateTime($date);
                    $format_bDate=$bDate->format('jS F, Y');
                 ?>
              <div class="popular-card1" data-category="<?php echo strtolower($b['blog_category']); ?>">

                <figure class="card-img">
                <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <span><?php echo strtoUpper($b['blog_category']);?></span>
                  </div>

                  <p class="card-subtitle">
                    <a href="blog2.php"><?php echo $format_bDate?></a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="blog2.php"><?php echo $b['blog_title'];?></a>
                  </h3>

                  <p class="card-text">
                  <?php echo $b['blog_subtitle'];?>
                  </p>
                </div>
              </div>
              <?php
                  }?>
            </li>
  
  
              <li>
                <?php
                  foreach ($blogs["13"]as $b){ 
                    $date= $b['blog_date'];
                    $bDate = new DateTime($date);
                    $format_bDate=$bDate->format('jS F, Y');
                 ?>
                  <div class="popular-card1" data-category="<?php echo strtolower($b['blog_category']); ?>">
    
                    <figure class="card-img">
                    <img src="../admin/uploads/imageupload/<?php echo $b['blog_image'];?>" alt="" />
                    </figure>
    
                    <div class="card-content">
    
                      <div class="card-rating">
                        <span><?php echo strtoUpper($b['blog_category']);?></span>
                      </div>
    
                      <p class="card-subtitle">
                        <a href="blog6.php"><?php echo $format_bDate?></a>
                      </p>
    
                      <h3 class="h3 card-title">
                        <a href="blog6.php"><?php echo $b['blog_title'];?></a>
                      </h3>
    
                      <p class="card-text">
                      <?php echo $b['blog_subtitle'];?>
                      </p>
                    </div>
                  </div>
                  <?php
                  }?>
                </li>
          </ul>
        </div>
      </section>
<!--other articles-->




  <!--- #CTA SECTION STARTS HERE---> 
        <section class="cta" id="contact">
          <div class="container">

            <div class="cta-content">
              <p class="section-subtitle">LIKE WHAT YOU SEE?,</p>

              <h2 class="h2 section-title">Start Your Free Trial of Revive Premium.</h2>

              <p class="section-text">
                After your free trial, the yearly subscription is US$39.99, and automatically renews each year until cancelled.
              </p>
            </div>

            <!-- <button class="btn btn-secondary">Continue !</button> -->
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
  <!--- #CTA SECTION ENDS HERE---> 
    </article>
  </main>


  <?php
  require_once "../partials/footer.php";
  ?>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const filterItems = document.querySelectorAll('.filter-item');
    const popularCards = document.querySelectorAll('.popular-card1');

    filterItems.forEach(filterItem => {
        filterItem.addEventListener('click', () => {
            const filter = filterItem.getAttribute('data-filter');
            filterItems.forEach(item => item.classList.remove('active-filter'));
            filterItem.classList.add('active-filter');
            popularCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
</body>
</html>
