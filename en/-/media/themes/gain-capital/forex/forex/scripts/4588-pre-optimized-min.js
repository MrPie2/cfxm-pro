"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [4588], {
        4588: (e, r, t) => {
            var a = t(7584),
                s = t(5374),
                n = t(1833),
                o = t(9866);
            a({
                target: "Iterator",
                proto: !0,
                real: !0
            }, {
                every: function(e) {
                    var r = o(this),
                        t = 0;
                    return n(e), !s(r, (function(r, a) {
                        if (!e(r, t++)) return a()
                    }), {
                        IS_RECORD: !0,
                        INTERRUPTED: !0
                    }).stopped
                }
            })
        }
    }
]);