! function() {
    "use strict";
    var e, c, n, t, a, o = {},
        r = {};

    function s(e) {
        var c = r[e];
        if (void 0 !== c) return c.exports;
        var n = r[e] = {
            id: e,
            loaded: !1,
            exports: {}
        };
        return o[e].call(n.exports, n, n.exports, s), n.loaded = !0, n.exports
    }
    s.m = o, s.amdD = function() {
            throw new Error("define cannot be used indirect")
        }, e = [], s.O = function(c, n, t, a) {
            if (!n) {
                var o = 1 / 0;
                for (b = 0; b < e.length; b++) {
                    n = e[b][0], t = e[b][1], a = e[b][2];
                    for (var r = !0, f = 0; f < n.length; f++)(!1 & a || o >= a) && Object.keys(s.O).every((function(e) {
                        return s.O[e](n[f])
                    })) ? n.splice(f--, 1) : (r = !1, a < o && (o = a));
                    if (r) {
                        e.splice(b--, 1);
                        var d = t();
                        void 0 !== d && (c = d)
                    }
                }
                return c
            }
            a = a || 0;
            for (var b = e.length; b > 0 && e[b - 1][2] > a; b--) e[b] = e[b - 1];
            e[b] = [n, t, a]
        }, s.n = function(e) {
            var c = e && e.__esModule ? function() {
                return e.default
            } : function() {
                return e
            };
            return s.d(c, {
                a: c
            }), c
        }, s.d = function(e, c) {
            for (var n in c) s.o(c, n) && !s.o(e, n) && Object.defineProperty(e, n, {
                enumerable: !0,
                get: c[n]
            })
        }, s.f = {}, s.e = function(e) {
            return Promise.all(Object.keys(s.f).reduce((function(c, n) {
                return s.f[n](e, c), c
            }), []))
        }, s.u = function(e) {
            return {
                77: "component---src-pages-invalid-token-js",
                129: "6c18052a6bc6b784a6e80152ce8331b745d24066",
                184: "component---src-pages-borrow-js",
                302: "component---src-pages-security-policy-js",
                445: "0ed00b7f056396f2c9a044d2fce9ebce3d0420b2",
                532: "styles",
                536: "57135cbe977bbaba5d05727cbba8fcd04371a1bf",
                1039: "component---src-pages-freeze-js",
                1183: "component---src-pages-utilities-js",
                1321: "component---src-pages-logout-js",
                1337: "component---src-pages-how-to-buy-bitcoin-js",
                1745: "component---src-pages-cards-js",
                1881: "component---src-pages-order-book-js",
                2049: "component---src-pages-login-confirm-js",
                2276: "component---src-pages-support-js",
                2423: "component---src-pages-lending-pro-js",
                2427: "72362e149d1fe23b4c55564c5e8349ac5e047f84",
                2717: "component---src-pages-sign-up-js",
                2875: "component---src-pages-login-js",
                3128: "component---src-pages-features-js",
                3166: "component---src-pages-account-js",
                3436: "component---src-pages-posts-recent-js",
                3499: "component---src-pages-securities-posts-js",
                3542: "component---src-pages-tr-js",
                3823: "4f948e6548bda79091e9a72b37b19937a40e79d6",
                3976: "d3602425a160d4b9588d0041fc959b1d50ed0cb4",
                4112: "component---src-pages-app-js",
                4196: "910269a2609313b9dc899a838017d362ee13c0eb",
                4249: "component---src-pages-bitfinex-alpha-js",
                4333: "component---src-pages-download-js",
                4665: "7f1d45107121c9a422e37c0cc915dca05af5cd0d",
                4827: "6c7df26227ad46573021426343701935c6377e8b",
                5023: "component---src-pages-how-to-buy-litecoin-js",
                5159: "component---src-pages-bug-bounty-js",
                5317: "component---src-pages-channels-js",
                5340: "component---src-pages-logged-out-js",
                5352: "component---src-pages-securities-fees-js",
                5397: "component---src-pages-manifesto-js",
                5657: "component---src-pages-affiliates-js",
                5865: "6278397b",
                6074: "d1f5a87cf30e7d4b6bb63472e84de1772df9a983",
                6556: "component---src-pages-deposits-withdrawals-js",
                6609: "component---src-templates-legal-js",
                7073: "811cb9c0dc255e85128898d4ba2efc312725d66f",
                7251: "component---src-pages-join-bitfinex-js",
                7338: "b8024e44523bc1d8c39e165ab55d2f139af531fd",
                7701: "component---src-pages-verification-js",
                7719: "component---src-pages-anti-spam-js",
                7815: "component---src-pages-honey-js",
                8033: "component---src-pages-stats-js",
                8296: "component---src-pages-securities-js",
                8562: "component---src-pages-pro-js",
                8575: "component---src-pages-how-to-buy-ethereum-js",
                8592: "eb887f6dbcd143c3d10fa569c31298429c9e98e3",
                8682: "component---src-pages-about-js",
                8802: "cf5cb176bf73a615ba9e7982a2927cff5fefbb1d",
                8883: "component---src-pages-404-js",
                8943: "component---src-pages-mobile-trading-js",
                9172: "component---src-pages-bitrefill-start-js",
                9228: "d4692bcb59cd29e89bae24fee720a03a90357efd",
                9319: "8c2eda3ebc3f8c95c0eee4253095343384e086aa",
                9336: "component---src-pages-confirm-signup-js",
                9351: "commons",
                9447: "component---src-pages-press-js",
                9620: "6023c91809623dcda02a9d4ca61e26dc326c8f1d",
                9634: "1d912fcff0e503f2771ea5c2eaebf7cbe22703a7",
                9771: "component---src-pages-fees-js",
                9908: "component---src-pages-posts-index-js",
                9928: "component---src-pages-funding-book-js"
            }[e] + "-" + {
                77: "8f42458c1eb86ebb220a",
                129: "b9d4a5bc83ddab1ce6db",
                184: "881d6faf64c057da9af6",
                302: "67b4cc069086a726d0dc",
                445: "62b0b8477778dcea8238",
                532: "a9655093808967756571",
                536: "a811cdb0ba7bcd4a2fc3",
                1039: "3880edb7a26ec2a28611",
                1183: "81331adec6cf747dbec2",
                1321: "291594fa8382301cfedd",
                1337: "dae3c7d034f8f005fe24",
                1745: "506d77d19829c74ef390",
                1881: "2c5254405c37614e67ce",
                2049: "8374401dd1debed4fa46",
                2276: "db74868556deeeea3b29",
                2423: "91b5f96c047c2a43ae01",
                2427: "992621969105b9bb8a9b",
                2717: "99e3438087c6ceac1b44",
                2875: "ef560f7432d541e14afb",
                3128: "5bc383971845894e476d",
                3166: "d65194fd2e740e00077f",
                3436: "5ac7cc1369309ab4bcc8",
                3499: "0d6121ae4f2c1af38c42",
                3542: "71c0daabe235131fdb2d",
                3823: "1505536288ad8be72d4e",
                3976: "616b9bc4f7a03a0504bc",
                4112: "303cffcbc54556b6b61d",
                4196: "004050bf2d985d55d520",
                4249: "d2450a5b23e382090c0f",
                4333: "67dec1ef971373ea0cd9",
                4665: "bfd6dbd1b09e9ca220b7",
                4827: "28be5c3694b59013da8d",
                5023: "4c9b3cdec9b7f58beb1f",
                5159: "93552f08baaed20fc8f1",
                5317: "c26241ea384d812b8002",
                5340: "cf391cbcbd38638f5865",
                5352: "e83adf6a252eabef5614",
                5397: "46f4e4f1c6525799b1e9",
                5657: "688ce2b3d9442c75d07a",
                5865: "3aec28cf0be156f1de82",
                6074: "123f60d51b3fa7787952",
                6556: "adcbda8e363ccf1005ae",
                6609: "7762cefd2a343db593f3",
                7073: "cd54c81a66ec50fdd70d",
                7251: "37b34f98a992c91887b0",
                7338: "da87653342ed23e79879",
                7701: "134b6b89c7d658205259",
                7719: "5230acff018dfa2340af",
                7815: "7ae125c3ca74aa92b1c9",
                8033: "7b57abed04ae0997d8c3",
                8296: "34a3628dffd44517224c",
                8562: "90f5646747b5edb276a3",
                8575: "37bf3e05e2dd78b08ed2",
                8592: "4bca9d90ed6023845c06",
                8682: "8ff673ad8ae57aad0797",
                8802: "5d745eac27fcee812237",
                8883: "74b4b1cbaaf0f36ccd44",
                8943: "fb76f7b6208e2ee86c10",
                9172: "5f3d0599554609476cd1",
                9228: "b48514e6353b3e6b1164",
                9319: "06514275e18eed368e1e",
                9336: "fbc4a2328ebe0bc70e3f",
                9351: "5fc182f8e036a4f6574a",
                9447: "4297273a4af33ab621c3",
                9620: "c9b75d1e06b278eec8dd",
                9634: "9620122ef8cfc67a99c4",
                9771: "c72b186695ccd3897fe9",
                9908: "51bff3a971c16642f40f",
                9928: "e19bf8d83dc13be240a1"
            }[e] + ".js"
        }, s.miniCssF = function(e) {
            return "styles.852f7af459d29dc7459d.css"
        }, s.g = function() {
            if ("object" == typeof globalThis) return globalThis;
            try {
                return this || new Function("return this")()
            } catch (e) {
                if ("object" == typeof window) return window
            }
        }(), s.hmd = function(e) {
            return (e = Object.create(e)).children || (e.children = []), Object.defineProperty(e, "exports", {
                enumerable: !0,
                set: function() {
                    throw new Error("ES Modules may not assign module.exports or exports.*, Use ESM export syntax, instead: " + e.id)
                }
            }), e
        }, s.o = function(e, c) {
            return Object.prototype.hasOwnProperty.call(e, c)
        }, c = {}, n = "bfx-ui-public:", s.l = function(e, t, a, o) {
            if (c[e]) c[e].push(t);
            else {
                var r, f;
                if (void 0 !== a)
                    for (var d = document.getElementsByTagName("script"), b = 0; b < d.length; b++) {
                        var i = d[b];
                        if (i.getAttribute("src") == e || i.getAttribute("data-webpack") == n + a) {
                            r = i;
                            break
                        }
                    }
                r || (f = !0, (r = document.createElement("script")).charset = "utf-8", r.timeout = 120, s.nc && r.setAttribute("nonce", s.nc), r.setAttribute("data-webpack", n + a), r.src = e), c[e] = [t];
                var p = function(n, t) {
                        r.onerror = r.onload = null, clearTimeout(u);
                        var a = c[e];
                        if (delete c[e], r.parentNode && r.parentNode.removeChild(r), a && a.forEach((function(e) {
                                return e(t)
                            })), n) return n(t)
                    },
                    u = setTimeout(p.bind(null, void 0, {
                        type: "timeout",
                        target: r
                    }), 12e4);
                r.onerror = p.bind(null, r.onerror), r.onload = p.bind(null, r.onload), f && document.head.appendChild(r)
            }
        }, s.r = function(e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                value: "Module"
            }), Object.defineProperty(e, "__esModule", {
                value: !0
            })
        }, s.nmd = function(e) {
            return e.paths = [], e.children || (e.children = []), e
        }, s.p = "/assets/", t = function(e) {
            return new Promise((function(c, n) {
                var t = s.miniCssF(e),
                    a = s.p + t;
                if (function(e, c) {
                        for (var n = document.getElementsByTagName("link"), t = 0; t < n.length; t++) {
                            var a = (r = n[t]).getAttribute("data-href") || r.getAttribute("href");
                            if ("stylesheet" === r.rel && (a === e || a === c)) return r
                        }
                        var o = document.getElementsByTagName("style");
                        for (t = 0; t < o.length; t++) {
                            var r;
                            if ((a = (r = o[t]).getAttribute("data-href")) === e || a === c) return r
                        }
                    }(t, a)) return c();
                ! function(e, c, n, t) {
                    var a = document.createElement("link");
                    a.rel = "stylesheet", a.type = "text/css", a.onerror = a.onload = function(o) {
                        if (a.onerror = a.onload = null, "load" === o.type) n();
                        else {
                            var r = o && ("load" === o.type ? "missing" : o.type),
                                s = o && o.target && o.target.href || c,
                                f = new Error("Loading CSS chunk " + e + " failed.\n(" + s + ")");
                            f.code = "CSS_CHUNK_LOAD_FAILED", f.type = r, f.request = s, a.parentNode.removeChild(a), t(f)
                        }
                    }, a.href = c, document.head.appendChild(a)
                }(e, a, c, n)
            }))
        }, a = {
            6658: 0
        }, s.f.miniCss = function(e, c) {
            a[e] ? c.push(a[e]) : 0 !== a[e] && {
                532: 1
            }[e] && c.push(a[e] = t(e).then((function() {
                a[e] = 0
            }), (function(c) {
                throw delete a[e], c
            })))
        },
        function() {
            var e = {
                6658: 0
            };
            s.f.j = function(c, n) {
                var t = s.o(e, c) ? e[c] : void 0;
                if (0 !== t)
                    if (t) n.push(t[2]);
                    else if (/^(532|6658)$/.test(c)) e[c] = 0;
                else {
                    var a = new Promise((function(n, a) {
                        t = e[c] = [n, a]
                    }));
                    n.push(t[2] = a);
                    var o = s.p + s.u(c),
                        r = new Error;
                    s.l(o, (function(n) {
                        if (s.o(e, c) && (0 !== (t = e[c]) && (e[c] = void 0), t)) {
                            var a = n && ("load" === n.type ? "missing" : n.type),
                                o = n && n.target && n.target.src;
                            r.message = "Loading chunk " + c + " failed.\n(" + a + ": " + o + ")", r.name = "ChunkLoadError", r.type = a, r.request = o, t[1](r)
                        }
                    }), "chunk-" + c, c)
                }
            }, s.O.j = function(c) {
                return 0 === e[c]
            };
            var c = function(c, n) {
                    var t, a, o = n[0],
                        r = n[1],
                        f = n[2],
                        d = 0;
                    if (o.some((function(c) {
                            return 0 !== e[c]
                        }))) {
                        for (t in r) s.o(r, t) && (s.m[t] = r[t]);
                        if (f) var b = f(s)
                    }
                    for (c && c(n); d < o.length; d++) a = o[d], s.o(e, a) && e[a] && e[a][0](), e[a] = 0;
                    return s.O(b)
                },
                n = self.webpackChunkbfx_ui_public = self.webpackChunkbfx_ui_public || [];
            n.forEach(c.bind(null, 0)), n.push = c.bind(null, n.push.bind(n))
        }()
}();