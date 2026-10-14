/*! For license information please see d1f5a87cf30e7d4b6bb63472e84de1772df9a983-123f60d51b3fa7787952.js.LICENSE.txt */
(self.webpackChunkbfx_ui_public = self.webpackChunkbfx_ui_public || []).push([
    [6074], {
        93884: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t, r, n, a, i, l) {
                var o = new Date(0);
                return o.setUTCFullYear(e, t, r), o.setUTCHours(n, a, i, l), o
            }, e.exports = t.default
        },
        83462: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t, r) {
                var n = function(e, t, r) {
                    if (r && !r.code) throw new Error("date-fns-tz error: Please set a language code on the locale object imported from date-fns, e.g. `locale.code = 'en-US'`");
                    return new Intl.DateTimeFormat(r ? [r.code, "en-US"] : void 0, {
                        timeZone: t,
                        timeZoneName: e
                    })
                }(e, r.timeZone, r.locale);
                return n.formatToParts ? function(e, t) {
                    for (var r = e.formatToParts(t), n = r.length - 1; n >= 0; --n)
                        if ("timeZoneName" === r[n].type) return r[n].value
                }(n, t) : function(e, t) {
                    var r = e.format(t).replace(/\u200E/g, ""),
                        n = / [\w-+ ]+$/.exec(r);
                    return n ? n[0].substr(1) : ""
                }(n, t)
            }, e.exports = t.default
        },
        32812: function(e, t, r) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t, r) {
                var n, i, f;
                if (!e) return 0;
                if (n = s.timezoneZ.exec(e)) return 0;
                if (n = s.timezoneHH.exec(e)) return c(f = parseInt(n[1], 10)) ? -f * l : NaN;
                if (n = s.timezoneHHMM.exec(e)) {
                    f = parseInt(n[1], 10);
                    var m = parseInt(n[2], 10);
                    return c(f, m) ? (i = Math.abs(f) * l + m * o, f > 0 ? -i : i) : NaN
                }
                if (function(e) {
                        if (d[e]) return !0;
                        try {
                            return new Intl.DateTimeFormat(void 0, {
                                timeZone: e
                            }), d[e] = !0, !0
                        } catch (t) {
                            return !1
                        }
                    }(e)) {
                    t = new Date(t || Date.now());
                    var g = r ? t : function(e) {
                            return (0, a.default)(e.getFullYear(), e.getMonth(), e.getDate(), e.getHours(), e.getMinutes(), e.getSeconds(), e.getMilliseconds())
                        }(t),
                        h = u(g, e),
                        p = r ? h : function(e, t, r) {
                            var n = e.getTime(),
                                a = n - t,
                                i = u(new Date(a), r);
                            if (t === i) return t;
                            a -= i - t;
                            var l = u(new Date(a), r);
                            if (i === l) return i;
                            return Math.max(i, l)
                        }(t, h, e);
                    return -p
                }
                return NaN
            };
            var n = i(r(63143)),
                a = i(r(93884));

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            var l = 36e5,
                o = 6e4,
                s = {
                    timezone: /([Z+-].*)$/,
                    timezoneZ: /^(Z)$/,
                    timezoneHH: /^([+-]\d{2})$/,
                    timezoneHHMM: /^([+-]\d{2}):?(\d{2})$/
                };

            function u(e, t) {
                var r = (0, n.default)(e, t),
                    i = (0, a.default)(r[0], r[1] - 1, r[2], r[3] % 24, r[4], r[5], 0).getTime(),
                    l = e.getTime(),
                    o = l % 1e3;
                return i - (l -= o >= 0 ? o : 1e3 + o)
            }

            function c(e, t) {
                return -23 <= e && e <= 23 && (null == t || 0 <= t && t <= 59)
            }
            var d = {};
            e.exports = t.default
        },
        85977: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var r = /(Z|[+-]\d{2}(?::?\d{2})?| UTC| [a-zA-Z]+\/[a-zA-Z_]+(?:\/[a-zA-Z_]+)?)$/;
            t.default = r, e.exports = t.default
        },
        63143: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                var a = function(e) {
                    if (!n[e]) {
                        var t = new Intl.DateTimeFormat("en-US", {
                                hour12: !1,
                                timeZone: "America/New_York",
                                year: "numeric",
                                month: "numeric",
                                day: "2-digit",
                                hour: "2-digit",
                                minute: "2-digit",
                                second: "2-digit"
                            }).format(new Date("2014-06-25T04:00:00.123Z")),
                            r = "06/25/2014, 00:00:00" === t || "‎06‎/‎25‎/‎2014‎ ‎00‎:‎00‎:‎00" === t;
                        n[e] = r ? new Intl.DateTimeFormat("en-US", {
                            hour12: !1,
                            timeZone: e,
                            year: "numeric",
                            month: "numeric",
                            day: "2-digit",
                            hour: "2-digit",
                            minute: "2-digit",
                            second: "2-digit"
                        }) : new Intl.DateTimeFormat("en-US", {
                            hourCycle: "h23",
                            timeZone: e,
                            year: "numeric",
                            month: "numeric",
                            day: "2-digit",
                            hour: "2-digit",
                            minute: "2-digit",
                            second: "2-digit"
                        })
                    }
                    return n[e]
                }(t);
                return a.formatToParts ? function(e, t) {
                    try {
                        for (var n = e.formatToParts(t), a = [], i = 0; i < n.length; i++) {
                            var l = r[n[i].type];
                            l >= 0 && (a[l] = parseInt(n[i].value, 10))
                        }
                        return a
                    } catch (o) {
                        if (o instanceof RangeError) return [NaN];
                        throw o
                    }
                }(a, e) : function(e, t) {
                    var r = e.format(t).replace(/\u200E/g, ""),
                        n = /(\d+)\/(\d+)\/(\d+),? (\d+):(\d+):(\d+)/.exec(r);
                    return [n[3], n[1], n[2], n[4], n[5], n[6]]
                }(a, e)
            };
            var r = {
                year: 0,
                month: 1,
                day: 2,
                hour: 3,
                minute: 4,
                second: 5
            };
            var n = {};
            e.exports = t.default
        },
        19373: function(e, t, r) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var n = i(r(83462)),
                a = i(r(32812));

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }

            function l(e, t) {
                var r = e ? (0, a.default)(e, t, !0) / 6e4 : t.getTimezoneOffset();
                if (Number.isNaN(r)) throw new RangeError("Invalid time zone specified: " + e);
                return r
            }

            function o(e, t) {
                for (var r = e < 0 ? "-" : "", n = Math.abs(e).toString(); n.length < t;) n = "0" + n;
                return r + n
            }

            function s(e, t) {
                var r = t || "",
                    n = e > 0 ? "-" : "+",
                    a = Math.abs(e);
                return n + o(Math.floor(a / 60), 2) + r + o(Math.floor(a % 60), 2)
            }

            function u(e, t) {
                return e % 60 == 0 ? (e > 0 ? "-" : "+") + o(Math.abs(e) / 60, 2) : s(e, t)
            }
            var c = {
                X: function(e, t, r, n) {
                    var a = l(n.timeZone, n._originalDate || e);
                    if (0 === a) return "Z";
                    switch (t) {
                        case "X":
                            return u(a);
                        case "XXXX":
                        case "XX":
                            return s(a);
                        default:
                            return s(a, ":")
                    }
                },
                x: function(e, t, r, n) {
                    var a = l(n.timeZone, n._originalDate || e);
                    switch (t) {
                        case "x":
                            return u(a);
                        case "xxxx":
                        case "xx":
                            return s(a);
                        default:
                            return s(a, ":")
                    }
                },
                O: function(e, t, r, n) {
                    var a = l(n.timeZone, n._originalDate || e);
                    switch (t) {
                        case "O":
                        case "OO":
                        case "OOO":
                            return "GMT" + function(e, t) {
                                var r = e > 0 ? "-" : "+",
                                    n = Math.abs(e),
                                    a = Math.floor(n / 60),
                                    i = n % 60;
                                if (0 === i) return r + String(a);
                                var l = t || "";
                                return r + String(a) + l + o(i, 2)
                            }(a, ":");
                        default:
                            return "GMT" + s(a, ":")
                    }
                },
                z: function(e, t, r, a) {
                    var i = a._originalDate || e;
                    switch (t) {
                        case "z":
                        case "zz":
                        case "zzz":
                            return (0, n.default)("short", i, a);
                        default:
                            return (0, n.default)("long", i, a)
                    }
                }
            };
            t.default = c, e.exports = t.default
        },
        44562: function(e, t, r) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t, r) {
                var l = String(t),
                    s = r || {},
                    u = l.match(o);
                if (u) {
                    var c = (0, i.default)(e, s);
                    l = u.reduce((function(e, t) {
                        if ("'" === t[0]) return e;
                        var r = e.indexOf(t),
                            n = "'" === e[r - 1],
                            i = e.replace(t, "'" + a.default[t[0]](c, t, null, s) + "'");
                        return n ? i.substring(0, r - 1) + i.substring(r + 1) : i
                    }), l)
                }
                return (0, n.default)(e, l, s)
            };
            var n = l(r(57464)),
                a = l(r(19373)),
                i = l(r(68464));

            function l(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            var o = /([xXOz]+)|''|'(''|[^'])+('|$)/g;
            e.exports = t.default
        },
        24793: function(e, t, r) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t, r, l) {
                var o = (0, n.default)(l);
                return o.timeZone = t, (0, a.default)((0, i.default)(e, t), r, o)
            };
            var n = l(r(33099)),
                a = l(r(44562)),
                i = l(r(89112));

            function l(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            e.exports = t.default
        },
        38717: function(e, t, r) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                return -(0, a.default)(e, t)
            };
            var n, a = (n = r(32812)) && n.__esModule ? n : {
                default: n
            };
            e.exports = t.default
        },
        45565: function(e, t, r) {
            "use strict";
            e.exports = {
                format: r(44562),
                formatInTimeZone: r(24793),
                getTimezoneOffset: r(38717),
                toDate: r(68464),
                utcToZonedTime: r(89112),
                zonedTimeToUtc: r(33496)
            }
        },
        68464: function(e, t, r) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                if (arguments.length < 1) throw new TypeError("1 argument required, but only " + arguments.length + " present");
                if (null === e) return new Date(NaN);
                var r = t || {},
                    l = null == r.additionalDigits ? c : (0, n.default)(r.additionalDigits);
                if (2 !== l && 1 !== l && 0 !== l) throw new RangeError("additionalDigits must be 0, 1 or 2");
                if (e instanceof Date || "object" == typeof e && "[object Date]" === Object.prototype.toString.call(e)) return new Date(e.getTime());
                if ("number" == typeof e || "[object Number]" === Object.prototype.toString.call(e)) return new Date(e);
                if ("string" != typeof e && "[object String]" !== Object.prototype.toString.call(e)) return new Date(NaN);
                var o = function(e) {
                        var t, r = {},
                            n = d.dateTimePattern.exec(e);
                        n ? (r.date = n[1], t = n[3]) : (n = d.datePattern.exec(e)) ? (r.date = n[1], t = n[2]) : (r.date = null, t = e);
                        if (t) {
                            var a = d.timeZone.exec(t);
                            a ? (r.time = t.replace(a[1], ""), r.timeZone = a[1].trim()) : r.time = t
                        }
                        return r
                    }(e),
                    m = function(e, t) {
                        var r, n = d.YYY[t],
                            a = d.YYYYY[t];
                        if (r = d.YYYY.exec(e) || a.exec(e)) {
                            var i = r[1];
                            return {
                                year: parseInt(i, 10),
                                restDateString: e.slice(i.length)
                            }
                        }
                        if (r = d.YY.exec(e) || n.exec(e)) {
                            var l = r[1];
                            return {
                                year: 100 * parseInt(l, 10),
                                restDateString: e.slice(l.length)
                            }
                        }
                        return {
                            year: null
                        }
                    }(o.date, l),
                    g = m.year,
                    y = function(e, t) {
                        if (null === t) return null;
                        var r, n, a, i;
                        if (0 === e.length) return (n = new Date(0)).setUTCFullYear(t), n;
                        if (r = d.MM.exec(e)) return n = new Date(0), p(t, a = parseInt(r[1], 10) - 1) ? (n.setUTCFullYear(t, a), n) : new Date(NaN);
                        if (r = d.DDD.exec(e)) {
                            n = new Date(0);
                            var l = parseInt(r[1], 10);
                            return function(e, t) {
                                if (t < 1) return !1;
                                var r = h(e);
                                if (r && t > 366) return !1;
                                if (!r && t > 365) return !1;
                                return !0
                            }(t, l) ? (n.setUTCFullYear(t, 0, l), n) : new Date(NaN)
                        }
                        if (r = d.MMDD.exec(e)) {
                            n = new Date(0), a = parseInt(r[1], 10) - 1;
                            var o = parseInt(r[2], 10);
                            return p(t, a, o) ? (n.setUTCFullYear(t, a, o), n) : new Date(NaN)
                        }
                        if (r = d.Www.exec(e)) return b(t, i = parseInt(r[1], 10) - 1) ? f(t, i) : new Date(NaN);
                        if (r = d.WwwD.exec(e)) {
                            i = parseInt(r[1], 10) - 1;
                            var s = parseInt(r[2], 10) - 1;
                            return b(t, i, s) ? f(t, i, s) : new Date(NaN)
                        }
                        return null
                    }(m.restDateString, g);
                if (isNaN(y)) return new Date(NaN);
                if (y) {
                    var w, M = y.getTime(),
                        N = 0;
                    if (o.time && (N = function(e) {
                            var t, r, n;
                            if (t = d.HH.exec(e)) return v(r = parseFloat(t[1].replace(",", "."))) ? r % 24 * s : NaN;
                            if (t = d.HHMM.exec(e)) return v(r = parseInt(t[1], 10), n = parseFloat(t[2].replace(",", "."))) ? r % 24 * s + n * u : NaN;
                            if (t = d.HHMMSS.exec(e)) {
                                r = parseInt(t[1], 10), n = parseInt(t[2], 10);
                                var a = parseFloat(t[3].replace(",", "."));
                                return v(r, n, a) ? r % 24 * s + n * u + 1e3 * a : NaN
                            }
                            return null
                        }(o.time), isNaN(N))) return new Date(NaN);
                    if (o.timeZone || r.timeZone) {
                        if (w = (0, i.default)(o.timeZone || r.timeZone, new Date(M + N)), isNaN(w)) return new Date(NaN)
                    } else w = (0, a.default)(new Date(M + N)), w = (0, a.default)(new Date(M + N + w));
                    return new Date(M + N + w)
                }
                return new Date(NaN)
            };
            var n = o(r(34560)),
                a = o(r(32629)),
                i = o(r(32812)),
                l = o(r(85977));

            function o(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            var s = 36e5,
                u = 6e4,
                c = 2,
                d = {
                    dateTimePattern: /^([0-9W+-]+)(T| )(.*)/,
                    datePattern: /^([0-9W+-]+)(.*)/,
                    plainTime: /:/,
                    YY: /^(\d{2})$/,
                    YYY: [/^([+-]\d{2})$/, /^([+-]\d{3})$/, /^([+-]\d{4})$/],
                    YYYY: /^(\d{4})/,
                    YYYYY: [/^([+-]\d{4})/, /^([+-]\d{5})/, /^([+-]\d{6})/],
                    MM: /^-(\d{2})$/,
                    DDD: /^-?(\d{3})$/,
                    MMDD: /^-?(\d{2})-?(\d{2})$/,
                    Www: /^-?W(\d{2})$/,
                    WwwD: /^-?W(\d{2})-?(\d{1})$/,
                    HH: /^(\d{2}([.,]\d*)?)$/,
                    HHMM: /^(\d{2}):?(\d{2}([.,]\d*)?)$/,
                    HHMMSS: /^(\d{2}):?(\d{2}):?(\d{2}([.,]\d*)?)$/,
                    timeZone: l.default
                };

            function f(e, t, r) {
                t = t || 0, r = r || 0;
                var n = new Date(0);
                n.setUTCFullYear(e, 0, 4);
                var a = 7 * t + r + 1 - (n.getUTCDay() || 7);
                return n.setUTCDate(n.getUTCDate() + a), n
            }
            var m = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
                g = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

            function h(e) {
                return e % 400 == 0 || e % 4 == 0 && e % 100 != 0
            }

            function p(e, t, r) {
                if (t < 0 || t > 11) return !1;
                if (null != r) {
                    if (r < 1) return !1;
                    var n = h(e);
                    if (n && r > g[t]) return !1;
                    if (!n && r > m[t]) return !1
                }
                return !0
            }

            function b(e, t, r) {
                return !(t < 0 || t > 52) && (null == r || !(r < 0 || r > 6))
            }

            function v(e, t, r) {
                return (null == e || !(e < 0 || e >= 25)) && ((null == t || !(t < 0 || t >= 60)) && (null == r || !(r < 0 || r >= 60)))
            }
            e.exports = t.default
        },
        89112: function(e, t, r) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t, r) {
                var i = (0, a.default)(e, r),
                    l = (0, n.default)(t, i, !0),
                    o = new Date(i.getTime() - l),
                    s = new Date(0);
                return s.setFullYear(o.getUTCFullYear(), o.getUTCMonth(), o.getUTCDate()), s.setHours(o.getUTCHours(), o.getUTCMinutes(), o.getUTCSeconds(), o.getUTCMilliseconds()), s
            };
            var n = i(r(32812)),
                a = i(r(68464));

            function i(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            e.exports = t.default
        },
        33496: function(e, t, r) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t, r) {
                if ("string" == typeof e && !e.match(i.default)) {
                    var s = (0, n.default)(r);
                    return s.timeZone = t, (0, a.default)(e, s)
                }
                var u = (0, a.default)(e, r),
                    c = (0, o.default)(u.getFullYear(), u.getMonth(), u.getDate(), u.getHours(), u.getMinutes(), u.getSeconds(), u.getMilliseconds()).getTime(),
                    d = (0, l.default)(t, new Date(c));
                return new Date(c + d)
            };
            var n = s(r(33099)),
                a = s(r(68464)),
                i = s(r(85977)),
                l = s(r(32812)),
                o = s(r(93884));

            function s(e) {
                return e && e.__esModule ? e : {
                    default: e
                }
            }
            e.exports = t.default
        },
        9294: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                var r = e < 0 ? "-" : "",
                    n = Math.abs(e).toString();
                for (; n.length < t;) n = "0" + n;
                return r + n
            }, e.exports = t.default
        },
        20578: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                if (null == e) throw new TypeError("assign requires that input parameter not be null or undefined");
                for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (e[r] = t[r]);
                return e
            }, e.exports = t.default
        },
        33099: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                return (0, a.default)({}, e)
            };
            var a = n(r(20578));
            e.exports = t.default
        },
        77475: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var a = n(r(23816)).default;
            t.default = a, e.exports = t.default
        },
        21863: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.getDefaultOptions = function() {
                return r
            }, t.setDefaultOptions = function(e) {
                r = e
            };
            var r = {}
        },
        74893: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var a = n(r(61422)),
                i = n(r(49334)),
                l = n(r(84540)),
                o = n(r(30940)),
                s = n(r(24094)),
                u = n(r(9294)),
                c = n(r(91470)),
                d = "midnight",
                f = "noon",
                m = "morning",
                g = "afternoon",
                h = "evening",
                p = "night";

            function b(e, t) {
                var r = e > 0 ? "-" : "+",
                    n = Math.abs(e),
                    a = Math.floor(n / 60),
                    i = n % 60;
                if (0 === i) return r + String(a);
                var l = t || "";
                return r + String(a) + l + (0, u.default)(i, 2)
            }

            function v(e, t) {
                return e % 60 == 0 ? (e > 0 ? "-" : "+") + (0, u.default)(Math.abs(e) / 60, 2) : y(e, t)
            }

            function y(e, t) {
                var r = t || "",
                    n = e > 0 ? "-" : "+",
                    a = Math.abs(e);
                return n + (0, u.default)(Math.floor(a / 60), 2) + r + (0, u.default)(a % 60, 2)
            }
            var w = {
                G: function(e, t, r) {
                    var n = e.getUTCFullYear() > 0 ? 1 : 0;
                    switch (t) {
                        case "G":
                        case "GG":
                        case "GGG":
                            return r.era(n, {
                                width: "abbreviated"
                            });
                        case "GGGGG":
                            return r.era(n, {
                                width: "narrow"
                            });
                        default:
                            return r.era(n, {
                                width: "wide"
                            })
                    }
                },
                y: function(e, t, r) {
                    if ("yo" === t) {
                        var n = e.getUTCFullYear(),
                            a = n > 0 ? n : 1 - n;
                        return r.ordinalNumber(a, {
                            unit: "year"
                        })
                    }
                    return c.default.y(e, t)
                },
                Y: function(e, t, r, n) {
                    var a = (0, s.default)(e, n),
                        i = a > 0 ? a : 1 - a;
                    if ("YY" === t) {
                        var l = i % 100;
                        return (0, u.default)(l, 2)
                    }
                    return "Yo" === t ? r.ordinalNumber(i, {
                        unit: "year"
                    }) : (0, u.default)(i, t.length)
                },
                R: function(e, t) {
                    var r = (0, l.default)(e);
                    return (0, u.default)(r, t.length)
                },
                u: function(e, t) {
                    var r = e.getUTCFullYear();
                    return (0, u.default)(r, t.length)
                },
                Q: function(e, t, r) {
                    var n = Math.ceil((e.getUTCMonth() + 1) / 3);
                    switch (t) {
                        case "Q":
                            return String(n);
                        case "QQ":
                            return (0, u.default)(n, 2);
                        case "Qo":
                            return r.ordinalNumber(n, {
                                unit: "quarter"
                            });
                        case "QQQ":
                            return r.quarter(n, {
                                width: "abbreviated",
                                context: "formatting"
                            });
                        case "QQQQQ":
                            return r.quarter(n, {
                                width: "narrow",
                                context: "formatting"
                            });
                        default:
                            return r.quarter(n, {
                                width: "wide",
                                context: "formatting"
                            })
                    }
                },
                q: function(e, t, r) {
                    var n = Math.ceil((e.getUTCMonth() + 1) / 3);
                    switch (t) {
                        case "q":
                            return String(n);
                        case "qq":
                            return (0, u.default)(n, 2);
                        case "qo":
                            return r.ordinalNumber(n, {
                                unit: "quarter"
                            });
                        case "qqq":
                            return r.quarter(n, {
                                width: "abbreviated",
                                context: "standalone"
                            });
                        case "qqqqq":
                            return r.quarter(n, {
                                width: "narrow",
                                context: "standalone"
                            });
                        default:
                            return r.quarter(n, {
                                width: "wide",
                                context: "standalone"
                            })
                    }
                },
                M: function(e, t, r) {
                    var n = e.getUTCMonth();
                    switch (t) {
                        case "M":
                        case "MM":
                            return c.default.M(e, t);
                        case "Mo":
                            return r.ordinalNumber(n + 1, {
                                unit: "month"
                            });
                        case "MMM":
                            return r.month(n, {
                                width: "abbreviated",
                                context: "formatting"
                            });
                        case "MMMMM":
                            return r.month(n, {
                                width: "narrow",
                                context: "formatting"
                            });
                        default:
                            return r.month(n, {
                                width: "wide",
                                context: "formatting"
                            })
                    }
                },
                L: function(e, t, r) {
                    var n = e.getUTCMonth();
                    switch (t) {
                        case "L":
                            return String(n + 1);
                        case "LL":
                            return (0, u.default)(n + 1, 2);
                        case "Lo":
                            return r.ordinalNumber(n + 1, {
                                unit: "month"
                            });
                        case "LLL":
                            return r.month(n, {
                                width: "abbreviated",
                                context: "standalone"
                            });
                        case "LLLLL":
                            return r.month(n, {
                                width: "narrow",
                                context: "standalone"
                            });
                        default:
                            return r.month(n, {
                                width: "wide",
                                context: "standalone"
                            })
                    }
                },
                w: function(e, t, r, n) {
                    var a = (0, o.default)(e, n);
                    return "wo" === t ? r.ordinalNumber(a, {
                        unit: "week"
                    }) : (0, u.default)(a, t.length)
                },
                I: function(e, t, r) {
                    var n = (0, i.default)(e);
                    return "Io" === t ? r.ordinalNumber(n, {
                        unit: "week"
                    }) : (0, u.default)(n, t.length)
                },
                d: function(e, t, r) {
                    return "do" === t ? r.ordinalNumber(e.getUTCDate(), {
                        unit: "date"
                    }) : c.default.d(e, t)
                },
                D: function(e, t, r) {
                    var n = (0, a.default)(e);
                    return "Do" === t ? r.ordinalNumber(n, {
                        unit: "dayOfYear"
                    }) : (0, u.default)(n, t.length)
                },
                E: function(e, t, r) {
                    var n = e.getUTCDay();
                    switch (t) {
                        case "E":
                        case "EE":
                        case "EEE":
                            return r.day(n, {
                                width: "abbreviated",
                                context: "formatting"
                            });
                        case "EEEEE":
                            return r.day(n, {
                                width: "narrow",
                                context: "formatting"
                            });
                        case "EEEEEE":
                            return r.day(n, {
                                width: "short",
                                context: "formatting"
                            });
                        default:
                            return r.day(n, {
                                width: "wide",
                                context: "formatting"
                            })
                    }
                },
                e: function(e, t, r, n) {
                    var a = e.getUTCDay(),
                        i = (a - n.weekStartsOn + 8) % 7 || 7;
                    switch (t) {
                        case "e":
                            return String(i);
                        case "ee":
                            return (0, u.default)(i, 2);
                        case "eo":
                            return r.ordinalNumber(i, {
                                unit: "day"
                            });
                        case "eee":
                            return r.day(a, {
                                width: "abbreviated",
                                context: "formatting"
                            });
                        case "eeeee":
                            return r.day(a, {
                                width: "narrow",
                                context: "formatting"
                            });
                        case "eeeeee":
                            return r.day(a, {
                                width: "short",
                                context: "formatting"
                            });
                        default:
                            return r.day(a, {
                                width: "wide",
                                context: "formatting"
                            })
                    }
                },
                c: function(e, t, r, n) {
                    var a = e.getUTCDay(),
                        i = (a - n.weekStartsOn + 8) % 7 || 7;
                    switch (t) {
                        case "c":
                            return String(i);
                        case "cc":
                            return (0, u.default)(i, t.length);
                        case "co":
                            return r.ordinalNumber(i, {
                                unit: "day"
                            });
                        case "ccc":
                            return r.day(a, {
                                width: "abbreviated",
                                context: "standalone"
                            });
                        case "ccccc":
                            return r.day(a, {
                                width: "narrow",
                                context: "standalone"
                            });
                        case "cccccc":
                            return r.day(a, {
                                width: "short",
                                context: "standalone"
                            });
                        default:
                            return r.day(a, {
                                width: "wide",
                                context: "standalone"
                            })
                    }
                },
                i: function(e, t, r) {
                    var n = e.getUTCDay(),
                        a = 0 === n ? 7 : n;
                    switch (t) {
                        case "i":
                            return String(a);
                        case "ii":
                            return (0, u.default)(a, t.length);
                        case "io":
                            return r.ordinalNumber(a, {
                                unit: "day"
                            });
                        case "iii":
                            return r.day(n, {
                                width: "abbreviated",
                                context: "formatting"
                            });
                        case "iiiii":
                            return r.day(n, {
                                width: "narrow",
                                context: "formatting"
                            });
                        case "iiiiii":
                            return r.day(n, {
                                width: "short",
                                context: "formatting"
                            });
                        default:
                            return r.day(n, {
                                width: "wide",
                                context: "formatting"
                            })
                    }
                },
                a: function(e, t, r) {
                    var n = e.getUTCHours() / 12 >= 1 ? "pm" : "am";
                    switch (t) {
                        case "a":
                        case "aa":
                            return r.dayPeriod(n, {
                                width: "abbreviated",
                                context: "formatting"
                            });
                        case "aaa":
                            return r.dayPeriod(n, {
                                width: "abbreviated",
                                context: "formatting"
                            }).toLowerCase();
                        case "aaaaa":
                            return r.dayPeriod(n, {
                                width: "narrow",
                                context: "formatting"
                            });
                        default:
                            return r.dayPeriod(n, {
                                width: "wide",
                                context: "formatting"
                            })
                    }
                },
                b: function(e, t, r) {
                    var n, a = e.getUTCHours();
                    switch (n = 12 === a ? f : 0 === a ? d : a / 12 >= 1 ? "pm" : "am", t) {
                        case "b":
                        case "bb":
                            return r.dayPeriod(n, {
                                width: "abbreviated",
                                context: "formatting"
                            });
                        case "bbb":
                            return r.dayPeriod(n, {
                                width: "abbreviated",
                                context: "formatting"
                            }).toLowerCase();
                        case "bbbbb":
                            return r.dayPeriod(n, {
                                width: "narrow",
                                context: "formatting"
                            });
                        default:
                            return r.dayPeriod(n, {
                                width: "wide",
                                context: "formatting"
                            })
                    }
                },
                B: function(e, t, r) {
                    var n, a = e.getUTCHours();
                    switch (n = a >= 17 ? h : a >= 12 ? g : a >= 4 ? m : p, t) {
                        case "B":
                        case "BB":
                        case "BBB":
                            return r.dayPeriod(n, {
                                width: "abbreviated",
                                context: "formatting"
                            });
                        case "BBBBB":
                            return r.dayPeriod(n, {
                                width: "narrow",
                                context: "formatting"
                            });
                        default:
                            return r.dayPeriod(n, {
                                width: "wide",
                                context: "formatting"
                            })
                    }
                },
                h: function(e, t, r) {
                    if ("ho" === t) {
                        var n = e.getUTCHours() % 12;
                        return 0 === n && (n = 12), r.ordinalNumber(n, {
                            unit: "hour"
                        })
                    }
                    return c.default.h(e, t)
                },
                H: function(e, t, r) {
                    return "Ho" === t ? r.ordinalNumber(e.getUTCHours(), {
                        unit: "hour"
                    }) : c.default.H(e, t)
                },
                K: function(e, t, r) {
                    var n = e.getUTCHours() % 12;
                    return "Ko" === t ? r.ordinalNumber(n, {
                        unit: "hour"
                    }) : (0, u.default)(n, t.length)
                },
                k: function(e, t, r) {
                    var n = e.getUTCHours();
                    return 0 === n && (n = 24), "ko" === t ? r.ordinalNumber(n, {
                        unit: "hour"
                    }) : (0, u.default)(n, t.length)
                },
                m: function(e, t, r) {
                    return "mo" === t ? r.ordinalNumber(e.getUTCMinutes(), {
                        unit: "minute"
                    }) : c.default.m(e, t)
                },
                s: function(e, t, r) {
                    return "so" === t ? r.ordinalNumber(e.getUTCSeconds(), {
                        unit: "second"
                    }) : c.default.s(e, t)
                },
                S: function(e, t) {
                    return c.default.S(e, t)
                },
                X: function(e, t, r, n) {
                    var a = (n._originalDate || e).getTimezoneOffset();
                    if (0 === a) return "Z";
                    switch (t) {
                        case "X":
                            return v(a);
                        case "XXXX":
                        case "XX":
                            return y(a);
                        default:
                            return y(a, ":")
                    }
                },
                x: function(e, t, r, n) {
                    var a = (n._originalDate || e).getTimezoneOffset();
                    switch (t) {
                        case "x":
                            return v(a);
                        case "xxxx":
                        case "xx":
                            return y(a);
                        default:
                            return y(a, ":")
                    }
                },
                O: function(e, t, r, n) {
                    var a = (n._originalDate || e).getTimezoneOffset();
                    switch (t) {
                        case "O":
                        case "OO":
                        case "OOO":
                            return "GMT" + b(a, ":");
                        default:
                            return "GMT" + y(a, ":")
                    }
                },
                z: function(e, t, r, n) {
                    var a = (n._originalDate || e).getTimezoneOffset();
                    switch (t) {
                        case "z":
                        case "zz":
                        case "zzz":
                            return "GMT" + b(a, ":");
                        default:
                            return "GMT" + y(a, ":")
                    }
                },
                t: function(e, t, r, n) {
                    var a = n._originalDate || e,
                        i = Math.floor(a.getTime() / 1e3);
                    return (0, u.default)(i, t.length)
                },
                T: function(e, t, r, n) {
                    var a = (n._originalDate || e).getTime();
                    return (0, u.default)(a, t.length)
                }
            };
            t.default = w, e.exports = t.default
        },
        91470: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var a = n(r(9294)),
                i = {
                    y: function(e, t) {
                        var r = e.getUTCFullYear(),
                            n = r > 0 ? r : 1 - r;
                        return (0, a.default)("yy" === t ? n % 100 : n, t.length)
                    },
                    M: function(e, t) {
                        var r = e.getUTCMonth();
                        return "M" === t ? String(r + 1) : (0, a.default)(r + 1, 2)
                    },
                    d: function(e, t) {
                        return (0, a.default)(e.getUTCDate(), t.length)
                    },
                    a: function(e, t) {
                        var r = e.getUTCHours() / 12 >= 1 ? "pm" : "am";
                        switch (t) {
                            case "a":
                            case "aa":
                                return r.toUpperCase();
                            case "aaa":
                                return r;
                            case "aaaaa":
                                return r[0];
                            default:
                                return "am" === r ? "a.m." : "p.m."
                        }
                    },
                    h: function(e, t) {
                        return (0, a.default)(e.getUTCHours() % 12 || 12, t.length)
                    },
                    H: function(e, t) {
                        return (0, a.default)(e.getUTCHours(), t.length)
                    },
                    m: function(e, t) {
                        return (0, a.default)(e.getUTCMinutes(), t.length)
                    },
                    s: function(e, t) {
                        return (0, a.default)(e.getUTCSeconds(), t.length)
                    },
                    S: function(e, t) {
                        var r = t.length,
                            n = e.getUTCMilliseconds(),
                            i = Math.floor(n * Math.pow(10, r - 3));
                        return (0, a.default)(i, t.length)
                    }
                };
            t.default = i, e.exports = t.default
        },
        71359: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var r = function(e, t) {
                    switch (e) {
                        case "P":
                            return t.date({
                                width: "short"
                            });
                        case "PP":
                            return t.date({
                                width: "medium"
                            });
                        case "PPP":
                            return t.date({
                                width: "long"
                            });
                        default:
                            return t.date({
                                width: "full"
                            })
                    }
                },
                n = function(e, t) {
                    switch (e) {
                        case "p":
                            return t.time({
                                width: "short"
                            });
                        case "pp":
                            return t.time({
                                width: "medium"
                            });
                        case "ppp":
                            return t.time({
                                width: "long"
                            });
                        default:
                            return t.time({
                                width: "full"
                            })
                    }
                },
                a = {
                    p: n,
                    P: function(e, t) {
                        var a, i = e.match(/(P+)(p+)?/) || [],
                            l = i[1],
                            o = i[2];
                        if (!o) return r(e, t);
                        switch (l) {
                            case "P":
                                a = t.dateTime({
                                    width: "short"
                                });
                                break;
                            case "PP":
                                a = t.dateTime({
                                    width: "medium"
                                });
                                break;
                            case "PPP":
                                a = t.dateTime({
                                    width: "long"
                                });
                                break;
                            default:
                                a = t.dateTime({
                                    width: "full"
                                })
                        }
                        return a.replace("{{date}}", r(l, t)).replace("{{time}}", n(o, t))
                    }
                };
            t.default = a, e.exports = t.default
        },
        32629: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                var t = new Date(Date.UTC(e.getFullYear(), e.getMonth(), e.getDate(), e.getHours(), e.getMinutes(), e.getSeconds(), e.getMilliseconds()));
                return t.setUTCFullYear(e.getFullYear()), e.getTime() - t.getTime()
            }, e.exports = t.default
        },
        61422: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                (0, i.default)(1, arguments);
                var t = (0, a.default)(e),
                    r = t.getTime();
                t.setUTCMonth(0, 1), t.setUTCHours(0, 0, 0, 0);
                var n = t.getTime(),
                    o = r - n;
                return Math.floor(o / l) + 1
            };
            var a = n(r(47169)),
                i = n(r(11823)),
                l = 864e5;
            e.exports = t.default
        },
        49334: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                (0, o.default)(1, arguments);
                var t = (0, a.default)(e),
                    r = (0, i.default)(t).getTime() - (0, l.default)(t).getTime();
                return Math.round(r / s) + 1
            };
            var a = n(r(47169)),
                i = n(r(98293)),
                l = n(r(39698)),
                o = n(r(11823)),
                s = 6048e5;
            e.exports = t.default
        },
        84540: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                (0, i.default)(1, arguments);
                var t = (0, a.default)(e),
                    r = t.getUTCFullYear(),
                    n = new Date(0);
                n.setUTCFullYear(r + 1, 0, 4), n.setUTCHours(0, 0, 0, 0);
                var o = (0, l.default)(n),
                    s = new Date(0);
                s.setUTCFullYear(r, 0, 4), s.setUTCHours(0, 0, 0, 0);
                var u = (0, l.default)(s);
                return t.getTime() >= o.getTime() ? r + 1 : t.getTime() >= u.getTime() ? r : r - 1
            };
            var a = n(r(47169)),
                i = n(r(11823)),
                l = n(r(98293));
            e.exports = t.default
        },
        30940: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                (0, o.default)(1, arguments);
                var r = (0, a.default)(e),
                    n = (0, i.default)(r, t).getTime() - (0, l.default)(r, t).getTime();
                return Math.round(n / s) + 1
            };
            var a = n(r(47169)),
                i = n(r(76535)),
                l = n(r(99781)),
                o = n(r(11823)),
                s = 6048e5;
            e.exports = t.default
        },
        24094: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                var r, n, u, c, d, f, m, g;
                (0, i.default)(1, arguments);
                var h = (0, a.default)(e),
                    p = h.getUTCFullYear(),
                    b = (0, s.getDefaultOptions)(),
                    v = (0, o.default)(null !== (r = null !== (n = null !== (u = null !== (c = null == t ? void 0 : t.firstWeekContainsDate) && void 0 !== c ? c : null == t || null === (d = t.locale) || void 0 === d || null === (f = d.options) || void 0 === f ? void 0 : f.firstWeekContainsDate) && void 0 !== u ? u : b.firstWeekContainsDate) && void 0 !== n ? n : null === (m = b.locale) || void 0 === m || null === (g = m.options) || void 0 === g ? void 0 : g.firstWeekContainsDate) && void 0 !== r ? r : 1);
                if (!(v >= 1 && v <= 7)) throw new RangeError("firstWeekContainsDate must be between 1 and 7 inclusively");
                var y = new Date(0);
                y.setUTCFullYear(p + 1, 0, v), y.setUTCHours(0, 0, 0, 0);
                var w = (0, l.default)(y, t),
                    M = new Date(0);
                M.setUTCFullYear(p, 0, v), M.setUTCHours(0, 0, 0, 0);
                var N = (0, l.default)(M, t);
                return h.getTime() >= w.getTime() ? p + 1 : h.getTime() >= N.getTime() ? p : p - 1
            };
            var a = n(r(47169)),
                i = n(r(11823)),
                l = n(r(76535)),
                o = n(r(34560)),
                s = r(21863);
            e.exports = t.default
        },
        18177: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.isProtectedDayOfYearToken = function(e) {
                return -1 !== r.indexOf(e)
            }, t.isProtectedWeekYearToken = function(e) {
                return -1 !== n.indexOf(e)
            }, t.throwProtectedError = function(e, t, r) {
                if ("YYYY" === e) throw new RangeError("Use `yyyy` instead of `YYYY` (in `".concat(t, "`) for formatting years to the input `").concat(r, "`; see: https://github.com/date-fns/date-fns/blob/master/docs/unicodeTokens.md"));
                if ("YY" === e) throw new RangeError("Use `yy` instead of `YY` (in `".concat(t, "`) for formatting years to the input `").concat(r, "`; see: https://github.com/date-fns/date-fns/blob/master/docs/unicodeTokens.md"));
                if ("D" === e) throw new RangeError("Use `d` instead of `D` (in `".concat(t, "`) for formatting days of the month to the input `").concat(r, "`; see: https://github.com/date-fns/date-fns/blob/master/docs/unicodeTokens.md"));
                if ("DD" === e) throw new RangeError("Use `dd` instead of `DD` (in `".concat(t, "`) for formatting days of the month to the input `").concat(r, "`; see: https://github.com/date-fns/date-fns/blob/master/docs/unicodeTokens.md"))
            };
            var r = ["D", "DD"],
                n = ["YY", "YYYY"]
        },
        11823: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                if (t.length < e) throw new TypeError(e + " argument" + (e > 1 ? "s" : "") + " required, but only " + t.length + " present")
            }, e.exports = t.default
        },
        98293: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                (0, i.default)(1, arguments);
                var t = (0, a.default)(e),
                    r = t.getUTCDay(),
                    n = (r < 1 ? 7 : 0) + r - 1;
                return t.setUTCDate(t.getUTCDate() - n), t.setUTCHours(0, 0, 0, 0), t
            };
            var a = n(r(47169)),
                i = n(r(11823));
            e.exports = t.default
        },
        39698: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                (0, l.default)(1, arguments);
                var t = (0, a.default)(e),
                    r = new Date(0);
                return r.setUTCFullYear(t, 0, 4), r.setUTCHours(0, 0, 0, 0), (0, i.default)(r)
            };
            var a = n(r(84540)),
                i = n(r(98293)),
                l = n(r(11823));
            e.exports = t.default
        },
        76535: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                var r, n, s, u, c, d, f, m;
                (0, i.default)(1, arguments);
                var g = (0, o.getDefaultOptions)(),
                    h = (0, l.default)(null !== (r = null !== (n = null !== (s = null !== (u = null == t ? void 0 : t.weekStartsOn) && void 0 !== u ? u : null == t || null === (c = t.locale) || void 0 === c || null === (d = c.options) || void 0 === d ? void 0 : d.weekStartsOn) && void 0 !== s ? s : g.weekStartsOn) && void 0 !== n ? n : null === (f = g.locale) || void 0 === f || null === (m = f.options) || void 0 === m ? void 0 : m.weekStartsOn) && void 0 !== r ? r : 0);
                if (!(h >= 0 && h <= 6)) throw new RangeError("weekStartsOn must be between 0 and 6 inclusively");
                var p = (0, a.default)(e),
                    b = p.getUTCDay(),
                    v = (b < h ? 7 : 0) + b - h;
                return p.setUTCDate(p.getUTCDate() - v), p.setUTCHours(0, 0, 0, 0), p
            };
            var a = n(r(47169)),
                i = n(r(11823)),
                l = n(r(34560)),
                o = r(21863);
            e.exports = t.default
        },
        99781: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                var r, n, u, c, d, f, m, g;
                (0, i.default)(1, arguments);
                var h = (0, s.getDefaultOptions)(),
                    p = (0, o.default)(null !== (r = null !== (n = null !== (u = null !== (c = null == t ? void 0 : t.firstWeekContainsDate) && void 0 !== c ? c : null == t || null === (d = t.locale) || void 0 === d || null === (f = d.options) || void 0 === f ? void 0 : f.firstWeekContainsDate) && void 0 !== u ? u : h.firstWeekContainsDate) && void 0 !== n ? n : null === (m = h.locale) || void 0 === m || null === (g = m.options) || void 0 === g ? void 0 : g.firstWeekContainsDate) && void 0 !== r ? r : 1),
                    b = (0, a.default)(e, t),
                    v = new Date(0);
                return v.setUTCFullYear(b, 0, p), v.setUTCHours(0, 0, 0, 0), (0, l.default)(v, t)
            };
            var a = n(r(24094)),
                i = n(r(11823)),
                l = n(r(76535)),
                o = n(r(34560)),
                s = r(21863);
            e.exports = t.default
        },
        34560: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                if (null === e || !0 === e || !1 === e) return NaN;
                var t = Number(e);
                if (isNaN(t)) return t;
                return t < 0 ? Math.ceil(t) : Math.floor(t)
            }, e.exports = t.default
        },
        34665: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                (0, l.default)(2, arguments);
                var r = (0, i.default)(e).getTime(),
                    n = (0, a.default)(t);
                return new Date(r + n)
            };
            var a = n(r(34560)),
                i = n(r(47169)),
                l = n(r(11823));
            e.exports = t.default
        },
        45235: function(e, t, r) {
            "use strict";
            r.d(t, {
                Z: function() {
                    return i
                }
            });
            var n = r(71002),
                a = r(81554);

            function i(e) {
                (0, a.Z)(1, arguments);
                var t = Object.prototype.toString.call(e);
                return e instanceof Date || "object" === (0, n.Z)(e) && "[object Date]" === t ? new Date(e.getTime()) : "number" == typeof e || "[object Number]" === t ? new Date(e) : ("string" != typeof e && "[object String]" !== t || "undefined" == typeof console || (console.warn("Starting with v2.0.0-beta.1 date-fns doesn't accept strings as date arguments. Please use `parseISO` to parse strings. See: https://github.com/date-fns/date-fns/blob/master/docs/upgradeGuide.md#string-arguments"), console.warn((new Error).stack)), new Date(NaN))
            }
        },
        57464: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t, r) {
                var n, w, M, N, _, T, I, E, S, C, D, k, x, L, O, P, j, A;
                (0, f.default)(2, arguments);
                var R = String(t),
                    z = (0, m.getDefaultOptions)(),
                    U = null !== (n = null !== (w = null == r ? void 0 : r.locale) && void 0 !== w ? w : z.locale) && void 0 !== n ? n : g.default,
                    F = (0, d.default)(null !== (M = null !== (N = null !== (_ = null !== (T = null == r ? void 0 : r.firstWeekContainsDate) && void 0 !== T ? T : null == r || null === (I = r.locale) || void 0 === I || null === (E = I.options) || void 0 === E ? void 0 : E.firstWeekContainsDate) && void 0 !== _ ? _ : z.firstWeekContainsDate) && void 0 !== N ? N : null === (S = z.locale) || void 0 === S || null === (C = S.options) || void 0 === C ? void 0 : C.firstWeekContainsDate) && void 0 !== M ? M : 1);
                if (!(F >= 1 && F <= 7)) throw new RangeError("firstWeekContainsDate must be between 1 and 7 inclusively");
                var Z = (0, d.default)(null !== (D = null !== (k = null !== (x = null !== (L = null == r ? void 0 : r.weekStartsOn) && void 0 !== L ? L : null == r || null === (O = r.locale) || void 0 === O || null === (P = O.options) || void 0 === P ? void 0 : P.weekStartsOn) && void 0 !== x ? x : z.weekStartsOn) && void 0 !== k ? k : null === (j = z.locale) || void 0 === j || null === (A = j.options) || void 0 === A ? void 0 : A.weekStartsOn) && void 0 !== D ? D : 0);
                if (!(Z >= 0 && Z <= 6)) throw new RangeError("weekStartsOn must be between 0 and 6 inclusively");
                if (!U.localize) throw new RangeError("locale must contain localize property");
                if (!U.formatLong) throw new RangeError("locale must contain formatLong property");
                var G = (0, l.default)(e);
                if (!(0, a.default)(G)) throw new RangeError("Invalid time value");
                var H = (0, u.default)(G),
                    Y = (0, i.default)(G, H),
                    W = {
                        firstWeekContainsDate: F,
                        weekStartsOn: Z,
                        locale: U,
                        _originalDate: G
                    };
                return R.match(p).map((function(e) {
                    var t = e[0];
                    return "p" === t || "P" === t ? (0, s.default[t])(e, U.formatLong) : e
                })).join("").match(h).map((function(n) {
                    if ("''" === n) return "'";
                    var a = n[0];
                    if ("'" === a) return function(e) {
                        var t = e.match(b);
                        if (!t) return e;
                        return t[1].replace(v, "'")
                    }(n);
                    var i = o.default[a];
                    if (i) return null != r && r.useAdditionalWeekYearTokens || !(0, c.isProtectedWeekYearToken)(n) || (0, c.throwProtectedError)(n, t, String(e)), null != r && r.useAdditionalDayOfYearTokens || !(0, c.isProtectedDayOfYearToken)(n) || (0, c.throwProtectedError)(n, t, String(e)), i(Y, n, U.localize, W);
                    if (a.match(y)) throw new RangeError("Format string contains an unescaped latin alphabet character `" + a + "`");
                    return n
                })).join("")
            };
            var a = n(r(88898)),
                i = n(r(67935)),
                l = n(r(47169)),
                o = n(r(74893)),
                s = n(r(71359)),
                u = n(r(32629)),
                c = r(18177),
                d = n(r(34560)),
                f = n(r(11823)),
                m = r(21863),
                g = n(r(77475)),
                h = /[yYQqMLwIdDecihHKkms]o|(\w)\1*|''|'(''|[^'])+('|$)|./g,
                p = /P+p+|P+|p+|''|'(''|[^'])+('|$)|./g,
                b = /^'([^]*?)'?$/,
                v = /''/g,
                y = /[a-zA-Z]/;
            e.exports = t.default
        },
        29660: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                return (0, i.default)(1, arguments), e instanceof Date || "object" === (0, a.default)(e) && "[object Date]" === Object.prototype.toString.call(e)
            };
            var a = n(r(18698)),
                i = n(r(11823));
            e.exports = t.default
        },
        88898: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                if ((0, l.default)(1, arguments), !(0, a.default)(e) && "number" != typeof e) return !1;
                var t = (0, i.default)(e);
                return !isNaN(Number(t))
            };
            var a = n(r(29660)),
                i = n(r(47169)),
                l = n(r(11823));
            e.exports = t.default
        },
        49624: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                return function() {
                    var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                        r = t.width ? String(t.width) : e.defaultWidth;
                    return e.formats[r] || e.formats[e.defaultWidth]
                }
            }, e.exports = t.default
        },
        88068: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                return function(t, r) {
                    var n;
                    if ("formatting" === (null != r && r.context ? String(r.context) : "standalone") && e.formattingValues) {
                        var a = e.defaultFormattingWidth || e.defaultWidth,
                            i = null != r && r.width ? String(r.width) : a;
                        n = e.formattingValues[i] || e.formattingValues[a]
                    } else {
                        var l = e.defaultWidth,
                            o = null != r && r.width ? String(r.width) : e.defaultWidth;
                        n = e.values[o] || e.values[l]
                    }
                    return n[e.argumentCallback ? e.argumentCallback(t) : t]
                }
            }, e.exports = t.default
        },
        96148: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                return function(t) {
                    var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        n = r.width,
                        a = n && e.matchPatterns[n] || e.matchPatterns[e.defaultMatchWidth],
                        i = t.match(a);
                    if (!i) return null;
                    var l, o = i[0],
                        s = n && e.parsePatterns[n] || e.parsePatterns[e.defaultParseWidth],
                        u = Array.isArray(s) ? function(e, t) {
                            for (var r = 0; r < e.length; r++)
                                if (t(e[r])) return r;
                            return
                        }(s, (function(e) {
                            return e.test(o)
                        })) : function(e, t) {
                            for (var r in e)
                                if (e.hasOwnProperty(r) && t(e[r])) return r;
                            return
                        }(s, (function(e) {
                            return e.test(o)
                        }));
                    return l = e.valueCallback ? e.valueCallback(u) : u, {
                        value: l = r.valueCallback ? r.valueCallback(l) : l,
                        rest: t.slice(o.length)
                    }
                }
            }, e.exports = t.default
        },
        13513: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                return function(t) {
                    var r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        n = t.match(e.matchPattern);
                    if (!n) return null;
                    var a = n[0],
                        i = t.match(e.parsePattern);
                    if (!i) return null;
                    var l = e.valueCallback ? e.valueCallback(i[0]) : i[0];
                    return {
                        value: l = r.valueCallback ? r.valueCallback(l) : l,
                        rest: t.slice(a.length)
                    }
                }
            }, e.exports = t.default
        },
        53648: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var r = {
                    lessThanXSeconds: {
                        one: "less than a second",
                        other: "less than {{count}} seconds"
                    },
                    xSeconds: {
                        one: "1 second",
                        other: "{{count}} seconds"
                    },
                    halfAMinute: "half a minute",
                    lessThanXMinutes: {
                        one: "less than a minute",
                        other: "less than {{count}} minutes"
                    },
                    xMinutes: {
                        one: "1 minute",
                        other: "{{count}} minutes"
                    },
                    aboutXHours: {
                        one: "about 1 hour",
                        other: "about {{count}} hours"
                    },
                    xHours: {
                        one: "1 hour",
                        other: "{{count}} hours"
                    },
                    xDays: {
                        one: "1 day",
                        other: "{{count}} days"
                    },
                    aboutXWeeks: {
                        one: "about 1 week",
                        other: "about {{count}} weeks"
                    },
                    xWeeks: {
                        one: "1 week",
                        other: "{{count}} weeks"
                    },
                    aboutXMonths: {
                        one: "about 1 month",
                        other: "about {{count}} months"
                    },
                    xMonths: {
                        one: "1 month",
                        other: "{{count}} months"
                    },
                    aboutXYears: {
                        one: "about 1 year",
                        other: "about {{count}} years"
                    },
                    xYears: {
                        one: "1 year",
                        other: "{{count}} years"
                    },
                    overXYears: {
                        one: "over 1 year",
                        other: "over {{count}} years"
                    },
                    almostXYears: {
                        one: "almost 1 year",
                        other: "almost {{count}} years"
                    }
                },
                n = function(e, t, n) {
                    var a, i = r[e];
                    return a = "string" == typeof i ? i : 1 === t ? i.one : i.other.replace("{{count}}", t.toString()), null != n && n.addSuffix ? n.comparison && n.comparison > 0 ? "in " + a : a + " ago" : a
                };
            t.default = n, e.exports = t.default
        },
        16942: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var a = n(r(49624)),
                i = {
                    date: (0, a.default)({
                        formats: {
                            full: "EEEE, MMMM do, y",
                            long: "MMMM do, y",
                            medium: "MMM d, y",
                            short: "MM/dd/yyyy"
                        },
                        defaultWidth: "full"
                    }),
                    time: (0, a.default)({
                        formats: {
                            full: "h:mm:ss a zzzz",
                            long: "h:mm:ss a z",
                            medium: "h:mm:ss a",
                            short: "h:mm a"
                        },
                        defaultWidth: "full"
                    }),
                    dateTime: (0, a.default)({
                        formats: {
                            full: "{{date}} 'at' {{time}}",
                            long: "{{date}} 'at' {{time}}",
                            medium: "{{date}}, {{time}}",
                            short: "{{date}}, {{time}}"
                        },
                        defaultWidth: "full"
                    })
                };
            t.default = i, e.exports = t.default
        },
        25233: function(e, t) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var r = {
                    lastWeek: "'last' eeee 'at' p",
                    yesterday: "'yesterday at' p",
                    today: "'today at' p",
                    tomorrow: "'tomorrow at' p",
                    nextWeek: "eeee 'at' p",
                    other: "P"
                },
                n = function(e, t, n, a) {
                    return r[e]
                };
            t.default = n, e.exports = t.default
        },
        3176: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var a = n(r(88068)),
                i = {
                    ordinalNumber: function(e, t) {
                        var r = Number(e),
                            n = r % 100;
                        if (n > 20 || n < 10) switch (n % 10) {
                            case 1:
                                return r + "st";
                            case 2:
                                return r + "nd";
                            case 3:
                                return r + "rd"
                        }
                        return r + "th"
                    },
                    era: (0, a.default)({
                        values: {
                            narrow: ["B", "A"],
                            abbreviated: ["BC", "AD"],
                            wide: ["Before Christ", "Anno Domini"]
                        },
                        defaultWidth: "wide"
                    }),
                    quarter: (0, a.default)({
                        values: {
                            narrow: ["1", "2", "3", "4"],
                            abbreviated: ["Q1", "Q2", "Q3", "Q4"],
                            wide: ["1st quarter", "2nd quarter", "3rd quarter", "4th quarter"]
                        },
                        defaultWidth: "wide",
                        argumentCallback: function(e) {
                            return e - 1
                        }
                    }),
                    month: (0, a.default)({
                        values: {
                            narrow: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
                            abbreviated: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                            wide: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
                        },
                        defaultWidth: "wide"
                    }),
                    day: (0, a.default)({
                        values: {
                            narrow: ["S", "M", "T", "W", "T", "F", "S"],
                            short: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                            abbreviated: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                            wide: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
                        },
                        defaultWidth: "wide"
                    }),
                    dayPeriod: (0, a.default)({
                        values: {
                            narrow: {
                                am: "a",
                                pm: "p",
                                midnight: "mi",
                                noon: "n",
                                morning: "morning",
                                afternoon: "afternoon",
                                evening: "evening",
                                night: "night"
                            },
                            abbreviated: {
                                am: "AM",
                                pm: "PM",
                                midnight: "midnight",
                                noon: "noon",
                                morning: "morning",
                                afternoon: "afternoon",
                                evening: "evening",
                                night: "night"
                            },
                            wide: {
                                am: "a.m.",
                                pm: "p.m.",
                                midnight: "midnight",
                                noon: "noon",
                                morning: "morning",
                                afternoon: "afternoon",
                                evening: "evening",
                                night: "night"
                            }
                        },
                        defaultWidth: "wide",
                        formattingValues: {
                            narrow: {
                                am: "a",
                                pm: "p",
                                midnight: "mi",
                                noon: "n",
                                morning: "in the morning",
                                afternoon: "in the afternoon",
                                evening: "in the evening",
                                night: "at night"
                            },
                            abbreviated: {
                                am: "AM",
                                pm: "PM",
                                midnight: "midnight",
                                noon: "noon",
                                morning: "in the morning",
                                afternoon: "in the afternoon",
                                evening: "in the evening",
                                night: "at night"
                            },
                            wide: {
                                am: "a.m.",
                                pm: "p.m.",
                                midnight: "midnight",
                                noon: "noon",
                                morning: "in the morning",
                                afternoon: "in the afternoon",
                                evening: "in the evening",
                                night: "at night"
                            }
                        },
                        defaultFormattingWidth: "wide"
                    })
                };
            t.default = i, e.exports = t.default
        },
        78091: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var a = n(r(96148)),
                i = {
                    ordinalNumber: (0, n(r(13513)).default)({
                        matchPattern: /^(\d+)(th|st|nd|rd)?/i,
                        parsePattern: /\d+/i,
                        valueCallback: function(e) {
                            return parseInt(e, 10)
                        }
                    }),
                    era: (0, a.default)({
                        matchPatterns: {
                            narrow: /^(b|a)/i,
                            abbreviated: /^(b\.?\s?c\.?|b\.?\s?c\.?\s?e\.?|a\.?\s?d\.?|c\.?\s?e\.?)/i,
                            wide: /^(before christ|before common era|anno domini|common era)/i
                        },
                        defaultMatchWidth: "wide",
                        parsePatterns: {
                            any: [/^b/i, /^(a|c)/i]
                        },
                        defaultParseWidth: "any"
                    }),
                    quarter: (0, a.default)({
                        matchPatterns: {
                            narrow: /^[1234]/i,
                            abbreviated: /^q[1234]/i,
                            wide: /^[1234](th|st|nd|rd)? quarter/i
                        },
                        defaultMatchWidth: "wide",
                        parsePatterns: {
                            any: [/1/i, /2/i, /3/i, /4/i]
                        },
                        defaultParseWidth: "any",
                        valueCallback: function(e) {
                            return e + 1
                        }
                    }),
                    month: (0, a.default)({
                        matchPatterns: {
                            narrow: /^[jfmasond]/i,
                            abbreviated: /^(jan|feb|mar|apr|may|jun|jul|aug|sep|oct|nov|dec)/i,
                            wide: /^(january|february|march|april|may|june|july|august|september|october|november|december)/i
                        },
                        defaultMatchWidth: "wide",
                        parsePatterns: {
                            narrow: [/^j/i, /^f/i, /^m/i, /^a/i, /^m/i, /^j/i, /^j/i, /^a/i, /^s/i, /^o/i, /^n/i, /^d/i],
                            any: [/^ja/i, /^f/i, /^mar/i, /^ap/i, /^may/i, /^jun/i, /^jul/i, /^au/i, /^s/i, /^o/i, /^n/i, /^d/i]
                        },
                        defaultParseWidth: "any"
                    }),
                    day: (0, a.default)({
                        matchPatterns: {
                            narrow: /^[smtwf]/i,
                            short: /^(su|mo|tu|we|th|fr|sa)/i,
                            abbreviated: /^(sun|mon|tue|wed|thu|fri|sat)/i,
                            wide: /^(sunday|monday|tuesday|wednesday|thursday|friday|saturday)/i
                        },
                        defaultMatchWidth: "wide",
                        parsePatterns: {
                            narrow: [/^s/i, /^m/i, /^t/i, /^w/i, /^t/i, /^f/i, /^s/i],
                            any: [/^su/i, /^m/i, /^tu/i, /^w/i, /^th/i, /^f/i, /^sa/i]
                        },
                        defaultParseWidth: "any"
                    }),
                    dayPeriod: (0, a.default)({
                        matchPatterns: {
                            narrow: /^(a|p|mi|n|(in the|at) (morning|afternoon|evening|night))/i,
                            any: /^([ap]\.?\s?m\.?|midnight|noon|(in the|at) (morning|afternoon|evening|night))/i
                        },
                        defaultMatchWidth: "any",
                        parsePatterns: {
                            any: {
                                am: /^a/i,
                                pm: /^p/i,
                                midnight: /^mi/i,
                                noon: /^no/i,
                                morning: /morning/i,
                                afternoon: /afternoon/i,
                                evening: /evening/i,
                                night: /night/i
                            }
                        },
                        defaultParseWidth: "any"
                    })
                };
            t.default = i, e.exports = t.default
        },
        23816: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = void 0;
            var a = n(r(53648)),
                i = n(r(16942)),
                l = n(r(25233)),
                o = n(r(3176)),
                s = n(r(78091)),
                u = {
                    code: "en-US",
                    formatDistance: a.default,
                    formatLong: i.default,
                    formatRelative: l.default,
                    localize: o.default,
                    match: s.default,
                    options: {
                        weekStartsOn: 0,
                        firstWeekContainsDate: 1
                    }
                };
            t.default = u, e.exports = t.default
        },
        67935: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e, t) {
                (0, i.default)(2, arguments);
                var r = (0, l.default)(t);
                return (0, a.default)(e, -r)
            };
            var a = n(r(34665)),
                i = n(r(11823)),
                l = n(r(34560));
            e.exports = t.default
        },
        47169: function(e, t, r) {
            "use strict";
            var n = r(64836).default;
            Object.defineProperty(t, "__esModule", {
                value: !0
            }), t.default = function(e) {
                (0, i.default)(1, arguments);
                var t = Object.prototype.toString.call(e);
                return e instanceof Date || "object" === (0, a.default)(e) && "[object Date]" === t ? new Date(e.getTime()) : "number" == typeof e || "[object Number]" === t ? new Date(e) : ("string" != typeof e && "[object String]" !== t || "undefined" == typeof console || (console.warn("Starting with v2.0.0-beta.1 date-fns doesn't accept strings as date arguments. Please use `parseISO` to parse strings. See: https://github.com/date-fns/date-fns/blob/master/docs/upgradeGuide.md#string-arguments"), console.warn((new Error).stack)), new Date(NaN))
            };
            var a = n(r(18698)),
                i = n(r(11823));
            e.exports = t.default
        },
        13263: function(e) {
            e.exports = function() {
                "use strict";

                function e(t) {
                    return e = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                        return typeof e
                    } : function(e) {
                        return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                    }, e(t)
                }

                function t(e, r) {
                    return t = Object.setPrototypeOf || function(e, t) {
                        return e.__proto__ = t, e
                    }, t(e, r)
                }

                function r() {
                    if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
                    if (Reflect.construct.sham) return !1;
                    if ("function" == typeof Proxy) return !0;
                    try {
                        return Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], (function() {}))), !0
                    } catch (e) {
                        return !1
                    }
                }

                function n(e, a, i) {
                    return n = r() ? Reflect.construct : function(e, r, n) {
                        var a = [null];
                        a.push.apply(a, r);
                        var i = new(Function.bind.apply(e, a));
                        return n && t(i, n.prototype), i
                    }, n.apply(null, arguments)
                }

                function a(e) {
                    return i(e) || l(e) || o(e) || u()
                }

                function i(e) {
                    if (Array.isArray(e)) return s(e)
                }

                function l(e) {
                    if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"]) return Array.from(e)
                }

                function o(e, t) {
                    if (e) {
                        if ("string" == typeof e) return s(e, t);
                        var r = Object.prototype.toString.call(e).slice(8, -1);
                        return "Object" === r && e.constructor && (r = e.constructor.name), "Map" === r || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? s(e, t) : void 0
                    }
                }

                function s(e, t) {
                    (null == t || t > e.length) && (t = e.length);
                    for (var r = 0, n = new Array(t); r < t; r++) n[r] = e[r];
                    return n
                }

                function u() {
                    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                }
                var c = Object.hasOwnProperty,
                    d = Object.setPrototypeOf,
                    f = Object.isFrozen,
                    m = Object.getPrototypeOf,
                    g = Object.getOwnPropertyDescriptor,
                    h = Object.freeze,
                    p = Object.seal,
                    b = Object.create,
                    v = "undefined" != typeof Reflect && Reflect,
                    y = v.apply,
                    w = v.construct;
                y || (y = function(e, t, r) {
                    return e.apply(t, r)
                }), h || (h = function(e) {
                    return e
                }), p || (p = function(e) {
                    return e
                }), w || (w = function(e, t) {
                    return n(e, a(t))
                });
                var M = L(Array.prototype.forEach),
                    N = L(Array.prototype.pop),
                    _ = L(Array.prototype.push),
                    T = L(String.prototype.toLowerCase),
                    I = L(String.prototype.toString),
                    E = L(String.prototype.match),
                    S = L(String.prototype.replace),
                    C = L(String.prototype.indexOf),
                    D = L(String.prototype.trim),
                    k = L(RegExp.prototype.test),
                    x = O(TypeError);

                function L(e) {
                    return function(t) {
                        for (var r = arguments.length, n = new Array(r > 1 ? r - 1 : 0), a = 1; a < r; a++) n[a - 1] = arguments[a];
                        return y(e, t, n)
                    }
                }

                function O(e) {
                    return function() {
                        for (var t = arguments.length, r = new Array(t), n = 0; n < t; n++) r[n] = arguments[n];
                        return w(e, r)
                    }
                }

                function P(e, t, r) {
                    r = r || T, d && d(e, null);
                    for (var n = t.length; n--;) {
                        var a = t[n];
                        if ("string" == typeof a) {
                            var i = r(a);
                            i !== a && (f(t) || (t[n] = i), a = i)
                        }
                        e[a] = !0
                    }
                    return e
                }

                function j(e) {
                    var t, r = b(null);
                    for (t in e) !0 === y(c, e, [t]) && (r[t] = e[t]);
                    return r
                }

                function A(e, t) {
                    for (; null !== e;) {
                        var r = g(e, t);
                        if (r) {
                            if (r.get) return L(r.get);
                            if ("function" == typeof r.value) return L(r.value)
                        }
                        e = m(e)
                    }

                    function n(e) {
                        return console.warn("fallback value for", e), null
                    }
                    return n
                }
                var R = h(["a", "abbr", "acronym", "address", "area", "article", "aside", "audio", "b", "bdi", "bdo", "big", "blink", "blockquote", "body", "br", "button", "canvas", "caption", "center", "cite", "code", "col", "colgroup", "content", "data", "datalist", "dd", "decorator", "del", "details", "dfn", "dialog", "dir", "div", "dl", "dt", "element", "em", "fieldset", "figcaption", "figure", "font", "footer", "form", "h1", "h2", "h3", "h4", "h5", "h6", "head", "header", "hgroup", "hr", "html", "i", "img", "input", "ins", "kbd", "label", "legend", "li", "main", "map", "mark", "marquee", "menu", "menuitem", "meter", "nav", "nobr", "ol", "optgroup", "option", "output", "p", "picture", "pre", "progress", "q", "rp", "rt", "ruby", "s", "samp", "section", "select", "shadow", "small", "source", "spacer", "span", "strike", "strong", "style", "sub", "summary", "sup", "table", "tbody", "td", "template", "textarea", "tfoot", "th", "thead", "time", "tr", "track", "tt", "u", "ul", "var", "video", "wbr"]),
                    z = h(["svg", "a", "altglyph", "altglyphdef", "altglyphitem", "animatecolor", "animatemotion", "animatetransform", "circle", "clippath", "defs", "desc", "ellipse", "filter", "font", "g", "glyph", "glyphref", "hkern", "image", "line", "lineargradient", "marker", "mask", "metadata", "mpath", "path", "pattern", "polygon", "polyline", "radialgradient", "rect", "stop", "style", "switch", "symbol", "text", "textpath", "title", "tref", "tspan", "view", "vkern"]),
                    U = h(["feBlend", "feColorMatrix", "feComponentTransfer", "feComposite", "feConvolveMatrix", "feDiffuseLighting", "feDisplacementMap", "feDistantLight", "feFlood", "feFuncA", "feFuncB", "feFuncG", "feFuncR", "feGaussianBlur", "feImage", "feMerge", "feMergeNode", "feMorphology", "feOffset", "fePointLight", "feSpecularLighting", "feSpotLight", "feTile", "feTurbulence"]),
                    F = h(["animate", "color-profile", "cursor", "discard", "fedropshadow", "font-face", "font-face-format", "font-face-name", "font-face-src", "font-face-uri", "foreignobject", "hatch", "hatchpath", "mesh", "meshgradient", "meshpatch", "meshrow", "missing-glyph", "script", "set", "solidcolor", "unknown", "use"]),
                    Z = h(["math", "menclose", "merror", "mfenced", "mfrac", "mglyph", "mi", "mlabeledtr", "mmultiscripts", "mn", "mo", "mover", "mpadded", "mphantom", "mroot", "mrow", "ms", "mspace", "msqrt", "mstyle", "msub", "msup", "msubsup", "mtable", "mtd", "mtext", "mtr", "munder", "munderover"]),
                    G = h(["maction", "maligngroup", "malignmark", "mlongdiv", "mscarries", "mscarry", "msgroup", "mstack", "msline", "msrow", "semantics", "annotation", "annotation-xml", "mprescripts", "none"]),
                    H = h(["#text"]),
                    Y = h(["accept", "action", "align", "alt", "autocapitalize", "autocomplete", "autopictureinpicture", "autoplay", "background", "bgcolor", "border", "capture", "cellpadding", "cellspacing", "checked", "cite", "class", "clear", "color", "cols", "colspan", "controls", "controlslist", "coords", "crossorigin", "datetime", "decoding", "default", "dir", "disabled", "disablepictureinpicture", "disableremoteplayback", "download", "draggable", "enctype", "enterkeyhint", "face", "for", "headers", "height", "hidden", "high", "href", "hreflang", "id", "inputmode", "integrity", "ismap", "kind", "label", "lang", "list", "loading", "loop", "low", "max", "maxlength", "media", "method", "min", "minlength", "multiple", "muted", "name", "nonce", "noshade", "novalidate", "nowrap", "open", "optimum", "pattern", "placeholder", "playsinline", "poster", "preload", "pubdate", "radiogroup", "readonly", "rel", "required", "rev", "reversed", "role", "rows", "rowspan", "spellcheck", "scope", "selected", "shape", "size", "sizes", "span", "srclang", "start", "src", "srcset", "step", "style", "summary", "tabindex", "title", "translate", "type", "usemap", "valign", "value", "width", "xmlns", "slot"]),
                    W = h(["accent-height", "accumulate", "additive", "alignment-baseline", "ascent", "attributename", "attributetype", "azimuth", "basefrequency", "baseline-shift", "begin", "bias", "by", "class", "clip", "clippathunits", "clip-path", "clip-rule", "color", "color-interpolation", "color-interpolation-filters", "color-profile", "color-rendering", "cx", "cy", "d", "dx", "dy", "diffuseconstant", "direction", "display", "divisor", "dur", "edgemode", "elevation", "end", "fill", "fill-opacity", "fill-rule", "filter", "filterunits", "flood-color", "flood-opacity", "font-family", "font-size", "font-size-adjust", "font-stretch", "font-style", "font-variant", "font-weight", "fx", "fy", "g1", "g2", "glyph-name", "glyphref", "gradientunits", "gradienttransform", "height", "href", "id", "image-rendering", "in", "in2", "k", "k1", "k2", "k3", "k4", "kerning", "keypoints", "keysplines", "keytimes", "lang", "lengthadjust", "letter-spacing", "kernelmatrix", "kernelunitlength", "lighting-color", "local", "marker-end", "marker-mid", "marker-start", "markerheight", "markerunits", "markerwidth", "maskcontentunits", "maskunits", "max", "mask", "media", "method", "mode", "min", "name", "numoctaves", "offset", "operator", "opacity", "order", "orient", "orientation", "origin", "overflow", "paint-order", "path", "pathlength", "patterncontentunits", "patterntransform", "patternunits", "points", "preservealpha", "preserveaspectratio", "primitiveunits", "r", "rx", "ry", "radius", "refx", "refy", "repeatcount", "repeatdur", "restart", "result", "rotate", "scale", "seed", "shape-rendering", "specularconstant", "specularexponent", "spreadmethod", "startoffset", "stddeviation", "stitchtiles", "stop-color", "stop-opacity", "stroke-dasharray", "stroke-dashoffset", "stroke-linecap", "stroke-linejoin", "stroke-miterlimit", "stroke-opacity", "stroke", "stroke-width", "style", "surfacescale", "systemlanguage", "tabindex", "targetx", "targety", "transform", "transform-origin", "text-anchor", "text-decoration", "text-rendering", "textlength", "type", "u1", "u2", "unicode", "values", "viewbox", "visibility", "version", "vert-adv-y", "vert-origin-x", "vert-origin-y", "width", "word-spacing", "wrap", "writing-mode", "xchannelselector", "ychannelselector", "x", "x1", "x2", "xmlns", "y", "y1", "y2", "z", "zoomandpan"]),
                    B = h(["accent", "accentunder", "align", "bevelled", "close", "columnsalign", "columnlines", "columnspan", "denomalign", "depth", "dir", "display", "displaystyle", "encoding", "fence", "frame", "height", "href", "id", "largeop", "length", "linethickness", "lspace", "lquote", "mathbackground", "mathcolor", "mathsize", "mathvariant", "maxsize", "minsize", "movablelimits", "notation", "numalign", "open", "rowalign", "rowlines", "rowspacing", "rowspan", "rspace", "rquote", "scriptlevel", "scriptminsize", "scriptsizemultiplier", "selection", "separator", "separators", "stretchy", "subscriptshift", "supscriptshift", "symmetric", "voffset", "width", "xmlns"]),
                    V = h(["xlink:href", "xml:id", "xlink:title", "xml:space", "xmlns:xlink"]),
                    Q = p(/\{\{[\w\W]*|[\w\W]*\}\}/gm),
                    X = p(/<%[\w\W]*|[\w\W]*%>/gm),
                    J = p(/\${[\w\W]*}/gm),
                    q = p(/^data-[\-\w.\u00B7-\uFFFF]/),
                    $ = p(/^aria-[\-\w]+$/),
                    K = p(/^(?:(?:(?:f|ht)tps?|mailto|tel|callto|cid|xmpp):|[^a-z]|[a-z+.\-]+(?:[^a-z+.\-:]|$))/i),
                    ee = p(/^(?:\w+script|data):/i),
                    te = p(/[\u0000-\u0020\u00A0\u1680\u180E\u2000-\u2029\u205F\u3000]/g),
                    re = p(/^html$/i),
                    ne = function() {
                        return "undefined" == typeof window ? null : window
                    },
                    ae = function(t, r) {
                        if ("object" !== e(t) || "function" != typeof t.createPolicy) return null;
                        var n = null,
                            a = "data-tt-policy-suffix";
                        r.currentScript && r.currentScript.hasAttribute(a) && (n = r.currentScript.getAttribute(a));
                        var i = "dompurify" + (n ? "#" + n : "");
                        try {
                            return t.createPolicy(i, {
                                createHTML: function(e) {
                                    return e
                                },
                                createScriptURL: function(e) {
                                    return e
                                }
                            })
                        } catch (l) {
                            return console.warn("TrustedTypes policy " + i + " could not be created."), null
                        }
                    };

                function ie() {
                    var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : ne(),
                        r = function(e) {
                            return ie(e)
                        };
                    if (r.version = "2.4.5", r.removed = [], !t || !t.document || 9 !== t.document.nodeType) return r.isSupported = !1, r;
                    var n = t.document,
                        i = t.document,
                        l = t.DocumentFragment,
                        o = t.HTMLTemplateElement,
                        s = t.Node,
                        u = t.Element,
                        c = t.NodeFilter,
                        d = t.NamedNodeMap,
                        f = void 0 === d ? t.NamedNodeMap || t.MozNamedAttrMap : d,
                        m = t.HTMLFormElement,
                        g = t.DOMParser,
                        p = t.trustedTypes,
                        b = u.prototype,
                        v = A(b, "cloneNode"),
                        y = A(b, "nextSibling"),
                        w = A(b, "childNodes"),
                        L = A(b, "parentNode");
                    if ("function" == typeof o) {
                        var O = i.createElement("template");
                        O.content && O.content.ownerDocument && (i = O.content.ownerDocument)
                    }
                    var le = ae(p, n),
                        oe = le ? le.createHTML("") : "",
                        se = i,
                        ue = se.implementation,
                        ce = se.createNodeIterator,
                        de = se.createDocumentFragment,
                        fe = se.getElementsByTagName,
                        me = n.importNode,
                        ge = {};
                    try {
                        ge = j(i).documentMode ? i.documentMode : {}
                    } catch (Ot) {}
                    var he = {};
                    r.isSupported = "function" == typeof L && ue && void 0 !== ue.createHTMLDocument && 9 !== ge;
                    var pe, be, ve = Q,
                        ye = X,
                        we = J,
                        Me = q,
                        Ne = $,
                        _e = ee,
                        Te = te,
                        Ie = K,
                        Ee = null,
                        Se = P({}, [].concat(a(R), a(z), a(U), a(Z), a(H))),
                        Ce = null,
                        De = P({}, [].concat(a(Y), a(W), a(B), a(V))),
                        ke = Object.seal(Object.create(null, {
                            tagNameCheck: {
                                writable: !0,
                                configurable: !1,
                                enumerable: !0,
                                value: null
                            },
                            attributeNameCheck: {
                                writable: !0,
                                configurable: !1,
                                enumerable: !0,
                                value: null
                            },
                            allowCustomizedBuiltInElements: {
                                writable: !0,
                                configurable: !1,
                                enumerable: !0,
                                value: !1
                            }
                        })),
                        xe = null,
                        Le = null,
                        Oe = !0,
                        Pe = !0,
                        je = !1,
                        Ae = !0,
                        Re = !1,
                        ze = !1,
                        Ue = !1,
                        Fe = !1,
                        Ze = !1,
                        Ge = !1,
                        He = !1,
                        Ye = !0,
                        We = !1,
                        Be = "user-content-",
                        Ve = !0,
                        Qe = !1,
                        Xe = {},
                        Je = null,
                        qe = P({}, ["annotation-xml", "audio", "colgroup", "desc", "foreignobject", "head", "iframe", "math", "mi", "mn", "mo", "ms", "mtext", "noembed", "noframes", "noscript", "plaintext", "script", "style", "svg", "template", "thead", "title", "video", "xmp"]),
                        $e = null,
                        Ke = P({}, ["audio", "video", "img", "source", "image", "track"]),
                        et = null,
                        tt = P({}, ["alt", "class", "for", "id", "label", "name", "pattern", "placeholder", "role", "summary", "title", "value", "style", "xmlns"]),
                        rt = "http://www.w3.org/1998/Math/MathML",
                        nt = "http://www.w3.org/2000/svg",
                        at = "http://www.w3.org/1999/xhtml",
                        it = at,
                        lt = !1,
                        ot = null,
                        st = P({}, [rt, nt, at], I),
                        ut = ["application/xhtml+xml", "text/html"],
                        ct = "text/html",
                        dt = null,
                        ft = i.createElement("form"),
                        mt = function(e) {
                            return e instanceof RegExp || e instanceof Function
                        },
                        gt = function(t) {
                            dt && dt === t || (t && "object" === e(t) || (t = {}), t = j(t), pe = pe = -1 === ut.indexOf(t.PARSER_MEDIA_TYPE) ? ct : t.PARSER_MEDIA_TYPE, be = "application/xhtml+xml" === pe ? I : T, Ee = "ALLOWED_TAGS" in t ? P({}, t.ALLOWED_TAGS, be) : Se, Ce = "ALLOWED_ATTR" in t ? P({}, t.ALLOWED_ATTR, be) : De, ot = "ALLOWED_NAMESPACES" in t ? P({}, t.ALLOWED_NAMESPACES, I) : st, et = "ADD_URI_SAFE_ATTR" in t ? P(j(tt), t.ADD_URI_SAFE_ATTR, be) : tt, $e = "ADD_DATA_URI_TAGS" in t ? P(j(Ke), t.ADD_DATA_URI_TAGS, be) : Ke, Je = "FORBID_CONTENTS" in t ? P({}, t.FORBID_CONTENTS, be) : qe, xe = "FORBID_TAGS" in t ? P({}, t.FORBID_TAGS, be) : {}, Le = "FORBID_ATTR" in t ? P({}, t.FORBID_ATTR, be) : {}, Xe = "USE_PROFILES" in t && t.USE_PROFILES, Oe = !1 !== t.ALLOW_ARIA_ATTR, Pe = !1 !== t.ALLOW_DATA_ATTR, je = t.ALLOW_UNKNOWN_PROTOCOLS || !1, Ae = !1 !== t.ALLOW_SELF_CLOSE_IN_ATTR, Re = t.SAFE_FOR_TEMPLATES || !1, ze = t.WHOLE_DOCUMENT || !1, Ze = t.RETURN_DOM || !1, Ge = t.RETURN_DOM_FRAGMENT || !1, He = t.RETURN_TRUSTED_TYPE || !1, Fe = t.FORCE_BODY || !1, Ye = !1 !== t.SANITIZE_DOM, We = t.SANITIZE_NAMED_PROPS || !1, Ve = !1 !== t.KEEP_CONTENT, Qe = t.IN_PLACE || !1, Ie = t.ALLOWED_URI_REGEXP || Ie, it = t.NAMESPACE || at, ke = t.CUSTOM_ELEMENT_HANDLING || {}, t.CUSTOM_ELEMENT_HANDLING && mt(t.CUSTOM_ELEMENT_HANDLING.tagNameCheck) && (ke.tagNameCheck = t.CUSTOM_ELEMENT_HANDLING.tagNameCheck), t.CUSTOM_ELEMENT_HANDLING && mt(t.CUSTOM_ELEMENT_HANDLING.attributeNameCheck) && (ke.attributeNameCheck = t.CUSTOM_ELEMENT_HANDLING.attributeNameCheck), t.CUSTOM_ELEMENT_HANDLING && "boolean" == typeof t.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements && (ke.allowCustomizedBuiltInElements = t.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements), Re && (Pe = !1), Ge && (Ze = !0), Xe && (Ee = P({}, a(H)), Ce = [], !0 === Xe.html && (P(Ee, R), P(Ce, Y)), !0 === Xe.svg && (P(Ee, z), P(Ce, W), P(Ce, V)), !0 === Xe.svgFilters && (P(Ee, U), P(Ce, W), P(Ce, V)), !0 === Xe.mathMl && (P(Ee, Z), P(Ce, B), P(Ce, V))), t.ADD_TAGS && (Ee === Se && (Ee = j(Ee)), P(Ee, t.ADD_TAGS, be)), t.ADD_ATTR && (Ce === De && (Ce = j(Ce)), P(Ce, t.ADD_ATTR, be)), t.ADD_URI_SAFE_ATTR && P(et, t.ADD_URI_SAFE_ATTR, be), t.FORBID_CONTENTS && (Je === qe && (Je = j(Je)), P(Je, t.FORBID_CONTENTS, be)), Ve && (Ee["#text"] = !0), ze && P(Ee, ["html", "head", "body"]), Ee.table && (P(Ee, ["tbody"]), delete xe.tbody), h && h(t), dt = t)
                        },
                        ht = P({}, ["mi", "mo", "mn", "ms", "mtext"]),
                        pt = P({}, ["foreignobject", "desc", "title", "annotation-xml"]),
                        bt = P({}, ["title", "style", "font", "a", "script"]),
                        vt = P({}, z);
                    P(vt, U), P(vt, F);
                    var yt = P({}, Z);
                    P(yt, G);
                    var wt = function(e) {
                            var t = L(e);
                            t && t.tagName || (t = {
                                namespaceURI: it,
                                tagName: "template"
                            });
                            var r = T(e.tagName),
                                n = T(t.tagName);
                            return !!ot[e.namespaceURI] && (e.namespaceURI === nt ? t.namespaceURI === at ? "svg" === r : t.namespaceURI === rt ? "svg" === r && ("annotation-xml" === n || ht[n]) : Boolean(vt[r]) : e.namespaceURI === rt ? t.namespaceURI === at ? "math" === r : t.namespaceURI === nt ? "math" === r && pt[n] : Boolean(yt[r]) : e.namespaceURI === at ? !(t.namespaceURI === nt && !pt[n]) && !(t.namespaceURI === rt && !ht[n]) && !yt[r] && (bt[r] || !vt[r]) : !("application/xhtml+xml" !== pe || !ot[e.namespaceURI]))
                        },
                        Mt = function(e) {
                            _(r.removed, {
                                element: e
                            });
                            try {
                                e.parentNode.removeChild(e)
                            } catch (Ot) {
                                try {
                                    e.outerHTML = oe
                                } catch (Ot) {
                                    e.remove()
                                }
                            }
                        },
                        Nt = function(e, t) {
                            try {
                                _(r.removed, {
                                    attribute: t.getAttributeNode(e),
                                    from: t
                                })
                            } catch (Ot) {
                                _(r.removed, {
                                    attribute: null,
                                    from: t
                                })
                            }
                            if (t.removeAttribute(e), "is" === e && !Ce[e])
                                if (Ze || Ge) try {
                                    Mt(t)
                                } catch (Ot) {} else try {
                                    t.setAttribute(e, "")
                                } catch (Ot) {}
                        },
                        _t = function(e) {
                            var t, r;
                            if (Fe) e = "<remove></remove>" + e;
                            else {
                                var n = E(e, /^[\r\n\t ]+/);
                                r = n && n[0]
                            }
                            "application/xhtml+xml" === pe && it === at && (e = '<html xmlns="http://www.w3.org/1999/xhtml"><head></head><body>' + e + "</body></html>");
                            var a = le ? le.createHTML(e) : e;
                            if (it === at) try {
                                t = (new g).parseFromString(a, pe)
                            } catch (Ot) {}
                            if (!t || !t.documentElement) {
                                t = ue.createDocument(it, "template", null);
                                try {
                                    t.documentElement.innerHTML = lt ? oe : a
                                } catch (Ot) {}
                            }
                            var l = t.body || t.documentElement;
                            return e && r && l.insertBefore(i.createTextNode(r), l.childNodes[0] || null), it === at ? fe.call(t, ze ? "html" : "body")[0] : ze ? t.documentElement : l
                        },
                        Tt = function(e) {
                            return ce.call(e.ownerDocument || e, e, c.SHOW_ELEMENT | c.SHOW_COMMENT | c.SHOW_TEXT, null, !1)
                        },
                        It = function(e) {
                            return e instanceof m && ("string" != typeof e.nodeName || "string" != typeof e.textContent || "function" != typeof e.removeChild || !(e.attributes instanceof f) || "function" != typeof e.removeAttribute || "function" != typeof e.setAttribute || "string" != typeof e.namespaceURI || "function" != typeof e.insertBefore || "function" != typeof e.hasChildNodes)
                        },
                        Et = function(t) {
                            return "object" === e(s) ? t instanceof s : t && "object" === e(t) && "number" == typeof t.nodeType && "string" == typeof t.nodeName
                        },
                        St = function(e, t, n) {
                            he[e] && M(he[e], (function(e) {
                                e.call(r, t, n, dt)
                            }))
                        },
                        Ct = function(e) {
                            var t;
                            if (St("beforeSanitizeElements", e, null), It(e)) return Mt(e), !0;
                            if (k(/[\u0080-\uFFFF]/, e.nodeName)) return Mt(e), !0;
                            var n = be(e.nodeName);
                            if (St("uponSanitizeElement", e, {
                                    tagName: n,
                                    allowedTags: Ee
                                }), e.hasChildNodes() && !Et(e.firstElementChild) && (!Et(e.content) || !Et(e.content.firstElementChild)) && k(/<[/\w]/g, e.innerHTML) && k(/<[/\w]/g, e.textContent)) return Mt(e), !0;
                            if ("select" === n && k(/<template/i, e.innerHTML)) return Mt(e), !0;
                            if (!Ee[n] || xe[n]) {
                                if (!xe[n] && kt(n)) {
                                    if (ke.tagNameCheck instanceof RegExp && k(ke.tagNameCheck, n)) return !1;
                                    if (ke.tagNameCheck instanceof Function && ke.tagNameCheck(n)) return !1
                                }
                                if (Ve && !Je[n]) {
                                    var a = L(e) || e.parentNode,
                                        i = w(e) || e.childNodes;
                                    if (i && a)
                                        for (var l = i.length - 1; l >= 0; --l) a.insertBefore(v(i[l], !0), y(e))
                                }
                                return Mt(e), !0
                            }
                            return e instanceof u && !wt(e) ? (Mt(e), !0) : "noscript" !== n && "noembed" !== n || !k(/<\/no(script|embed)/i, e.innerHTML) ? (Re && 3 === e.nodeType && (t = e.textContent, t = S(t, ve, " "), t = S(t, ye, " "), t = S(t, we, " "), e.textContent !== t && (_(r.removed, {
                                element: e.cloneNode()
                            }), e.textContent = t)), St("afterSanitizeElements", e, null), !1) : (Mt(e), !0)
                        },
                        Dt = function(e, t, r) {
                            if (Ye && ("id" === t || "name" === t) && (r in i || r in ft)) return !1;
                            if (Pe && !Le[t] && k(Me, t));
                            else if (Oe && k(Ne, t));
                            else if (!Ce[t] || Le[t]) {
                                if (!(kt(e) && (ke.tagNameCheck instanceof RegExp && k(ke.tagNameCheck, e) || ke.tagNameCheck instanceof Function && ke.tagNameCheck(e)) && (ke.attributeNameCheck instanceof RegExp && k(ke.attributeNameCheck, t) || ke.attributeNameCheck instanceof Function && ke.attributeNameCheck(t)) || "is" === t && ke.allowCustomizedBuiltInElements && (ke.tagNameCheck instanceof RegExp && k(ke.tagNameCheck, r) || ke.tagNameCheck instanceof Function && ke.tagNameCheck(r)))) return !1
                            } else if (et[t]);
                            else if (k(Ie, S(r, Te, "")));
                            else if ("src" !== t && "xlink:href" !== t && "href" !== t || "script" === e || 0 !== C(r, "data:") || !$e[e])
                                if (je && !k(_e, S(r, Te, "")));
                                else if (r) return !1;
                            return !0
                        },
                        kt = function(e) {
                            return e.indexOf("-") > 0
                        },
                        xt = function(t) {
                            var n, a, i, l;
                            St("beforeSanitizeAttributes", t, null);
                            var o = t.attributes;
                            if (o) {
                                var s = {
                                    attrName: "",
                                    attrValue: "",
                                    keepAttr: !0,
                                    allowedAttributes: Ce
                                };
                                for (l = o.length; l--;) {
                                    var u = n = o[l],
                                        c = u.name,
                                        d = u.namespaceURI;
                                    if (a = "value" === c ? n.value : D(n.value), i = be(c), s.attrName = i, s.attrValue = a, s.keepAttr = !0, s.forceKeepAttr = void 0, St("uponSanitizeAttribute", t, s), a = s.attrValue, !s.forceKeepAttr && (Nt(c, t), s.keepAttr))
                                        if (Ae || !k(/\/>/i, a)) {
                                            Re && (a = S(a, ve, " "), a = S(a, ye, " "), a = S(a, we, " "));
                                            var f = be(t.nodeName);
                                            if (Dt(f, i, a)) {
                                                if (!We || "id" !== i && "name" !== i || (Nt(c, t), a = Be + a), le && "object" === e(p) && "function" == typeof p.getAttributeType)
                                                    if (d);
                                                    else switch (p.getAttributeType(f, i)) {
                                                        case "TrustedHTML":
                                                            a = le.createHTML(a);
                                                            break;
                                                        case "TrustedScriptURL":
                                                            a = le.createScriptURL(a)
                                                    }
                                                try {
                                                    d ? t.setAttributeNS(d, c, a) : t.setAttribute(c, a), N(r.removed)
                                                } catch (Ot) {}
                                            }
                                        } else Nt(c, t)
                                }
                                St("afterSanitizeAttributes", t, null)
                            }
                        },
                        Lt = function e(t) {
                            var r, n = Tt(t);
                            for (St("beforeSanitizeShadowDOM", t, null); r = n.nextNode();) St("uponSanitizeShadowNode", r, null), Ct(r) || (r.content instanceof l && e(r.content), xt(r));
                            St("afterSanitizeShadowDOM", t, null)
                        };
                    return r.sanitize = function(a) {
                        var i, o, u, c, d, f = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        if ((lt = !a) && (a = "\x3c!--\x3e"), "string" != typeof a && !Et(a)) {
                            if ("function" != typeof a.toString) throw x("toString is not a function");
                            if ("string" != typeof(a = a.toString())) throw x("dirty is not a string, aborting")
                        }
                        if (!r.isSupported) {
                            if ("object" === e(t.toStaticHTML) || "function" == typeof t.toStaticHTML) {
                                if ("string" == typeof a) return t.toStaticHTML(a);
                                if (Et(a)) return t.toStaticHTML(a.outerHTML)
                            }
                            return a
                        }
                        if (Ue || gt(f), r.removed = [], "string" == typeof a && (Qe = !1), Qe) {
                            if (a.nodeName) {
                                var m = be(a.nodeName);
                                if (!Ee[m] || xe[m]) throw x("root node is forbidden and cannot be sanitized in-place")
                            }
                        } else if (a instanceof s) 1 === (o = (i = _t("\x3c!----\x3e")).ownerDocument.importNode(a, !0)).nodeType && "BODY" === o.nodeName || "HTML" === o.nodeName ? i = o : i.appendChild(o);
                        else {
                            if (!Ze && !Re && !ze && -1 === a.indexOf("<")) return le && He ? le.createHTML(a) : a;
                            if (!(i = _t(a))) return Ze ? null : He ? oe : ""
                        }
                        i && Fe && Mt(i.firstChild);
                        for (var g = Tt(Qe ? a : i); u = g.nextNode();) 3 === u.nodeType && u === c || Ct(u) || (u.content instanceof l && Lt(u.content), xt(u), c = u);
                        if (c = null, Qe) return a;
                        if (Ze) {
                            if (Ge)
                                for (d = de.call(i.ownerDocument); i.firstChild;) d.appendChild(i.firstChild);
                            else d = i;
                            return (Ce.shadowroot || Ce.shadowrootmod) && (d = me.call(n, d, !0)), d
                        }
                        var h = ze ? i.outerHTML : i.innerHTML;
                        return ze && Ee["!doctype"] && i.ownerDocument && i.ownerDocument.doctype && i.ownerDocument.doctype.name && k(re, i.ownerDocument.doctype.name) && (h = "<!DOCTYPE " + i.ownerDocument.doctype.name + ">\n" + h), Re && (h = S(h, ve, " "), h = S(h, ye, " "), h = S(h, we, " ")), le && He ? le.createHTML(h) : h
                    }, r.setConfig = function(e) {
                        gt(e), Ue = !0
                    }, r.clearConfig = function() {
                        dt = null, Ue = !1
                    }, r.isValidAttribute = function(e, t, r) {
                        dt || gt({});
                        var n = be(e),
                            a = be(t);
                        return Dt(n, a, r)
                    }, r.addHook = function(e, t) {
                        "function" == typeof t && (he[e] = he[e] || [], _(he[e], t))
                    }, r.removeHook = function(e) {
                        if (he[e]) return N(he[e])
                    }, r.removeHooks = function(e) {
                        he[e] && (he[e] = [])
                    }, r.removeAllHooks = function() {
                        he = {}
                    }, r
                }
                return ie()
            }()
        },
        31320: function(e, t, r) {
            e.exports = window.DOMPurify || (window.DOMPurify = r(13263).default || r(13263))
        },
        54333: function(e, t, r) {
            "use strict";
            r.d(t, {
                Z: function() {
                    return ln
                }
            });
            var n = r(67294),
                a = r(68270),
                i = r(10240),
                l = r.n(i),
                o = r(27361),
                s = r.n(o),
                u = r(29499),
                c = r(34531),
                d = r(87274),
                f = r(44425),
                m = r(42043),
                g = r(72998),
                h = r(34688),
                p = r(32603),
                b = r(35161),
                v = r.n(b),
                y = r(93433),
                w = r(96572),
                M = (r(7187), r(54061)),
                N = r.n(M),
                _ = (r(14176), r(14293), r(85564), r(39693)),
                T = r.n(_),
                I = (r(1469), r(47037)),
                E = r.n(I),
                S = r(71640),
                C = r.n(S),
                D = r(88705),
                k = (r(52628), r(63105)),
                x = r.n(k),
                L = r(64721),
                O = r.n(L),
                P = r(41609),
                j = r.n(P),
                A = r(45565),
                R = r(8930),
                z = r(45235),
                U = r(81554);

            function F(e, t) {
                return (0, U.Z)(2, arguments),
                    function(e, t) {
                        (0, U.Z)(2, arguments);
                        var r = (0, z.Z)(e),
                            n = (0, R.Z)(t);
                        if (isNaN(n)) return new Date(NaN);
                        if (!n) return r;
                        var a = r.getDate(),
                            i = new Date(r.getTime());
                        return i.setMonth(r.getMonth() + n + 1, 0), a >= i.getDate() ? i : (r.setFullYear(i.getFullYear(), i.getMonth(), a), r)
                    }(e, -(0, R.Z)(t))
            }

            function Z(e, t) {
                (0, U.Z)(2, arguments);
                var r = (0, z.Z)(e),
                    n = (0, z.Z)(t);
                return r.getTime() > n.getTime()
            }
            var G = r(9996),
                H = r(61757);
            const Y = {
                news: {
                    staging: "0a08eade-8a95-4262-bb5f-50af32955175",
                    production: "a577533e-fdc3-4501-b373-8de7aa93b919"
                },
                lending: {
                    production: "e020d991-d7c1-468d-91fd-61e14371c913"
                },
                "SEEC-Alerts": {
                    production: "928fe9a4-f702-4d7a-afed-5b289633be37"
                },
                Bitfinex: {
                    staging: "d2d07e74-e5df-4954-83f5-2cb114714208",
                    production: "bf324e24-5a09-4317-b418-6c37281ab855"
                },
                Santiment_Official: {
                    production: "5ea0aafc-a095-4949-96be-4c015a6e610b"
                },
                TheCoinRepublic: {
                    production: "daf46367-58e8-4d50-958d-fb9cac13603b"
                },
                CryptoBriefing: {
                    production: "ae1e9d51-4934-41c1-9017-96b490c36925"
                },
                ChainNews: {
                    production: "5d716963-65de-4f56-8057-ea5ed5a04833"
                },
                Jinse: {
                    production: "ea7b285a-eadb-401e-97dd-cecc361c24f6"
                },
                TheNewsAsia: {
                    production: "6007bbd5-f82a-4150-b8fd-74781cce2778"
                },
                Bitfinex_Alpha: {
                    staging: "a50a61e6-4cf7-456a-9c1a-2454ec30e3f1",
                    production: "4f8bb1ba-cd4f-46bb-a823-969351f1a2e3"
                },
                GXT_Official: {
                    production: "8dd0df79-69d4-4bdc-a547-6effe623264f"
                },
                STIPS_Oculus: {
                    production: "e0299b09-88e4-4475-b9ea-9e27e4bc1073"
                },
                Xangle: {
                    production: "e828faad-a5d0-4435-925e-46edca397b1c"
                },
                Executium: {
                    production: "e95d81a5-6e0d-48ff-87cd-e74af63d3c13"
                },
                Tether: {
                    production: "4c198502-5988-43d4-96bf-b1d0ddc69744",
                    staging: "df083c99-9547-4df8-977c-6f1627c5461e"
                },
                TradingView: {
                    production: "9e2f29df-c877-44b1-a127-a92f281b60da",
                    staging: "afb3f677-6f65-44ff-bb3e-845abeb97f56"
                }
            };

            function W() {
                const e = (0, H.Gy)();
                return Y.news[e]
            }
            const B = e => {
                    switch (e) {
                        case "zh-CN":
                        case "zh-TW":
                            return "zh";
                        case "es-EM":
                            return "es";
                        case "tr-TR":
                            return "tr";
                        case "pt-BR":
                            return "pt";
                        default:
                            return e
                    }
                },
                V = e => void 0 === e ? e : e ? 1 : 0,
                Q = e => E()(e) && "" !== e ? v()(C()(e, /\s+/g), (e => '"' + e + '"')).join(" ") : null,
                X = e => /^(\$|#)[a-zA-Z]+$/.test(e),
                J = async e => {
                    let {
                        end: t = Date.now(),
                        limit: r = 10,
                        puid: n,
                        tags: a,
                        liked: i,
                        auth: l = !0,
                        forTicker: o,
                        search: s = "",
                        following: u,
                        locale: c,
                        parentId: d,
                        isTrending: f,
                        isWithNews: m,
                        isPublic: g,
                        isPin: h
                    } = e;
                    const p = {
                            end: t,
                            limit: r,
                            puid: n,
                            tags: (() => {
                                if (!a) {
                                    if (!X(s)) return;
                                    const e = s.replace("#", "").replace("$", "");
                                    return l ? [e] : e
                                }
                                return a
                            })(),
                            isPin: V(h),
                            liked: V(i),
                            isPublic: V(g),
                            forTicker: o ? 1 : 0,
                            search: Q(s) || void 0,
                            isFollowing: V(u),
                            locale: c,
                            parent: d,
                            trending: f ? 1 : 0
                        },
                        b = {
                            limit: r,
                            puid: W(),
                            isPublic: 1,
                            locale: c
                        },
                        v = w.stringify(p),
                        M = w.stringify(b);
                    if (i && !l) return (0, D.Ru)({
                        url: "/v2/pulse/liked?" + v,
                        data: p
                    });
                    if (i && l) return (0, D.hi)({
                        url: "/v2/auth/r/pulse/liked",
                        method: "post",
                        data: p
                    });
                    const N = g && !l ? await (0, D.Ru)({
                        url: "/v2/pulse/hist?" + v
                    }) : await (0, D.hi)({
                        url: "/v2/auth/r/pulse/hist",
                        method: "post",
                        data: p
                    });
                    if (!m) return N;
                    const _ = l ? await (0, D.hi)({
                        url: "/v2/auth/r/pulse/hist",
                        method: "post",
                        data: b
                    }) : await (0, D.Ru)({
                        url: "/v2/pulse/hist?" + M
                    });
                    return Promise.resolve({
                        data: [].concat((0, y.Z)(_.data), (0, y.Z)(N.data))
                    })
                };
            var q = r(3674),
                $ = r.n(q);
            const K = function(e) {
                void 0 === e && (e = []);
                const [t, r, , n, a, i, l, o, , , , s, u, c, , d, f] = e;
                return {
                    id: t,
                    registrationDate: r,
                    username: n,
                    displayName: a,
                    pic: i,
                    bio: l,
                    isAdmin: o,
                    followers: s,
                    following: u,
                    isFollowing: c,
                    blockStatus: d,
                    tipStatus: f
                }
            };
            const ee = function(e) {
                    return void 0 === e && (e = []), v()(e, (e => function(e, t) {
                        void 0 === e && (e = []);
                        const r = {
                            set: [],
                            labels: [],
                            schema: t
                        };
                        return e.forEach((e => {
                            const [t, n] = e;
                            r.labels.push([t]), r.set.push(n)
                        })), r
                    }(s()(e, "data"), s()(e, "schema"))))
                },
                te = {
                    id: 0,
                    pubDate: 1,
                    parentId: 2,
                    puid: 3,
                    title: 5,
                    content: 6,
                    poll: 7,
                    isPin: 9,
                    isPublic: 10,
                    commentDisabled: 11,
                    tags: 12,
                    attachments: 13,
                    meta: 14,
                    likes: 15,
                    liked: 16,
                    profile: 18,
                    childCount: 19,
                    isBookmarked: 20,
                    uidLiked: 21,
                    totalViews: 22,
                    uniqueViews: 23
                };

            function re(e) {
                return void 0 === e && (e = []), N()($()(te), ((t, r) => {
                    const n = s()(e, [te[r]]);
                    return t[r] = function(e, t) {
                        switch (e) {
                            case "profile":
                                return K(s()(t, [0]));
                            case "meta":
                                return ee(t);
                            default:
                                return t
                        }
                    }(r, n), t
                }), {})
            }
            var ne = r(8804),
                ae = r.n(ne);
            const ie = c.Lt,
                le = e => {
                    let {
                        tag: t,
                        className: r
                    } = e;
                    return n.createElement("span", {
                        key: t,
                        className: r
                    }, t)
                },
                oe = e => {
                    let {
                        children: t,
                        tagClassName: r,
                        renderer: a
                    } = e;
                    if (!t || !t.length) return null;
                    return v()(n.Children.toArray(t), ((e, t) => {
                        if (e.props || !O()(e, "#") && !O()(e, "$")) return e;
                        const i = N()(C()(e, " "), ((e, t) => (e => !(!l()(e, "#") || e.length < 3 || "#" === e[1] || O()(e, ".")))(t) || (e => !(e.length < 3 || !l()(e, "$") || !e.slice(1).match(/^[a-zA-Z]+$/)))(t) ? e.concat([a({
                            tag: t,
                            className: r
                        }), " "]) : e.concat([t, " "])), []).slice(0, -1);
                        return n.cloneElement(n.createElement(n.Fragment, {
                            key: t
                        }, "tag"), {
                            children: i
                        })
                    }))
                };
            oe.defaultProps = {
                tagClassName: "pulse-green-text",
                renderer: e => {
                    let {
                        tag: t,
                        className: r
                    } = e;
                    return n.createElement("a", {
                        key: t,
                        href: ie + "/search/" + encodeURIComponent(t),
                        className: r
                    }, t)
                }
            };
            var se = oe;
            const ue = e => {
                    const {
                        profile: {
                            username: t
                        },
                        datetimeId: r
                    } = e;
                    return j()(e) ? ie : ie + "/post/" + t + "/" + r
                },
                ce = e => {
                    let {
                        pulse: t
                    } = e;
                    const {
                        title: r,
                        tags: a,
                        profile: i = {}
                    } = t, {
                        username: o
                    } = i, s = ae()(x()(a, (e => !l()(e, "L_") && !l()(e, "N_")))), u = s && !O()(r, "#" + s) ? n.createElement(se, null, "#" + s) : n.createElement("a", {
                        className: "pulse-item__username",
                        href: ie + "/profile/" + o
                    }, "@" + o), c = n.createElement(se, {
                        renderer: le
                    }, r);
                    return n.createElement("div", {
                        className: "pulse-item"
                    }, u, " ", n.createElement("a", {
                        className: "pulse-item__title",
                        href: ue(t)
                    }, c))
                };
            ce.defaultProps = {
                pulse: {}
            };
            var de = ce;
            var fe = e => {
                    let {
                        locale: t
                    } = e;
                    const {
                        t: r
                    } = (0, a.$)("pulses"), {
                        0: i,
                        1: l
                    } = (0, n.useState)(), {
                        0: o,
                        1: s
                    } = (0, n.useState)(0), u = (0, n.useRef)();
                    return (0, n.useEffect)((() => {
                        J({
                            end: Date.now(),
                            isPin: !0,
                            isPublic: !0,
                            auth: !1,
                            forTicker: !0,
                            locale: B(t),
                            isWithNews: !0
                        }).then((e => {
                            let {
                                data: t
                            } = e;
                            const r = v()(t, (e => (e => {
                                return { ...e,
                                    datetimeId: (t = e.pubDate, c.k ? (0, G.TK)(t, "yyyyMMDDHHmmssSSS") : "" + (0, A.format)((0, A.utcToZonedTime)(t, "UTC"), "yyyyMMddHHmmssSSS", {
                                        timeZone: "UTC"
                                    }))
                                };
                                var t
                            })(re(e))));
                            l((e => {
                                const t = new Date,
                                    r = F(t, 1),
                                    n = F(t, 3),
                                    a = x()(e, (e => {
                                        let {
                                            title: t,
                                            isPin: a,
                                            pubDate: i
                                        } = e;
                                        return !j()(t) && Z(i, a ? n : r)
                                    }));
                                return j()(a) ? e : a
                            })(r))
                        }))
                    }), [t]), (0, n.useEffect)((() => {
                        var e;
                        const t = null == u || null === (e = u.current) || void 0 === e ? void 0 : e.offsetWidth;
                        t && s(t / 280)
                    }), [i, s]), n.createElement("div", {
                        className: "pulses"
                    }, n.createElement("div", {
                        className: "pulses__heading"
                    }, n.createElement("a", {
                        href: ie
                    }, n.createElement("div", {
                        className: "pulses__heading-icon"
                    }, n.createElement("img", {
                        src: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjMiIGhlaWdodD0iMTciIHZpZXdCb3g9IjAgMCA1NiA0MiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTM3LjMyOTEgMzAuNUM0MC44NDc5IDI2Ljc1MzEgNDEuOTMwOSAyMS4xNjg3IDQwLjA4NyAxNi4yNSIgc3Ryb2tlPSJ1cmwoI3BhaW50MF9saW5lYXIpIiBzdHJva2Utd2lkdGg9IjIuMzMiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBmaWxsPSJub25lIi8+CjxwYXRoIGQ9Ik0xNC4wNTY5IDcuMzA4NTlDNi45NTM2OCAxNC45Mjk5IDYuOTUzNjggMjcuMzQ1MSAxNC4wNTY5IDM0Ljk3MDQiIHN0cm9rZT0idXJsKCNwYWludDFfbGluZWFyKSIgc3Ryb2tlLXdpZHRoPSIyLjMzIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgZmlsbD0ibm9uZSIvPgo8cGF0aCBkPSJNNDIuNjU3MiAzNC45NzA0QzQ5Ljc2MDUgMjcuMzM2MyA0OS43NjA1IDE0LjkyNjUgNDIuNjU3MiA3LjMwODU5IiBzdHJva2U9InVybCgjcGFpbnQyX2xpbmVhcikiIHN0cm9rZS13aWR0aD0iMi4zMyIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTkuMjkwMiAyQzQuNTg5MyA3LjA4NzQ0IDIgMTMuODM0MyAyIDIxLjAwMkMyIDI4LjE2OTggNC41ODkzIDM0LjkyODcgOS4yOTAyIDQwIiBzdHJva2U9InVybCgjcGFpbnQzX2xpbmVhcikiIHN0cm9rZS13aWR0aD0iMi4zMyIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTQ3LjQyMzMgNDBDNTIuMTI0MiAzNC45MjQyIDU0LjcxMzUgMjguMTgwNyA1NC43MTM1IDIxQzU0LjcxMzUgMTMuODE5MyA1Mi4xMjQyIDcuMDcxNzkgNDcuNDIzMyAyIiBzdHJva2U9InVybCgjcGFpbnQ0X2xpbmVhcikiIHN0cm9rZS13aWR0aD0iMi4zMyIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTE5LjY2NDcgMTEuNUMxNS44NzA1IDE1LjMyNDYgMTQuNzA2OCAyMS4wMjQ5IDE2LjcwMTIgMjYuMDI5NCIgc3Ryb2tlPSJ1cmwoI3BhaW50NV9saW5lYXIpIiBzdHJva2Utd2lkdGg9IjIuMzMiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBmaWxsPSJub25lIi8+CjxwYXRoIGQ9Ik0yOC4zNTY0IDI1LjE5MTJDMzAuODM0MSAyNS4xOTEyIDMyLjg0MjcgMjMuMTg3OCAzMi44NDI3IDIwLjcyMDZDMzIuODQyNyAxOC4yNDk0IDMwLjgzNDEgMTYuMjUgMjguMzU2NCAxNi4yNUMyNS44Nzg3IDE2LjI1IDIzLjg3MDEgMTguMjUzNCAyMy44NzAxIDIwLjcyMDZDMjMuODcwMSAyMy4xODc4IDI1Ljg3ODcgMjUuMTkxMiAyOC4zNTY0IDI1LjE5MTJaIiBzdHJva2U9InVybCgjcGFpbnQ2X2xpbmVhcikiIHN0cm9rZS13aWR0aD0iMi4zMyIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIGZpbGw9Im5vbmUiLz4KPGRlZnM+CjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQwX2xpbmVhciIgeDE9IjM5LjE1MTciIHkxPSIxNi4yNSIgeDI9IjQ0LjIzMTIiIHkyPSIyOC43Mjk5IiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+CjxzdG9wIHN0b3AtY29sb3I9IiMwM0NBOUIiLz4KPHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMDVGRkM0Ii8+CjwvbGluZWFyR3JhZGllbnQ+CjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQxX2xpbmVhciIgeDE9IjExLjM5MzIiIHkxPSI3LjMwODU5IiB4Mj0iMTYuOTU5IiB5Mj0iMzEuODk1NSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPgo8c3RvcCBzdG9wLWNvbG9yPSIjMDNDQTlCIi8+CjxzdG9wIG9mZnNldD0iMSIgc3RvcC1jb2xvcj0iIzAwRkZDMyIvPgo8L2xpbmVhckdyYWRpZW50Pgo8bGluZWFyR3JhZGllbnQgaWQ9InBhaW50Ml9saW5lYXIiIHgxPSI0NS4zMjEiIHkxPSI3LjMwODU5IiB4Mj0iNTQuNjU1MSIgeTI9IjM0LjYyNDIiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj4KPHN0b3Agc3RvcC1jb2xvcj0iIzAzQ0E5QiIvPgo8c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMwMEZGQzMiLz4KPC9saW5lYXJHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJwYWludDNfbGluZWFyIiB4MT0iNS42NDUxIiB5MT0iMiIgeDI9IjE0LjIxMjYiIHkyPSIzOC4yNDA3IiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+CjxzdG9wIHN0b3AtY29sb3I9IiMwM0NBOUIiLz4KPHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMDVGRkM0Ii8+CjwvbGluZWFyR3JhZGllbnQ+CjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQ0X2xpbmVhciIgeDE9IjUxLjA2ODQiIHkxPSIyIiB4Mj0iNjQuMTc4OCIgeTI9IjMyLjgyNjMiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj4KPHN0b3Agc3RvcC1jb2xvcj0iIzAzQ0E5QiIvPgo8c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiMwMEZGQzMiLz4KPC9saW5lYXJHcmFkaWVudD4KPGxpbmVhckdyYWRpZW50IGlkPSJwYWludDVfbGluZWFyIiB4MT0iMTcuNzAyIiB5MT0iMTEuNSIgeDI9IjIzLjMyMzQiIHkyPSIyNi40NjY0IiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+CjxzdG9wIHN0b3AtY29sb3I9IiMwM0NBOUIiLz4KPHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMDRGRkM0Ii8+CjwvbGluZWFyR3JhZGllbnQ+CjxsaW5lYXJHcmFkaWVudCBpZD0icGFpbnQ2X2xpbmVhciIgeDE9IjI4LjM1NjQiIHkxPSIxNi4yNSIgeDI9IjMxLjUxODUiIHkyPSIyNC4xOTY3IiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+CjxzdG9wIHN0b3AtY29sb3I9IiMwM0NBOUIiLz4KPHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMDBGQ0MwIi8+CjwvbGluZWFyR3JhZGllbnQ+CjwvZGVmcz4KPC9zdmc+Cg==",
                        alt: "pulse"
                    })), r("pulse"))), n.createElement("div", {
                        className: "pulses__items"
                    }, n.createElement("div", {
                        className: "pulses__items-animation-wrapper",
                        ref: u,
                        style: {
                            animationDuration: o + "s"
                        }
                    }, v()(i, (e => n.createElement(de, {
                        key: e.id,
                        pulse: e
                    }))), v()(i, (e => n.createElement(de, {
                        key: e.id,
                        pulse: e
                    }))), v()(i, (e => n.createElement(de, {
                        key: e.id,
                        pulse: e
                    }))))))
                },
                me = fe,
                ge = r(7334),
                he = r.n(ge),
                pe = r(13311),
                be = r.n(pe),
                ve = r(52353),
                ye = r.n(ve),
                we = r(84238),
                Me = r.n(we),
                Ne = r(15531),
                _e = r(2228),
                Te = r(57647),
                Ie = r(75900),
                Ee = r.n(Ie),
                Se = r(31320),
                Ce = r.n(Se),
                De = r(32475),
                ke = r.n(De);
            const xe = e => {
                const t = Date.parse(e || new Date) - Date.now(),
                    r = Math.floor(t / 1e3 % 60),
                    n = Math.floor(t / 1e3 / 60 % 60),
                    a = Math.floor(t / 36e5 % 24),
                    i = Math.floor(t / 864e5);
                return {
                    ended: t <= 0,
                    days: Math.max(0, i),
                    hours: Math.max(0, a),
                    minutes: Math.max(0, n),
                    seconds: Math.max(0, r)
                }
            };
            var Le = function(e, t) {
                void 0 === t && (t = ":");
                const {
                    0: r,
                    1: a
                } = (0, n.useState)(xe(e));
                (0, n.useEffect)((() => {
                    let t;
                    const r = () => {
                        const n = xe(e);
                        return a(n), n.ended || (t = setTimeout(r, 1e3)), null
                    };
                    return r(), () => {
                        clearTimeout(t)
                    }
                }), [e]);
                const {
                    ended: i,
                    days: l,
                    hours: o,
                    minutes: s,
                    seconds: u
                } = r, c = l ? [ke()(l, 2, 0)] : [];
                return [
                    [].concat(c, [ke()(o, 2, 0), ke()(s, 2, 0), ke()(u, 2, 0)]).join(t), i
                ]
            };
            const Oe = e => {
                const {
                    banner: t,
                    onClickClose: r
                } = e, {
                    id: i,
                    image_url: l,
                    image_svg: o,
                    title: s,
                    sub_title: u,
                    cta_url: c,
                    cta_text: d,
                    cta_text_alternative: f,
                    type: m,
                    countdown_date: g,
                    custom_css: h
                } = t, [p, b] = Le(g, " : "), {
                    t: v
                } = (0, a.$)("countdown_banner"), y = "countdown" === m, w = y && b ? f : d, M = l ? n.createElement("div", {
                    className: "banners-banner__icon-wrapper"
                }, n.createElement("img", {
                    className: "banners-banner__icon",
                    src: l,
                    alt: ""
                })) : n.createElement("div", {
                    className: "banners-banner__icon-wrapper",
                    dangerouslySetInnerHTML: {
                        __html: Ce().sanitize(o)
                    }
                });
                return n.createElement("div", {
                    className: Ee()("banners-banner", "banners-banner__type-" + m, "" + i)
                }, n.createElement("div", {
                    className: "banners-banner__wrapper"
                }, M, n.createElement("div", {
                    className: "banners-banner__text-and-action-wrapper"
                }, n.createElement("div", {
                    className: "banners-banner__text-wrapper"
                }, n.createElement("h4", {
                    className: "banners-banner__title",
                    dangerouslySetInnerHTML: {
                        __html: Ce().sanitize(s)
                    }
                }), u && n.createElement("p", {
                    className: "banners-banner__subtitle",
                    dangerouslySetInnerHTML: {
                        __html: Ce().sanitize(u)
                    }
                }), y && n.createElement("div", {
                    className: "banners-banner__countdown-wrapper"
                }, n.createElement("span", {
                    className: "banners-banner__starts-in"
                }, v("starts_in")), n.createElement("div", {
                    className: "banners-banner__countdown"
                }, p))), n.createElement("div", {
                    className: "banners-banner__action-wrapper"
                }, n.createElement("a", {
                    className: "banners-banner__action-button",
                    href: c,
                    target: "_blank",
                    rel: "noopener noreferrer",
                    dangerouslySetInnerHTML: {
                        __html: Ce().sanitize(w)
                    }
                })))), n.createElement("div", {
                    className: "banners-banner__close-wrapper"
                }, n.createElement("img", {
                    onClick: r,
                    src: "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTciIGhlaWdodD0iMTciIHZpZXdCb3g9IjAgMCAxNyAxNyIgZmlsbD0id2hpdGUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CiAgPHBhdGggZD0iTTAuMjkyODkzIDEuNzA3MTFMMTUuMjkyOSAxNi43MDcxTDE2LjcwNzEgMTUuMjkyOUwxLjcwNzExIDAuMjkyODkzTDAuMjkyODkzIDEuNzA3MTFaTTEuNzA3MTEgMTYuNzA3MUwxNi43MDcxIDEuNzA3MTFMMTUuMjkyOSAwLjI5Mjg5M0wwLjI5Mjg5MyAxNS4yOTI5TDEuNzA3MTEgMTYuNzA3MVoiLz4KPC9zdmc+Cg==",
                    className: "banners-banner__close",
                    alt: "close"
                })), n.createElement("style", {
                    dangerouslySetInnerHTML: {
                        __html: h
                    }
                }))
            };
            Oe.defaultProps = {
                banner: {},
                onClickClose: () => {}
            };
            var Pe = Oe;
            const je = e => {
                const {
                    0: t,
                    1: r
                } = (0, n.useState)();
                return (0, n.useEffect)((() => {
                    (async () => {
                        const t = await (async () => {
                            const t = "bfx-banner-conf-" + e,
                                r = Te.Z.get(t);
                            if (r) return r;
                            const {
                                data: n
                            } = await (0, _e.NL)(e);
                            return Te.Z.set(t, n)
                        })();
                        r(t)
                    })()
                }), [e]), t
            };
            var Ae = e => {
                let {
                    locale: t,
                    location: r = ""
                } = e;
                const a = he()(t),
                    [i] = je(a) || [],
                    {
                        0: l,
                        1: o
                    } = (0, n.useState)(0),
                    s = x()(i, (e => {
                        const {
                            id: t,
                            location: n,
                            domains: a
                        } = e;
                        if ((e => (0, Ne.Do)(e))(t)) return !1;
                        if (r && !O()(n, r)) return !1;
                        if (!O()(a, H.VJ)) return !1;
                        if ((e => {
                                let {
                                    show_from: t,
                                    show_until: r
                                } = e;
                                return E()(t) && E()(r) && t && r
                            })(e)) {
                            const {
                                show_from: t,
                                show_until: r
                            } = e, n = Date.now();
                            return n >= Date.parse(t) && n < Date.parse(r)
                        }
                        return !0
                    })),
                    {
                        0: u,
                        1: c
                    } = (0, n.useState)(!1);
                if ((0, n.useEffect)((() => {
                        const e = setTimeout((() => {
                            if (!u) {
                                const e = j()(s) ? 0 : (l + 1) % Me()(s);
                                o(e)
                            }
                        }), 5e3);
                        return () => {
                            clearTimeout(e)
                        }
                    }), [u, l, s]), !s.length || ye()(s[l])) return null;
                const d = s[l];
                return n.createElement("div", {
                    onMouseEnter: () => c(!0),
                    onMouseLeave: () => c(!1)
                }, n.createElement(Pe, {
                    key: d.id,
                    banner: d,
                    location: r,
                    onClickClose: () => (e => {
                        const t = be()(i, {
                                id: e
                            }),
                            {
                                hidden_expiration_days: r
                            } = t;
                        (0, Ne.d8)(e, 1, {
                            expires: r
                        }), o((l + 1) % (s.length - 1))
                    })(d.id)
                }))
            };
            var Re = () => {
                    const {
                        i18n: e
                    } = (0, a.$)(), {
                        language: t
                    } = e;
                    return (0, h.QT)(p.$$.PUBLIC_BANNERS) ? n.createElement("div", {
                        className: "app-banners"
                    }, n.createElement(Ae, {
                        locale: t,
                        location: "landing"
                    }), n.createElement(me, {
                        locale: t
                    })) : null
                },
                ze = r(3945),
                Ue = r.n(ze),
                Fe = r(86509),
                Ze = r(12180),
                Ge = r(77970);
            const He = function(e) {
                return void 0 === e && (e = "ALL"), (0, D.Ru)({
                    url: "/v2/status/deriv",
                    params: {
                        keys: e
                    }
                })
            };
            var Ye = r(30731),
                We = r.n(Ye),
                Be = r(91175),
                Ve = r.n(Be);

            function Qe(e) {
                void 0 === e && (e = []);
                const [t, , r, n, , a, , , i, l, , o, , , s, , , u, , , , , c] = e;
                return {
                    mts: t,
                    priceDerivative: r,
                    priceSpot: n,
                    insuranceFundBalance: a,
                    fundingAccruedNext: i,
                    fundingStep: l,
                    fundingAccruedCurrent: o,
                    markPrice: s,
                    spread: r / s - 1,
                    openInterest: u,
                    fundingAccruedNextCap: c
                }
            }
            var Xe = r(17204),
                Je = r.n(Xe);
            var qe = r(52103),
                $e = r(75887),
                Ke = r(798),
                et = r(57043),
                tt = r.n(et),
                rt = r(51237),
                nt = r(31351),
                at = r.n(nt),
                it = r(89734),
                lt = r.n(it),
                ot = r(36968),
                st = r.n(ot),
                ut = r(44908),
                ct = r.n(ut),
                dt = r(7739),
                ft = r.n(dt),
                mt = r(40554),
                gt = r.n(mt),
                ht = r(13880),
                pt = r.n(ht),
                bt = r(84486),
                vt = r.n(bt),
                yt = r(92742),
                wt = r.n(yt),
                Mt = r(26767);
            const Nt = "bfx-ui-public.favs",
                _t = "USTF0",
                Tt = {
                    FAV: "fav",
                    TRADING: "trading",
                    DERIVATIVES: "derivatives",
                    FUNDING: "funding",
                    SECURITIES: "securities"
                },
                It = e => {
                    if (!e) return {};
                    const [t, r] = C()(e, ":"), n = "desc" === r;
                    return {
                        sortBy: gt()(t),
                        reverse: n
                    }
                },
                Et = (e, t, r, n) => {
                    if (j()(t)) return !0;
                    const a = (0, Ze.Gz)(e),
                        i = (0, Ze.Oy)(e),
                        o = C()(he()(t), ","),
                        u = Ue()(a),
                        c = Ue()(i),
                        d = he()(r[u]),
                        f = he()(r[c]),
                        m = he()(s()(n, u, u)),
                        g = he()(s()(n, c, c)),
                        h = [a, i, m, g, "" + a + i, "" + m + g, m + "/" + g, m + ":" + g, m + "-" + g, d, f];
                    return !!be()(o, (e => !!be()(h, (t => l()(t, e)))))
                },
                St = e => {
                    const {
                        symbol: t,
                        searchTerm: r,
                        favs: n,
                        currencyLabels: a,
                        currencySymbols: i,
                        type: l,
                        isSecuritiesSymbol: o,
                        isDerivativeSymbol: s
                    } = e;
                    if (!n[t]) return !1;
                    const u = ((e, t, r, n) => {
                            switch (t) {
                                case Tt.FUNDING:
                                    return (0, Ze.Mu)(e);
                                case Tt.DERIVATIVES:
                                    return r(e);
                                case Tt.SECURITIES:
                                    return n(e);
                                default:
                                    return (0, Ze.vG)(e) && !r(e) && !n(e)
                            }
                        })(t, l, s, o),
                        c = Et(t, r, a, i);
                    return u && c
                },
                Ct = (e, t, r) => {
                    const n = (e => N()(e, ((e, t) => {
                        const r = t[rt.RG.SYMBOL];
                        return (0, Ze.Mu)(r) ? e : { ...e,
                            [r]: t[rt.RG.LAST_PRICE]
                        }
                    }), {}))(e);
                    return v()(e, (e => {
                        const a = e[rt.RG.SYMBOL];
                        if (!(0, Ze.Mu)(a)) {
                            const t = s()(r, [a, "fundingAccruedCurrent"]),
                                i = s()(r, [a, "openInterest"]),
                                {
                                    volumeTotal: l,
                                    volumeTotalEquivalent: o
                                } = ((e, t) => {
                                    const r = e[rt.RG.SYMBOL],
                                        [n, a] = (0, Ze.x)(r),
                                        i = e[rt.RG.VOLUME] * e[rt.RG.LAST_PRICE];
                                    let l = i;
                                    if ((0, Ze.i6)(n) && a !== _t) {
                                        const e = (0, Ze.aG)(a, _t);
                                        l = i * s()(t, e, 0)
                                    }
                                    return {
                                        volumeTotal: i,
                                        volumeTotalEquivalent: l
                                    }
                                })(e, n);
                            return [].concat((0, y.Z)(e), [l, o, t, i])
                        }
                        const i = ((e, t, r) => {
                                const n = e[rt.RG.SYMBOL],
                                    a = Ue()((0, Ze.Gz)(n));
                                if ((0, qe.Mq)(a)) return s()(r, a, 0) * e[rt.hk.VOLUME];
                                return (t[(0, Ze.aG)(a, "USD")] || 0) * e[rt.hk.VOLUME]
                            })(e, n, t),
                            l = 365 * e[rt.hk.FRR],
                            o = 365 * e[rt.hk.LAST_PRICE];
                        return [].concat((0, y.Z)(e), [i, l, o])
                    }))
                };

            function Dt(e) {
                void 0 === e && (e = {});
                const {
                    ticker: t,
                    ccy: r,
                    sortBy: n,
                    searchTerm: a,
                    favs: i,
                    conversions: o,
                    paperCurrencies: s,
                    securitiesCurrencies: u,
                    currencyLabels: c,
                    currencySymbols: d,
                    derivativeInfo: f,
                    type: m,
                    isCst: g
                } = e, {
                    sortBy: h,
                    reverse: p
                } = It(n), b = Ct(t, o, f), v = lt()(b, h), y = e => {
                    const [t] = (0, Ze.x)(e);
                    return O()(u, t)
                }, w = e => {
                    const [t] = (0, Ze.x)(e);
                    return (0, Ze.i6)(t) || g((0, Ze.Qm)(e))
                }, M = x()(v, (e => {
                    const t = e[rt.RG.SYMBOL],
                        [n, o] = (0, Ze.x)(t);
                    return !O()(s, n) && !O()(s, o) && (r === Tt.FAV ? St({
                        symbol: t,
                        searchTerm: a,
                        favs: i,
                        currencyLabels: c,
                        currencySymbols: d,
                        type: m,
                        isDerivativeSymbol: w,
                        isSecuritiesSymbol: y
                    }) : r === Tt.DERIVATIVES ? (e => {
                        const {
                            symbol: t,
                            searchTerm: r,
                            currencyLabels: n,
                            currencySymbols: a,
                            isDerivativeSymbol: i
                        } = e;
                        return i(t) && Et(t, r, n, a)
                    })({
                        symbol: t,
                        searchTerm: a,
                        currencyLabels: c,
                        currencySymbols: d,
                        isDerivativeSymbol: w
                    }) : r === Tt.FUNDING ? (e => {
                        const {
                            symbol: t,
                            searchTerm: r,
                            currencyLabels: n,
                            currencySymbols: a
                        } = e;
                        return (0, Ze.Mu)(t) && Et(t, r, n, a)
                    })({
                        symbol: t,
                        searchTerm: a,
                        currencyLabels: c,
                        currencySymbols: d
                    }) : r === Tt.SECURITIES ? (e => {
                        const {
                            symbol: t,
                            searchTerm: r,
                            currencyLabels: n,
                            currencySymbols: a,
                            securitiesCurrencies: i
                        } = e, [l] = (0, Ze.x)(t);
                        return O()(i, l) && Et(t, r, n, a)
                    })({
                        symbol: t,
                        searchTerm: a,
                        currencyLabels: c,
                        currencySymbols: d,
                        securitiesCurrencies: u
                    }) : (e => {
                        const {
                            symbol: t,
                            ccy: r,
                            searchTerm: n,
                            currencyLabels: a,
                            currencySymbols: i,
                            securitiesCurrencies: o
                        } = e, s = he()(t), [u, c] = (0, Ze.x)(t);
                        if ((0, qe.Mq)(r)) {
                            if (r !== u && r !== c) return !1
                        } else if (c !== r) return !1;
                        return l()(s, Ze.oT) && !O()(o, u) && Et(t, n, a, i)
                    })({
                        symbol: t,
                        ccy: r,
                        searchTerm: a,
                        currencyLabels: c,
                        currencySymbols: d,
                        securitiesCurrencies: u
                    }))
                }));
                return p ? at()(M) : M
            }
            const kt = (e, t) => t[e] || e;
            const xt = function(e, t, r, n) {
                    void 0 === n && (n = "other");
                    return ft()(e, (e => {
                        let [a] = e;
                        const i = (0, Ze.Qm)(a);
                        return t[i] || (r(i) ? "CST" : n)
                    }))
                },
                Lt = {
                    crypto: 10,
                    commodities: 9,
                    other: -10
                },
                Ot = (e, t) => (Lt[t] || 0) - (Lt[e] || 0);
            var Pt = r(56138),
                jt = r(13746),
                At = "data:image/svg+xml;base64,PHN2ZyBkYXRhLWljb249InN0YXIiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDE2IDE2IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik04IDBsMi41IDUuMyA1LjUuOC00IDQuMS45IDUuOEw4IDEzLjMgMy4xIDE2bC45LTUuOC00LTQuMSA1LjUtLjh6IiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjwvcGF0aD48L3N2Zz4=",
                Rt = "data:image/svg+xml;base64,PHN2ZyBkYXRhLWljb249InN0YXItZW1wdHkiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDE2IDE2IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0xNiA2LjExbC01LjUzLS44NEw4IDAgNS41MyA1LjI3IDAgNi4xMWw0IDQuMUwzLjA2IDE2IDggMTMuMjcgMTIuOTQgMTYgMTIgMTAuMjFsNC00LjF6TTQuOTEgMTMuMmwuNTktMy42MkwzIDcuMDJsMy40NS0uNTNMOCAzLjJsMS41NSAzLjI5IDMuNDUuNTMtMi41IDIuNTYuNTkgMy42Mkw4IDExLjQ5IDQuOTEgMTMuMnoiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PC9wYXRoPjwvc3ZnPg==";
            const zt = e => {
                    let {
                        data: t,
                        id: r
                    } = e;
                    return n.createElement(n.Fragment, null, (0, Ze.T4)(t[r]))
                },
                Ut = e => {
                    let {
                        data: t,
                        id: r
                    } = e;
                    return t[r] ? (0, Ze.T4)(100 * t[r]) + "%" : "-"
                },
                Ft = e => {
                    let {
                        data: t,
                        currencySymbols: r
                    } = e;
                    const a = (0, Ze.Oy)(t[rt.RG.SYMBOL], !0),
                        i = t[rt.RG.VOLUME_TOTAL],
                        l = t[rt.RG.VOLUME_TOTAL_EQUIVALENT],
                        o = n.createElement("span", null, (0, Mt.fP)(i) + " " + kt(a, r));
                    if (0 !== l && l !== i) {
                        const e = (0, Mt.fP)(l) + "\n      " + kt(_t, r);
                        return n.createElement(jt.Z, {
                            position: jt.L.BOTTOM,
                            content: e
                        }, o)
                    }
                    return o
                },
                Zt = e => {
                    let {
                        data: t,
                        id: r,
                        currencySymbols: n,
                        pairMapping: a
                    } = e;
                    const i = t[r],
                        l = ((e, t) => s()(t, (0, Ze.Qm)(e), e))(i, a),
                        o = (0, Ze.Gz)(i, !0),
                        u = l === i ? (0, Ze.Oy)(i, !0) : null,
                        c = l === i ? kt(o, n) : l;
                    return u ? c + "/" + kt(u, n) : c
                },
                Gt = function(e) {
                    void 0 === e && (e = {});
                    const {
                        t: t,
                        isDerivative: r = !1
                    } = e, a = [{
                        id: rt.ES,
                        label: "",
                        headerCellClassName: "landing-tickers__fav-column fav-cell",
                        cellClassName: "landing-tickers__fav-column fav-cell",
                        show: !0,
                        Cell: e => {
                            let {
                                isFav: t,
                                toggleFav: r
                            } = e;
                            return n.createElement("button", {
                                onClick: e => {
                                    e.stopPropagation(), r()
                                },
                                className: "landing-tickers__fav-button",
                                type: "button"
                            }, n.createElement(Ke.Q, {
                                src: t ? At : Rt
                            }))
                        }
                    }, {
                        id: rt.RG.SYMBOL,
                        label: t("ticker:symbol"),
                        Cell: Zt,
                        cellClassName: "symbol-col symbol-cell",
                        headerCellClassName: "symbol-cell",
                        show: !0
                    }, {
                        id: rt.RG.LAST_PRICE,
                        label: n.createElement(n.Fragment, null, n.createElement("span", {
                            className: "hide_xs hide_sm"
                        }, t("ticker:last_price")), n.createElement("span", {
                            className: "hide_md hide_lg hide_xl hide_xxl"
                        }, t("ticker:last"))),
                        headerCellClassName: "col-right price-cell",
                        cellClassName: "col-right price-cell",
                        Cell: zt,
                        show: !0
                    }, {
                        id: rt.RG.FUNDING_RATE,
                        label: t("ticker:funding_rate"),
                        headerCellClassName: "col-right funding-rate-cell",
                        cellClassName: "col-right funding-rate-cell",
                        Cell: Ut,
                        show: r
                    }, {
                        id: rt.RG.OPEN_INTEREST,
                        label: t("ticker:open_interest"),
                        headerCellClassName: "col-right open-interest-cell",
                        cellClassName: "col-right open-interest-cell",
                        Cell: e => {
                            let {
                                data: t,
                                id: r
                            } = e;
                            return n.createElement("span", null, (0, Mt.y2)(t[r]))
                        },
                        show: r
                    }, {
                        id: rt.RG.DAILY_CHANGE_PERC,
                        label: n.createElement(n.Fragment, null, n.createElement("span", {
                            className: "hide_xs hide_sm hide_md"
                        }, t("ticker:24change")), n.createElement("span", {
                            className: "hide_lg hide_xl hide_xxl"
                        }, t("ticker:change"))),
                        headerCellClassName: "col-right daily-change-cell",
                        cellClassName: "col-right daily-change-cell",
                        Cell: e => {
                            let {
                                data: t,
                                id: r
                            } = e;
                            return n.createElement("span", {
                                className: Ee()({
                                    "bfx-green-text": t[r] >= 0,
                                    "bfx-red-text": t[r] < 0
                                })
                            }, (0, Ze.ZQ)(t[r]))
                        },
                        show: !0
                    }, {
                        id: rt.RG.HIGH,
                        label: t("ticker:24h_high"),
                        headerCellClassName: "col-right day-high-cell",
                        cellClassName: "col-right day-high-cell",
                        Cell: zt,
                        show: !0
                    }, {
                        id: rt.RG.LOW,
                        label: t("ticker:24h_low"),
                        headerCellClassName: "col-right day-low-cell",
                        cellClassName: "col-right day-low-cell",
                        Cell: zt,
                        show: !0
                    }, {
                        id: rt.RG.VOLUME_TOTAL_EQUIVALENT,
                        label: n.createElement(n.Fragment, null, n.createElement("span", {
                            className: "hide_xs hide_sm"
                        }, t("ticker:24volume")), n.createElement("span", {
                            className: "hide_md hide_lg hide_xl hide_xxl"
                        }, t("ticker:volume"))),
                        headerCellClassName: "col-right volume-cell",
                        cellClassName: "col-right volume-col volume-cell",
                        Cell: Ft,
                        show: !0
                    }];
                    return x()(a, (e => e.show))
                },
                Ht = function(e) {
                    void 0 === e && (e = {});
                    const {
                        t: t
                    } = e;
                    return [{
                        id: rt.ES,
                        label: "",
                        headerCellClassName: "landing-tickers__fav-column fav-cell",
                        cellClassName: "landing-tickers__fav-column fav-cell",
                        Cell: e => {
                            let {
                                isFav: t,
                                toggleFav: r
                            } = e;
                            return n.createElement("button", {
                                onClick: e => {
                                    e.stopPropagation(), r()
                                },
                                className: "landing-tickers__fav-button",
                                type: "button"
                            }, n.createElement(Ke.Q, {
                                src: t ? At : Rt
                            }))
                        }
                    }, {
                        id: rt.hk.SYMBOL,
                        label: n.createElement(n.Fragment, null, n.createElement("span", {
                            className: "hide_xs hide_sm"
                        }, t("ticker:currency")), n.createElement("span", {
                            className: "hide_md hide_lg hide_xl hide_xxl"
                        }, t("ticker:ccy"))),
                        Cell: Zt,
                        cellClassName: "symbol-col symbol-cell",
                        headerCellClassName: "symbol-cell"
                    }, {
                        id: rt.hk.LAST_PRICE,
                        label: t("ticker:last_rate"),
                        headerCellClassName: "col-right price-cell",
                        cellClassName: "col-right price-cell",
                        Cell: Ut
                    }, {
                        id: rt.hk.LAST_PRICE_ANNUALIZED,
                        label: t("ticker:last_rate_apr"),
                        headerCellClassName: "col-right price-annual-cell",
                        cellClassName: "col-right price-annual-cell",
                        Cell: Ut
                    }, {
                        id: rt.hk.FRR,
                        label: n.createElement(n.Fragment, null, n.createElement("span", {
                            className: "hide_xs hide_sm"
                        }, t("ticker:flash_return_rate")), n.createElement("span", {
                            className: "hide_md hide_lg hide_xl hide_xxl"
                        }, t("ticker:frr"))),
                        headerCellClassName: "col-right ffr-cell",
                        cellClassName: "col-right ffr-cell",
                        Cell: Ut
                    }, {
                        id: rt.hk.FRR_ANNUALIZED,
                        label: t("ticker:apr"),
                        headerCellClassName: "col-right apr-cell",
                        cellClassName: "col-right apr-cell",
                        Cell: Ut
                    }, {
                        id: rt.hk.DAILY_CHANGE_PERC,
                        label: n.createElement(n.Fragment, null, n.createElement("span", {
                            className: "hide_xs hide_sm hide_md"
                        }, t("ticker:24change")), n.createElement("span", {
                            className: "hide_lg hide_xl hide_xxl"
                        }, t("ticker:change"))),
                        headerCellClassName: "col-right daily-change-cell",
                        cellClassName: "col-right daily-change-cell",
                        Cell: e => {
                            let {
                                data: t,
                                id: r
                            } = e;
                            return n.createElement("span", {
                                className: Ee()({
                                    "bfx-green-text": t[r] >= 0,
                                    "bfx-red-text": t[r] < 0
                                })
                            }, (0, Ze.ZQ)(t[r]))
                        }
                    }, {
                        id: rt.hk.VOLUME_TOTAL,
                        label: n.createElement(n.Fragment, null, n.createElement("span", {
                            className: "hide_xs hide_sm"
                        }, t("ticker:24volume")), n.createElement("span", {
                            className: "hide_md hide_lg hide_xl hide_xxl"
                        }, t("ticker:volume"))),
                        headerCellClassName: "col-right volume-cell",
                        cellClassName: "col-right volume-col volume-cell",
                        Cell: e => {
                            let {
                                data: t,
                                id: r
                            } = e;
                            return n.createElement("span", null, (0, Mt.fP)(t[r]) + " USD")
                        }
                    }]
                };
            var Yt = r(35219);
            var Wt = function(e) {
                void 0 === e && (e = {});
                const {
                    t: t
                } = (0, a.$)(), {
                    isFunding: r,
                    isDerivative: i,
                    sortBy: l,
                    setSortBy: o
                } = e, {
                    sortBy: s,
                    reverse: u
                } = It(l), c = (0, n.useMemo)((() => r ? Ht({
                    t: t
                }) : Gt({
                    t: t,
                    isDerivative: i
                })), [r, t, i]);
                return n.createElement("thead", null, n.createElement("tr", null, v()(c, (e => {
                    let {
                        label: t,
                        id: r,
                        cellStyle: a,
                        headerCellClassName: i
                    } = e;
                    return n.createElement("th", {
                        key: r + "_" + t,
                        onClick: () => {
                            t && (e => {
                                o(e + ":" + (s === e && u ? "asc" : "desc"))
                            })(r)
                        },
                        className: i,
                        style: a
                    }, t && n.createElement(Yt.Z, {
                        sortAsc: s === r && !u,
                        sortDesc: s === r && u
                    }, t))
                }))))
            };
            var Bt = function(e) {
                void 0 === e && (e = {});
                const {
                    t: t
                } = (0, a.$)(), {
                    data: r = [],
                    isFunding: i,
                    isDerivative: l,
                    currencySymbols: o,
                    pairMapping: s,
                    isFav: u,
                    toggleFav: d,
                    loggedIn: f
                } = e, m = i ? Ht({
                    t: t
                }) : Gt({
                    t: t,
                    isDerivative: l
                });
                return n.createElement("tr", {
                    onClick: () => (() => {
                        if ("undefined" != typeof window) {
                            let e = "" + c.HY + (0, Mt.Z5)(r[rt.RG.SYMBOL]);
                            f || (e += "?demo=true"), window.location.href = e
                        }
                    })()
                }, v()(m, (e => {
                    let {
                        id: t,
                        Cell: a,
                        cellClassName: i,
                        cellStyle: l
                    } = e;
                    return n.createElement("td", {
                        key: t,
                        className: Ee()(i),
                        style: l
                    }, n.createElement(a, {
                        id: t,
                        data: r,
                        currencySymbols: o,
                        pairMapping: s,
                        isFav: u,
                        toggleFav: d
                    }))
                })))
            };
            var Vt = e => {
                    let {
                        data: t,
                        derivativesCcyToCategoryMap: r,
                        isDerivative: a,
                        isFunding: i,
                        isSecurities: l,
                        isCst: o,
                        loggedIn: s,
                        currencySymbols: u,
                        pairMapping: c,
                        favs: d,
                        securitiesCategories: f,
                        securitiesCategoriesMap: m,
                        toggleFav: g
                    } = e;
                    if (a) {
                        const e = xt(t, r, o),
                            a = (e => $()(e).sort(Ot))(e);
                        return n.createElement("tbody", null, v()(a, (t => n.createElement(n.Fragment, {
                            key: t
                        }, n.createElement("tr", null, n.createElement("td", {
                            colSpan: "100%",
                            className: "landing-tickers__category"
                        }, t)), v()(e[t], (e => {
                            const t = e[rt.RG.SYMBOL];
                            return n.createElement(Bt, {
                                key: t,
                                data: e,
                                loggedIn: s,
                                currencySymbols: u,
                                pairMapping: c,
                                isFav: d[t],
                                toggleFav: () => g(t),
                                isDerivative: !0
                            })
                        }))))))
                    }
                    if (l) {
                        const e = N()(f, ((e, r) => {
                            let {
                                id: n,
                                name: a
                            } = r;
                            const i = [];
                            vt()(m, ((e, t) => {
                                n === e && i.push(t)
                            }));
                            const l = x()(t, (e => {
                                let [t] = e;
                                return O()(i, (0, Ze.Gz)(t, !0))
                            }));
                            return j()(l) || e.push({
                                id: n,
                                name: a,
                                rows: l
                            }), e
                        }), []);
                        if (!j()(e)) return n.createElement("tbody", null, v()(e, (e => {
                            let {
                                id: t,
                                name: r,
                                rows: a
                            } = e;
                            return n.createElement(n.Fragment, {
                                key: t
                            }, n.createElement("tr", null, n.createElement("td", {
                                colSpan: "100%",
                                className: "landing-tickers__category"
                            }, r)), v()(a, (e => {
                                const [t] = e;
                                return n.createElement(Bt, {
                                    key: t,
                                    data: e,
                                    loggedIn: s,
                                    currencySymbols: u,
                                    pairMapping: c,
                                    isFav: d[t],
                                    toggleFav: () => g(t),
                                    isDerivative: !0
                                })
                            })))
                        })))
                    }
                    return n.createElement("tbody", null, v()(t, (e => {
                        const t = e[rt.RG.SYMBOL];
                        return n.createElement(Bt, {
                            key: t,
                            isFunding: i,
                            data: e,
                            loggedIn: s,
                            currencySymbols: u,
                            pairMapping: c,
                            isFav: d[t],
                            toggleFav: () => g(t)
                        })
                    })))
                },
                Qt = r(84741);
            var Xt = () => {
                    const {
                        0: e,
                        1: t
                    } = (0, n.useState)([]);
                    (0, n.useEffect)((() => {
                        (0, Qt.ug)([d.sz]).then((e => {
                            let [r] = e;
                            return t(r)
                        }))
                    }), []);
                    return (0, n.useCallback)((t => O()(e, Ue()(t))), [e])
                },
                Jt = r(94814);
            var qt = e => {
                const {
                    ccy: t,
                    tradingSortBy: r,
                    setTradingSortBy: a,
                    fundingSortBy: i,
                    setFundingSortBy: l,
                    searchTerm: o,
                    ticker: s,
                    paperCurrencies: u,
                    securitiesCurrencies: c,
                    securitiesCategories: d,
                    securitiesCategoriesMap: f,
                    currencyLabels: m,
                    currencySymbols: g,
                    pairMapping: h,
                    loggedIn: p,
                    toggleFav: b,
                    favs: v,
                    conversions: y,
                    derivativeInfo: w,
                    derivativesCcyToCategoryMap: M
                } = e, N = t === Tt.FUNDING, _ = t === Tt.DERIVATIVES, T = t === Tt.SECURITIES, I = N ? i : r, E = N ? l : a, S = Xt(), C = (0, n.useMemo)((() => Dt({
                    ccy: t,
                    ticker: s,
                    sortBy: I,
                    searchTerm: o,
                    favs: v,
                    conversions: y,
                    paperCurrencies: u,
                    securitiesCurrencies: c,
                    currencyLabels: m,
                    currencySymbols: g,
                    derivativeInfo: w,
                    isCst: S
                })), [t, I, s, o, v, y, u, c, m, g, w, S]);
                return n.createElement("div", {
                    className: Ee()("landing-tickers", {
                        "landing-tickers__funding-table": N,
                        "landing-tickers__trading-table": !N && !_,
                        "landing-tickers__derivative-table": !N && _
                    })
                }, n.createElement(Jt.Z, null, n.createElement(Wt, {
                    isFunding: N,
                    isDerivative: _,
                    sortBy: I,
                    setSortBy: E
                }), n.createElement(Vt, {
                    data: C,
                    isDerivative: _,
                    isFunding: N,
                    isSecurities: T,
                    isCst: S,
                    loggedIn: p,
                    currencySymbols: g,
                    pairMapping: h,
                    favs: v,
                    securitiesCategories: d,
                    securitiesCategoriesMap: f,
                    toggleFav: b,
                    derivativesCcyToCategoryMap: M
                })))
            };
            var $t = e => {
                    const {
                        ccy: t,
                        tradingSortBy: r,
                        fundingSortBy: i,
                        setTradingSortBy: l,
                        setFundingSortBy: o,
                        searchTerm: s,
                        ticker: u,
                        paperCurrencies: c,
                        currencyLabels: d,
                        currencySymbols: f,
                        securitiesCurrencies: m,
                        securitiesCategories: g,
                        securitiesCategoriesMap: h,
                        pairMapping: p,
                        conversions: b,
                        derivativeInfo: y,
                        loggedIn: w,
                        toggleFav: M,
                        favs: _,
                        derivativesCcyToCategoryMap: T
                    } = e, {
                        t: I
                    } = (0, a.$)(), E = Xt(), S = (0, n.useMemo)((() => Dt({
                        ccy: t,
                        ticker: u,
                        sortBy: r,
                        searchTerm: s,
                        favs: _,
                        conversions: b,
                        paperCurrencies: c,
                        securitiesCurrencies: m,
                        securitiesCategories: g,
                        securitiesCategoriesMap: h,
                        currencyLabels: d,
                        currencySymbols: f,
                        derivativeInfo: y,
                        type: Tt.TRADING,
                        isCst: E
                    })), [t, r, u, s, _, c, m, g, h, d, f, b, y, E]), C = (0, n.useMemo)((() => Dt({
                        ccy: t,
                        ticker: u,
                        sortBy: r,
                        searchTerm: s,
                        favs: _,
                        conversions: b,
                        paperCurrencies: c,
                        securitiesCurrencies: m,
                        securitiesCategoriesMap: h,
                        currencyLabels: d,
                        currencySymbols: f,
                        derivativeInfo: y,
                        type: Tt.SECURITIES,
                        isCst: E
                    })), [t, r, u, s, _, c, m, h, d, f, b, y, E]), D = (0, n.useMemo)((() => N()(g, ((e, t) => {
                        let {
                            id: r
                        } = t;
                        const n = x()(C, (e => {
                            let [t] = e;
                            const [n] = (0, Ze.x)(t);
                            return h[n] === r
                        }));
                        return j()(n) ? e : { ...e,
                            [r]: n
                        }
                    }), {})), [C, g, h]), k = (0, n.useMemo)((() => Dt({
                        ccy: t,
                        ticker: u,
                        sortBy: i,
                        searchTerm: s,
                        favs: _,
                        conversions: b,
                        paperCurrencies: c,
                        currencyLabels: d,
                        currencySymbols: f,
                        type: Tt.DERIVATIVES,
                        isCst: E
                    })), [t, i, u, s, _, c, d, f, b, E]), L = (0, n.useMemo)((() => xt(k, T, E)), [k, T, E]), O = (0, n.useMemo)((() => Dt({
                        ccy: t,
                        ticker: u,
                        sortBy: i,
                        searchTerm: s,
                        favs: _,
                        conversions: b,
                        paperCurrencies: c,
                        currencyLabels: d,
                        currencySymbols: f,
                        type: Tt.FUNDING,
                        isCst: E
                    })), [t, i, u, s, _, c, d, f, b, E]);
                    return n.createElement("div", {
                        className: "landing-tickers__fav-section"
                    }, !j()(S) && n.createElement("div", {
                        className: "landing-tickers__trading-table"
                    }, n.createElement("div", {
                        className: "landing-tickers__heading"
                    }, I("ticker:trading")), n.createElement(Jt.Z, null, n.createElement(Wt, {
                        isFunding: !1,
                        sortBy: r,
                        setSortBy: l
                    }), n.createElement("tbody", null, v()(S, (e => {
                        const t = e[rt.RG.SYMBOL];
                        return n.createElement(Bt, {
                            key: t,
                            isFunding: !1,
                            data: e,
                            loggedIn: w,
                            currencySymbols: f,
                            pairMapping: p,
                            isFav: _[t],
                            toggleFav: () => M(t)
                        })
                    }))))), !j()(C) && n.createElement("div", {
                        className: "landing-tickers__trading-table"
                    }, n.createElement("div", {
                        className: "landing-tickers__heading"
                    }, I("ticker:securities")), n.createElement(Jt.Z, null, n.createElement(Wt, {
                        isFunding: !1,
                        sortBy: r,
                        setSortBy: l
                    }), n.createElement("tbody", null, j()(D) ? v()(C, (e => {
                        const t = e[rt.RG.SYMBOL];
                        return n.createElement(Bt, {
                            key: t,
                            isFunding: !1,
                            data: e,
                            loggedIn: w,
                            currencySymbols: f,
                            pairMapping: p,
                            isFav: _[t],
                            toggleFav: () => M(t)
                        })
                    })) : v()(g, (e => {
                        let {
                            id: t,
                            name: r
                        } = e;
                        const a = D[t];
                        return j()(a) ? null : n.createElement(n.Fragment, {
                            key: t
                        }, n.createElement("tr", null, n.createElement("td", {
                            colSpan: "100%",
                            className: "landing-tickers__derivatives-category"
                        }, r)), v()(a, (e => {
                            const t = e[rt.RG.SYMBOL];
                            return n.createElement(Bt, {
                                key: t,
                                data: e,
                                loggedIn: w,
                                currencySymbols: f,
                                isFav: _[t],
                                toggleFav: () => M(t)
                            })
                        })))
                    }))))), !j()(k) && n.createElement("div", {
                        className: "landing-tickers__derivative-table"
                    }, n.createElement("div", {
                        className: "landing-tickers__heading"
                    }, I("ticker:derivatives")), n.createElement(Jt.Z, null, n.createElement(Wt, {
                        isDerivative: !0,
                        sortBy: r,
                        setSortBy: l
                    }), n.createElement("tbody", null, v()(lt()($()(L)), (e => n.createElement(n.Fragment, {
                        key: e
                    }, n.createElement("tr", null, n.createElement("td", {
                        colSpan: "100%",
                        className: "landing-tickers__derivatives-category"
                    }, e)), v()(L[e], (e => {
                        const t = e[rt.RG.SYMBOL];
                        return n.createElement(Bt, {
                            key: t,
                            data: e,
                            loggedIn: w,
                            currencySymbols: f,
                            isFav: _[t],
                            toggleFav: () => M(t),
                            isDerivative: !0
                        })
                    })))))))), !j()(O) && n.createElement("div", {
                        className: "landing-tickers__funding-table"
                    }, n.createElement("div", {
                        className: "landing-tickers__heading"
                    }, I("ticker:lending")), n.createElement(Jt.Z, null, n.createElement(Wt, {
                        isFunding: !0,
                        sortBy: i,
                        setSortBy: o
                    }), n.createElement("tbody", null, v()(O, (e => {
                        const t = e[rt.RG.SYMBOL];
                        return n.createElement(Bt, {
                            key: t,
                            isFunding: !0,
                            data: e,
                            loggedIn: w,
                            currencySymbols: f,
                            isFav: _[t],
                            toggleFav: () => M(t)
                        })
                    }))))))
                },
                Kt = r(64030);
            const er = e => {
                const {
                    t: t
                } = (0, a.$)(), {
                    ticker: r,
                    fetch: i,
                    fetchCurrencyConfig: l,
                    currencyConfig: o,
                    pairMapping: u,
                    paperCurrencies: c,
                    securitiesCurrencies: d,
                    securitiesCategories: f,
                    securitiesCategoriesMap: m,
                    currencyLabels: g,
                    conversions: b,
                    derivativeInfo: w,
                    loggedIn: M
                } = e, {
                    0: _,
                    1: I
                } = (0, n.useState)({}), {
                    0: E,
                    1: S
                } = (0, n.useState)(""), {
                    0: D,
                    1: k
                } = (0, n.useState)({}), {
                    0: L,
                    1: P
                } = (0, n.useState)(""), {
                    0: A,
                    1: R
                } = (0, n.useState)(rt.RG.VOLUME_TOTAL_EQUIVALENT + ":desc"), {
                    0: z,
                    1: U
                } = (0, n.useState)(rt.hk.VOLUME_TOTAL + ":desc"), F = (0, Kt.Z)();
                (0, n.useEffect)((() => {
                    I(function() {
                        if ("undefined" == typeof window) return {};
                        const e = (0, Ne.Do)(Nt) || "",
                            t = {};
                        return vt()(C()(e, "."), (e => {
                            st()(t, [e], !0)
                        })), t
                    }()), l(), i();
                    const e = setInterval(i, rt.NE);
                    return () => clearInterval(e)
                }), [rt.NE]), (0, n.useEffect)((() => {
                    (async () => {
                        const {
                            data: e
                        } = await (0, Qt.l)(), t = s()(e, "4", []);
                        k(N()(t, ((e, t) => {
                            let [r, n] = t;
                            return { ...e,
                                [r]: n
                            }
                        }), {}))
                    })()
                }), []);
                const Z = (0, n.useMemo)((() => {
                        return e = o, j()(e) ? {} : N()(e, ((e, t) => ({ ...e,
                            [t[0]]: t[1]
                        })), {});
                        var e
                    }), [o]),
                    G = (0, n.useMemo)((() => ((e, t, r, n) => {
                        const a = x()((0, Mt.DE)(e, rt.RG.SYMBOL), (e => !(0, Ze.i6)(e) && !O()(tt()(r, n), e))),
                            i = (0, H.vi)() ? [].concat((0, y.Z)(Mt.jW), (0, y.Z)(x()(a, (e => !(0, qe.Mq)(e))))) : [].concat((0, y.Z)(Mt.xH), (0, y.Z)(a));
                        return v()(ct()(i), (e => {
                            let r = kt(e, t);
                            return (0, qe.vw)(r) && (r = pt()(r, /t$/, "₮")), {
                                key: e,
                                element: r
                            }
                        }))
                    })(r, Z, c, d)), [r, Z, c, d]);
                const Y = v()(x()([{
                        key: Tt.DERIVATIVES,
                        element: t("ticker:derivatives"),
                        show: (0, h.QT)(p.$$.DERIVATIVES)
                    }, {
                        key: Tt.FUNDING,
                        element: t("ticker:lending"),
                        show: (0, h.QT)(p.$$.LENDING_PRODUCTS)
                    }, {
                        key: Tt.SECURITIES,
                        element: t("ticker:securities"),
                        show: (0, h.QT)(p.$$.SECURITIES)
                    }], (e => e.show)), (e => {
                        let {
                            key: t,
                            element: r
                        } = e;
                        return {
                            key: t,
                            element: r
                        }
                    })),
                    W = T()(tt()(G, Y)),
                    B = E || s()(W, [0, "key"]),
                    V = {
                        tradingSortBy: A,
                        setTradingSortBy: R,
                        fundingSortBy: z,
                        setFundingSortBy: U,
                        searchTerm: L,
                        ticker: r,
                        conversions: b,
                        derivativeInfo: w,
                        paperCurrencies: c,
                        securitiesCurrencies: d,
                        securitiesCategories: f,
                        securitiesCategoriesMap: m,
                        currencyLabels: g,
                        currencySymbols: Z,
                        pairMapping: u,
                        loggedIn: M,
                        toggleFav: function(e) {
                            const t = { ..._,
                                [e]: !_[e]
                            };
                            ! function(e) {
                                if ("undefined" == typeof window) return !1;
                                const t = wt()(v()(x()(Object.entries(e), (e => {
                                    let [, t] = e;
                                    return t
                                })), (e => {
                                    let [t] = e;
                                    return t
                                })).join(".").substr(1));
                                (0, Ne.d8)(Nt, t, {
                                    expires: 365
                                })
                            }(t), I(t)
                        },
                        favs: _,
                        derivativesCcyToCategoryMap: D
                    };
                return n.createElement("div", null, n.createElement("div", {
                    className: "landing-tickers__header"
                }, n.createElement(Pt.Z, {
                    key: B,
                    selectedTabId: B,
                    onChange: e => S(e),
                    tabs: W,
                    preItem: n.createElement("a", {
                        className: "landing-tickers__fav-tab",
                        onClick: e => {
                            e.preventDefault(), E === Tt.FAV ? S("") : S(Tt.FAV)
                        }
                    }, n.createElement(Ke.Q, {
                        className: "landing-tickers__star",
                        src: "fav" === E ? At : Rt
                    })),
                    searchTerm: L,
                    setSearchTerm: P
                })), E === Tt.SECURITIES && n.createElement("div", {
                    className: "landing-tickers__securities-legend"
                }, Me()(F) > 1 ? n.createElement($e.c, {
                    i18nKey: "ticker:securities-regulators-legend"
                }, n.createElement("a", {
                    href: "/legal/securities/AIFC/terms",
                    target: "_blank",
                    rel: "noopener noreferrer"
                }, "0"), n.createElement("a", {
                    href: "/legal/securities/El-Salvador/terms",
                    target: "_blank",
                    rel: "noopener noreferrer"
                }, "1")) : n.createElement($e.c, {
                    i18nKey: "ticker:securities-legend"
                }, n.createElement("a", {
                    href: "/legal/securities/terms/",
                    target: "_blank",
                    rel: "noopener noreferrer"
                }, "0"))), E === Tt.FAV ? n.createElement($t, Object.assign({
                    ccy: E
                }, V)) : n.createElement(qt, Object.assign({
                    ccy: B
                }, V)))
            };
            er.defaultProps = {
                ticker: [],
                paperCurrencies: [],
                securitiesCurrencies: [],
                fetch: () => {},
                loggedIn: !1
            };
            var tr = er,
                rr = r(22449);
            var nr = (0, rr.P)((e => {
                    let {
                        loggedIn: t
                    } = e;
                    const {
                        0: r,
                        1: a
                    } = (0, n.useState)([]), {
                        0: i,
                        1: l
                    } = (0, n.useState)([]), {
                        0: o,
                        1: s
                    } = (0, n.useState)({}), {
                        0: u,
                        1: c
                    } = (0, n.useState)([]), {
                        0: f,
                        1: m
                    } = (0, n.useState)([]), {
                        0: g,
                        1: h
                    } = (0, n.useState)({}), {
                        0: p,
                        1: b
                    } = (0, n.useState)({}), {
                        0: y,
                        1: w
                    } = (0, n.useState)({}), {
                        0: M,
                        1: _
                    } = (0, n.useState)({}), {
                        0: T,
                        1: I
                    } = (0, n.useState)({}), E = async () => {
                        const [e, t] = await (0, Qt.ug)([d.g8, d.J5]);
                        _(function(e) {
                            return void 0 === e && (e = []), N()(e, (function(e, t) {
                                let [r, n, a, i, l] = void 0 === t ? [] : t;
                                return e[r] = {
                                    id: r,
                                    name: n,
                                    pair: a,
                                    subPath: i,
                                    company: l
                                }, e
                            }), {})
                        }(e)), I(function(e) {
                            return void 0 === e && (e = []), Je()(e)
                        }(t))
                    }, S = async () => {
                        const {
                            data: e
                        } = await He();
                        w(function(e) {
                            return void 0 === e && (e = []), N()(e, ((e, t) => (e[Ve()(t)] = Qe(We()(t)), e)), {})
                        }(e))
                    }, C = async () => {
                        const {
                            data: e
                        } = await (0, Fe.gp)();
                        a(e);
                        const t = (r = e, x()(v()(r, (e => {
                            const t = e[rt.RG.SYMBOL];
                            return Ue()((0, Ze.Gz)(t))
                        })), qe.Mq));
                        var r;
                        const n = v()(t, (e => (0, Ge.EG)(e, "USD", 18e5))),
                            i = await Promise.all(n);
                        b(((e, t) => N()(e, ((e, r, n) => (e[r] = t[n], e)), {}))(t, i))
                    };
                    return n.createElement(tr, {
                        ticker: r,
                        fetch: () => {
                            S(), E(), C()
                        },
                        currencyConfig: i,
                        paperCurrencies: u,
                        securitiesCurrencies: f,
                        securitiesCategories: M,
                        securitiesCategoriesMap: T,
                        currencyLabels: g,
                        conversions: p,
                        derivativeInfo: y,
                        pairMapping: o,
                        fetchCurrencyConfig: async () => {
                            const [e, t, r, n, a] = await (0, Qt.ug)([d.Cy, d.nj, d.Dt, d.xk, d.$r]);
                            l(e), c(t), m(n), h((0, Mt._w)(r)), s((0, Mt._w)(a))
                        },
                        loggedIn: t
                    })
                }), "LandingTickers"),
                ar = nr,
                ir = r(37062),
                lr = r(497);
            var or = e => {
                let {
                    type: t,
                    value: r
                } = e;
                const {
                    t: i
                } = (0, a.$)("volume_total");
                return n.createElement("div", {
                    className: "volume-totals__item"
                }, n.createElement("div", {
                    className: "volume-totals__figure"
                }, n.createElement(lr.Z, {
                    value: r,
                    symbol: "$",
                    symbolBefore: !0,
                    decimals: 0
                })), n.createElement("div", null, i(t)))
            };
            var sr = e => {
                let {
                    data: t
                } = e;
                return n.createElement("div", {
                    className: "volume-totals"
                }, n.createElement("div", {
                    className: "volume-totals__list"
                }, v()(t, (e => n.createElement(or, {
                    key: e.key,
                    type: e.key,
                    value: e.value
                })))))
            };
            const ur = ["1d", "7d", "30d"];
            var cr = (0, rr.P)((() => {
                    const {
                        0: e,
                        1: t
                    } = (0, n.useState)([]), r = async e => {
                        const {
                            data: t
                        } = await (0, ir.FC)(e);
                        return {
                            key: e,
                            value: t[1]
                        }
                    }, a = (0, n.useCallback)((async () => {
                        const e = await Promise.all(v()(ur, r));
                        t(e)
                    }), []);
                    return (0, n.useEffect)((() => {
                        a()
                    }), [a]), n.createElement(sr, {
                        data: e
                    })
                }), "VolumeTotals"),
                dr = cr,
                fr = r(37469),
                mr = (r(17727), r(88251)),
                gr = r(14177),
                hr = r(71114),
                pr = r(87498),
                br = r(40872);
            const vr = e => {
                let {
                    setSearchTerm: t,
                    searchTerm: r,
                    setSearchResult: i,
                    isSecuritiesPage: l,
                    setSearchTermApplied: o
                } = e;
                const {
                    t: s
                } = (0, a.$)("common"), {
                    0: u,
                    1: c
                } = (0, n.useState)(!1), f = l ? mr.fN : mr.wn, m = (0, n.useCallback)((e => {
                    u || E()(e) && Me()(e) < 3 || (c(!0), f(null, d.Kq, void 0, e).then((t => {
                        let {
                            data: r
                        } = t;
                        i((0, gr.Z)(r)), o(e)
                    })).finally((() => {
                        c(!1)
                    })))
                }), [u, f, i, o]), g = (0, n.useCallback)((e => {
                    13 === e.keyCode && m(r)
                }), [m, r]);
                return (0, n.useEffect)((() => (document.addEventListener("keyup", g), () => {
                    document.removeEventListener("keyup", g)
                })), [g]), n.createElement("div", {
                    className: "posts__search-group"
                }, n.createElement("input", {
                    onChange: e => t(e.target.value),
                    placeholder: s("search"),
                    value: r
                }), n.createElement(Ke.Q, {
                    className: "posts__search-group-icon",
                    src: br.Z
                }), n.createElement("button", {
                    disabled: !r,
                    onClick: () => {
                        t(""), m(void 0)
                    },
                    type: "button"
                }, n.createElement(Ke.Q, {
                    wrapper: "span",
                    src: pr.Z
                })))
            };
            vr.defaultProps = {
                setSearchTerm: () => {},
                searchTerm: ""
            };
            var yr = () => {
                const {
                    0: e,
                    1: t
                } = (0, n.useState)(""), {
                    setSearchTermApplied: r,
                    setSearchResult: a,
                    isSecuritiesPage: i
                } = (0, n.useContext)(hr.cD);
                return n.createElement(vr, {
                    isSecuritiesPage: i,
                    searchTerm: e,
                    setSearchTerm: t,
                    setSearchResult: a,
                    setSearchTermApplied: r
                })
            };
            const wr = e => {
                const {
                    title: t,
                    subtitle: r,
                    type: i,
                    intro: o,
                    button: h,
                    buttonLink: p,
                    video: b,
                    classNamePrefix: v,
                    background: y,
                    forceImg: w,
                    children: M
                } = e, {
                    t: N
                } = (0, a.$)(i), {
                    isAuthenticated: _
                } = (0, fr.Z)(), T = (0, u.useLocation)(), I = s()(T, "pathname", ""), E = l()(I, d.BC) ? "noopener" : "noreferrer noopener", S = "homepage" === i, C = "posts" === i;
                return n.createElement(n.Fragment, null, S && n.createElement(Re, null), n.createElement("div", {
                    className: v + "_wrapper content_wrapper landing-page-main-content",
                    id: i + "_wrapper"
                }, n.createElement("div", {
                    className: "column"
                }, t && n.createElement("div", {
                    className: v + "_title"
                }, t), r && n.createElement("div", {
                    className: v + "_subtitle"
                }, r), C && n.createElement(yr, null), o && n.createElement(n.Fragment, null, n.createElement("div", {
                    className: "lp_intro"
                }, o), M && n.createElement("div", null, M)), h && n.createElement("a", {
                    href: p,
                    target: "_blank",
                    rel: E,
                    className: "lp_button"
                }, n.createElement(m.Z, null, h))), b && n.createElement("div", {
                    className: "column img"
                }, n.createElement("video", {
                    controls: !0,
                    className: "lp_video"
                }, n.createElement("source", {
                    src: b,
                    type: "video/mp4"
                }))), !b && !!y && (t || w) && n.createElement("div", {
                    className: "column img"
                }, n.createElement("img", {
                    alt: t,
                    src: y
                })), S && n.createElement("div", {
                    className: "extra_content"
                }, _ ? n.createElement(g.Z, null, n.createElement("a", {
                    href: c.HY + "/t"
                }, n.createElement(m.Z, null, N("start_trading")))) : n.createElement(g.Z, null, n.createElement(f.Z, null), n.createElement("a", {
                    href: c.HY + "/t?demo=true"
                }, n.createElement(m.Z, {
                    secondary: !0
                }, N("view_demo_btn")))), n.createElement("div", {
                    className: "landing_ticker blue bp3-dark center"
                }, n.createElement(ar, {
                    loggedIn: _
                })), n.createElement("div", {
                    className: "volume_totals blue bp3-dark center"
                }, n.createElement(dr, null)))))
            };
            wr.defaultProps = {
                title: "",
                subtitle: "",
                intro: "",
                button: "",
                buttonLink: "",
                video: "",
                background: "",
                forceImg: !1,
                children: null
            };
            var Mr = wr,
                Nr = r(23493),
                _r = r.n(Nr),
                Tr = r(59704),
                Ir = r.n(Tr),
                Er = r(98371),
                Sr = r(17005);
            const Cr = e => {
                const {
                    label: t,
                    href: r,
                    onClick: i,
                    active: l
                } = e, {
                    t: o
                } = (0, a.$)("inlineLinks");
                return n.createElement("div", {
                    className: Ee()("link_container", {
                        active: l
                    })
                }, n.createElement(Sr.Z, {
                    onClick: i,
                    to: r
                }, o(t)))
            };
            Cr.defaultProps = {
                onClick: () => {},
                active: !1
            };
            var Dr = Cr,
                kr = JSON.parse('[{"label":"platform_features","href":"#platform-features"},{"label":"advanced_features","href":"#advanced-features"}]'),
                xr = JSON.parse('[{"label":"security_policies","href":"#security-policies"},{"label":"user_account_protection","href":"#user-account-protection"},{"label":"cryptocurrency_storage","href":"#cryptocurrency-storage"},{"label":"system_security","href":"#system-security"}]'),
                Lr = JSON.parse('[{"label":"professional_trading","href":"#pro-trading"},{"label":"wider_benefits","href":"#wider-benefits"},{"label":"leading_connectivity","href":"#market-leading-connectivity"}]'),
                Or = JSON.parse('[{"label":"api_doc","href":"#api-keys-documentation"},{"label":"order_funding_books","href":"#order-funding-books"},{"label":"changelog","href":"#changelog"},{"label":"lightning_network","href":"#lightning-network"}]'),
                Pr = r(7506),
                jr = JSON.parse('[{"label":"press","href":"#press"},{"label":"press_downloads","href":"#press-downloads"},{"label":"press_brand_guidelines","href":"#press-brand-guidelines"},{"label":"press_further_resource","href":"#press-further-resource"}]'),
                Ar = JSON.parse('[{"label":"fees_calculator","href":"#fees-calculator"},{"label":"crypto_fees","href":"#crypto-fees"},{"label":"leo_fees_discount","href":"#leo-fees-discounts"},{"label":"trading_fees_discount","href":"#trading-fees-discounts"},{"label":"order_execution","href":"#order-execution"},{"label":"derivatives-order-execution","href":"#derivatives-order-execution"},{"label":"bitfinex-borrow","href":"#bitfinex-borrow"},{"label":"margin_funding","href":"#margin-funding"},{"label":"otc_desk","href":"#otc-desk"},{"label":"p2p-market","href":"#p2p"},{"label":"deposit","href":"#deposit-table"},{"label":"withdrawal","href":"#withdrawal-table"}]'),
                Rr = JSON.parse('[{"label":"fees_calculator","href":"#fees-calculator"},{"label":"leo_fees_discount","href":"#leo-fees-discounts"},{"label":"order_execution","href":"#order-execution"},{"label":"deposit","href":"#deposit-table"},{"label":"withdrawal","href":"#withdrawal-table"},{"label":"capital_raise","href":"#capital-raise-fees"}]'),
                zr = JSON.parse('[{"label":"nutshell","href":"#bitfinex-affiliate-program-in-a-nutshell"},{"label":"why_become_affiliate","href":"#why-become-bitfinex-affiliate"},{"label":"how_it_works","href":"#how-it-works"},{"label":"leo","href":"#unus-sed-leo"}]'),
                Ur = JSON.parse('[{"label":"volume","href":"#volume"},{"label":"rates_on_margin_funding","href":"#rates-on-margin-funding"}]'),
                Fr = JSON.parse('[{"label":"our_story","href":"#our-story"},{"label":"our_manifesto","href":"#our-manifesto"},{"label":"our_culture","href":"#our-culture"},{"label":"leadership","href":"#leadership"},{"label":"our_products","href":"#our-products"},{"label":"contact_us","href":"#contact-list"}]'),
                Zr = JSON.parse('[{"label":"overview","href":"#overview-1"},{"label":"getting_started","href":"#getting-started"}]'),
                Gr = JSON.parse('[{"label":"how_to_buy","href":"#how-to-buy"},{"label":"one_of_the_best","href":"#one-of-the-best"},{"label":"trusted_reliable","href":"#trusted_reliable"},{"label":"other_options","href":"#other_options"},{"label":"cards_whats_next","href":"#cards-whats-next"}]'),
                Hr = JSON.parse('[{"label":"live_on_crypto","href":"#live-on-crypto"},{"label":"about_bitrefill","href":"#about-bitrefill"},{"label":"get_started","href":"#get-started"}]'),
                Yr = r(60433),
                Wr = JSON.parse('[{"label":"what_is_bitcoin","href":"#what-is-bitcoin"},{"label":"why_buy_bitcoin","href":"#why-buy-bitcoin"},{"label":"how_to_buy_bitcoin","href":"#how-to-buy-bitcoin"},{"label":"buy_ln_btc_on_mobile","href":"#buy-ln-btc-on-mobile"},{"label":"what_is_next","href":"#what-is-next"},{"label":"bitcoin_fun_facts","href":"#bitcoin-fun-facts"}]'),
                Br = JSON.parse('[{"label":"terms-and-conditions","href":"#responsible-disclosure-policy"},{"label":"bug-examples","href":"#bug-examples"},{"label":"how-to-send","href":"#how-to-send"},{"label":"reward-guidelines","href":"#reward-guidelines"},{"label":"scope-and-targets","href":"#scope-and-targets"},{"label":"send-report","href":"#send-report"}]'),
                Vr = JSON.parse('[{"label":"what_is_ethereum","href":"#what-is-ethereum"},{"label":"why_buy_ethereum","href":"#why-buy-ethereum"},{"label":"how_to_buy_ethereum","href":"#how-to-buy-ethereum"},{"label":"what_is_next","href":"#what-is-next"},{"label":"ethereum_fun_facts","href":"#ethereum-fun-facts"}]'),
                Qr = JSON.parse('[{"label":"what_is_litecoin","href":"#what-is-litecoin"},{"label":"why_buy_litecoin","href":"#why-buy-litecoin"},{"label":"how_to_buy_litecoin","href":"#how-to-buy-litecoin"},{"label":"what_is_next","href":"#what-is-next"},{"label":"litecoin_fun_facts","href":"#litecoin-fun-facts"}]');
            const Xr = ["#derivatives-order-execution", "#leo-fees-discounts", "#bitfinex-borrow", "#margin-funding", "#otc-desk", "#p2p-market", "#rates-on-margin-funding", "#service_providers", "#fees-calculator"],
                Jr = {
                    [H.w7.default]: ["#crypto-fees", "#trading-fees-discounts"],
                    [H.w7.br]: ["#crypto-fees", "#trading-fees-discounts"],
                    [H.w7.tr]: Xr,
                    [H.w7.com_tr]: Xr,
                    [H.w7.jp]: ["#derivatives-order-execution", "#leo-fees-discounts", "#bitfinex-borrow", "#margin-funding", "#otc-desk", "#rates-on-margin-funding", "#lightning-network", "#fees-calculator"]
                },
                qr = {
                    features: kr,
                    pro: Lr,
                    utilities: Jr[H.VJ] ? x()(Or, (e => {
                        let {
                            href: t
                        } = e;
                        return !O()(Jr[H.VJ], t)
                    })) : Or,
                    policies: Pr,
                    press: jr,
                    fees: Jr[H.VJ] ? x()(Ar, (e => {
                        let {
                            href: t
                        } = e;
                        return !O()(Jr[H.VJ], t)
                    })) : Ar,
                    affiliates: zr,
                    about: Fr,
                    stats: Jr[H.VJ] ? x()(Ur, (e => {
                        let {
                            href: t
                        } = e;
                        return !O()(Jr[H.VJ], t)
                    })) : Ur,
                    "mobile-trading": Zr,
                    "security-policy": xr,
                    cards: Gr,
                    bitrefill: Hr,
                    borrow: Yr,
                    "how-to-buy-bitcoin": Wr,
                    "bug-bounty": Br,
                    "how-to-buy-ethereum": Vr,
                    "how-to-buy-litecoin": Qr
                },
                $r = {
                    fees: Rr
                },
                Kr = new Map,
                en = e => {
                    let {
                        label: t,
                        href: r,
                        isActive: a
                    } = e;
                    const i = (0, n.useRef)();
                    return Kr.set(t, i), n.createElement("span", {
                        key: t,
                        ref: i
                    }, n.createElement(Dr, {
                        active: !!a,
                        label: t,
                        href: r
                    }))
                },
                tn = e => {
                    let {
                        type: t,
                        isSecuritiesPage: r
                    } = e;
                    const {
                        0: a,
                        1: i
                    } = (0, n.useState)(""), o = s()(r ? $r : qr, t), u = (0, n.useCallback)((e => {
                        Ir()(o, (t => {
                            const {
                                href: r,
                                label: n
                            } = t;
                            if (!l()(r, "#")) return !1;
                            try {
                                const t = document.querySelector(r),
                                    a = t && (0, Qt.XS)({
                                        elm: t,
                                        offset: 65
                                    });
                                a && i(n);
                                const {
                                    current: l
                                } = Kr.get(n);
                                return l && a && e.scrollTo(l.offsetLeft - 40, 0), a
                            } catch (a) {
                                return console.warn(a), !1
                            }
                        }))
                    }), [o]), c = (0, n.useCallback)((() => {
                        const e = document.getElementById("links_wrapper");
                        if (!e) return;
                        const t = document.getElementById("lp_container"),
                            r = (0, Qt.XS)({
                                elm: t,
                                offset: 70
                            });
                        e.className = r ? "absolute_position" : "sticky_links", u(e)
                    }), [u]);
                    return (0, n.useEffect)((() => {
                        const e = _r()(c, 100);
                        return window.addEventListener("scroll", e), () => {
                            window.removeEventListener("scroll", e)
                        }
                    }), [c]), o ? n.createElement(Er.X2, {
                        className: "links_wrapper",
                        id: "links_wrapper"
                    }, n.createElement(Er.X2, {
                        className: "content_wrapper"
                    }, v()(o, (e => {
                        let {
                            label: t,
                            href: r
                        } = e;
                        const i = a && a === t;
                        return n.createElement(en, {
                            key: t,
                            isActive: i,
                            label: t,
                            href: r
                        })
                    })))) : null
                };
            tn.defaultProps = {
                type: "",
                isSecuritiesPage: !1
            };
            var rn = tn;
            const nn = e => {
                const {
                    title: t,
                    subtitle: r,
                    type: a,
                    introduction: i,
                    children: l,
                    button: o,
                    buttonLink: s,
                    video: u,
                    isSecuritiesPage: c,
                    forceImg: d
                } = e, f = "/images/" + a + ".png";
                return n.createElement("div", {
                    className: a + "_page lp_container",
                    id: "lp_container"
                }, n.createElement(Mr, {
                    title: t,
                    subtitle: r,
                    intro: i,
                    type: a,
                    background: f,
                    classNamePrefix: "lp",
                    button: o,
                    buttonLink: s,
                    video: u,
                    forceImg: d
                }, l), n.createElement(rn, {
                    isSecuritiesPage: c,
                    type: a
                }))
            };
            var an = nn;
            nn.defaultProps = {
                type: "",
                title: "",
                subtitle: "",
                introduction: "",
                button: "",
                buttonLink: "",
                video: "",
                children: null,
                isSecuritiesPage: !1,
                forceImg: !1
            };
            var ln = an
        },
        35219: function(e, t, r) {
            "use strict";
            r.d(t, {
                Z: function() {
                    return u
                }
            });
            var n = r(67294),
                a = r(75900),
                i = r.n(a),
                l = r(798),
                o = r(59152);
            const s = e => {
                const {
                    children: t,
                    onClick: r,
                    sorting: a,
                    sortAsc: s,
                    sortDesc: u
                } = e;
                return n.createElement("button", {
                    className: i()("landing-table-header-btn", {
                        "landing-table-header-btn__clickable": a
                    }),
                    onClick: r,
                    type: "button"
                }, n.createElement("span", {
                    className: "landing-table-header-btn__content"
                }, t, a && s ? n.createElement(l.Q, {
                    src: "data:image/svg+xml;base64,PHN2ZyBkYXRhLWljb249ImNhcmV0LXVwIiB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTExLjg3IDkuMTdzLjAxIDAgMCAwbC0zLjUtNEM4LjI4IDUuMDcgOC4xNSA1IDggNXMtLjI4LjA3LS4zNy4xN2wtMy41IDRhLjQ5NS40OTUgMCAwMC4zNy44M2g3YS40OTUuNDk1IDAgMDAuMzctLjgzeiIgZmlsbC1ydWxlPSJldmVub2RkIj48L3BhdGg+PC9zdmc+"
                }) : null, a && u ? n.createElement(l.Q, {
                    src: "data:image/svg+xml;base64,PHN2ZyBkYXRhLWljb249ImNhcmV0LWRvd24iIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDE2IDE2IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Ik0xMiA2LjVjMC0uMjgtLjIyLS41LS41LS41aC03YS40OTUuNDk1IDAgMDAtLjM3LjgzbDMuNSA0Yy4wOS4xLjIyLjE3LjM3LjE3cy4yOC0uMDcuMzctLjE3bDMuNS00Yy4wOC0uMDkuMTMtLjIuMTMtLjMzeiIgZmlsbC1ydWxlPSJldmVub2RkIj48L3BhdGg+PC9zdmc+"
                }) : null, !a || s || u ? null : n.createElement(l.Q, {
                    src: o.Z
                })))
            };
            s.defaultProps = {
                children: null,
                onClick: void 0,
                sortAsc: !1,
                sortDesc: !1,
                sorting: !0
            };
            var u = (0, n.memo)(s)
        },
        94814: function(e, t, r) {
            "use strict";
            r.d(t, {
                Z: function() {
                    return o
                }
            });
            var n = r(67294),
                a = r(75900),
                i = r.n(a);
            const l = e => {
                let {
                    striped: t,
                    children: r
                } = e;
                return n.createElement("div", {
                    className: "landing-table"
                }, n.createElement("table", {
                    className: i()({
                        "landing-table__striped": t
                    })
                }, r))
            };
            l.defaultProps = {
                striped: !1,
                children: null
            };
            var o = l
        },
        71114: function(e, t, r) {
            "use strict";
            r.d(t, {
                aY: function() {
                    return h
                },
                cD: function() {
                    return g
                }
            });
            var n = r(93433),
                a = r(67294),
                i = r(41609),
                l = r.n(i),
                o = r(27361),
                s = r.n(o),
                u = r(10928),
                c = r.n(u),
                d = r(88251),
                f = r(14177),
                m = r(87274);
            const g = a.createContext({}),
                h = e => {
                    let {
                        isSecuritiesPage: t,
                        children: r
                    } = e;
                    const {
                        0: i,
                        1: o
                    } = (0, a.useState)([]), {
                        0: u,
                        1: h
                    } = (0, a.useState)(!1), {
                        0: p,
                        1: b
                    } = (0, a.useState)(!1), {
                        0: v,
                        1: y
                    } = (0, a.useState)(), w = t ? d.fN : d.wn, M = (0, a.useCallback)((async () => {
                        h(!0);
                        const e = l()(i) ? null : s()(c()(i), "id"),
                            t = e ? e - 1 : null,
                            {
                                data: r
                            } = await w(t, m.Kq, void 0, v),
                            a = (0, f.Z)(r);
                        o([].concat((0, n.Z)(i), (0, n.Z)(a))), h(!1), l()(a) && b(!0)
                    }), [i, w, v]);
                    (0, a.useEffect)((() => {
                        M()
                    }), []), (0, a.useEffect)((() => {
                        b(!1)
                    }), [v]);
                    const N = (0, a.useMemo)((() => ({
                        setSearchTermApplied: y,
                        setSearchResult: o,
                        posts: i,
                        loading: u,
                        fetch: M,
                        noMorePost: p,
                        isSecuritiesPage: !!t
                    })), [y, o, i, u, M, p, t]);
                    return a.createElement(g.Provider, {
                        value: N
                    }, r)
                }
        },
        88251: function(e, t, r) {
            "use strict";
            r.d(t, {
                du: function() {
                    return c
                },
                fN: function() {
                    return d
                },
                wn: function() {
                    return u
                }
            });
            var n = r(47037),
                a = r.n(n),
                i = r(71640),
                l = r.n(i),
                o = r(88705);
            const s = e => {
                    if (a()(e) && "" !== e) return l()(e, /\s+/g).join(" ")
                },
                u = function(e, t, r, n) {
                    return void 0 === t && (t = 20), void 0 === r && (r = 1), (0, o.Ru)({
                        url: "/v2/posts/hist",
                        params: {
                            id: e,
                            limit: t,
                            type: r,
                            search: s(n)
                        }
                    })
                },
                c = function(e, t) {
                    return void 0 === t && (t = 1), (0, o.Ru)({
                        url: "/v2/posts/hist",
                        params: {
                            start: e,
                            type: t
                        }
                    })
                },
                d = (e, t, r, n) => u(e, t, 5, n)
        },
        37062: function(e, t, r) {
            "use strict";
            r.d(t, {
                FC: function() {
                    return a
                }
            });
            var n = r(88705);
            const a = e => (0, n.Ru)({
                url: "/v2/stats1/vol." + e + ":30m:BFX/last"
            })
        },
        14177: function(e, t, r) {
            "use strict";
            r.d(t, {
                Z: function() {
                    return c
                }
            });
            var n = r(54061),
                a = r.n(n),
                i = r(3674),
                l = r.n(i),
                o = r(35161),
                s = r.n(o);
            const u = {
                id: 0,
                timestamp: 1,
                title: 3,
                description: 4,
                tag: 7
            };

            function c(e) {
                return void 0 === e && (e = []), s()(e, (e => a()(l()(u), ((t, r) => (t[r] = e[u[r]], t)), {})))
            }
        },
        89464: function(e, t, r) {
            var n = r(18674)({
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#39;"
            });
            e.exports = n
        },
        7187: function(e, t, r) {
            var n = r(89464),
                a = r(79833),
                i = /[&<>"']/g,
                l = RegExp(i.source);
            e.exports = function(e) {
                return (e = a(e)) && l.test(e) ? e.replace(i, n) : e
            }
        },
        31351: function(e) {
            var t = Array.prototype.reverse;
            e.exports = function(e) {
                return null == e ? e : t.call(e)
            }
        },
        60433: function(e) {
            "use strict";
            e.exports = JSON.parse('[{"label":"bitfinex_borrow","href":"#bitfinex-borrow"},{"label":"what_is_borrow","href":"#what-is-borrow"},{"label":"why_borrow","href":"#why-borrow"},{"label":"how_to_get_started","href":"#how-to-get-started"},{"label":"faq_borrow","href":"#faq-borrow"}]')
        },
        7506: function(e) {
            "use strict";
            e.exports = JSON.parse('[{"label":"Privacy","href":"/legal/privacy","children":[{"label":"Privacy Statement","href":"/legal/privacy"},{"label":"Cookies Policy","href":"/legal/cookies"}]},{"label":"Exchange Terms","href":"/legal/exchange/terms","children":[{"label":"Terms of Service","href":"/legal/exchange/terms"},{"label":"Risk Disclosure Statement","href":"/legal/exchange/risk"},{"label":"Affiliate Program Terms","href":"/legal/exchange/affiliate-terms"},{"label":"Bitfinex Pulse Terms of Service","href":"/legal/exchange/pulse-terms"},{"label":"P2P Market Place Terms of Service","href":"/legal/exchange/p2p"}]},{"label":"Derivative Terms","href":"/legal/derivative/terms","children":[{"label":"Derivatives Terms of Service","href":"/legal/derivative/terms"},{"label":"Derivative Fee and Margin Schedule","href":"/legal/derivative/fee"},{"label":"Product Descriptions","href":"/legal/derivative/product"},{"label":"Funding Payment Summary","href":"/legal/derivative/funding"},{"label":"Derivative Products Risk Disclosure Statement","href":"/legal/derivative/risk"}]},{"label":"General Notices and Terms","href":"/legal/general/api-terms","children":[{"label":"API Terms of Service","href":"/legal/general/api-terms"},{"label":"Anti-Spam Policy","href":"/legal/general/anti-spam"},{"label":"Law Enforcement Request Policy","href":"/legal/general/law-enforcement-requests-policy"},{"label":"Market Data Terms","href":"/legal/general/market-data"},{"label":"General Rules for Competitions","href":"/legal/general/competitions-terms"},{"label":"Trademark Notices","href":"/legal/general/trademarks"}]},{"label":"Bitfinex Pay Terms","href":"/legal/bitfinex-pay/merchant-terms","children":[{"label":"Bitfinex Pay Merchant Terms","href":"/legal/bitfinex-pay/merchant-terms"},{"label":"Bitfinex Pay End User Terms","href":"/legal/bitfinex-pay/end-user-terms"},{"label":"Bitfinex Pay Privacy Statement","href":"/legal/bitfinex-pay/privacy"}]},{"label":"Token Specific Terms","href":"/legal/token-terms/rrt","children":[{"label":"RRT Token Terms ","href":"/legal/token-terms/rrt"},{"label":"ETH2 Token Terms","href":"/legal/token-terms/ETH2"},{"label":"ETH2Rewards Token Terms","href":"/legal/token-terms/ETH2Rewards"}]},{"label":"Trading Rulebook","href":"/legal/trading-rulebook","children":[]}]')
        }
    }
]);