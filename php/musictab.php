
<?php
session_start();
require_once "../partials/dashboard_header.php";
require_once "../classes/Music.php";
require_once "../classes/User.php";
require_once "../classes/Db.php";


$user_id=$_SESSION['useronline'];
$music = new Music();

//$liked = $music->get_liked_music();


$playlistNames = [
    "Soothing Nature Sounds",
    "Sleep Sounds",
    "Wind Down(jazz)",
    "Peaceful Meditation",
    "Infinite Piano Acoustics"
];

$playlists = [];

foreach ($playlistNames as $playlistName) {
    $playlists[$playlistName] = $music->get_playlist_tracks($playlistName);
}
?>


<style>
   button{
      background:transparent;
   }
   .outline-heart{
      color:#fff;
   }
   .fill-heart{
      color:#e02323;
   }
   .card__img {
   border-radius: 1rem;
   width:170px!important;
   height: 240px!important;
   }
   .card__link {
   position: relative;
   display: grid;
   place-items: center;
   color: var(--white-color);
   height:240px;
   }
   .card__like {
  position: absolute;
  top: .75rem;
  right: 0.85rem;
  font-size: 1.25rem;
  cursor: pointer;
    }
  
   .music__data {
   position: absolute;
   bottom:0.9rem;
   text-align: center;
   padding-inline: .20rem;
   background:rgba(255, 255, 255, 0.858);
   border-radius: 0.25rem;
   }

   .music__name {
   font-size: 14px;
   color:rgb(86, 74, 62);
   }

   .music__category {
   font-size: 11px;
   color:black;
   font-style: italic;
   }

   @media (max-width:580px){
   .card__img {
   border-radius: 1rem;
   width:180px;
   height: 230px;
   }
   .card__article {
    width: 150.5px!important;
    margin-right: 18px;
   }
   }
   @media (min-width: 968px) {
  .card__img {
    border-radius: 1rem;
    width:215px;
    }
    .card__article {
    width: 160.5px!important;
    margin-right: 18px;
   }
   }
</style>


      <main class="main">
       

         <!----- MUSIC TAB STARTS HERE ----->
        
               <section class="music" id="main2">
                  <!-- <div class="tab__content tab__content--active" data-tab="4"> -->
                  <div class="tab__content tab__content--active playlists" data-tab="6">

                     <!--playlist1-->
                  <h3 class="card__title2">Wind Down(Jazz)</h3>
      
                  <div class="movie__swiper swiper">
                     <div class="swiper-wrapper">

                                  <?php
                                    foreach ($playlists["Wind Down(jazz)"]as $track){ 
                                       $imageFile = "../admin/uploads/imageupload/{$track['track_image']}";
                                       $audioFile = "../admin/uploads/audioupload/{$track['track_audio']}";
                                 ?>   

                           <article class="card__article swiper-slide" data-img-src="<?php echo $imageFile; ?>" data-title="<?php echo $track['track_name']; ?>" data-artist="<?php echo $track['track_artist']; ?>" data-audio-src="<?php echo $audioFile; ?>">

                              <a href="#?id=<?php echo $track['track_id']; ?>" class="card__link">

                              <img src="<?php echo $imageFile; ?>" alt="image" class="card__img img2">
                              <audio src="<?php echo $audioFile; ?>" type="audio/mp3" controls id="audioPlayer" hidden></audio>

                              <div class="card__shadow"></div>
                              
                              <button class="mplay playButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-play-circle-line play-btn"></i></button>
                        <button class="mplay pauseButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-pause-circle-line pause-btn" style="display:none;"></i>
                     </button>
                                 <div class="music__data">
                                    <h3 class="music__name"><?php echo $track['track_name'];?></h3>
                                    <span class="music__category"><?php echo $track['track_artist'];?></span>
                                 </div> 
                              </a>

                             <form action='../process/process_like.php' method='post' style='display:inline;' data-track-id="<?php echo $track['track_id']; ?>">
                             <input type='hidden' name='track_id' value='<?php echo $track['track_id'];?>'/>

                           <button type="submit">
                              <i class="ri-heart-3-line card__like outline-heart"></i>
                              <i class="ri-heart-3-fill card__like fill-heart" style="display: none;"></i>
                           </button>
                             </form>

                           </article>
                            <?php
                             } ?>
                        </div></div>



                     <!--playlist 2-->
                     <h3 class="card__title2">Soothing Nature Sounds</h3>
      
                     <div class="movie__swiper swiper">
                        <div class="swiper-wrapper">
                              
                                       <?php
                                       foreach ($playlists["Soothing Nature Sounds"] as $track){ 
                                          $imageFile = "../admin/uploads/imageupload/{$track['track_image']}";
                                          $audioFile = "../admin/uploads/audioupload/{$track['track_audio']}";
                                    ?>   
   
                              <article class="card__article swiper-slide" data-img-src="<?php echo $imageFile; ?>" data-title="<?php echo $track['track_name']; ?>" data-artist="<?php echo $track['track_artist']; ?>" data-audio-src="<?php echo $audioFile; ?>">
   
                                 <a href="#" class="card__link">

                              <img src="<?php echo $imageFile; ?>" alt="image" class="card__img img2">
                              <audio src="<?php echo $audioFile; ?>" type="audio/mp3" controls id="audioPlayer" hidden></audio>

                              <div class="card__shadow"></div>
                              
                              <button class="mplay playButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-play-circle-line play-btn"></i></button>
                        <button class="mplay pauseButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-pause-circle-line pause-btn" style="display:none;"></i>
                     </button>
   
                                 <div class="music__data">
                                    <h3 class="music__name"><?php echo $track['track_name'];?></h3>
                                    <span class="music__category"><?php echo $track['track_artist'];?></span>
                                 </div> 
                              </a>
                              <button>
                              <i class="ri-heart-3-line card__like outline-heart"></i>
                                 <i class="ri-heart-3-fill card__like fill-heart" style="display: none;"></i>
                              </button>
                           </article>
                            <?php
                               } ?>
                        </div></div>



                        <!--playlist 3-->
                     <h3 class="card__title2">Infinite Piano Acoustics</h3>
      
                     <div class="movie__swiper swiper">
                        <div class="swiper-wrapper">
                        
                        <?php
                                    foreach ($playlists["Infinite Piano Acoustics"] as $track){ 
                                       $imageFile = "../admin/uploads/imageupload/{$track['track_image']}";
                                       $audioFile = "../admin/uploads/audioupload/{$track['track_audio']}";
                                 ?>   

                           <article class="card__article swiper-slide" data-img-src="<?php echo $imageFile; ?>" data-title="<?php echo $track['track_name']; ?>" data-artist="<?php echo $track['track_artist']; ?>" data-audio-src="<?php echo $audioFile; ?>">

                              <a href="#" class="card__link">

               <img src="<?php echo $imageFile; ?>" alt="image" class="card__img img2">
               <audio src="<?php echo $audioFile; ?>" type="audio/mp3" controls id="audioPlayer" hidden></audio>

               <div class="card__shadow"></div>
               
               <button class="mplay playButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-play-circle-line play-btn"></i></button>
                        <button class="mplay pauseButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-pause-circle-line pause-btn" style="display:none;"></i>
                     </button>

                  <div class="music__data">
                     <h3 class="music__name"><?php echo $track['track_name'];?></h3>
                     <span class="music__category"><?php echo $track['track_artist'];?></span>
                  </div> 
               </a>
               <button>
               <i class="ri-heart-3-line card__like outline-heart"></i>
                    <i class="ri-heart-3-fill card__like fill-heart" style="display: none;"></i>
               </button>
            </article>
             <?php
                } ?>
         </div></div>




                           <!--playlist 4-->
                     <h3 class="card__title2">Sleep Sounds</h3>
      
               <div class="movie__swiper swiper">
               <div class="swiper-wrapper">
                              <?php
                                    foreach ($playlists["Sleep Sounds"] as $track){ 
                                       $imageFile = "../admin/uploads/imageupload/{$track['track_image']}";
                                       $audioFile = "../admin/uploads/audioupload/{$track['track_audio']}";
                                 ?>   

                           <article class="card__article swiper-slide" data-img-src="<?php echo $imageFile; ?>" data-title="<?php echo $track['track_name']; ?>" data-artist="<?php echo $track['track_artist']; ?>" data-audio-src="<?php echo $audioFile; ?>">

                              <a href="#" class="card__link">

               <img src="<?php echo $imageFile; ?>" alt="image" class="card__img img2">
               <audio src="<?php echo $audioFile; ?>" type="audio/mp3" controls id="audioPlayer" hidden></audio>

               <div class="card__shadow"></div>
               
               <button class="mplay playButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-play-circle-line play-btn"></i></button>
                        <button class="mplay pauseButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-pause-circle-line pause-btn" style="display:none;"></i>
                     </button>

                  <div class="music__data">
                     <h3 class="music__name"><?php echo $track['track_name'];?></h3>
                     <span class="music__category"><?php echo $track['track_artist'];?></span>
                  </div> 
               </a>
               <button>
               <i class="ri-heart-3-line card__like outline-heart"></i>
                    <i class="ri-heart-3-fill card__like fill-heart" style="display: none;"></i>
               </button>
            </article>
             <?php
                } ?>
         </div></div>




                        <!--playlist 5-->
                     <h3 class="card__title2">Peaceful Meditation</h3>
      
                     <div class="movie__swiper swiper"  style="margin-bottom:2rem;">
                        <div class="swiper-wrapper">
   
                              <?php
                                    foreach ($playlists["Peaceful Meditation"] as $track){ 
                                       $imageFile = "../admin/uploads/imageupload/{$track['track_image']}";
                                       $audioFile = "../admin/uploads/audioupload/{$track['track_audio']}";
                                 ?>   

                           <article class="card__article swiper-slide" data-img-src="<?php echo $imageFile; ?>" data-title="<?php echo $track['track_name']; ?>" data-artist="<?php echo $track['track_artist']; ?>" data-audio-src="<?php echo $audioFile; ?>">

                              <a href="#" class="card__link">

               <img src="<?php echo $imageFile; ?>" alt="image" class="card__img img2">
               <audio src="<?php echo $audioFile; ?>" type="audio/mp3" controls id="audioPlayer" hidden></audio>

               <div class="card__shadow"></div>
               
               <button class="mplay playButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-play-circle-line play-btn"></i></button>
                        <button class="mplay pauseButton" data-track-id="<?php echo $track['track_id']; ?>">
                        <i class="ri-pause-circle-line pause-btn" style="display:none;"></i>
                     </button>
                  
                  <div class="music__data">
                     <h3 class="music__name"><?php echo $track['track_name'];?></h3>
                     <span class="music__category"><?php echo $track['track_artist'];?></span>
                  </div> 
               </a>
               <button>
               <i class="ri-heart-3-line card__like outline-heart"></i>
                    <i class="ri-heart-3-fill card__like fill-heart" style="display: none;"></i>
               </button>
            </article>
             <?php
                } ?>
                
              
         </div></div>





             <!-- downplayer -->
             <div class="down_play">
               <div class="dimg">
                   <img src="<?php echo $imageFile; ?>" alt="" id="display-img" class="" >
                   <div class="disk">
                       <p id="inplay-title" ><?php echo $track['track_name']?></p>
                       <span id="inplay-description"><?php echo $track['track_artist']?></span>
                   </div>
               </div>
               <div class="ctrls-1">
                   <div class="mx-1">
                       <button class="nnt" id="prev-btn"><i class="fa fa-step-backward"></i></button>
                   </div>
                   <div class="mx-1">
                       <button class="" id="play-btn" data-value="play"><i class="fa fa-play"></i></button>
                   </div>
                   <div class="mx-1">
                       <button class="" id="stop-btn"><i class="fa fa-stop"></i></button>
                   </div>
                   <div class="mx-1">
                       <button class="nnt" id="next-btn"><i class="fa fa-step-forward"></i></button>
                   </div>
               </div>
               <div class="rnager_">
                   <div class="currentTime">
                       <small id="currentTime">--:--</small>
                       <small>/</small>
                       <small class="text-muted" id="inplay-duration">00:00</small>
                   </div>
                   <div id="range-holder" class="mx-1">
                       <input type="range" id="playBackSlider" value="0" class="ranger_123">
                   </div>
                   <div class="mx-1">
                       <span id="vol-icon"><i class="fa fa-volume-up"></i></span> <input type="range" value="100" id="volume">
                   </div>
               </div>
        </div>
       </div>
            
         </section>
         <!----- MUSIC TAB ENDS HERE ----->

         </div>
</main>





<script src="../assets/dashboard/assets/js/swiper-bundle.min.js"></script>
<script src="../assets/dashboard/assets/js/main.js"></script>
<script src="../assets/font-awesome/js/all.min.js"></script>
<script>
 document.addEventListener("DOMContentLoaded", () => {
    const playButtons = document.querySelectorAll('.playButton');
    const pauseButtons = document.querySelectorAll('.pauseButton');
    const downPlayer = {
        img: document.getElementById('display-img'),
        title: document.getElementById('inplay-title'),
        description: document.getElementById('inplay-description'),
        audio: new Audio(),
        playBtn: document.getElementById('play-btn'),
        prevBtn: document.getElementById('prev-btn'),
        nextBtn: document.getElementById('next-btn'),
        stopBtn: document.getElementById('stop-btn'),
        currentTimeDisplay: document.getElementById('currentTime'),
        durationDisplay: document.getElementById('inplay-duration'),
        playbackSlider: document.getElementById('playBackSlider'),
        volumeControl: document.getElementById('volume')
    };

    let currentTrackIndex = 0;
    let tracks = [];

    // Gather all track data into an array
    playButtons.forEach((button, index) => {
        const card = button.closest('.card__article');
        tracks.push({
            imgSrc: card.getAttribute('data-img-src'),
            title: card.getAttribute('data-title'),
            artist: card.getAttribute('data-artist'),
            audioSrc: card.getAttribute('data-audio-src'),
            playButton: button,
            pauseButton: card.querySelector('.pauseButton')
        });
    });

    // Event listener for each play button
    playButtons.forEach((button, index) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const track = tracks[index];
            currentTrackIndex = index;
            updateDownPlayer(track.imgSrc, track.title, track.artist, track.audioSrc);
            playAudio(track.audioSrc);
            togglePlayPauseButtons(track.playButton, true);
        });
    });

    // Event listener for each pause button
    pauseButtons.forEach((button, index) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const track = tracks[index];
            downPlayer.audio.pause();
            togglePlayPauseButtons(track.playButton, false);
        });
    });

    // Play/Pause button functionality
    downPlayer.playBtn.addEventListener('click', () => {
        if (downPlayer.audio.paused) {
            downPlayer.audio.play();
            downPlayer.playBtn.innerHTML = '<i class="fa fa-pause"></i>';
           togglePlayPauseButtons(tracks[currentTrackIndex].playButton, tracks[currentTrackIndex].pauseButton, true);
        } else {
            downPlayer.audio.pause();
            downPlayer.playBtn.innerHTML = '<i class="fa fa-play"></i>';
           togglePlayPauseButtons(tracks[currentTrackIndex].playButton, tracks[currentTrackIndex].pauseButton, false);
        }
    });

    // Update the play/pause button state based on audio playback
    downPlayer.audio.addEventListener('play', () => {
        downPlayer.playBtn.innerHTML = '<i class="fa fa-pause"></i>';
    });

    downPlayer.audio.addEventListener('pause', () => {
        downPlayer.playBtn.innerHTML = '<i class="fa fa-play"></i>';
    });

    // Previous track button functionality
    downPlayer.prevBtn.addEventListener('click', () => {
        if (currentTrackIndex > 0) {
            currentTrackIndex--;
            const track = tracks[currentTrackIndex];
            updateDownPlayer(track.imgSrc, track.title, track.artist, track.audioSrc);
            playAudio(track.audioSrc);
           togglePlayPauseButtons(track.playButton, track.pauseButton, true);
        }
    });

    // Next track button functionality
    downPlayer.nextBtn.addEventListener('click', () => {
        if (currentTrackIndex < tracks.length - 1) {
            currentTrackIndex++;
            const track = tracks[currentTrackIndex];
            updateDownPlayer(track.imgSrc, track.title, track.artist, track.audioSrc);
            playAudio(track.audioSrc);
            togglePlayPauseButtons(track.playButton, track.pauseButton, true);
        }
    });


    // Stop button functionality
    downPlayer.stopBtn.addEventListener('click', () => {
        downPlayer.audio.pause();
        downPlayer.audio.currentTime = 0;
        downPlayer.playBtn.innerHTML = '<i class="fa fa-play"></i>';
       togglePlayPauseButtons(tracks[currentTrackIndex].playButton, tracks[currentTrackIndex].pauseButton, false);
    });


 // Automatically play the next track when the current one ends
    downPlayer.audio.addEventListener('ended', () => {
        if (currentTrackIndex < tracks.length - 1) {
            currentTrackIndex++;
            const track = tracks[currentTrackIndex];
            updateDownPlayer(track.imgSrc, track.title, track.artist, track.audioSrc);
            playAudio(track.audioSrc);
            togglePlayPauseButtons(track.playButton, true);
        } else {
            downPlayer.audio.currentTime = 0;
            downPlayer.playBtn.innerHTML = '<i class="fa fa-play"></i>';
            togglePlayPauseButtons(tracks[currentTrackIndex].playButton, false);
        }
    });


    // Update the current time and duration of the track
    downPlayer.audio.addEventListener('timeupdate', () => {
        downPlayer.currentTimeDisplay.textContent = formatTime(downPlayer.audio.currentTime);
        downPlayer.durationDisplay.textContent = formatTime(downPlayer.audio.duration);
        downPlayer.playbackSlider.value = (downPlayer.audio.currentTime / downPlayer.audio.duration) * 100;
    });

    // Seek functionality
    downPlayer.playbackSlider.addEventListener('input', () => {
        downPlayer.audio.currentTime = (downPlayer.playbackSlider.value / 100) * downPlayer.audio.duration;
    });

    // Volume control functionality
    downPlayer.volumeControl.addEventListener('input', () => {
        downPlayer.audio.volume = downPlayer.volumeControl.value / 100;
    });

    // Function to update the downplayer UI
    function updateDownPlayer(imgSrc, title, artist, audioSrc) {
        downPlayer.img.src = imgSrc;
        downPlayer.title.textContent = title;
        downPlayer.description.textContent = artist;
    }

    // Function to play audio
    function playAudio(audioSrc) {
        downPlayer.audio.src = audioSrc;
        downPlayer.audio.play();
       // downPlayer.playBtn.innerHTML = '<i class="fa fa-pause"></i>';
    }

    // Function to format time in mm:ss
    function formatTime(time) {
        const minutes = Math.floor(time / 60);
        const seconds = Math.floor(time % 60);
        return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }
    });
</script>
<script>
   document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.card__article').forEach(article => {
        const likeForm = article.querySelector('form');
        const likeButton = article.querySelector('form button');
        const outlineHeart = likeButton.querySelector('.outline-heart');
        const fillHeart = likeButton.querySelector('.fill-heart');

        likeForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const trackId = likeForm.querySelector('input[name="track_id"]').value;
            const action = outlineHeart.style.display === 'none' ? 'unlike' : 'like';

            console.log('Sending data:', { track_id: trackId, action: action });  // Debug: Log data being sent

            fetch('../process/process_like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    track_id: trackId,
                    action: action
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);  // Debug: Check the response
                if (data.status === 'success') {
                    if (data.action === 'like') {
                        outlineHeart.style.display = 'none';
                        fillHeart.style.display = 'inline';
                    } else if (data.action === 'unlike') {
                        outlineHeart.style.display = 'inline';
                        fillHeart.style.display = 'none';
                    }
                } else {
                    alert('An error occurred.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>

   </body>
</html>