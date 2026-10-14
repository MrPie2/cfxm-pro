"use strict";
(self.webpackChunkbfx_ui_public = self.webpackChunkbfx_ui_public || []).push([
    [4665], {
        25850: function(e, t, n) {
            n.d(t, {
                Z: function() {
                    return d
                }
            });
            var a = n(67294),
                i = (n(52628), n(82250)),
                l = n(98371);
            const r = "top",
                s = "right",
                c = "bottom",
                o = "left",
                m = e => {
                    const {
                        title: t,
                        subtitle: n,
                        description: m,
                        contentType: d,
                        imgSrc: u,
                        imgAlt: _,
                        imgWidth: g,
                        marginRight: p,
                        link: k,
                        textLink: y,
                        subLink: h,
                        textSubLink: v,
                        hasIcon: E,
                        imgPosition: b,
                        leftAlignLink: f
                    } = e, w = u ? a.createElement("img", {
                        src: u,
                        alt: _,
                        style: {
                            minWidth: g,
                            width: g,
                            height: g,
                            marginRight: p
                        }
                    }) : null;
                    return a.createElement("div", {
                        className: "box"
                    }, a.createElement(l.X2, null, b === o && w, a.createElement(l.sg, null, b === r && w, t && a.createElement("h1", null, t), n && a.createElement("div", {
                        className: "subtitle"
                    }, a.createElement("h2", null, n)), m && "list" === d ? m : a.createElement("div", {
                        className: "description"
                    }, a.createElement("p", null, m)), k && a.createElement(i.Z, {
                        className: "read_more",
                        to: k,
                        text: y,
                        hasIcon: E,
                        leftAlign: f
                    }), h && a.createElement(i.Z, {
                        className: "read_more",
                        to: h,
                        text: v,
                        hasIcon: E,
                        leftAlign: f
                    }), b === c && w), b === s && w))
                };
            m.defaultProps = {
                title: "",
                subtitle: "",
                contentType: "string",
                description: "",
                imgAlt: "",
                imgSrc: "",
                imgWidth: 100,
                marginRight: "0.625rem",
                imgPosition: "top",
                link: "",
                textLink: "",
                subLink: "",
                textSubLink: "",
                hasIcon: !1,
                leftAlignLink: !1
            };
            var d = m
        },
        55915: function(e, t, n) {
            n.d(t, {
                Z: function() {
                    return g
                }
            });
            var a = n(67294),
                i = n(68270),
                l = n(75900),
                r = n.n(l),
                s = n(61757),
                c = n(17005),
                o = n(87274),
                m = n(24113),
                d = n(13746);
            const u = () => {
                    const {
                        t: e
                    } = (0, i.$)("common");
                    return a.createElement(a.Fragment, null, a.createElement("p", null, e("scan_to_download")), a.createElement("img", {
                        src: (0, m.GV)(s.VJ),
                        alt: "google app store",
                        height: "130",
                        className: "app_link_img"
                    }))
                },
                _ = e => {
                    let {
                        mobileOnly: t = !0
                    } = e;
                    return a.createElement("div", {
                        className: r()("app_links", {
                            "mobile-only": t
                        })
                    }, a.createElement(c.Z, {
                        to: o.Wu
                    }, a.createElement("img", {
                        src: "/images/download-app-store.svg",
                        alt: "apple store",
                        className: "app_link_img app_store"
                    })), a.createElement(c.Z, {
                        to: o._y
                    }, a.createElement("img", {
                        src: "/images/download-google-play.svg",
                        alt: "google app store",
                        className: "app_link_img app_store"
                    })), a.createElement(d.Z, {
                        className: "qr-code",
                        popoverClassName: "qr-code-popover",
                        position: d.L.TOP,
                        content: a.createElement(u, null)
                    }, a.createElement("img", {
                        src: "/images/download-qr.svg",
                        alt: "google app store",
                        className: "app_link_img"
                    })))
                };
            _.defaultProps = {
                mobileOnly: !0
            };
            var g = _
        },
        82250: function(e, t, n) {
            n.d(t, {
                Z: function() {
                    return d
                }
            });
            var a = n(67294),
                i = n(75900),
                l = n.n(i),
                r = n(98371),
                s = n(17005),
                c = n(26330);
            const o = e => ({
                    width: e ? "auto" : "40%",
                    margin: e ? "0.5rem 0" : "0.5rem 0 0.5rem auto"
                }),
                m = e => {
                    let {
                        to: t,
                        text: n,
                        hasIcon: i,
                        className: m,
                        leftAlign: d
                    } = e;
                    return a.createElement(r.X2, {
                        className: l()("link_row", m),
                        style: o(d)
                    }, a.createElement(s.Z, {
                        to: t
                    }, i && a.createElement(c.Z, {
                        direction: "right"
                    }), n))
                };
            m.defaultProps = {
                hasIcon: !0,
                className: "",
                leftAlign: !1
            };
            var d = m
        },
        85514: function(e, t, n) {
            n.d(t, {
                Z: function() {
                    return s
                }
            });
            var a = n(67294),
                i = n(75900),
                l = n.n(i);
            const r = e => {
                let {
                    disabled: t,
                    checked: n,
                    onChange: i
                } = e;
                return a.createElement("button", {
                    className: l()("switch-input", {
                        "switch-input__checked": n
                    }),
                    onClick: t && i ? void 0 : () => i(!n),
                    disabled: t,
                    type: "button"
                }, a.createElement("span", {
                    className: "switch-input__lever"
                }, a.createElement("span", {
                    className: "switch-input__thumb"
                })))
            };
            r.defaultProps = {
                disabled: !1,
                checked: !1,
                onChange: void 0
            };
            var s = r
        },
        78077: function(e, t, n) {
            n.r(t), n.d(t, {
                Head: function() {
                    return Qe.F
                },
                default: function() {
                    return Ge
                }
            });
            var a = n(67294),
                i = n(68270),
                l = n(12076),
                r = n(54333),
                s = n(34688),
                c = n(32603),
                o = n(35161),
                m = n.n(o),
                d = n(63105),
                u = n.n(d),
                _ = n(25850),
                g = n(82250),
                p = n(87274);
            const k = [{
                    name: "exchange",
                    show: !0
                }, {
                    name: "margin_funding",
                    show: (0, s.QT)(c.$$.FUNDING)
                }, {
                    name: "margin_trading",
                    show: (0, s.QT)(c.$$.MARGIN_TRADING)
                }, {
                    name: "order_type",
                    show: !0
                }, {
                    name: "customizable_interface",
                    show: !0
                }, {
                    name: "security",
                    show: !0
                }],
                y = m()(u()(k, (e => e.show)), (e => e.name)),
                h = e => {
                    let {
                        imgPosition: t,
                        leftAlignLink: n
                    } = e;
                    const {
                        t: l
                    } = (0, i.$)("homepage");
                    return a.createElement(a.Fragment, null, m()(y, (e => a.createElement(_.Z, {
                        key: e,
                        imgAlt: e,
                        imgWidth: 120,
                        imgPosition: t,
                        title: l(e + "_title"),
                        imgSrc: "/images/icon-" + e + ".png",
                        description: l(e + "_description"),
                        leftAlignLink: n
                    }))))
                };
            h.defaultProps = {
                leftAlignLink: !1,
                imgPosition: p.Dq
            };
            var v = () => {
                    const {
                        t: e
                    } = (0, i.$)("homepage");
                    return a.createElement("section", {
                        className: "features dark"
                    }, a.createElement("div", {
                        className: "content content_wrapper"
                    }, a.createElement("div", null, a.createElement("div", {
                        className: "lp_title"
                    }, e("features_title")), a.createElement("div", {
                        className: "lp_subtitle"
                    }, e("features_subtitle"))), a.createElement("div", {
                        className: "features-grid visible-mobile"
                    }, a.createElement(h, {
                        leftAlignLink: !0
                    })), a.createElement("div", {
                        className: "features-grid visible-desktop"
                    }, a.createElement(h, {
                        imgPosition: p.v9
                    })), a.createElement(g.Z, {
                        className: "read_more",
                        to: "/features",
                        text: e("features_read_more"),
                        hasIcon: !0,
                        leftAlign: !0
                    })))
                },
                E = n(34531);
            const b = [
                ["connectivity", "/pro"],
                ["chart", E.HY + "/t?demo=true"],
                ["corporate", "/features"],
                ["api", "http://docs.bitfinex.com/"]
            ];
            var f = () => {
                    const {
                        t: e
                    } = (0, i.$)("homepage");
                    return a.createElement("section", {
                        className: "advanced blue"
                    }, a.createElement("div", {
                        className: "content content_wrapper"
                    }, a.createElement("div", {
                        className: "title_row"
                    }, a.createElement("div", {
                        className: "lp_title"
                    }, e("advanced_title_main")), a.createElement("div", {
                        className: "lp_subtitle"
                    }, e("advanced_subtitle_main"))), a.createElement("div", {
                        className: "advanced-grid grid"
                    }, m()(b, (t => {
                        const [n, i] = t;
                        return a.createElement(_.Z, {
                            hasIcon: !0,
                            key: n,
                            link: i,
                            imgAlt: e("advanced_title_" + n),
                            title: e("advanced_title_" + n),
                            textLink: e("advanced_link_" + n),
                            description: e("advanced_desc_" + n),
                            leftAlignLink: !0
                        })
                    })))))
                },
                w = n(41609),
                N = n.n(w),
                x = n(1805),
                Z = n(27361),
                A = n.n(Z),
                K = n(8804),
                S = n.n(K),
                I = n(69572),
                L = n.n(I),
                P = n(84238),
                C = n.n(P),
                $ = n(13311),
                z = n.n($),
                T = n(31320),
                U = n.n(T),
                D = n(75900),
                O = n.n(D),
                F = n(49383),
                R = n.n(F),
                M = n(17005),
                j = n(98371);
            const W = e => {
                let {
                    date: t,
                    href: n,
                    title: l,
                    img: r,
                    html: s,
                    onMouseOver: c,
                    isActive: o
                } = e;
                const {
                    t: m
                } = (0, i.$)("homepage");
                return a.createElement("div", {
                    className: O()("post_link", {
                        active: o
                    }),
                    onFocus: c,
                    onMouseOver: c
                }, a.createElement(M.Z, {
                    to: n
                }, a.createElement("img", {
                    className: "hide_lg hide_xl hide_xxl",
                    src: r,
                    alt: l
                }), a.createElement(j.sg, null, a.createElement("h2", {
                    className: "post_link__title"
                }, R().decode(l)), a.createElement(j.X2, null, a.createElement("small", {
                    className: "post_link__date"
                }, new Date(t).toDateString())), a.createElement("div", {
                    className: "description hide_lg hide_xl hide_xxl",
                    dangerouslySetInnerHTML: {
                        __html: s
                    }
                }))), a.createElement("div", {
                    className: "hide_lg hide_xl hide_xxl"
                }, a.createElement(g.Z, {
                    className: "read_more",
                    to: n,
                    text: m("read_more"),
                    hasIcon: !0,
                    leftAlign: !0
                })))
            };
            W.defaultProps = {
                date: "",
                html: "<p />",
                img: "/images/post.png",
                onMouseOver: () => {},
                isActive: !1
            };
            var q = W,
                H = n(45697),
                Q = n.n(H);
            Q().shape({
                label: Q().string,
                date: Q().string,
                href: Q().string,
                title: Q().string,
                subtitle: Q().string
            }), Q().node;
            const G = e => {
                let {
                    data: t,
                    title: n,
                    subtitle: l,
                    className: r,
                    rows: s
                } = e;
                const {
                    t: c
                } = (0, i.$)("homepage"), {
                    0: o,
                    1: d
                } = (0, a.useState)(), u = l || "subtitle", _ = L()(t, s || C()(t)), k = S()(_), y = o || k, h = S()(A()(y, "_embedded.wp:featuredmedia")), v = A()(h, "media_details.sizes.latest_post_boxes.source_url", "/images/post.png"), E = A()(y, "excerpt.rendered", ""), b = A()(y, "title.rendered", ""), f = e => d(z()(t, (t => t.id === e)));
                return a.createElement("section", {
                    className: "news news_list " + r
                }, a.createElement("div", {
                    className: "content content_wrapper"
                }, a.createElement(j.sg, {
                    className: "content_title"
                }, n && a.createElement("div", {
                    className: "lp_title"
                }, c("news_title")), a.createElement("div", {
                    className: "lp_subtitle"
                }, c(u))), a.createElement("div", {
                    className: "main_content"
                }, a.createElement("div", {
                    className: "hide_xs hide_sm hide_md lastest_post"
                }, a.createElement("img", {
                    src: v,
                    alt: b
                }), a.createElement("div", {
                    className: "description",
                    dangerouslySetInnerHTML: {
                        __html: E
                    }
                })), a.createElement("div", null, m()(_, (e => {
                    const t = A()(e, "id"),
                        n = A()(e, "date_gmt"),
                        i = S()(A()(e, "_embedded.wp:featuredmedia")),
                        l = A()(i, "media_details.sizes.latest_post_boxes.source_url", "/images/post.png"),
                        r = U().sanitize(A()(e, "title.rendered", ""), {
                            ALLOWED_TAGS: []
                        }),
                        s = A()(e, "excerpt.rendered", ""),
                        c = e.link || "/",
                        m = A()(k, "id"),
                        d = A()(o, "id") === t || t === m && !o;
                    return a.createElement(q, {
                        isActive: d,
                        onFocus: () => {
                            f(t)
                        },
                        onMouseOver: () => {
                            f(t)
                        },
                        key: r + "_" + n + "_" + c,
                        date: n,
                        html: s,
                        href: c,
                        title: r,
                        img: l
                    })
                })))), a.createElement("div", {
                    className: "hide_xs hide_sm hide_md"
                }, a.createElement(g.Z, {
                    className: "blog_link",
                    to: p.Ql,
                    hasIcon: !0,
                    text: c("news_read_more"),
                    leftAlign: !0
                }))))
            };
            G.defaultProps = {
                rows: void 0,
                className: "",
                title: ""
            };
            var V = G,
                X = e => {
                    const {
                        0: t,
                        1: n
                    } = (0, a.useState)([]);
                    return (0, a.useEffect)((() => {
                        (async () => {
                            try {
                                const e = await fetch(p.Vg).then((e => e.json()));
                                n(e)
                            } catch (e) {
                                x.kg.error(e)
                            }
                        })()
                    }), []), N()(t) ? null : a.createElement(V, Object.assign({
                        data: t
                    }, e))
                };
            const B = (0, E.SF)();
            var J = () => {
                    const {
                        t: e
                    } = (0, i.$)("homepage");
                    return a.createElement("section", {
                        className: "leo blue"
                    }, a.createElement("div", {
                        className: "content content_wrapper"
                    }, a.createElement("div", {
                        className: "main_content"
                    }, a.createElement("div", {
                        className: "lp_title"
                    }, e("leo_title")), a.createElement("div", {
                        className: "lp_subtitle"
                    }, e("leo_subtitle")), a.createElement("p", {
                        className: "description large"
                    }, e("leo_description")), a.createElement("div", {
                        className: "mobile-img-box"
                    }, a.createElement("img", {
                        src: "/images/leo.png",
                        alt: "UNUS SED LEO"
                    })), a.createElement(g.Z, {
                        className: "leo_link",
                        to: B.leoTransparencyUrl,
                        text: e("leo_dashboard_link"),
                        hasIcon: !0,
                        leftAlign: !0
                    }))))
                },
                Y = n(55915);
            var ee = () => {
                    const {
                        t: e
                    } = (0, i.$)("homepage");
                    return a.createElement("section", {
                        className: "our_app dark"
                    }, a.createElement("div", {
                        className: "content content_wrapper"
                    }, a.createElement("div", {
                        className: "main_content"
                    }, a.createElement("div", null, a.createElement("div", {
                        className: "lp_title"
                    }, e("our_app_title")), a.createElement("div", {
                        className: "lp_subtitle"
                    }, e("our_app_subtitle"))), a.createElement("p", {
                        className: "description large"
                    }, e("our_app_description")), a.createElement(g.Z, {
                        hasIcon: !0,
                        to: "/mobile-trading",
                        text: e("our_app_link"),
                        className: "download_link",
                        leftAlign: !0
                    }), a.createElement(Y.Z, null)), a.createElement("div", {
                        className: "image_container"
                    }, a.createElement("img", {
                        src: "/images/mobile.png",
                        alt: "Our App"
                    }))))
                },
                te = n(78344),
                ne = n(29499),
                ae = n(32203),
                ie = n(18721),
                le = n.n(ie),
                re = n(16156),
                se = n(72998),
                ce = n(42043),
                oe = n(93433),
                me = n(89734),
                de = n.n(me);
            const ue = "1_hour",
                _e = "local_storage",
                ge = "1_month",
                pe = "2_months",
                ke = "3_months",
                ye = "session",
                he = "1_year",
                ve = "2_years",
                Ee = e => de()(e, "key"),
                be = Ee([{
                    key: "__cfduid"
                }, {
                    key: "_cflb"
                }]),
                fe = Ee([{
                    key: "tv.logger.loglevel",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.symboledit.dialog_last_entry",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tvlocalstorage.available",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.ChartFavoriteDrawingToolbarWidget.visible",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tv.logger.logHighRate",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.BarsMarksContainer.visibile",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.chartproperties",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.chartproperties.mainSeriesProperties",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.chart.lastUsedTimeBasedResolution",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.hint.startFocusedZoom",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.IntervalWidget.menu.viewState",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.properties_dialog.active_tab.chart",
                    i18nKey: "trading_view",
                    duration: _e
                }, {
                    key: "tradingview.symbolWatermark",
                    i18nKey: "trading_view",
                    duration: _e
                }]),
                we = Ee([{
                    key: "__zlcmid",
                    i18nKey: "zendesk_chat",
                    duration: he
                }, {
                    key: "__zlcprivacy",
                    i18nKey: "zendesk_chat",
                    duration: he
                }, {
                    key: "__zlcstore",
                    i18nKey: "zendesk_chat",
                    duration: _e
                }, {
                    key: "ZD-suid",
                    i18nKey: "zendesk_chat",
                    duration: _e
                }, {
                    key: "ZD-buid",
                    i18nKey: "zendesk_chat",
                    duration: _e
                }, {
                    key: "ZD-store",
                    i18nKey: "zendesk_chat",
                    duration: _e
                }]),
                Ne = Ee([{
                    key: "bfx_cookie_banner_data",
                    duration: ge,
                    secure: !0
                }, {
                    key: "bfx_cookie_banner_timestamp",
                    duration: ge,
                    secure: !0
                }, {
                    key: "bfx_cookies_country_rule",
                    duration: ye
                }, {
                    key: "__bfx_board_session"
                }, {
                    key: "last_prohibited_warn",
                    secure: !0
                }, {
                    key: "ask_if_prohibited",
                    secure: !0
                }, {
                    key: "bfx_notify_restricted_level",
                    i18nKey: "ask_if_prohibited"
                }, {
                    key: "ask_if_us_resident",
                    duration: ye,
                    secure: !0
                }, {
                    key: "bfxInstanceId",
                    duration: ye,
                    secure: !0
                }, {
                    key: "locale",
                    secure: !0
                }, {
                    key: "auth",
                    secure: !0
                }, {
                    key: "user_token",
                    secure: !0
                }, {
                    key: "paginationLimit",
                    secure: !0
                }, {
                    key: "fontSize",
                    secure: !0
                }, {
                    key: "i18nextLng",
                    secure: !0
                }, {
                    key: "columnsVisibility",
                    secure: !0
                }, {
                    key: "persist:bfx",
                    i18nKey: "persist_bfx",
                    secure: !0
                }, {
                    key: "symbolMap",
                    secure: !0
                }, {
                    key: "pairMap",
                    secure: !0
                }, {
                    key: "__bfx_token",
                    persistency: "Session",
                    secure: !0
                }, {
                    key: "__bfx_token_timestamp",
                    secure: !0
                }, {
                    key: "tokenSalesAuthToken",
                    secure: !0
                }, {
                    key: "new_login_session",
                    secure: !0
                }, {
                    key: "theme",
                    secure: !0
                }, {
                    key: "bfx_force_login",
                    secure: !0
                }, {
                    key: "bfx_force_login_message",
                    secure: !0
                }, {
                    key: "force_login",
                    secure: !0
                }, {
                    key: "authDate",
                    secure: !0
                }, {
                    key: "bfx_locale",
                    secure: !0
                }, {
                    key: "bfx_keep_alive_ts",
                    secure: !0
                }, {
                    key: "temp_deactivate_2fa_method",
                    secure: !0
                }, {
                    key: "bfx_maintenance_id",
                    secure: !0
                }, {
                    key: "theme_with_mode",
                    secure: !0
                }]),
                xe = Ee([{
                    key: "_fbp",
                    duration: ke
                }, {
                    key: "act"
                }, {
                    key: "c_user"
                }, {
                    key: "datr",
                    duration: ve
                }, {
                    key: "fr",
                    duration: ke
                }, {
                    key: "presence",
                    duration: ye
                }, {
                    key: "sb",
                    duration: ve
                }, {
                    key: "spin",
                    duration: ue
                }, {
                    key: "wd",
                    duration: ye
                }, {
                    key: "xs",
                    duration: ye
                }, {
                    key: "_e_*_*",
                    i18nKey: "_e_"
                }]),
                Ze = Ee([{
                    key: "_gid",
                    duration: ye
                }, {
                    key: "_ga"
                }, {
                    key: "_ga_*",
                    i18nKey: "_ga_",
                    duration: ve
                }, {
                    key: "_gat"
                }, {
                    key: "_gat_*",
                    i18nKey: "_gat_"
                }, {
                    key: "__utma"
                }, {
                    key: "_gcl_au",
                    duration: pe
                }]),
                Ae = Ee([{
                    key: "_rdt_uuid",
                    duration: ke
                }, {
                    key: "rp.gif",
                    i18nKey: "rp_gif",
                    duration: ye
                }]),
                Ke = Ee([{
                    key: "guest_id",
                    duration: ve,
                    secure: !0
                }, {
                    key: "guest_id_ads",
                    duration: ve,
                    secure: !0
                }, {
                    key: "guest_id_marketing",
                    duration: ve,
                    secure: !0
                }, {
                    key: "personalization_id",
                    duration: ve,
                    secure: !0
                }, {
                    key: "_twitter_sess",
                    secure: !0
                }]),
                Se = Ee([{
                    key: "_hjSessionUser_*",
                    i18nKey: "_hjSessionUser_",
                    duration: he
                }, {
                    key: "_hjid",
                    duration: he
                }, {
                    key: "_hjFirstSeen"
                }, {
                    key: "_hjUserAttributesHash"
                }, {
                    key: "_hjCachedUserAttributes"
                }, {
                    key: "_hjViewportId"
                }]),
                Ie = {
                    [re.Ro]: [].concat((0, oe.Z)(Ne), (0, oe.Z)(be), (0, oe.Z)(fe), (0, oe.Z)(we)),
                    [re.Ql]: [].concat((0, oe.Z)(Ke), (0, oe.Z)(xe), (0, oe.Z)(Ae), (0, oe.Z)(Ze), (0, oe.Z)(Se))
                };
            var Le = n(85514);
            const Pe = e => {
                let {
                    name: t,
                    items: n,
                    checked: l,
                    onCheckedChange: r,
                    required: s
                } = e;
                const {
                    t: c
                } = (0, i.$)("manage_cookies");
                return a.createElement(a.Fragment, null, a.createElement("div", {
                    className: "manage-cookies-dialog__content-switcher"
                }, a.createElement("span", null, c("groups.titles." + t)), a.createElement(Le.Z, {
                    checked: l,
                    disabled: s,
                    onChange: e => r(t, e)
                })), a.createElement("div", {
                    className: "manage-cookies-dialog__content-desc"
                }, c("groups.descriptions." + t)), a.createElement("table", {
                    className: "group__section__table"
                }, a.createElement("thead", null, a.createElement("tr", null, a.createElement("th", null, c("table_headers.cookie")), a.createElement("th", null, c("table_headers.type")), a.createElement("th", null, c("table_headers.duration")), a.createElement("th", null, c("table_headers.description")))), a.createElement("tbody", null, m()(n, (e => {
                    let {
                        key: t,
                        i18nKey: n,
                        secure: i,
                        duration: l
                    } = e;
                    return a.createElement("tr", {
                        key: t
                    }, a.createElement("td", null, t), a.createElement("td", null, i ? "https" : ""), a.createElement("td", null, l ? c("cookie_durations." + l) : "*"), a.createElement("td", null, c("cookie_descriptions." + (n || t))))
                })))))
            };
            Pe.defaultProps = {
                items: []
            };
            var Ce = Pe,
                $e = n(54061),
                ze = n.n($e),
                Te = n(64721),
                Ue = n.n(Te),
                De = n(52049);
            var Oe = n(17276);
            var Fe = () => {
                    const {
                        0: e,
                        1: t
                    } = (0, a.useState)((() => ze()(re.Uw, ((e, t) => ({ ...e,
                        [t]: !0
                    })), {}))), {
                        0: n,
                        1: l
                    } = (0, a.useState)(re.Ro), r = n === re.Ro, {
                        t: s
                    } = (0, i.$)("manage_cookies");
                    return a.createElement(Oe.ZP, {
                        className: "manage-cookies-dialog"
                    }, a.createElement(Oe.fK, null, s("title")), a.createElement(Oe.a7, null, a.createElement("div", {
                        className: "manage-cookies-dialog__content"
                    }, a.createElement("div", {
                        className: "manage-cookies-dialog__nav"
                    }, m()(re.Uw, (e => a.createElement("button", {
                        key: e,
                        className: O()({
                            "manage-cookies-dialog__nav-selected": n === e
                        }),
                        onClick: () => l(e),
                        type: "button"
                    }, s("groups.tabs." + e))))), a.createElement(Ce, {
                        name: n,
                        items: A()(Ie, [n], []),
                        required: r,
                        checked: !!A()(e, [n]),
                        onCheckedChange: (e, n) => {
                            t((t => ({ ...t,
                                [e]: e === re.Ro || n
                            })))
                        }
                    }))), a.createElement(Oe.cN, null, a.createElement(se.Z, null, a.createElement(ce.Z, {
                        secondary: !0,
                        onClick: () => {
                            (e => {
                                const t = (0, re.EK)(),
                                    n = Ue()(t, re.Ql);
                                (0, re.Pm)(e);
                                const {
                                    history: a
                                } = window;
                                a.replaceState({}, void 0, "/"), a.back(), n && setTimeout((() => {
                                    window.location.reload()
                                }), 200)
                            })([])
                        }
                    }, s("decline")), a.createElement(ce.Z, {
                        onClick: () => {
                            (e => {
                                (0, re.Pm)(e);
                                const {
                                    history: t
                                } = window;
                                t.replaceState({}, void 0, "/"), t.back(), (0, De.loadAnalyticsIfCookiesAccepted)()
                            })(u()(re.Uw, (t => A()(e, t))))
                        }
                    }, s("accept")))))
                },
                Re = n(45176);
            let Me;

            function je() {
                return Me || (Me = new Promise((e => {
                    const t = setInterval((() => {
                        var n;
                        const a = null === (n = window.$zopim) || void 0 === n ? void 0 : n.livechat;
                        a && (clearInterval(t), e(a))
                    }), 300)
                }))), Me
            }
            var We = () => {
                const e = (0, Re.X)();
                return (0, a.useEffect)((() => {
                    if (e) return je().then((e => {
                        e.button.hide()
                    })), () => {
                        je().then((e => {
                            e.button.show()
                        }))
                    }
                }), [e]), a.createElement(Fe, null)
            };
            var qe = () => a.createElement(ne.Location, null, (e => {
                let {
                    location: t
                } = e;
                const {
                    href: n
                } = t;
                if (!n) return null;
                const {
                    query: i
                } = ae.parseUrl(n);
                return le()(i, "manageCookies") ? a.createElement(We, null) : null
            }));
            var He = () => {
                    const e = (0, te.Z)("home");
                    return a.createElement("div", {
                        ref: e
                    }, a.createElement(v, null), a.createElement(f, null), a.createElement(X, {
                        title: "news",
                        subtitle: "news_subtitle",
                        rows: 3,
                        className: "dark"
                    }), (0, s.QT)(c.$$.LEO) && a.createElement(J, null), a.createElement(ee, null), a.createElement(qe, null))
                },
                Qe = (n(37141), n(21652));
            var Ge = e => {
                let {
                    location: t
                } = e;
                const {
                    t: n
                } = (0, i.$)("homepage"), {
                    pathname: s
                } = t;
                return a.createElement(l.Z, {
                    path: s
                }, a.createElement(r.Z, {
                    subtitle: n("title"),
                    introduction: n("subtitle"),
                    type: "homepage"
                }), a.createElement(He, null))
            }
        }
    }
]);