var utils = new Utils({
    cellW: 260,
    container: document.getElementsByClassName('container')
});

utils.fixLayout();

window.onresize = wndResize;
function wndResize() {
    if (utils.wW == utils.getWndW()) {
        // ok, no actual width resize
    }
    else {
        waitForFinalEvent(
            function () {
                utils.fixLayout();
            },
            300,
            'wnd.onresize');
    }
}

function stopEvent(e) {
    if (e.preventDefault != undefined)
        e.preventDefault();
    if (e.stopPropagation != undefined)
        e.stopPropagation();
}

document.oncontextmenu = oncontextmenuOpen;
function oncontextmenuOpen(e) {
    var evt = new Object({keyCode: 93});
    stopEvent(e);
    keyboardUp(evt);
}

document.onkeydown = keyboardDown;
function keyboardDown(e) {

}

document.onkeyup = keyboardUp;
function keyboardUp(e) {

}