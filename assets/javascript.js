var toggle_state = 1;
document.getElementById('header-toggle').addEventListener('click', function(){
    if(toggle_state == 1){
        document.getElementById('nav-bottom').style.display = "block";
        toggle_state = 0;
    }else if(toggle_state == 0){
        document.getElementById('nav-bottom').style.display = "none";
        toggle_state = 1;
    }
});

function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}