"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [5385], {
        5385: (e, r, t) => {
            var a = t(7584),
                o = t(5374),
                i = t(1833),
                n = t(9866),
                u = TypeError;
            a({
                target: "Iterator",
                proto: !0,
                real: !0
            }, {
                reduce: function(e) {
                    var r = n(this);
                    i(e);
                    var t = arguments.length < 2,
                        a = t ? void 0 : arguments[1],
                        h = 0;
                    if (o(r, (function(r) {
                            t ? (t = !1, a = r) : a = e(a, r, h), h++
                        }), {
                            IS_RECORD: !0
                        }), t) throw u("Reduce of empty iterator with no initial value");
                    return a
                }
            })
        }
    }
]);