"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [1964], {
        1964: (e, s, a) => {
            a.d(s, {
                Fm: () => I,
                U3: () => L,
                ZP: () => D
            });
            a(7733), a(4921), a(5347);
            var t = a(2979),
                r = a(7317),
                l = a(1786),
                i = a(7853),
                n = a(3014),
                d = a.n(n),
                c = a(4891),
                h = a(2901),
                o = a(11),
                m = a(8776),
                u = a(400),
                p = a(3304),
                _ = a(6954);
            const g = ({
                    data: e,
                    fields: s,
                    chartsUrl: a
                }) => (0, t.h)(t.HY, null, (0, t.h)("ul", {
                    class: "mp__small-fields-list"
                }, s.map((s => (0, t.h)("li", {
                    key: s.id
                }, (0, t.h)("div", {
                    class: "mp__small-fields-list-key"
                }, s.name, ":"), (0, t.h)("div", {
                    class: "mp__small-fields-list-key"
                }, (0, t.h)(p.Z, {
                    marketId: e.MarketId
                }, (a => `${a(s.id,e[s.id])}`))))))), (0, t.h)("iframe", {
                    className: "mp__chart",
                    style: "border: 0;",
                    scrolling: "no",
                    frameborder: "0",
                    marginheight: "0",
                    marginwidth: "0",
                    height: "353px",
                    width: "90%",
                    allowfullscreen: "",
                    src: `${a}&hideLeftSideToolbar=true&hideTopToolbar=true&marketId=${e.MarketId}`
                })),
                b = ["Product", "Bid", "Low", "ChangeInPercentage", "ChangeInPoints", "TickDate", "Offer", "Price", "High", "Change", "Decimals", "MinimumSpread", "MedianSpread"],
                S = ["Product", "FriendlyName"],
                N = ({
                    id: e,
                    value: s,
                    data: a
                }) => S.includes(e) ? (0, t.h)(u.Z, {
                    title: a.SEOName,
                    product: a.SEOName,
                    marketType: a.MarketType
                }, s || a[e]) : s || a[e],
                w = ({
                    id: e,
                    data: s
                }) => (0, t.h)(p.Z, {
                    marketId: s.MarketId
                }, (a => (0, t.h)(m.Z, {
                    variant: "solid",
                    numerical: a(e, s[e])
                }, (0, t.h)(N, {
                    id: e,
                    data: s,
                    value: a(e, s[e])
                })))),
                C = ({
                    id: e,
                    data: s
                }) => (0, t.h)(p.Z, {
                    marketId: s.MarketId
                }, (a => {
                    const r = a("Direction", s.Direction) === _.J.UP;
                    return (0, t.h)(m.Z, {
                        className: "mp__direction mp__direction--" + (r ? "up" : "down"),
                        variant: "solid",
                        numerical: a(e, s[e])
                    }, (0, t.h)(N, {
                        id: e,
                        data: s,
                        value: a(e, s[e])
                    }))
                })),
                f = ({
                    data: e,
                    fields: s
                }) => s.map((s => (0, t.h)("td", {
                    className: `mp__td mp__td--${s.id}`,
                    key: s.id
                }, (0, t.h)("span", {
                    className: "mp__value"
                }, "ChangeInPercentage" === s.id ? (0, t.h)(C, {
                    key: s.id,
                    id: s.id,
                    data: e
                }) : b.includes(s.id) ? (0, t.h)(w, {
                    key: s.id,
                    id: s.id,
                    data: e
                }) : (0, t.h)(N, {
                    key: s.id,
                    id: s.id,
                    data: e
                }))))),
                k = ({
                    fields: e
                }) => (0, t.h)("tr", null, e.map((e => (0, t.h)("td", {
                    key: e.id,
                    className: `mp__td mp__td--${e.id} mp__td--mock`
                }, (0, t.h)("span", {
                    className: "mp__value"
                })))), (0, t.h)("td", {
                    key: "toggle-details",
                    className: "mp__td mp__td--details mp__td--mock"
                }, (0, t.h)("span", {
                    className: "mp__value"
                }))),
                v = ({
                    fields: e,
                    item: s,
                    showDetails: a,
                    onShowDetailsClick: r,
                    chartsUrl: l,
                    isSimplified: i
                }) => (0, t.h)(t.HY, null, (0, t.h)("tr", {
                    className: "mp__row",
                    key: s.id
                }, (0, t.h)(f, {
                    key: s.name,
                    data: s,
                    fields: e
                }), !i && (0, t.h)("td", {
                    className: "mp__td mp__td--details"
                }, (0, t.h)("button", {
                    className: "mp__toggle-details " + (a ? "mp__toggle-details--off" : "mp__toggle-details--on"),
                    onClick: r,
                    "aria-label": "Show/Hide Details",
                    title: "Show/Hide Details"
                }))), !i && a && (0, t.h)("tr", {
                    key: `details(${s.id})`
                }, (0, t.h)("td", {
                    colSpan: e.length + 1
                }, (0, t.h)(g, {
                    data: s,
                    fields: e,
                    chartsUrl: l
                })))),
                y = ({
                    placeholder: e = null,
                    fields: s = [],
                    items: a = [],
                    toggleRow: r,
                    selectedRow: l,
                    chartsUrl: i,
                    isSimplified: n,
                    hasBottomBorder: c = !0
                } = {}) => {
                    const o = (0, h.gG)(),
                        m = null !== e ? Array(e).fill(null).map(((e, a) => (0, t.h)(k, {
                            fields: s,
                            key: a
                        }))) : null,
                        u = {
                            width: 100 / s.length + "%"
                        };
                    return (0, t.h)("table", {
                        className: d()("mp__table", !c && "mp__table--no-bottom-border")
                    }, (0, t.h)("thead", null, (0, t.h)("tr", {
                        className: "mp__row mp__row--background"
                    }), (0, t.h)("tr", {
                        className: "mp__row mp__row--heading"
                    }, s.map((e => (0, t.h)("th", {
                        className: `mp__heading mp__heading--${e.id}`,
                        key: e.id,
                        style: u
                    }, o(e.name)))), !n && (0, t.h)("td", {
                        className: "mp__heading mp__heading--details"
                    }))), (0, t.h)("tbody", null, a.map((e => (0, t.h)(v, {
                        fields: s,
                        item: e,
                        chartsUrl: i,
                        showDetails: l === e.id,
                        isSimplified: n,
                        onShowDetailsClick: () => {
                            r(l === e.id ? null : e)
                        }
                    }))), m))
                };
            var P = a(3276),
                T = a(5817),
                O = a(7730),
                E = a(3364),
                R = a(2464);
            const I = "ALL",
                L = e => {
                    const {
                        useNumericPagination: s,
                        watchlists: a,
                        fields: n,
                        tabs: c,
                        initialProduct: m,
                        initialMarket: u,
                        initialSelectedWatchlist: p,
                        desktopNumberOfItems: _,
                        mobileNumberOfItems: g,
                        chartsUrl: b,
                        siteId: S,
                        showPagination: N,
                        showFilters: w,
                        showTabs: C,
                        showSearch: f,
                        targetUrls: k,
                        isCondensed: v,
                        disableStreaming: L,
                        defaultProducts: D,
                        showOnlyDefaultProducts: A,
                        languageCode: U,
                        dropdownAssets: H,
                        isSimplified: G,
                        defaultSearchTerm: Z,
                        searchBoxOptions: x,
                        isGlobalInstrumentsSearch: B,
                        heading: J
                    } = (0, O.Z)(e), M = (0, h.gG)(), [W, F] = (0, r.eJ)(0), [Y, $] = (0, r.eJ)([]), [Q, V] = (0, r.eJ)(c ? c.find((({
                        id: e,
                        name: s,
                        productType: a
                    }) => e === u.Code && s === u.DisplayName)) || c[0] : {
                        id: u ? .Code || I,
                        name: u ? .DisplayName || I,
                        ProductType: m ? .Code || ""
                    }), [z, j] = (0, r.eJ)(p), [q, K] = (0, r.eJ)(Z), [X, ee] = (0, r.eJ)(null), [, {
                        innerWidth: se = window.innerWidth
                    }] = (0, i.Z)(), ae = se < 768 ? g : _;
                    (0, r.d4)((() => {
                        0 !== W && F(0)
                    }), [Q.name, z, q]);
                    const te = (0, r.Ye)((() => n.map((e => e.id))), [n]),
                        {
                            results: re,
                            status: le,
                            count: ie
                        } = (0, E.ZP)({
                            marketType: Q.id === I ? "" : Q.id,
                            productType: Q.id === I ? m.Code : Q.productType || m.Code,
                            requiredFields: te,
                            siteId: S,
                            defaultProducts: D,
                            showOnlyDefaultProducts: A,
                            languageCode: U
                        }, {
                            take: ae,
                            skip: W * ae,
                            searchTerm: q,
                            orderBy: z
                        });
                    (0, r.d4)((() => {
                        s || (W > 0 ? $([...Y, ...re]) : Y.length > 0 && $([]))
                    }), [W]);
                    const ne = le === l.Q.PROGRESS,
                        de = (0, r.Ye)((() => le === l.Q.PROGRESS ? Y : 0 === W ? re : [...Y, ...re]), [W, re, Y, le]),
                        ce = ie >= 0 ? ie - Math.min((W + 1) * ae, ie) : ae,
                        he = 0 === de.length && le === l.Q.SUCCESS,
                        oe = N && ce > 0 && le === l.Q.SUCCESS;
                    return (0, t.h)(o.Z.Provider, {
                        value: {
                            targetUrls: k,
                            disableStreaming: L
                        }
                    }, (0, t.h)("div", {
                        className: d()("market-prices__content", {
                            "market-prices--condensed": v,
                            "market-prices--simplified": G
                        })
                    }, (0, t.h)(T.Z, {
                        showTabs: C,
                        showFilters: w,
                        showSearch: f,
                        onTabChange: V,
                        onWatchlistChange: e => j(e === z ? null : e),
                        onChangeSearchTerm: K,
                        selectedWatchlist: z,
                        selectedTab: Q,
                        tabs: c,
                        watchlists: a,
                        dropdownAssets: H,
                        isGlobalInstrumentsSearch: B,
                        heading: J,
                        searchBoxOptions: { ...x,
                            SiteId: S
                        }
                    }), (0, t.h)("div", {
                        className: "market-prices__wrapper"
                    }, he ? M("No results found") : (0, t.h)(y, {
                        items: ne && 0 === W ? [] : de,
                        fields: n,
                        selectedRow: X,
                        toggleRow: e => ee(e && e.id ? e.id : null),
                        chartsUrl: b,
                        isSimplified: G,
                        hasBottomBorder: oe,
                        placeholder: ne ? Math.min(ae, ce) : null
                    }), oe && !s && (0, t.h)("button", {
                        className: "mp__show-all",
                        type: "button",
                        onClick: () => F(W + 1)
                    }, M("SHOW_MORE")), N && s && ae > 0 && (0, t.h)(R.t, {
                        onPageSelect: F,
                        count: ie,
                        take: ae,
                        page: W,
                        maxVisible: 5,
                        disable: ne
                    }))), !G && (0, t.h)(P.d, null))
                },
                D = new c.PreactWidget({
                    name: "rates-table",
                    component: L
                })
        },
        5817: (e, s, a) => {
            a.d(s, {
                Z: () => v
            });
            var t = a(2979),
                r = a(5977),
                l = (a(5347), a(7317)),
                i = a(2901),
                n = a(1987);
            const d = ({
                    tabs: e,
                    onTabClick: s,
                    selected: a,
                    variant: r
                }) => {
                    const d = (0, i.gG)(),
                        c = (0, l.sO)(null),
                        h = (0, l.sO)(null);
                    return (0, l.d4)((() => {
                        if (!c ? .current || !h ? .current) return;
                        const e = () => (0, n.H)(c.current, h.current);
                        return window.addEventListener("resize", e), c.current.addEventListener("scroll", e), e(), () => {
                            window.removeEventListener("resize", e), c.current.removeEventListener("scroll", e)
                        }
                    }), [c.current, h.current]), (0, t.h)("div", {
                        className: "pricing-tabs-wrapper",
                        ref: h
                    }, (0, t.h)("div", {
                        className: `pricing-tabs pricing-tabs--${r}`,
                        ref: c
                    }, e.map((e => (0, t.h)("button", {
                        className: "pricing-tabs__tab " + (e.id === a ? .id && e ? .name === a.name ? "pricing-tabs__tab--selected" : ""),
                        onClick: () => s(e),
                        type: "button"
                    }, d(e.name))))))
                },
                c = e => (0, t.h)(d, (0, r.Z)({}, e, {
                    variant: "market-tabs"
                })),
                h = e => (0, t.h)(d, (0, r.Z)({}, e, {
                    variant: "sorting-tabs"
                }));
            var o = a(7033);
            const m = ({
                onChange: e
            }) => {
                const s = (0, i.gG)(),
                    [a, r] = (0, l.eJ)(""),
                    {
                        debouncedValue: n
                    } = (0, o.N)(a, 300);
                return (0, l.d4)((() => {
                    e(n)
                }), [n, e]), (0, t.h)("span", {
                    className: "pricing-search-bar"
                }, (0, t.h)("div", {
                    className: "search-instruments-bar__image"
                }), (0, t.h)("input", {
                    className: "pricing-search-bar__input",
                    onChange: e => r(e.target ? .value),
                    type: "search",
                    title: s("SEARCH_PLACEHOLDER"),
                    "aria-label": s("SEARCH_PLACEHOLDER"),
                    placeholder: s("SEARCH_PLACEHOLDER")
                }))
            };
            a(7733), a(4921), a(5821);
            const u = ({
                tabs: e,
                onTabClick: s,
                selected: a
            }) => {
                const r = jQuery,
                    n = (0, l.sO)(null),
                    d = (0, i.gG)(),
                    c = (0, l.Ye)((() => e.map((e => ({
                        id: e.id,
                        text: d(e.name),
                        selected: a ? .id === e.id && a ? .name === e.name
                    })))), [JSON.stringify(e)]);
                return (0, l.d4)((() => {
                    const a = r(n.current);
                    return a.select2({
                        minimumResultsForSearch: -1,
                        data: c,
                        theme: "forms-select",
                        width: "100%"
                    }), a.on("change", (a => s(e.find((e => e.id === a.target.value))))), () => a.select2("destroy")
                }), []), (0, t.h)("div", {
                    className: "pricing-assets"
                }, (0, t.h)("label", {
                    htmlFor: "pricing-assets-select",
                    className: "pricing-assets__wrapper"
                }, (0, t.h)("span", {
                    className: "pricing-assets__label"
                }, d("ASSET_CLASS"), ":"), (0, t.h)("select", {
                    ref: n,
                    className: "pricing-assets__dropdown",
                    id: "pricing-assets-select"
                })))
            };
            var p = a(3014),
                _ = a.n(p),
                g = a(1786),
                b = a(8273);
            const S = e => e ? .replace(/ /g, "").length > 2;
            var N = a(9187);
            const w = (e, s) => {
                    const a = a => {
                        a.keyCode === e && (a.preventDefault(), a.stopPropagation(), s())
                    };
                    (0, l.d4)((() => {
                        if (s) return document.addEventListener("keydown", a), () => {
                            document.removeEventListener("keydown", a)
                        }
                    }), [e, s])
                },
                C = () => (0, t.h)("div", {
                    className: "search-instruments-bar__loaders"
                }, (0, t.h)("span", {
                    className: "search-instruments-bar__loader"
                }), (0, t.h)("span", {
                    className: "search-instruments-bar__loader"
                }), (0, t.h)("span", {
                    className: "search-instruments-bar__loader"
                }), (0, t.h)("span", {
                    className: "search-instruments-bar__loader"
                })),
                f = ({
                    IndividualResults: e,
                    ClusterResults: s,
                    ViewAllUrl: a,
                    ResultsTotalCount: r,
                    status: n
                }) => {
                    const d = (0, i.gG)(),
                        {
                            refs: c
                        } = (({
                            itemsLength: e = 0
                        }) => {
                            const s = (0, l.sO)([]),
                                [a, t] = (0, l.eJ)(-1),
                                r = a === e - 1,
                                i = 0 === a,
                                n = () => d(r ? 0 : a + 1),
                                d = e => t(e);
                            return (0, l.d4)((() => {
                                s.current = s.current.slice(0, e), t(-1)
                            }), [e]), (0, l.d4)((() => {
                                -1 !== a && s.current[a] ? .focus()
                            }), [a]), w(40, n), w(9, n), w(38, (() => d(i || -1 === a ? e - 1 : a - 1))), {
                                refs: s
                            }
                        })({
                            itemsLength: (e ? .length ? ? 0) + (s ? .length ? ? 0)
                        });
                    return (0, t.h)("div", {
                        className: "search-instruments-bar__results-wrapper"
                    }, n === g.Q.SUCCESS && !e ? .length && (0, t.h)("span", {
                        className: "search-instruments-bar__no-results"
                    }, d("No search results")), n === g.Q.PROGRESS ? (0, t.h)(C, null) : e && e.length > 0 && (0, t.h)("ul", {
                        className: "search-instruments-bar__list search-instruments-bar__list--individuals"
                    }, e.map((({
                        PageSingleUrl: e,
                        PageTitle: s,
                        PageCluster: a
                    }, r) => (0, t.h)("li", {
                        key: e,
                        className: "search-instruments-bar__list-element"
                    }, (0, t.h)("a", {
                        href: e,
                        className: "search-instruments-bar__list-link",
                        ref: e => c.current[r] = e
                    }, (0, t.h)("span", {
                        className: "search-instruments-bar__list-title"
                    }, s)))))), (0, t.h)("hr", {
                        className: "search-instruments-bar__hr"
                    }), n === g.Q.PROGRESS ? (0, t.h)(C, null) : s && s.length > 0 && (0, t.h)("ul", {
                        className: "search-instruments-bar__list search-instruments-bar__list--clusters"
                    }, s ? .map((({
                        SubclusterName: s,
                        SubclusterTabUrl: a,
                        SubclusterResultsCount: r
                    }, l) => (0, t.h)("li", {
                        key: a,
                        className: "search-instruments-bar__list-element"
                    }, (0, t.h)("a", {
                        href: a,
                        className: "search-instruments-bar__list-link",
                        ref: s => c.current[l + (e ? .length ? ? 0)] = s
                    }, (0, t.h)("span", {
                        className: "search-instruments-bar__list-title"
                    }, s), (0, t.h)("span", {
                        className: "search-instruments-bar__list-count"
                    }, r, " ", d("Results"))))))), (0, t.h)("a", {
                        href: a,
                        className: "search-instruments-bar__view-all"
                    }, d("View All"), " (", r ? ? 0, ")"))
                },
                k = ({
                    searchBoxOptions: e
                }) => {
                    const s = (0, l.sO)(null),
                        a = (0, i.gG)(),
                        [r, n] = (0, l.eJ)(""),
                        {
                            debouncedValue: d
                        } = (0, o.N)(r, 300),
                        [c, h] = (0, l.eJ)(!1),
                        {
                            data: m,
                            status: u
                        } = ((e = "", s) => {
                            const a = (0, l.Ye)((() => ({ ...s,
                                    SearchTerm: e
                                })), [e]),
                                [t, r] = (0, g.Z)(b.Z.SITE_SEARCH.GET_SUGGESTIONS, a, null, !S(e));
                            return {
                                data: t,
                                status: r
                            }
                        })(d, e),
                        {
                            IndividualResults: p,
                            ClusterResults: w,
                            ViewAllUrl: C,
                            ResultsTotalCount: k
                        } = m;
                    (0, l.d4)((() => {
                        h(S(d))
                    }), [d]);
                    const v = (0, l.I4)((() => {
                        h(!1), n("")
                    }), []);
                    return (0, N.e)(v), (0, t.h)("div", {
                        className: _()(["search-instruments-bar", {
                            active: c
                        }])
                    }, (0, t.h)("div", {
                        className: "search-instruments-bar__input-wrapper"
                    }, (0, t.h)("div", {
                        className: "search-instruments-bar__image"
                    }), (0, t.h)("input", {
                        className: "search-instruments-bar__input",
                        onChange: e => n(e.target ? .value),
                        type: "search",
                        placeholder: a("SEARCH_PLACEHOLDER"),
                        value: r,
                        ref: s,
                        "aria-label": a("SEARCH_PLACEHOLDER"),
                        title: a("SEARCH_PLACEHOLDER")
                    }), c && (0, t.h)("button", {
                        type: "button",
                        className: "search-instruments-bar__close",
                        onClick: v,
                        "aria-label": "Close",
                        title: "Close"
                    }, a("Close search"))), c && (0, t.h)(f, {
                        ClusterResults: w,
                        IndividualResults: p,
                        ResultsTotalCount: k,
                        ViewAllUrl: C,
                        status: u
                    }))
                },
                v = ({
                    showTabs: e,
                    showFilters: s,
                    showSearch: a,
                    selectedWatchlist: r,
                    watchlists: l,
                    onWatchlistChange: n,
                    selectedTab: d,
                    tabs: o,
                    onTabChange: p,
                    onChangeSearchTerm: _,
                    dropdownAssets: g,
                    searchBoxOptions: b,
                    isGlobalInstrumentsSearch: S,
                    heading: N
                }) => {
                    const w = (0, i.gG)(),
                        C = s && l ? .length > 0,
                        f = g ? u : c;
                    return (0, t.h)(t.HY, null, e && o ? .length > 0 && (0, t.h)(f, {
                        onTabClick: p,
                        selected: d,
                        tabs: o
                    }), C || a ? (0, t.h)("div", {
                        className: "pricing-top-bar"
                    }, N && (0, t.h)("h3", {
                        className: "pricing-top-bar__heading"
                    }, N), a && (S ? (0, t.h)(k, {
                        searchBoxOptions: b
                    }) : (0, t.h)(m, {
                        onChange: _
                    })), C ? (0, t.h)(t.HY, null, (0, t.h)("span", {
                        className: "pricing-top-bar__sort-label"
                    }, w("SORT_BY"), ":"), (0, t.h)(h, {
                        onTabClick: n,
                        selected: r,
                        tabs: l
                    })) : null) : null)
                }
        },
        3276: (e, s, a) => {
            a.d(s, {
                d: () => n
            });
            var t = a(2979),
                r = a(7317),
                l = a(6911),
                i = a(2901);
            const n = () => {
                const e = (0, i.gG)(),
                    s = (0, l.z8)(),
                    [a, n] = (0, r.eJ)();
                return (0, r.d4)((() => {
                    n(new Date)
                }), [s]), (0, r.Ye)((() => (0, t.h)("span", {
                    class: "last-tick-text"
                }, a ? `${e("Live (indicative) updated:")} ${a.toLocaleTimeString()}` : null)), [a])
            }
        },
        7730: (e, s, a) => {
            a.d(s, {
                Z: () => n
            });
            a(7733), a(5385);
            var t = a(7317);
            const r = e => ({
                    id: "ProductName" === e.Name ? "Product" : e.Name,
                    name: e.Label
                }),
                l = e => ({
                    id: e.Code,
                    name: e.DisplayName,
                    productType: e.ProductType
                }),
                i = e => ({
                    id: e.Name,
                    name: e.DisplayName
                }),
                n = ({
                    settings: e = {},
                    initialSelectedWatchlist: s = null,
                    useNumericPagination: a = !1,
                    showPagination: n = !0,
                    showFilters: d = !0,
                    showTabs: c = !0,
                    showSearch: h = !0,
                    dropdownAssets: o = !1,
                    isSimplified: m = !1,
                    desktopNumberOfItems: u = 10,
                    mobileNumberOfItems: p = 6,
                    searchTerm: _ = "",
                    headingLevel: g = "h3"
                } = {}) => (0, t.Ye)((() => {
                    return {
                        useNumericPagination: a,
                        showPagination: n,
                        showFilters: d,
                        showTabs: c,
                        showSearch: h,
                        desktopNumberOfItems: u,
                        mobileNumberOfItems: p,
                        dropdownAssets: o,
                        isSimplified: m,
                        fields: e.Fields ? .map(r),
                        tabs: e.Tabs ? .map(l),
                        watchlists: e.Watchlists ? .map(i),
                        initialMarket: e.MarketType,
                        initialProduct: e.ProductType,
                        initialSelectedWatchlist: s,
                        targetUrls: (t = e.Urls || {}, Object.keys(t).reduce(((e, s) => (e[s.toLowerCase()] = t[s], e)), {})),
                        isCondensed: e.IsCondensed,
                        chartsUrl: e.ChartsUrl,
                        siteId: e.SiteId,
                        disableStreaming: e.DisableStreaming,
                        streamUrl: e.StreamUrl,
                        defaultProducts: e.DefaultProducts,
                        showOnlyDefaultProducts: e.ShowOnlyDefaultProducts,
                        languageCode: e.LanguageCode,
                        defaultSearchTerm: _,
                        searchBoxOptions: e.SearchBoxOptions,
                        isGlobalInstrumentsSearch: e.IsGlobalInstrumentsSearch,
                        heading: e.Heading,
                        headingLevel: g
                    };
                    var t
                }), [])
        }
    }
]);