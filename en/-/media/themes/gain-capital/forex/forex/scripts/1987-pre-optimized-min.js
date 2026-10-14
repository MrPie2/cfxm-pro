"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [1987], {
        1987: (s, t, e) => {
            e.d(t, {
                H: () => a
            });
            const a = (s, t) => {
                if (!s) return;
                const e = t || s;
                let a = s.scrollLeft,
                    i = s.offsetWidth,
                    r = s.scrollWidth;
                r - i <= 0 ? (e.classList.remove("gradient-left"), e.classList.remove("gradient-right")) : r - a - i <= 1 ? (e.classList.add("gradient-left"), e.classList.remove("gradient-right")) : 0 === a ? (e.classList.remove("gradient-left"), e.classList.add("gradient-right")) : (e.classList.add("gradient-left"), e.classList.add("gradient-right"))
            }
        }
    }
]);