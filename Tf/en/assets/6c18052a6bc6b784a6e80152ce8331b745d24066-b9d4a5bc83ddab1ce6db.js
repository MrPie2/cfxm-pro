/*! For license information please see 6c18052a6bc6b784a6e80152ce8331b745d24066-b9d4a5bc83ddab1ce6db.js.LICENSE.txt */
(self.webpackChunkbfx_ui_public = self.webpackChunkbfx_ui_public || []).push([
    [129], {
        67462: function(e, t) {
            "use strict";
            var n = /; *([!#$%&'*+.^_`|~0-9A-Za-z-]+) *= *("(?:[\u000b\u0020\u0021\u0023-\u005b\u005d-\u007e\u0080-\u00ff]|\\[\u000b\u0020-\u00ff])*"|[!#$%&'*+.^_`|~0-9A-Za-z-]+) */g,
                r = /^[\u000b\u0020-\u007e\u0080-\u00ff]+$/,
                i = /^[!#$%&'*+.^_`|~0-9A-Za-z-]+$/,
                a = /\\([\u000b\u0020-\u00ff])/g,
                o = /([\\"])/g,
                c = /^[!#$%&'*+.^_`|~0-9A-Za-z-]+\/[!#$%&'*+.^_`|~0-9A-Za-z-]+$/;

            function s(e) {
                var t = String(e);
                if (i.test(t)) return t;
                if (t.length > 0 && !r.test(t)) throw new TypeError("invalid parameter value");
                return '"' + t.replace(o, "\\$1") + '"'
            }

            function u(e) {
                this.parameters = Object.create(null), this.type = e
            }
            t.Q = function(e) {
                if (!e) throw new TypeError("argument string is required");
                var t = "object" == typeof e ? function(e) {
                    var t;
                    "function" == typeof e.getHeader ? t = e.getHeader("content-type") : "object" == typeof e.headers && (t = e.headers && e.headers["content-type"]);
                    if ("string" != typeof t) throw new TypeError("content-type header is missing from object");
                    return t
                }(e) : e;
                if ("string" != typeof t) throw new TypeError("argument string is required to be a string");
                var r = t.indexOf(";"),
                    i = -1 !== r ? t.slice(0, r).trim() : t.trim();
                if (!c.test(i)) throw new TypeError("invalid media type");
                var o = new u(i.toLowerCase());
                if (-1 !== r) {
                    var s, l, f;
                    for (n.lastIndex = r; l = n.exec(t);) {
                        if (l.index !== r) throw new TypeError("invalid parameter format");
                        r += l[0].length, s = l[1].toLowerCase(), 34 === (f = l[2]).charCodeAt(0) && -1 !== (f = f.slice(1, -1)).indexOf("\\") && (f = f.replace(a, "$1")), o.parameters[s] = f
                    }
                    if (r !== t.length) throw new TypeError("invalid parameter format")
                }
                return o
            }
        },
        798: function(e, t, n) {
            "use strict";
            n.d(t, {
                Q: function() {
                    return O
                }
            });
            var r = n(10434),
                i = n.n(r),
                a = n(7071),
                o = n.n(a),
                c = n(7867),
                s = n.n(c);
            Object.create;

            function u(e, t, n) {
                if (n || 2 === arguments.length)
                    for (var r, i = 0, a = t.length; i < a; i++) !r && i in t || (r || (r = Array.prototype.slice.call(t, 0, i)), r[i] = t[i]);
                return e.concat(r || Array.prototype.slice.call(t))
            }
            Object.create;
            var l = n(67462),
                f = new Map,
                d = function(e) {
                    return e.cloneNode(!0)
                },
                m = function() {
                    return "file:" === window.location.protocol
                },
                p = function(e, t, n) {
                    var r = new XMLHttpRequest;
                    r.onreadystatechange = function() {
                        try {
                            if (!/\.svg/i.test(e) && 2 === r.readyState) {
                                var t = r.getResponseHeader("Content-Type");
                                if (!t) throw new Error("Content type not found");
                                var i = (0, l.Q)(t).type;
                                if ("image/svg+xml" !== i && "text/plain" !== i) throw new Error("Invalid content type: ".concat(i))
                            }
                            if (4 === r.readyState) {
                                if (404 === r.status || null === r.responseXML) throw new Error(m() ? "Note: SVG injection ajax calls do not work locally without adjusting security settings in your browser. Or consider using a local webserver." : "Unable to load SVG file: " + e);
                                if (!(200 === r.status || m() && 0 === r.status)) throw new Error("There was a problem injecting the SVG: " + r.status + " " + r.statusText);
                                n(null, r)
                            }
                        } catch (a) {
                            if (r.abort(), !(a instanceof Error)) throw a;
                            n(a, r)
                        }
                    }, r.open("GET", e), r.withCredentials = t, r.overrideMimeType && r.overrideMimeType("text/xml"), r.send()
                },
                g = {},
                v = function(e, t) {
                    g[e] = g[e] || [], g[e].push(t)
                },
                h = function(e, t, n) {
                    if (f.has(e)) {
                        var r = f.get(e);
                        if (void 0 === r) return void v(e, n);
                        if (r instanceof SVGSVGElement) return void n(null, d(r))
                    }
                    f.set(e, void 0), v(e, n), p(e, t, (function(t, n) {
                        var r;
                        t ? f.set(e, t) : (null === (r = n.responseXML) || void 0 === r ? void 0 : r.documentElement) instanceof SVGSVGElement && f.set(e, n.responseXML.documentElement),
                            function(e) {
                                for (var t = function(t, n) {
                                        setTimeout((function() {
                                            if (Array.isArray(g[e])) {
                                                var n = f.get(e),
                                                    r = g[e][t];
                                                n instanceof SVGSVGElement && r(null, d(n)), n instanceof Error && r(n), t === g[e].length - 1 && delete g[e]
                                            }
                                        }), 0)
                                    }, n = 0, r = g[e].length; n < r; n++) t(n)
                            }(e)
                    }))
                },
                b = function(e, t, n) {
                    p(e, t, (function(e, t) {
                        var r;
                        e ? n(e) : (null === (r = t.responseXML) || void 0 === r ? void 0 : r.documentElement) instanceof SVGSVGElement && n(null, t.responseXML.documentElement)
                    }))
                },
                M = 0,
                E = [],
                y = {},
                w = "http://www.w3.org/1999/xlink",
                T = function(e, t, n, r, i, a, o) {
                    var c = e.getAttribute("data-src") || e.getAttribute("src");
                    if (c) {
                        if (-1 !== E.indexOf(e)) return E.splice(E.indexOf(e), 1), void(e = null);
                        E.push(e), e.setAttribute("src", ""), (r ? h : b)(c, i, (function(r, i) {
                            if (!i) return E.splice(E.indexOf(e), 1), e = null, void o(r);
                            var s = e.getAttribute("id");
                            s && i.setAttribute("id", s);
                            var l = e.getAttribute("title");
                            l && i.setAttribute("title", l);
                            var f = e.getAttribute("width");
                            f && i.setAttribute("width", f);
                            var d = e.getAttribute("height");
                            d && i.setAttribute("height", d);
                            var m = Array.from(new Set(u(u(u([], (i.getAttribute("class") || "").split(" "), !0), ["injected-svg"], !1), (e.getAttribute("class") || "").split(" "), !0))).join(" ").trim();
                            i.setAttribute("class", m);
                            var p = e.getAttribute("style");
                            p && i.setAttribute("style", p), i.setAttribute("data-src", c);
                            var g = [].filter.call(e.attributes, (function(e) {
                                return /^data-\w[\w-]*$/.test(e.name)
                            }));
                            if (Array.prototype.forEach.call(g, (function(e) {
                                    e.name && e.value && i.setAttribute(e.name, e.value)
                                })), n) {
                                var v, h, b, T, I, k = {
                                    clipPath: ["clip-path"],
                                    "color-profile": ["color-profile"],
                                    cursor: ["cursor"],
                                    filter: ["filter"],
                                    linearGradient: ["fill", "stroke"],
                                    marker: ["marker", "marker-start", "marker-mid", "marker-end"],
                                    mask: ["mask"],
                                    path: [],
                                    pattern: ["fill", "stroke"],
                                    radialGradient: ["fill", "stroke"]
                                };
                                Object.keys(k).forEach((function(e) {
                                    v = e, b = k[e];
                                    for (var t = function(e, t) {
                                            var n;
                                            T = h[e].id, I = T + "-" + ++M, Array.prototype.forEach.call(b, (function(e) {
                                                for (var t = 0, r = (n = i.querySelectorAll("[" + e + '*="' + T + '"]')).length; t < r; t++) {
                                                    var a = n[t].getAttribute(e);
                                                    a && !a.match(new RegExp('url\\("?#' + T + '"?\\)')) || n[t].setAttribute(e, "url(#" + I + ")")
                                                }
                                            }));
                                            for (var r = i.querySelectorAll("[*|href]"), a = [], o = 0, c = r.length; o < c; o++) {
                                                var s = r[o].getAttributeNS(w, "href");
                                                s && s.toString() === "#" + h[e].id && a.push(r[o])
                                            }
                                            for (var u = 0, l = a.length; u < l; u++) a[u].setAttributeNS(w, "href", "#" + I);
                                            h[e].id = I
                                        }, n = 0, r = (h = i.querySelectorAll(v + "[id]")).length; n < r; n++) t(n)
                                }))
                            }
                            i.removeAttribute("xmlns:a");
                            for (var N, j, O = i.querySelectorAll("script"), x = [], A = 0, S = O.length; A < S; A++)(j = O[A].getAttribute("type")) && "application/ecmascript" !== j && "application/javascript" !== j && "text/javascript" !== j || ((N = O[A].innerText || O[A].textContent) && x.push(N), i.removeChild(O[A]));
                            if (x.length > 0 && ("always" === t || "once" === t && !y[c])) {
                                for (var C = 0, D = x.length; C < D; C++) new Function(x[C])(window);
                                y[c] = !0
                            }
                            var z = i.querySelectorAll("style");
                            if (Array.prototype.forEach.call(z, (function(e) {
                                    e.textContent += ""
                                })), i.setAttribute("xmlns", "http://www.w3.org/2000/svg"), i.setAttribute("xmlns:xlink", w), a(i), !e.parentNode) return E.splice(E.indexOf(e), 1), e = null, void o(new Error("Parent node is null"));
                            e.parentNode.replaceChild(i, e), E.splice(E.indexOf(e), 1), e = null, o(null, i)
                        }))
                    } else o(new Error("Invalid data-src or src attribute"))
                },
                I = n(67294),
                k = ["afterInjection", "beforeInjection", "evalScripts", "fallback", "httpRequestWithCredentials", "loading", "renumerateIRIElements", "src", "useRequestCache", "wrapper"],
                N = "http://www.w3.org/2000/svg",
                j = "http://www.w3.org/1999/xlink",
                O = function(e) {
                    function t() {
                        for (var t, n = arguments.length, r = new Array(n), i = 0; i < n; i++) r[i] = arguments[i];
                        return (t = e.call.apply(e, [this].concat(r)) || this).initialState = {
                            hasError: !1,
                            isLoading: !0
                        }, t.state = t.initialState, t._isMounted = !1, t.reactWrapper = void 0, t.nonReactWrapper = void 0, t.refCallback = function(e) {
                            t.reactWrapper = e
                        }, t
                    }
                    s()(t, e);
                    var n = t.prototype;
                    return n.renderSVG = function() {
                        var e = this;
                        if (this.reactWrapper instanceof Node) {
                            var t, n, r = this.props,
                                i = r.beforeInjection,
                                a = r.evalScripts,
                                o = r.httpRequestWithCredentials,
                                c = r.renumerateIRIElements,
                                s = r.src,
                                u = r.useRequestCache,
                                l = this.props.afterInjection,
                                f = this.props.wrapper;
                            "svg" === f ? ((t = document.createElementNS(N, f)).setAttribute("xmlns", N), t.setAttribute("xmlns:xlink", j), n = document.createElementNS(N, f)) : (t = document.createElement(f), n = document.createElement(f)), t.appendChild(n), n.dataset.src = s, this.nonReactWrapper = this.reactWrapper.appendChild(t);
                            ! function(e, t) {
                                var n = void 0 === t ? {} : t,
                                    r = n.afterAll,
                                    i = void 0 === r ? function() {} : r,
                                    a = n.afterEach,
                                    o = void 0 === a ? function() {} : a,
                                    c = n.beforeEach,
                                    s = void 0 === c ? function() {} : c,
                                    u = n.cacheRequests,
                                    l = void 0 === u || u,
                                    f = n.evalScripts,
                                    d = void 0 === f ? "never" : f,
                                    m = n.httpRequestWithCredentials,
                                    p = void 0 !== m && m,
                                    g = n.renumerateIRIElements,
                                    v = void 0 === g || g;
                                if (e && "length" in e)
                                    for (var h = 0, b = 0, M = e.length; b < M; b++) T(e[b], d, v, l, p, s, (function(t, n) {
                                        o(t, n), e && "length" in e && e.length === ++h && i(h)
                                    }));
                                else e ? T(e, d, v, l, p, s, (function(t, n) {
                                    o(t, n), i(1), e = null
                                })) : i(0)
                            }(n, {
                                afterEach: function(t, n) {
                                    !t || (e.removeSVG(), e._isMounted) ? e._isMounted && e.setState((function() {
                                        return {
                                            hasError: !!t,
                                            isLoading: !1
                                        }
                                    }), (function() {
                                        l(t, n)
                                    })) : l(t)
                                },
                                beforeEach: i,
                                cacheRequests: u,
                                evalScripts: a,
                                httpRequestWithCredentials: o,
                                renumerateIRIElements: c
                            })
                        }
                    }, n.removeSVG = function() {
                        var e;
                        null != (e = this.nonReactWrapper) && e.parentNode && (this.nonReactWrapper.parentNode.removeChild(this.nonReactWrapper), this.nonReactWrapper = null)
                    }, n.componentDidMount = function() {
                        this._isMounted = !0, this.renderSVG()
                    }, n.componentDidUpdate = function(e) {
                        var t = this;
                        (function(e, t) {
                            for (var n in e)
                                if (!(n in t)) return !0;
                            for (var r in t)
                                if (e[r] !== t[r]) return !0;
                            return !1
                        })(e, this.props) && this.setState((function() {
                            return t.initialState
                        }), (function() {
                            t.removeSVG(), t.renderSVG()
                        }))
                    }, n.componentWillUnmount = function() {
                        this._isMounted = !1, this.removeSVG()
                    }, n.render = function() {
                        var e = this.props;
                        e.afterInjection, e.beforeInjection, e.evalScripts;
                        var t = e.fallback;
                        e.httpRequestWithCredentials;
                        var n = e.loading;
                        e.renumerateIRIElements, e.src, e.useRequestCache;
                        var r = e.wrapper,
                            a = o()(e, k),
                            c = r;
                        return I.createElement(c, i()({}, a, {
                            ref: this.refCallback
                        }, "svg" === r ? {
                            xmlns: N,
                            xmlnsXlink: j
                        } : {}), this.state.isLoading && n && I.createElement(n, null), this.state.hasError && t && I.createElement(t, null))
                    }, t
                }(I.Component);
            O.defaultProps = {
                afterInjection: function() {},
                beforeInjection: function() {},
                evalScripts: "never",
                fallback: null,
                httpRequestWithCredentials: !1,
                loading: null,
                renumerateIRIElements: !0,
                useRequestCache: !0,
                wrapper: "div"
            }
        },
        93296: function(e, t, n) {
            "use strict";
            var r = n(67294),
                i = n(75900),
                a = n.n(i),
                o = n(798);
            const c = e => {
                let {
                    direction: t,
                    isReversed: n
                } = e;
                return r.createElement(o.Q, {
                    className: a()({
                        reversed: n
                    }, t + "_arrow"),
                    alt: t + " arrow",
                    src: "/images/" + t + "-arrow.svg"
                })
            };
            c.defaultProps = {
                isReversed: !1,
                direction: "down"
            }, t.Z = c
        },
        26330: function(e, t, n) {
            "use strict";
            var r = n(93296);
            t.Z = r.Z
        },
        18200: function(e, t, n) {
            "use strict";
            n.d(t, {
                Z: function() {
                    return A
                }
            });
            var r = n(67294);
            var i = n(68270),
                a = n.p + "static/download-app-bg-ab9b7ff0f235a498fba6008a5df9d977.svg",
                o = n(15531),
                c = n(71082),
                s = n(87274);
            const u = (e, t) => {
                const {
                    0: n,
                    1: i
                } = (0, r.useState)(t);
                return (0, r.useEffect)((() => {
                    i((0, o.Do)(e))
                }), [e]), [n, i]
            };
            var l = n(45176);
            const f = "bfx-ui-public/BFX_MOBILE_BANNER_HIDDEN",
                d = {
                    expires: 30
                },
                m = () => {
                    const {
                        t: e
                    } = (0, i.$)("banners"), {
                        visible: t,
                        onClick: n,
                        onClose: m
                    } = (() => {
                        const e = (0, l.X)(),
                            [t, n] = u(f, !0);
                        return {
                            visible: !t && e,
                            onClose: () => {
                                n(!0), (0, o.d8)(f, 1, d)
                            },
                            onClick: () => {
                                (0, c.navigate)(s.x)
                            }
                        }
                    })();
                    return t ? r.createElement("div", {
                        className: "download-app__container"
                    }, r.createElement("img", {
                        className: "download-app__close",
                        onClick: m,
                        src: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgb3BhY2l0eT0iMC4zIj4KPHBhdGggZD0iTTcuMjAwMDEgNy4xOTk5NUwxNi44IDE2Ljc5OTlNNy4yMDAwMSAxNi43OTk5TDE2LjggNy4xOTk5NSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9nPgo8L3N2Zz4K",
                        alt: "close"
                    }), r.createElement("img", {
                        className: "download-app__bg",
                        alt: "Download app",
                        src: a
                    }), r.createElement("div", {
                        className: "download-app__content"
                    }, r.createElement("div", {
                        className: "download-app__content-title"
                    }, e("bfx_app")), r.createElement("div", {
                        className: "download-app__content-desc"
                    }, e("trade_on_go")), r.createElement("button", {
                        onClick: n,
                        type: "button"
                    }, e("download")))) : null
                };
            var p = (0, r.memo)(m),
                g = n(75900),
                v = n.n(g),
                h = n(81439),
                b = n(64721),
                M = n.n(b),
                E = n(16156),
                y = n(42043),
                w = n(52049),
                T = n(17005);
            const I = ["ru"],
                k = () => {
                    const {
                        0: e,
                        1: t
                    } = (0, r.useState)(!1), {
                        t: n
                    } = (0, i.$)();
                    (0, r.useEffect)((() => {
                        let e;
                        return (0, E.mR)().then((n => {
                            e || t(n)
                        })), () => {
                            e = !0
                        }
                    }), []);
                    if (!e) return null;
                    const a = M()(I, h.ZP.language);
                    return r.createElement("div", {
                        className: v()("cookies-banner", {
                            "cookies-banner__compact": a
                        })
                    }, r.createElement("div", {
                        className: "cookies-banner__title"
                    }, n("cookies_notification:title")), r.createElement("div", {
                        className: "cookies-banner__desc"
                    }, n("cookies_notification:desc"), " ", r.createElement(T.Z, {
                        to: "/legal/cookies"
                    }, n("footer:cookies_policy"))), r.createElement("div", {
                        className: "cookies-banner__buttons"
                    }, r.createElement(T.Z, {
                        to: "/?manageCookies",
                        onClick: () => t(!1)
                    }, r.createElement(y.Z, {
                        secondary: !0
                    }, n("cookies_notification:manage"))), r.createElement(y.Z, {
                        onClick: () => {
                            (0, E.Pm)(E.Uw), (0, w.loadAnalyticsIfCookiesAccepted)(), t(!1)
                        }
                    }, n("cookies_notification:accept_all"))))
                };
            var N = (0, r.memo)(k);
            var j = () => {
                    const {
                        t: e
                    } = (0, i.$)("referral-banner");
                    return r.createElement("div", {
                        className: "referral-banner"
                    }, r.createElement("div", {
                        className: "referral-banner__top"
                    }, r.createElement("img", {
                        src: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTUiIGhlaWdodD0iNTUiIHZpZXdCb3g9IjAgMCA1NSA1NSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxjaXJjbGUgY3g9IjI3LjUiIGN5PSIyNy41IiByPSIyNy41IiBmaWxsPSIjMEUzNDUyIiAvPgogICAgPHBhdGggZD0iTTM2LjU5OTggMjYuOTk5OEgxNy4zOTk4TTM2LjU5OTggMjYuOTk5OEMzNy40ODM1IDI2Ljk5OTggMzguMTk5OCAyNi4yODM1IDM4LjE5OTggMjUuMzk5OFYyMy43OTk4QzM4LjE5OTggMjIuOTE2MSAzNy40ODM1IDIyLjE5OTggMzYuNTk5OCAyMi4xOTk4SDE3LjM5OThDMTYuNTE2MSAyMi4xOTk4IDE1Ljc5OTggMjIuOTE2MSAxNS43OTk4IDIzLjc5OThWMjUuMzk5OEMxNS43OTk4IDI2LjI4MzUgMTYuNTE2MSAyNi45OTk4IDE3LjM5OTggMjYuOTk5OE0zNi41OTk4IDI2Ljk5OThWMzQuOTk5OEMzNi41OTk4IDM2Ljc2NzEgMzUuMTY3MSAzOC4xOTk4IDMzLjM5OTggMzguMTk5OEgyMC41OTk4QzE4LjgzMjUgMzguMTk5OCAxNy4zOTk4IDM2Ljc2NzEgMTcuMzk5OCAzNC45OTk4TDE3LjM5OTggMjYuOTk5OE0yNi45OTk4IDIyLjE5OThWMjAuNTk5OE0yNi45OTk4IDIyLjE5OThIMjEuNzQyN0MyMC4yMjc4IDIyLjE5OTggMTguOTk5OCAyMC45NzE4IDE4Ljk5OTggMTkuNDU2OVYxOC45OTk4QzE4Ljk5OTggMTcuMjMyNSAyMC40MzI1IDE1Ljc5OTggMjIuMTk5OCAxNS43OTk4QzI0Ljg1MDggMTUuNzk5OCAyNi45OTk4IDE3Ljk0ODggMjYuOTk5OCAyMC41OTk4TTI2Ljk5OTggMjIuMTk5OEgzMi4yNTY5QzMzLjc3MTggMjIuMTk5OCAzNC45OTk4IDIwLjk3MTggMzQuOTk5OCAxOS40NTY5VjE4Ljk5OThDMzQuOTk5OCAxNy4yMzI1IDMzLjU2NzEgMTUuNzk5OCAzMS43OTk4IDE1Ljc5OThDMjkuMTQ4OCAxNS43OTk4IDI2Ljk5OTggMTcuOTQ4OCAyNi45OTk4IDIwLjU5OThNMjYuOTk5OCAyMi4xOTk4VjM4LjE5OTgiIHN0cm9rZT0iIzQwOTZGMiIgc3Ryb2tlLXdpZHRoPSIxLjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIgLz4KPC9zdmc+CiAgICA=",
                        alt: "referral"
                    }), r.createElement("h5", {
                        className: "referral-banner__title"
                    }, e("title"))), r.createElement("div", {
                        className: "referral-banner__bottom"
                    }, r.createElement(T.Z, {
                        to: "/affiliates"
                    }, r.createElement(y.Z, {
                        blue: !0,
                        secondary: !0
                    }, e("learn_more"))), r.createElement(T.Z, {
                        to: s.hl
                    }, r.createElement(y.Z, {
                        blue: !0
                    }, e("refer")))))
                },
                O = n(54998);
            const x = () => {
                const {
                    cookiesBannerVisible: e,
                    downloadAppBannerVisible: t,
                    referralBannerVisible: n
                } = (0, r.useContext)(O.tH);
                return (() => {
                    const {
                        0: e,
                        1: t
                    } = (0, r.useState)(!0);
                    return (0, r.useEffect)((() => {
                        t(!1)
                    }), []), e
                })() ? null : r.createElement("div", {
                    className: "bottom-banners"
                }, t && r.createElement(p, null), e && r.createElement(N, null), n && r.createElement(j, null))
            };
            var A = (0, r.memo)(x)
        },
        44031: function(e, t, n) {
            "use strict";
            var r = n(67294),
                i = n(68270),
                a = n(3674),
                o = n.n(a),
                c = n(35161),
                s = n.n(c),
                u = n(66460),
                l = n(26330),
                f = n(24113),
                d = n(53007);
            t.Z = () => {
                const {
                    0: e,
                    1: t
                } = (0, r.useState)(!1), {
                    i18n: n
                } = (0, i.$)(), a = (0, d.h)(), c = (0, r.useMemo)((() => s()(o()(a), (e => ({
                    key: e,
                    item: a[e]
                })))), [a]);
                return r.createElement("div", {
                    className: "language_selector"
                }, r.createElement(u.Z, {
                    items: c,
                    onSelectItem: r => {
                        var i;
                        i = r, n.changeLanguage(i), (0, f.jJ)(i), t(!e)
                    },
                    classnames: {
                        select: "popover_select",
                        popover: "popover_menu",
                        item: "popover_menu_item"
                    },
                    buttonProps: {
                        rightIcon: r.createElement(l.Z, {
                            isReversed: e,
                            direction: "down"
                        })
                    }
                }, a[n.language]))
            }
        },
        25335: function(e, t, n) {
            "use strict";
            n.d(t, {
                Z: function() {
                    return s
                }
            });
            var r = n(67294),
                i = n(68270),
                a = n(34531),
                o = n(42043),
                c = n(24113);
            var s = () => {
                const {
                    t: e
                } = (0, i.$)("common");
                return r.createElement("a", {
                    href: (0, c.Zd)(a.Wd)
                }, r.createElement(o.Z, {
                    secondary: !0
                }, e("login_btn")))
            }
        },
        44425: function(e, t, n) {
            "use strict";
            n.d(t, {
                Z: function() {
                    return u
                }
            });
            var r = n(67294),
                i = n(68270),
                a = n(42043),
                o = n(84741),
                c = n(17005);
            const s = e => {
                let {
                    isSecuritiesRootPage: t
                } = e;
                const {
                    t: n
                } = (0, i.$)("common");
                return r.createElement(c.Z, {
                    to: (0, o.bN)({
                        isSecuritiesRootPage: t
                    })
                }, r.createElement(a.Z, null, n("register_btn")))
            };
            s.defaultProps = {
                isSecuritiesRootPage: !1
            };
            var u = s
        },
        66460: function(e, t, n) {
            "use strict";
            n.d(t, {
                Z: function() {
                    return p
                }
            });
            var r = n(67294),
                i = n(798),
                a = n(75900),
                o = n.n(a),
                c = n(35161),
                s = n.n(c),
                u = n(42043);
            const l = e => {
                let {
                    item: t,
                    classname: n,
                    onClick: i
                } = e;
                return r.createElement("div", {
                    className: n,
                    onClick: i,
                    "aria-hidden": !0
                }, t)
            };
            l.defaultProps = {
                onClick: () => {}
            };
            var f = l,
                d = n(78761);
            const m = e => {
                let {
                    items: t,
                    classnames: n,
                    onSelectItem: i,
                    buttonProps: a,
                    children: c,
                    itemRenderer: l
                } = e;
                const {
                    0: d,
                    1: m
                } = (0, r.useState)(!1), {
                    dataTestId: p,
                    rightIcon: g
                } = a, v = e => {
                    m(!1), null == i || i(e)
                };
                return r.createElement("div", {
                    className: n.select
                }, r.createElement(u.Z, {
                    onClick: () => {
                        m(!d)
                    },
                    dataTestId: p,
                    rightIcon: g
                }, c), d && r.createElement(r.Fragment, null, r.createElement("div", {
                    className: "select-backdrop",
                    onClick: () => m(!1),
                    "aria-hidden": !0
                }), r.createElement("div", {
                    className: o()(["select-popover-default", "custom-scrollbar", n.popover]),
                    "data-testid": "select-menu"
                }, s()(t, l ? e => {
                    let {
                        item: t
                    } = e;
                    return l(t, (() => v(t)))
                } : e => {
                    let {
                        key: t,
                        item: i
                    } = e;
                    return r.createElement(f, {
                        key: t,
                        item: i,
                        classname: n.item,
                        onClick: () => v(t)
                    })
                }))))
            };
            m.defaultProps = {
                classnames: {
                    select: "",
                    popover: "",
                    item: ""
                },
                itemRenderer: void 0,
                items: [],
                buttonProps: {
                    rightIcon: r.createElement(i.Q, {
                        src: d.Z
                    }),
                    dataTestId: void 0
                }
            };
            var p = m
        },
        54998: function(e, t, n) {
            "use strict";
            n.d(t, {
                KA: function() {
                    return f
                },
                tH: function() {
                    return l
                }
            });
            var r = n(67294),
                i = n(64721),
                a = n.n(i),
                o = n(24113);
            const c = [""],
                s = ["", "/login", "/sign-up"],
                u = ["/confirm-signup"],
                l = (0, r.createContext)({
                    cookiesBannerVisible: !1,
                    downloadAppBannerVisible: !1,
                    referralBannerVisible: !1
                }),
                f = e => {
                    let {
                        children: t,
                        path: n
                    } = e;
                    const i = (0, r.useMemo)((() => {
                        const e = (0, o.Qj)(n);
                        return {
                            cookiesBannerVisible: a()(s, e),
                            downloadAppBannerVisible: a()(c, e),
                            referralBannerVisible: a()(u, e)
                        }
                    }), [n]);
                    return r.createElement(l.Provider, {
                        value: i
                    }, t)
                }
        },
        57647: function(e, t, n) {
            "use strict";
            var r = n(27361),
                i = n.n(r),
                a = n(36968),
                o = n.n(a),
                c = n(57557),
                s = n.n(c);
            const u = new(function() {
                function e() {
                    this.cache = {}
                }
                var t = e.prototype;
                return t.get = function(e) {
                    return i()(this.cache, e)
                }, t.set = function(e, t) {
                    return o()(this.cache, e, t), t
                }, t.delete = function(e) {
                    return s()(this.cache, e)
                }, t.clear = function() {
                    this.cache = {}
                }, e
            }());
            t.Z = u
        },
        3753: function(e, t, n) {
            "use strict";
            n.d(t, {
                R: function() {
                    return s
                }
            });
            var r = n(8804),
                i = n.n(r),
                a = n(2228),
                o = n(57647);
            const c = "bfx-features-promise";

            function s() {
                let e = o.Z.get(c);
                return e || (e = new Promise(((e, t) => {
                    (0, a.U8)().then((t => {
                        let {
                            data: n
                        } = t;
                        e(i()(n))
                    })).catch(t)
                })), o.Z.set(c, e), e)
            }
        },
        53007: function(e, t, n) {
            "use strict";
            n.d(t, {
                h: function() {
                    return b
                }
            });
            var r = n(67294),
                i = n(35161),
                a = n.n(i),
                o = n(39693),
                c = n.n(o),
                s = n(57557),
                u = n.n(s),
                l = n(3674),
                f = n.n(l),
                d = n(77101),
                m = n(3753),
                p = n(4185),
                g = n(4147);
            const v = {
                    "tr-TR": "lang_turkish"
                },
                h = u()(p.E, f()(v)),
                b = () => {
                    const {
                        0: e,
                        1: t
                    } = (0, r.useState)(h);
                    return (0, r.useEffect)((() => {
                        (async () => {
                            const e = await (0, m.R)(),
                                n = c()(a()(v, ((t, n) => !(0, d.c)(e, t, g.u2) && n))),
                                r = u()(p.E, n);
                            t(r)
                        })()
                    }), []), e
                }
        },
        45176: function(e, t, n) {
            "use strict";
            n.d(t, {
                X: function() {
                    return c
                }
            });
            var r = n(67294),
                i = n(23493),
                a = n.n(i);
            const o = () => "undefined" != typeof window && window.innerWidth < 900,
                c = () => {
                    const {
                        0: e,
                        1: t
                    } = (0, r.useState)(!1);
                    return (0, r.useEffect)((() => {
                        const e = a()((() => t(o())), 200);
                        return window.addEventListener("resize", e), t(o()), () => {
                            window.removeEventListener("resize", e)
                        }
                    }), []), e
                }
        },
        4185: function(e, t, n) {
            "use strict";
            n.d(t, {
                E: function() {
                    return u
                }
            });
            var r = n(14176),
                i = n.n(r),
                a = n(66604),
                o = n.n(a),
                c = n(61757);
            const s = {
                    en: {
                        fullName: "English",
                        show: !0
                    },
                    ru: {
                        fullName: "Pусский",
                        show: c.VJ !== c.w7.jp
                    },
                    "zh-CN": {
                        fullName: "中文 (简化)",
                        show: c.VJ !== c.w7.jp
                    },
                    "zh-TW": {
                        fullName: "中文 (繁體)",
                        show: c.VJ !== c.w7.jp
                    },
                    "es-EM": {
                        fullName: "Español",
                        show: c.VJ !== c.w7.jp
                    },
                    "tr-TR": {
                        fullName: "Türkçe",
                        show: c.VJ !== c.w7.jp
                    },
                    "pt-BR": {
                        fullName: "Português",
                        show: c.VJ !== c.w7.jp
                    },
                    "ja-JP": {
                        fullName: "日本語",
                        show: c.VJ === c.w7.jp
                    }
                },
                u = o()(i()(s, (e => {
                    let {
                        show: t
                    } = e;
                    return !1 === t
                })), (e => e.fullName))
        },
        77101: function(e, t, n) {
            "use strict";
            n.d(t, {
                c: function() {
                    return g
                }
            });
            var r = n(63105),
                i = n.n(r),
                a = n(35161),
                o = n.n(a),
                c = n(13880),
                s = n.n(c),
                u = n(10240),
                l = n.n(u),
                f = n(41609),
                d = n.n(f),
                m = n(64721),
                p = n.n(m);
            const g = function(e, t, n) {
                if (void 0 === n && (n = "*"), d()(e)) return !1;
                const r = i()(e, (e => l()(e, t + ":"))),
                    a = o()(r, (e => s()(e, t + ":", "")));
                return !d()(a) && (p()(a, "*") ? !p()(a, "!" + n) : p()(a, n))
            }
        },
        84741: function(e, t, n) {
            "use strict";
            n.d(t, {
                XS: function() {
                    return O
                },
                uf: function() {
                    return z
                },
                l: function() {
                    return C
                },
                ug: function() {
                    return D
                },
                EC: function() {
                    return L
                },
                DK: function() {
                    return A
                },
                bN: function() {
                    return _
                },
                Mb: function() {
                    return Z
                }
            });
            var r = n(27361),
                i = n.n(r),
                a = n(35161),
                o = n.n(a),
                c = n(47037),
                s = n.n(c),
                u = n(3651),
                l = n.n(u),
                f = (n(84238), n(12571), n(81439), n(97398)),
                d = n.n(f),
                m = n(10240),
                p = n.n(m),
                g = n(66654),
                v = n.n(g),
                h = n(71640),
                b = n.n(h),
                M = n(2228),
                E = n(96572),
                y = n(34531);
            const w = e => {
                let {
                    signupUrl: t = y.Wd + "/sign-up",
                    isSecuritiesRootPage: n = !1,
                    isSecuritiesPage: r = !1
                } = e;
                const i = n ? {
                        source: "securityl1",
                        medium: "lp",
                        campaign: "bfxslp",
                        id: "securityl1",
                        term: "bfxslp"
                    } : {},
                    a = { ...n || r ? {
                            type: "securities",
                            back: y.HY + "/t/" + y.iY
                        } : {},
                        ...i
                    };
                return E.stringifyUrl({
                    url: t,
                    query: a
                })
            };
            var T = n(87274);
            const I = {},
                k = "bfx-green-text",
                N = "bfx-red-text",
                j = "undefined" != typeof window && i()(window, "innerWidth") < 900,
                O = function(e) {
                    void 0 === e && (e = {});
                    const {
                        elm: t,
                        offset: n
                    } = e, r = t.getBoundingClientRect(), a = j ? "mobile-header" : "header", o = document.getElementById(a), c = Math.max(o.clientHeight, o.offsetHeight) + n, s = Math.max(document.documentElement.clientHeight, i()(window, "innerHeight"));
                    return !(r.bottom - c < 0 || r.top - s >= 0)
                },
                x = "undefined" != typeof window ? new DOMParser : null,
                A = e => o()(x.parseFromString(e, "text/html").getElementsByClassName("sub-title"), (e => ({
                    label: e.getAttribute("data-title"),
                    href: "#" + e.getAttribute("id")
                })));
            let S;
            const C = async () => (S || (S = (0, M.bc)(T.Q1)), S),
                D = async e => {
                    const t = s()(e) ? b()(e, ",") : e,
                        {
                            data: n
                        } = await C();
                    return o()(t, (e => {
                        const t = l()(T.Q1, e);
                        return i()(n, t)
                    }))
                };

            function z(e) {
                void 0 === e && (e = {});
                const {
                    number: t,
                    decimals: n,
                    significantFigures: r,
                    useGrouping: i = !1
                } = e, a = {
                    useGrouping: i
                };
                d()(n) && n >= 0 ? (a.minimumFractionDigits = n, a.maximumFractionDigits = n) : d()(r) && (a.minimumSignificantDigits = 0 !== t ? r : 3, a.maximumSignificantDigits = r);
                const o = a.useGrouping + "-" + a.minimumFractionDigits + "-" + a.maximumFractionDigits + "-" + a.minimumSignificantDigits + "-" + a.maximumSignificantDigits;
                let c = I[o];
                return c || (c = new Intl.NumberFormat("EN-US", a), I[o] = c), c.format(t)
            }

            function L(e, t) {
                void 0 === t && (t = {});
                const {
                    strike: n = null,
                    coloredStrike: r = !0,
                    includeStrike: i = !1
                } = t;
                return r && d()(e) && d()(n) ? e === n && i || e > n ? k : N : ""
            }
            const _ = e => {
                    let {
                        isSecuritiesRootPage: t,
                        isSecuritiesPage: n
                    } = e;
                    return w({
                        signupUrl: T.ix,
                        isSecuritiesRootPage: t,
                        isSecuritiesPage: n
                    })
                },
                Z = e => {
                    if (!e) return null;
                    try {
                        const t = new URL(e),
                            {
                                hostname: n,
                                pathname: r
                            } = t,
                            i = (e => v()(e, ".bitfinex.com") || v()(e, ".bitfinextr.com") || v()(e, ".bitfinexbr.com"))(n) && !p()(r, "/login");
                        return i ? e : null
                    } catch {
                        return null
                    }
                }
        },
        39693: function(e) {
            e.exports = function(e) {
                for (var t = -1, n = null == e ? 0 : e.length, r = 0, i = []; ++t < n;) {
                    var a = e[t];
                    a && (i[r++] = a)
                }
                return i
            }
        },
        23279: function(e, t, n) {
            var r = n(13218),
                i = n(7771),
                a = n(14841),
                o = Math.max,
                c = Math.min;
            e.exports = function(e, t, n) {
                var s, u, l, f, d, m, p = 0,
                    g = !1,
                    v = !1,
                    h = !0;
                if ("function" != typeof e) throw new TypeError("Expected a function");

                function b(t) {
                    var n = s,
                        r = u;
                    return s = u = void 0, p = t, f = e.apply(r, n)
                }

                function M(e) {
                    var n = e - m;
                    return void 0 === m || n >= t || n < 0 || v && e - p >= l
                }

                function E() {
                    var e = i();
                    if (M(e)) return y(e);
                    d = setTimeout(E, function(e) {
                        var n = t - (e - m);
                        return v ? c(n, l - (e - p)) : n
                    }(e))
                }

                function y(e) {
                    return d = void 0, h && s ? b(e) : (s = u = void 0, f)
                }

                function w() {
                    var e = i(),
                        n = M(e);
                    if (s = arguments, u = this, m = e, n) {
                        if (void 0 === d) return function(e) {
                            return p = e, d = setTimeout(E, t), g ? b(e) : f
                        }(m);
                        if (v) return clearTimeout(d), d = setTimeout(E, t), b(m)
                    }
                    return void 0 === d && (d = setTimeout(E, t)), f
                }
                return t = a(t) || 0, r(n) && (g = !!n.leading, l = (v = "maxWait" in n) ? o(a(n.maxWait) || 0, t) : l, h = "trailing" in n ? !!n.trailing : h), w.cancel = function() {
                    void 0 !== d && clearTimeout(d), p = 0, s = m = u = d = void 0
                }, w.flush = function() {
                    return void 0 === d ? f : y(i())
                }, w
            }
        },
        3651: function(e, t, n) {
            var r = n(42118),
                i = n(40554),
                a = Math.max;
            e.exports = function(e, t, n) {
                var o = null == e ? 0 : e.length;
                if (!o) return -1;
                var c = null == n ? 0 : i(n);
                return c < 0 && (c = a(o + c, 0)), r(e, t, c)
            }
        },
        66604: function(e, t, n) {
            var r = n(89465),
                i = n(47816),
                a = n(67206);
            e.exports = function(e, t) {
                var n = {};
                return t = a(t, 3), i(e, (function(e, i, a) {
                    r(n, i, t(e, i, a))
                })), n
            }
        },
        7771: function(e, t, n) {
            var r = n(55639);
            e.exports = function() {
                return r.Date.now()
            }
        },
        36968: function(e, t, n) {
            var r = n(10611);
            e.exports = function(e, t, n) {
                return null == e ? e : r(e, t, n)
            }
        },
        12571: function(e, t, n) {
            var r = n(14259),
                i = n(16612),
                a = n(40554);
            e.exports = function(e, t, n) {
                var o = null == e ? 0 : e.length;
                return o ? (n && "number" != typeof n && i(e, t, n) ? (t = 0, n = o) : (t = null == t ? 0 : a(t), n = void 0 === n ? o : a(n)), r(e, t, n)) : []
            }
        },
        23493: function(e, t, n) {
            var r = n(23279),
                i = n(13218);
            e.exports = function(e, t, n) {
                var a = !0,
                    o = !0;
                if ("function" != typeof e) throw new TypeError("Expected a function");
                return i(n) && (a = "leading" in n ? !!n.leading : a, o = "trailing" in n ? !!n.trailing : o), r(e, t, {
                    leading: a,
                    maxWait: t,
                    trailing: o
                })
            }
        },
        78761: function(e, t) {
            "use strict";
            t.Z = "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTIgNWMtLjI4IDAtLjUzLjExLS43MS4yOUw4IDguNTlsLTMuMjktMy4zYTEuMDAzIDEuMDAzIDAgMDAtMS40MiAxLjQybDQgNGMuMTguMTguNDMuMjkuNzEuMjlzLjUzLS4xMS43MS0uMjlsNC00QTEuMDAzIDEuMDAzIDAgMDAxMiA1eiIgZmlsbC1ydWxlPSJldmVub2RkIj48L3BhdGg+PC9zdmc+"
        },
        10434: function(e) {
            function t() {
                return e.exports = t = Object.assign ? Object.assign.bind() : function(e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = arguments[t];
                        for (var r in n) Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
                    }
                    return e
                }, e.exports.__esModule = !0, e.exports.default = e.exports, t.apply(this, arguments)
            }
            e.exports = t, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        4147: function(e) {
            "use strict";
            e.exports = JSON.parse('{"u2":"bfx-ui-public","i8":"2.52.13"}')
        }
    }
]);