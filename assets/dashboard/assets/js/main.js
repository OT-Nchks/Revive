
/*----- SHOW MENU ----*/
const nav = document.getElementById('nav'),
      headerMenu = document.getElementById('header-menu'),
      navClose = document.getElementById('nav-close')

/* Menu show */
if(headerMenu){
   headerMenu.addEventListener('click', () =>{
      nav.classList.add('show-menu')
   })
}

/* Menu hidden */
if(navClose){
    navClose.addEventListener('click', () =>{
      nav.classList.remove('show-menu')
   })
}

/*------ SWIPER FEATURES -----*/
let swiperMovie = new Swiper('.movie__swiper', {
   loop: true,
   grabCursor: true,
   slidesPerView: 2,
   spaceBetween: 24,

   breakpoints:{
      440: {
         slidesPerView: 'auto',
      },
      768: {
         slidesPerView: 4,
      },
      1200: {
         slidesPerView: 5,
      },
   },
})

/*----- SWIPER NEW -----*/
let swiperNew = new Swiper('.new__swiper', {
   loop: true,
   grabCursor: true,
   centeredSlides: true,
   slidesPerView: 2,

   pagination: {
      el: '.swiper-pagination',
      clickable: true,
   },

   breakpoints:{
      440: {
         centeredSlides: false,
         slidesPerView: 'auto',
      },
      768: {
         centeredSlides: false,
         slidesPerView: 4,
      },
      1200: {
         centeredSlides: false,
         slidesPerView: 5,
      },
   },
})

/*----- ADD BLUR HEADER -----*/
const blurHeader = () =>{
   const header = document.getElementById('header')
   // Add a class if the bottom offset is greater than 50 of the viewport
   this.scrollY >= 50 ? header.classList.add('blur-header') 
                      : header.classList.remove('blur-header')
}
window.addEventListener('scroll', blurHeader)





//LIKE BUTTON
document.addEventListener("DOMContentLoaded", function () {
   const outlineHearts = document.querySelectorAll(".outline-heart");
   const fillHearts = document.querySelectorAll(".fill-heart");

   outlineHearts.forEach((outlineHeart, index) => {
       outlineHeart.addEventListener("click", function () {
           outlineHeart.style.display = "none";
           fillHearts[index].style.display = "inline-block";
       });

       fillHearts[index].addEventListener("click", function () {
           fillHearts[index].style.display = "none";
           outlineHearts[index].style.display = "inline-block";
       });
   });
});




//LOGOUT BUTTON
// document.addEventListener("DOMContentLoaded", function () {
//    const logoutBtn = document.getElementById("logoutBtn");
//    const logoutBtn2 = document.getElementById("logoutBtn2");
//    const logoutBtn3 = document.getElementById("logoutBtn3");
//    const logoutModal = document.getElementById("logoutModal");
//    const confirmLogoutBtn = document.getElementById("confirmLogout");
//    const confirmLogoutBtn2 = document.getElementById("confirmLogout2");
//    const cancelLogoutBtn = document.getElementById("cancelLogout");
//    const cancelLogoutBtn2 = document.getElementById("cancelLogout2");
//    const closeLogoutBtn = document.getElementById("close");
//    const closeLogoutBtn2 = document.getElementById("close2");
   
//    let activeTab = null;

//    // Function to reload the page
//    function reloadPage() {
//        if (activeTab) {
//            window.location.href = activeTab;
//        } else {
//            window.location.reload();
//        }
//    }

//    logoutBtn.addEventListener("click", function () {
//        activeTab = window.location.href;
//        logoutModal.style.display = "block";
//    });

//    logoutBtn2.addEventListener("click", function () {
//       activeTab = window.location.href;
//       logoutModal.style.display = "block";
//   });

//   logoutBtn3.addEventListener("click", function () {
//    activeTab = window.location.href;
//    logoutModal.style.display = "block";
// });

// //    confirmLogoutBtn.addEventListener("click", function () {
// //        window.location.href = "../php/login.php"; 
// //    });

//    cancelLogoutBtn.addEventListener("click", function () {
//        logoutModal.style.display = "none";
//        location.reload();
//    });

//    closeLogoutBtn.addEventListener("click", function () {
//       logoutModal.style.display = "none";
//       location.reload();
//   });

// //   confirmLogoutBtn2.addEventListener("click", function () {
// //     window.location.href = "../php/login.php"; 
// // });

// cancelLogoutBtn2.addEventListener("click", function () {
//     logoutModal.style.display = "none";
//     location.reload();
// });

// closeLogoutBtn2.addEventListener("click", function () {
//    logoutModal.style.display = "none";
//    location.reload();
// });

// });




//MUSIC SECTION
/*document.addEventListener("DOMContentLoaded", function() {
   const audio = document.querySelector("audio");
   const playBtn = document.getElementById("play-btn");
   const playBtn2 = document.getElementById("play-btn2");
   const stopBtn = document.getElementById("stop-btn");
   const prevBtn = document.getElementById("prev-btn");
   const nextBtn = document.getElementById("next-btn");
   const currentTimeDisplay = document.getElementById("currentTime");
   const durationDisplay = document.getElementById("inplay-duration");
   const volumeSlider = document.getElementById("volume");
   const playbackSlider = document.getElementById("playBackSlider");
   const mplayBtn = document.querySelector(".mplay");
    const playIcon = mplayBtn.querySelector(".ri-play-circle-line");
    const pauseIcon = mplayBtn.querySelector(".ri-pause-circle-line");

    let isPlaying = false;

    function togglePlay() {
        if (isPlaying) {
            audio.pause();
            playIcon.style.display = "inline-block";
            pauseIcon.style.display = "none";
            playBtn.innerHTML = '<i class="fa fa-play"></i>';
        } else {
            audio.play();
            playIcon.style.display = "none";
            pauseIcon.style.display = "inline-block";
            playBtn.innerHTML = '<i class="fa fa-pause"></i>';
        }
        isPlaying = !isPlaying;
    }
  
    playBtn.addEventListener("click", togglePlay);
    mplayBtn.addEventListener("click", togglePlay);

    stopBtn.addEventListener("click", function() {
        audio.pause();
        audio.currentTime = 0;
        playIcon.style.display = "inline-block";
        pauseIcon.style.display = "none";
        isPlaying = false;
    });
   let isPlaying = false;

   playBtn.addEventListener("click", function() {
       if (isPlaying) {
           audio.pause();
           playBtn.innerHTML = '<i class="fa fa-play"></i>';
           playBtn2.innerHTML = '<i class="fa fa-play"></i>';
       } else {
           audio.play();
           playBtn.innerHTML = '<i class="fa fa-pause"></i>';
           playBtn2.innerHTML = '<i class="fa fa-pause"></i>';
       }
       isPlaying = !isPlaying;
   });

   stopBtn.addEventListener("click", function() {
       audio.pause();
       audio.currentTime = 0;
       playBtn.innerHTML = '<i class="fa fa-play"></i>';
       playBtn2.innerHTML = '<i class="fa fa-play"></i>';
       isPlaying = false;
   });

 
});



  

   let isPlaying = false;

   function togglePlay() {
       if (isPlaying) {
           audio.pause();
           playBtn.innerHTML = '<i class="fa fa-play"></i>';
       } else {
           audio.play();
           playBtn.innerHTML = '<i class="fa fa-pause"></i>';
       }
       isPlaying = !isPlaying;
   }

   playBtn.addEventListener("click", togglePlay);
   mplayBtn.addEventListener("click", togglePlay);

   stopBtn.addEventListener("click", function() {
       audio.pause();
       audio.currentTime = 0;
       playBtn.innerHTML = '<i class="fa fa-play"></i>';
       isPlaying = false;
   });

   // The rest of the code remains the same...  
   
   prevBtn.addEventListener("click", function() {
       // Implement logic to play previous music
   });

   nextBtn.addEventListener("click", function() {
       // Implement logic to play next music
   });

   audio.addEventListener("timeupdate", function() {
       const currentTime = formatTime(audio.currentTime);
       const duration = formatTime(audio.duration);
       currentTimeDisplay.textContent = currentTime;
       durationDisplay.textContent = duration;
       playbackSlider.value = audio.currentTime / audio.duration * 100;
   });

   volumeSlider.addEventListener("input", function() {
       audio.volume = volumeSlider.value / 100;
   });

   playbackSlider.addEventListener("input", function() {
       audio.currentTime = audio.duration * (playbackSlider.value / 100);
   });

   function formatTime(seconds) {
       const minutes = Math.floor(seconds / 60);
       const remainingSeconds = Math.floor(seconds % 60);
       return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
   }
});
*/






document.addEventListener('DOMContentLoaded', function () {
    const displayImg = document.getElementById('display-img');
    const inplayTitle = document.getElementById('inplay-title');
    const inplayDescription = document.getElementById('inplay-description');
    const audio = new Audio();
    const playBtn = document.getElementById('play-btn');
    const stopBtn = document.getElementById('stop-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const volumeSlider = document.getElementById('volume');
    const playbackSlider = document.getElementById('playBackSlider');
    const currentTimeDisplay = document.getElementById('currentTime');
    const durationDisplay = document.getElementById('inplay-duration');
    let currentTrackIndex = -1;
    let isPlaying = false;
    const trackItems = document.querySelectorAll('.card__article');

    function loadTrack(index) {
        const trackItem = trackItems[index];
        fetchTrackDetails(trackItem.querySelector('.play-btn').dataset.trackId)
            .then(trackData => {
                displayImg.src = trackData.track_image;
                inplayTitle.textContent = trackData.track_name;
                inplayDescription.textContent = trackData.track_artist;
                audio.src = trackData.track_audio;
                currentTrackIndex = index;
                audio.play();
                isPlaying = true;
                playBtn.innerHTML = '<i class="fa fa-pause"></i>';
            });
    }

    playBtn.addEventListener('click', function () {
        if (isPlaying) {
            audio.pause();
            playBtn.innerHTML = '<i class="fa fa-play"></i>';
        } else {
            audio.play();
            playBtn.innerHTML = '<i class="fa fa-pause"></i>';
        }
        isPlaying = !isPlaying;
    });

    stopBtn.addEventListener('click', function () {
        audio.pause();
        audio.currentTime = 0;
        playBtn.innerHTML = '<i class="fa fa-play"></i>';
        isPlaying = false;
    });

    prevBtn.addEventListener('click', function () {
        if (currentTrackIndex > 0) {
            loadTrack(currentTrackIndex - 1);
        }
    });

    nextBtn.addEventListener('click', function () {
        if (currentTrackIndex < trackItems.length - 1) {
            loadTrack(currentTrackIndex + 1);
        }
    });

    volumeSlider.addEventListener('input', function () {
        audio.volume = this.value / 100;
    });

    audio.addEventListener('timeupdate', function () {
        const currentTime = audio.currentTime;
        const duration = audio.duration;
        playbackSlider.value = (currentTime / duration) * 100;
        currentTimeDisplay.textContent = formatTime(currentTime);
        durationDisplay.textContent = formatTime(duration);
    });

    playbackSlider.addEventListener('input', function () {
        audio.currentTime = (this.value / 100) * audio.duration;
    });

    trackItems.forEach((trackItem, index) => {
        const playButton = trackItem.querySelector('.play-btn');
        const pauseButton = trackItem.querySelector('.pause-btn');

        playButton.addEventListener('click', function (e) {
            e.preventDefault();
            loadTrack(index);
            trackItems.forEach(item => {
                item.querySelector('.play-btn').style.display = 'inline-block';
                item.querySelector('.pause-btn').style.display = 'none';
            });
            playButton.style.display = 'none';
            pauseButton.style.display = 'inline-block';
        });

        pauseButton.addEventListener('click', function (e) {
            e.preventDefault();
            audio.pause();
            isPlaying = false;
            playBtn.innerHTML = '<i class="fa fa-play"></i>';
            playButton.style.display = 'inline-block';
            pauseButton.style.display = 'none';
        });
    });

    function fetchTrackDetails(trackId) {
        return fetch(`get_track_details.php?track_id=${trackId}`)
            .then(response => response.json())
            .catch(error => console.error('Error fetching track details:', error));
    }

    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }
});




