"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [1786], {
        1786: (e, t, n) => {
            n.d(t, {
                Q: () => s,
                Z: () => S
            });
            n(5347);
            var r = n(7317);
            const s = {
                    PROGRESS: 0,
                    SUCCESS: 1,
                    ERROR: 2
                },
                o = async (e, t) => fetch(e, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(t)
                }),
                a = async (e, t) => {
                    return fetch(t ? `${e}?${n=t,Object.keys(n).map((e=>e+"="+n[e])).join("&")}` : e, {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json"
                        }
                    });
                    var n
                },
                S = (e, t, n = null, S = !1, u = "POST") => {
                    const [h, c] = (0, r.eJ)(n || []), [l, i] = (0, r.eJ)(null), f = "POST" === u ? o : a;
                    return (0, r.d4)((() => {
                        if (S) return;
                        if (null !== n && null === l) return i(s.SUCCESS), void c(n);
                        let r = !1;
                        return i(s.PROGRESS), c([]), f(e, t).then((e => {
                            if (!e.ok) throw new Error(`HTTP error! status: ${e.status}`);
                            return e.json()
                        })).then((e => {
                            r || (i(s.SUCCESS), c(e))
                        })).catch((() => {
                            r || i(s.ERROR)
                        })), () => {
                            r = !0
                        }
                    }), [e, t, n, S]), [h, l]
                }
        }
    }
]);