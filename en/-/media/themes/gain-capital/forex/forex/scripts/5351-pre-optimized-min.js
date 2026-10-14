"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [5351], {
        5351: (e, t, n) => {
            n.d(t, {
                n: () => r
            });
            const r = e => {
                let t = {},
                    n = document.createElement("a");
                n.href = e;
                let r = n.search.substring(1).split("&");
                try {
                    for (let e = 0; e < r.length; e++) {
                        let n = r[e].split("=");
                        t[n[0]] = decodeURIComponent(n[1])
                    }
                } catch (e) {
                    return console.warn("Malformed url, cannot decode", e), t
                }
                return t
            }
        }
    }
]);