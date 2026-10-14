(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [163], {
        9883: r => {
            var e = RangeError;
            r.exports = function(r) {
                if (r == r) return r;
                throw e("NaN is not allowed")
            }
        },
        1033: (r, e, t) => {
            var n = t(3770),
                a = RangeError;
            r.exports = function(r) {
                var e = n(r);
                if (e < 0) throw a("The argument can't be less than 0");
                return e
            }
        },
        163: (r, e, t) => {
            "use strict";
            var n = t(7584),
                a = t(3428),
                o = t(9682),
                i = t(9866),
                s = t(9883),
                h = t(1033),
                u = t(8769),
                f = t(7329),
                v = u((function() {
                    var r = this.iterator;
                    if (!this.remaining--) return this.done = !0, f(r, "normal", void 0);
                    var e = o(a(this.next, r));
                    return (this.done = !!e.done) ? void 0 : e.value
                }));
            n({
                target: "Iterator",
                proto: !0,
                real: !0
            }, {
                take: function(r) {
                    return new v(i(this), {
                        remaining: h(s(+r))
                    })
                }
            })
        }
    }
]);