"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [7853], {
        7853: (e, t, n) => {
            n.d(t, {
                Z: () => o
            });
            var i = n(7317);
            const o = function({
                liveMeasure: e = !0
            } = {}) {
                const [t, n] = (0, i.eJ)({}), [o, r] = (0, i.eJ)(null), w = (0, i.I4)((e => {
                    r(e)
                }), []);
                return (0, i.bt)((() => {
                    const t = () => window.requestAnimationFrame((() => n(function(e) {
                        const t = e ? .getBoundingClientRect(),
                            n = {
                                windowWidth: window.innerWidth,
                                windowHeight: window.innerHeight
                            };
                        return t ? {
                            width: t.width,
                            height: t.height,
                            top: "x" in t ? t.x : t.top,
                            left: "y" in t ? t.y : t.left,
                            x: "x" in t ? t.x : t.left,
                            y: "y" in t ? t.y : t.top,
                            right: t.right,
                            bottom: t.bottom,
                            ...n
                        } : n
                    }(o))));
                    if (t(), e) return window.addEventListener("resize", t), () => {
                        window.removeEventListener("resize", t)
                    }
                }), [o, e]), [w, t, o]
            }
        }
    }
]);