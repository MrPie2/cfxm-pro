(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [3014], {
        3014: (t, e) => {
            var r;
            /*!
            	Copyright (c) 2018 Jed Watson.
            	Licensed under the MIT License (MIT), see
            	http://jedwatson.github.io/classnames
            */
            ! function() {
                "use strict";
                var n = {}.hasOwnProperty;

                function o() {
                    for (var t = [], e = 0; e < arguments.length; e++) {
                        var r = arguments[e];
                        if (r) {
                            var i = typeof r;
                            if ("string" === i || "number" === i) t.push(r);
                            else if (Array.isArray(r)) {
                                if (r.length) {
                                    var s = o.apply(null, r);
                                    s && t.push(s)
                                }
                            } else if ("object" === i) {
                                if (r.toString !== Object.prototype.toString && !r.toString.toString().includes("[native code]")) {
                                    t.push(r.toString());
                                    continue
                                }
                                for (var a in r) n.call(r, a) && r[a] && t.push(a)
                            }
                        }
                    }
                    return t.join(" ")
                }
                t.exports ? (o.default = o, t.exports = o) : void 0 === (r = function() {
                    return o
                }.apply(e, [])) || (t.exports = r)
            }()
        }
    }
]);