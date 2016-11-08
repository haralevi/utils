var wnd = window, doc = document, docEl = doc.documentElement, body = doc.getElementsByTagName('body')[0];
var wW = 0, hW = 0, wndSize = [];

function getWndSize() {
    wW = wnd.innerWidth || docEl.clientWidth || body.clientWidth;
    hW = wnd.innerHeight || docEl.clientHeight || body.clientHeight;
    return [wW, hW];
}

var waitForFinalEvent = (function () {
    var timers = [];
    return function (callback, ms, uniqueId) {
        if (!uniqueId) {
            uniqueId = "Don't call this twice without a uniqueId";
        }
        if (timers[uniqueId]) {
            clearTimeout(timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();

function stopEvent(e) {
    if (e.preventDefault != undefined)
        e.preventDefault();
    if (e.stopPropagation != undefined)
        e.stopPropagation();
}

doc.oncontextmenu = oncontextmenuOpen;
function oncontextmenuOpen(e) {
    var evt = new Object({keyCode: 93});
    stopEvent(e);
    keyboardUp(evt);
}

doc.onkeydown = keyboardDown;
function keyboardDown(e) {

}

doc.onkeyup = keyboardUp;
function keyboardUp(e) {

}

var container = doc.getElementsByClassName('container');
var cellW = 260;

function fixLayout() {
    wndSize = getWndSize();
    wW = wndSize[0] - 20;
    hW = wndSize[1];
    console.log("width:", wW, "height:", hW);
    var containerW = Math.floor(wW / cellW) * cellW;
    for (var i = 0; i < container.length; i++)
        container[i].style.maxWidth = containerW + "px";
}
fixLayout();

wnd.onresize = wndResize;
function wndResize(e) {
    waitForFinalEvent(
        function () {
            fixLayout();
        },
        300,
        'wnd.onresize');
}