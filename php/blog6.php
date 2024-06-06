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
$blog=$user->fetch_blog(13);
?>

<style>
  .hero2 {
    height: 200px;
    text-align: center;
    background-image: url("../assets/images/bg3b.PNG")!important;
  }
</style>
<main>
    <article>
      <!--HERO BANNER-->
      <?php
      foreach($blog as $b){
        ?>
      <section class="hero2" id="home">
        <div class="container">
            
          <h2 class="h1 hero-title2" style="font-size:55px;"><?php echo $b['blog_title'];?></h2>
          <p class="hero-text2"><?php echo $b['blog_subtitle'];?></p>
        </div>
      </section>

  


<!-- #ARTICLE WRITEUP STARTS HERE -->
      <section class="article" id="destination"> 
     
            <?php echo $b['blog_article'];?>
            
    <?php
      }?>
      </section>
<!-- #ARTICLE WRITEUP STARTS HERE -->

    </article>
  </main>



  <?php
  require_once "../partials/footer.php";
  ?>

</body>

</html>