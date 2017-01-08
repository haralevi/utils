// Create an immediately invoked functional expression to wrap our code
;(function () {

    // Define our constructor
    this.Utils = function () {

        // Create global element references
        this.wnd = window;
        this.docEl = document.documentElement;
        this.body = document.getElementsByTagName('body')[0];
        this.wW = 0;
        this.hW = 0;

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

        // public methods
        Utils.prototype.fixLayout = function () {
            _getWndSize.call(this);
            this.wW -= 20;
            var containerW = Math.floor(this.wW / this.options.cellW) * this.options.cellW;
            console.log("width:", this.wW, "height:", this.hW, "ontainerW", containerW);
            for (var i = 0; i < this.options.container.length; i++)
                this.options.container[i].style.maxWidth = containerW + "px";
        };

        Utils.prototype.getWndW = function () {
            return this.wnd.innerWidth || this.docEl.clientWidth || this.body.clientWidth;
        };

        Utils.prototype.getWndH = function () {
            return this.wnd.innerHeight || this.docEl.clientHeight || this.body.clientHeight;
        };
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
