"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [400], {
        400: (e, r, a) => {
            a.d(r, {
                Z: () => p
            });
            var t = a(5977),
                s = a(2979),
                c = a(7317),
                o = a(11);
            const p = ({
                marketType: e,
                product: r,
                children: a,
                ...p
            }) => {
                const {
                    targetUrls: h
                } = (0, c.qp)(o.Z), l = e ? h[e.toLowerCase()] : "", n = (0, c.Ye)((() => `${l?((e="")=>e.replace(/\?.*/g,""))(l):""}${((e="")=>e.replace(/[/ ]/g,"-").replace(/[^a-zA-Z0-9/-]/g,"").toLowerCase())(r)}/`), [r, l]);
                return (0, s.h)("a", (0, t.Z)({}, p, {
                    href: n
                }), a)
            }
        }
    }
]);