"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [2464], {
        2464: (e, a, n) => {
            n.d(a, {
                t: () => h
            });
            n(7733), n(163);
            var i = n(2979),
                t = n(2627),
                s = (n(3014), n(7317));
            const l = (e, a, n) => Math.max(Math.min(e, n - 1), a),
                r = () => (0, i.h)("img", {
                    src: "/-/media/Themes/Gain-Capital/Forex/Forex/images/chevron-left-main.svg",
                    class: "pagination__chevron"
                }),
                o = () => (0, i.h)("img", {
                    src: "/-/media/Themes/Gain-Capital/Forex/Forex/images/chevron-right-main.svg",
                    class: "pagination__chevron"
                }),
                c = ({
                    page: e,
                    lastPage: a,
                    firstVisible: n,
                    numberOfVisiblePages: s,
                    onPageSelect: c
                }) => (0, i.h)("div", {
                    class: "webinar-pagination"
                }, (0, i.h)("button", {
                    disabled: e <= 0,
                    class: "webinar-pagination__prev",
                    onClick: () => c(l(e - 1, 0, a))
                }, (0, i.h)(r, null)), (0, t.r)(s, (a => (0, i.h)("button", {
                    class: "page " + (n + a === e ? "page--active" : ""),
                    onClick: () => c(n + a),
                    key: n + a
                }, n + a + 1))), (0, i.h)("button", {
                    class: "webinar-pagination__next",
                    disabled: e >= a - 1,
                    onClick: () => c(l(e + 1, 0, a))
                }, (0, i.h)(o, null))),
                h = ({
                    onPageSelect: e = (() => {}),
                    count: a = 5,
                    take: n = 5,
                    page: t = 0,
                    maxVisible: l = 5,
                    disable: r = !1
                } = {}) => {
                    const o = Math.floor(l / 2),
                        h = Math.ceil(a / n),
                        g = Math.max(Math.min(h - l, t - o), 0),
                        m = Math.min(l, h),
                        u = (0, s.sO)(null);
                    return r && null !== u.current || (u.current = {
                        onPageSelect: e,
                        page: t,
                        numberOfVisiblePages: m,
                        firstVisible: g,
                        lastPage: h
                    }), (0, i.h)(c, u.current)
                }
        },
        2627: (e, a, n) => {
            n.d(a, {
                L: () => o,
                r: () => r
            });
            n(5347);
            var i = n(4675),
                t = n.n(i),
                s = n(1687),
                l = n.n(s);
            t().extend(l());
            const r = (e, a) => Array(e).fill(null).map(((e, n) => a(n))),
                o = e => {
                    const a = e - 864e5 * Math.floor(e / 864e5);
                    return t().utc(a).format("HH:mm:ss")
                }
        }
    }
]);