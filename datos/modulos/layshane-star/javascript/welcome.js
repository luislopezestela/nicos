function Wo_ResendCode() {
    var e = document.getElementById("confirm-user-id").value;
    var n = document.getElementById("phone-num").value;

    document.getElementById("re-send").style.display = "none";
    Wo_SetTimer();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", Wo_Ajax_Requests_File() + "?f=resned_code", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 200) {
                    alert("Code resent successfully.");
                } else {
                    alert(response.errors);
                }
            }
        }
    };
    xhr.send("user_id=" + e + "&phone_number=" + n);
}

function Wo_SetTimer() {
    var span = document.querySelector("#hideMsg h2 span");
    span.textContent = "60";
    document.getElementById("hideMsg").style.display = "block";
    
    var e = parseInt(span.textContent);
    var n = setInterval(function() {
        span.textContent = --e;
        if (e === 0) {
            clearInterval(n);
            document.getElementById("hideMsg").style.display = "none";
            document.getElementById("re-send").style.display = "block";
        }
    }, 1000);
}

var current_width = window.innerWidth;
window.onload = function() {
    if (current_width > 920) {
        setTimeout(function() {
            var images = document.querySelectorAll(".image");
            images.forEach(function(image) {
                animateUsers(image, "bounce");
            });
        }, 500);
    }
};

function animateUsers(element, effect) {
    element.style.opacity = 1;
    var startWidth = element.offsetWidth / 2;
    var startHeight = element.offsetHeight / 2;
    var startTime = Date.now();

    function step() {
        var timeElapsed = Date.now() - startTime;
        var progress = Math.min(timeElapsed / 800, 1); // 800ms duration
        var width = startWidth * (1 - progress);
        var height = startHeight * (1 - progress);
        element.style.width = width + "px";
        element.style.height = height + "px";
        if (progress < 1) {
            requestAnimationFrame(step);
        }
    }

    requestAnimationFrame(step);
}
