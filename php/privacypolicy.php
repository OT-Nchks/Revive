<?php
session_start();
/*require_once "user_guard.php";*/

 if (isset($_SESSION['useronline'])) {
    require_once "../partials/header_tcpc.php";
} else {
    require_once "../partials/header_tcpc.php";
}

?>

<!--external css-->
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/mediaqueries.css">


<body>
<main>
    <article>
      
    <section>
    <div class="container2" style="height:150px;">  
    </div>
    </section>
<!-- #PRIVACY POLICY WRITEUP STARTS HERE -->
      <section class="article" id="destination"> 
        
        <div class="container2" >  
        <h3 class="article-title" style="font-size:24px; text-align:center;">REVIVE : Privacy Policy.</h3>
          <p class="article-text" style="font-size:12px;">This Privacy Policy describes how REVIVE ("we", "us", or "our") collects, uses, and discloses your information when you use our website (the "Service") and the choices you have associated with that data.</p>
    </div>
            
<br>
      
        <div class="container2">
          <h3 class="article-title" style="font-size:15px;">Information We Collect</h3>
          <p class="article-text" style="font-size:12px;">We may collect several different types of information for various purposes to improve our Service to you.</p>
       
          <ul class="article-text" style="font-size:12px;">
            <li><b>Personal Information:</b><br>While using our Service, we may ask you to provide certain personally identifiable information that can be used to contact or identify you ("Personal Information"). Personal Information may include, but is not limited to:</li>
            <ul>
                <li>Name</li>
                <li>Email Address</li>
                <li>Sleep data (if you choose to track it through the Service)</li>
            </ul>
            <br>
            <li><b>Usage Data:</b><br>We may also collect information about how you access and use the Service ("Usage Data"). This Usage Data may include information such as your device type, operating system, browser type, IP address, referring/exit pages, date and time stamps, and data you browse on the Service.</li>
            <br> 
            <li><b>Tracking Technologies:</b><br>We may utilize cookies and other tracking technologies to track the activity on our Service and hold certain information. Cookies are files with a small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Tracking technologies are also used like beacons, scripts, and tags to collect and track information and to improve and analyze our Service.</li>
          </ul>
    </div>
    <br>

    <div class="container2">
          <h3 class="article-title" style="font-size:15px;">Use of Your Information</h3>
          <p class="article-text" style="font-size:12px;">REVIVE uses the collected data for various purposes:</p>
       
          <ul class="article-text" style="font-size:12px;">
            <li>To provide and maintain the Service</li>
            <li>To improve and personalize the Service</li>
            <li>To understand how users utilize the Service</li>
            <li>To develop new features</li>
            <li>To provide customer support</li>
            <li>To send you promotional emails with your permission (you can opt-out at any time)</li>
            <li>To monitor and analyze the use of the Service for technical issues</li>
          </ul>
    </div>

    <br>

    <div class="container2">
          <h3 class="article-title" style="font-size:15px;">Disclosure of Your Information</h3>
          <p class="article-text" style="font-size:12px;">REVIVE may disclose your information under certain circumstances:</p>
       
          <ul class="article-text" style="font-size:12px;">
            <li>To service providers who help us operate and maintain the Service</li>
            <li>To comply with a legal obligation</li>
            <li>To protect the rights or safety of REVIVE or others</li>
          </ul>
    </div>

    <br>

    <div class="container2">
          <h3 class="article-title" style="font-size:15px;">Security of Your Information</h3>
          <p class="article-text" style="font-size:12px;">The security of your information is important to us. However, no method of transmission over the internet or electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>
    </div>

    <br>

    <div class="container2">
          <h3 class="article-title" style="font-size:15px;">Children's Privacy</h3>
          <p class="article-text" style="font-size:12px;">Our Service does not address anyone under the age of 13. We do not knowingly collect personal identifiable information from children under 13. If you are a parent or guardian and you are aware that your child has provided us with Personal Information, please contact us. If we become aware that we have collected Personal Information from a child under 13, we will take steps to remove that information from our servers.</p>
    </div>

    <br>

    <div class="container2">
          <h3 class="article-title" style="font-size:15px;">Your Rights</h3>
          <p class="article-text" style="font-size:12px;">Depending on your location, you may have certain rights regarding your personal information. These rights may include:</p>
          <ul class="article-text" style="font-size:12px;">
            <li>The right to access your information</li>
            <li>The right to rectification of your information</li>
            <li>The right to erasure of your information</li>
            <li>The right to restrict processing of your information</li>
            <li>The right to data portability</li>
          </ul>
    </div>

    <br>

    <div class="container2">
          <h3 class="article-title" style="font-size:15px;">Changes to This Privacy Policy</h3>
          <p class="article-text" style="font-size:12px;">We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>
    </div>

    <br>

    <div class="container2">
          <h3 class="article-title" style="font-size:15px;">Contact Us</h3>
          <p class="article-text" style="font-size:12px;">If you have any questions about this Privacy Policy, please contact us by email: <b>info@revive.ng</b></p>
    </div>
    <br>
      </section>
<!-- #PRIVACY POLICY WRITEUP STARTS HERE -->



    </article>
  </main>



  <?php
  require_once "../partials/footer_tcpc.php";
  ?>

</body>

</html>