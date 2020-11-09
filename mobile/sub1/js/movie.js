var video

function changeVideo(linkBtn){
	video=document.getElementById('testVideo');
	video.src=linkBtn.href;
    video.load();
	video.type='video/mp4';
	video.play();
    return false;
}