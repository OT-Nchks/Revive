<?php
//session_start();
require_once "../php/user_guard.php";
//print_r($_SESSION['useronline']);
?>


<!DOCTYPE html>
   <html lang="en">
   <head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="keywords" content="Sleep, Insomnia, Sleep App, Sleep Tracking, Meditation, Mental health, Mindfulness, Stress and Anxiety"/>
    <meta name="description" content="Revive is designed to provide comprehensive support and guidance for individuals struggling with insomnia. Leveraging cutting-edge technology and evidence-based techniques, Revive aims to empower users to understand, manage, and improve their sleep patterns effectively."/>
    <meta name="author" content="Revive"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="icon" href="../assets/images/favicon-revive.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/dashboard/assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/fonts/montserrat">
    <link rel="stylesheet" href="../assets/fonts/poppins">
    <link rel="stylesheet" href="../assets/dashboard/assets/css/styles.css">

      <title>Revive App, Welcome.</title>
<style>
         a{
            color:#fff;
         }
       
         .icon-button{
            font-size:1.35rem;
            color:#fff;
            }
   .notify-menu {
      display: none;
      position: absolute;
      top: 100%;
      left: 8;
      width: 300px;
      max-height: 400px;
      overflow-y: auto;
      background-color: white;
      opacity:0.85;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      border-radius: 6px;
      z-index: 1000;
   }
  
   .notify-menu.show {
      display: block;
   }
   @media screen and (max-width: 567px) {
      .notify-menu {
      left: 8%;
   }
   }
   @media (min-width: 568px) and (max-width: 767px) {
      .notify-menu {
      right: 5%;
   }
}

   .notification-item {
      padding: 10px;
      background-color: #f0f0f0;
      border-bottom: 1px solid #e0e0e0;
      list-style: none;
      color:black;
      font-size:12px;
   }
   
   .notification-item:hover {
      background-color: #e0e0e0;
   }

   .icon-button {
      position: relative;
      background: none;
      border: none;
      cursor: pointer;
   }

   .icon-button__badge {
      position: absolute;
      top: 0;
      right: 0;
      background: red;
      color: white;
      border-radius: 50%;
      padding: 0 5px;
      font-size: 12px;
   }

</style>
   </head>
   <body>
      <img src="../assets/dashboard/assets/img/bb2.jpg" alt="image" class="bg__image">
      <div class="bg__blur"></div>



      <!---- HEADER SECTION STARTS HERE---->
      <header class="header" id="header">
         <div class="header__content">
            <a href="dashboard.php" class="header__logo"><img src="../assets/dashboard/assets/img/logo3.PNG" width="100px"></a>
   
            <div class="header__actions">
			</span>
            


         <div class="notify-btn" id="notify-btn">
               <button type="button" class="icon-button">
                  <i class="ri-notification-2-line"></i>
               <span class="icon-button__badge" id="show_notif">!</span>
               </button>
         <div class="notify-menu" id="notify-menu"></div>
      </div>
               

               <a href="profiletab.php" class="header__actions">
               <i class="ri-account-circle-line"></i></a>
               
               <div class="header__menu" id="header-menu">
                  <i class="ri-menu-line"></i>
               </div>
            </div>
         </div>

         <!-- <form action="" class="header__search search-bar">
            <i class="ri-search-line"></i>
            <input type="search" placeholder="Looking for anything?..." class="header__input" id="searchInput">
         </form> -->
      </header>
   <!---- HEADER SECTION ENDS HERE---->


      <!---- NAV SECTION STARTS HERE---->
      <nav class="nav" id="nav">
         <div class="nav__menu">
            <a href="dashboard.php" class="nav__logo"><img src="../assets/dashboard/assets/img/logo3.PNG" width="150px"></a>

            <ul class="nav__list">
            <li class="nav__item">
            <a href="dashboard.php"><button class="nav__link">
                  <i class="ri-home-5-line"></i><span>Home</span>
               </button></a>
            </li>

            <li class="nav__item">
            <a href="sleeptab.php"><button class="nav__link">
               <i class="ri-moon-line"></i><span>Sleep Stories</span>
               </button></a>
            </li>

            <li class="nav__item">
            <a href="meditatetab.php"><button class="nav__link">
               <i class="ri-bubble-chart-line"></i><span>Meditate</span>
               </button></a>
            </li>

            <li class="nav__item">
            <a href="musictab.php"><button class="nav__link">
               <i class="ri-music-2-line"></i></i><span>Music</span>
               </button></a>
            </li>

            <li class="nav__item">
            <a href="favoritetab.php"><button class="nav__link">
               <i class="ri-heart-3-line"></i><span>Favorites</span>
               </button></a>
            </li>
         </ul>

         <div>
            <ul class="nav__list">
               <li class="nav__item">
               <a href="profiletab.php"><button class="nav__link">
                  <i class="ri-account-circle-line"></i><span>Profile</span>
                  </button></a>
               </li>

               
              <li> 
              <a href="logout.php"><button id="logoutBtn" class="nav__link">
               <i class="ri-logout-circle-line"></i><span >Log Out</span>
               </button></a>
            </li>
            </ul>
         </div>
      </div>

     

      <div class="nav__close" id="nav-close">
         <i class="ri-close-line"></i>
      </div>
   </nav>
<!---- NAV SECTION ENDS HERE---->




<script>
   const notify_btn = document.getElementById('notify-btn');
    const notify_label = document.getElementById('show_notif');
    const notify_container = document.getElementById('notify-menu');

    function notify_me() {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '../admin/select.php', true);

        xhr.onload = () => {
            if (xhr.status == 200) {
                try {
                    let get_data = JSON.parse(xhr.responseText);
                    notify_label.innerHTML = get_data.count; // Assuming 'count' contains the notification count
                } catch (e) {
                    console.error("Error parsing JSON response:", e);
                }
            } else {
                console.error("Request failed. Status:", xhr.status);
            }
        };

        xhr.onerror = () => {
            console.error("Request failed. Network Error");
        };

        xhr.send();
    }

    window.onload = () => {
        notify_me();

        setInterval(() => {
            notify_me();
        }, 1000);
    };

    notify_btn.addEventListener('click', (e) => {
        e.preventDefault();

        notify_container.classList.toggle('show');
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '../admin/data.php', true);

        xhr.onload = () => {
            if (xhr.status == 200) {
                try {
                    let data = JSON.parse(xhr.responseText);
                    notify_container.innerHTML = ''; // Clear all list before data is reloaded

                    data.forEach(message => {
                        let li = `<li class="notification-item">${message.msg}</li>`;
                        notify_container.innerHTML += li;
                    });
                } catch (e) {
                    console.error("Error parsing JSON response:", e);
                }
            } else {
                console.error("Request failed. Status:", xhr.status);
            }
        };

        xhr.onerror = () => {
            console.error("Request failed. Network Error");
        };

        xhr.send();
    });
</script>
   </body>
</html>