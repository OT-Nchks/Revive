
'use strict';

/*--- navbar toggle---*/

const overlay = document.querySelector("[data-overlay]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");
const navLinks = document.querySelectorAll("[data-nav-link]");

const navElemArr = [navOpenBtn, navCloseBtn, overlay];

const navToggleEvent = function (elem) {
  for (let i = 0; i < elem.length; i++) {
    elem[i].addEventListener("click", function () {
      navbar.classList.toggle("active");
      overlay.classList.toggle("active");
    });
  }
}

navToggleEvent(navElemArr);
navToggleEvent(navLinks);



/*--- header sticky & go to top---*/
 
const header1 = document.querySelector("[data-header]");
const goTopBtn = document.querySelector("[data-go-top]");

window.addEventListener("scroll", function () {

  if (window.scrollY >= 200) {
    header1.classList.add("active");
    goTopBtn.classList.add("active");
  } else {
    header1.classList.remove("active");
    goTopBtn.classList.remove("active");
  }

});





function updateYear() {
    var currentYear = new Date().getFullYear();
    var yearSpan = document.getElementById("showyear");
    yearSpan.textContent = "Revive, "+ currentYear;
    };
    updateYear();





//AUDIO


document.addEventListener("DOMContentLoaded", function() {
    // Get references to the image and audio elements
    const playButton = document.getElementById("play-song");
    const playButton1 = document.getElementById("play-song1");
    const playButton2 = document.getElementById("play-song2");
    const playButton3 = document.getElementById("play-song3");
    const playButton4 = document.getElementById("play-song4");
    
    const Song = document.getElementById("song");
    const Song1 = document.getElementById("song1");
    const Song2 = document.getElementById("song2");
    const Song3 = document.getElementById("song3");
    const Song4 = document.getElementById("song4");

    // Function to play audio for 30 seconds
    function playAudioFor30Seconds(audio) {
      audio.play();
      setTimeout(function() {
          audio.pause();
      }, 30000);
    }


    // Add click event listener to the image
    playButton.addEventListener("click", function() {
        // Check if audio is paused or ended
        if (Song.paused || Song.ended) {
          playAudioFor30Seconds(Song); // Play the audio
        } else {
            Song.pause(); // Pause the audio
        }
    });

    // Add event listener to pause audio when it ends
    Song.addEventListener("ended", function() {
        Song.pause();
    });


    playButton1.addEventListener("click", function() {
        // Check if audio is paused or ended
        if (Song1.paused || Song1.ended) {
          playAudioFor30Seconds(Song1); // Play the audio
        } else {
            Song1.pause(); // Pause the audio
        }
    });

    // Add event listener to pause audio when it ends
    Song1.addEventListener("ended", function() {
        Song1.pause();
    });


    playButton2.addEventListener("click", function() {
        // Check if audio is paused or ended
        if (Song2.paused || Song2.ended) {
          playAudioFor30Seconds(Song2); // Play the audio
        } else {
            Song2.pause(); // Pause the audio
        }
    });

    // Add event listener to pause audio when it ends
    Song2.addEventListener("ended", function() {
        Song2.pause();
    });


    playButton3.addEventListener("click", function() {
        // Check if audio is paused or ended
        if (Song3.paused || Song3.ended) {
          playAudioFor30Seconds(Song3); // Play the audio
        } else {
            Song3.pause(); // Pause the audio
        }
    });

    // Add event listener to pause audio when it ends
    Song3.addEventListener("ended", function() {
        Song3.pause();
    });


    playButton4.addEventListener("click", function() {
        // Check if audio is paused or ended
        if (Song4.paused || Song4.ended) {
          playAudioFor30Seconds(Song4); // Play the audio
        } else {
            Song4.pause(); // Pause the audio
        }
    });

    // Add event listener to pause audio when it ends
    Song4.addEventListener("ended", function() {
        Song4.pause();
    });
});    





//FAQ//
var acc = document.getElementsByClassName("accordion");
var i;
var len = acc.length;
for (i = 0; i < len; i=i+1) {
  acc[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
 }

 var acc2 = document.getElementsByClassName("accordion2");
var i;
var len2 = acc2.length;
for (i = 0; i < len2; i=i+1) {
  acc2[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
 }





   