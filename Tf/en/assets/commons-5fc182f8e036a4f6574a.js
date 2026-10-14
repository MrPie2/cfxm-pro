(self.webpackChunkbfx_ui_public = self.webpackChunkbfx_ui_public || []).push([
    [9351], {
        20050: function(e, t, n) {
            "use strict";
            n.d(t, {
                OO: function() {
                    return b
                },
                zv: function() {
                    return y
                },
                JP: function() {
                    return v
                },
                nI: function() {
                    return x
                },
                Db: function() {
                    return w
                }
            });
            var r = n(56690),
                i = n.n(r),
                o = n(89728),
                u = n.n(o),
                c = n(38416),
                s = n.n(c),
                a = n(67294),
                f = /&(?:amp|#38|lt|#60|gt|#62|apos|#39|quot|#34|nbsp|#160|copy|#169|reg|#174|hellip|#8230|#x2F|#47);/g,
                l = {
                    "&amp;": "&",
                    "&#38;": "&",
                    "&lt;": "<",
                    "&#60;": "<",
                    "&gt;": ">",
                    "&#62;": ">",
                    "&apos;": "'",
                    "&#39;": "'",
                    "&quot;": '"',
                    "&#34;": '"',
                    "&nbsp;": " ",
                    "&#160;": " ",
                    "&copy;": "©",
                    "&#169;": "©",
                    "&reg;": "®",
                    "&#174;": "®",
                    "&hellip;": "…",
                    "&#8230;": "…",
                    "&#x2F;": "/",
                    "&#47;": "/"
                },
                p = function(e) {
                    return l[e]
                };

            function g(e, t) {
                var n = Object.keys(e);
                if (Object.getOwnPropertySymbols) {
                    var r = Object.getOwnPropertySymbols(e);
                    t && (r = r.filter((function(t) {
                        return Object.getOwnPropertyDescriptor(e, t).enumerable
                    }))), n.push.apply(n, r)
                }
                return n
            }

            function h(e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = null != arguments[t] ? arguments[t] : {};
                    t % 2 ? g(Object(n), !0).forEach((function(t) {
                        s()(e, t, n[t])
                    })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : g(Object(n)).forEach((function(t) {
                        Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                    }))
                }
                return e
            }
            var d, m = {
                    bindI18n: "languageChanged",
                    bindI18nStore: "",
                    transEmptyNodeValue: "",
                    transSupportBasicHtmlNodes: !0,
                    transWrapTextNodes: "",
                    transKeepBasicHtmlNodesFor: ["br", "strong", "i", "p"],
                    useSuspense: !0,
                    unescape: function(e) {
                        return e.replace(f, p)
                    }
                },
                b = (0, a.createContext)();

            function v() {
                return m
            }
            var y = function() {
                function e() {
                    i()(this, e), this.usedNamespaces = {}
                }
                return u()(e, [{
                    key: "addUsedNamespaces",
                    value: function(e) {
                        var t = this;
                        e.forEach((function(e) {
                            t.usedNamespaces[e] || (t.usedNamespaces[e] = !0)
                        }))
                    }
                }, {
                    key: "getUsedNamespaces",
                    value: function() {
                        return Object.keys(this.usedNamespaces)
                    }
                }]), e
            }();

            function x() {
                return d
            }
            var w = {
                type: "3rdParty",
                init: function(e) {
                    ! function() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
                        m = h(h({}, m), e)
                    }(e.options.react),
                    function(e) {
                        d = e
                    }(e)
                }
            }
        },
        68270: function(e, t, n) {
            "use strict";
            n.d(t, {
                $: function() {
                    return g
                }
            });
            var r = n(27424),
                i = n.n(r),
                o = n(38416),
                u = n.n(o),
                c = n(67294),
                s = n(20050),
                a = n(87910);

            function f(e, t) {
                var n = Object.keys(e);
                if (Object.getOwnPropertySymbols) {
                    var r = Object.getOwnPropertySymbols(e);
                    t && (r = r.filter((function(t) {
                        return Object.getOwnPropertyDescriptor(e, t).enumerable
                    }))), n.push.apply(n, r)
                }
                return n
            }

            function l(e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = null != arguments[t] ? arguments[t] : {};
                    t % 2 ? f(Object(n), !0).forEach((function(t) {
                        u()(e, t, n[t])
                    })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : f(Object(n)).forEach((function(t) {
                        Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                    }))
                }
                return e
            }
            var p = function(e, t) {
                var n = (0, c.useRef)();
                return (0, c.useEffect)((function() {
                    n.current = t ? n.current : e
                }), [e, t]), n.current
            };

            function g(e) {
                var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                    n = t.i18n,
                    r = (0, c.useContext)(s.OO) || {},
                    o = r.i18n,
                    u = r.defaultNS,
                    f = n || o || (0, s.nI)();
                if (f && !f.reportNamespaces && (f.reportNamespaces = new s.zv), !f) {
                    (0, a.O4)("You will need to pass in an i18next instance by using initReactI18next");
                    var g = function(e) {
                            return Array.isArray(e) ? e[e.length - 1] : e
                        },
                        h = [g, {}, !1];
                    return h.t = g, h.i18n = {}, h.ready = !1, h
                }
                f.options.react && void 0 !== f.options.react.wait && (0, a.O4)("It seems you are still using the old wait option, you may migrate to the new useSuspense behaviour.");
                var d = l(l(l({}, (0, s.JP)()), f.options.react), t),
                    m = d.useSuspense,
                    b = d.keyPrefix,
                    v = e || u || f.options && f.options.defaultNS;
                v = "string" == typeof v ? [v] : v || ["translation"], f.reportNamespaces.addUsedNamespaces && f.reportNamespaces.addUsedNamespaces(v);
                var y = (f.isInitialized || f.initializedStoreOnce) && v.every((function(e) {
                    return (0, a.F0)(e, f, d)
                }));

                function x() {
                    return f.getFixedT(null, "fallback" === d.nsMode ? v : v[0], b)
                }
                var w = (0, c.useState)(x),
                    O = i()(w, 2),
                    E = O[0],
                    S = O[1],
                    N = v.join(),
                    M = p(N),
                    P = (0, c.useRef)(!0);
                (0, c.useEffect)((function() {
                    var e = d.bindI18n,
                        t = d.bindI18nStore;

                    function n() {
                        P.current && S(x)
                    }
                    return P.current = !0, y || m || (0, a.DC)(f, v, (function() {
                            P.current && S(x)
                        })), y && M && M !== N && P.current && S(x), e && f && f.on(e, n), t && f && f.store.on(t, n),
                        function() {
                            P.current = !1, e && f && e.split(" ").forEach((function(e) {
                                return f.off(e, n)
                            })), t && f && t.split(" ").forEach((function(e) {
                                return f.store.off(e, n)
                            }))
                        }
                }), [f, N]);
                var _ = (0, c.useRef)(!0);
                (0, c.useEffect)((function() {
                    P.current && !_.current && S(x), _.current = !1
                }), [f, b]);
                var A = [E, f, y];
                if (A.t = E, A.i18n = f, A.ready = y, y) return A;
                if (!y && !m) return A;
                throw new Promise((function(e) {
                    (0, a.DC)(f, v, (function() {
                        e()
                    }))
                }))
            }
        },
        87910: function(e, t, n) {
            "use strict";

            function r() {
                if (console && console.warn) {
                    for (var e, t = arguments.length, n = new Array(t), r = 0; r < t; r++) n[r] = arguments[r];
                    "string" == typeof n[0] && (n[0] = "react-i18next:: ".concat(n[0])), (e = console).warn.apply(e, n)
                }
            }
            n.d(t, {
                DC: function() {
                    return u
                },
                F0: function() {
                    return c
                },
                Gf: function() {
                    return s
                },
                O4: function() {
                    return o
                },
                ZK: function() {
                    return r
                }
            });
            var i = {};

            function o() {
                for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                "string" == typeof t[0] && i[t[0]] || ("string" == typeof t[0] && (i[t[0]] = new Date), r.apply(void 0, t))
            }

            function u(e, t, n) {
                e.loadNamespaces(t, (function() {
                    if (e.isInitialized) n();
                    else {
                        e.on("initialized", (function t() {
                            setTimeout((function() {
                                e.off("initialized", t)
                            }), 0), n()
                        }))
                    }
                }))
            }

            function c(e, t) {
                var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {};
                return t.languages && t.languages.length ? void 0 !== t.options.ignoreJSONStructure ? t.hasLoadedNamespace(e, {
                    precheck: function(t, r) {
                        if (n.bindI18n && n.bindI18n.indexOf("languageChanging") > -1 && t.services.backendConnector.backend && t.isLanguageChangingTo && !r(t.isLanguageChangingTo, e)) return !1
                    }
                }) : function(e, t) {
                    var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : {},
                        r = t.languages[0],
                        i = !!t.options && t.options.fallbackLng,
                        o = t.languages[t.languages.length - 1];
                    if ("cimode" === r.toLowerCase()) return !0;
                    var u = function(e, n) {
                        var r = t.services.backendConnector.state["".concat(e, "|").concat(n)];
                        return -1 === r || 2 === r
                    };
                    return !(n.bindI18n && n.bindI18n.indexOf("languageChanging") > -1 && t.services.backendConnector.backend && t.isLanguageChangingTo && !u(t.isLanguageChangingTo, e) || !t.hasResourceBundle(r, e) && t.services.backendConnector.backend && (!t.options.resources || t.options.partialBundledLanguages) && (!u(r, e) || i && !u(o, e)))
                }(e, t, n) : (o("i18n.languages were undefined or empty", t.languages), !0)
            }

            function s(e) {
                return e.displayName || e.name || ("string" == typeof e && e.length > 0 ? e : "Unknown")
            }
        },
        56632: function(e, t, n) {
            function r(e) {
                try {
                    if (!n.g.localStorage) return !1
                } catch (r) {
                    return !1
                }
                var t = n.g.localStorage[e];
                return null != t && "true" === String(t).toLowerCase()
            }
            e.exports = function(e, t) {
                if (r("noDeprecation")) return e;
                var n = !1;
                return function() {
                    if (!n) {
                        if (r("throwDeprecation")) throw new Error(t);
                        r("traceDeprecation") ? console.trace(t) : console.warn(t), n = !0
                    }
                    return e.apply(this, arguments)
                }
            }
        },
        77507: function(e, t, n) {
            var r;
            ! function(i) {
                "use strict";
                var o, u = /^-?(?:\d+(?:\.\d*)?|\.\d+)(?:e[+-]?\d+)?$/i,
                    c = Math.ceil,
                    s = Math.floor,
                    a = "[BigNumber Error] ",
                    f = a + "Number primitive has more than 15 significant digits: ",
                    l = 1e14,
                    p = 14,
                    g = 9007199254740991,
                    h = [1, 10, 100, 1e3, 1e4, 1e5, 1e6, 1e7, 1e8, 1e9, 1e10, 1e11, 1e12, 1e13],
                    d = 1e7,
                    m = 1e9;

                function b(e) {
                    var t = 0 | e;
                    return e > 0 || e === t ? t : t - 1
                }

                function v(e) {
                    for (var t, n, r = 1, i = e.length, o = e[0] + ""; r < i;) {
                        for (t = e[r++] + "", n = p - t.length; n--; t = "0" + t);
                        o += t
                    }
                    for (i = o.length; 48 === o.charCodeAt(--i););
                    return o.slice(0, i + 1 || 1)
                }

                function y(e, t) {
                    var n, r, i = e.c,
                        o = t.c,
                        u = e.s,
                        c = t.s,
                        s = e.e,
                        a = t.e;
                    if (!u || !c) return null;
                    if (n = i && !i[0], r = o && !o[0], n || r) return n ? r ? 0 : -c : u;
                    if (u != c) return u;
                    if (n = u < 0, r = s == a, !i || !o) return r ? 0 : !i ^ n ? 1 : -1;
                    if (!r) return s > a ^ n ? 1 : -1;
                    for (c = (s = i.length) < (a = o.length) ? s : a, u = 0; u < c; u++)
                        if (i[u] != o[u]) return i[u] > o[u] ^ n ? 1 : -1;
                    return s == a ? 0 : s > a ^ n ? 1 : -1
                }

                function x(e, t, n, r) {
                    if (e < t || e > n || e !== s(e)) throw Error(a + (r || "Argument") + ("number" == typeof e ? e < t || e > n ? " out of range: " : " not an integer: " : " not a primitive number: ") + String(e))
                }

                function w(e) {
                    var t = e.c.length - 1;
                    return b(e.e / p) == t && e.c[t] % 2 != 0
                }

                function O(e, t) {
                    return (e.length > 1 ? e.charAt(0) + "." + e.slice(1) : e) + (t < 0 ? "e" : "e+") + t
                }

                function E(e, t, n) {
                    var r, i;
                    if (t < 0) {
                        for (i = n + "."; ++t; i += n);
                        e = i + e
                    } else if (++t > (r = e.length)) {
                        for (i = n, t -= r; --t; i += n);
                        e += i
                    } else t < r && (e = e.slice(0, t) + "." + e.slice(t));
                    return e
                }
                o = function e(t) {
                    var n, r, i, o, S, N, M, P, _, A, D = $.prototype = {
                            constructor: $,
                            toString: null,
                            valueOf: null
                        },
                        j = new $(1),
                        C = 20,
                        T = 4,
                        I = -7,
                        F = 21,
                        B = -1e7,
                        k = 1e7,
                        R = !1,
                        U = 1,
                        L = 0,
                        z = {
                            prefix: "",
                            groupSize: 3,
                            secondaryGroupSize: 0,
                            groupSeparator: ",",
                            decimalSeparator: ".",
                            fractionGroupSize: 0,
                            fractionGroupSeparator: " ",
                            suffix: ""
                        },
                        G = "0123456789abcdefghijklmnopqrstuvwxyz";

                    function $(e, t) {
                        var n, o, c, a, l, h, d, m, b = this;
                        if (!(b instanceof $)) return new $(e, t);
                        if (null == t) {
                            if (e && !0 === e._isBigNumber) return b.s = e.s, void(!e.c || e.e > k ? b.c = b.e = null : e.e < B ? b.c = [b.e = 0] : (b.e = e.e, b.c = e.c.slice()));
                            if ((h = "number" == typeof e) && 0 * e == 0) {
                                if (b.s = 1 / e < 0 ? (e = -e, -1) : 1, e === ~~e) {
                                    for (a = 0, l = e; l >= 10; l /= 10, a++);
                                    return void(a > k ? b.c = b.e = null : (b.e = a, b.c = [e]))
                                }
                                m = String(e)
                            } else {
                                if (!u.test(m = String(e))) return i(b, m, h);
                                b.s = 45 == m.charCodeAt(0) ? (m = m.slice(1), -1) : 1
                            }(a = m.indexOf(".")) > -1 && (m = m.replace(".", "")), (l = m.search(/e/i)) > 0 ? (a < 0 && (a = l), a += +m.slice(l + 1), m = m.substring(0, l)) : a < 0 && (a = m.length)
                        } else {
                            if (x(t, 2, G.length, "Base"), 10 == t) return V(b = new $(e), C + b.e + 1, T);
                            if (m = String(e), h = "number" == typeof e) {
                                if (0 * e != 0) return i(b, m, h, t);
                                if (b.s = 1 / e < 0 ? (m = m.slice(1), -1) : 1, $.DEBUG && m.replace(/^0\.0*|\./, "").length > 15) throw Error(f + e)
                            } else b.s = 45 === m.charCodeAt(0) ? (m = m.slice(1), -1) : 1;
                            for (n = G.slice(0, t), a = l = 0, d = m.length; l < d; l++)
                                if (n.indexOf(o = m.charAt(l)) < 0) {
                                    if ("." == o) {
                                        if (l > a) {
                                            a = d;
                                            continue
                                        }
                                    } else if (!c && (m == m.toUpperCase() && (m = m.toLowerCase()) || m == m.toLowerCase() && (m = m.toUpperCase()))) {
                                        c = !0, l = -1, a = 0;
                                        continue
                                    }
                                    return i(b, String(e), h, t)
                                }
                            h = !1, (a = (m = r(m, t, 10, b.s)).indexOf(".")) > -1 ? m = m.replace(".", "") : a = m.length
                        }
                        for (l = 0; 48 === m.charCodeAt(l); l++);
                        for (d = m.length; 48 === m.charCodeAt(--d););
                        if (m = m.slice(l, ++d)) {
                            if (d -= l, h && $.DEBUG && d > 15 && (e > g || e !== s(e))) throw Error(f + b.s * e);
                            if ((a = a - l - 1) > k) b.c = b.e = null;
                            else if (a < B) b.c = [b.e = 0];
                            else {
                                if (b.e = a, b.c = [], l = (a + 1) % p, a < 0 && (l += p), l < d) {
                                    for (l && b.c.push(+m.slice(0, l)), d -= p; l < d;) b.c.push(+m.slice(l, l += p));
                                    l = p - (m = m.slice(l)).length
                                } else l -= d;
                                for (; l--; m += "0");
                                b.c.push(+m)
                            }
                        } else b.c = [b.e = 0]
                    }

                    function H(e, t, n, r) {
                        var i, o, u, c, s;
                        if (null == n ? n = T : x(n, 0, 8), !e.c) return e.toString();
                        if (i = e.c[0], u = e.e, null == t) s = v(e.c), s = 1 == r || 2 == r && (u <= I || u >= F) ? O(s, u) : E(s, u, "0");
                        else if (o = (e = V(new $(e), t, n)).e, c = (s = v(e.c)).length, 1 == r || 2 == r && (t <= o || o <= I)) {
                            for (; c < t; s += "0", c++);
                            s = O(s, o)
                        } else if (t -= u, s = E(s, o, "0"), o + 1 > c) {
                            if (--t > 0)
                                for (s += "."; t--; s += "0");
                        } else if ((t += o - c) > 0)
                            for (o + 1 == c && (s += "."); t--; s += "0");
                        return e.s < 0 && i ? "-" + s : s
                    }

                    function W(e, t) {
                        for (var n, r = 1, i = new $(e[0]); r < e.length; r++) {
                            if (!(n = new $(e[r])).s) {
                                i = n;
                                break
                            }
                            t.call(i, n) && (i = n)
                        }
                        return i
                    }

                    function q(e, t, n) {
                        for (var r = 1, i = t.length; !t[--i]; t.pop());
                        for (i = t[0]; i >= 10; i /= 10, r++);
                        return (n = r + n * p - 1) > k ? e.c = e.e = null : n < B ? e.c = [e.e = 0] : (e.e = n, e.c = t), e
                    }

                    function V(e, t, n, r) {
                        var i, o, u, a, f, g, d, m = e.c,
                            b = h;
                        if (m) {
                            e: {
                                for (i = 1, a = m[0]; a >= 10; a /= 10, i++);
                                if ((o = t - i) < 0) o += p,
                                u = t,
                                d = (f = m[g = 0]) / b[i - u - 1] % 10 | 0;
                                else if ((g = c((o + 1) / p)) >= m.length) {
                                    if (!r) break e;
                                    for (; m.length <= g; m.push(0));
                                    f = d = 0, i = 1, u = (o %= p) - p + 1
                                } else {
                                    for (f = a = m[g], i = 1; a >= 10; a /= 10, i++);
                                    d = (u = (o %= p) - p + i) < 0 ? 0 : f / b[i - u - 1] % 10 | 0
                                }
                                if (r = r || t < 0 || null != m[g + 1] || (u < 0 ? f : f % b[i - u - 1]), r = n < 4 ? (d || r) && (0 == n || n == (e.s < 0 ? 3 : 2)) : d > 5 || 5 == d && (4 == n || r || 6 == n && (o > 0 ? u > 0 ? f / b[i - u] : 0 : m[g - 1]) % 10 & 1 || n == (e.s < 0 ? 8 : 7)), t < 1 || !m[0]) return m.length = 0, r ? (t -= e.e + 1, m[0] = b[(p - t % p) % p], e.e = -t || 0) : m[0] = e.e = 0, e;
                                if (0 == o ? (m.length = g, a = 1, g--) : (m.length = g + 1, a = b[p - o], m[g] = u > 0 ? s(f / b[i - u] % b[u]) * a : 0), r)
                                    for (;;) {
                                        if (0 == g) {
                                            for (o = 1, u = m[0]; u >= 10; u /= 10, o++);
                                            for (u = m[0] += a, a = 1; u >= 10; u /= 10, a++);
                                            o != a && (e.e++, m[0] == l && (m[0] = 1));
                                            break
                                        }
                                        if (m[g] += a, m[g] != l) break;
                                        m[g--] = 0, a = 1
                                    }
                                for (o = m.length; 0 === m[--o]; m.pop());
                            }
                            e.e > k ? e.c = e.e = null : e.e < B && (e.c = [e.e = 0])
                        }
                        return e
                    }

                    function Z(e) {
                        var t, n = e.e;
                        return null === n ? e.toString() : (t = v(e.c), t = n <= I || n >= F ? O(t, n) : E(t, n, "0"), e.s < 0 ? "-" + t : t)
                    }
                    return $.clone = e, $.ROUND_UP = 0, $.ROUND_DOWN = 1, $.ROUND_CEIL = 2, $.ROUND_FLOOR = 3, $.ROUND_HALF_UP = 4, $.ROUND_HALF_DOWN = 5, $.ROUND_HALF_EVEN = 6, $.ROUND_HALF_CEIL = 7, $.ROUND_HALF_FLOOR = 8, $.EUCLID = 9, $.config = $.set = function(e) {
                        var t, n;
                        if (null != e) {
                            if ("object" != typeof e) throw Error(a + "Object expected: " + e);
                            if (e.hasOwnProperty(t = "DECIMAL_PLACES") && (x(n = e[t], 0, m, t), C = n), e.hasOwnProperty(t = "ROUNDING_MODE") && (x(n = e[t], 0, 8, t), T = n), e.hasOwnProperty(t = "EXPONENTIAL_AT") && ((n = e[t]) && n.pop ? (x(n[0], -m, 0, t), x(n[1], 0, m, t), I = n[0], F = n[1]) : (x(n, -m, m, t), I = -(F = n < 0 ? -n : n))), e.hasOwnProperty(t = "RANGE"))
                                if ((n = e[t]) && n.pop) x(n[0], -m, -1, t), x(n[1], 1, m, t), B = n[0], k = n[1];
                                else {
                                    if (x(n, -m, m, t), !n) throw Error(a + t + " cannot be zero: " + n);
                                    B = -(k = n < 0 ? -n : n)
                                }
                            if (e.hasOwnProperty(t = "CRYPTO")) {
                                if ((n = e[t]) !== !!n) throw Error(a + t + " not true or false: " + n);
                                if (n) {
                                    if ("undefined" == typeof crypto || !crypto || !crypto.getRandomValues && !crypto.randomBytes) throw R = !n, Error(a + "crypto unavailable");
                                    R = n
                                } else R = n
                            }
                            if (e.hasOwnProperty(t = "MODULO_MODE") && (x(n = e[t], 0, 9, t), U = n), e.hasOwnProperty(t = "POW_PRECISION") && (x(n = e[t], 0, m, t), L = n), e.hasOwnProperty(t = "FORMAT")) {
                                if ("object" != typeof(n = e[t])) throw Error(a + t + " not an object: " + n);
                                z = n
                            }
                            if (e.hasOwnProperty(t = "ALPHABET")) {
                                if ("string" != typeof(n = e[t]) || /^.$|[+-.\s]|(.).*\1/.test(n)) throw Error(a + t + " invalid: " + n);
                                G = n
                            }
                        }
                        return {
                            DECIMAL_PLACES: C,
                            ROUNDING_MODE: T,
                            EXPONENTIAL_AT: [I, F],
                            RANGE: [B, k],
                            CRYPTO: R,
                            MODULO_MODE: U,
                            POW_PRECISION: L,
                            FORMAT: z,
                            ALPHABET: G
                        }
                    }, $.isBigNumber = function(e) {
                        if (!e || !0 !== e._isBigNumber) return !1;
                        if (!$.DEBUG) return !0;
                        var t, n, r = e.c,
                            i = e.e,
                            o = e.s;
                        e: if ("[object Array]" == {}.toString.call(r)) {
                            if ((1 === o || -1 === o) && i >= -m && i <= m && i === s(i)) {
                                if (0 === r[0]) {
                                    if (0 === i && 1 === r.length) return !0;
                                    break e
                                }
                                if ((t = (i + 1) % p) < 1 && (t += p), String(r[0]).length == t) {
                                    for (t = 0; t < r.length; t++)
                                        if ((n = r[t]) < 0 || n >= l || n !== s(n)) break e;
                                    if (0 !== n) return !0
                                }
                            }
                        } else
                        if (null === r && null === i && (null === o || 1 === o || -1 === o)) return !0;
                        throw Error(a + "Invalid BigNumber: " + e)
                    }, $.maximum = $.max = function() {
                        return W(arguments, D.lt)
                    }, $.minimum = $.min = function() {
                        return W(arguments, D.gt)
                    }, $.random = (o = 9007199254740992, S = Math.random() * o & 2097151 ? function() {
                        return s(Math.random() * o)
                    } : function() {
                        return 8388608 * (1073741824 * Math.random() | 0) + (8388608 * Math.random() | 0)
                    }, function(e) {
                        var t, n, r, i, o, u = 0,
                            f = [],
                            l = new $(j);
                        if (null == e ? e = C : x(e, 0, m), i = c(e / p), R)
                            if (crypto.getRandomValues) {
                                for (t = crypto.getRandomValues(new Uint32Array(i *= 2)); u < i;)(o = 131072 * t[u] + (t[u + 1] >>> 11)) >= 9e15 ? (n = crypto.getRandomValues(new Uint32Array(2)), t[u] = n[0], t[u + 1] = n[1]) : (f.push(o % 1e14), u += 2);
                                u = i / 2
                            } else {
                                if (!crypto.randomBytes) throw R = !1, Error(a + "crypto unavailable");
                                for (t = crypto.randomBytes(i *= 7); u < i;)(o = 281474976710656 * (31 & t[u]) + 1099511627776 * t[u + 1] + 4294967296 * t[u + 2] + 16777216 * t[u + 3] + (t[u + 4] << 16) + (t[u + 5] << 8) + t[u + 6]) >= 9e15 ? crypto.randomBytes(7).copy(t, u) : (f.push(o % 1e14), u += 7);
                                u = i / 7
                            }
                        if (!R)
                            for (; u < i;)(o = S()) < 9e15 && (f[u++] = o % 1e14);
                        for (i = f[--u], e %= p, i && e && (o = h[p - e], f[u] = s(i / o) * o); 0 === f[u]; f.pop(), u--);
                        if (u < 0) f = [r = 0];
                        else {
                            for (r = -1; 0 === f[0]; f.splice(0, 1), r -= p);
                            for (u = 1, o = f[0]; o >= 10; o /= 10, u++);
                            u < p && (r -= p - u)
                        }
                        return l.e = r, l.c = f, l
                    }), $.sum = function() {
                        for (var e = 1, t = arguments, n = new $(t[0]); e < t.length;) n = n.plus(t[e++]);
                        return n
                    }, r = function() {
                        var e = "0123456789";

                        function t(e, t, n, r) {
                            for (var i, o, u = [0], c = 0, s = e.length; c < s;) {
                                for (o = u.length; o--; u[o] *= t);
                                for (u[0] += r.indexOf(e.charAt(c++)), i = 0; i < u.length; i++) u[i] > n - 1 && (null == u[i + 1] && (u[i + 1] = 0), u[i + 1] += u[i] / n | 0, u[i] %= n)
                            }
                            return u.reverse()
                        }
                        return function(r, i, o, u, c) {
                            var s, a, f, l, p, g, h, d, m = r.indexOf("."),
                                b = C,
                                y = T;
                            for (m >= 0 && (l = L, L = 0, r = r.replace(".", ""), g = (d = new $(i)).pow(r.length - m), L = l, d.c = t(E(v(g.c), g.e, "0"), 10, o, e), d.e = d.c.length), f = l = (h = t(r, i, o, c ? (s = G, e) : (s = e, G))).length; 0 == h[--l]; h.pop());
                            if (!h[0]) return s.charAt(0);
                            if (m < 0 ? --f : (g.c = h, g.e = f, g.s = u, h = (g = n(g, d, b, y, o)).c, p = g.r, f = g.e), m = h[a = f + b + 1], l = o / 2, p = p || a < 0 || null != h[a + 1], p = y < 4 ? (null != m || p) && (0 == y || y == (g.s < 0 ? 3 : 2)) : m > l || m == l && (4 == y || p || 6 == y && 1 & h[a - 1] || y == (g.s < 0 ? 8 : 7)), a < 1 || !h[0]) r = p ? E(s.charAt(1), -b, s.charAt(0)) : s.charAt(0);
                            else {
                                if (h.length = a, p)
                                    for (--o; ++h[--a] > o;) h[a] = 0, a || (++f, h = [1].concat(h));
                                for (l = h.length; !h[--l];);
                                for (m = 0, r = ""; m <= l; r += s.charAt(h[m++]));
                                r = E(r, f, s.charAt(0))
                            }
                            return r
                        }
                    }(), n = function() {
                        function e(e, t, n) {
                            var r, i, o, u, c = 0,
                                s = e.length,
                                a = t % d,
                                f = t / d | 0;
                            for (e = e.slice(); s--;) c = ((i = a * (o = e[s] % d) + (r = f * o + (u = e[s] / d | 0) * a) % d * d + c) / n | 0) + (r / d | 0) + f * u, e[s] = i % n;
                            return c && (e = [c].concat(e)), e
                        }

                        function t(e, t, n, r) {
                            var i, o;
                            if (n != r) o = n > r ? 1 : -1;
                            else
                                for (i = o = 0; i < n; i++)
                                    if (e[i] != t[i]) {
                                        o = e[i] > t[i] ? 1 : -1;
                                        break
                                    } return o
                        }

                        function n(e, t, n, r) {
                            for (var i = 0; n--;) e[n] -= i, i = e[n] < t[n] ? 1 : 0, e[n] = i * r + e[n] - t[n];
                            for (; !e[0] && e.length > 1; e.splice(0, 1));
                        }
                        return function(r, i, o, u, c) {
                            var a, f, g, h, d, m, v, y, x, w, O, E, S, N, M, P, _, A = r.s == i.s ? 1 : -1,
                                D = r.c,
                                j = i.c;
                            if (!(D && D[0] && j && j[0])) return new $(r.s && i.s && (D ? !j || D[0] != j[0] : j) ? D && 0 == D[0] || !j ? 0 * A : A / 0 : NaN);
                            for (x = (y = new $(A)).c = [], A = o + (f = r.e - i.e) + 1, c || (c = l, f = b(r.e / p) - b(i.e / p), A = A / p | 0), g = 0; j[g] == (D[g] || 0); g++);
                            if (j[g] > (D[g] || 0) && f--, A < 0) x.push(1), h = !0;
                            else {
                                for (N = D.length, P = j.length, g = 0, A += 2, (d = s(c / (j[0] + 1))) > 1 && (j = e(j, d, c), D = e(D, d, c), P = j.length, N = D.length), S = P, O = (w = D.slice(0, P)).length; O < P; w[O++] = 0);
                                _ = j.slice(), _ = [0].concat(_), M = j[0], j[1] >= c / 2 && M++;
                                do {
                                    if (d = 0, (a = t(j, w, P, O)) < 0) {
                                        if (E = w[0], P != O && (E = E * c + (w[1] || 0)), (d = s(E / M)) > 1)
                                            for (d >= c && (d = c - 1), v = (m = e(j, d, c)).length, O = w.length; 1 == t(m, w, v, O);) d--, n(m, P < v ? _ : j, v, c), v = m.length, a = 1;
                                        else 0 == d && (a = d = 1), v = (m = j.slice()).length;
                                        if (v < O && (m = [0].concat(m)), n(w, m, O, c), O = w.length, -1 == a)
                                            for (; t(j, w, P, O) < 1;) d++, n(w, P < O ? _ : j, O, c), O = w.length
                                    } else 0 === a && (d++, w = [0]);
                                    x[g++] = d, w[0] ? w[O++] = D[S] || 0 : (w = [D[S]], O = 1)
                                } while ((S++ < N || null != w[0]) && A--);
                                h = null != w[0], x[0] || x.splice(0, 1)
                            }
                            if (c == l) {
                                for (g = 1, A = x[0]; A >= 10; A /= 10, g++);
                                V(y, o + (y.e = g + f * p - 1) + 1, u, h)
                            } else y.e = f, y.r = +h;
                            return y
                        }
                    }(), N = /^(-?)0([xbo])(?=\w[\w.]*$)/i, M = /^([^.]+)\.$/, P = /^\.([^.]+)$/, _ = /^-?(Infinity|NaN)$/, A = /^\s*\+(?=[\w.])|^\s+|\s+$/g, i = function(e, t, n, r) {
                        var i, o = n ? t : t.replace(A, "");
                        if (_.test(o)) e.s = isNaN(o) ? null : o < 0 ? -1 : 1;
                        else {
                            if (!n && (o = o.replace(N, (function(e, t, n) {
                                    return i = "x" == (n = n.toLowerCase()) ? 16 : "b" == n ? 2 : 8, r && r != i ? e : t
                                })), r && (i = r, o = o.replace(M, "$1").replace(P, "0.$1")), t != o)) return new $(o, i);
                            if ($.DEBUG) throw Error(a + "Not a" + (r ? " base " + r : "") + " number: " + t);
                            e.s = null
                        }
                        e.c = e.e = null
                    }, D.absoluteValue = D.abs = function() {
                        var e = new $(this);
                        return e.s < 0 && (e.s = 1), e
                    }, D.comparedTo = function(e, t) {
                        return y(this, new $(e, t))
                    }, D.decimalPlaces = D.dp = function(e, t) {
                        var n, r, i, o = this;
                        if (null != e) return x(e, 0, m), null == t ? t = T : x(t, 0, 8), V(new $(o), e + o.e + 1, t);
                        if (!(n = o.c)) return null;
                        if (r = ((i = n.length - 1) - b(this.e / p)) * p, i = n[i])
                            for (; i % 10 == 0; i /= 10, r--);
                        return r < 0 && (r = 0), r
                    }, D.dividedBy = D.div = function(e, t) {
                        return n(this, new $(e, t), C, T)
                    }, D.dividedToIntegerBy = D.idiv = function(e, t) {
                        return n(this, new $(e, t), 0, 1)
                    }, D.exponentiatedBy = D.pow = function(e, t) {
                        var n, r, i, o, u, f, l, g, h = this;
                        if ((e = new $(e)).c && !e.isInteger()) throw Error(a + "Exponent not an integer: " + Z(e));
                        if (null != t && (t = new $(t)), u = e.e > 14, !h.c || !h.c[0] || 1 == h.c[0] && !h.e && 1 == h.c.length || !e.c || !e.c[0]) return g = new $(Math.pow(+Z(h), u ? 2 - w(e) : +Z(e))), t ? g.mod(t) : g;
                        if (f = e.s < 0, t) {
                            if (t.c ? !t.c[0] : !t.s) return new $(NaN);
                            (r = !f && h.isInteger() && t.isInteger()) && (h = h.mod(t))
                        } else {
                            if (e.e > 9 && (h.e > 0 || h.e < -1 || (0 == h.e ? h.c[0] > 1 || u && h.c[1] >= 24e7 : h.c[0] < 8e13 || u && h.c[0] <= 9999975e7))) return o = h.s < 0 && w(e) ? -0 : 0, h.e > -1 && (o = 1 / o), new $(f ? 1 / o : o);
                            L && (o = c(L / p + 2))
                        }
                        for (u ? (n = new $(.5), f && (e.s = 1), l = w(e)) : l = (i = Math.abs(+Z(e))) % 2, g = new $(j);;) {
                            if (l) {
                                if (!(g = g.times(h)).c) break;
                                o ? g.c.length > o && (g.c.length = o) : r && (g = g.mod(t))
                            }
                            if (i) {
                                if (0 === (i = s(i / 2))) break;
                                l = i % 2
                            } else if (V(e = e.times(n), e.e + 1, 1), e.e > 14) l = w(e);
                            else {
                                if (0 === (i = +Z(e))) break;
                                l = i % 2
                            }
                            h = h.times(h), o ? h.c && h.c.length > o && (h.c.length = o) : r && (h = h.mod(t))
                        }
                        return r ? g : (f && (g = j.div(g)), t ? g.mod(t) : o ? V(g, L, T, undefined) : g)
                    }, D.integerValue = function(e) {
                        var t = new $(this);
                        return null == e ? e = T : x(e, 0, 8), V(t, t.e + 1, e)
                    }, D.isEqualTo = D.eq = function(e, t) {
                        return 0 === y(this, new $(e, t))
                    }, D.isFinite = function() {
                        return !!this.c
                    }, D.isGreaterThan = D.gt = function(e, t) {
                        return y(this, new $(e, t)) > 0
                    }, D.isGreaterThanOrEqualTo = D.gte = function(e, t) {
                        return 1 === (t = y(this, new $(e, t))) || 0 === t
                    }, D.isInteger = function() {
                        return !!this.c && b(this.e / p) > this.c.length - 2
                    }, D.isLessThan = D.lt = function(e, t) {
                        return y(this, new $(e, t)) < 0
                    }, D.isLessThanOrEqualTo = D.lte = function(e, t) {
                        return -1 === (t = y(this, new $(e, t))) || 0 === t
                    }, D.isNaN = function() {
                        return !this.s
                    }, D.isNegative = function() {
                        return this.s < 0
                    }, D.isPositive = function() {
                        return this.s > 0
                    }, D.isZero = function() {
                        return !!this.c && 0 == this.c[0]
                    }, D.minus = function(e, t) {
                        var n, r, i, o, u = this,
                            c = u.s;
                        if (t = (e = new $(e, t)).s, !c || !t) return new $(NaN);
                        if (c != t) return e.s = -t, u.plus(e);
                        var s = u.e / p,
                            a = e.e / p,
                            f = u.c,
                            g = e.c;
                        if (!s || !a) {
                            if (!f || !g) return f ? (e.s = -t, e) : new $(g ? u : NaN);
                            if (!f[0] || !g[0]) return g[0] ? (e.s = -t, e) : new $(f[0] ? u : 3 == T ? -0 : 0)
                        }
                        if (s = b(s), a = b(a), f = f.slice(), c = s - a) {
                            for ((o = c < 0) ? (c = -c, i = f) : (a = s, i = g), i.reverse(), t = c; t--; i.push(0));
                            i.reverse()
                        } else
                            for (r = (o = (c = f.length) < (t = g.length)) ? c : t, c = t = 0; t < r; t++)
                                if (f[t] != g[t]) {
                                    o = f[t] < g[t];
                                    break
                                } if (o && (i = f, f = g, g = i, e.s = -e.s), (t = (r = g.length) - (n = f.length)) > 0)
                            for (; t--; f[n++] = 0);
                        for (t = l - 1; r > c;) {
                            if (f[--r] < g[r]) {
                                for (n = r; n && !f[--n]; f[n] = t);
                                --f[n], f[r] += l
                            }
                            f[r] -= g[r]
                        }
                        for (; 0 == f[0]; f.splice(0, 1), --a);
                        return f[0] ? q(e, f, a) : (e.s = 3 == T ? -1 : 1, e.c = [e.e = 0], e)
                    }, D.modulo = D.mod = function(e, t) {
                        var r, i, o = this;
                        return e = new $(e, t), !o.c || !e.s || e.c && !e.c[0] ? new $(NaN) : !e.c || o.c && !o.c[0] ? new $(o) : (9 == U ? (i = e.s, e.s = 1, r = n(o, e, 0, 3), e.s = i, r.s *= i) : r = n(o, e, 0, U), (e = o.minus(r.times(e))).c[0] || 1 != U || (e.s = o.s), e)
                    }, D.multipliedBy = D.times = function(e, t) {
                        var n, r, i, o, u, c, s, a, f, g, h, m, v, y, x, w = this,
                            O = w.c,
                            E = (e = new $(e, t)).c;
                        if (!(O && E && O[0] && E[0])) return !w.s || !e.s || O && !O[0] && !E || E && !E[0] && !O ? e.c = e.e = e.s = null : (e.s *= w.s, O && E ? (e.c = [0], e.e = 0) : e.c = e.e = null), e;
                        for (r = b(w.e / p) + b(e.e / p), e.s *= w.s, (s = O.length) < (g = E.length) && (v = O, O = E, E = v, i = s, s = g, g = i), i = s + g, v = []; i--; v.push(0));
                        for (y = l, x = d, i = g; --i >= 0;) {
                            for (n = 0, h = E[i] % x, m = E[i] / x | 0, o = i + (u = s); o > i;) n = ((a = h * (a = O[--u] % x) + (c = m * a + (f = O[u] / x | 0) * h) % x * x + v[o] + n) / y | 0) + (c / x | 0) + m * f, v[o--] = a % y;
                            v[o] = n
                        }
                        return n ? ++r : v.splice(0, 1), q(e, v, r)
                    }, D.negated = function() {
                        var e = new $(this);
                        return e.s = -e.s || null, e
                    }, D.plus = function(e, t) {
                        var n, r = this,
                            i = r.s;
                        if (t = (e = new $(e, t)).s, !i || !t) return new $(NaN);
                        if (i != t) return e.s = -t, r.minus(e);
                        var o = r.e / p,
                            u = e.e / p,
                            c = r.c,
                            s = e.c;
                        if (!o || !u) {
                            if (!c || !s) return new $(i / 0);
                            if (!c[0] || !s[0]) return s[0] ? e : new $(c[0] ? r : 0 * i)
                        }
                        if (o = b(o), u = b(u), c = c.slice(), i = o - u) {
                            for (i > 0 ? (u = o, n = s) : (i = -i, n = c), n.reverse(); i--; n.push(0));
                            n.reverse()
                        }
                        for ((i = c.length) - (t = s.length) < 0 && (n = s, s = c, c = n, t = i), i = 0; t;) i = (c[--t] = c[t] + s[t] + i) / l | 0, c[t] = l === c[t] ? 0 : c[t] % l;
                        return i && (c = [i].concat(c), ++u), q(e, c, u)
                    }, D.precision = D.sd = function(e, t) {
                        var n, r, i, o = this;
                        if (null != e && e !== !!e) return x(e, 1, m), null == t ? t = T : x(t, 0, 8), V(new $(o), e, t);
                        if (!(n = o.c)) return null;
                        if (r = (i = n.length - 1) * p + 1, i = n[i]) {
                            for (; i % 10 == 0; i /= 10, r--);
                            for (i = n[0]; i >= 10; i /= 10, r++);
                        }
                        return e && o.e + 1 > r && (r = o.e + 1), r
                    }, D.shiftedBy = function(e) {
                        return x(e, -9007199254740991, g), this.times("1e" + e)
                    }, D.squareRoot = D.sqrt = function() {
                        var e, t, r, i, o, u = this,
                            c = u.c,
                            s = u.s,
                            a = u.e,
                            f = C + 4,
                            l = new $("0.5");
                        if (1 !== s || !c || !c[0]) return new $(!s || s < 0 && (!c || c[0]) ? NaN : c ? u : 1 / 0);
                        if (0 == (s = Math.sqrt(+Z(u))) || s == 1 / 0 ? (((t = v(c)).length + a) % 2 == 0 && (t += "0"), s = Math.sqrt(+t), a = b((a + 1) / 2) - (a < 0 || a % 2), r = new $(t = s == 1 / 0 ? "1e" + a : (t = s.toExponential()).slice(0, t.indexOf("e") + 1) + a)) : r = new $(s + ""), r.c[0])
                            for ((s = (a = r.e) + f) < 3 && (s = 0);;)
                                if (o = r, r = l.times(o.plus(n(u, o, f, 1))), v(o.c).slice(0, s) === (t = v(r.c)).slice(0, s)) {
                                    if (r.e < a && --s, "9999" != (t = t.slice(s - 3, s + 1)) && (i || "4999" != t)) {
                                        +t && (+t.slice(1) || "5" != t.charAt(0)) || (V(r, r.e + C + 2, 1), e = !r.times(r).eq(u));
                                        break
                                    }
                                    if (!i && (V(o, o.e + C + 2, 0), o.times(o).eq(u))) {
                                        r = o;
                                        break
                                    }
                                    f += 4, s += 4, i = 1
                                }
                        return V(r, r.e + C + 1, T, e)
                    }, D.toExponential = function(e, t) {
                        return null != e && (x(e, 0, m), e++), H(this, e, t, 1)
                    }, D.toFixed = function(e, t) {
                        return null != e && (x(e, 0, m), e = e + this.e + 1), H(this, e, t)
                    }, D.toFormat = function(e, t, n) {
                        var r, i = this;
                        if (null == n) null != e && t && "object" == typeof t ? (n = t, t = null) : e && "object" == typeof e ? (n = e, e = t = null) : n = z;
                        else if ("object" != typeof n) throw Error(a + "Argument not an object: " + n);
                        if (r = i.toFixed(e, t), i.c) {
                            var o, u = r.split("."),
                                c = +n.groupSize,
                                s = +n.secondaryGroupSize,
                                f = n.groupSeparator || "",
                                l = u[0],
                                p = u[1],
                                g = i.s < 0,
                                h = g ? l.slice(1) : l,
                                d = h.length;
                            if (s && (o = c, c = s, s = o, d -= o), c > 0 && d > 0) {
                                for (o = d % c || c, l = h.substr(0, o); o < d; o += c) l += f + h.substr(o, c);
                                s > 0 && (l += f + h.slice(o)), g && (l = "-" + l)
                            }
                            r = p ? l + (n.decimalSeparator || "") + ((s = +n.fractionGroupSize) ? p.replace(new RegExp("\\d{" + s + "}\\B", "g"), "$&" + (n.fractionGroupSeparator || "")) : p) : l
                        }
                        return (n.prefix || "") + r + (n.suffix || "")
                    }, D.toFraction = function(e) {
                        var t, r, i, o, u, c, s, f, l, g, d, m, b = this,
                            y = b.c;
                        if (null != e && (!(s = new $(e)).isInteger() && (s.c || 1 !== s.s) || s.lt(j))) throw Error(a + "Argument " + (s.isInteger() ? "out of range: " : "not an integer: ") + Z(s));
                        if (!y) return new $(b);
                        for (t = new $(j), l = r = new $(j), i = f = new $(j), m = v(y), u = t.e = m.length - b.e - 1, t.c[0] = h[(c = u % p) < 0 ? p + c : c], e = !e || s.comparedTo(t) > 0 ? u > 0 ? t : l : s, c = k, k = 1 / 0, s = new $(m), f.c[0] = 0; g = n(s, t, 0, 1), 1 != (o = r.plus(g.times(i))).comparedTo(e);) r = i, i = o, l = f.plus(g.times(o = l)), f = o, t = s.minus(g.times(o = t)), s = o;
                        return o = n(e.minus(r), i, 0, 1), f = f.plus(o.times(l)), r = r.plus(o.times(i)), f.s = l.s = b.s, d = n(l, i, u *= 2, T).minus(b).abs().comparedTo(n(f, r, u, T).minus(b).abs()) < 1 ? [l, i] : [f, r], k = c, d
                    }, D.toNumber = function() {
                        return +Z(this)
                    }, D.toPrecision = function(e, t) {
                        return null != e && x(e, 1, m), H(this, e, t, 2)
                    }, D.toString = function(e) {
                        var t, n = this,
                            i = n.s,
                            o = n.e;
                        return null === o ? i ? (t = "Infinity", i < 0 && (t = "-" + t)) : t = "NaN" : (null == e ? t = o <= I || o >= F ? O(v(n.c), o) : E(v(n.c), o, "0") : 10 === e ? t = E(v((n = V(new $(n), C + o + 1, T)).c), n.e, "0") : (x(e, 2, G.length, "Base"), t = r(E(v(n.c), o, "0"), 10, e, i, !0)), i < 0 && n.c[0] && (t = "-" + t)), t
                    }, D.valueOf = D.toJSON = function() {
                        return Z(this)
                    }, D._isBigNumber = !0, null != t && $.set(t), $
                }(), o.default = o.BigNumber = o, void 0 === (r = function() {
                    return o
                }.call(t, n, t, e)) || (e.exports = r)
            }()
        },
        21652: function(e, t, n) {
            "use strict";
            n.d(t, {
                F: function() {
                    return S
                }
            });
            var r = n(67294),
                i = n(68270),
                o = n(10928),
                u = n.n(o),
                c = n(27361),
                s = n.n(c),
                a = n(12511),
                f = n(64030),
                l = n(71082),
                p = n(84486),
                g = n.n(p);
            const h = e => "https://bitfinex.com/images/thumbnails/" + e,
                d = e => e ? "@BFXSecurities" : "@bitfinex",
                m = e => {
                    let {
                        titleKey: t,
                        title: n,
                        pageThumbnails: i,
                        isSecuritiesPage: o
                    } = e;
                    const u = s()(i, t, s()(i, "/", ""));
                    return r.createElement(r.Fragment, null, r.createElement("meta", {
                        property: "og:title",
                        content: n
                    }), r.createElement("meta", {
                        property: "og:image",
                        content: h(u[0])
                    }), r.createElement("meta", {
                        name: "twitter:card",
                        content: "summary"
                    }), r.createElement("meta", {
                        name: "twitter:site",
                        content: d(o)
                    }), r.createElement("meta", {
                        name: "twitter:title",
                        content: n
                    }), r.createElement("meta", {
                        name: "twitter:image",
                        content: h(u[1])
                    }))
                };
            m.defaultProps = {
                titleKey: "",
                title: "",
                pageThumbnails: {},
                isSecuritiesPage: !1
            };
            var b = m;
            var v = e => r.createElement(l.StaticQuery, {
                    query: "871040068",
                    render: t => {
                        const n = s()(t, "allPageThumbnailsJson.edges"),
                            i = {};
                        return g()(n, (e => {
                            i[e.node.path] = e.node.thumbnails
                        })), r.createElement(b, Object.assign({
                            pageThumbnails: i
                        }, e))
                    }
                }),
                y = n(64721),
                x = n.n(y);
            const w = ["/", "/securities", "/mobile-trading"],
                O = {
                    "zh-CN": "zh-Hans",
                    "zh-TW": "zh-Hant",
                    "es-EM": "es",
                    "tr-TR": "tr"
                },
                E = e => e ? "favicon-securities.png" : "favicon.png",
                S = e => {
                    const {
                        location: t,
                        pageContext: n
                    } = e, {
                        pathname: o
                    } = t, {
                        isSecuritiesPage: c
                    } = n, {
                        t: l,
                        i18n: {
                            language: p,
                            exists: g
                        }
                    } = (0, i.$)("page-titles"), h = (0, f.Z)(), d = (0, a.FW)(h, o), m = (e => O[e] || e)(p), b = "/" === u()(o) ? o.slice(0, -1) : o, {
                        t: y,
                        i18n: {
                            exists: S
                        }
                    } = (0, i.$)("page-descriptions"), N = S("page-descriptions:" + b) ? y(b) : y("/"), M = g("page-titles:prefix:" + b) ? l("prefix." + b) : "Bitfinex", P = c ? "Bitfinex Securities" : M, _ = ((e, t, n) => {
                        const r = n || "/";
                        return x()(w, r) ? t(r) : e + " | " + t(r)
                    })(s()(d, "company") || P, l, b), A = c ? "same-origin" : "origin";
                    return (0, r.useEffect)((() => {
                        document && document.documentElement && document.documentElement.setAttribute("lang", m)
                    }), [m]), r.createElement(r.Fragment, null, r.createElement("meta", {
                        charSet: "utf-8"
                    }), r.createElement("meta", {
                        name: "keywords",
                        content: "cryptocurrency exchange, bitcoin, exchange, bitcoin exchange, litecoin, zcash, ethereum, margin, trade, futures"
                    }), r.createElement("meta", {
                        name: "referrer",
                        content: A
                    }), r.createElement("meta", {
                        name: "viewport",
                        content: "width=device-width"
                    }), r.createElement("link", {
                        rel: "shortcut icon",
                        type: "image/png",
                        href: "/images/" + E(c)
                    }), r.createElement("title", null, _), r.createElement("meta", {
                        charSet: "utf-8"
                    }), r.createElement("meta", {
                        name: "description",
                        content: N
                    }), r.createElement("meta", {
                        property: "og:description",
                        content: N
                    }), r.createElement("meta", {
                        name: "twitter:description",
                        content: N
                    }), r.createElement(v, {
                        title: _,
                        titleKey: b,
                        isSecuritiesPage: c
                    }))
                };
            S.defaultProps = {
                pageContext: {
                    isSecuritiesPage: !1
                }
            }
        },
        12511: function(e, t, n) {
            "use strict";
            n.d(t, {
                FW: function() {
                    return p
                },
                f8: function() {
                    return l
                },
                ot: function() {
                    return f
                }
            });
            var r = n(10240),
                i = n.n(r),
                o = n(27361),
                u = n.n(o),
                c = n(13311),
                s = n.n(c);
            const a = "/securities",
                f = e => i()(e, a) || i()(e, "/legal/securities"),
                l = e => e === a || e === a + "/",
                p = function(e, t) {
                    void 0 === t && (t = "");
                    const n = /securities\/(.+?)\//g.exec(t),
                        r = u()(n, 1);
                    return s()(e, (e => e.subPath === r))
                }
        },
        64030: function(e, t, n) {
            "use strict";
            n.d(t, {
                Z: function() {
                    return w
                }
            });
            var r = n(67294),
                i = n(8804),
                o = n.n(i),
                u = n(35161),
                c = n.n(u),
                s = n(12180),
                a = n(1469),
                f = n.n(a),
                l = n(71640),
                p = n.n(l),
                g = n(98611),
                h = n.n(g),
                d = n(2228);
            const m = [],
                b = {};
            var v = e => {
                    const {
                        0: t,
                        1: n
                    } = (0, r.useState)(m);
                    return (0, r.useEffect)((() => {
                        let t = !1;
                        return (e => {
                            const t = f()(e) ? h()(e, ",") : e;
                            let n = b[t];
                            return n || (n = new Promise(((e, n) => {
                                const r = p()(t, ",");
                                (0, d.bc)(r).then((t => {
                                    let {
                                        data: n
                                    } = t;
                                    e(n)
                                })).catch(n)
                            })), b[t] = n), n
                        })(e).then((e => {
                            t || n(e)
                        })), () => {
                            t = !0
                        }
                    }), [e]), t
                },
                y = n(87274);
            const x = e => {
                let [t, n, r, i, o] = e;
                return {
                    id: t,
                    title: n,
                    defaultSymbol: r,
                    subPath: i,
                    baseCcy: (0, s.Gz)(r, !0),
                    company: o
                }
            };
            var w = () => {
                const e = v(y.g8);
                return (0, r.useMemo)((() => c()(o()(e), x)), [e])
            }
        },
        12180: function(e, t, n) {
            "use strict";
            n.d(t, {
                Gz: function() {
                    return J
                },
                Mu: function() {
                    return X
                },
                Oy: function() {
                    return K
                },
                Qm: function() {
                    return Q
                },
                Sv: function() {
                    return pe
                },
                T4: function() {
                    return oe
                },
                UW: function() {
                    return ce
                },
                VD: function() {
                    return re
                },
                YC: function() {
                    return z
                },
                ZQ: function() {
                    return ue
                },
                aE: function() {
                    return ae
                },
                aG: function() {
                    return te
                },
                bE: function() {
                    return fe
                },
                cS: function() {
                    return se
                },
                dz: function() {
                    return le
                },
                i6: function() {
                    return W
                },
                oT: function() {
                    return L
                },
                rl: function() {
                    return ie
                },
                vG: function() {
                    return Y
                },
                x: function() {
                    return Z
                }
            });
            var r = n(77507),
                i = n.n(r),
                o = n(84238),
                u = n.n(o),
                c = n(81763),
                s = n.n(c),
                a = n(23560),
                f = n.n(a),
                l = n(64721),
                p = n.n(l),
                g = (n(32475), n(7334)),
                h = n.n(g),
                d = n(3945),
                m = n.n(d),
                b = n(71640),
                v = n.n(b),
                y = n(13880),
                x = n.n(y),
                w = n(10240),
                O = n.n(w),
                E = n(88306),
                S = n.n(E),
                N = n(27361),
                M = n.n(N),
                P = n(18721),
                _ = n.n(P),
                A = (n(35161), n(47037)),
                D = n.n(A),
                j = (n(54061), n(13218), n(56632)),
                C = n.n(j),
                T = n(1805),
                I = n(67502),
                F = n(34461);
            const B = ":",
                k = /F[A-Z]{0,1}[0-9]{1,9}/i,
                R = /[A-Z]{2,}F[A-Z]{0,1}[0-9]{1,3}/,
                U = /[A-Z]{2,}F([A-Z]{1})([0-9]{1,9})/,
                L = "t",
                z = "f",
                G = function(e, t) {
                    return void 0 === e && (e = 0), void 0 === t && (t = 0), s()(e) ? s()(t) ? new(i())(e.toString()).toFixed(t) : (T.kg.warn("uilib.format.precision: prec is not a number", t), e) : (T.kg.warn("uilib.format.precision: value is not a number", e), "")
                },
                $ = function(e) {
                    return void 0 === e && (e = ""), R.test(e)
                },
                H = function(e) {
                    return void 0 === e && (e = ""), U.test(e)
                },
                W = function(e) {
                    return void 0 === e && (e = ""), $(e) || H(e)
                },
                q = function(e, t) {
                    return void 0 === e && (e = ""), void 0 === t && (t = !0), t ? x()(e, k, "") : e
                },
                V = function(e, t, n) {
                    if (void 0 === t && (t = W), void 0 === n && (n = !0), !p()(e, B)) return !1;
                    const [r, i] = v()(e, B, 2), o = f()(t) ? t : W;
                    return n ? o(r) && o(i) : o(r) || o(i)
                },
                Z = (C()((e => V(e, $, !0) && !(e => V(e, H, !1))(e)), "isPerpetualSwap() is deprecated, use isPerpetualSwapPair() instead"), S()((function(e) {
                    if (void 0 === e && (e = ""), O()(e, z)) return [e.substring(1), ""];
                    const t = O()(e, L) ? e.substring(1) : e;
                    return t && D()(t) ? t.length > 6 ? v()(t, /\/|:/, 2) : [t.slice(0, 3), t.slice(3, 6)] : []
                })));

            function J(e, t) {
                const [n = "-"] = Z(e);
                return t ? m()(n) : h()(n)
            }

            function K(e, t) {
                const [, n = "-"] = Z(e);
                return t ? m()(n) : h()(n)
            }

            function Q(e) {
                if (void 0 === e && (e = ""), !e) return "";
                const t = e.toString().charAt(0);
                return t === L || t === z ? m()(e.substring(1)) : m()(e)
            }

            function Y(e) {
                const t = u()(Q(e));
                return 6 === t || t > 6 && (p()(e, "/") || p()(e, B))
            }
            const X = e => O()(e, z);

            function ee(e) {
                return (e => O()(e, L))(e) || X(e)
            }
            const te = (e, t) => {
                    const n = W(e) && W(t),
                        r = !n && W(e) ? q(e) : e,
                        i = !n && W(t) ? q(t) : t;
                    return "t" + r + (u()(r) > 3 || u()(i) > 3 ? B : "") + i
                },
                ne = [{
                    divider: 1e18,
                    suffix: "E"
                }, {
                    divider: 1e15,
                    suffix: "P"
                }, {
                    divider: 1e12,
                    suffix: "T"
                }, {
                    divider: 1e9,
                    suffix: "B"
                }, {
                    divider: 1e6,
                    suffix: "M"
                }, {
                    divider: 1e3,
                    suffix: "k"
                }, {
                    divider: 0,
                    suffix: ""
                }];

            function re(e) {
                return ne.reduce(((t, n) => {
                    if (null !== t) return t;
                    const {
                        divider: r,
                        suffix: o
                    } = n;
                    return Math.abs(e) < r ? null : 0 === r ? new(i())(e).dp(2).toString() : (e / r).toFixed(2).toString() + o
                }), null)
            }

            function ie(e) {
                const t = 100 * e,
                    n = Math.abs(t) < 1 ? 3 : 2,
                    r = Number(G(t, n));
                return (r || Math.abs(r)) + "%"
            }
            const oe = (e, t) => (0, I.uf)({
                    number: e,
                    significantFigures: 5,
                    decimals: s()(t) ? Math.min(t, (0, I.hH)(e)) : (0, I.hH)(e),
                    useGrouping: !0
                }),
                ue = e => {
                    const t = Math.abs(100 * e),
                        n = Math.min(Math.max(3 - Math.floor(Math.log10(t)), 0), 2);
                    return "" + (e < 0 ? "-" : "") + (0, I.uf)({
                        number: t,
                        decimals: n
                    }) + "%"
                },
                ce = e => e ? t => M()(e, [Q(t), "funding"], !1) : e => O()(e, z),
                se = e => e ? t => _()(e, t) : null,
                ae = e => function(t) {
                    void 0 === t && (t = "");
                    const n = t ? t.toString() : "",
                        r = m()(n),
                        i = n.substr(1) === r.substr(1);
                    return ee(n) && i ? n : e(r) ? "" + z + r : Y(r) || 8 === r.length ? "" + L + r : r
                };
            const fe = e => e && Math.floor(1e12 * e) / 1e12,
                le = (e, t) => {
                    const {
                        enabled: n,
                        mode: r
                    } = t || F.nO;
                    return n && "BTC" === e ? r : e
                },
                pe = (e, t) => {
                    const {
                        enabled: n,
                        display: r
                    } = t || F.nO;
                    return n && "BTC" === e ? r : e
                }
        },
        67502: function(e, t, n) {
            "use strict";
            n.d(t, {
                Bb: function() {
                    return b
                },
                Jp: function() {
                    return p
                },
                hH: function() {
                    return y
                },
                uf: function() {
                    return m
                }
            });
            var r = n(77507),
                i = n.n(r),
                o = (n(14841), n(64721), n(7654), n(97398)),
                u = n.n(o),
                c = n(52353),
                s = n.n(c),
                a = n(71640),
                f = n.n(a),
                l = n(3909);
            const p = function(e, t) {
                return void 0 === e && (e = 0), void 0 === t && (t = 0), new(i())(e).times(t).toNumber()
            };
            const g = 20,
                h = {};
            const d = "floor";

            function m(e) {
                void 0 === e && (e = {});
                const {
                    number: t,
                    decimals: n,
                    significantFigures: r,
                    short: i = !1
                } = e, o = i && 0 !== t && Math.abs(t) < 1 && u()(r) ? r : n, c = function(e) {
                    void 0 === e && (e = {});
                    const {
                        useGrouping: t = !1,
                        roundingMode: n
                    } = e;
                    return {
                        useGrouping: t,
                        roundingMode: n === d ? d : void 0
                    }
                }(e);
                if (u()(o) && o >= 0) c.minimumFractionDigits = Math.min(o, g), c.maximumFractionDigits = Math.min(o, g);
                else if (u()(r)) {
                    const e = 0 === t ? 3 : r;
                    c.minimumSignificantDigits = e, c.maximumSignificantDigits = e
                }
                i && (c.notation = "compact", c.compactDisplay = "short");
                const a = c.useGrouping + "-" + c.minimumFractionDigits + "-" + c.maximumFractionDigits + "-" + c.minimumSignificantDigits + "-" + c.maximumSignificantDigits + "-" + i + "-" + c.roundingMode;
                let p = h[a];
                p || (p = new Intl.NumberFormat("EN-US", c), h[a] = p);
                const m = p.format(function(e, t, n) {
                    if (void 0 === n && (n = 3), s()(e)) return 0;
                    let r = (t || 0) + (Number(f()(e.toExponential(), "e-")[1]) || 0) - 1;
                    return r = r < n ? n : r, (0, l.ch)(e, r)
                }(Number(t), n || r, c.minimumFractionDigits));
                return m && Math.abs(t) < 1 && c.maximumSignificantDigits && m.replace("-", "").length - 2 > c.maximumSignificantDigits ? m.replace(/0+$/, "") : m
            }

            function b(e, t) {
                void 0 === t && (t = 5);
                const n = t - 1 - Math.floor(Math.log10(e));
                return Math.max(0, n)
            }

            function v(e) {
                return function(e, t, n) {
                    void 0 === t && (t = 5), void 0 === n && (n = 8);
                    let r = 0,
                        i = Math.round(e * 10 ** n);
                    if (0 === i) return n;
                    for (; i % 10 == 0;) i = Math.round(i / 10), r += 1;
                    const o = n - r;
                    return Math.max(t, o)
                }(e)
            }

            function y(e) {
                if (!e) return 0;
                const t = Math.abs(e);
                return t < 1 ? v(t) : b(t)
            }
        },
        3909: function(e, t, n) {
            "use strict";
            n.d(t, {
                LT: function() {
                    return f
                },
                ch: function() {
                    return a
                }
            });
            var r = n(77507),
                i = n.n(r),
                o = n(97398),
                u = n.n(o),
                c = n(7654),
                s = n.n(c);

            function a(e, t) {
                if (void 0 === t && (t = 0), s()(e) || s()(t)) return "";
                let n = function(e, t, n) {
                    let r = +t;
                    const i = +n;
                    return void 0 === n || 0 === i ? Math[e](t) : s()(r) || "number" != typeof i || i % 1 != 0 ? NaN : (r = r.toString().split("e"), r = Math[e](+(r[0] + "e" + (r[1] ? +r[1] - i : -i))), r = r.toString().split("e"), +(r[0] + "e" + (r[1] ? +r[1] + i : i)))
                }(e > 0 ? "floor" : "ceil", e, -t);
                if (n = String(n.toFixed(t)), n.match(/e(-\d+)/)) {
                    const e = n.match(/(\d+.?\d*)e/)[1],
                        r = n.match(/e(-\d+)/)[1],
                        i = Math.abs(r);
                    return n = Array(i).join("0") + e.replace(/\./, ""), n = n.slice(0, t), "0." + n
                }
                if (!n.match(/\./) && t <= 0) return n;
                if (!n.match(/\./)) return n + "." + Array(t + 1).join("0");
                if (n.split(".")[1].length < t) {
                    const e = t - n.split(".")[1].length;
                    return "" + n + Array(e + 1).join("0")
                }
                return n
            }
            const f = function(e, t) {
                void 0 === e && (e = 0), void 0 === t && (t = 5);
                const n = +e;
                if (!u()(n)) return e;
                const r = n.toPrecision(t);
                return r.match(/e/) ? new(i())(r).toString(10) : r
            }
        },
        34461: function(e, t, n) {
            "use strict";
            n.d(t, {
                nO: function() {
                    return r
                }
            });
            const r = {
                enabled: !1,
                mode: "BTC"
            }
        },
        87274: function(e, t, n) {
            "use strict";
            n.d(t, {
                $r: function() {
                    return G
                },
                BC: function() {
                    return J
                },
                CU: function() {
                    return K
                },
                Cy: function() {
                    return U
                },
                DH: function() {
                    return _
                },
                Dq: function() {
                    return p
                },
                Dt: function() {
                    return z
                },
                G1: function() {
                    return T
                },
                I2: function() {
                    return F
                },
                ID: function() {
                    return k
                },
                J5: function() {
                    return q
                },
                Kq: function() {
                    return X
                },
                NS: function() {
                    return D
                },
                Q1: function() {
                    return Z
                },
                Ql: function() {
                    return w
                },
                Qr: function() {
                    return o
                },
                RR: function() {
                    return f
                },
                SF: function() {
                    return I
                },
                ST: function() {
                    return N
                },
                S_: function() {
                    return M
                },
                UP: function() {
                    return R
                },
                VS: function() {
                    return P
                },
                Vg: function() {
                    return h
                },
                Wh: function() {
                    return C
                },
                Wu: function() {
                    return m
                },
                ZE: function() {
                    return Y
                },
                _b: function() {
                    return O
                },
                _y: function() {
                    return b
                },
                av: function() {
                    return j
                },
                dV: function() {
                    return v
                },
                eE: function() {
                    return s
                },
                f0: function() {
                    return E
                },
                fd: function() {
                    return x
                },
                ff: function() {
                    return y
                },
                g8: function() {
                    return W
                },
                gH: function() {
                    return l
                },
                hl: function() {
                    return B
                },
                iH: function() {
                    return a
                },
                iO: function() {
                    return S
                },
                ix: function() {
                    return Q
                },
                nj: function() {
                    return L
                },
                sz: function() {
                    return $
                },
                uM: function() {
                    return V
                },
                v9: function() {
                    return g
                },
                x: function() {
                    return d
                },
                xk: function() {
                    return H
                },
                zG: function() {
                    return A
                }
            });
            var r = n(34531),
                i = n(61757);
            const {
                CI_ENVIRONMENT_NAME: o
            } = {}, u = {
                [i.w7.tr]: "https://apps.apple.com/tr/app/bitfinex-tr/id1625039586",
                [i.w7.com_tr]: "https://apps.apple.com/tr/app/bitfinex-tr/id1625039586"
            }, c = {
                [i.w7.tr]: "https://play.google.com/store/apps/details?id=com.bitfinextr.mobileapp&gl=TR",
                [i.w7.com_tr]: "https://play.google.com/store/apps/details?id=com.bitfinextr.mobileapp&gl=TR"
            }, s = "staging", a = "production", f = "https://support.bitfinex.com/hc/en-us/articles/360036965234-The-Bitfinex-Affiliate-Program", l = "https://www.bitfinex.com/support", p = "top", g = "left", h = "https://blog.bitfinex.com/wp-json/wp/v2/posts?_embed=true", d = "/mobile-trading", m = u[i.VJ] || "https://itunes.apple.com/us/app/bitfinex/id1436383182?ls=1&mt=8", b = c[i.VJ] || "https://play.google.com/store/apps/details?id=com.bitfinex.mobileapp&hl=en", v = "https://cs.bitfinex.com", y = "ref_code_key", x = "https://support.bitfinex.com/hc/en-us/articles/360024039494-What-do-I-get-when-I-offer-Margin-Funding-", w = "https://blog.bitfinex.com", O = "https://ln.bitfinex.com", E = "https://blog.bitfinex.com/category/changelogs", S = "https://support.bitfinex.com/hc/en-us/articles/115004405873-A-Beginner-s-Guide-to-Bitfinex", N = "https://staking.bitfinex.com", M = "https://support.bitfinex.com/hc/en-us/articles/900001925366", P = "/lending-pro", _ = "https://support.bitfinex.com/hc/en-us/articles/360024039494-What-do-I-get-when-I-offer-Margin-Funding-", A = "https://support.bitfinex.com/hc/en-us/articles/900000064023-UNUS-SED-LEO-Token-Holders-Benefits", D = "115004555165-What-is-Margin-Trading-on-Bitfinex", j = "214441185-What-is-Margin-Funding", C = "115003506585-What-is-a-Scaled-order-on-Bitfinex", T = "900001525006-Paper-Trading-at-Bitfinex-test-learn-and-simulate-trading-strategies", I = "360023366314-What-is-the-Bitfinex-API", F = "https://support.bitfinex.com/hc/en-us/articles/4412662478489-What-is-Fast-Pay", B = r.KM + "?refer=1", k = "https://blog.bitfinex.com/announcements/the-bitfinex-freedom-manifesto/", R = {
                TRADING: "trading",
                FUNDING: "funding"
            }, U = "pub:map:currency:sym", L = "pub:list:currency:paper", z = "pub:map:currency:label", G = "pub:map:pair:sym", $ = "pub:list:pair:cst", H = "pub:list:currency:securities", W = "pub:list:category:securities", q = "pub:map:category:securities", V = "pub:list:pair:exchange", Z = [U, L, z, "pub:map:currency:tx:fee", "pub:map:category:futures", $, G, H, W, q], J = "/securities", K = /^[a-z0-9!#$%&'*+/\\=?^_'"{|}~-]+(?:\.[a-z0-9!#$%&'*+/\\=?^_'"{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])$/i, Q = "/sign-up", Y = "/login", X = 20
        },
        48983: function(e, t, n) {
            var r = n(40371)("length");
            e.exports = r
        },
        78565: function(e) {
            var t = Object.prototype.hasOwnProperty;
            e.exports = function(e, n) {
                return null != e && t.call(e, n)
            }
        },
        10107: function(e) {
            e.exports = function(e, t, n, r, i) {
                return i(e, (function(e, i, o) {
                    n = r ? (r = !1, e) : t(n, e, i, o)
                })), n
            }
        },
        18190: function(e) {
            var t = Math.floor;
            e.exports = function(e, n) {
                var r = "";
                if (!e || n < 1 || n > 9007199254740991) return r;
                do {
                    n % 2 && (r += e), (n = t(n / 2)) && (e += e)
                } while (n);
                return r
            }
        },
        78302: function(e, t, n) {
            var r = n(18190),
                i = n(80531),
                o = n(40180),
                u = n(62689),
                c = n(88016),
                s = n(83140),
                a = Math.ceil;
            e.exports = function(e, t) {
                var n = (t = void 0 === t ? " " : i(t)).length;
                if (n < 2) return n ? r(t, e) : t;
                var f = r(t, a(e / c(t)));
                return u(t) ? o(s(f), 0, e).join("") : f.slice(0, e)
            }
        },
        88016: function(e, t, n) {
            var r = n(48983),
                i = n(62689),
                o = n(21903);
            e.exports = function(e) {
                return i(e) ? o(e) : r(e)
            }
        },
        21903: function(e) {
            var t = "\\ud800-\\udfff",
                n = "[" + t + "]",
                r = "[\\u0300-\\u036f\\ufe20-\\ufe2f\\u20d0-\\u20ff]",
                i = "\\ud83c[\\udffb-\\udfff]",
                o = "[^" + t + "]",
                u = "(?:\\ud83c[\\udde6-\\uddff]){2}",
                c = "[\\ud800-\\udbff][\\udc00-\\udfff]",
                s = "(?:" + r + "|" + i + ")" + "?",
                a = "[\\ufe0e\\ufe0f]?",
                f = a + s + ("(?:\\u200d(?:" + [o, u, c].join("|") + ")" + a + s + ")*"),
                l = "(?:" + [o + r + "?", r, u, c, n].join("|") + ")",
                p = RegExp(i + "(?=" + i + ")|" + l + f, "g");
            e.exports = function(e) {
                for (var t = p.lastIndex = 0; p.test(e);) ++t;
                return t
            }
        },
        18721: function(e, t, n) {
            var r = n(78565),
                i = n(222);
            e.exports = function(e, t) {
                return null != e && i(e, t, r)
            }
        },
        97398: function(e, t, n) {
            var r = n(55639).isFinite;
            e.exports = function(e) {
                return "number" == typeof e && r(e)
            }
        },
        7654: function(e, t, n) {
            var r = n(81763);
            e.exports = function(e) {
                return r(e) && e != +e
            }
        },
        81763: function(e, t, n) {
            var r = n(44239),
                i = n(37005);
            e.exports = function(e) {
                return "number" == typeof e || i(e) && "[object Number]" == r(e)
            }
        },
        52353: function(e) {
            e.exports = function(e) {
                return void 0 === e
            }
        },
        32475: function(e, t, n) {
            var r = n(78302),
                i = n(88016),
                o = n(40554),
                u = n(79833);
            e.exports = function(e, t, n) {
                e = u(e);
                var c = (t = o(t)) ? i(e) : 0;
                return t && c < t ? r(t - c, n) + e : e
            }
        },
        54061: function(e, t, n) {
            var r = n(62663),
                i = n(89881),
                o = n(67206),
                u = n(10107),
                c = n(1469);
            e.exports = function(e, t, n) {
                var s = c(e) ? r : u,
                    a = arguments.length < 3;
                return s(e, o(t, 4), n, a, i)
            }
        },
        84238: function(e, t, n) {
            var r = n(280),
                i = n(64160),
                o = n(98612),
                u = n(47037),
                c = n(88016);
            e.exports = function(e) {
                if (null == e) return 0;
                if (o(e)) return u(e) ? c(e) : e.length;
                var t = i(e);
                return "[object Map]" == t || "[object Set]" == t ? e.size : r(e).length
            }
        },
        3945: function(e, t, n) {
            var r = n(79833);
            e.exports = function(e) {
                return r(e).toUpperCase()
            }
        },
        73897: function(e) {
            e.exports = function(e, t) {
                (null == t || t > e.length) && (t = e.length);
                for (var n = 0, r = new Array(t); n < t; n++) r[n] = e[n];
                return r
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        85372: function(e) {
            e.exports = function(e) {
                if (Array.isArray(e)) return e
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        56690: function(e) {
            e.exports = function(e, t) {
                if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        89728: function(e, t, n) {
            var r = n(64062);

            function i(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var i = t[n];
                    i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, r(i.key), i)
                }
            }
            e.exports = function(e, t, n) {
                return t && i(e.prototype, t), n && i(e, n), Object.defineProperty(e, "prototype", {
                    writable: !1
                }), e
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        38416: function(e, t, n) {
            var r = n(64062);
            e.exports = function(e, t, n) {
                return (t = r(t)) in e ? Object.defineProperty(e, t, {
                    value: n,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : e[t] = n, e
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        68872: function(e) {
            e.exports = function(e, t) {
                var n = null == e ? null : "undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"];
                if (null != n) {
                    var r, i, o, u, c = [],
                        s = !0,
                        a = !1;
                    try {
                        if (o = (n = n.call(e)).next, 0 === t) {
                            if (Object(n) !== n) return;
                            s = !1
                        } else
                            for (; !(s = (r = o.call(n)).done) && (c.push(r.value), c.length !== t); s = !0);
                    } catch (f) {
                        a = !0, i = f
                    } finally {
                        try {
                            if (!s && null != n.return && (u = n.return(), Object(u) !== u)) return
                        } finally {
                            if (a) throw i
                        }
                    }
                    return c
                }
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        12218: function(e) {
            e.exports = function() {
                throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        27424: function(e, t, n) {
            var r = n(85372),
                i = n(68872),
                o = n(86116),
                u = n(12218);
            e.exports = function(e, t) {
                return r(e) || i(e, t) || o(e, t) || u()
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        95036: function(e, t, n) {
            var r = n(18698).default;
            e.exports = function(e, t) {
                if ("object" !== r(e) || null === e) return e;
                var n = e[Symbol.toPrimitive];
                if (void 0 !== n) {
                    var i = n.call(e, t || "default");
                    if ("object" !== r(i)) return i;
                    throw new TypeError("@@toPrimitive must return a primitive value.")
                }
                return ("string" === t ? String : Number)(e)
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        64062: function(e, t, n) {
            var r = n(18698).default,
                i = n(95036);
            e.exports = function(e) {
                var t = i(e, "string");
                return "symbol" === r(t) ? t : String(t)
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        18698: function(e) {
            function t(n) {
                return e.exports = t = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                    return typeof e
                } : function(e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                }, e.exports.__esModule = !0, e.exports.default = e.exports, t(n)
            }
            e.exports = t, e.exports.__esModule = !0, e.exports.default = e.exports
        },
        86116: function(e, t, n) {
            var r = n(73897);
            e.exports = function(e, t) {
                if (e) {
                    if ("string" == typeof e) return r(e, t);
                    var n = Object.prototype.toString.call(e).slice(8, -1);
                    return "Object" === n && e.constructor && (n = e.constructor.name), "Map" === n || "Set" === n ? Array.from(e) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? r(e, t) : void 0
                }
            }, e.exports.__esModule = !0, e.exports.default = e.exports
        }
    }
]);