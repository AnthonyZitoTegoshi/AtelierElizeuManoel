var lastLocationHref;
var lastScrollPosition, currentScrollPosition;
var scrollingDown;

window.addEventListener("load", function () {
    adjustMainRetractableMenu();
    setRetractorsListeners();
    adjustRetractableMenus();
    setHoverLineBottom();
    setCarousels();
    adjustCarousels();
    lastScrollPosition = currentScrollPosition = window.scrollY;
    window.document.getElementById("loading-screen").style.display = "none";
});

window.addEventListener("resize", function () {
    adjustMainRetractableMenu();
    setRetractorsListeners();
    adjustRetractableMenus();
    adjustCarousels();
});

window.addEventListener("scroll", function () {
    if (lastScrollPosition != null && currentScrollPosition != null) {
        var mainMenu = window.document.getElementById("main-menu");
        currentScrollPosition = window.scrollY;
        if (currentScrollPosition > lastScrollPosition) {
            if ((scrollingDown == false || scrollingDown == null) && window.getComputedStyle(mainMenu).top == "0px") {
                var retractedLsmStyle = window.getComputedStyle(window.document.getElementById("retracted-main-menu-lsm"));
                var retractedLmdStyle = window.getComputedStyle(window.document.getElementById("retracted-main-menu-lmd"));
                if (retractedLsmStyle.display != "none" && retractedLsmStyle.right == "0px" || retractedLmdStyle.display != "none" && retractedLmdStyle.height != "0px") {
                    mainMenu.getElementsByClassName("retractable-menu-retractor")[0].click();
                }
                mainMenu.style.top = "-" + mainMenu.getBoundingClientRect().height + "px";
                mainMenu.animate([
                    {top:  "0px"},
                    {top: "-" + mainMenu.getBoundingClientRect().height + "px"}
                ], 100, 1);
            }
            scrollingDown = true;
        } else {
            if ((scrollingDown == true || scrollingDown == null) && window.getComputedStyle(mainMenu).top != "0px") {
                mainMenu.style.top = "0px";
                mainMenu.animate([
                    {top: "-" + mainMenu.getBoundingClientRect().height + "px"},
                    {top:  "0px"}
                ], 100, 1);
            }
            scrollingDown = false;
        }
        lastScrollPosition = currentScrollPosition;
    }
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
                if (retracted.id == "retracted-main-menu-lsm" || retracted.id == "retracted-main-menu-lmd") {
                    var mainMenu = window.document.getElementById("main-menu");
                    if ((scrollingDown == true || scrollingDown == null) && window.getComputedStyle(mainMenu).top != "0px") {
                        mainMenu.style.top = "0px";
                        mainMenu.animate([
                            {top: "-" + mainMenu.getBoundingClientRect().height + "px"},
                            {top:  "0px"}
                        ], 100, 1);
                    }
                    scrollingDown = false;
                }
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

function setCarousels() {
    var carousels = window.document.getElementsByClassName("carousel");
    for (var i = 0; i < carousels.length; i++) {
        var carousel = carousels[i];
        var display = carousel.getElementsByClassName("carousel-display")[0];
        var items = display.getElementsByClassName("carousel-item");
        var currentItem = parseInt(display.getAttribute("data-focused-item"));
        for (var j = 0; j < items.length; j++) {
            var cards = items[j].getElementsByClassName("card");
            if (cards.length > 0) {
                if (j == currentItem) {
                    cards[0].style.borderColor = "var(--primary-lighter)";
                } else {
                    cards[0].style.borderColor = "";
                }
            }
        }
        display.style.overflow = "hidden";
        display.style.cursor = "grab";
        display.onscroll = function () {
            if (this.scrollLeft == 0) {
                this.parentElement.getElementsByClassName("carousel-previous-button")[0].style.boxShadow = "none";
            } else {
                this.parentElement.getElementsByClassName("carousel-previous-button")[0].style.boxShadow = "";
            }
            if (this.scrollLeft >= Math.floor(this.children[0].getBoundingClientRect().width - this.getBoundingClientRect().width)) {
                this.parentElement.getElementsByClassName("carousel-next-button")[0].style.boxShadow = "none";
            } else {
                this.parentElement.getElementsByClassName("carousel-next-button")[0].style.boxShadow = "";
            }
        };
        display.onmousedown = function () {
            this.style.cursor = "grabbing";
            this.style.userSelect = "none";
            this.onmousemove = function (event) {
                this.style.scrollBehavior = "auto";
                this.scroll(this.scrollLeft - event.movementX, 0);
                this.style.scrollBehavior = "";
            };
        };
        carousel.getElementsByClassName("carousel-previous-button")[0].addEventListener("click", function () {
            var display = this.parentElement.getElementsByClassName("carousel-display")[0];
            var items = display.getElementsByClassName("carousel-item");
            var currentItem = parseInt(display.getAttribute("data-focused-item"));
            if (currentItem > 0) {
                currentItem -= 1;
            }
            display.scroll(items[currentItem].offsetLeft - items[0].offsetLeft - display.getBoundingClientRect().width / 2 + items[currentItem].getBoundingClientRect().width / 2, 0);
            display.setAttribute("data-focused-item", currentItem);
            for (var j = 0; j < items.length; j++) {
                var cards = items[j].getElementsByClassName("card");
                if (cards.length > 0) {
                    if (j == currentItem) {
                        cards[0].style.borderColor = "var(--primary-lighter)";
                    } else {
                        cards[0].style.borderColor = "";
                    }
                }
            }
        });
        carousel.getElementsByClassName("carousel-next-button")[0].addEventListener("click", function () {
            var display = this.parentElement.getElementsByClassName("carousel-display")[0];
            var items = display.getElementsByClassName("carousel-item");
            var currentItem = parseInt(display.getAttribute("data-focused-item"));
            if (currentItem < items.length - 1) {
                currentItem += 1;
            }
            display.scroll(items[currentItem].offsetLeft - items[0].offsetLeft - display.getBoundingClientRect().width / 2 + items[currentItem].getBoundingClientRect().width / 2, 0);
            display.setAttribute("data-focused-item", currentItem);
            for (var j = 0; j < items.length; j++) {
                var cards = items[j].getElementsByClassName("card");
                if (cards.length > 0) {
                    if (j == currentItem) {
                        cards[0].style.borderColor = "var(--primary-lighter)";
                    } else {
                        cards[0].style.borderColor = "";
                    }
                }
            }
        });
    }
    window.document.addEventListener("mouseup", function () {
        var carousels = window.document.getElementsByClassName("carousel");
        for (var i = 0; i < carousels.length; i++) {
            var carousel = carousels[i];
            var display = carousel.getElementsByClassName("carousel-display")[0];
            display.style.cursor = "grab";
            display.style.userSelect = "";
            display.onmousemove = null;
        }
    });
}

function adjustCarousels() {
    var carousels = window.document.getElementsByClassName("carousel");
    for (var i = 0; i < carousels.length; i++) {
        var display = carousels[i].getElementsByClassName("carousel-display")[0];
        var items = display.getElementsByClassName("carousel-item");
        for (var j = 0; j < items.length; j++) {
            items[j].style.maxWidth = (display.getBoundingClientRect().width - 40) + "px";
        }
        if (display.scrollLeft == 0) {
            display.parentElement.getElementsByClassName("carousel-previous-button")[0].style.boxShadow = "none";
        } else {
            display.parentElement.getElementsByClassName("carousel-previous-button")[0].style.boxShadow = "";
        }
        if (display.scrollLeft >= Math.floor(display.children[0].getBoundingClientRect().width - display.getBoundingClientRect().width)) {
            display.parentElement.getElementsByClassName("carousel-next-button")[0].style.boxShadow = "none";
        } else {
            display.parentElement.getElementsByClassName("carousel-next-button")[0].style.boxShadow = "";
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

