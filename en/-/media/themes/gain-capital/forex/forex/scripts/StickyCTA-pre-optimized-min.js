(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [2524], {
        1516: (e, s, o) => {
            "use strict";
            o.r(s);
            o(2472)
        },
        2472: () => {
            (() => {
                const e = document.querySelector("link.show-on-scroll, .button.show-on-scroll");
                if (!e) return;
                const s = window.pageXOffset;
                window.addEventListener("scroll", (o => {
                    s === window.pageXOffset && (window.pageYOffset > 0 ? e.classList.add("after-scroll") : e.classList.remove("after-scroll"))
                }))
            })()
        }
    }
]);