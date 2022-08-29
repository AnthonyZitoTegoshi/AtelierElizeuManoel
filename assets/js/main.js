window.addEventListener("load", function () {
    adjustMainRetractableMenu();
    setRetractorsListeners();
    adjustRetractableMenus();
    setHoverLineBottom();
    window.document.getElementById("loading-screen").style.display = "none";
});

window.addEventListener("resize", function () {
    adjustMainRetractableMenu();
    setRetractorsListeners();
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
        retractor.onclick = function (event) {
            var retracted = window.document.getElementById(this.getAttribute("data-toggle"))
            if (window.getComputedStyle(retracted).display == "none") {
                retracted.style.display = "";
                if (retracted.id == "retracted-main-menu-lsm") {
                    retracted.animate([
                        {right: "-" + retracted.clientWidth + "px"},
                        {right:  "0px"}
                    ], 100, 1);
                } else if (retracted.id == "retracted-main-menu-lmd") {
                    retracted.animate([
                        {height: "0px"},
                        {height:  retracted.clientHeight + "px"}
                    ], 100, 1);
                }
                if (this.getAttribute("data-alternate") == "true") {
                    this.children[0].style.display = "none";
                    this.children[1].style.display = "";
                }
            } else {
                if (retracted.id == "retracted-main-menu-lsm") {
                    retracted.animate([
                        {right:  "0px"},
                        {right: "-" + retracted.clientWidth + "px"}
                    ], 100, 1);
                    window.setTimeout(function () {
                        retracted.style.display = "none";
                    }, 100);
                } else if (retracted.id == "retracted-main-menu-lmd") {
                    retracted.animate([
                        {height: retracted.clientHeight + "px"},
                        {height:  "0px"}
                    ], 100, 1);
                    window.setTimeout(function () {
                        retracted.style.display = "none";
                    }, 100);
                } else {
                    retracted.style.display = "none";
                }
                if (this.getAttribute("data-alternate") == "true") {
                    this.children[0].style.display = "";
                    this.children[1].style.display = "none";
                }
            }
            event.stopPropagation ? event.stopPropagation() : event.cancelBubble = true;
        };
    }
    window.document.body.onclick = function () {
        for (var i = 0; i < retractors.length; i++) {
            var retractor = retractors[i];
            var retracted = window.document.getElementById(retractor.getAttribute("data-toggle"));
            if (retracted.id == "retracted-main-menu-lsm") {
                retracted.animate([
                    {right:  "0px"},
                    {right: "-" + retracted.clientWidth + "px"}
                ], 100, 1);
                window.setTimeout(function () {
                    retracted.style.display = "none";
                }, 100);
            } else if (retracted.id == "retracted-main-menu-lmd") {
                retracted.animate([
                    {height: retracted.clientHeight + "px"},
                    {height:  "0px"}
                ], 100, 1);
                window.setTimeout(function () {
                    retracted.style.display = "none";
                }, 100);
            } else {
                retracted.style.display = "none";
            }
            if (retractor.getAttribute("data-alternate") == "true") {
                retractor.children[0].style.display = "";
                retractor.children[1].style.display = "none";
            }
        }
    };
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
            var retracted = window.document.getElementById(retractableMenuRetractor.getAttribute("data-toggle"));
            if (retracted.id == "retracted-main-menu-lsm") {
                retracted.animate([
                    {right:  "0px"},
                    {right: "-" + retracted.clientWidth + "px"}
                ], 100, 1);
                window.setTimeout(function () {
                    retracted.style.display = "none";
                }, 100);
            } else if (retracted.id == "retracted-main-menu-lmd") {
                retracted.animate([
                    {height: retracted.clientHeight + "px"},
                    {height:  "0px"}
                ], 100, 1);
                window.setTimeout(function () {
                    retracted.style.display = "none";
                }, 100);
            } else {
                retracted.style.display = "none";
            }
            if (retractableMenuRetractor.getAttribute("data-alternate") == "true") {
                retractableMenuRetractor.children[0].style.display = "";
                retractableMenuRetractor.children[1].style.display = "none";
            }
        }
    }
}

function adjustMainRetractableMenu() {
    var mainMenuRetractors = window.document.getElementById("main-menu").getElementsByClassName("retractable-menu-retractor");
    var mainMenuToggle = mainMenuRetractors[0].getAttribute("data-toggle");
    if (window.innerWidth >= 700) {
        mainMenuToggle = mainMenuToggle.substring(0, mainMenuToggle.length - 3) + "lmd";
    } else {
        mainMenuToggle = mainMenuToggle.substring(0, mainMenuToggle.length - 3) + "lsm";
    }
    for (var i = 0; i < mainMenuRetractors.length; i++) {
        mainMenuRetractors[i].setAttribute("data-toggle", mainMenuToggle);
    }
}

function setHoverLineBottom() {
    var elements = window.document.getElementsByClassName("hover-line-bottom");
    for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        element.onmouseover = function () {
            var child = window.document.createElement("span");
            child.className = "hover-line-bottom-span";
            this.appendChild(child);
            child.animate([
                {width: "0px"},
                {width: child.clientWidth + "px"}
            ], 100, 1);
        };
        element.onmouseout = function () {
            var target = this.getBoundingClientRect();
            var child = this.getElementsByClassName("hover-line-bottom-span")[0];
            child.animate([
                {width: child.clientWidth + "px"},
                {width: "0px"}
            ], 100, 1);
            window.setTimeout(function (element) {
                element.removeChild(element.getElementsByClassName("hover-line-bottom-span")[0]);
            }, 100, this);
        };
    }
}