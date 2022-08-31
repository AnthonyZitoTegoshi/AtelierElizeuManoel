window.addEventListener("load", function () {
    setRetractorsListeners();
    adjustRetractableMenus();
    window.document.getElementById("loading-screen").style.display = "none";
});

window.addEventListener("resize", function () {
    adjustRetractableMenus();
});

function setRetractorsListeners() {
    var retractors = window.document.getElementsByClassName("retractable-menu-retractor");
    for (var i = 0; i < retractors.length; i++) {
        var retractor = retractors[i];
        var retracted = window.document.getElementById(retractor.getAttribute("data-toggle"));
        retractor.style.cursor = "pointer";
        retracted.style.display = "none";
        if (retractor.getAttribute("data-alternate") == "true") {
            retractor.children[0].style.display = "";
            retractor.children[1].style.display = "none";
        }
        retractor.addEventListener("click", function (event) {
            if (window.getComputedStyle(retracted).display == "none") {
                retracted.style.display = "";
                if (retractor.getAttribute("data-alternate") == "true") {
                    retractor.children[0].style.display = "none";
                    retractor.children[1].style.display = "";
                }
            } else {
                retracted.style.display = "none";
                if (retractor.getAttribute("data-alternate") == "true") {
                    retractor.children[0].style.display = "";
                    retractor.children[1].style.display = "none";
                }
            }
            event.stopPropagation ? event.stopPropagation() : event.cancelBubble = true;
        });
        window.document.body.addEventListener("click", function () {
            retracted.style.display = "none";
            if (retractor.getAttribute("data-alternate") == "true") {
                retractor.children[0].style.display = "";
                retractor.children[1].style.display = "none";
            }
        });
    }
}

function adjustRetractableMenus() {
    var retractableMenus = window.document.getElementsByClassName("retractable-menu");
    for (var i = 0; i < retractableMenus.length; i++) {
        var retractableMenu = retractableMenus[i];
        var retractableMenuOptions = retractableMenu.getElementsByClassName("retractable-menu-option");
        var retractableMenuRetractor = retractableMenu.getElementsByClassName("retractable-menu-retractor")[0];

        retractableMenuRetractor.style.display = "none";
        for (var j = 0; j < retractableMenuOptions.length; j++) {
            retractableMenuOptions[j].style.display = "";
        }

        var maxWidth = retractableMenu.offsetWidth;
        var currentWidth = 0;
        for (var j = 0; j < retractableMenuOptions.length; j++) {
            currentWidth += retractableMenuOptions[j].offsetWidth;
        }

        if (currentWidth > maxWidth) {
            retractableMenuRetractor.style.display = "";
            for (var j = 0; j < retractableMenuOptions.length; j++) {
                retractableMenuOptions[j].style.display = "none";
            }
        } else {
            window.document.getElementById(retractableMenuRetractor.getAttribute("data-toggle")).style.display = "none";
            if (retractableMenuRetractor.getAttribute("data-alternate") == "true") {
                retractableMenuRetractor.children[0].style.display = "";
                retractableMenuRetractor.children[1].style.display = "none";
            }
        }
    }
}


/* ----------Fade effect with ScrollBar---------- */


function viewElement(element) { 
    let elementContainer = element.getBoundingClientRect();
    distFromTop = -200
    windowHSize = window.innerHeight;

    if (elementContainer.top - window.innerHeight < distFromTop ) {
        return true;
    }
    else{
        return false;
    }
}

function scanContent () {
    hiddenElement = document.querySelectorAll('.hidden')
    for (let i = 0; i < hiddenElement.length; i++) {
        const hiddenList = hiddenElement[i];
        if (viewElement(hiddenList)) {
            hiddenList.classList.remove('hidden')
        } 
        
    }
}


function timeToExcecute ( myFunc, timeWait) {
    nowTime = Date.now();
    return function () {
        if ((nowTime + timeWait - Date.now()) < 0 ) {
            myFunc();
            nowTime = Date.now();
        }
    }
    
}

document.addEventListener("scroll", timeToExcecute(scanContent, 1200));
