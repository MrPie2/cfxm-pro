"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [3219], {
        5675: (e, t, a) => {
            a.r(t), a.d(t, {
                default: () => d
            });
            var n = a(5977),
                s = (a(5347), a(2979)),
                i = a(4891),
                c = a(7317),
                l = a(3014),
                o = a.n(l);
            const r = ({
                    flipImageRight: e = !1,
                    contentImage: t = null,
                    contentTitle: a,
                    contentText: n,
                    link: i = null,
                    HeadingTag: c = "div",
                    buttonClass: l = "solid solid-primary"
                }) => (0, s.h)("div", {
                    className: o()("tabs-item", {
                        "tabs-item--content-reverse": e
                    })
                }, t ? .src && (0, s.h)("div", {
                    className: "image"
                }, (0, s.h)("img", {
                    loading: "lazy",
                    src: t.src,
                    alt: t.alt,
                    width: t.width,
                    height: t.height
                })), (0, s.h)("div", {
                    className: "content-inner"
                }, a && (0, s.h)(c, {
                    className: "title"
                }, a), n && (0, s.h)("div", {
                    className: "desc",
                    dangerouslySetInnerHTML: {
                        __html: n
                    }
                }), i ? .url && (0, s.h)("div", {
                    className: `link ${l}`
                }, (0, s.h)("a", {
                    href: i.url,
                    target: i.target ? ? "_self"
                }, i.text)))),
                d = new i.PreactWidget({
                    name: "personalization-tabs",
                    component: e => {
                        const {
                            componentKey: t,
                            settings: {
                                isEdit: a = !1,
                                tabs: i = [],
                                backgroundImage: l = null
                            } = {
                                isEdit: a,
                                tabs: i,
                                backgroundImage: l
                            }
                        } = e, [d, m] = (0, c.eJ)(0), [h, u] = (0, c.eJ)("768px"), g = (0, c.I4)((() => window.matchMedia(`(max-width: ${h})`).matches), [h]), [b, k] = (0, c.eJ)(g);
                        return (0, c.d4)((() => {
                            if (!document.querySelector(`[data-component-key="${t}"]`)) return;
                            const e = getComputedStyle(document.querySelector(`[data-component-key="${t}"]`)).getPropertyValue("--media-breakpoint");
                            e && (k(g()), u(e))
                        }), [g]), (0, c.d4)((() => {
                            const e = _.debounce((() => k(g())), 300);
                            return window.addEventListener("resize", e), () => window.removeEventListener("resize", e)
                        }), [g]), i ? .length > 0 && (0, s.h)(s.HY, null, !b && (0, s.h)("div", {
                            className: "tabs-nav",
                            style: l && {
                                backgroundImage: `url(${l})`
                            }
                        }, i.map((({
                            key: e,
                            icon: t,
                            iconActive: a,
                            tabTitle: n,
                            contentTitle: i
                        }, c) => {
                            const l = d === c && a && a.src ? a : t;
                            return (0, s.h)("button", {
                                type: "button",
                                className: o()("tab-nav", {
                                    active: d === c
                                }),
                                key: e,
                                onClick: () => m(c)
                            }, l && !!l.src && (0, s.h)("div", {
                                className: "icon"
                            }, (0, s.h)("img", {
                                loading: "lazy",
                                src: l.src,
                                alt: l.alt,
                                width: 24,
                                height: 24
                            })), n || i)
                        }))), b ? i.map((e => (0, s.h)(r, (0, n.Z)({}, e, {
                            key: e.key
                        })))) : (0, s.h)(r, i[d]))
                    }
                })
        }
    }
]);