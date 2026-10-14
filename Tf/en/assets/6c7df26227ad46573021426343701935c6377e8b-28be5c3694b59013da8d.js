/*! For license information please see 6c7df26227ad46573021426343701935c6377e8b-28be5c3694b59013da8d.js.LICENSE.txt */
(self.webpackChunkbfx_ui_public = self.webpackChunkbfx_ui_public || []).push([
    [4827], {
        71505: function(e, M, t) {
            var n, N;
            window.Element && !Element.prototype.closest && (Element.prototype.closest = function(e) {
                    var M, t = (this.document || this.ownerDocument).querySelectorAll(e),
                        n = this;
                    do {
                        for (M = t.length; 0 <= --M && t.item(M) !== n;);
                    } while (M < 0 && (n = n.parentElement));
                    return n
                }),
                function() {
                    function e(e, M) {
                        M = M || {
                            bubbles: !1,
                            cancelable: !1,
                            detail: void 0
                        };
                        var t = document.createEvent("CustomEvent");
                        return t.initCustomEvent(e, M.bubbles, M.cancelable, M.detail), t
                    }
                    "function" != typeof window.CustomEvent && (e.prototype = window.Event.prototype, window.CustomEvent = e)
                }(),
                function() {
                    for (var e = 0, M = ["ms", "moz", "webkit", "o"], t = 0; t < M.length && !window.requestAnimationFrame; ++t) window.requestAnimationFrame = window[M[t] + "RequestAnimationFrame"], window.cancelAnimationFrame = window[M[t] + "CancelAnimationFrame"] || window[M[t] + "CancelRequestAnimationFrame"];
                    window.requestAnimationFrame || (window.requestAnimationFrame = function(M, t) {
                        var n = (new Date).getTime(),
                            N = Math.max(0, 16 - (n - e)),
                            i = window.setTimeout((function() {
                                M(n + N)
                            }), N);
                        return e = n + N, i
                    }), window.cancelAnimationFrame || (window.cancelAnimationFrame = function(e) {
                        clearTimeout(e)
                    })
                }(), N = void 0 !== t.g ? t.g : "undefined" != typeof window ? window : this, n = function() {
                    return function(e) {
                        "use strict";
                        var M = {
                                ignore: "[data-scroll-ignore]",
                                header: null,
                                topOnEmptyHash: !0,
                                speed: 500,
                                speedAsDuration: !1,
                                durationMax: null,
                                durationMin: null,
                                clip: !0,
                                offset: 0,
                                easing: "easeInOutCubic",
                                customEasing: null,
                                updateURL: !0,
                                popstate: !0,
                                emitEvents: !0
                            },
                            t = function() {
                                var e = {};
                                return Array.prototype.forEach.call(arguments, (function(M) {
                                    for (var t in M) {
                                        if (!M.hasOwnProperty(t)) return;
                                        e[t] = M[t]
                                    }
                                })), e
                            },
                            n = function(e) {
                                "#" === e.charAt(0) && (e = e.substr(1));
                                for (var M, t = String(e), n = t.length, N = -1, i = "", r = t.charCodeAt(0); ++N < n;) {
                                    if (0 === (M = t.charCodeAt(N))) throw new InvalidCharacterError("Invalid character: the input contains U+0000.");
                                    i += 1 <= M && M <= 31 || 127 == M || 0 === N && 48 <= M && M <= 57 || 1 === N && 48 <= M && M <= 57 && 45 === r ? "\\" + M.toString(16) + " " : 128 <= M || 45 === M || 95 === M || 48 <= M && M <= 57 || 65 <= M && M <= 90 || 97 <= M && M <= 122 ? t.charAt(N) : "\\" + t.charAt(N)
                                }
                                return "#" + i
                            },
                            N = function() {
                                return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight, document.body.offsetHeight, document.documentElement.offsetHeight, document.body.clientHeight, document.documentElement.clientHeight)
                            },
                            i = function(M) {
                                return M ? (t = M, parseInt(e.getComputedStyle(t).height, 10) + M.offsetTop) : 0;
                                var t
                            },
                            r = function(M, t, n) {
                                0 === M && document.body.focus(), n || (M.focus(), document.activeElement !== M && (M.setAttribute("tabindex", "-1"), M.focus(), M.style.outline = "none"), e.scrollTo(0, t))
                            },
                            a = function(M, t, n, N) {
                                if (t.emitEvents && "function" == typeof e.CustomEvent) {
                                    var i = new CustomEvent(M, {
                                        bubbles: !0,
                                        detail: {
                                            anchor: n,
                                            toggle: N
                                        }
                                    });
                                    document.dispatchEvent(i)
                                }
                            };
                        return function(l, D) {
                            var u, c, g, I, o = {
                                    cancelScroll: function(e) {
                                        cancelAnimationFrame(I), I = null, e || a("scrollCancel", u)
                                    },
                                    animateScroll: function(n, l, D) {
                                        o.cancelScroll();
                                        var c = t(u || M, D || {}),
                                            s = "[object Number]" === Object.prototype.toString.call(n),
                                            j = s || !n.tagName ? null : n;
                                        if (s || j) {
                                            var T = e.pageYOffset;
                                            c.header && !g && (g = document.querySelector(c.header));
                                            var E, A, z, y, O, L, x, m, d = i(g),
                                                f = s ? n : function(M, t, n, i) {
                                                    var r = 0;
                                                    if (M.offsetParent)
                                                        for (; r += M.offsetTop, M = M.offsetParent;);
                                                    return r = Math.max(r - t - n, 0), i && (r = Math.min(r, N() - e.innerHeight)), r
                                                }(j, d, parseInt("function" == typeof c.offset ? c.offset(n, l) : c.offset, 10), c.clip),
                                                k = f - T,
                                                C = N(),
                                                w = 0,
                                                S = (E = k, z = (A = c).speedAsDuration ? A.speed : Math.abs(E / 1e3 * A.speed), A.durationMax && z > A.durationMax ? A.durationMax : A.durationMin && z < A.durationMin ? A.durationMin : parseInt(z, 10)),
                                                h = function(M) {
                                                    var t, N, i;
                                                    y || (y = M), w += M - y, L = T + k * (N = O = 1 < (O = 0 === S ? 0 : w / S) ? 1 : O, "easeInQuad" === (t = c).easing && (i = N * N), "easeOutQuad" === t.easing && (i = N * (2 - N)), "easeInOutQuad" === t.easing && (i = N < .5 ? 2 * N * N : (4 - 2 * N) * N - 1), "easeInCubic" === t.easing && (i = N * N * N), "easeOutCubic" === t.easing && (i = --N * N * N + 1), "easeInOutCubic" === t.easing && (i = N < .5 ? 4 * N * N * N : (N - 1) * (2 * N - 2) * (2 * N - 2) + 1), "easeInQuart" === t.easing && (i = N * N * N * N), "easeOutQuart" === t.easing && (i = 1 - --N * N * N * N), "easeInOutQuart" === t.easing && (i = N < .5 ? 8 * N * N * N * N : 1 - 8 * --N * N * N * N), "easeInQuint" === t.easing && (i = N * N * N * N * N), "easeOutQuint" === t.easing && (i = 1 + --N * N * N * N * N), "easeInOutQuint" === t.easing && (i = N < .5 ? 16 * N * N * N * N * N : 1 + 16 * --N * N * N * N * N), t.customEasing && (i = t.customEasing(N)), i || N), e.scrollTo(0, Math.floor(L)),
                                                        function(M, t) {
                                                            var N = e.pageYOffset;
                                                            if (M == t || N == t || (T < t && e.innerHeight + N) >= C) return o.cancelScroll(!0), r(n, t, s), a("scrollStop", c, n, l), !(I = y = null)
                                                        }(L, f) || (I = e.requestAnimationFrame(h), y = M)
                                                };
                                            0 === e.pageYOffset && e.scrollTo(0, 0), x = n, m = c, s || history.pushState && m.updateURL && history.pushState({
                                                smoothScroll: JSON.stringify(m),
                                                anchor: x.id
                                            }, document.title, x === document.documentElement ? "#top" : "#" + x.id), "matchMedia" in e && e.matchMedia("(prefers-reduced-motion)").matches ? r(n, Math.floor(f), !1) : (a("scrollStart", c, n, l), o.cancelScroll(!0), e.requestAnimationFrame(h))
                                        }
                                    }
                                },
                                s = function(M) {
                                    if (!M.defaultPrevented && !(0 !== M.button || M.metaKey || M.ctrlKey || M.shiftKey) && "closest" in M.target && (c = M.target.closest(l)) && "a" === c.tagName.toLowerCase() && !M.target.closest(u.ignore) && c.hostname === e.location.hostname && c.pathname === e.location.pathname && /#/.test(c.href)) {
                                        var t, N;
                                        try {
                                            t = n(decodeURIComponent(c.hash))
                                        } catch (M) {
                                            t = n(c.hash)
                                        }
                                        if ("#" === t) {
                                            if (!u.topOnEmptyHash) return;
                                            N = document.documentElement
                                        } else N = document.querySelector(t);
                                        (N = N || "#top" !== t ? N : document.documentElement) && (M.preventDefault(), function(M) {
                                            if (history.replaceState && M.updateURL && !history.state) {
                                                var t = e.location.hash;
                                                t = t || "", history.replaceState({
                                                    smoothScroll: JSON.stringify(M),
                                                    anchor: t || e.pageYOffset
                                                }, document.title, t || e.location.href)
                                            }
                                        }(u), o.animateScroll(N, c))
                                    }
                                },
                                j = function(e) {
                                    if (null !== history.state && history.state.smoothScroll && history.state.smoothScroll === JSON.stringify(u)) {
                                        var M = history.state.anchor;
                                        "string" == typeof M && M && !(M = document.querySelector(n(history.state.anchor))) || o.animateScroll(M, null, {
                                            updateURL: !1
                                        })
                                    }
                                };
                            return o.destroy = function() {
                                    u && (document.removeEventListener("click", s, !1), e.removeEventListener("popstate", j, !1), o.cancelScroll(), I = g = c = u = null)
                                },
                                function() {
                                    if (!("querySelector" in document && "addEventListener" in e && "requestAnimationFrame" in e && "closest" in e.Element.prototype)) throw "Smooth Scroll: This browser does not support the required JavaScript methods and browser APIs.";
                                    o.destroy(), u = t(M, D || {}), g = u.header ? document.querySelector(u.header) : null, document.addEventListener("click", s, !1), u.updateURL && u.popstate && e.addEventListener("popstate", j, !1)
                                }(), o
                        }
                    }(N)
                }.apply(M, []), void 0 === n || (e.exports = n)
        },
        72998: function(e, M, t) {
            "use strict";
            t.d(M, {
                R: function() {
                    return r
                },
                Z: function() {
                    return l
                }
            });
            var n = t(67294),
                N = t(75900),
                i = t.n(N);
            t(52628);
            const r = {
                    left: "left",
                    right: "right"
                },
                a = e => {
                    const {
                        align: M,
                        children: t
                    } = e;
                    return n.createElement("div", {
                        className: i()("buttons-group", {
                            "buttons-group__left": M === r.left,
                            "buttons-group__right": M === r.right
                        })
                    }, n.Children.map(t, ((e, M) => n.createElement("div", {
                        key: M,
                        className: "buttons-group__item"
                    }, e))))
                };
            a.defaultProps = {
                align: void 0,
                children: null
            };
            var l = a
        },
        17276: function(e, M, t) {
            "use strict";
            t.d(M, {
                a7: function() {
                    return s
                },
                cN: function() {
                    return T
                },
                fK: function() {
                    return I
                },
                ZP: function() {
                    return E
                }
            });
            var n = t(67294),
                N = t(73935),
                i = t(75900),
                r = t.n(i);
            const a = "overflow-hidden",
                l = e => {
                    let {
                        children: M,
                        className: t,
                        overlayClassname: i,
                        isOpen: l,
                        dataTestId: D
                    } = e;
                    if ((0, n.useEffect)((() => {
                            if (l) return document.body.classList.add(a), () => {
                                document.body.classList.remove(a)
                            }
                        }), [l]), !l || "object" != typeof document) return null;
                    const u = n.createElement("div", {
                        className: r()("landing-dialog__overlay", i)
                    }, n.createElement("div", {
                        className: "landing-dialog__container"
                    }, n.createElement("div", {
                        className: r()("landing-dialog", t),
                        "data-testid": D
                    }, M)));
                    return (0, N.createPortal)(u, document.body)
                };
            l.defaultProps = {
                className: null,
                overlayClassname: null,
                children: null,
                dataTestId: "",
                isOpen: !0
            };
            var D = l,
                u = t(798),
                c = t(87498);
            const g = e => {
                let {
                    children: M,
                    onClose: t
                } = e;
                return n.createElement("div", {
                    className: "landing-dialog-header"
                }, n.createElement("div", {
                    className: "landing-dialog-header__title"
                }, M), n.createElement("div", {
                    className: "landing-dialog-header__buttons"
                }, t ? n.createElement("button", {
                    "aria-label": "Close",
                    onClick: t,
                    type: "button"
                }, n.createElement(u.Q, {
                    wrapper: "span",
                    src: c.Z
                })) : null))
            };
            g.defaultProps = {
                children: null,
                onClose: null
            };
            var I = g;
            const o = e => {
                let {
                    children: M,
                    className: t
                } = e;
                return n.createElement("div", {
                    className: r()("landing-dialog-body", t)
                }, M)
            };
            o.defaultProps = {
                children: null,
                className: null
            };
            var s = o;
            const j = e => {
                let {
                    children: M,
                    className: t
                } = e;
                return n.createElement("div", {
                    className: r()("landing-dialog-footer", t)
                }, M)
            };
            j.defaultProps = {
                children: null,
                className: ""
            };
            var T = j,
                E = D
        },
        45992: function(e, M, t) {
            "use strict";
            t.d(M, {
                Z: function() {
                    return D
                }
            });
            var n = t(67294),
                N = t(27361),
                i = t.n(N),
                r = t(68270),
                a = t(61655),
                l = t(17276);
            var D = () => {
                const {
                    t: e
                } = (0, r.$)("common"), {
                    externalLinkModaData: M,
                    hideExternalLinkModal: t
                } = (0, n.useContext)(a.FU), N = i()(M, "url"), D = i()(M, "content");
                return N ? n.createElement(l.ZP, {
                    className: "external-link-dialog"
                }, n.createElement(l.fK, {
                    onClose: t
                }), n.createElement(l.a7, null, n.createElement("p", null, D)), n.createElement(l.cN, {
                    className: "external-link-dialog__footer"
                }, e("open_link"), " ", n.createElement("a", {
                    onClick: t,
                    className: "external-link-url",
                    href: N,
                    target: "_blank",
                    rel: "noopener noreferrer"
                }, N))) : null
            }
        },
        98371: function(e, M, t) {
            "use strict";
            t.d(M, {
                X2: function() {
                    return i
                },
                sg: function() {
                    return r
                }
            });
            var n = t(67294);
            const N = function(e) {
                void 0 === e && (e = {});
                const {
                    children: M,
                    style: t,
                    className: N,
                    id: i,
                    horizontal: r,
                    ...a
                } = e, l = {
                    display: "flex",
                    flexDirection: r ? "row" : "column",
                    ...t
                };
                return n.createElement("div", Object.assign({
                    id: i,
                    style: l,
                    className: N
                }, a), M)
            };
            N.defaultProps = {
                style: {},
                className: "",
                id: "",
                horizontal: !1
            };
            const i = e => n.createElement(N, Object.assign({
                    horizontal: !0
                }, e)),
                r = e => n.createElement(N, Object.assign({
                    horizontal: !1
                }, e))
        },
        86222: function(e, M, t) {
            "use strict";
            t.d(M, {
                Z: function() {
                    return me
                }
            });
            var n = t(67294),
                N = t(75900),
                i = t.n(N);
            var r = e => {
                    let {
                        children: M
                    } = e;
                    return n.createElement("div", {
                        className: "footer__section"
                    }, M)
                },
                a = t(29499),
                l = t(68270),
                D = t(34531),
                u = t(98371),
                c = t(25335),
                g = t(44425),
                I = t(17005),
                o = "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMWVtIiBoZWlnaHQ9IjFlbSIgdmlld0JveD0iMCAwIDMwIDEzIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cGF0aCBkPSJNMjkuODAxNyA2LjA5NjY3TDIyLjk4MzcgMC4zNzQzNDdDMjIuNzM4OCAwLjEzNDMxOSAyMi4zMDg0IDAuMTA2MzM4IDIyLjAyMjQgMC4zMTE5NDNDMjEuNzM2NCAwLjUxNzQ5OCAyMS43MDMgMC44Nzg3NDUgMjEuOTQ4IDEuMTE4NzdDMjEuOTcwOSAxLjE0MTE1IDIxLjk5NTcgMS4xNjIwNSAyMi4wMjI0IDEuMTgxMThMMjcuNjc0NSA1LjkzMDdIMC42ODE3ODVDMC4zMDUyNjggNS45MzA3IDAgNi4xODY5IDAgNi41MDI5NkMwIDYuODE5MDEgMC4zMDUyNjggNy4wNzUxNyAwLjY4MTc4NSA3LjA3NTE3SDI3LjY3NDVMMjIuMDIyNCAxMS44MTg5QzIxLjczNjQgMTIuMDI0NSAyMS43MDMgMTIuMzg1NyAyMS45NDggMTIuNjI1OEMyMi4xOTMgMTIuODY1OCAyMi42MjM0IDEyLjg5MzggMjIuOTA5MyAxMi42ODgyQzIyLjkzNiAxMi42NjkgMjIuOTYwOSAxMi42NDgxIDIyLjk4MzcgMTIuNjI1OEwyOS44MDE4IDYuOTAzNDVDMzAuMDY2MSA2LjY4MDM0IDMwLjA2NjEgNi4zMTk4OCAyOS44MDE3IDYuMDk2NjdaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K",
                s = t(12511),
                j = t(42043),
                T = t(72998),
                E = t(37469);
            const A = (0, n.memo)((() => {
                const {
                    t: e
                } = (0, l.$)("join_bitfinex"), {
                    isAuthenticated: M
                } = (0, E.Z)();
                return n.createElement("div", {
                    className: "join-bitfinex-start"
                }, n.createElement("div", {
                    className: "join-bitfinex-start--title"
                }, e("start_trading.title")), n.createElement("div", {
                    className: "join-bitfinex-start--description"
                }, e("start_trading.description")), M ? n.createElement(T.Z, null, n.createElement(I.Z, {
                    to: D.HY + "/t"
                }, n.createElement(j.Z, null, e("homepage:start_trading")))) : n.createElement(T.Z, null, n.createElement(I.Z, {
                    to: D.HY + "/t?demo=true"
                }, n.createElement(j.Z, {
                    secondary: !0
                }, e("start_trading.try_demo"))), n.createElement(g.Z, null)))
            }));
            var z = t(87274);
            const y = e => {
                const {
                    t: M
                } = (0, l.$)("footer"), {
                    isAuthenticated: t
                } = (0, E.Z)(), {
                    location: N
                } = e, {
                    pathname: i
                } = N, r = (0, s.f8)(i), a = () => n.createElement(u.sg, {
                    className: "extra_footer_content"
                }, n.createElement("div", {
                    className: "extra_content_container"
                }, n.createElement("div", {
                    className: "join_msg"
                }, M("join_msg2")), n.createElement(T.Z, null, n.createElement(g.Z, null), n.createElement(c.Z, null))));
                switch (!0) {
                    case /pro/.test(i):
                        return !t && n.createElement(u.sg, {
                            className: "extra_footer_content"
                        }, n.createElement("div", {
                            className: "extra_content_container account"
                        }, n.createElement("div", {
                            className: "join_msg open_account"
                        }, M("join_msg1")), n.createElement(T.Z, null, n.createElement("a", {
                            href: z.ix
                        }, n.createElement(j.Z, null, M("open_account"))))));
                    case /about/.test(i):
                        return n.createElement(n.Fragment, null, n.createElement(u.sg, {
                            className: "extra_footer_content"
                        }, n.createElement("div", {
                            className: "extra_content_container"
                        }, n.createElement(u.sg, {
                            className: "left_col"
                        }, n.createElement("h1", {
                            className: "title"
                        }, M("about_title")), n.createElement("h2", null, M("about_subtitle"))), n.createElement("div", {
                            className: "right_col"
                        }, n.createElement(I.Z, {
                            ignoreRedirectModal: !0,
                            to: D.C3
                        }, n.createElement(j.Z, {
                            rightIcon: n.createElement("img", {
                                src: o,
                                alt: "support"
                            })
                        }, M("view_open_positions")))))), !t && a());
                    case /affiliates/.test(i):
                        return n.createElement(n.Fragment, null, n.createElement(u.sg, {
                            className: "extra_footer_content"
                        }, n.createElement("div", {
                            className: "extra_content_container"
                        }, n.createElement(u.sg, {
                            className: "left_col"
                        }, n.createElement("h1", {
                            className: "title"
                        }, M("affiliate_msg-1-1"), n.createElement(I.Z, {
                            to: z.RR
                        }, M("faq")), M("affiliate_msg-1-2")), n.createElement("h2", null, M("affiliate_msg-2"))), n.createElement("div", {
                            className: "right_col"
                        }, n.createElement(I.Z, {
                            to: z.gH
                        }, n.createElement(j.Z, null, n.createElement("span", null, M("support_btn_label")), n.createElement("img", {
                            src: o,
                            alt: "support"
                        })))))), !t && a());
                    case /cards/.test(i):
                        return !t && n.createElement(u.sg, {
                            className: "extra_footer_content"
                        }, n.createElement("div", {
                            className: "extra_content_container"
                        }, n.createElement("div", {
                            className: "join_msg"
                        }, M("cards:footer")), n.createElement(T.Z, null, n.createElement(g.Z, null), n.createElement(c.Z, null))));
                    case /securities/.test(i):
                        return !t && n.createElement(u.sg, {
                            className: "extra_footer_content extra_footer_securities_content"
                        }, n.createElement("div", {
                            className: "extra_content_container"
                        }, n.createElement("div", {
                            className: "join_msg"
                        }, M("join_securities_msg")), n.createElement(T.Z, null, n.createElement(g.Z, {
                            isSecuritiesRootPage: r
                        }), n.createElement(c.Z, null))));
                    case /channels/.test(i):
                    case /join-bitfinex/.test(i):
                    case /manifesto/.test(i):
                    case /security-policy/.test(i):
                        return n.createElement(A, null);
                    case /thalex/.test(i):
                        return null;
                    default:
                        return !t && a()
                }
            };
            var O = e => n.createElement(a.Location, null, (M => n.createElement(y, Object.assign({}, M, e)))),
                L = t(44031).Z;
            var x = () => n.createElement(u.sg, {
                className: "logo_container"
            }, n.createElement(u.X2, null, n.createElement("img", {
                src: "/images/bitfinex-logo.svg",
                alt: "bfx_logo"
            })));
            var m = () => n.createElement(u.sg, {
                className: "logo_container"
            }, n.createElement(u.X2, null, n.createElement("img", {
                src: "/images/bitfinex-securities-logo.svg",
                alt: "bfx_logo"
            })));
            const d = e => {
                let {
                    className: M,
                    isSecuritiesPage: t
                } = e;
                return n.createElement("div", {
                    className: i()(["footer__logo", M])
                }, t ? n.createElement(m, null) : n.createElement(x, null))
            };
            d.defaultProps = {
                isSecuritiesPage: !1,
                className: null
            };
            var f = t(10240),
                k = t.n(f),
                C = t(71466),
                w = t(9634),
                S = t(90794),
                h = t(34688),
                Q = t(32603),
                U = t(32203);
            const p = (e, M, t) => U.stringifyUrl({
                url: e,
                query: {
                    type: t,
                    demo: !M || null
                }
            }, {
                skipNull: !0
            });
            var b = e => {
                let {
                    children: M
                } = e;
                return n.createElement("div", {
                    className: "footer__column"
                }, M)
            };
            var Y = e => {
                    let {
                        children: M
                    } = e;
                    return n.createElement("div", {
                        className: "footer__title"
                    }, M)
                },
                v = t(798),
                _ = t(72785);
            const P = e => {
                let {
                    children: M,
                    href: t,
                    partiallyActive: N,
                    className: i,
                    isExternal: r,
                    ...a
                } = e;
                return n.createElement(I.Z, Object.assign({
                    partiallyActive: N,
                    to: t,
                    className: i
                }, a), M, r && n.createElement(v.Q, {
                    className: "footer__link__external-icon",
                    src: _.Z
                }))
            };
            P.defaultProps = {
                partiallyActive: !0,
                className: "footer__link",
                isExternal: !1
            };
            var Z = P,
                R = t(27361),
                G = t.n(R),
                B = t(84238),
                F = t.n(B),
                W = t(71640),
                $ = t.n(W),
                H = t(98611),
                V = t.n(H),
                J = t(69572),
                K = t.n(J);
            const X = function(e, M) {
                    void 0 === M && (M = 2);
                    const t = M + 1,
                        n = $()(e, "/");
                    return F()(n) <= t ? e : V()(K()(n, t), "/")
                },
                q = e => X(G()(e, "href")) === X(G()(e, "location.pathname")),
                ee = e => ({
                    className: i()("footer__link", {
                        active: q(e)
                    })
                });
            var Me = e => {
                let {
                    children: M,
                    ...t
                } = e;
                return n.createElement(Z, Object.assign({
                    getProps: ee
                }, t), M)
            };
            const te = (0, D.SF)(),
                ne = e => {
                    let {
                        isLoggedIn: M,
                        isPaperTradingAccount: t,
                        path: N
                    } = e;
                    const {
                        t: a,
                        i18n: {
                            language: u
                        }
                    } = (0, l.$)("footer"), c = (0, C._T)(), g = (0, C.vB)(900001525006, {
                        usePlatformLocale: !0
                    }), I = (0, S.bW)(), o = D.MT + "?locale=" + u, s = M && I ? o + "&authToken=" + I : o;
                    return n.createElement("div", null, n.createElement(b, null, n.createElement(r, null, n.createElement(Y, null, a("services")), n.createElement(Z, {
                        href: p(D.HY + "/trading", M, w.mw.EXCHANGE)
                    }, a("exchange")), (0, h.QT)(Q.$$.MARGIN_TRADING) && n.createElement(Z, {
                        href: p(D.HY + "/trading", M, w.mw.MARGIN)
                    }, a("margin_trading")), (0, h.QT)(Q.$$.DERIVATIVES) && n.createElement(Z, {
                        href: p(D.HY + "/trading/" + D.aF, M)
                    }, a("derivatives_short")), (0, h.QT)(Q.$$.P2P_LINK) && n.createElement(Z, {
                        href: D.P
                    }, a("p2p")), (0, h.QT)(Q.$$.OTC) && n.createElement(Z, {
                        href: D.HY + "/otc"
                    }, a("otc")), (0, h.QT)(Q.$$.FUNDING) && n.createElement(Z, {
                        href: p(D.HY + "/funding", M)
                    }, a("lending")), !t && (0, h.QT)(Q.$$.SECURITIES) && n.createElement(Z, {
                        href: p(D.HY + "/trading/" + D.iY, M)
                    }, a("securities_trading")), (0, h.QT)(Q.$$.STAKING) && n.createElement(Z, {
                        href: te.stakingUrl
                    }, a("staking")), n.createElement(Z, {
                        href: "https://docs.bitfinex.com"
                    }, a("api")), n.createElement(Z, {
                        href: "/pro"
                    }, a("pro")), n.createElement(Z, {
                        href: "/security-policy"
                    }, a("security")), n.createElement(Z, {
                        href: "/deposits-withdrawals"
                    }, a("deposits_withdrawals")), (0, h.QT)(Q.$$.CREDIT_CARD_DEPOSIT) && M && n.createElement(Z, {
                        href: D.$r + "/deposits/card"
                    }, a("cards")), (0, h.QT)(Q.$$.CREDIT_CARD_DEPOSIT) && !M && n.createElement(Z, {
                        href: "/cards"
                    }, a("cards")))), n.createElement(b, null, n.createElement(r, null, n.createElement(Y, null, a("products")), n.createElement(Z, {
                        href: p(D.HY + "/trading", M, w.mw.EXCHANGE)
                    }, a("exchange")), n.createElement(Z, {
                        href: "/mobile-trading"
                    }, a("mobileapp")), (0, h.QT)(Q.$$.LENDING_PRODUCTS) && n.createElement(Z, {
                        href: z.VS
                    }, "Lending Pro"), (0, h.QT)(Q.$$.BORROW) && n.createElement(Z, {
                        href: "/borrow"
                    }, a("bitfinex_borrow")), (0, h.QT)(Q.$$.BFX_PAY) && n.createElement(Z, {
                        href: te.paymentGatewayUrl
                    }, a("pay")), (0, h.QT)(Q.$$.BFX_TERMINAL) && n.createElement(Z, {
                        href: te.terminalUrl
                    }, a("bitfinex_terminal")), (0, h.QT)(Q.$$.REPORTING) && n.createElement(Z, {
                        href: "https://reporting.bitfinex.com"
                    }, a("reporting")), (0, h.QT)(Q.$$.HONEY_FRAMEWORK) && n.createElement(Z, {
                        href: te.honeyFrameworkUrl
                    }, a("honey")), (0, h.QT)(Q.$$.LEO) && n.createElement(Z, {
                        href: te.leoTransparencyUrl
                    }, a("leo")))), n.createElement(b, null, n.createElement(r, null, n.createElement(Y, null, a("company")), n.createElement(Z, {
                        href: "/about"
                    }, a("about")), n.createElement(Z, {
                        className: i()("footer__link", "footer__link__external", k()(N, "/manifesto") && "active"),
                        target: "_blank",
                        href: "/manifesto",
                        isExternal: !0
                    }, a("manifesto")), (0, h.QT)(Q.$$.AFFILIATES) && n.createElement(Z, {
                        href: "/affiliates"
                    }, a("affiliates")), (0, h.QT)(Q.$$.CAREERS) && n.createElement(Z, {
                        ignoreRedirectModal: !0,
                        href: D.C3
                    }, a("careers")), (0, h.QT)(Q.$$.ANNOUNCEMENT) && n.createElement(Z, {
                        href: "/posts"
                    }, a("announcements")), n.createElement(Z, {
                        href: "/bitfinex-alpha"
                    }, a("bitfinex_alpha")), (0, h.QT)(Q.$$.BLOG) && n.createElement(Z, {
                        href: "https://blog.bitfinex.com/"
                    }, a("blog")), n.createElement(Z, {
                        href: "/press"
                    }, a("press")), (0, h.QT)(Q.$$.BLOG) && n.createElement(Z, {
                        href: "https://blog.bitfinex.com/newsletter/"
                    }, a("newsletter")), n.createElement(Z, {
                        href: "/utilities"
                    }, a("utilities")), n.createElement(Z, {
                        href: "/stats"
                    }, a("stats")), n.createElement(Z, {
                        href: "/fees"
                    }, a("fees")), n.createElement(Z, {
                        href: "/security-policy#soc2"
                    }, a("soc2")))), n.createElement(b, null, n.createElement(r, null, n.createElement(Y, null, a("support")), n.createElement(Z, {
                        href: c
                    }, a("help_center")), n.createElement(Z, {
                        href: s
                    }, a("contact_us")), n.createElement(Z, {
                        href: "/channels"
                    }, a("bitfinex_channels")), n.createElement(Z, {
                        href: "/bug-bounty"
                    }, a("bug_bounty")), (0, h.QT)(Q.$$.STATUS_PAGE) && n.createElement(Z, {
                        href: "https://bitfinex.statuspage.io/"
                    }, a("status")), n.createElement(Y, null, a("learn")), n.createElement(Z, {
                        href: g
                    }, a("paper_trading")), n.createElement(Z, {
                        href: "/how-to-buy-bitcoin"
                    }, a("how_to_buy_bitcoin")), n.createElement(Z, {
                        href: "/how-to-buy-ethereum"
                    }, a("how_to_buy_ethereum")), n.createElement(Z, {
                        href: "/how-to-buy-litecoin"
                    }, a("how_to_buy_litecoin")))), n.createElement(b, null, n.createElement(r, null, n.createElement(Y, null, a("legal_and_privacy")), n.createElement(Me, {
                        href: "/legal/privacy"
                    }, a("privacy")), n.createElement(Me, {
                        href: "/legal/cookies"
                    }, a("cookies_policy")), n.createElement(Z, {
                        href: "/?manageCookies"
                    }, a("cookies_preferences")), n.createElement(Me, {
                        href: "/legal/exchange/terms"
                    }, a("exchange_terms")), (0, h.QT)(Q.$$.DERIVATIVES) && n.createElement(Me, {
                        href: "/legal/derivative/terms"
                    }, a("derivative_terms")), (0, h.QT)(Q.$$.LEGAL_API) && n.createElement(Me, {
                        href: "/legal/general/api-terms"
                    }, a("general_notices_terms")), (0, h.QT)(Q.$$.BFX_PAY) && n.createElement(Me, {
                        href: "/legal/bitfinex-pay/merchant-terms"
                    }, a("pay_terms")), (0, h.QT)(Q.$$.LEGAL_RRT) && n.createElement(Me, {
                        href: "/legal/token-terms/rrt"
                    }, a("token_specific_terms")), (0, h.QT)(Q.$$.LEGAL_RULEBOOK) && n.createElement(Me, {
                        href: "/legal/trading-rulebook"
                    }, a("trading_rulebook")))))
                };
            ne.defaultProps = {
                path: ""
            };
            var Ne = ne,
                ie = t(41609),
                re = t.n(ie),
                ae = t(35161),
                le = t.n(ae),
                De = t(12180),
                ue = t(64030);
            const ce = (e, M) => e ? "/legal/securities/" + e + M : "/legal/securities" + M;
            var ge = e => {
                let {
                    isLoggedIn: M
                } = e;
                const {
                    t: t,
                    i18n: {
                        language: N
                    }
                } = (0, l.$)("footer"), i = (0, ue.Z)(), a = (0, C.vB)("900006299326-Bitfinex-Securities-Trading", {
                    usePlatformLocale: !0
                }), u = (0, S.bW)(), c = D.MT + "?section=securities&locale=" + N, g = M && u ? c + "&authToken=" + u : c;
                return n.createElement("div", null, n.createElement(b, null, n.createElement(r, null, n.createElement(Y, null, t("securities.about")), n.createElement(Z, {
                    partiallyActive: !1,
                    href: "/securities"
                }, t("securities.securities")), n.createElement(Z, {
                    href: D.v8
                }, t("securities.admission")), n.createElement(Z, {
                    href: p(D.HY + "/trading/" + D.iY, M)
                }, t("securities_trading")), n.createElement(Z, {
                    href: "/securities/fees"
                }, t("securities.fees")), n.createElement(Z, {
                    href: "https://blog.bitfinex.com/category/securities"
                }, t("securities.blog")), n.createElement(Z, {
                    href: "/securities/posts"
                }, t("securities.announcements")), n.createElement(Z, {
                    href: "https://blog.bitfinex.com/bitfinex-securities-industry-news-updates/"
                }, t("securities.newsletter")))), le()(re()(i) ? [{
                    title: null,
                    subPath: null,
                    baseCcy: (0, De.Gz)(D.iY, !0)
                }] : i, ((e, M) => {
                    let {
                        title: N,
                        subPath: i,
                        baseCcy: a
                    } = e;
                    return n.createElement(b, {
                        key: M
                    }, n.createElement(r, null, n.createElement(Y, null, N ? N + " " : "", t("securities.legal")), n.createElement(Z, {
                        href: ce(i, "/terms")
                    }, t("securities.terms")), n.createElement(Z, {
                        href: ce(i, "/privacy")
                    }, t("securities.privacy")), n.createElement(Z, {
                        href: ce(i, "/general/anti-spam")
                    }, t("securities.notices")), n.createElement(Z, {
                        href: ce(i, "/issuers/" + a)
                    }, t("securities.submissions")), n.createElement(Z, {
                        href: ce(i, "/official-list")
                    }, t("securities.official_list"))))
                })), n.createElement(b, null, n.createElement(r, null, n.createElement(Y, null, t("securities.support")), n.createElement(Z, {
                    href: a
                }, t("securities.knowledge_base")), n.createElement(Z, {
                    href: g
                }, t("securities.customer")), n.createElement(Z, {
                    href: D.v8 + "/#contact"
                }, t("securities.contact")), n.createElement(Z, {
                    ignoreRedirectModal: !0,
                    href: "https://bitfinexsecurities.recruitee.com/"
                }, t("securities.careers")))))
            };
            const Ie = e => {
                let {
                    className: M,
                    isLoggedIn: t,
                    isPaperTradingAccount: N,
                    isSecuritiesPage: r,
                    path: a
                } = e;
                return n.createElement("div", {
                    className: i()(["footer__content", M])
                }, r ? n.createElement(ge, {
                    isLoggedIn: t
                }) : n.createElement(Ne, {
                    isLoggedIn: t,
                    isPaperTradingAccount: N,
                    path: a
                }))
            };
            Ie.defaultProps = {
                isSecuritiesPage: !1,
                className: null,
                path: ""
            };
            var oe = t(61757),
                se = "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik01LjY1NDI0IDE1LjkwMDRDMTIuNDQ2NiAxNS45MDA0IDE2LjE2MzIgMTAuMzU4NyAxNi4xNjMyIDUuNTYxMDNDMTYuMTYzMiA1LjQwNTEyIDE2LjE2MzIgNS4yNDkyMSAxNi4xNTYgNS4wOTMzMUMxNi44NzYzIDQuNTgzMDcgMTcuNTAzIDMuOTM4MTkgMTggMy4yMDgyN0MxNy4zMzczIDMuNDk4ODIgMTYuNjI0MiAzLjY5MDE2IDE1Ljg3NTEgMy43ODIyOUMxNi42Mzg2IDMuMzM1ODMgMTcuMjIyMSAyLjYyMDA4IDE3LjUwMyAxLjc2OTY5QzE2Ljc4OTkgMi4xODc4IDE1Ljk5NzYgMi40ODU0NCAxNS4xNTQ4IDIuNjQ4NDNDMTQuNDc3OCAxLjkzOTc3IDEzLjUxOTggMS41MDA0IDEyLjQ2MSAxLjUwMDRDMTAuNDIyNSAxLjUwMDQgOC43NjU4OSAzLjEzMDMyIDguNzY1ODkgNS4xMzU4M0M4Ljc2NTg5IDUuNDE5MjkgOC44MDE5IDUuNjk1NjcgOC44NTk1MiA1Ljk2NDk2QzUuNzkxMSA1LjgxNjE0IDMuMDY4NDEgNC4zNjMzOSAxLjI0NjA4IDIuMTY2NTRDMC45MjkxNTEgMi43MDUxMiAwLjc0OTA3OSAzLjMyODc0IDAuNzQ5MDc5IDMuOTk0ODhDMC43NDkwNzkgNS4yNTYzIDEuNDA0NTQgNi4zNjg5IDIuMzkxMzQgNy4wMjA4N0MxLjc4NjI5IDYuOTk5NjEgMS4yMTcyNyA2LjgzNjYyIDAuNzIwMjY3IDYuNTY3MzNDMC43MjAyNjcgNi41ODE1IDAuNzIwMjY3IDYuNTk1NjcgMC43MjAyNjcgNi42MTY5M0MwLjcyMDI2NyA4LjM3NDQxIDEuOTk1MTggOS44NDg0MyAzLjY4MDY1IDEwLjE4MTVDMy4zNzA5MyAxMC4yNjY1IDMuMDQ2OCAxMC4zMDkxIDIuNzA4MjYgMTAuMzA5MUMyLjQ3MDU3IDEwLjMwOTEgMi4yNDAwOCAxMC4yODc4IDIuMDE2NzkgMTAuMjQ1M0MyLjQ4NDk3IDExLjY5MDkgMy44NTM1MiAxMi43Mzk4IDUuNDY2OTcgMTIuNzY4MUM0LjE5OTI2IDEzLjc0NjEgMi42MDc0MiAxNC4zMjcyIDAuODc4NzMgMTQuMzI3MkMwLjU4MzQxMiAxNC4zMjcyIDAuMjg4MDk0IDE0LjMxMyAtMi4wOTgwOGUtMDUgMTQuMjc3NkMxLjYyNzgzIDE1LjI5OCAzLjU3MjYxIDE1LjkwMDQgNS42NTQyNCAxNS45MDA0WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg==",
                je = "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0wLjI5ODc2MiA1Ljk3NjIzSDQuMDI5MjlWMTguMDAwNkgwLjI5ODc2MlY1Ljk3NjIzWk02LjM2NzY3IDUuOTc1OTlIOS45NDUyVjcuNjE4NTlIOS45OTkyNUMxMC40OTQxIDYuNjc0MDYgMTEuNzEzNSA1LjY3OTYxIDEzLjUyNzIgNS42Nzk2MUMxNy4zMDI3IDUuNjc5NjEgMTguMDAwMiA4LjE2ODI1IDE4LjAwMDIgMTEuNDA3OVYxOC4wMDAzSDE0LjI3NDNWMTIuMTU0OEMxNC4yNzQzIDEwLjc1OTkgMTQuMjQ3MyA4Ljk2NDQ4IDEyLjMzNDggOC45NjQ0OEMxMC4zOTUyIDguOTY0NDggMTAuMDk4MyAxMC40ODU0IDEwLjA5ODMgMTIuMDUxVjE4LjAwMDJINi4zNjc2N1Y1Ljk3NTk5Wk0yLjE2NDQ3IDAuMDAwMjI4ODgyQzMuMzU2OTEgMC4wMDAyMjg4ODIgNC4zMjQ0OSAwLjk3MjQwMyA0LjMyNDQ5IDIuMTY1MDdDNC4zMjQ0OSAzLjM2MjEgMy4zNTY5MSA0LjMzMzYgMi4xNjQ0NyA0LjMzMzZDMC45Njc0NTIgNC4zMzM2IC0xLjUyNTg4ZS0wNSAzLjM2MjEgLTEuNTI1ODhlLTA1IDIuMTY1MDdDLTEuNTI1ODhlLTA1IDAuOTcyMjkxIDAuOTY3MzQgMC4wMDAyMjg4ODIgMi4xNjQ0NyAwLjAwMDIyODg4MloiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=";
            const Te = [{
                    name: "Leaderboard",
                    icon: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTExLjI1OTMgMTAuMzM4NEMxMS4yNjM0IDEwLjMzNjMgMTEuMjY3NSAxMC4zMzIxIDExLjI3MzYgMTAuMzNDMTIuMzk1MSA5Ljc2MjY2IDEzLjE5OTcgOC44MDEwMiAxMy43Nzg4IDcuNzM1MDhDMTQuODMxMyA3LjY4MDg0IDE1LjcxNTEgNy4yOTA3NiAxNi40MDM5IDYuNTYyNzVDMTguMDYxOCA0LjgxNDY5IDE4LjAwMjkgMS43NjkxNSAxNy45OTg4IDEuNjM5ODJDMTcuOTkyNyAxLjQxNDUzIDE3LjgxMTkgMS4yMzMwNSAxNy41OTI1IDEuMjMzMDVIMTUuMjQ3OFYwLjQxNzQyN0MxNS4yNDc4IDAuMTg3OTY4IDE1LjA2NDkgMC4wMDAyMjg4ODIgMTQuODQxNCAwLjAwMDIyODg4MkgzLjE2MDU3QzIuOTM3MDcgMC4wMDAyMjg4ODIgMi43NTQyMSAwLjE4Nzk2OCAyLjc1NDIxIDAuNDE3NDI3VjEuMjMzMDVIMC40MDc0NzhDMC4xODgwNDMgMS4yMzMwNSAwLjAwNzIxMjQxIDEuNDEyNDQgMC4wMDExMTcgMS42Mzk4MkMtMC4wMDI5NDY2MSAxLjc2OTE1IC0wLjA2MTg2OSA0LjgxMjYxIDEuNTk2MDggNi41NjI3NUMyLjI4NjkgNy4yOTA3NiAzLjE3MDczIDcuNjgwODQgNC4yMjExNyA3LjczNTA4QzQuODAwMjQgOC44MDMxIDUuNjA0ODMgOS43NjI2NiA2LjcyNjM5IDEwLjMzQzYuNzMyNDggMTAuMzM0MiA2LjczODU4IDEwLjMzODQgNi43NDI2NCAxMC4zNDA1QzYuNzk1NDcgMTAuMzcxOCA3LjI2MDc1IDEwLjY3NjMgNy41MTY3NiAxMS42MTA4QzcuNjg1NCAxMi4yMzY2IDcuNjg3NDMgMTIuOTQxNyA3LjUyMjg2IDEzLjYzODRMNy40ODgzMSAxMy43NzYxQzYuOTY2MTQgMTMuODk5MiA2LjA4NDM0IDE0LjE3MDQgNS44MjgzMyAxNC43NTQ0QzUuMjQ3MjMgMTQuOTAyNSA0LjY1ODAxIDE1LjEyMzYgNC40MzI0OCAxNS41MkMzLjYxMTYzIDE1LjY3ODUgMi44NDU2NCAxNS45NTM5IDIuODQ1NjQgMTYuNjQwMkMyLjg0NTY0IDE2LjY1NDggMi44NDU2NCAxNi42NjczIDIuODQ3NjcgMTYuNjgxOUMyLjkzMzAxIDE3LjU0MzQgNS4wNjAzMSAxOC4wMDAyIDguOTk5OTggMTguMDAwMkMxMi45NDM3IDE4LjAwMDIgMTUuMDcxIDE3LjU0MzQgMTUuMTUyMyAxNi42ODE5QzE1LjE1NDMgMTYuNjY5NCAxNS4xNTQzIDE2LjY1NDggMTUuMTU0MyAxNi42NDIzQzE1LjE1NDMgMTUuOTU4IDE0LjM5MjQgMTUuNjgyNyAxMy41NzU2IDE1LjUyNDJDMTMuMzU4MiAxNS4xMTMyIDEyLjc4MzIgMTQuODkgMTIuMjU5IDE0Ljc1MjNDMTIuMDY4IDE0LjMxNDMgMTEuNDkxIDEzLjk4ODkgMTAuNTA5NiAxMy43NjM2TDEwLjQ4MTIgMTMuNjQ4OUMxMC4zMTI1IDEyLjk0MzggMTAuMzEyNSAxMi4yNDA4IDEwLjQ4NTIgMTEuNjEyOUMxMC43MjkgMTAuNzA1NSAxMS4xNzIgMTAuMzkyNiAxMS4yNTkzIDEwLjMzODRaTTE3LjE3NiAyLjA2NzQ0QzE3LjEzMzMgMi45MDE4NCAxNi45MTE4IDQuODI5MjkgMTUuODE4NyA1Ljk4MDc2QzE1LjM3OTggNi40NDE3NiAxNC44MzczIDYuNzMzOCAxNC4xOTk0IDYuODUwNjJDMTUuMTIxOCA0LjY1NDA3IDE1LjIzOTYgMi4zNDI3OSAxNS4yNDc4IDIuMTczODNWMi4wNjc0NEgxNy4xNzZaTTIuMTgxMjQgNS45ODA3NkMxLjA4ODEzIDQuODI5MjkgMC44NjY2NjUgMi45MDM5MyAwLjgyMzk5OCAyLjA2NzQ0SDIuNzU0MjFWMi4xOTQ2OUMyLjc2MDMxIDIuMzUxMTQgMi44ODAxOCA0LjY1ODI0IDMuODAwNTkgNi44NTI3QzMuMTY0NjQgNi43MzM4IDIuNjIwMTEgNi40NDM4NSAyLjE4MTI0IDUuOTgwNzZaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K",
                    link: D.vW
                }, {
                    name: "Discord",
                    icon: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMzYiIHZpZXdCb3g9IjAgMCAzNiAzNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTI0LjIzNzggMTIuMzg3NkMyMy4wOTA1IDExLjg2MTEgMjEuODYwMiAxMS40NzMzIDIwLjU3MzkgMTEuMjUxMkMyMC41NTA1IDExLjI0NjkgMjAuNTI3MSAxMS4yNTc2IDIwLjUxNSAxMS4yNzlDMjAuMzU2OCAxMS41NjA0IDIwLjE4MTUgMTEuOTI3NiAyMC4wNTg4IDEyLjIxNjFDMTguNjc1MyAxMi4wMDkgMTcuMjk4OSAxMi4wMDkgMTUuOTQzNyAxMi4yMTYxQzE1LjgyMSAxMS45MjEyIDE1LjYzOTQgMTEuNTYwNCAxNS40ODA0IDExLjI3OUMxNS40Njg0IDExLjI1ODMgMTUuNDQ1IDExLjI0NzYgMTUuNDIxNSAxMS4yNTEyQzE0LjEzNTkgMTEuNDcyNiAxMi45MDU3IDExLjg2MDQgMTEuNzU3NyAxMi4zODc2QzExLjc0NzggMTIuMzkxOCAxMS43MzkyIDEyLjM5OSAxMS43MzM2IDEyLjQwODNDOS40MDAwNCAxNS44OTQ1IDguNzYwNzkgMTkuMjk1MSA5LjA3NDM5IDIyLjY1MzVDOS4wNzU4IDIyLjY3IDkuMDg1MDMgMjIuNjg1NyA5LjA5NzggMjIuNjk1N0MxMC42Mzc0IDIzLjgyNjMgMTIuMTI4OCAyNC41MTI3IDEzLjU5MjUgMjQuOTY3N0MxMy42MTU5IDI0Ljk3NDkgMTMuNjQwNyAyNC45NjYzIDEzLjY1NTYgMjQuOTQ3QzE0LjAwMTggMjQuNDc0MiAxNC4zMTA1IDIzLjk3NTYgMTQuNTc1MSAyMy40NTEzQzE0LjU5MDcgMjMuNDIwNiAxNC41NzU4IDIzLjM4NDIgMTQuNTQzOSAyMy4zNzIxQzE0LjA1NDMgMjMuMTg2NCAxMy41ODgyIDIyLjk1OTkgMTMuMTM5OCAyMi43MDI4QzEzLjEwNDMgMjIuNjgyMSAxMy4xMDE1IDIyLjYzMTQgMTMuMTM0MSAyMi42MDcxQzEzLjIyODUgMjIuNTM2NCAxMy4zMjI5IDIyLjQ2MjggMTMuNDEzIDIyLjM4ODVDMTMuNDI5MyAyMi4zNzUgMTMuNDUyIDIyLjM3MjEgMTMuNDcxMSAyMi4zODA3QzE2LjQxNyAyMy43MjU2IDE5LjYwNjIgMjMuNzI1NiAyMi41MTcyIDIyLjM4MDdDMjIuNTM2NCAyMi4zNzE0IDIyLjU1OTEgMjIuMzc0MyAyMi41NzYxIDIyLjM4NzhDMjIuNjY2MiAyMi40NjIxIDIyLjc2MDYgMjIuNTM2NCAyMi44NTU3IDIyLjYwNzFDMjIuODg4MyAyMi42MzE0IDIyLjg4NjIgMjIuNjgyMSAyMi44NTA3IDIyLjcwMjhDMjIuNDAyMyAyMi45NjQ5IDIxLjkzNjEgMjMuMTg2NCAyMS40NDU5IDIzLjM3MTRDMjEuNDE0IDIzLjM4MzUgMjEuMzk5OCAyMy40MjA2IDIxLjQxNTQgMjMuNDUxM0MyMS42ODU3IDIzLjk3NDkgMjEuOTk0MyAyNC40NzM0IDIyLjMzNDIgMjQuOTQ2M0MyMi4zNDg0IDI0Ljk2NjMgMjIuMzczOSAyNC45NzQ5IDIyLjM5NzMgMjQuOTY3N0MyMy44NjgxIDI0LjUxMjcgMjUuMzU5NSAyMy44MjYzIDI2Ljg5OTEgMjIuNjk1N0MyNi45MTI2IDIyLjY4NTcgMjYuOTIxMSAyMi42NzA3IDI2LjkyMjUgMjIuNjU0MkMyNy4yOTc4IDE4Ljc3MTUgMjYuMjkzOSAxNS4zOTg5IDI0LjI2MTIgMTIuNDA5QzI0LjI1NjIgMTIuMzk5IDI0LjI0NzcgMTIuMzkxOCAyNC4yMzc4IDEyLjM4NzZaTTE1LjAxNSAyMC42MDg2QzE0LjEyODEgMjAuNjA4NiAxMy4zOTczIDE5Ljc5NDQgMTMuMzk3MyAxOC43OTQ0QzEzLjM5NzMgMTcuNzk0NCAxNC4xMTQgMTYuOTgwMiAxNS4wMTUgMTYuOTgwMkMxNS45MjMyIDE2Ljk4MDIgMTYuNjQ2OSAxNy44MDE2IDE2LjYzMjcgMTguNzk0NEMxNi42MzI3IDE5Ljc5NDQgMTUuOTE2MSAyMC42MDg2IDE1LjAxNSAyMC42MDg2Wk0yMC45OTYxIDIwLjYwODZDMjAuMTA5MiAyMC42MDg2IDE5LjM3ODQgMTkuNzk0NCAxOS4zNzg0IDE4Ljc5NDRDMTkuMzc4NCAxNy43OTQ0IDIwLjA5NSAxNi45ODAyIDIwLjk5NjEgMTYuOTgwMkMyMS45MDQyIDE2Ljk4MDIgMjIuNjI3OSAxNy44MDE2IDIyLjYxMzcgMTguNzk0NEMyMi42MTM3IDE5Ljc5NDQgMjEuOTA0MiAyMC42MDg2IDIwLjk5NjEgMjAuNjA4NloiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=",
                    link: "https://discord.gg/bitfinex"
                }, {
                    name: "Twiiter",
                    icon: se,
                    link: "https://twitter.com/bitfinex"
                }, {
                    name: "Telegram",
                    icon: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTAuMzE3ODkgOC43OTcxOUw0LjQ2NTQ2IDEwLjM3NzZMNi4wNzA4MiAxNS42NDg1QzYuMTczNTQgMTUuOTg2IDYuNTc3ODggMTYuMTEwOCA2Ljg0NjI2IDE1Ljg4NjhMOS4xNTgxOCAxMy45NjI2QzkuNDAwNTIgMTMuNzYxIDkuNzQ1NyAxMy43NTEgOS45OTg5NiAxMy45Mzg3TDE0LjE2ODggMTcuMDI5NUMxNC40NTU5IDE3LjI0MjUgMTQuODYyNyAxNy4wODE5IDE0LjkzNDcgMTYuNzI3N0wxNy45ODk0IDEuNzI2NzRDMTguMDY4IDEuMzM5ODUgMTcuNjk1NiAxLjAxNzA5IDE3LjMzNDggMS4xNTk1OEwwLjMxMzAzIDcuODYzNDdDLTAuMTA3MDMxIDguMDI4ODYgLTAuMTAzMzcxIDguNjM2MDIgMC4zMTc4OSA4Ljc5NzE5Wk01LjgxMjEgOS41MzYzTDEzLjkxOCA0LjQzOTM5QzE0LjA2MzcgNC4zNDgwNiAxNC4yMTM1IDQuNTQ5MTYgMTQuMDg4NCA0LjY2NzYzTDcuMzk4NzQgMTEuMDE2MkM3LjE2MzYgMTEuMjM5NiA3LjAxMTkyIDExLjUzODcgNi45Njg5NiAxMS44NjMzTDYuNzQxMDggMTMuNTg3NEM2LjcxMDkgMTMuODE3NiA2LjM5NDE2IDEzLjg0MDQgNi4zMzE5NCAxMy42MTc2TDUuNDU1NTIgMTAuNDczN0M1LjM1NTE0IDEwLjExNTEgNS41MDE0MiA5LjczMjA3IDUuODEyMSA5LjUzNjNaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K",
                    link: "https://t.me/bitfinex"
                }, {
                    name: "Instagram",
                    icon: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik04Ljk5OTk0IDEuNjIxODFDMTEuNDAzIDEuNjIxODEgMTEuNjg3NyAxLjYzMDk4IDEyLjYzNjggMS42NzQyMUMxMy41MTQgMS43MTQyNiAxMy45OTA2IDEuODYwOTYgMTQuMzA3NiAxLjk4NDFDMTQuNzI3OCAyLjE0NzQgMTUuMDI3NyAyLjM0MjQ0IDE1LjM0MjYgMi42NTczNUMxNS42NTc2IDIuOTcyMzYgMTUuODUyNiAzLjI3MjExIDE2LjAxNiAzLjY5MjIyQzE2LjEzOTIgNC4wMDkzNSAxNi4yODU5IDQuNDg1OTEgMTYuMzI1OCA1LjM2MzM3QzE2LjM2OSA2LjMxMjM0IDE2LjM3ODIgNi41OTcwNCAxNi4zNzgyIDkuMDAwMTJDMTYuMzc4MiAxMS40MDMyIDE2LjM2OSAxMS42ODc5IDE2LjMyNTggMTIuNjM3QzE2LjI4NTkgMTMuNTE0NCAxNi4xMzkyIDEzLjk5MDkgMTYuMDE2IDE0LjMwNzlDMTUuODUyOCAxNC43MjgxIDE1LjY1NzYgMTUuMDI3OCAxNS4zNDI2IDE1LjM0MjhDMTUuMDI3NyAxNS42NTc4IDE0LjcyNzkgMTUuODUyOCAxNC4zMDc2IDE2LjAxNjJDMTMuOTkwNiAxNi4xMzk0IDEzLjUxMzggMTYuMjg2MiAxMi42MzY4IDE2LjMyNjFDMTEuNjg3NyAxNi4zNjk0IDExLjQwMzMgMTYuMzc4NSA4Ljk5OTk0IDE2LjM3ODVDNi41OTY2NyAxNi4zNzg1IDYuMzEyMDYgMTYuMzY5NCA1LjM2MzE5IDE2LjMyNjFDNC40ODU3MyAxNi4yODYyIDQuMDA5MTYgMTYuMTM5NCAzLjY5MjA0IDE2LjAxNjJDMy4yNzE5MyAxNS44NTMgMi45NzIxNyAxNS42NTc4IDIuNjU3MTcgMTUuMzQyOEMyLjM0MjE2IDE1LjAyNzggMi4xNDcyMiAxNC43MjgxIDEuOTgzOTIgMTQuMzA3OUMxLjg2MDc4IDEzLjk5MDkgMS43MTM5OSAxMy41MTQzIDEuNjc0MDMgMTIuNjM3QzEuNjMwNyAxMS42ODc5IDEuNjIxNTMgMTEuNDAzMyAxLjYyMTUzIDkuMDAwMTJDMS42MjE1MyA2LjU5NzA0IDEuNjMwNyA2LjMxMjQ0IDEuNjc0MDMgNS4zNjMzN0MxLjcxMzk5IDQuNDg1OTEgMS44NjA3OCA0LjAwOTM1IDEuOTgzOTIgMy42OTIyMkMyLjE0NzIyIDMuMjcyMTEgMi4zNDIxNiAyLjk3MjM2IDIuNjU3MTcgMi42NTczNUMyLjk3MjA4IDIuMzQyNDQgMy4yNzE5MyAyLjE0NzQgMy42OTIwNCAxLjk4NDFDNC4wMDkxNiAxLjg2MDg2IDQuNDg1NzMgMS43MTQyNiA1LjM2MzE5IDEuNjc0MjFDNi4zMTIyNiAxLjYzMDk4IDYuNTk2ODYgMS42MjE4MSA4Ljk5OTk0IDEuNjIxODFaTTguOTk5OTQgMC4wMDAyMjg4ODJDNi41NTU2NSAwLjAwMDIyODg4MiA2LjI0OTE0IDAuMDEwNTU1MyA1LjI4OTI2IDAuMDU0MzcwNUM0LjMzMTMxIDAuMDk4MTg1NiAzLjY3NzA4IDAuMjUwMjg0IDMuMTA0NTggMC40NzI3MzdDMi41MTI3OSAwLjcwMjcxOCAyLjAxMDg1IDEuMDEwNDkgMS41MTA1NCAxLjUxMDc5QzEuMDEwMjQgMi4wMTEwOSAwLjcwMjQ3NCAyLjUxMzAzIDAuNDcyNDkzIDMuMTA0ODNDMC4yNDk5NDMgMy42Nzc0MiAwLjA5Nzg0NDkgNC4zMzE1NSAwLjA1NDEyNjMgNS4yODk1QzAuMDEwMzExMiA2LjI0OTM4IC0xLjUyNTg4ZS0wNSA2LjU1NTg5IC0xLjUyNTg4ZS0wNSA5LjAwMDA4Qy0xLjUyNTg4ZS0wNSAxMS40NDQ0IDAuMDEwMjE0NyAxMS43NTA4IDAuMDU0MTI2MyAxMi43MTA3QzAuMDk3ODQ0OSAxMy42Njg4IDAuMjQ5OTQzIDE0LjMyMjggMC40NzI0OTMgMTQuODk1M0MwLjcwMjQ3NCAxNS40ODcyIDEuMDEwMjQgMTUuOTg5MiAxLjUxMDU0IDE2LjQ4OTZDMi4wMTA5NCAxNi45OTAxIDIuNTEyNzkgMTcuMjk3NiAzLjEwNDU4IDE3LjUyNzZDMy42NzcwOCAxNy43NTAzIDQuMzMxMjEgMTcuOTAyNCA1LjI4OTI2IDE3Ljk0NjFDNi4yNDkxNCAxNy45ODk4IDYuNTU1NjUgMTguMDAwMiA4Ljk5OTk0IDE4LjAwMDJDMTEuNDQ0MSAxOC4wMDAyIDExLjc1MDUgMTcuOTg5OSAxMi43MTA2IDE3Ljk0NjFDMTMuNjY4NiAxNy45MDI0IDE0LjMyMjggMTcuNzUwMyAxNC44OTUxIDE3LjUyNzZDMTUuNDg3IDE3LjI5NzYgMTUuOTg4OSAxNi45OTAxIDE2LjQ4OTQgMTYuNDg5NkMxNi45ODk4IDE1Ljk4OTIgMTcuMjk3MyAxNS40ODcyIDE3LjUyNzUgMTQuODk1M0MxNy43NSAxNC4zMjI4IDE3LjkwMjEgMTMuNjY4OCAxNy45NDU3IDEyLjcxMDdDMTcuOTg5NSAxMS43NTA5IDE4IDExLjQ0NDQgMTggOS4wMDAwOEMxOCA2LjU1NTg5IDE3Ljk4OTggNi4yNDk0OCAxNy45NDU3IDUuMjg5NUMxNy45MDIxIDQuMzMxNTUgMTcuNzUgMy42NzczMiAxNy41Mjc1IDMuMTA0ODNDMTcuMjk3MyAyLjUxMzAzIDE2Ljk4OTggMi4wMTEwOSAxNi40ODk0IDEuNTEwNzlDMTUuOTg4OSAxLjAxMDQ5IDE1LjQ4NyAwLjcwMjcxOCAxNC44OTUxIDAuNDcyNzM3QzE0LjMyMjggMC4yNTAyODQgMTMuNjY4NiAwLjA5ODE4NTYgMTIuNzEwNiAwLjA1NDM3MDVDMTEuNzUwNiAwLjAxMDU1NTMgMTEuNDQ0MSAwLjAwMDIyODg4MiA4Ljk5OTk0IDAuMDAwMjI4ODgyWk05LjAwMDczIDQuMzc4NTZDNi40NDgyNiA0LjM3ODU2IDQuMzc5MSA2LjQ0NzcyIDQuMzc5MSA5LjAwMDA5QzQuMzc5MSAxMS41NTI2IDYuNDQ4MjYgMTMuNjIxNiA5LjAwMDczIDEzLjYyMTZDMTEuNTUzMSAxMy42MjE2IDEzLjYyMjIgMTEuNTUyNyAxMy42MjIyIDkuMDAwMDlDMTMuNjIyMyA2LjQ0NzcyIDExLjU1MzEgNC4zNzg1NiA5LjAwMDczIDQuMzc4NTZaTTkuMDAwNzIgMTEuOTk5OUM3LjM0Mzg1IDExLjk5OTkgNi4wMDA3MyAxMC42NTY5IDYuMDAwNzMgOS4wMDAwM0M2LjAwMDczIDcuMzQzMjYgNy4zNDM4NSA2LjAwMDE0IDkuMDAwNzIgNi4wMDAxNEMxMC42NTc1IDYuMDAwMTQgMTIuMDAwNSA3LjM0MzI2IDEyLjAwMDUgOS4wMDAwM0MxMi4wMDA2IDEwLjY1NjkgMTAuNjU3NiAxMS45OTk5IDkuMDAwNzIgMTEuOTk5OVpNMTQuODg0MSA0LjE5NTg5QzE0Ljg4NDEgNC43OTIzMSAxNC40MDA2IDUuMjc1ODIgMTMuODA0IDUuMjc1ODJDMTMuMjA3NiA1LjI3NTgyIDEyLjcyNDMgNC43OTIyMiAxMi43MjQzIDQuMTk1ODlDMTIuNzI0MyAzLjU5OTM2IDEzLjIwNzkgMy4xMTU5NSAxMy44MDQgMy4xMTU5NUMxNC40MDA2IDMuMTE1ODUgMTQuODg0MSAzLjU5OTM2IDE0Ljg4NDEgNC4xOTU4OVoiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=",
                    link: "https://www.instagram.com/bitfinex/"
                }, {
                    name: "Pulse",
                    icon: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0zLjQ2NzI2IDIuNTkwMThDMy42OTM3IDIuODAyODYgMy43MDQ4NSAzLjE1ODg0IDMuNDkyMTcgMy4zODUyOEMyLjE0NDQ4IDQuODIwMTUgMS4zMTIzMiA2Ljc4MDU4IDEuMzEyMzIgOC45NDY0NUMxLjMxMjMyIDExLjE2MzIgMi4xODQwNyAxMy4xNjQ4IDMuNTg4MDcgMTQuNjA3OUMzLjgwNDcgMTQuODMwNiAzLjc5OTgxIDE1LjE4NjcgMy41NzcxNCAxNS40MDM0QzMuMzU0NDggMTUuNjIgMi45OTgzNiAxNS42MTUxIDIuNzgxNzIgMTUuMzkyNEMxLjE3NzgzIDEzLjc0MzkgMC4xODczMTcgMTEuNDYyNSAwLjE4NzMxNyA4Ljk0NjQ1QzAuMTg3MzE3IDYuNDg4MTkgMS4xMzI4NCA0LjI1Mzk4IDIuNjcyMTUgMi42MTUwOUMyLjg4NDg0IDIuMzg4NjUgMy4yNDA4MiAyLjM3NzQ5IDMuNDY3MjYgMi41OTAxOFpNMTQuNTMyNCAyLjU5MDE4QzE0Ljc1ODggMi4zNzc0OSAxNS4xMTQ4IDIuMzg4NjUgMTUuMzI3NSAyLjYxNTA5QzE2Ljg2NjggNC4yNTM5OCAxNy44MTIzIDYuNDg4MTkgMTcuODEyMyA4Ljk0NjQ1QzE3LjgxMjMgMTEuNDYyNSAxNi44MjE4IDEzLjc0MzkgMTUuMjE3OSAxNS4zOTI0QzE1LjAwMTMgMTUuNjE1MSAxNC42NDUyIDE1LjYyIDE0LjQyMjUgMTUuNDAzNEMxNC4xOTk4IDE1LjE4NjcgMTQuMTk0OSAxNC44MzA2IDE0LjQxMTYgMTQuNjA3OUMxNS44MTU2IDEzLjE2NDggMTYuNjg3MyAxMS4xNjMyIDE2LjY4NzMgOC45NDY0NUMxNi42ODczIDYuNzgwNTggMTUuODU1MiA0LjgyMDE1IDE0LjUwNzUgMy4zODUyOEMxNC4yOTQ4IDMuMTU4ODQgMTQuMzA1OSAyLjgwMjg2IDE0LjUzMjQgMi41OTAxOFpNNC45MjA3NSA0LjE5MTMxQzUuMTUwNTEgNC40MDA0IDUuMTY3MjcgNC43NTYxNiA0Ljk1ODE3IDQuOTg1OTJDNC4wMTkwMSA2LjAxNzkyIDMuNDQxMzUgNy40MTAyOCAzLjQ0MTM1IDguOTQ2NDVDMy40NDEzNSAxMC41MjUgNC4wNTEzNyAxMS45NTE4IDUuMDM2ODUgMTIuOTkxN0M1LjI1MDU1IDEzLjIxNzIgNS4yNDA5OCAxMy41NzMyIDUuMDE1NSAxMy43ODY5QzQuNzkwMDEgMTQuMDAwNiA0LjQzMzk4IDEzLjk5MSA0LjIyMDI5IDEzLjc2NTVDMy4wNDEwOSAxMi41MjEzIDIuMzE2MzUgMTAuODE5MiAyLjMxNjM1IDguOTQ2NDVDMi4zMTYzNSA3LjEyNDEgMy4wMDI2MyA1LjQ2MzMgNC4xMjYxNCA0LjIyODczQzQuMzM1MjMgMy45OTg5NyA0LjY5MDk5IDMuOTgyMjIgNC45MjA3NSA0LjE5MTMxWk0xMy4wNzg5IDQuMTkxMzFDMTMuMzA4NiAzLjk4MjIyIDEzLjY2NDQgMy45OTg5NyAxMy44NzM1IDQuMjI4NzNDMTQuOTk3IDUuNDYzMyAxNS42ODMzIDcuMTI0MSAxNS42ODMzIDguOTQ2NDVDMTUuNjgzMyAxMC44MTkyIDE0Ljk1ODUgMTIuNTIxMyAxMy43NzkzIDEzLjc2NTVDMTMuNTY1NyAxMy45OTEgMTMuMjA5NiAxNC4wMDA2IDEyLjk4NDEgMTMuNzg2OUMxMi43NTg3IDEzLjU3MzIgMTIuNzQ5MSAxMy4yMTcyIDEyLjk2MjggMTIuOTkxN0MxMy45NDgzIDExLjk1MTggMTQuNTU4MyAxMC41MjUgMTQuNTU4MyA4Ljk0NjQ1QzE0LjU1ODMgNy40MTAyOCAxMy45ODA2IDYuMDE3OTIgMTMuMDQxNSA0Ljk4NTkyQzEyLjgzMjQgNC43NTYxNiAxMi44NDkxIDQuNDAwNCAxMy4wNzg5IDQuMTkxMzFaTTYuNjc1NTEgNS41NDA2MkM2Ljg5MTY4IDUuNzYzNzMgNi44ODYwNCA2LjExOTg0IDYuNjYyOTMgNi4zMzYwMUM1Ljk5MjI4IDYuOTg1NzcgNS41NzAzOCA3LjkxMjc0IDUuNTcwMzggOC45NDY0NUM1LjU3MDM4IDkuNDYyMTggNS42NzUzMSA5Ljk1MDYzIDUuODYzMjggMTAuMzkxMkM1Ljk4NTE4IDEwLjY3NyA1Ljg1MjM1IDExLjAwNzQgNS41NjY2MSAxMS4xMjkzQzUuMjgwODYgMTEuMjUxMiA0Ljk1MDQgMTEuMTE4NCA0LjgyODUgMTAuODMyN0M0LjU4MTgxIDEwLjI1NDQgNC40NDUzOCA5LjYxNTk0IDQuNDQ1MzggOC45NDY0NUM0LjQ0NTM4IDcuNjAxOCA0Ljk5NTM4IDYuMzg1MjEgNS44ODAxMSA1LjUyODAzQzYuMTAzMjMgNS4zMTE4NyA2LjQ1OTM0IDUuMzE3NSA2LjY3NTUxIDUuNTQwNjJaTTEyLjQ3ODMgNi44NDE1NEMxMi43NjY2IDYuNzI1NzggMTMuMDk0MiA2Ljg2NTY0IDEzLjIwOTkgNy4xNTM5MkMxMy40MzIxIDcuNzA3MjEgMTMuNTU0MyA4LjMxMjk3IDEzLjU1NDMgOC45NDY0NUMxMy41NTQzIDEwLjI5MTEgMTMuMDA0MyAxMS41MDc3IDEyLjExOTUgMTIuMzY0OUMxMS44OTY0IDEyLjU4MSAxMS41NDAzIDEyLjU3NTQgMTEuMzI0MSAxMi4zNTIzQzExLjEwOCAxMi4xMjkyIDExLjExMzYgMTEuNzczMSAxMS4zMzY3IDExLjU1NjlDMTIuMDA3NCAxMC45MDcxIDEyLjQyOTMgOS45ODAxNiAxMi40MjkzIDguOTQ2NDVDMTIuNDI5MyA4LjQ1ODM5IDEyLjMzNTMgNy45OTQ4MiAxMi4xNjYgNy41NzMxNEMxMi4wNTAyIDcuMjg0ODUgMTIuMTkgNi45NTczMSAxMi40NzgzIDYuODQxNTRaTTguOTk5ODIgOC4wNDk5MUM4LjU0OTI4IDguMDQ5OTEgOC4xNTE4MyA4LjQzMzIxIDguMTUxODMgOC45NDY0NUM4LjE1MTgzIDkuNDU5NjkgOC41NDkyOCA5Ljg0Mjk4IDguOTk5ODIgOS44NDI5OEM5LjQ1MDM1IDkuODQyOTggOS44NDc4IDkuNDU5NjkgOS44NDc4IDguOTQ2NDVDOS44NDc4IDguNDMzMjEgOS40NTAzNSA4LjA0OTkxIDguOTk5ODIgOC4wNDk5MVpNNy4wMjY4MyA4Ljk0NjQ1QzcuMDI2ODMgNy44NDgwOCA3Ljg5MjM4IDYuOTI0OTEgOC45OTk4MiA2LjkyNDkxQzEwLjEwNzMgNi45MjQ5MSAxMC45NzI4IDcuODQ4MDggMTAuOTcyOCA4Ljk0NjQ1QzEwLjk3MjggMTAuMDQ0OCAxMC4xMDczIDEwLjk2OCA4Ljk5OTgyIDEwLjk2OEM3Ljg5MjM4IDEwLjk2OCA3LjAyNjgzIDEwLjA0NDggNy4wMjY4MyA4Ljk0NjQ1WiIgZmlsbD0id2hpdGUiLz4KPC9zdmc+Cg==",
                    link: "https://pulse.bitfinex.com/profile/Bitfinex"
                }, {
                    name: "Linkedin",
                    icon: je,
                    link: "https://www.linkedin.com/company/bitfinex/"
                }, {
                    name: "Reddit",
                    icon: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTE4IDguNDU5NDhDMTggNy4zNjUyMyAxNy4xMDYgNi40NzU3MyAxNi4wMDcyIDYuNDc1NzNDMTUuNDcxIDYuNDc1NzMgMTQuOTg1IDYuNjkwMjMgMTQuNjI3MiA3LjAzNTIzQzEzLjI2OTcgNi4xNDE5OCAxMS40MzMgNS41NzM0OCA5LjM5ODk4IDUuNTAwNzNMMTAuNTExMiAxLjk5ODk4TDEzLjUyMzIgMi43MDQ3M0wxMy41MTg3IDIuNzQ4MjNDMTMuNTE4NyAzLjY0Mjk4IDE0LjI1IDQuMzcwNDggMTUuMTQ5MiA0LjM3MDQ4QzE2LjA0NzcgNC4zNzA0OCAxNi43NzgyIDMuNjQyOTggMTYuNzc4MiAyLjc0ODIzQzE2Ljc3ODIgMS44NTM0OCAxNi4wNDcgMS4xMjUyMyAxNS4xNDkyIDEuMTI1MjNDMTQuNDU5MiAxLjEyNTIzIDEzLjg3MTIgMS41NTU3MyAxMy42MzM1IDIuMTU5NDhMMTAuMzg2NyAxLjM5ODIzQzEwLjI0NSAxLjM2MzczIDEwLjEwMSAxLjQ0NTQ4IDEwLjA1NjcgMS41ODQ5OEw4LjgxNjIzIDUuNDkwMjNDNi42ODc3MyA1LjUxNTczIDQuNzU5NDggNi4wODg3MyAzLjM0MTIzIDcuMDA4OThDMi45ODU3MyA2LjY4MDQ4IDIuNTEzOTggNi40NzQ5OCAxLjk5MTk4IDYuNDc0OThDMC44OTMyMzUgNi40NzQ5OCAtMS41MjU4OGUtMDUgNy4zNjUyMyAtMS41MjU4OGUtMDUgOC40NTk0OEMtMS41MjU4OGUtMDUgOS4xODY5OCAwLjM5OTczNSA5LjgxNzczIDAuOTg3NzM1IDEwLjE2MjdDMC45NDg3MzUgMTAuMzc0MiAwLjkyMzIzNSAxMC41ODggMC45MjMyMzUgMTAuODA1NUMwLjkyMzIzNSAxMy43Mzg3IDQuNTI5MjMgMTYuMTI1MiA4Ljk2MjQ4IDE2LjEyNTJDMTMuMzk1NyAxNi4xMjUyIDE3LjAwMjUgMTMuNzM4NyAxNy4wMDI1IDEwLjgwNTVDMTcuMDAyNSAxMC42IDE2Ljk4MDcgMTAuMzk3NSAxNi45NDYyIDEwLjE5OEMxNy41NzAyIDkuODYyNzMgMTggOS4yMTM5OCAxOCA4LjQ1OTQ4Wk01LjA4MTk4IDkuODIxNDhDNS4wODE5OCA5LjE3MDQ4IDUuNjE0NDggOC42NDAyMyA2LjI2ODQ4IDguNjQwMjNDNi45MjI0OCA4LjY0MDIzIDcuNDU0MjQgOS4xNzA0OCA3LjQ1NDI0IDkuODIxNDhDNy40NTQyNCAxMC40NzI1IDYuOTIyNDggMTEuMDAyIDYuMjY4NDggMTEuMDAyQzUuNjE0NDggMTEuMDAyIDUuMDgxOTggMTAuNDcyNSA1LjA4MTk4IDkuODIxNDhaTTExLjg3NzcgMTMuMzIzMkMxMS4yOCAxMy45MTggMTAuMzQxNyAxNC4yMDc1IDkuMDA5NzMgMTQuMjA3NUw4Ljk5OTk4IDE0LjIwNTJMOC45OTAyNCAxNC4yMDc1QzcuNjU3NDkgMTQuMjA3NSA2LjcxOTIzIDEzLjkxOCA2LjEyMjIzIDEzLjMyMzJDNi4wMTM0OCAxMy4yMTUyIDYuMDEzNDggMTMuMDM5IDYuMTIyMjMgMTIuOTMxQzYuMjMwOTggMTIuODIyMiA2LjQwNzk4IDEyLjgyMjIgNi41MTY3NCAxMi45MzFDNy4wMDQyMyAxMy40MTYyIDcuODEzNDkgMTMuNjUxNyA4Ljk5MDI0IDEzLjY1MTdMOC45OTk5OCAxMy42NTRMOS4wMDk3MyAxMy42NTE3QzEwLjE4NjUgMTMuNjUxNyAxMC45OTU3IDEzLjQxNTUgMTEuNDgzMiAxMi45MzAyQzExLjU5MiAxMi44MjE1IDExLjc2OSAxMi44MjIyIDExLjg3NzcgMTIuOTMwMkMxMS45ODY1IDEzLjAzOSAxMS45ODY1IDEzLjIxNDUgMTEuODc3NyAxMy4zMjMyWk0xMS43MzYgMTEuMDAyQzExLjA4MiAxMS4wMDIgMTAuNTUwMiAxMC40NzI1IDEwLjU1MDIgOS44MjE0OEMxMC41NTAyIDkuMTcwNDggMTEuMDgyIDguNjQwMjMgMTEuNzM2IDguNjQwMjNDMTIuMzkgOC42NDAyMyAxMi45MjE3IDkuMTcwNDggMTIuOTIxNyA5LjgyMTQ4QzEyLjkyMTcgMTAuNDcyNSAxMi4zOSAxMS4wMDIgMTEuNzM2IDExLjAwMloiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=",
                    link: "https://www.reddit.com/r/bitfinex/"
                }, {
                    name: "Facebook",
                    icon: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMC42MzI5IDE4LjAwMDJWOS45MzIwN0gxMy40MjA4TDEzLjgzNjYgNi42ODI1MUgxMC42MzNWNC42MTI2N0MxMC42MzMgMy42NzIzNiAxMC44OTMyIDMuMDMzMzggMTIuMjM0OSAzLjAzMzM4SDEzLjk1VjAuMTI1OTU1QzEzLjY1MjMgMC4wOTAzMTc1IDEyLjYzNjMgMC4wMDAyMjg4ODIgMTEuNDU1MSAwLjAwMDIyODg4MkM4Ljk4NDIgMC4wMDAyMjg4ODIgNy4yOTI1IDEuNTEyMTIgNy4yOTI1IDQuMjkzMjJWNi42ODI1MUg0LjQ5OTk3VjkuOTMyMDdINy4yOTI0VjE4LjAwMDJIMTAuNjMyOVoiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=",
                    link: "https://www.facebook.com/bitfinex"
                }, {
                    name: "Coingecko",
                    icon: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHZpZXdCb3g9IjAgMCAxOCAxOCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xNi41MDUxIDEzLjk2NzJDMTcuNDg3NiAxMi40ODI4IDE4LjAwNzggMTAuNzQwNiAxNy45OTk4IDguOTYwNDlDMTcuOTk0NyA3Ljc3ODY0IDE3Ljc1NjYgNi42MDkyOCAxNy4yOTk2IDUuNTE5M0MxNi44NDI0IDQuNDI5NDUgMTYuMTc1MSAzLjQ0MDE0IDE1LjMzNTggMi42MDgyQzE0LjQ5NjMgMS43NzYxMiAxMy41MDEyIDEuMTE3NjMgMTIuNDA3MiAwLjY3MDA3MUMxMS4zMTMzIDAuMjIyNjUyIDEwLjE0MiAtMC4wMDQ5MDE4NiA4Ljk2MDE0IDAuMDAwMzE2NjQ1QzcuMTgwMDggMC4wMDgxNDQ0IDUuNDQyNDUgMC41NDM3MjggMy45NjY3MSAxLjUzOTIzQzIuNDkxMTEgMi41MzQ1OSAxLjM0MzczIDMuOTQ1MzcgMC42Njk4NTUgNS41OTI5MUMtMC4wMDQwMTkwMyA3LjI0MDQ0IC0wLjE3NDE3IDkuMDUwNzIgMC4xODA2ODkgMTAuNzk1MUMwLjUzNTY4NCAxMi41MzkzIDEuNDAwMDMgMTQuMTM5MiAyLjY2NDE1IDE1LjM5MjJDMy45Mjg0IDE2LjY0NTMgNS41MzU4NCAxNy40OTU0IDcuMjgzMjEgMTcuODM0OEM5LjAzMDQ1IDE4LjE3NDQgMTAuODM5MyAxNy45ODgyIDEyLjQ4MDggMTcuMjk5OEMxNC4xMjIzIDE2LjYxMTQgMTUuNTIyOCAxNS40NTE2IDE2LjUwNTEgMTMuOTY3MlpNMTUuOTQyNiAxMy41OTY3QzE2Ljg1MDcgMTIuMjIzMyAxNy4zMzEgMTAuNjExNSAxNy4zMjI5IDguOTY1MTZDMTcuMzExNyA2Ljc1ODE0IDE2LjQyNDcgNC42NDYwMiAxNC44NTY4IDMuMDkyOTdDMTMuMjg4OSAxLjUzOTc4IDExLjE2ODQgMC42NzI4MTcgOC45NjEzNyAwLjY4MjU2OEM3LjMxNTA3IDAuNjg5OTgzIDUuNzA3NzcgMS4xODU2IDQuMzQzMTMgMi4xMDY1M0MyLjk3ODM2IDMuMDI3NiAxLjkxNzQ5IDQuMzMyNjQgMS4yOTQ1NiA1Ljg1NjU4QzAuNjcxNTAzIDcuMzgwNTIgMC41MTQ1MzYgOS4wNTUxMSAwLjg0MzMwMiAxMC42NjgzQzEuMDY4OTMgMTEuNzc1MyAxLjUxNjM1IDEyLjgxOTMgMi4xNTI4NyAxMy43NEwyLjE1MTA5IDEzLjczNzJDMi44NjQ3OSAxMi4xMzggMi45ODEzOCAxMC43MzE4IDMuMTMzOTUgOC44OTA1OVY4Ljg4ODk0TDMuMTUxOTQgOC42NzE1NUMzLjI3MDczIDYuODU1OTIgMy43NjIzNyA1LjM0ODA1IDYuODUwNjMgNC40OTczQzcuNTU0MyA0LjMyNTc3IDguMjg3MzYgNC4zODc4NCA5LjAyOTQ5IDQuNTYyNTNMOS4wMzU1MyA0LjU2MTE1TDkuMDMwNzIgNC41NjA3NEM5Ljg4NzY2IDQuMjk0MDUgMTAuOTE5NSA0LjM5MzYxIDExLjMwMTUgNS4yMTIwOUMxMS4zMjQ1IDUuMjU1MDggMTEuMzQxMSA1LjI5NTg2IDExLjM1MTcgNS4zMzQzMkwxMS4zNTU3IDUuMzQ5ODNMMTEuMzU2NCA1LjM1Mjk5QzExLjk5MDMgNS42MDM0OCAxMi42MTY0IDUuODUxMjIgMTMuMjIwNCA2LjAyNjA0QzE2LjQwOTMgNi44OTQ1MSAxNi4wOTYyIDguNjM2MTIgMTQuNTM2IDEwLjA5NUMxNC4xNDYgMTAuNDk4MyAxMy43MjgxIDEwLjg3NzcgMTMuNDU1OSAxMS4xNTM0QzEyLjI1OTcgMTIuMzcyMyAxMC4xMjc4IDE0Ljc1NzggMTAuNDc0MiAxNy4xOTM4TDEwLjQ3NTYgMTcuMTk3OUMxMS4wNzE4IDE3LjA5MDUgMTEuNjU3NCAxNi45MTc4IDEyLjIyMTcgMTYuNjgwN0MxMy43Mzk5IDE2LjA0MzQgMTUuMDM0OCAxNC45NyAxNS45NDI2IDEzLjU5NjdaTTguOTUxNjIgNi45NjYwNkM4Ljk1MTYyIDcuMTkwMDQgOC44ODUyOSA3LjQwODk1IDguNzYwODcgNy41OTUwM0M4LjYzNjQ1IDcuNzgxMjUgOC40NTk3MSA3LjkyNjQgOC4yNTI3NiA4LjAxMjFDOC4wNDU5NCA4LjA5Nzc5IDcuODE4MjUgOC4xMjAxNyA3LjU5ODY2IDguMDc2NUM3LjM3OTA3IDguMDMyODMgNy4xNzczMyA3LjkyNTAzIDcuMDE4OTkgNy43NjY2OUM2Ljg2MDY1IDcuNjA4MzUgNi43NTI4NSA3LjQwNjYxIDYuNzA5MDQgNy4xODcwMkM2LjY2NTM3IDYuOTY3MyA2LjY4Nzg5IDYuNzM5NzQgNi43NzM1OCA2LjUzMjc5QzYuODU5MjggNi4zMjU5NyA3LjAwNDMgNi4xNDkwOSA3LjE5MDUyIDYuMDI0NjdDNy4zNzY3MyA1LjkwMDI1IDcuNTk1NjQgNS44MzM5MiA3LjgxOTQ4IDUuODMzOTJDOC4xMTk4MiA1LjgzMzkyIDguNDA3OCA1Ljk1MzI2IDguNjIwMTEgNi4xNjU1N0M4LjgzMjQyIDYuMzc3ODggOC45NTE2MiA2LjY2NTg2IDguOTUxNjIgNi45NjYwNlpNMTMuODA3MyAxMC4yMTA2QzE0LjI5NzggOS45NjkzMSAxNC43Nzk3IDkuNjk2MDMgMTUuMTg0OSA5LjMyNjg5TDE1LjE2NzEgOS4zMDY3QzE0Ljc0MzIgOS42NDU3NiAxNC4yNTA5IDkuODgzODkgMTMuNzUzMiAxMC4wODkzQzEzLjI1NTkgMTAuMjk1NiAxMi43NDA0IDEwLjQ1NDkgMTIuMjEzNSAxMC41NjU1QzExLjY5MTggMTAuNjY4NSAxMS4xNjAxIDEwLjcxMjEgMTAuNjI4NyAxMC42OTU4QzEwLjEwNDQgMTAuNjgwOCA5LjU3NzQzIDEwLjU3NjQgOS4xMjA4MSAxMC4yODA0TDkuMTAzMjMgMTAuMzAwNUM5LjQ3NTY3IDEwLjcyMTkgMTAuMDUwMyAxMC45MTMgMTAuNjEyMyAxMC45NjM4QzExLjE3NDYgMTEuMDE0OCAxMS43Mjk1IDEwLjkxMTEgMTIuMjYxNyAxMC43NzM0QzEyLjc5MzQgMTAuNjM0NSAxMy4zMTA5IDEwLjQ0NjEgMTMuODA3MyAxMC4yMTA2Wk0xMy44NzQyIDguNzUyNDRDMTMuOTEyMiA4LjY5NDkgMTMuOTMyNCA4LjYyNzMzIDEzLjkzMTkgOC41NTgzOUMxMy45MzEyIDguNDY1ODMgMTMuODkzOCA4LjM3NzM5IDEzLjgyODIgOC4zMTIzQzEzLjc2MjQgOC4yNDczNCAxMy42NzM1IDguMjEwOTUgMTMuNTgxIDguMjExMzZDMTMuNTEyIDguMjExNzcgMTMuNDQ0NiA4LjIzMjY1IDEzLjM4NzUgOC4yNzEyNEMxMy4zMzA0IDguMzA5OTYgMTMuMjg1OSA4LjM2NDYyIDEzLjI1OTkgOC40Mjg2MkMxMy4yMzM4IDguNDkyNDcgMTMuMjI3NCA4LjU2MjY1IDEzLjI0MTIgOC42MzAyMUMxMy4yNTUxIDguNjk3OTIgMTMuMjg4NiA4Ljc1OTg1IDEzLjMzNzYgOC44MDgzM0MxMy4zODY3IDguODU2OTUgMTMuNDQ5MiA4Ljg4OTc3IDEzLjUxNjkgOC45MDI4MUMxMy41ODQ2IDguOTE2IDEzLjY1NDcgOC45MDg1OCAxMy43MTgzIDguODgxOTRDMTMuNzgxOSA4Ljg1NTE2IDEzLjgzNjEgOC44MTAxMiAxMy44NzQyIDguNzUyNDRaIiBmaWxsPSJ3aGl0ZSIvPgo8L3N2Zz4K",
                    link: "https://www.coingecko.com/en/exchanges/bitfinex"
                }],
                Ee = [{
                    name: "Linkedin",
                    icon: je,
                    link: "https://www.linkedin.com/company/bitfinex-securities/about"
                }, {
                    name: "Twiiter",
                    icon: se,
                    link: "https://twitter.com/BFXSecurities"
                }],
                Ae = e => {
                    let {
                        isSecuritiesPage: M
                    } = e;
                    return n.createElement("div", {
                        className: "social"
                    }, le()(M ? Ee : Te, (e => {
                        let {
                            name: M,
                            icon: t,
                            link: N
                        } = e;
                        return n.createElement(Z, {
                            key: M,
                            href: N
                        }, n.createElement("span", null, n.createElement("img", {
                            src: t,
                            alt: M
                        })))
                    })))
                };
            Ae.defaultProps = {
                isSecuritiesPage: !1
            };
            var ze = Ae;
            var ye = () => {
                const e = (new Date).getFullYear(),
                    M = "Copyright ©️ " + (oe.VJ === oe.w7.br ? e + " BFX Brazil Ltda." : "2013-" + e + " iFinex Inc.") + " All rights reserved";
                return n.createElement("div", null, n.createElement(r, null, M), n.createElement(r, null, n.createElement(ze, null)))
            };
            var Oe = e => {
                let {
                    path: M
                } = e;
                const t = (0, ue.Z)(),
                    N = F()(t) > 1 ? G()((0, s.FW)(t, M), "company") : void 0,
                    i = (new Date).getFullYear(),
                    a = N ? "Copyright © 2021-" + i + " " + N + " All rights reserved." : "Copyright © 2021-" + i + " Bitfinex Securities Ltd. All rights reserved.";
                return n.createElement("div", null, n.createElement(r, null, a), n.createElement(r, null, n.createElement(ze, {
                    isSecuritiesPage: !0
                })))
            };
            const Le = e => {
                let {
                    isSecuritiesPage: M,
                    className: t,
                    path: N
                } = e;
                return n.createElement("div", {
                    className: i()(["footer__bottom", t])
                }, M ? n.createElement(Oe, {
                    path: N
                }) : n.createElement(ye, null))
            };
            Le.defaultProps = {
                isSecuritiesPage: !1,
                className: null
            };
            const xe = e => {
                let {
                    isLoggedIn: M,
                    isSecuritiesPage: t,
                    isPaperTradingAccount: N,
                    path: a
                } = e;
                return n.createElement(n.Fragment, null, n.createElement("div", {
                    className: "footer__extra"
                }, n.createElement("div", {
                    className: "content_wrapper"
                }, n.createElement(O, null))), n.createElement("div", {
                    id: "footer",
                    className: i()({
                        footer__wrapper__securities: t,
                        footer__wrapper: !t
                    })
                }, n.createElement("div", {
                    className: "footer__top"
                }, n.createElement("div", null, n.createElement(r, null, n.createElement(d, {
                    isSecuritiesPage: t
                })), n.createElement(r, null, n.createElement("div", {
                    className: "languages"
                }, n.createElement(L, null))))), n.createElement(Ie, {
                    isLoggedIn: M,
                    isPaperTradingAccount: N,
                    isSecuritiesPage: t,
                    path: a
                }), n.createElement(Le, {
                    isSecuritiesPage: t,
                    path: a
                })))
            };
            var me = n.memo(xe)
        },
        76104: function(e, M, t) {
            "use strict";
            t.d(M, {
                ZP: function() {
                    return xe
                }
            });
            var n = t(67294),
                N = t(68270),
                i = t(29499),
                r = t(34531),
                a = t(35161),
                l = t.n(a),
                D = t(27361),
                u = t.n(D),
                c = t(63105),
                g = t.n(c),
                I = t(84238),
                o = t.n(I),
                s = t(3674),
                j = t.n(s),
                T = t(61757),
                E = t(75900),
                A = t.n(E),
                z = t(798),
                y = t(45697),
                O = t.n(y);
            const L = {
                external: O().bool,
                href: O().string,
                label: O().string,
                onClick: O().func,
                primary: O().bool,
                self: O().bool,
                overflow: O().bool
            };
            L.sublinks = O().arrayOf(O().shape(L));
            const x = {
                src: O().string,
                alt: O().string,
                href: O().string
            };
            O().shape(x), O().arrayOf(O().shape(L)), O().arrayOf(O().shape(L));
            var m = t(17005),
                d = t(72785),
                f = t(78761),
                k = t(5347);
            const C = e => {
                let {
                    label: M,
                    links: t
                } = e;
                const N = l()(t, (e => {
                    let {
                        href: M,
                        label: t,
                        external: N,
                        onClick: i
                    } = e;
                    return n.createElement("li", {
                        key: t,
                        className: A()("header_menu_item", {
                            header_menu_item__external: N
                        })
                    }, n.createElement(m.Z, {
                        key: t,
                        target: N ? "_blank" : "_self",
                        onClick: i,
                        rel: N ? "noopener noreferrer" : "",
                        to: M
                    }, t, N && n.createElement(z.Q, {
                        className: "header_menu_item__external-icon",
                        src: d.Z
                    })))
                }));
                return n.createElement(k.Z, {
                    content: n.createElement("div", {
                        className: "header_popover_menu"
                    }, N),
                    position: "bottom"
                }, n.createElement("div", {
                    className: "header_item-container"
                }, n.createElement("span", {
                    className: "header_item-title"
                }, M), t && n.createElement(z.Q, {
                    className: "header_item-icon",
                    src: f.Z
                })))
            };
            C.defaultProps = {
                label: "",
                links: []
            };
            var w = C,
                S = t(10240),
                h = t.n(S),
                Q = t(87274);
            const U = e => {
                let {
                    link: M,
                    handleOnClickClose: t,
                    children: N
                } = e;
                const {
                    external: r,
                    href: a,
                    label: l,
                    primary: D,
                    sublinks: c,
                    onClick: g,
                    self: I,
                    registerButton: o
                } = M, s = (0, i.useLocation)(), j = u()(s, "pathname", ""), T = o && h()(j, Q.BC) ? "noopener" : "noreferrer noopener";
                return r || I ? n.createElement(m.Z, {
                    className: A()({
                        primary: D,
                        sublinks: c
                    }),
                    key: l,
                    target: r ? "_blank" : "_self",
                    onClick: g,
                    rel: T,
                    to: a,
                    partiallyActive: !0
                }, N || l) : n.createElement(m.Z, {
                    className: A()({
                        primary: D,
                        sublinks: c
                    }),
                    key: l,
                    onClick: g || t,
                    rel: T,
                    to: a,
                    partiallyActive: !0
                }, N || l)
            };
            U.defaultProps = {
                link: {},
                handleOnClickClose: () => {},
                children: null
            };
            var p = U;
            const b = e => {
                let {
                    links: M,
                    allClassName: t
                } = e;
                return l()(M, (e => {
                    const {
                        label: M,
                        sublinks: N = [],
                        overflow: i,
                        className: r
                    } = e;
                    return N.length ? n.createElement("li", {
                        className: A()({
                            overflow: i
                        }, [t, r]),
                        key: M
                    }, n.createElement(w, {
                        className: r,
                        label: M,
                        links: N
                    })) : n.createElement("li", {
                        key: M,
                        className: A()([t])
                    }, n.createElement(p, {
                        link: e
                    }))
                }))
            };
            b.defaultProps = {
                links: []
            };
            var Y = b,
                v = t(93433),
                _ = t(44908),
                P = t.n(_),
                Z = t(8804),
                R = t.n(Z),
                G = t(23493),
                B = t.n(G),
                F = t(42043),
                W = t(93296);
            const $ = e => {
                let {
                    link: M,
                    handleOnClickClose: t
                } = e;
                const {
                    label: N,
                    sublinks: i
                } = M, {
                    0: r,
                    1: a
                } = (0, n.useState)(!1);
                return n.createElement("div", {
                    className: "collapsible_link"
                }, n.createElement("a", {
                    href: "",
                    className: A()({
                        active: r
                    }, "primary"),
                    onClick: e => {
                        e.preventDefault(), a(!r)
                    }
                }, n.createElement("span", null, N, n.createElement(W.Z, null))), r && n.createElement("ul", {
                    className: "secondary"
                }, l()(i, ((e, M) => n.createElement("li", {
                    key: "" + N + M
                }, n.createElement(p, {
                    handleOnClickClose: t,
                    link: e
                }))))))
            };
            $.defaultProps = {
                link: {},
                handleOnClickClose: () => {}
            };
            var H = $;
            const V = e => {
                let {
                    links: M,
                    handleOnClickClose: t
                } = e;
                return l()(M, ((e, M) => {
                    const {
                        button: N,
                        label: i,
                        href: r,
                        primary: a,
                        onClick: l,
                        sublinks: D = [],
                        overflow: u
                    } = e, c = N ? n.createElement(m.Z, {
                        to: r
                    }, n.createElement(F.Z, {
                        secondary: !a,
                        onClick: l,
                        text: i
                    }, i)) : n.createElement(p, {
                        handleOnClickClose: t,
                        link: e
                    });
                    return n.createElement("li", {
                        key: "" + M + i,
                        className: A()({
                            button: N,
                            overflow: u
                        })
                    }, D.length ? n.createElement(H, {
                        link: e,
                        handleOnClickClose: t
                    }) : c)
                }))
            };
            V.defaultProps = {
                links: [],
                handleOnClickClose: () => {}
            };
            var J = V;
            const K = e => {
                let {
                    logo: M,
                    onClick: t
                } = e;
                const {
                    src: N,
                    href: i,
                    alt: r
                } = M;
                return n.createElement(m.Z, {
                    onClick: t,
                    to: i
                }, n.createElement("img", {
                    className: "navigation_logo",
                    alt: r,
                    src: N
                }))
            };
            K.defaultProps = {
                logo: {},
                onClick: () => {}
            };
            var X = K,
                q = t(39693),
                ee = t.n(q),
                Me = t(59704),
                te = t.n(Me),
                ne = t(34688),
                Ne = t(32603),
                ie = t(24113),
                re = t(4185),
                ae = t(84741);
            const le = {
                    src: "/images/bitfinex-logo.svg",
                    alt: "bitfinex-logo",
                    href: "/"
                },
                De = {
                    src: "/images/bitfinex-securities-logo.svg",
                    alt: "bitfinex-logo",
                    href: "/securities"
                },
                ue = (e, M) => {
                    var t;
                    if (t = e, h()(t, r.Yl + "/gateway")) return M("return_to_payment_link");
                    const n = (e => h()(e, r.Yl + "/dashboard"))(e);
                    return M(n ? "return_to_dashboard" : "return_to_platform")
                },
                ce = (0, r.SF)();
            var ge = e => {
                let {
                    t: M,
                    i18n: t,
                    rootUrl: n,
                    loggedIn: N,
                    isSecuritiesPage: i,
                    isSecuritiesRootPage: r,
                    returnTo: a,
                    isNext: D
                } = e;
                const u = i ? [] : ee()([{
                        label: M(D ? "traders" : "for_traders"),
                        sublinks: ee()([{
                            label: M("features"),
                            href: "/features"
                        }, {
                            label: M("mobile_trading"),
                            href: "/mobile-trading"
                        }, (0, ne.QT)(Ne.$$.P2P_LINK) ? {
                            label: M("p2p_trading"),
                            href: ce.p2pSpaUrl
                        } : void 0, {
                            label: M("market_statistics"),
                            href: "/stats"
                        }, (0, ne.QT)(Ne.$$.BFX_TERMINAL) ? {
                            label: M("bitfinex_terminal"),
                            href: ce.terminalUrl,
                            external: !0
                        } : void 0, {
                            label: M("accounts"),
                            href: "/pro"
                        }, {
                            label: M("fees"),
                            href: "/fees"
                        }, {
                            label: M("security"),
                            href: "/security-policy"
                        }, {
                            label: M("api_doc"),
                            href: "https://docs.bitfinex.com",
                            external: !0
                        }, (0, ne.QT)(Ne.$$.LEADERBOARD) ? {
                            label: M("leaderboard"),
                            href: ce.leaderboardUrl,
                            external: !0
                        } : void 0, {
                            label: M("deposits_withdrawals"),
                            href: "/deposits-withdrawals"
                        }, (0, ne.QT)(Ne.$$.CREDIT_CARD_DEPOSIT) ? {
                            label: M("cards"),
                            href: "/cards"
                        } : void 0, {
                            label: M("reporting_tool"),
                            href: "https://reporting.bitfinex.com/",
                            external: !0
                        }])
                    }, te()([Ne.$$.LENDING_PRODUCTS, Ne.$$.STAKING, Ne.$$.BORROW], ne.QT) ? {
                        label: M(D ? "lenders" : "for_lenders"),
                        sublinks: g()([{
                            href: ce.stakingUrl,
                            label: M("staking"),
                            external: !0,
                            show: (0, ne.QT)(Ne.$$.STAKING)
                        }, {
                            href: Q.VS,
                            label: M("lending_pro"),
                            external: !0,
                            show: (0, ne.QT)(Ne.$$.LENDING_PRODUCTS)
                        }, {
                            label: M("borrow"),
                            href: "/borrow",
                            show: (0, ne.QT)(Ne.$$.BORROW)
                        }], (e => {
                            let {
                                show: M
                            } = e;
                            return !!M
                        }))
                    } : void 0, {
                        label: M(D ? "about" : "about_us"),
                        sublinks: [{
                            href: "/about",
                            label: M("about_bfx")
                        }, {
                            href: "http://blog.bitfinex.com",
                            label: M("blog"),
                            external: !0
                        }, {
                            href: "/press",
                            label: M("press")
                        }, {
                            href: "http://blog.bitfinex.com/newsletter/",
                            label: M("newsletter"),
                            external: !0
                        }, {
                            href: "https://bitfinex.statuspage.io/",
                            label: M("status_page"),
                            external: !0
                        }, {
                            href: "/utilities",
                            label: M("utilities")
                        }]
                    }, (0, ne.QT)(Ne.$$.LEO) ? {
                        label: D ? "UNUS Sed Leo" : "UNUS SED LEO",
                        href: ce.leoTransparencyUrl,
                        external: !0
                    } : void 0, (0, ne.QT)(Ne.$$.SECURITIES) ? {
                        label: M("securities"),
                        href: Q.BC
                    } : void 0, (0, ne.QT)(Ne.$$.AFFILIATES) ? {
                        label: M(D ? "affiliates" : "affiliate_program"),
                        href: "/affiliates"
                    } : void 0, {
                        label: M("more"),
                        overflow: !0,
                        sublinks: ee()([{
                            label: "UNUS SED LEO",
                            href: ce.leoTransparencyUrl,
                            external: !0
                        }, (0, ne.QT)(Ne.$$.SECURITIES) ? {
                            label: M("securities"),
                            href: Q.BC
                        } : void 0, {
                            label: M("affiliate_program"),
                            href: "/affiliates"
                        }])
                    }]),
                    c = {
                        label: t.language ? re.E[t.language] : re.E.en,
                        sublinks: l()(j()(re.E), (e => ({
                            label: re.E[e],
                            onClick: () => {
                                t.changeLanguage(e), (0, ie.jJ)(e)
                            }
                        })))
                    },
                    I = [{
                        label: M("login_btn"),
                        href: (0, ie.Zd)(n),
                        button: !0,
                        self: !0
                    }, {
                        label: M("register_btn"),
                        href: (0, ae.bN)({
                            isSecuritiesPage: i,
                            isSecuritiesRootPage: r
                        }),
                        primary: !0,
                        button: !0,
                        registerButton: !0,
                        self: !0
                    }, c],
                    o = [{
                        label: M("signout_btn"),
                        href: n + "/logout",
                        button: !0,
                        self: !0
                    }, {
                        label: ue(a, M),
                        href: a,
                        primary: !0,
                        button: !0,
                        self: !0
                    }, c];
                return {
                    loggedIn: N,
                    isSecuritiesPage: i,
                    logo: i ? De : le,
                    left: u,
                    right: N ? o : I,
                    locale: c
                }
            };
            const Ie = () => {
                    const {
                        innerWidth: e
                    } = window, M = R()(document.getElementsByClassName("mobile_header_content")), t = M && M.classList.contains("active");
                    return e > 900 ? document.body.setAttribute("style", "overflow-y: scroll") : t ? document.body.setAttribute("style", "overflow: hidden") : null
                },
                oe = e => {
                    let {
                        config: M,
                        light: t,
                        className: i
                    } = e;
                    const {
                        t: r,
                        i18n: a
                    } = (0, N.$)("header"), {
                        left: l,
                        right: D,
                        logo: u,
                        isSecuritiesPage: c
                    } = M, {
                        locale: g
                    } = ge({
                        t: r,
                        i18n: a
                    }), I = P()([].concat((0, v.Z)(l), (0, v.Z)(D)), (e => e.label));
                    I.splice(6, 0, g), I.splice(-1, 1);
                    const {
                        0: o,
                        1: s
                    } = (0, n.useState)(!1), j = () => {
                        s(!o), document.body.setAttribute("style", o ? "overflow-y: scroll" : "overflow: hidden")
                    };
                    return (0, n.useEffect)((() => {
                        const e = B()(Ie, 250);
                        return window.addEventListener("resize", e), () => {
                            window.removeEventListener("resize", e)
                        }
                    }), []), n.createElement("header", {
                        id: "mobile-header",
                        className: A()({
                            light: t
                        }, ["header mobile", i], {
                            header_securities: c
                        })
                    }, n.createElement("div", {
                        className: "logo"
                    }, n.createElement(X, {
                        onClick: () => {
                            s(!1), document.body.setAttribute("style", "overflow-y: scroll")
                        },
                        logo: u
                    })), n.createElement("div", {
                        className: "target"
                    }, n.createElement("button", {
                        onClick: j,
                        className: "small_target",
                        type: "button"
                    }, n.createElement("div", {
                        className: "mobile-header-target__content"
                    }, n.createElement("div", {
                        className: A()({
                            active: o
                        })
                    }), n.createElement("div", {
                        className: A()({
                            active: o
                        })
                    })))), n.createElement("div", {
                        className: A()({
                            active: o
                        }, "mobile_header_content")
                    }, n.createElement("div", {
                        className: "inner"
                    }, n.createElement("ul", null, n.createElement(J, {
                        handleOnClickClose: j,
                        links: I
                    })))))
                };
            oe.defaultProps = {
                config: {},
                light: !1,
                className: null
            };
            var se = oe,
                je = t(78344);
            const Te = e => {
                let {
                    config: M
                } = e;
                const {
                    left: t,
                    right: N,
                    overflow: i,
                    logo: r,
                    loggedIn: a,
                    isSecuritiesPage: l
                } = M, D = (0, je.Z)("header header-prev bp3-dark " + (l ? "header_securities" : ""), {
                    loggedIn: a
                });
                return n.createElement(n.Fragment, null, n.createElement("header", {
                    className: "header header-prev",
                    id: "header",
                    ref: D
                }, n.createElement("div", {
                    className: "header_container"
                }, n.createElement("ul", {
                    className: "header_left"
                }, n.createElement("li", {
                    className: "header_logo"
                }, n.createElement(X, {
                    logo: r
                })), n.createElement(Y, {
                    overflow: i,
                    links: t
                })), n.createElement("ul", {
                    className: "header_right"
                }, n.createElement(Y, {
                    links: N
                })))), n.createElement(se, {
                    className: "header-prev",
                    config: M
                }))
            };
            Te.defaultProps = {
                config: {}
            };
            var Ee = (0, n.memo)(Te);
            const Ae = e => {
                let {
                    config: M
                } = e;
                const t = (0, n.useMemo)((() => g()(M.right, (e => !!e.button && !e.sublinks))), [M]),
                    N = (0, n.useMemo)((() => [{ ...M.locale,
                        className: "header_right--locale"
                    }]), [M]),
                    {
                        left: i,
                        logo: r,
                        loggedIn: a,
                        isSecuritiesPage: D
                    } = M,
                    u = (0, je.Z)("header header-next bp3-dark " + (D ? "header_securities" : ""), {
                        loggedIn: a
                    });
                return n.createElement(n.Fragment, null, n.createElement("header", {
                    className: "header header-next",
                    id: "header",
                    ref: u
                }, n.createElement("div", {
                    className: "header_container"
                }, n.createElement("ul", {
                    className: "header_left"
                }, n.createElement("li", {
                    className: "header_logo"
                }, n.createElement(X, {
                    logo: r
                }))), n.createElement("ul", {
                    className: "header_right"
                }, n.createElement(Y, {
                    allClassName: "header_right--overflow",
                    links: i
                }), l()(t, (e => n.createElement("li", {
                    key: e.label
                }, n.createElement(p, {
                    link: e
                }, n.createElement(F.Z, {
                    secondary: !e.primary
                }, e.label))))), n.createElement(Y, {
                    links: N
                })))), n.createElement(se, {
                    className: "header-next",
                    config: M
                }))
            };
            Ae.defaultProps = {
                config: {}
            };
            var ze = (0, n.memo)(Ae),
                ye = t(53007),
                Oe = t(37469);
            const Le = function(e, M) {
                void 0 === M && (M = !1);
                const t = t => {
                    let {
                        isSecuritiesPage: a,
                        isSecuritiesRootPage: D
                    } = t;
                    const {
                        t: c,
                        i18n: I
                    } = (0, N.$)("header"), {
                        isAuthenticated: s
                    } = (0, Oe.Z)(), E = (0, i.useLocation)(), A = u()(E, "state.back", r.HY + "/t"), z = ge({
                        t: c,
                        i18n: I,
                        rootUrl: r.Wd,
                        loggedIn: s,
                        isSecuritiesPage: a,
                        isSecuritiesRootPage: D,
                        returnTo: A,
                        isNext: M
                    }), y = (0, ye.h)(), O = {
                        label: y[null == I ? void 0 : I.language] || y.en,
                        sublinks: l()(g()(j()(y), (e => "ja-JP" !== e || T.VJ === T.w7.jp)), (e => ({
                            label: y[e],
                            onClick: () => {
                                I.changeLanguage(e), (0, ie.jJ)(e)
                            }
                        })))
                    }, L = u()(z, "right", []);
                    L[o()(L) - 1] = O;
                    const x = { ...z,
                        locale: O,
                        right: L
                    };
                    return n.createElement(e, {
                        config: x
                    })
                };
                return t.defaultProps = {
                    isSecuritiesPage: !1,
                    isSecuritiesRootPage: !1
                }, t.displayName = "HeaderConfigured", t
            };
            Le(ze, !0);
            var xe = Le(Ee)
        },
        94803: function(e, M, t) {
            "use strict";
            var n = t(67294),
                N = t(28357);
            M.Z = () => {
                const {
                    notification: e
                } = (0, n.useContext)(N.uj);
                return e && n.createElement("div", {
                    className: "global-notification"
                }, e)
            }
        },
        5347: function(e, M, t) {
            "use strict";
            var n = t(67294);
            const N = e => {
                let {
                    children: M,
                    content: t,
                    position: N
                } = e;
                const {
                    0: i,
                    1: r
                } = (0, n.useState)(!1);
                return n.createElement("span", {
                    onMouseEnter: () => r(!0),
                    onMouseLeave: () => r(!1),
                    className: "popover"
                }, M, i && n.createElement("div", {
                    className: "popover_content-container placement-" + N
                }, t))
            };
            N.defaultProps = {
                position: "top"
            }, M.Z = N
        },
        28357: function(e, M, t) {
            "use strict";
            t.d(M, {
                JB: function() {
                    return i
                },
                uj: function() {
                    return N
                }
            });
            var n = t(67294);
            const N = (0, n.createContext)({
                    setNotification: () => {}
                }),
                i = e => {
                    let {
                        children: M
                    } = e;
                    const {
                        0: t,
                        1: i
                    } = (0, n.useState)(null), r = (0, n.useMemo)((() => ({
                        notification: t,
                        setNotification: i
                    })), [t]);
                    return n.createElement(N.Provider, {
                        value: r
                    }, M)
                }
        },
        64680: function(e, M, t) {
            "use strict";
            t.d(M, {
                Z: function() {
                    return r
                }
            });
            var n = {
                    i8: "15.91.6"
                },
                N = t(4147),
                i = t(87274);

            function r() {
                console.log("env " + i.Qr), console.log("bfx-ui-public v." + N.i8), console.log("bfx-ui-lib v." + n.i8)
            }
        },
        78344: function(e, M, t) {
            "use strict";
            var n = t(67294),
                N = t(20050),
                i = t(75900),
                r = t.n(i);
            M.Z = (e, M) => {
                const {
                    language: t
                } = (0, N.nI)(), i = (0, n.useRef)();
                return (0, n.useEffect)((() => {
                    i && i.current && i.current.classList && (i.current.className = r()([e, t], { ...M
                    }))
                }), [t, M, e]), i
            }
        },
        37469: function(e, M, t) {
            "use strict";
            var n = t(67294),
                N = t(76782);
            M.Z = () => {
                const {
                    user: e,
                    fetch: M,
                    isAuthenticated: t,
                    resetUser: i
                } = (0, n.useContext)(N.default);
                return {
                    user: e,
                    fetch: M,
                    isAuthenticated: t,
                    resetUser: i
                }
            }
        },
        52103: function(e, M, t) {
            "use strict";
            t.d(M, {
                Mq: function() {
                    return ke
                },
                vw: function() {
                    return Ce
                }
            });
            var n = t(27361),
                N = t.n(n),
                i = t(66654),
                r = t.n(i),
                a = t(64721),
                l = t.n(a),
                D = (t(7334), t(84238), t(18721)),
                u = t.n(D),
                c = t(34531),
                g = t(93433);

            function I(e, M) {
                return e === M
            }
            var o = function(e) {
                for (var M = arguments.length, t = Array(M > 1 ? M - 1 : 0), n = 1; n < M; n++) t[n - 1] = arguments[n];
                return function() {
                    for (var M = arguments.length, n = Array(M), N = 0; N < M; N++) n[N] = arguments[N];
                    var i = 0,
                        r = n.pop(),
                        a = function(e) {
                            var M = Array.isArray(e[0]) ? e[0] : e;
                            if (!M.every((function(e) {
                                    return "function" == typeof e
                                }))) {
                                var t = M.map((function(e) {
                                    return typeof e
                                })).join(", ");
                                throw new Error("Selector creators expect all input-selectors to be functions, instead received the following types: [" + t + "]")
                            }
                            return M
                        }(n),
                        l = e.apply(void 0, [function() {
                            return i++, r.apply(null, arguments)
                        }].concat(t)),
                        D = e((function() {
                            for (var e = [], M = a.length, t = 0; t < M; t++) e.push(a[t].apply(null, arguments));
                            return l.apply(null, e)
                        }));
                    return D.resultFunc = r, D.dependencies = a, D.recomputations = function() {
                        return i
                    }, D.resetRecomputations = function() {
                        return i = 0
                    }, D
                }
            }((function(e) {
                var M = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : I,
                    t = null,
                    n = null;
                return function() {
                    return function(e, M, t) {
                        if (null === M || null === t || M.length !== t.length) return !1;
                        for (var n = M.length, N = 0; N < n; N++)
                            if (!e(M[N], t[N])) return !1;
                        return !0
                    }(M, t, arguments) || (n = e.apply(null, arguments)), t = arguments, n
                }
            }));
            var s = t(3945),
                j = t.n(s),
                T = t(3674),
                E = t.n(T),
                A = t(35937),
                z = t.n(A),
                y = t(25325),
                O = t.n(y),
                L = t(41609),
                x = t.n(L),
                m = t(88306),
                d = t.n(m),
                f = t(54061),
                k = t.n(f),
                C = t(23560),
                w = t.n(C),
                S = Number.isNaN || function(e) {
                    return "number" == typeof e && e != e
                };

            function h(e, M) {
                return e === M || !(!S(e) || !S(M))
            }

            function Q(e, M) {
                if (e.length !== M.length) return !1;
                for (var t = 0; t < e.length; t++)
                    if (!h(e[t], M[t])) return !1;
                return !0
            }
            var U = function(e, M) {
                var t;
                void 0 === M && (M = Q);
                var n, N = [],
                    i = !1;
                return function() {
                    for (var r = [], a = 0; a < arguments.length; a++) r[a] = arguments[a];
                    return i && t === this && M(r, N) || (n = e.apply(this, r), i = !0, t = this, N = r), n
                }
            };
            const p = "label",
                b = "sym",
                Y = "pool",
                v = "txMethod";
            var _ = t(12180),
                P = t(13311),
                Z = t.n(P),
                R = t(93446);
            t(52353), t(57557);
            var G = t(34461);
            const B = e => N()(e, "settings", {}),
                F = e => N()(B(e), "settings", {}),
                W = function(e, M, t) {
                    void 0 === t && (t = null);
                    const n = F(e);
                    return N()(n, M, t)
                },
                $ = e => W(e, R.tL, R.gV),
                H = o([$, e => N()(e, "data.bitcoinViewModes", [])], ((e, M) => c.C$ && Z()(M, (M => M.mode === e)) || G.nO));
            var V = t(18446),
                J = t.n(V),
                K = t(81763),
                X = t.n(K),
                q = t(8804),
                ee = t.n(q),
                Me = t(36194);
            t(26472);
            const te = {},
                ne = ["CA"],
                Ne = e => N()(e, "userInfo", te),
                ie = e => !!Ne(e).isMerchantEnabled,
                re = e => Ne(e).complianceRegions,
                ae = e => Ne(e).complianceResidenceRegions,
                le = o(Ne, (e => {
                    let {
                        masterAccountId: M,
                        id: t
                    } = e;
                    return t && !M || J()(M, t)
                })),
                De = (o(le, (e => !e)), o(Ne, (e => !!e.verified)));
            o([De, Ne], ((e, M) => e ? Number(M.verificationLevel || Me.a.BASIC) : Me.a.BASIC)), o([ie, e => N()(Ne(e), "merchantKyc.digital_signature_merchant")], ((e, M) => e || X()(M))), o(re, (e => !l()(ne, ee()(e))));
            const ue = Object.freeze([]),
                ce = e => N()(e, "currencies", {}),
                ge = e => ce(e).currenciesInfo,
                Ie = e => ce(e).txMethods,
                oe = e => ce(e).currencySymbolToCurrencyCodeMap,
                se = e => ce(e).pairsInfo;

            function je(e, M, t, n) {
                const i = N()(ge(e), M);
                return i ? N()(i, n, t) : t
            }
            const Te = o(ge, (e => (M, t, n) => {
                const i = N()(e, M);
                return i ? N()(i, t, n) : n
            }));
            o(Te, (e => d()((M => e(M, p, M)))));
            const Ee = (e, M) => {
                let t = N()(e, [M, v], null);
                if (!t) {
                    const n = N()(e, [M, Y], null);
                    t = N()(e, [n, v], null)
                }
                return t
            };

            function Ae(e, M, t) {
                return void 0 === t && (t = M), je(e, M, t, b)
            }

            function ze(e, M, t) {
                return void 0 === t && (t = M), N()((e => ce(e).pairMapping)(e), [(0, _.Qm)(M)], t)
            }
            o(ge, (e => function(M, t) {
                return void 0 === t && (t = M), N()(e, [j()(M), b], t)
            }));

            function ye(e) {
                return ce(e).lastUpdateKey
            }
            o([Ie], (e => M => N()(e, [M, "hasPaymentIdForWithdrawals"], !1))), o([ge, Ie], ((e, M) => t => {
                const n = Ee(e, t);
                return N()(M, [n, "hasPaymentIdForWithdrawals"], !1)
            })), o([ge, Ie], ((e, M) => t => {
                const n = Ee(e, t);
                return N()(M, [n, "hasPaymentIdForDeposits"], !1)
            })), o(se, (e => e ? M => u()(e, (0, _.Qm)(M)) : () => !1));
            const Oe = e => o(se, (M => M ? k()(M, ((M, t, n) => (w()(e) && e(t) && M.push(n), M)), []) : ue)),
                Le = e => N()(e, "exchange", !1),
                xe = (o(se, (e => e ? M => Le(N()(e, (0, _.Qm)(M))) : () => !1)), Oe(Le), o(ge, _.cS), o(ge, _.UW)),
                me = (o(ge, (e => k()(e, ((e, M, t) => (N()(M, "funding", !1) && e.push(t), e)), []))), e => N()(e, "derivative", !1)),
                de = (o(se, (e => e ? M => me(N()(e, (0, _.Qm)(M))) : null)), Oe(me), o(se, (e => e ? M => N()(e[(0, _.Qm)(M)], "cst", !1) : null)), o(ge, (e => e ? M => N()(e, [j()(M), "paper"], !1) : null)), o(ge, (e => e ? M => N()(e, [j()(M), "securities"], !1) : null)), o(ge, (e => e ? M => N()(e, [j()(M), "securitiesWallet"], !1) : null)), o(se, (e => e ? M => N()(e[(0, _.Qm)(M)], "securities", !1) : null)), o([xe], _.aE), o(ge, (e => E()(z()(e, (e => e.paper))))), o(ge, ((e, M) => M), ((e, M) => {
                    const t = (0, _.Gz)(M, !0),
                        n = (0, _.Oy)(M, !0);
                    return N()(e, t + ".readOnly", !1) || N()(e, n + ".readOnly", !1)
                })), o((e => N()(ce(e), "txMethodPools", {})), (e => M => N()(e, [M], void 0))), o(se, (e => M => N()(e, [M, "category"]))), (e, M) => ye(e[0]) === ye(M[0]));
            o([ge, H], ((e, M) => t => {
                if (M.enabled && "BTC" === t) return (0, _.dz)(t, M);
                const n = N()(e, t);
                return n ? N()(n, b, t) : t
            })), o([ge, H], ((e, M) => function(t, n) {
                return void 0 === n && (n = t), M.enabled && "BTC" === t ? (0, _.dz)(t, M) : N()(e, [t, b], n)
            })), o(oe, (e => function(M, t) {
                return void 0 === t && (t = M), N()(e, M, t)
            })), U((e => M => ze(e, M)), de), o([e => ce(e).restrictionsInfo, ae], ((e, M) => t => {
                const n = N()(e, ["currencies", t], []),
                    i = N()(e, ["pairs", t], []),
                    r = O()([].concat((0, g.Z)(n), (0, g.Z)(i)), M);
                return !x()(r)
            })), o(Te, (e => d()((M => e(M, b, M))))), U((e => M => Ae(e, M)), de);
            t(9996);
            const fe = ["USD", "EUR", "JPY", "HKD", "GBP", "CHF", "CNH", "TRY", "CNY", "KRW", "INR", "AUD", "TWD", "BRL", "RUB", "IDR", "MXN", "PEN", "UYU", "VES", "COP", "ARS", "AED"];

            function ke(e) {
                return l()(fe, e)
            }

            function Ce(e) {
                return r()(e, "t")
            }
        },
        32603: function(e, M, t) {
            "use strict";
            t.d(M, {
                $$: function() {
                    return i
                },
                DT: function() {
                    return N
                },
                bo: function() {
                    return a
                }
            });
            var n = t(61757);
            const N = {
                    CREATE_SECURITIES_SUBACCOUNT: "create_securities_subaccount",
                    SECURITIES_PROSPECTUS: "securities_prospectus",
                    SHARE_PNL: "share_pnl",
                    X_MARGIN: "x-margin",
                    SIMPLEX_PAYMENT: "simplex_payment",
                    HAPPYCOINS_PAYMENT: "happycoins_payment",
                    BMN_LISTING: "bmn_listing",
                    TRY_AND_RUB_PAYMENT: "try_rub_payment",
                    SECURITIES_CATEGORIES_TOS: "securities_categories_tos",
                    OPENPAYD: "openpayd",
                    MOVEMENTS_V2: "movements_v2",
                    OPENPAYD_GBP: "openpayd_gbp",
                    LADDER: "ladder",
                    P2P: "p2p",
                    P2P_KYC_STG_LOCK: "p2p_kyc_stg_lock",
                    P2P_VERIFIED_CHECKMARK: "p2p_verified_checkmark",
                    P2P_VERIFICATION_BLOCK: "p2p_verification_block",
                    P2P_FLOATING_PRICE: "p2p_floating_price",
                    P2P_VARIABLE_PRICE: "p2p_variable_price",
                    TR_VAKIFBANK: "tr_vakifbank",
                    LIGHTNING_CHANNEL: "lightning_channel"
                },
                i = {
                    FUNDING: "funding",
                    MARGIN_TRADING: "margin_trading",
                    BITREFILL: "bitrefill",
                    LIGHTNING_NETWORK: "lightning_network",
                    STAKING: "staking",
                    HONEY_FRAMEWORK: "honey_framework",
                    BFX_PAY: "bfx_pay",
                    LENDING_PRODUCTS: "lending_products",
                    SECURITIES: "securities",
                    DERIVATIVES: "derivatives",
                    OTC: "otc",
                    HAPPYCOINS_DEPOSIT: "happycoin_deposit",
                    CREDIT_CARD_DEPOSIT: "cc_deposit",
                    LEO: "leo",
                    BORROW: "borrow",
                    BFX_TERMINAL: "bfx_terminal",
                    AFFILIATES: "affiliates",
                    ANNOUNCEMENT: "announcement",
                    BLOG: "blog",
                    CAREERS: "careers",
                    PUBLIC_BANNERS: "public_banners",
                    LEADERBOARD: "leaderboard",
                    SUBACCOUNTS: "subaccounts",
                    OPENPAYD: "openpayd",
                    FASTPAY: "fastpay",
                    PULSE: "pulse",
                    REPORTING: "reporting",
                    SANTIMENT: "santiment",
                    ODEM: "odem",
                    STATUS_PAGE: "status_page",
                    LEGAL_API: "legal_api",
                    LEGAL_RRT: "legal_rrt",
                    LEGAL_RULEBOOK: "legal_rulebook",
                    P2P_LINK: "p2p_link"
                },
                r = {
                    [i.FUNDING]: !0,
                    [i.MARGIN_TRADING]: !0,
                    [i.BITREFILL]: !0,
                    [i.LIGHTNING_NETWORK]: !0,
                    [i.STAKING]: !0,
                    [i.HONEY_FRAMEWORK]: !0,
                    [i.BFX_PAY]: !0,
                    [i.LENDING_PRODUCTS]: !0,
                    [i.SECURITIES]: !0,
                    [i.DERIVATIVES]: !0,
                    [i.OTC]: !0,
                    [i.CREDIT_CARD_DEPOSIT]: !0,
                    [i.BORROW]: !0,
                    [i.BFX_TERMINAL]: !0,
                    [i.LEO]: !0,
                    [i.REPORTING]: !0,
                    [i.SANTIMENT]: !0,
                    [i.ODEM]: !0,
                    [i.CAREERS]: !0,
                    [i.ANNOUNCEMENT]: !0,
                    [i.BLOG]: !0,
                    [i.STATUS_PAGE]: !0,
                    [i.LEGAL_API]: !0,
                    [i.LEGAL_RRT]: !0,
                    [i.LEGAL_RULEBOOK]: !0,
                    [i.P2P_LINK]: !0,
                    [i.HAPPYCOINS_DEPOSIT]: !0
                },
                a = {
                    [n.w7.default]: {},
                    [n.w7.jp]: {
                        [i.HAPPYCOINS_DEPOSIT]: !0,
                        [i.CREDIT_CARD_DEPOSIT]: !0,
                        [i.OTC]: !0,
                        [i.LEO]: !0,
                        [i.MARGIN_TRADING]: !0,
                        [i.DERIVATIVES]: !0,
                        [i.LENDING_PRODUCTS]: !0,
                        [i.SECURITIES]: !0,
                        [i.STAKING]: !0,
                        [i.BORROW]: !0,
                        [i.BFX_PAY]: !0,
                        [i.BFX_TERMINAL]: !0,
                        [i.HONEY_FRAMEWORK]: !0,
                        [i.AFFILIATES]: !0,
                        [i.FUNDING]: !0,
                        [i.PUBLIC_BANNERS]: !0,
                        [i.LEADERBOARD]: !0,
                        [i.BITREFILL]: !0,
                        [i.LIGHTNING_NETWORK]: !0,
                        [i.OPENPAYD]: !0,
                        [i.FASTPAY]: !0,
                        [i.PULSE]: !0,
                        [i.P2P_LINK]: !0
                    },
                    [n.w7.br]: {
                        [i.SECURITIES]: !0,
                        [i.DERIVATIVES]: !0,
                        [i.LENDING_PRODUCTS]: !0,
                        [i.BORROW]: !0,
                        [i.FUNDING]: !0,
                        [i.BFX_PAY]: !0,
                        [i.P2P_LINK]: !0
                    },
                    [n.w7.tr]: r,
                    [n.w7.com_tr]: r
                }
        },
        34688: function(e, M, t) {
            "use strict";
            t.d(M, {
                QT: function() {
                    return a
                }
            });
            var n = t(27361),
                N = t.n(n),
                i = t(32603),
                r = t(61757);
            t(52103), t(12180);
            const a = function(e, M) {
                return void 0 === M && (M = r.VJ), !N()(i.bo, [M, e], !1)
            }
        },
        71466: function(e, M, t) {
            "use strict";
            t.d(M, {
                _T: function() {
                    return a
                },
                vB: function() {
                    return l
                }
            });
            var n = t(15531),
                N = t(34531);
            const i = "en-us",
                r = {
                    en: i,
                    ru: "ru",
                    "zh-CN": "zh-cn",
                    "zh-TW": "zh-tw",
                    "es-EM": "es",
                    "tr-TR": "tr",
                    "pt-BR": "pt"
                },
                a = function(e) {
                    void 0 === e && (e = !0);
                    const M = e && r[(0, n.Kd)()] || i;
                    return N.M_ + "/hc/" + M
                },
                l = function(e, M) {
                    let {
                        usePlatformLocale: t = !1
                    } = void 0 === M ? {} : M;
                    return a(t) + "/articles/" + e
                }
        },
        47443: function(e, M, t) {
            var n = t(42118);
            e.exports = function(e, M) {
                return !!(null == e ? 0 : e.length) && n(e, M, 0) > -1
            }
        },
        1196: function(e) {
            e.exports = function(e, M, t) {
                for (var n = -1, N = null == e ? 0 : e.length; ++n < N;)
                    if (t(M, e[n])) return !0;
                return !1
            }
        },
        47556: function(e, M, t) {
            var n = t(88668),
                N = t(47443),
                i = t(1196),
                r = t(29932),
                a = t(7518),
                l = t(74757),
                D = Math.min;
            e.exports = function(e, M, t) {
                for (var u = t ? i : N, c = e[0].length, g = e.length, I = g, o = Array(g), s = 1 / 0, j = []; I--;) {
                    var T = e[I];
                    I && M && (T = r(T, a(M))), s = D(T.length, s), o[I] = !t && (M || c >= 120 && T.length >= 120) ? new n(I && T) : void 0
                }
                T = e[0];
                var E = -1,
                    A = o[0];
                e: for (; ++E < c && j.length < s;) {
                    var z = T[E],
                        y = M ? M(z) : z;
                    if (z = t || 0 !== z ? z : 0, !(A ? l(A, y) : u(j, y, t))) {
                        for (I = g; --I;) {
                            var O = o[I];
                            if (!(O ? l(O, y) : u(e[I], y, t))) continue e
                        }
                        A && A.push(y), j.push(z)
                    }
                }
                return j
            }
        },
        5976: function(e, M, t) {
            var n = t(6557),
                N = t(45357),
                i = t(30061);
            e.exports = function(e, M) {
                return i(N(e, M, n), e + "")
            }
        },
        5076: function(e, M, t) {
            var n = t(89881);
            e.exports = function(e, M) {
                var t;
                return n(e, (function(e, n, N) {
                    return !(t = M(e, n, N))
                })), !!t
            }
        },
        45652: function(e, M, t) {
            var n = t(88668),
                N = t(47443),
                i = t(1196),
                r = t(74757),
                a = t(23593),
                l = t(21814);
            e.exports = function(e, M, t) {
                var D = -1,
                    u = N,
                    c = e.length,
                    g = !0,
                    I = [],
                    o = I;
                if (t) g = !1, u = i;
                else if (c >= 200) {
                    var s = M ? null : a(e);
                    if (s) return l(s);
                    g = !1, u = r, o = new n
                } else o = M ? [] : I;
                e: for (; ++D < c;) {
                    var j = e[D],
                        T = M ? M(j) : j;
                    if (j = t || 0 !== j ? j : 0, g && T == T) {
                        for (var E = o.length; E--;)
                            if (o[E] === T) continue e;
                        M && o.push(T), I.push(j)
                    } else u(o, T, t) || (o !== I && o.push(T), I.push(j))
                }
                return I
            }
        },
        24387: function(e, M, t) {
            var n = t(29246);
            e.exports = function(e) {
                return n(e) ? e : []
            }
        },
        23593: function(e, M, t) {
            var n = t(58525),
                N = t(50308),
                i = t(21814),
                r = n && 1 / i(new n([, -0]))[1] == 1 / 0 ? function(e) {
                    return new n(e)
                } : N;
            e.exports = r
        },
        25325: function(e, M, t) {
            var n = t(29932),
                N = t(47556),
                i = t(5976),
                r = t(24387),
                a = i((function(e) {
                    var M = n(e, r);
                    return M.length && M[0] === e[0] ? N(M) : []
                }));
            e.exports = a
        },
        29246: function(e, M, t) {
            var n = t(98612),
                N = t(37005);
            e.exports = function(e) {
                return N(e) && n(e)
            }
        },
        18446: function(e, M, t) {
            var n = t(90939);
            e.exports = function(e, M) {
                return n(e, M)
            }
        },
        59704: function(e, M, t) {
            var n = t(82908),
                N = t(67206),
                i = t(5076),
                r = t(1469),
                a = t(16612);
            e.exports = function(e, M, t) {
                var l = r(e) ? n : i;
                return t && a(e, M, t) && (M = void 0), l(e, N(M, 3))
            }
        },
        69572: function(e, M, t) {
            var n = t(14259),
                N = t(40554);
            e.exports = function(e, M, t) {
                return e && e.length ? (M = t || void 0 === M ? 1 : N(M), n(e, 0, M < 0 ? 0 : M)) : []
            }
        },
        44908: function(e, M, t) {
            var n = t(45652);
            e.exports = function(e) {
                return e && e.length ? n(e) : []
            }
        },
        87498: function(e, M) {
            "use strict";
            M.Z = "data:image/svg+xml;base64,PHN2ZyBkYXRhLWljb249ImNyb3NzIiB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNOS40MSA4bDMuMjktMy4yOWMuMTktLjE4LjMtLjQzLjMtLjcxYTEuMDAzIDEuMDAzIDAgMDAtMS43MS0uNzFMOCA2LjU5bC0zLjI5LTMuM2ExLjAwMyAxLjAwMyAwIDAwLTEuNDIgMS40Mkw2LjU5IDggMy4zIDExLjI5Yy0uMTkuMTgtLjMuNDMtLjMuNzFhMS4wMDMgMS4wMDMgMCAwMDEuNzEuNzFMOCA5LjQxbDMuMjkgMy4yOWMuMTguMTkuNDMuMy43MS4zYTEuMDAzIDEuMDAzIDAgMDAuNzEtMS43MUw5LjQxIDh6IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjwvcGF0aD48L3N2Zz4="
        },
        72785: function(e, M) {
            "use strict";
            M.Z = "data:image/svg+xml;base64,PHN2ZyBkYXRhLWljb249InNoYXJlIiB3aWR0aD0iMTAiIGhlaWdodD0iMTAiIHZpZXdCb3g9IjAgMCAxNiAxNiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTAuOTkgMTMuOTloLTl2LTloNC43NmwyLTJILjk5Yy0uNTUgMC0xIC40NS0xIDF2MTFjMCAuNTUuNDUgMSAxIDFoMTFjLjU1IDAgMS0uNDUgMS0xVjcuMjRsLTIgMnY0Ljc1em00LTE0aC01Yy0uNTUgMC0xIC40NS0xIDFzLjQ1IDEgMSAxaDIuNTlMNy4yOSA3LjI4YTEgMSAwIDAwLS4zLjcxIDEuMDAzIDEuMDAzIDAgMDAxLjcxLjcxbDUuMjktNS4yOVY2YzAgLjU1LjQ1IDEgMSAxczEtLjQ1IDEtMVYxYzAtLjU2LS40NS0xLjAxLTEtMS4wMXoiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PC9wYXRoPjwvc3ZnPg=="
        }
    }
]);