document.getElementById("loading").style.display = "none";
document.getElementById("loading-title").style.display = "none";

//toggle infos
var infosButton = document.getElementById("info");
var infos = document.getElementById("infos-window");
infos.style.display = "flex";

infosButton.onclick = function(){
    if(infos.style.display === "none"){
        infos.style.display = "flex";
    }else{
        infos.style.display = "none";
    }
}

//close infos
var closeButton = document.getElementById("infos-close");

closeButton.onclick = function(){
    if(infos.style.display === "none"){
        infos.style.display = "flex";
    }else{
        infos.style.display = "none";
    }
}

//toggle fullscreen
var fullscreenButton = document.getElementById("fullscreen");

fullscreenButton.onclick = function () {

    var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
        (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
        (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
        (document.msFullscreenElement && document.msFullscreenElement !== null);

    var docElm = document.documentElement;
    if (!isInFullScreen) {
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
        } else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
        } else if (docElm.webkitRequestFullScreen) {
            docElm.webkitRequestFullScreen();
        } else if (docElm.msRequestFullscreen) {
            docElm.msRequestFullscreen();
        }
        fullscreenButton.src = fullscreenButton.src = "/img/exit-fullscreen.svg";
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
        fullscreenButton.src = fullscreenButton.src = "/img/fullscreen.svg";
    }

};

//Ctrl+Alt+Delete
/*var keyboardButton = document.getElementById("keyboard");
keyboardButton.onclick = function(){
    keyboard.press(17);
    keyboard.press(18);
    keyboard.press(46);
    keyboard.release(17);
    keyboard.release(18);
    keyboard.release(46);
}*/