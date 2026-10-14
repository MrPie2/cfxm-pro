"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [3364], {
        3364: (e, t, r) => {
            r.d(t, {
                ZP: () => k,
                cY: () => c,
                hw: () => n
            });
            r(7733), r(5347), r(163);
            var a = r(1786),
                s = r(7317),
                u = r(11);
            const d = r(8273).Z.RATES.GET_MARKET_RATES,
                o = e => ({ ...e,
                    id: e.MarketId
                }),
                i = ["MarketId", "Product", "Direction", "MarketType", "SEOName"],
                c = (e, t, r, a, s, u, d) => ({
                    MarketType: e,
                    ProductType: t,
                    SiteId: r,
                    DefaultProducts: a,
                    ShowOnlyDefaultProducts: s,
                    RequiredFields: u,
                    LanguageCode: d
                }),
                n = (e, t, r, a) => ({
                    Take: e,
                    Skip: t,
                    SearchTerm: r,
                    OrderBy: a
                }),
                k = ({
                    marketType: e,
                    productType: t,
                    requiredFields: r,
                    defaultProducts: k,
                    showOnlyDefaultProducts: l,
                    languageCode: p,
                    siteId: T
                } = {}, {
                    take: y,
                    skip: f,
                    searchTerm: h,
                    orderBy: S
                } = {}) => {
                    const m = (0, s.qp)(u.Z),
                        P = (0, s.Ye)((() => ({ ...c(e, t, T || m.siteId, k, l, [...new Set([...r, ...i])], p),
                            Filter: n(y, f, h, S)
                        })), [e, t, JSON.stringify(k), l, p, JSON.stringify(r), y, f, h, S]),
                        [{
                            Data: g = [],
                            Count: w
                        } = {}, O] = (0, a.Z)(d, P);
                    return {
                        results: (0, s.Ye)((() => g.map(o)), [g]),
                        count: w,
                        status: O
                    }
                }
        }
    }
]);