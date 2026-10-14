(self.webpackChunkbfx_ui_public = self.webpackChunkbfx_ui_public || []).push([
    [445], {
        12076: function(e, t, n) {
            "use strict";
            var r = n(67294),
                a = n(45835),
                c = n(75900),
                s = n.n(c),
                i = n(27361),
                o = n.n(i),
                u = n(40811),
                l = n(76104),
                m = n(86222),
                d = n(94803),
                E = n(64680),
                f = n(61655),
                g = n(28357),
                M = n(45992),
                p = n(72346),
                I = n(37469),
                h = n(54998),
                N = n(18200);
            "undefined" != typeof window && n(71505)('a[href*="#"]', {
                offset: 170,
                speed: 200,
                speedAsDuration: !0
            }), (0, E.Z)();
            const S = e => {
                const {
                    children: t,
                    headerLight: n,
                    stickyHeader: c,
                    path: i,
                    isTerms: E,
                    isSecuritiesPage: p,
                    isSecuritiesRootPage: S
                } = e, {
                    user: v
                } = (0, I.Z)(), L = !!o()(v, "isPptEnabled", 0);
                return r.createElement(a.a, {
                    i18n: u.Z
                }, r.createElement(f.kB, null, r.createElement(l.ZP, {
                    light: n,
                    sticky: c,
                    path: i,
                    isSecuritiesPage: p,
                    isSecuritiesRootPage: S
                }), r.createElement("div", {
                    className: "" + s()({
                        terms_page: E,
                        securities_page: p
                    })
                }, r.createElement(g.JB, null, r.createElement(d.Z, null), r.createElement(h.KA, {
                    path: i
                }, t, r.createElement(N.Z, null)))), r.createElement(m.Z, {
                    isLoggedIn: !!v,
                    isSecuritiesPage: p,
                    isPaperTradingAccount: L,
                    path: i
                }), r.createElement(M.Z, null)))
            };
            S.defaultProps = {
                headerLight: !1,
                stickyHeader: !1,
                isTerms: !1,
                isSecuritiesPage: !1,
                isSecuritiesRootPage: !1
            }, t.Z = (0, p.Z)(S)
        },
        56138: function(e, t, n) {
            "use strict";
            n.d(t, {
                Z: function() {
                    return M
                }
            });
            var r = n(67294),
                a = n(798),
                c = n(23493),
                s = n.n(c),
                i = n(75900),
                o = n.n(i),
                u = n(68270),
                l = n(35161),
                m = n.n(l),
                d = n(28082),
                E = n(40872);
            const f = e => {
                let {
                    isMobile: t,
                    setSearchTerm: n,
                    searchTerm: c
                } = e;
                const {
                    t: s
                } = (0, u.$)("common");
                return r.createElement("div", {
                    className: o()("landing-tickers__search-group", {
                        "landing-tickers__search-group-mobile": t
                    })
                }, r.createElement("input", {
                    ref: e => {
                        e && e.focus()
                    },
                    onChange: e => n(e.target.value),
                    placeholder: s("search"),
                    value: c,
                    className: "landing-tickers__search-group-input"
                }), r.createElement(a.Q, {
                    className: "landing-tickers__search-group-icon",
                    src: E.Z
                }))
            };
            f.defaultProps = {
                setSearchTerm: () => {},
                searchTerm: ""
            };
            const g = e => {
                let {
                    tabs: t,
                    className: n,
                    onChange: c,
                    setSearchTerm: i,
                    searchTerm: u,
                    selectedTabId: l,
                    preItem: g,
                    hasSearch: M,
                    animate: p
                } = e;
                const {
                    0: I,
                    1: h
                } = (0, r.useState)(!1), {
                    0: N,
                    1: S
                } = (0, r.useState)(null), v = M && r.createElement("a", {
                    onClick: e => {
                        e.preventDefault(), h(!I), I && i("")
                    },
                    className: "landing-tickers__search"
                }, r.createElement(a.Q, {
                    src: E.Z
                }));
                return (0, r.useEffect)((() => {
                    if (!p) return () => {};
                    const e = s()((() => {
                        S(Date.now())
                    }), 200);
                    return window.addEventListener("resize", e), () => {
                        window.removeEventListener("resize", e)
                    }
                }), [p, S]), r.createElement("div", {
                    className: "ccy-tabs__container"
                }, r.createElement("div", {
                    className: "ccy-tabs--mobile visible-mobile"
                }, g, r.createElement("div", {
                    className: o()("bp3-select", [n])
                }, r.createElement("select", {
                    onChange: e => c(e.target.value),
                    value: l
                }, m()(t, (e => {
                    let {
                        key: t,
                        element: n,
                        className: a
                    } = e;
                    return r.createElement("option", {
                        key: t,
                        value: t,
                        className: o()(a)
                    }, n)
                })))), I && r.createElement(f, {
                    searchTerm: u,
                    setSearchTerm: i,
                    isMobile: !0
                }), v), r.createElement("div", {
                    className: "visible-desktop"
                }, r.createElement(d.m, {
                    className: o()("ccy-tabs custom-scrollbar", [n]),
                    selectedTabId: l,
                    onChange: e => {
                        c(e)
                    },
                    animate: p,
                    key: N
                }, g, m()(t, (e => {
                    let {
                        key: t,
                        element: n,
                        className: a
                    } = e;
                    return r.createElement(d.O, {
                        key: t,
                        id: t,
                        className: o()("ccy-tabs__item", [a])
                    }, n)
                })), v), I && r.createElement(f, {
                    searchTerm: u,
                    setSearchTerm: i,
                    isMobile: !1
                })))
            };
            g.defaultProps = {
                tabs: [],
                className: "",
                selectedTabId: null,
                onChange: () => {},
                preItem: null,
                hasSearch: !0,
                setSearchTerm: () => {},
                searchTerm: "",
                animate: !0
            };
            var M = g
        },
        84912: function(e, t, n) {
            "use strict";
            n.d(t, {
                Z: function() {
                    return i
                }
            });
            var r = n(67294),
                a = n(798),
                c = n(78761);
            const s = e => {
                let {
                    defaultOpen: t,
                    title: n,
                    children: s
                } = e;
                const {
                    0: i,
                    1: o
                } = (0, r.useState)(t);
                return r.createElement("div", {
                    className: "collapsible-content"
                }, r.createElement("div", {
                    className: "collapsible-content__chevron",
                    onClick: () => o(!i),
                    role: "presentation"
                }, r.createElement(a.Q, {
                    src: i ? "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTIuNzEgOS4yOWwtNC00QzguNTMgNS4xMSA4LjI4IDUgOCA1cy0uNTMuMTEtLjcxLjI5bC00IDRhMS4wMDMgMS4wMDMgMCAwMDEuNDIgMS40Mkw4IDcuNDFsMy4yOSAzLjI5Yy4xOC4xOS40My4zLjcxLjNhMS4wMDMgMS4wMDMgMCAwMC43MS0xLjcxeiIgZmlsbC1ydWxlPSJldmVub2RkIj48L3BhdGg+PC9zdmc+" : c.Z
                }), n), i ? r.createElement("div", {
                    className: "collapsible-content__body"
                }, s) : null)
            };
            s.defaultProps = {
                defaultOpen: !1
            };
            var i = s
        },
        22449: function(e, t, n) {
            "use strict";
            n.d(t, {
                P: function() {
                    return M
                }
            });
            var r = n(97326),
                a = n(94578),
                c = n(67294),
                s = n(81439),
                i = n(71640),
                o = n.n(i),
                u = n(35161),
                l = n.n(u),
                m = n(84912);
            const d = s.ZP.t("error_boundary:component_error"),
                E = s.ZP.t("error_boundary:no_stack_trace"),
                f = s.ZP.t("error_boundary:suggestion_text"),
                g = e => e && e.stack ? l()(o()(e.stack, "\n"), ((e, t) => c.createElement("div", {
                    key: t
                }, e))) : E;

            function M(e, t) {
                var n;
                return (n = function(n) {
                    function s(e) {
                        var t;
                        return (t = n.call(this, e) || this).state = {
                            collapsed: !0,
                            hasError: !1,
                            errorStack: null
                        }, t.onOpen = t.onOpen.bind((0, r.Z)(t)), t.onClose = t.onClose.bind((0, r.Z)(t)), t
                    }(0, a.Z)(s, n);
                    var i = s.prototype;
                    return i.componentDidCatch = function(e, t) {
                        const n = g(e);
                        this.setState({
                            hasError: !0,
                            errorStack: n
                        }), console.error(e, t)
                    }, i.onOpen = function() {
                        this.setState({
                            collapsed: !1
                        })
                    }, i.onClose = function() {
                        this.setState({
                            collapsed: !0
                        })
                    }, i.render = function() {
                        const {
                            hasError: n,
                            collapsed: r,
                            errorStack: a
                        } = this.state, {
                            displayName: s,
                            name: i
                        } = e || {}, o = (t || i || s) + ": " + d;
                        return n ? c.createElement("div", {
                            className: "bfx-red-text"
                        }, c.createElement(m.Z, {
                            title: o,
                            onOpen: this.onOpen,
                            onClose: this.onClose,
                            closedByDefault: r,
                            persist: !1,
                            defaultOpen: !0
                        }, c.createElement("div", {
                            className: "error-boundary__suggestion-container"
                        }, f), c.createElement("div", {
                            className: "show-smaller error-boundary__stacktrace-container"
                        }, a))) : c.createElement(e, this.props)
                    }, s
                }(c.Component)).getDerivedStateFromError = () => ({
                    hasError: !0
                }), n
            }
        },
        51237: function(e, t, n) {
            "use strict";
            n.d(t, {
                ES: function() {
                    return s
                },
                NE: function() {
                    return r
                },
                RG: function() {
                    return a
                },
                hk: function() {
                    return c
                }
            });
            const r = 1e4,
                a = {
                    SYMBOL: 0,
                    BID: 1,
                    BID_SIZE: 2,
                    ASK: 3,
                    ASK_SIZE: 4,
                    DAILY_CHANGE: 5,
                    DAILY_CHANGE_PERC: 6,
                    LAST_PRICE: 7,
                    VOLUME: 8,
                    HIGH: 9,
                    LOW: 10,
                    VOLUME_TOTAL: 11,
                    VOLUME_TOTAL_EQUIVALENT: 12,
                    FUNDING_RATE: 13,
                    OPEN_INTEREST: 14
                },
                c = {
                    SYMBOL: 0,
                    FRR: 1,
                    BID: 2,
                    BID_PERIOD: 3,
                    BID_SIZE: 4,
                    ASK: 5,
                    ASK_PERIOD: 6,
                    ASK_SIZE: 7,
                    DAILY_CHANGE: 8,
                    DAILY_CHANGE_PERC: 9,
                    LAST_PRICE: 10,
                    VOLUME: 11,
                    HIGH: 12,
                    LOW: 13,
                    FRR_AMOUNT_AVAILABLE: 16,
                    VOLUME_TOTAL: 17,
                    FRR_ANNUALIZED: 18,
                    LAST_PRICE_ANNUALIZED: 19
                },
                s = 99
        },
        497: function(e, t, n) {
            "use strict";
            n.d(t, {
                Z: function() {
                    return g
                }
            });
            var r = n(94578),
                a = n(67294),
                c = n(13880),
                s = n.n(c),
                i = n(97398),
                o = n.n(i),
                u = n(84741),
                l = n(71640),
                m = n.n(l);
            let d = function(e) {
                function t() {
                    return e.apply(this, arguments) || this
                }
                return (0, r.Z)(t, e), t.prototype.render = function() {
                    const {
                        value: e
                    } = this.props, t = e.toString(), n = t.match(/\./), r = t.match(/(0+)$/g);
                    if (n && r) {
                        const [e, n] = m()(t, "."), c = s()(n, /(0+)$/g, "");
                        return a.createElement("span", null, e, ".", c, r && a.createElement("span", {
                            className: "trailing-zeros"
                        }, r[0]))
                    }
                    return a.createElement("span", null, t)
                }, t
            }(a.PureComponent);
            var E = d;
            let f = function(e) {
                function t() {
                    return e.apply(this, arguments) || this
                }
                return (0, r.Z)(t, e), t.prototype.render = function() {
                    const {
                        value: e,
                        decimals: t = null,
                        sigFig: n = null,
                        fadeTrailingZeros: r = !1,
                        strike: c = null,
                        includeStrike: i = !1,
                        coloredStrike: l = !0,
                        className: m,
                        symbol: d,
                        symbolBefore: f = !1,
                        absolute: g = !1,
                        clickEvent: M = !1,
                        ...p
                    } = this.props;
                    if (!o()(+e)) return a.createElement("span", null, e.toString());
                    const I = g ? Math.abs(e) : e,
                        h = {
                            number: I,
                            decimals: t,
                            significantFigures: n,
                            useGrouping: !0
                        },
                        N = (0, u.uf)(h);
                    M && (p.onClick = () => M(s()(N, ",", "")));
                    const S = [(0, u.EC)(I, {
                            strike: c,
                            coloredStrike: l,
                            includeStrike: i
                        }), m].join(" "),
                        v = r ? a.createElement(E, {
                            value: N
                        }) : N;
                    return a.createElement(a.Fragment, null, d && f && d, a.createElement("span", Object.assign({
                        className: S
                    }, p), v), d && !f && d)
                }, t
            }(a.PureComponent);
            f.defaultProps = {
                value: "N/A",
                className: ""
            };
            var g = f
        },
        28082: function(e, t, n) {
            "use strict";
            n.d(t, {
                O: function() {
                    return i
                },
                m: function() {
                    return s
                }
            });
            var r = n(67294),
                a = n(75900),
                c = n.n(a);
            const s = e => {
                    let {
                        className: t,
                        selectedTabId: n,
                        onChange: a,
                        children: c
                    } = e;
                    const {
                        0: s,
                        1: i
                    } = (0, r.useState)(n), o = e => {
                        i(e), a && a(e)
                    };
                    return r.createElement("div", {
                        className: "tabs " + t
                    }, r.Children.map(c, (e => "function" == typeof(null == e ? void 0 : e.type) ? r.cloneElement(e, {
                        isActive: e.key === s,
                        onClick: o
                    }) : e)))
                },
                i = e => {
                    let {
                        id: t,
                        className: n,
                        isActive: a,
                        onClick: s,
                        children: i
                    } = e;
                    const o = () => {
                        null == s || s(t)
                    };
                    return r.createElement("div", {
                        className: c()("tabs__item", n, {
                            active: a
                        }),
                        role: "button",
                        tabIndex: 0,
                        onKeyDown: o,
                        onClick: o
                    }, i)
                }
        },
        13746: function(e, t, n) {
            "use strict";
            n.d(t, {
                L: function() {
                    return o
                },
                Z: function() {
                    return i
                }
            });
            var r = n(67294),
                a = n(75900),
                c = n.n(a);
            const s = e => {
                let {
                    content: t,
                    children: n,
                    position: a,
                    popoverClassName: s,
                    isOpen: i
                } = e;
                const {
                    0: o,
                    1: u
                } = (0, r.useState)(i);
                return r.createElement("div", {
                    className: "tooltip",
                    onMouseEnter: () => {
                        u(!0)
                    },
                    onMouseLeave: () => {
                        u(!1)
                    }
                }, n, (o || i) && r.createElement("div", {
                    className: c()("tooltip__content", [a, s])
                }, r.createElement("div", {
                    className: "tooltip__inner"
                }, t), r.createElement("span", {
                    className: c()("tooltip__chevron", a)
                })))
            };
            s.defaultProps = {
                position: "top",
                popoverClassName: "",
                isOpen: !1
            };
            var i = s;
            const o = {
                TOP: "top",
                BOTTOM: "bottom",
                LEFT: "left",
                RIGHT: "right"
            }
        },
        86509: function(e, t, n) {
            "use strict";
            n.d(t, {
                gp: function() {
                    return a
                }
            });
            var r = n(88705);
            const a = function(e) {
                return void 0 === e && (e = "ALL"), (0, r.Ru)({
                    url: "/v2/tickers",
                    params: {
                        symbols: e
                    }
                })
            }
        },
        77970: function(e, t, n) {
            "use strict";
            n.d(t, {
                EG: function() {
                    return M
                }
            });
            n(59854), n(6557);
            var r = n(67502),
                a = n(12180),
                c = n(88705),
                s = (n(52103), n(7771)),
                i = n.n(s);
            const o = {
                    MEMORY: "MEMORY",
                    LOCAL_STORAGE: "LOCAL_STORAGE"
                },
                u = {},
                l = {
                    get: (e, t) => {
                        if (!u[e]) return null;
                        const {
                            value: n,
                            mts: r = 0
                        } = u[e], a = i()() - r;
                        return n && a < t ? n : null
                    },
                    set: (e, t) => {
                        u[e] = {
                            mts: i()(),
                            value: t
                        }
                    }
                },
                m = {
                    get: (e, t) => {
                        const n = localStorage.getItem(e);
                        try {
                            if (!n) return null;
                            const e = JSON.parse(n),
                                {
                                    value: r,
                                    mts: a = 0
                                } = e,
                                c = i()() - a;
                            return r && c < t ? r : null
                        } catch (r) {
                            return console.error("Error parsing cache " + e, r), null
                        }
                    },
                    set: (e, t) => {
                        localStorage.setItem(e, JSON.stringify({
                            value: t,
                            mts: i()()
                        }))
                    }
                },
                d = e => {
                    const t = e === o.MEMORY ? l : m;
                    return {
                        get: t.get,
                        set: t.set
                    }
                },
                E = 6e4,
                f = 3e4,
                g = {};
            async function M(e, t, n, s) {
                void 0 === e && (e = "BTC"), void 0 === t && (t = "USD"), void 0 === n && (n = E), void 0 === s && (s = o.MEMORY);
                const i = d(s);
                if (e === t) return 1;
                const u = "rates-" + (0, a.aG)(e, t),
                    l = i.get(u, n);
                if (l) return l;
                const m = await async function(e, t) {
                    try {
                        return (await (0, c.Ru)({
                            url: "/v2/calc/fx",
                            method: "POST",
                            data: {
                                ccy1: e,
                                ccy2: t
                            }
                        })).data[0]
                    } catch (a) {
                        if (console.error("Error on doing conversion", a), "USD" === e || "USD" === t) throw a;
                        const [s, i] = await Promise.all([(0, c.Ru)({
                            url: "/v2/calc/fx",
                            method: "POST",
                            data: {
                                ccy1: e,
                                ccy2: "USD"
                            }
                        }), (n = t, g[n] && Date.now() - g[n].lastUpdated < f || (g[n] = {
                            lastUpdated: Date.now(),
                            value: (0, c.Ru)({
                                url: "/v2/calc/fx",
                                method: "POST",
                                data: {
                                    ccy1: "USD",
                                    ccy2: n,
                                    fiat_fx: 1
                                }
                            })
                        }), g[n].value)]), o = s.data[0], u = i.data[0];
                        return (0, r.Jp)(o, u)
                    }
                    var n
                }(e, t);
                return i.set(u, m), m
            }
        },
        37141: function(e, t, n) {
            "use strict";
            var r = n(45697),
                a = n.n(r);
            a().shape({
                pathname: a().string
            })
        },
        82364: function(e, t, n) {
            "use strict";
            var r = n(27361),
                a = n.n(r);
            const c = {
                NAME: "Unknown",
                DEFAULT_PAIR: "BTCUSD",
                DEFAULT_CCY: "BTC",
                DEFAULT_LANDING_TICKER_CCY: "USD",
                DEFAULT_STAT_TICKER_CCY: "USD",
                LOGO_URL: "",
                PRICE_SIG_FIGS: 5,
                AMOUNT_DECIMALS: 8,
                PRICE_DECIMALS: 4,
                KEY_URL: "",
                SHOW_AUTH_PAGE: !1,
                HIDE_NON_IDEAL_STATE: !1,
                PAIR_SEPARATOR: ":"
            };
            t.Z = () => "undefined" != typeof window ? a()(window, "__platform", c) : {}
        },
        26767: function(e, t, n) {
            "use strict";
            n.d(t, {
                DE: function() {
                    return S
                },
                T4: function() {
                    return I
                },
                Z5: function() {
                    return v
                },
                _w: function() {
                    return L
                },
                fP: function() {
                    return T
                },
                jW: function() {
                    return p
                },
                og: function() {
                    return N
                },
                rl: function() {
                    return A
                },
                xH: function() {
                    return M
                },
                y2: function() {
                    return _
                }
            });
            var r = n(35161),
                a = n.n(r),
                c = n(63105),
                s = n.n(c),
                i = n(10240),
                o = n.n(i),
                u = n(44908),
                l = n.n(u),
                m = (n(3945), n(17204)),
                d = n.n(m),
                E = n(12180),
                f = n(67502);
            n(77970);
            const g = (0, n(82364).Z)(),
                M = ["USD", "EUR", "GBP", "JPY", "BTC", "ETH"],
                p = ["TRY", "BTC", "ETH"],
                I = e => (0, f.uf)({
                    number: e,
                    significantFigures: 5,
                    decimals: (0, f.hH)(e),
                    useGrouping: !0
                });

            function h(e) {
                return Math.min(6, (0, f.Bb)(e))
            }
            const N = e => (0, f.uf)({
                number: e,
                significantFigures: 5,
                decimals: h(e),
                useGrouping: !0
            });

            function S(e, t) {
                const n = s()(e, (e => o()(e, E.oT))),
                    r = a()(n, (e => (0, E.Oy)(e[t], !0)));
                return l()(r)
            }

            function v(e) {
                if ((0, E.Mu)(e)) return "/f/" + (0, E.Qm)(e);
                const t = function(e) {
                    void 0 === e && (e = g.DEFAULT_PAIR);
                    const t = (0, E.Gz)(e, !0),
                        n = (0, E.Oy)(e, !0);
                    return "" + t + g.PAIR_SEPARATOR + n
                }(e);
                return "/t/" + t
            }
            const L = d(),
                A = function(e, t) {
                    void 0 === t && (t = 2);
                    return (0, f.uf)({
                        number: e,
                        decimals: t
                    }) + "%"
                },
                T = e => {
                    const t = e < 1 ? 2 : 0;
                    return (0, f.uf)({
                        number: e,
                        decimals: t,
                        useGrouping: !0
                    })
                },
                _ = e => (0, f.uf)({
                    number: e
                })
        },
        89179: function(e, t, n) {
            var r = n(55639),
                a = n(40554),
                c = n(14841),
                s = n(79833),
                i = r.isFinite,
                o = Math.min;
            e.exports = function(e) {
                var t = Math[e];
                return function(e, n) {
                    if (e = c(e), (n = null == n ? 0 : o(a(n), 292)) && i(e)) {
                        var r = (s(e) + "e").split("e"),
                            u = t(r[0] + "e" + (+r[1] + n));
                        return +((r = (s(u) + "e").split("e"))[0] + "e" + (+r[1] - n))
                    }
                    return t(e)
                }
            }
        },
        57043: function(e, t, n) {
            var r = n(62488),
                a = n(21078),
                c = n(278),
                s = n(1469);
            e.exports = function() {
                var e = arguments.length;
                if (!e) return [];
                for (var t = Array(e - 1), n = arguments[0], i = e; i--;) t[i - 1] = arguments[i];
                return r(s(n) ? c(n) : [n], a(t, 1))
            }
        },
        17204: function(e) {
            e.exports = function(e) {
                for (var t = -1, n = null == e ? 0 : e.length, r = {}; ++t < n;) {
                    var a = e[t];
                    r[a[0]] = a[1]
                }
                return r
            }
        },
        59854: function(e, t, n) {
            var r = n(89179)("round");
            e.exports = r
        },
        89734: function(e, t, n) {
            var r = n(21078),
                a = n(82689),
                c = n(5976),
                s = n(16612),
                i = c((function(e, t) {
                    if (null == e) return [];
                    var n = t.length;
                    return n > 1 && s(e, t[0], t[1]) ? t = [] : n > 2 && s(t[0], t[1], t[2]) && (t = [t[0]]), a(e, r(t, 1), [])
                }));
            e.exports = i
        },
        59152: function(e, t) {
            "use strict";
            t.Z = "data:image/svg+xml;base64,PHN2ZyBkYXRhLWljb249ImRvdWJsZS1jYXJldC12ZXJ0aWNhbCIgd2lkdGg9IjE2IiBoZWlnaHQ9IjE2IiB2aWV3Qm94PSIwIDAgMTYgMTYiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTUgN2g2YTEuMDAzIDEuMDAzIDAgMDAuNzEtMS43MWwtMy0zQzguNTMgMi4xMSA4LjI4IDIgOCAycy0uNTMuMTEtLjcxLjI5bC0zIDNBMS4wMDMgMS4wMDMgMCAwMDUgN3ptNiAySDVhMS4wMDMgMS4wMDMgMCAwMC0uNzEgMS43MWwzIDNjLjE4LjE4LjQzLjI5LjcxLjI5cy41My0uMTEuNzEtLjI5bDMtM0ExLjAwMyAxLjAwMyAwIDAwMTEgOXoiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PC9wYXRoPjwvc3ZnPg=="
        },
        40872: function(e, t) {
            "use strict";
            t.Z = "data:image/svg+xml;base64,PHN2ZyBkYXRhLWljb249InNlYXJjaCIgd2lkdGg9IjE2IiBoZWlnaHQ9IjE2IiB2aWV3Qm94PSIwIDAgMTYgMTYiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTE1LjU1IDEzLjQzbC0yLjY3LTIuNjhhNi45NCA2Ljk0IDAgMDAxLjExLTMuNzZjMC0zLjg3LTMuMTMtNy03LTdzLTcgMy4xMy03IDcgMy4xMyA3IDcgN2MxLjM5IDAgMi42OC0uNDIgMy43Ni0xLjExbDIuNjggMi42N2ExLjQ5OCAxLjQ5OCAwIDEwMi4xMi0yLjEyem0tOC41Ni0xLjQ0Yy0yLjc2IDAtNS0yLjI0LTUtNXMyLjI0LTUgNS01IDUgMi4yNCA1IDUtMi4yNCA1LTUgNXoiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PC9wYXRoPjwvc3ZnPg=="
        }
    }
]);