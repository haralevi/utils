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

// Create an immediately invoked functional expression to wrap our code
(function () {

    // Define our constructor
    this.Utils = function () {

        // Create global element references
        this.wnd = window;
        this.docEl = document.documentElement;
        this.body = document.getElementsByTagName('body')[0];
        this.wW = 0;
        this.hW = 0;

        // Determine proper prefix

        // Define option defaults
        var defaults = {
            cellW: 260,
            container: document.getElementsByClassName('container')
        };

        // Create options by extending defaults with the passed in arguments
        if (arguments[0] && typeof arguments[0] === "object") {
            this.options = extendDefaults(defaults, arguments[0]);
        }

        // private methods
        function _getWndSize() {
            this.wW = this.wnd.innerWidth || this.docEl.clientWidth || this.body.clientWidth;
            this.hW = this.wnd.innerHeight || this.docEl.clientHeight || this.body.clientHeight;
        }

        Utils.prototype.fixLayout = function () {
            _getWndSize.call(this);
            this.wW -= 20;
            var containerW = Math.floor(this.wW / this.options.cellW) * this.options.cellW;
            console.log("width:", this.wW, "height:", this.hW, "ontainerW", containerW);
            for (var i = 0; i < container.length; i++)
                container[i].style.maxWidth = containerW + "px";
        }
    };

    // Utility method to extend defaults with user options
    function extendDefaults(source, properties) {
        var property;
        for (property in properties) {
            if (properties.hasOwnProperty(property)) {
                source[property] = properties[property];
            }
        }
        return source;
    }
}());

var container = document.getElementsByClassName('container');
var cellW = 260;
var utils = new Utils({
    cellW: cellW,
    container: container
});

utils.fixLayout();

window.onresize = wndResize;
function wndResize() {
    waitForFinalEvent(
        function () {
            utils.fixLayout();
        },
        300,
        'wnd.onresize');
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

