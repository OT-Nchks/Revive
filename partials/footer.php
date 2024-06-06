<!--- #FOOTER STARTS HERE---> 
    
<footer class="footer">

<div class="footer-top">
  <div class="container">

    <div class="footer-brand">

      <a href="index.php" class="logo">
        <img src="../assets/images/logo2.PNG" class="footer-logo" alt="Revive  logo">
      </a>

      <p class="footer-text">
        Join thousands of users worldwide who have embraced the transformative power of Revive. Take control of your sleep today and wake up refreshed, energized, and ready to conquer the day.
      </p>
    </div>

    <div class="footer-contact">
      <h4 class="contact-title">CONTACT US</h4>
      <p class="contact-text">
        Feel free to contact and reach us!
      </p>

      <ul>
        <li class="contact-item">
          <ion-icon name="call-outline"></ion-icon>
          <a href="tel:+2348168785863" class="contact-link">+234-816-878-5863</a>
        </li>

        <li class="contact-item">
          <ion-icon name="mail-outline"></ion-icon>
          <a href="mailto:info@revive.com" class="contact-link">info@revive.ng</a>
        </li>

        <li class="contact-item">
          <ion-icon name="location-outline"></ion-icon>
          <address>Lagos, Nigeria.</address>
        </li>
      </ul>
    </div>

    <div class="footer-form">
        <h4 class="contact-title">SUBSCRIBE</h4>
      <p class="form-text">
        Subscribe our newsletter for more update & news!
      </p>
      <form action="../process/process_sendmail.php" class="form-wrapper" method="post">
        <input type="email" name="email" class="input-field" placeholder="Enter Your Email" required>
        <input type="submit" class="footer-cta1" value="SUBSCRIBE">
      </form>
    </div>
  </div>
</div>

<div class="footer-bottom">
  <div class="container">

    <p class="copyright">&copy;<span id="showyear"></span> All rights reserved by O.T+
    </p>

    <ul class="footer-bottom-list">
      <li><a href="privacypolicy.php" class="footer-bottom-link">Privacy Policy</a></li>
      <li><a href="#" class="footer-bottom-link">Term & Condition</a></li>
      <li><a href="#faq" class="footer-bottom-link">FAQ</a></li>
    </ul>
  </div>
</div>
</footer>
<!--- #FOOTER ENDS HERE--->


 <!--- #GO TO TOP ---> 
    
 <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>



  <script src="../assets/js/app.js"></script>
  <script src="../assets/js/bootstrap.bundle.js"></script>
  <script src="../assets/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/bower_components/jquery/dist/jquery.js"></script>
  <script src="/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../assets/dashboard/assets/js/swiper-bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    nav:false,
    autoplay:true,
    autoplayTimeout:1300,
    stylePadding:50,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        500:{
            items:2
        },
        650:{
            items:3
        },
        950:{
            items:4
        },
        1200:{
            items:5
        }
    }
})
  </script>