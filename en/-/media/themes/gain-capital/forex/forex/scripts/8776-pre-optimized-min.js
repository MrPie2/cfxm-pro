"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [8776], {
        8776: (e, r, s) => {
            s.d(r, {
                Z: () => u
            });
            var t = s(2979),
                n = s(7317);
            const a = "positive",
                c = "negative",
                u = ({
                    children: e,
                    numerical: r,
                    variant: s = "",
                    className: u = ""
                } = {}) => {
                    const i = (0, n.sO)(),
                        l = (0, n.sO)();
                    return (0, n.d4)((() => {
                        if (!i.current) return void(i.current = r);
                        const e = i.current < r;
                        l.current.classList.add(e ? a : c);
                        const s = () => {
                            l.current.classList.remove(a), l.current.classList.remove(c)
                        };
                        i.current = r;
                        const t = setInterval(s, 200);
                        return () => {
                            clearTimeout(t), s()
                        }
                    }), [r]), (0, t.h)("span", {
                        ref: l,
                        "data-speed": 200,
                        class: `${u} blinking-value blinking-value--${s}`
                    }, e)
                }
        }
    }
]);