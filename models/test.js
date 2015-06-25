
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '450',
        width: '800',
        videoId: '' + videoList.video[0].src +'',
        playerVars: {
            'showinfo': 0,
            'controls': 0,
            'modestbranding': 1
        },
        events: {
          'onStateChange': onPlayerStateChange
        }
    });
}


var videoList;
var playlistLoader = new JSONLoader();
playlistLoader.load('models/video.php', function(data) {
    videoList = data;
    init();

});

var playlist = document.getElementById('playlist');
var playlistButtons = document.getElementsByClassName('playlistButtons');


var playButton = document.getElementById('playButton');
var fullscreenButton = document.getElementById('fullscreenButton');
var volumeButton = document.getElementById('volumeButton');
var next = document.getElementById('nextButton');  
var previous = document.getElementById('previousButton');
var progressBar = document.getElementById('progressBar');
var progress = document.getElementById('progress');
var volumeSlider = document.getElementById('volumeSlider');
var currentVideo = 0;


function onPlayerStateChange(event) {
    state = player.getPlayerState();
    if (state == 0) {
      if(currentVideo < videoList.video.length-1){
        currentVideo ++;
        player.loadVideoById(videoList.video[currentVideo].src);
        player.playVideo();
      }
    }
    if (state == 1) {
      setCurrentVolume();
      playButton.innerHTML = '<i class="fa fa-pause">';
      var interval = setInterval(function() {
        setProgress();
      }, 100);
    }
    else {
      playButton.innerHTML = '<i class="fa fa-play">';
      clearInterval(interval);
    }
}
function setProgress()
{
  time = player.getCurrentTime();
  duration = player.getDuration();
  calc = time/duration * 100;
  progress.style.width =  time/duration*100 + '%';
}
function progressbarVideo(e)
{
  mouseX = e.clientX - progress.offsetLeft;
  calcX = mouseX/progressBar.offsetWidth*100;

  timeToSet = calcX/100*player.getDuration(); 

  player.seekTo(timeToSet, true);
  setProgress();
}
function setCurrentVolume(){
  currentVolume = player.getVolume();

  volumeSlider.value = currentVolume;
}
function setVolume(){
  volumeToSet = volumeSlider.value;

  player.setVolume(volumeToSet);
}

function makePlaylist()
{
  for(i = 0;i<videoList.video.length; i++)
  {
    playlist.innerHTML = playlist.innerHTML + '<a class="playlistButtons" id="' + i + '" href="' + videoList.video[i].src + '"><img class="playlistImages" src="http://img.youtube.com/vi/' + videoList.video[i].src + '/hqdefault.jpg"><h3>' + videoList.video[i].title + '</h3></a>';
  }
  for(var i=0;i<playlistButtons.length;i++){
        playlistButtons[i].addEventListener('click', function(e){ e.preventDefault(); goToVideo(this); });
    }
}
function goToVideo(e)
{
  var attribute = e.getAttribute('href');
  var toCVideo = e.getAttribute('id');
  //player.setAttribute("src", this.videoList.video[attribute].src); 
  currentVideo = toCVideo; 
  player.loadVideoById(attribute);
  console.log(currentVideo);
}


function init(){
  makePlaylist();

  volumeSlider.addEventListener('mousemove', function(){ setVolume(); })
  progressBar.addEventListener('click', function(e){ progressbarVideo(e); });
  volumeButton.addEventListener('click', function(){
    isMute = player.isMuted();
    if(isMute == true){
      player.unMute();
      volumeButton.innerHTML = '<i class="fa fa-volume-up">';
    }
    if(isMute == false){
      player.mute();
      volumeButton.innerHTML = '<i class="fa fa-volume-off">';

    }
  });
  nextButton.addEventListener('click', function(){
    if(currentVideo < videoList.video.length-1){
      currentVideo++;
      player.loadVideoById(videoList.video[currentVideo].src);
    }
  });
  previousButton.addEventListener('click', function(){
    if(currentVideo > 0){
      currentVideo--;
      player.loadVideoById(videoList.video[currentVideo].src);
    }
  });
  playButton.addEventListener('click', function() {
    if (player.getPlayerState() != 1) {
        player.playVideo();
    } else {
        player.pauseVideo();
    }

});
}