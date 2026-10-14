(() => {
    var t, i, n, r, o = {
            201: (e, t, i) => {
                "use strict";
                i.d(t, {
                    v: () => n
                });
                const n = e => {
                    e && ("loading" !== document.readyState ? e() : document.addEventListener("DOMContentLoaded", e))
                }
            },
            4278: (e, t, i) => {
                "use strict";
                i.d(t, {
                    d: () => n
                });
                const n = (e, t, i, n = "/") => {
                    let r = `${e}=${encodeURIComponent(t)}`;
                    r += "number" == typeof i ? "; max-age=" + 24 * i * 60 * 60 + "; path=" + n : "; path=" + n, document.cookie = r
                }
            },
            1833: (e, t, i) => {
                var n = i(7763),
                    r = i(5777),
                    o = TypeError;
                e.exports = function(e) {
                    if (n(e)) return e;
                    throw o(r(e) + " is not a function")
                }
            },
            4382: (e, t, i) => {
                var n = i(4298),
                    r = TypeError;
                e.exports = function(e, t) {
                    if (n(t, e)) return e;
                    throw r("Incorrect invocation")
                }
            },
            9682: (e, t, i) => {
                var n = i(7845),
                    r = String,
                    o = TypeError;
                e.exports = function(e) {
                    if (n(e)) return e;
                    throw o(r(e) + " is not an object")
                }
            },
            4106: (e, t, i) => {
                var n = i(6791),
                    r = i(8944),
                    o = i(6731),
                    a = function(e) {
                        return function(t, i, a) {
                            var s, d = n(t),
                                c = o(d),
                                l = r(a, c);
                            if (e && i != i) {
                                for (; c > l;)
                                    if ((s = d[l++]) != s) return !0
                            } else
                                for (; c > l; l++)
                                    if ((e || l in d) && d[l] === i) return e || l || 0;
                            return !e && -1
                        }
                    };
                e.exports = {
                    includes: a(!0),
                    indexOf: a(!1)
                }
            },
            6917: (e, t, i) => {
                var n = i(9682),
                    r = i(7329);
                e.exports = function(e, t, i, o) {
                    try {
                        return o ? t(n(i)[0], i[1]) : t(i)
                    } catch (t) {
                        r(e, "throw", t)
                    }
                }
            },
            2033: (e, t, i) => {
                var n = i(7177),
                    r = n({}.toString),
                    o = n("".slice);
                e.exports = function(e) {
                    return o(r(e), 8, -1)
                }
            },
            9202: (e, t, i) => {
                var n = i(6796),
                    r = i(7763),
                    o = i(2033),
                    a = i(1776)("toStringTag"),
                    s = Object,
                    d = "Arguments" == o(function() {
                        return arguments
                    }());
                e.exports = n ? o : function(e) {
                    var t, i, n;
                    return void 0 === e ? "Undefined" : null === e ? "Null" : "string" == typeof(i = function(e, t) {
                        try {
                            return e[t]
                        } catch (e) {}
                    }(t = s(e), a)) ? i : d ? o(t) : "Object" == (n = o(t)) && r(t.callee) ? "Arguments" : n
                }
            },
            2294: (e, t, i) => {
                var n = i(3702),
                    r = i(2355),
                    o = i(5114),
                    a = i(9397);
                e.exports = function(e, t, i) {
                    for (var s = r(t), d = a.f, c = o.f, l = 0; l < s.length; l++) {
                        var p = s[l];
                        n(e, p) || i && n(i, p) || d(e, p, c(t, p))
                    }
                }
            },
            9700: (e, t, i) => {
                var n = i(1239);
                e.exports = !n((function() {
                    function e() {}
                    return e.prototype.constructor = null, Object.getPrototypeOf(new e) !== e.prototype
                }))
            },
            2259: e => {
                e.exports = function(e, t) {
                    return {
                        value: e,
                        done: t
                    }
                }
            },
            9565: (e, t, i) => {
                var n = i(4116),
                    r = i(9397),
                    o = i(1764);
                e.exports = n ? function(e, t, i) {
                    return r.f(e, t, o(1, i))
                } : function(e, t, i) {
                    return e[t] = i, e
                }
            },
            1764: e => {
                e.exports = function(e, t) {
                    return {
                        enumerable: !(1 & e),
                        configurable: !(2 & e),
                        writable: !(4 & e),
                        value: t
                    }
                }
            },
            6125: (e, t, i) => {
                var n = i(7763),
                    r = i(9397),
                    o = i(8297),
                    a = i(7519);
                e.exports = function(e, t, i, s) {
                    s || (s = {});
                    var d = s.enumerable,
                        c = void 0 !== s.name ? s.name : t;
                    if (n(i) && o(i, c, s), s.global) d ? e[t] = i : a(t, i);
                    else {
                        try {
                            s.unsafe ? e[t] && (d = !0) : delete e[t]
                        } catch (e) {}
                        d ? e[t] = i : r.f(e, t, {
                            value: i,
                            enumerable: !1,
                            configurable: !s.nonConfigurable,
                            writable: !s.nonWritable
                        })
                    }
                    return e
                }
            },
            9717: (e, t, i) => {
                var n = i(6125);
                e.exports = function(e, t, i) {
                    for (var r in t) n(e, r, t[r], i);
                    return e
                }
            },
            7519: (e, t, i) => {
                var n = i(7907),
                    r = Object.defineProperty;
                e.exports = function(e, t) {
                    try {
                        r(n, e, {
                            value: t,
                            configurable: !0,
                            writable: !0
                        })
                    } catch (i) {
                        n[e] = t
                    }
                    return t
                }
            },
            4116: (e, t, i) => {
                var n = i(1239);
                e.exports = !n((function() {
                    return 7 != Object.defineProperty({}, 1, {
                        get: function() {
                            return 7
                        }
                    })[1]
                }))
            },
            9805: e => {
                var t = "object" == typeof document && document.all,
                    i = void 0 === t && void 0 !== t;
                e.exports = {
                    all: t,
                    IS_HTMLDDA: i
                }
            },
            7656: (e, t, i) => {
                var n = i(7907),
                    r = i(7845),
                    o = n.document,
                    a = r(o) && r(o.createElement);
                e.exports = function(e) {
                    return a ? o.createElement(e) : {}
                }
            },
            61: e => {
                e.exports = "undefined" != typeof navigator && String(navigator.userAgent) || ""
            },
            8452: (e, t, i) => {
                var n, r, o = i(7907),
                    a = i(61),
                    s = o.process,
                    d = o.Deno,
                    c = s && s.versions || d && d.version,
                    l = c && c.v8;
                l && (r = (n = l.split("."))[0] > 0 && n[0] < 4 ? 1 : +(n[0] + n[1])), !r && a && (!(n = a.match(/Edge\/(\d+)/)) || n[1] >= 74) && (n = a.match(/Chrome\/(\d+)/)) && (r = +n[1]), e.exports = r
            },
            7081: e => {
                e.exports = ["constructor", "hasOwnProperty", "isPrototypeOf", "propertyIsEnumerable", "toLocaleString", "toString", "valueOf"]
            },
            7584: (e, t, i) => {
                var n = i(7907),
                    r = i(5114).f,
                    o = i(9565),
                    a = i(6125),
                    s = i(7519),
                    d = i(2294),
                    c = i(3678);
                e.exports = function(e, t) {
                    var i, l, p, m, u, f = e.target,
                        g = e.global,
                        b = e.stat;
                    if (i = g ? n : b ? n[f] || s(f, {}) : (n[f] || {}).prototype)
                        for (l in t) {
                            if (m = t[l], p = e.dontCallGetSet ? (u = r(i, l)) && u.value : i[l], !c(g ? l : f + (b ? "." : "#") + l, e.forced) && void 0 !== p) {
                                if (typeof m == typeof p) continue;
                                d(m, p)
                            }(e.sham || p && p.sham) && o(m, "sham", !0), a(i, l, m, e)
                        }
                }
            },
            1239: e => {
                e.exports = function(e) {
                    try {
                        return !!e()
                    } catch (e) {
                        return !0
                    }
                }
            },
            5633: (e, t, i) => {
                var n = i(8344),
                    r = i(1833),
                    o = i(9431),
                    a = n(n.bind);
                e.exports = function(e, t) {
                    return r(e), void 0 === t ? e : o ? a(e, t) : function() {
                        return e.apply(t, arguments)
                    }
                }
            },
            9431: (e, t, i) => {
                var n = i(1239);
                e.exports = !n((function() {
                    var e = function() {}.bind();
                    return "function" != typeof e || e.hasOwnProperty("prototype")
                }))
            },
            3428: (e, t, i) => {
                var n = i(9431),
                    r = Function.prototype.call;
                e.exports = n ? r.bind(r) : function() {
                    return r.apply(r, arguments)
                }
            },
            2810: (e, t, i) => {
                var n = i(4116),
                    r = i(3702),
                    o = Function.prototype,
                    a = n && Object.getOwnPropertyDescriptor,
                    s = r(o, "name"),
                    d = s && "something" === function() {}.name,
                    c = s && (!n || n && a(o, "name").configurable);
                e.exports = {
                    EXISTS: s,
                    PROPER: d,
                    CONFIGURABLE: c
                }
            },
            8344: (e, t, i) => {
                var n = i(2033),
                    r = i(7177);
                e.exports = function(e) {
                    if ("Function" === n(e)) return r(e)
                }
            },
            7177: (e, t, i) => {
                var n = i(9431),
                    r = Function.prototype,
                    o = r.call,
                    a = n && r.bind.bind(o, o);
                e.exports = n ? a : function(e) {
                    return function() {
                        return o.apply(e, arguments)
                    }
                }
            },
            8221: (e, t, i) => {
                var n = i(7907),
                    r = i(7763);
                e.exports = function(e, t) {
                    return arguments.length < 2 ? (i = n[e], r(i) ? i : void 0) : n[e] && n[e][t];
                    var i
                }
            },
            9866: (e, t, i) => {
                var n = i(1833),
                    r = i(9682);
                e.exports = function(e) {
                    return {
                        iterator: e,
                        next: n(r(e).next)
                    }
                }
            },
            9063: (e, t, i) => {
                var n = i(9202),
                    r = i(9177),
                    o = i(1015),
                    a = i(6387),
                    s = i(1776)("iterator");
                e.exports = function(e) {
                    if (!o(e)) return r(e, s) || r(e, "@@iterator") || a[n(e)]
                }
            },
            5018: (e, t, i) => {
                var n = i(3428),
                    r = i(1833),
                    o = i(9682),
                    a = i(5777),
                    s = i(9063),
                    d = TypeError;
                e.exports = function(e, t) {
                    var i = arguments.length < 2 ? s(e) : t;
                    if (r(i)) return o(n(i, e));
                    throw d(a(e) + " is not iterable")
                }
            },
            9177: (e, t, i) => {
                var n = i(1833),
                    r = i(1015);
                e.exports = function(e, t) {
                    var i = e[t];
                    return r(i) ? void 0 : n(i)
                }
            },
            7907: (e, t, i) => {
                var n = function(e) {
                    return e && e.Math == Math && e
                };
                e.exports = n("object" == typeof globalThis && globalThis) || n("object" == typeof window && window) || n("object" == typeof self && self) || n("object" == typeof i.g && i.g) || function() {
                    return this
                }() || Function("return this")()
            },
            3702: (e, t, i) => {
                var n = i(7177),
                    r = i(5894),
                    o = n({}.hasOwnProperty);
                e.exports = Object.hasOwn || function(e, t) {
                    return o(r(e), t)
                }
            },
            8939: e => {
                e.exports = {}
            },
            8606: (e, t, i) => {
                var n = i(8221);
                e.exports = n("document", "documentElement")
            },
            4474: (e, t, i) => {
                var n = i(4116),
                    r = i(1239),
                    o = i(7656);
                e.exports = !n && !r((function() {
                    return 7 != Object.defineProperty(o("div"), "a", {
                        get: function() {
                            return 7
                        }
                    }).a
                }))
            },
            6048: (e, t, i) => {
                var n = i(7177),
                    r = i(1239),
                    o = i(2033),
                    a = Object,
                    s = n("".split);
                e.exports = r((function() {
                    return !a("z").propertyIsEnumerable(0)
                })) ? function(e) {
                    return "String" == o(e) ? s(e, "") : a(e)
                } : a
            },
            1495: (e, t, i) => {
                var n = i(7177),
                    r = i(7763),
                    o = i(8745),
                    a = n(Function.toString);
                r(o.inspectSource) || (o.inspectSource = function(e) {
                    return a(e)
                }), e.exports = o.inspectSource
            },
            8981: (e, t, i) => {
                var n, r, o, a = i(8533),
                    s = i(7907),
                    d = i(7845),
                    c = i(9565),
                    l = i(3702),
                    p = i(8745),
                    m = i(5647),
                    u = i(8939),
                    f = "Object already initialized",
                    g = s.TypeError,
                    b = s.WeakMap;
                if (a || p.state) {
                    var v = p.state || (p.state = new b);
                    v.get = v.get, v.has = v.has, v.set = v.set, n = function(e, t) {
                        if (v.has(e)) throw g(f);
                        return t.facade = e, v.set(e, t), t
                    }, r = function(e) {
                        return v.get(e) || {}
                    }, o = function(e) {
                        return v.has(e)
                    }
                } else {
                    var h = m("state");
                    u[h] = !0, n = function(e, t) {
                        if (l(e, h)) throw g(f);
                        return t.facade = e, c(e, h, t), t
                    }, r = function(e) {
                        return l(e, h) ? e[h] : {}
                    }, o = function(e) {
                        return l(e, h)
                    }
                }
                e.exports = {
                    set: n,
                    get: r,
                    has: o,
                    enforce: function(e) {
                        return o(e) ? r(e) : n(e, {})
                    },
                    getterFor: function(e) {
                        return function(t) {
                            var i;
                            if (!d(t) || (i = r(t)).type !== e) throw g("Incompatible receiver, " + e + " required");
                            return i
                        }
                    }
                }
            },
            9329: (e, t, i) => {
                var n = i(1776),
                    r = i(6387),
                    o = n("iterator"),
                    a = Array.prototype;
                e.exports = function(e) {
                    return void 0 !== e && (r.Array === e || a[o] === e)
                }
            },
            7763: (e, t, i) => {
                var n = i(9805),
                    r = n.all;
                e.exports = n.IS_HTMLDDA ? function(e) {
                    return "function" == typeof e || e === r
                } : function(e) {
                    return "function" == typeof e
                }
            },
            3678: (e, t, i) => {
                var n = i(1239),
                    r = i(7763),
                    o = /#|\.prototype\./,
                    a = function(e, t) {
                        var i = d[s(e)];
                        return i == l || i != c && (r(t) ? n(t) : !!t)
                    },
                    s = a.normalize = function(e) {
                        return String(e).replace(o, ".").toLowerCase()
                    },
                    d = a.data = {},
                    c = a.NATIVE = "N",
                    l = a.POLYFILL = "P";
                e.exports = a
            },
            1015: e => {
                e.exports = function(e) {
                    return null == e
                }
            },
            7845: (e, t, i) => {
                var n = i(7763),
                    r = i(9805),
                    o = r.all;
                e.exports = r.IS_HTMLDDA ? function(e) {
                    return "object" == typeof e ? null !== e : n(e) || e === o
                } : function(e) {
                    return "object" == typeof e ? null !== e : n(e)
                }
            },
            9299: e => {
                e.exports = !1
            },
            291: (e, t, i) => {
                var n = i(8221),
                    r = i(7763),
                    o = i(4298),
                    a = i(7598),
                    s = Object;
                e.exports = a ? function(e) {
                    return "symbol" == typeof e
                } : function(e) {
                    var t = n("Symbol");
                    return r(t) && o(t.prototype, s(e))
                }
            },
            5374: (e, t, i) => {
                var n = i(5633),
                    r = i(3428),
                    o = i(9682),
                    a = i(5777),
                    s = i(9329),
                    d = i(6731),
                    c = i(4298),
                    l = i(5018),
                    p = i(9063),
                    m = i(7329),
                    u = TypeError,
                    f = function(e, t) {
                        this.stopped = e, this.result = t
                    },
                    g = f.prototype;
                e.exports = function(e, t, i) {
                    var b, v, h, j, y, x, w, S = i && i.that,
                        z = !(!i || !i.AS_ENTRIES),
                        C = !(!i || !i.IS_RECORD),
                        T = !(!i || !i.IS_ITERATOR),
                        I = !(!i || !i.INTERRUPTED),
                        P = n(t, S),
                        B = function(e) {
                            return b && m(b, "normal", e), new f(!0, e)
                        },
                        H = function(e) {
                            return z ? (o(e), I ? P(e[0], e[1], B) : P(e[0], e[1])) : I ? P(e, B) : P(e)
                        };
                    if (C) b = e.iterator;
                    else if (T) b = e;
                    else {
                        if (!(v = p(e))) throw u(a(e) + " is not iterable");
                        if (s(v)) {
                            for (h = 0, j = d(e); j > h; h++)
                                if ((y = H(e[h])) && c(g, y)) return y;
                            return new f(!1)
                        }
                        b = l(e, v)
                    }
                    for (x = C ? e.next : b.next; !(w = r(x, b)).done;) {
                        try {
                            y = H(w.value)
                        } catch (e) {
                            m(b, "throw", e)
                        }
                        if ("object" == typeof y && y && c(g, y)) return y
                    }
                    return new f(!1)
                }
            },
            7329: (e, t, i) => {
                var n = i(3428),
                    r = i(9682),
                    o = i(9177);
                e.exports = function(e, t, i) {
                    var a, s;
                    r(e);
                    try {
                        if (!(a = o(e, "return"))) {
                            if ("throw" === t) throw i;
                            return i
                        }
                        a = n(a, e)
                    } catch (e) {
                        s = !0, a = e
                    }
                    if ("throw" === t) throw i;
                    if (s) throw a;
                    return r(a), i
                }
            },
            8769: (e, t, i) => {
                "use strict";
                var n = i(3428),
                    r = i(671),
                    o = i(9565),
                    a = i(9717),
                    s = i(1776),
                    d = i(8981),
                    c = i(9177),
                    l = i(872).IteratorPrototype,
                    p = i(2259),
                    m = i(7329),
                    u = s("toStringTag"),
                    f = "IteratorHelper",
                    g = "WrapForValidIterator",
                    b = d.set,
                    v = function(e) {
                        var t = d.getterFor(e ? g : f);
                        return a(r(l), {
                            next: function() {
                                var i = t(this);
                                if (e) return i.nextHandler();
                                try {
                                    var n = i.done ? void 0 : i.nextHandler();
                                    return p(n, i.done)
                                } catch (e) {
                                    throw i.done = !0, e
                                }
                            },
                            return: function() {
                                var i = t(this),
                                    r = i.iterator;
                                if (i.done = !0, e) {
                                    var o = c(r, "return");
                                    return o ? n(o, r) : p(void 0, !0)
                                }
                                if (i.inner) try {
                                    m(i.inner.iterator, "normal")
                                } catch (e) {
                                    return m(r, "throw", e)
                                }
                                return m(r, "normal"), p(void 0, !0)
                            }
                        })
                    },
                    h = v(!0),
                    j = v(!1);
                o(j, u, "Iterator Helper"), e.exports = function(e, t) {
                    var i = function(i, n) {
                        n ? (n.iterator = i.iterator, n.next = i.next) : n = i, n.type = t ? g : f, n.nextHandler = e, n.counter = 0, n.done = !1, b(this, n)
                    };
                    return i.prototype = t ? h : j, i
                }
            },
            4490: (e, t, i) => {
                "use strict";
                var n = i(3428),
                    r = i(1833),
                    o = i(9682),
                    a = i(9866),
                    s = i(8769),
                    d = i(6917),
                    c = s((function() {
                        var e = this.iterator,
                            t = o(n(this.next, e));
                        if (!(this.done = !!t.done)) return d(e, this.mapper, [t.value, this.counter++], !0)
                    }));
                e.exports = function(e) {
                    return new c(a(this), {
                        mapper: r(e)
                    })
                }
            },
            872: (e, t, i) => {
                "use strict";
                var n, r, o, a = i(1239),
                    s = i(7763),
                    d = i(7845),
                    c = i(671),
                    l = i(2134),
                    p = i(6125),
                    m = i(1776),
                    u = i(9299),
                    f = m("iterator"),
                    g = !1;
                [].keys && ("next" in (o = [].keys()) ? (r = l(l(o))) !== Object.prototype && (n = r) : g = !0), !d(n) || a((function() {
                    var e = {};
                    return n[f].call(e) !== e
                })) ? n = {} : u && (n = c(n)), s(n[f]) || p(n, f, (function() {
                    return this
                })), e.exports = {
                    IteratorPrototype: n,
                    BUGGY_SAFARI_ITERATORS: g
                }
            },
            6387: e => {
                e.exports = {}
            },
            6731: (e, t, i) => {
                var n = i(2985);
                e.exports = function(e) {
                    return n(e.length)
                }
            },
            8297: (e, t, i) => {
                var n = i(7177),
                    r = i(1239),
                    o = i(7763),
                    a = i(3702),
                    s = i(4116),
                    d = i(2810).CONFIGURABLE,
                    c = i(1495),
                    l = i(8981),
                    p = l.enforce,
                    m = l.get,
                    u = String,
                    f = Object.defineProperty,
                    g = n("".slice),
                    b = n("".replace),
                    v = n([].join),
                    h = s && !r((function() {
                        return 8 !== f((function() {}), "length", {
                            value: 8
                        }).length
                    })),
                    j = String(String).split("String"),
                    y = e.exports = function(e, t, i) {
                        "Symbol(" === g(u(t), 0, 7) && (t = "[" + b(u(t), /^Symbol\(([^)]*)\)/, "$1") + "]"), i && i.getter && (t = "get " + t), i && i.setter && (t = "set " + t), (!a(e, "name") || d && e.name !== t) && (s ? f(e, "name", {
                            value: t,
                            configurable: !0
                        }) : e.name = t), h && i && a(i, "arity") && e.length !== i.arity && f(e, "length", {
                            value: i.arity
                        });
                        try {
                            i && a(i, "constructor") && i.constructor ? s && f(e, "prototype", {
                                writable: !1
                            }) : e.prototype && (e.prototype = void 0)
                        } catch (e) {}
                        var n = p(e);
                        return a(n, "source") || (n.source = v(j, "string" == typeof t ? t : "")), e
                    };
                Function.prototype.toString = y((function() {
                    return o(this) && m(this).source || c(this)
                }), "toString")
            },
            5532: e => {
                var t = Math.ceil,
                    i = Math.floor;
                e.exports = Math.trunc || function(e) {
                    var n = +e;
                    return (n > 0 ? i : t)(n)
                }
            },
            671: (e, t, i) => {
                var n, r = i(9682),
                    o = i(9941),
                    a = i(7081),
                    s = i(8939),
                    d = i(8606),
                    c = i(7656),
                    l = i(5647),
                    p = "prototype",
                    m = "script",
                    u = l("IE_PROTO"),
                    f = function() {},
                    g = function(e) {
                        return "<" + m + ">" + e + "</" + m + ">"
                    },
                    b = function(e) {
                        e.write(g("")), e.close();
                        var t = e.parentWindow.Object;
                        return e = null, t
                    },
                    v = function() {
                        try {
                            n = new ActiveXObject("htmlfile")
                        } catch (e) {}
                        var e, t, i;
                        v = "undefined" != typeof document ? document.domain && n ? b(n) : (t = c("iframe"), i = "java" + m + ":", t.style.display = "none", d.appendChild(t), t.src = String(i), (e = t.contentWindow.document).open(), e.write(g("document.F=Object")), e.close(), e.F) : b(n);
                        for (var r = a.length; r--;) delete v[p][a[r]];
                        return v()
                    };
                s[u] = !0, e.exports = Object.create || function(e, t) {
                    var i;
                    return null !== e ? (f[p] = r(e), i = new f, f[p] = null, i[u] = e) : i = v(), void 0 === t ? i : o.f(i, t)
                }
            },
            9941: (e, t, i) => {
                var n = i(4116),
                    r = i(8496),
                    o = i(9397),
                    a = i(9682),
                    s = i(6791),
                    d = i(6673);
                t.f = n && !r ? Object.defineProperties : function(e, t) {
                    a(e);
                    for (var i, n = s(t), r = d(t), c = r.length, l = 0; c > l;) o.f(e, i = r[l++], n[i]);
                    return e
                }
            },
            9397: (e, t, i) => {
                var n = i(4116),
                    r = i(4474),
                    o = i(8496),
                    a = i(9682),
                    s = i(2953),
                    d = TypeError,
                    c = Object.defineProperty,
                    l = Object.getOwnPropertyDescriptor,
                    p = "enumerable",
                    m = "configurable",
                    u = "writable";
                t.f = n ? o ? function(e, t, i) {
                    if (a(e), t = s(t), a(i), "function" == typeof e && "prototype" === t && "value" in i && u in i && !i[u]) {
                        var n = l(e, t);
                        n && n[u] && (e[t] = i.value, i = {
                            configurable: m in i ? i[m] : n[m],
                            enumerable: p in i ? i[p] : n[p],
                            writable: !1
                        })
                    }
                    return c(e, t, i)
                } : c : function(e, t, i) {
                    if (a(e), t = s(t), a(i), r) try {
                        return c(e, t, i)
                    } catch (e) {}
                    if ("get" in i || "set" in i) throw d("Accessors not supported");
                    return "value" in i && (e[t] = i.value), e
                }
            },
            5114: (e, t, i) => {
                var n = i(4116),
                    r = i(3428),
                    o = i(417),
                    a = i(1764),
                    s = i(6791),
                    d = i(2953),
                    c = i(3702),
                    l = i(4474),
                    p = Object.getOwnPropertyDescriptor;
                t.f = n ? p : function(e, t) {
                    if (e = s(e), t = d(t), l) try {
                        return p(e, t)
                    } catch (e) {}
                    if (c(e, t)) return a(!r(o.f, e, t), e[t])
                }
            },
            9930: (e, t, i) => {
                var n = i(5007),
                    r = i(7081).concat("length", "prototype");
                t.f = Object.getOwnPropertyNames || function(e) {
                    return n(e, r)
                }
            },
            8689: (e, t) => {
                t.f = Object.getOwnPropertySymbols
            },
            2134: (e, t, i) => {
                var n = i(3702),
                    r = i(7763),
                    o = i(5894),
                    a = i(5647),
                    s = i(9700),
                    d = a("IE_PROTO"),
                    c = Object,
                    l = c.prototype;
                e.exports = s ? c.getPrototypeOf : function(e) {
                    var t = o(e);
                    if (n(t, d)) return t[d];
                    var i = t.constructor;
                    return r(i) && t instanceof i ? i.prototype : t instanceof c ? l : null
                }
            },
            4298: (e, t, i) => {
                var n = i(7177);
                e.exports = n({}.isPrototypeOf)
            },
            5007: (e, t, i) => {
                var n = i(7177),
                    r = i(3702),
                    o = i(6791),
                    a = i(4106).indexOf,
                    s = i(8939),
                    d = n([].push);
                e.exports = function(e, t) {
                    var i, n = o(e),
                        c = 0,
                        l = [];
                    for (i in n) !r(s, i) && r(n, i) && d(l, i);
                    for (; t.length > c;) r(n, i = t[c++]) && (~a(l, i) || d(l, i));
                    return l
                }
            },
            6673: (e, t, i) => {
                var n = i(5007),
                    r = i(7081);
                e.exports = Object.keys || function(e) {
                    return n(e, r)
                }
            },
            417: (e, t) => {
                "use strict";
                var i = {}.propertyIsEnumerable,
                    n = Object.getOwnPropertyDescriptor,
                    r = n && !i.call({
                        1: 2
                    }, 1);
                t.f = r ? function(e) {
                    var t = n(this, e);
                    return !!t && t.enumerable
                } : i
            },
            3443: (e, t, i) => {
                var n = i(3428),
                    r = i(7763),
                    o = i(7845),
                    a = TypeError;
                e.exports = function(e, t) {
                    var i, s;
                    if ("string" === t && r(i = e.toString) && !o(s = n(i, e))) return s;
                    if (r(i = e.valueOf) && !o(s = n(i, e))) return s;
                    if ("string" !== t && r(i = e.toString) && !o(s = n(i, e))) return s;
                    throw a("Can't convert object to primitive value")
                }
            },
            2355: (e, t, i) => {
                var n = i(8221),
                    r = i(7177),
                    o = i(9930),
                    a = i(8689),
                    s = i(9682),
                    d = r([].concat);
                e.exports = n("Reflect", "ownKeys") || function(e) {
                    var t = o.f(s(e)),
                        i = a.f;
                    return i ? d(t, i(e)) : t
                }
            },
            9380: (e, t, i) => {
                var n = i(1015),
                    r = TypeError;
                e.exports = function(e) {
                    if (n(e)) throw r("Can't call method on " + e);
                    return e
                }
            },
            5647: (e, t, i) => {
                var n = i(6350),
                    r = i(7646),
                    o = n("keys");
                e.exports = function(e) {
                    return o[e] || (o[e] = r(e))
                }
            },
            8745: (e, t, i) => {
                var n = i(7907),
                    r = i(7519),
                    o = "__core-js_shared__",
                    a = n[o] || r(o, {});
                e.exports = a
            },
            6350: (e, t, i) => {
                var n = i(9299),
                    r = i(8745);
                (e.exports = function(e, t) {
                    return r[e] || (r[e] = void 0 !== t ? t : {})
                })("versions", []).push({
                    version: "3.28.0",
                    mode: n ? "pure" : "global",
                    copyright: "© 2014-2023 Denis Pushkarev (zloirock.ru)",
                    license: "https://github.com/zloirock/core-js/blob/v3.28.0/LICENSE",
                    source: "https://github.com/zloirock/core-js"
                })
            },
            1241: (e, t, i) => {
                var n = i(8452),
                    r = i(1239);
                e.exports = !!Object.getOwnPropertySymbols && !r((function() {
                    var e = Symbol();
                    return !String(e) || !(Object(e) instanceof Symbol) || !Symbol.sham && n && n < 41
                }))
            },
            8944: (e, t, i) => {
                var n = i(3770),
                    r = Math.max,
                    o = Math.min;
                e.exports = function(e, t) {
                    var i = n(e);
                    return i < 0 ? r(i + t, 0) : o(i, t)
                }
            },
            6791: (e, t, i) => {
                var n = i(6048),
                    r = i(9380);
                e.exports = function(e) {
                    return n(r(e))
                }
            },
            3770: (e, t, i) => {
                var n = i(5532);
                e.exports = function(e) {
                    var t = +e;
                    return t != t || 0 === t ? 0 : n(t)
                }
            },
            2985: (e, t, i) => {
                var n = i(3770),
                    r = Math.min;
                e.exports = function(e) {
                    return e > 0 ? r(n(e), 9007199254740991) : 0
                }
            },
            5894: (e, t, i) => {
                var n = i(9380),
                    r = Object;
                e.exports = function(e) {
                    return r(n(e))
                }
            },
            335: (e, t, i) => {
                var n = i(3428),
                    r = i(7845),
                    o = i(291),
                    a = i(9177),
                    s = i(3443),
                    d = i(1776),
                    c = TypeError,
                    l = d("toPrimitive");
                e.exports = function(e, t) {
                    if (!r(e) || o(e)) return e;
                    var i, d = a(e, l);
                    if (d) {
                        if (void 0 === t && (t = "default"), i = n(d, e, t), !r(i) || o(i)) return i;
                        throw c("Can't convert object to primitive value")
                    }
                    return void 0 === t && (t = "number"), s(e, t)
                }
            },
            2953: (e, t, i) => {
                var n = i(335),
                    r = i(291);
                e.exports = function(e) {
                    var t = n(e, "string");
                    return r(t) ? t : t + ""
                }
            },
            6796: (e, t, i) => {
                var n = {};
                n[i(1776)("toStringTag")] = "z", e.exports = "[object z]" === String(n)
            },
            5777: e => {
                var t = String;
                e.exports = function(e) {
                    try {
                        return t(e)
                    } catch (e) {
                        return "Object"
                    }
                }
            },
            7646: (e, t, i) => {
                var n = i(7177),
                    r = 0,
                    o = Math.random(),
                    a = n(1..toString);
                e.exports = function(e) {
                    return "Symbol(" + (void 0 === e ? "" : e) + ")_" + a(++r + o, 36)
                }
            },
            7598: (e, t, i) => {
                var n = i(1241);
                e.exports = n && !Symbol.sham && "symbol" == typeof Symbol.iterator
            },
            8496: (e, t, i) => {
                var n = i(4116),
                    r = i(1239);
                e.exports = n && r((function() {
                    return 42 != Object.defineProperty((function() {}), "prototype", {
                        value: 42,
                        writable: !1
                    }).prototype
                }))
            },
            8533: (e, t, i) => {
                var n = i(7907),
                    r = i(7763),
                    o = n.WeakMap;
                e.exports = r(o) && /native code/.test(String(o))
            },
            1776: (e, t, i) => {
                var n = i(7907),
                    r = i(6350),
                    o = i(3702),
                    a = i(7646),
                    s = i(1241),
                    d = i(7598),
                    c = n.Symbol,
                    l = r("wks"),
                    p = d ? c.for || c : c && c.withoutSetter || a;
                e.exports = function(e) {
                    return o(l, e) || (l[e] = s && o(c, e) ? c[e] : p("Symbol." + e)), l[e]
                }
            },
            7733: (e, t, i) => {
                "use strict";
                var n = i(7584),
                    r = i(7907),
                    o = i(4382),
                    a = i(7763),
                    s = i(9565),
                    d = i(1239),
                    c = i(3702),
                    l = i(1776),
                    p = i(872).IteratorPrototype,
                    m = i(9299),
                    u = l("toStringTag"),
                    f = r.Iterator,
                    g = m || !a(f) || f.prototype !== p || !d((function() {
                        f({})
                    })),
                    b = function() {
                        o(this, p)
                    };
                c(p, u) || s(p, u, "Iterator"), !g && c(p, "constructor") && p.constructor !== Object || s(p, "constructor", b), b.prototype = p, n({
                    global: !0,
                    constructor: !0,
                    forced: g
                }, {
                    Iterator: b
                })
            },
            1578: (e, t, i) => {
                "use strict";
                var n = i(7584),
                    r = i(3428),
                    o = i(1833),
                    a = i(9682),
                    s = i(9866),
                    d = i(8769),
                    c = i(6917),
                    l = d((function() {
                        for (var e, t, i = this.iterator, n = this.predicate, o = this.next;;) {
                            if (e = a(r(o, i)), this.done = !!e.done) return;
                            if (t = e.value, c(i, n, [t, this.counter++], !0)) return t
                        }
                    }));
                n({
                    target: "Iterator",
                    proto: !0,
                    real: !0
                }, {
                    filter: function(e) {
                        return new l(s(this), {
                            predicate: o(e)
                        })
                    }
                })
            },
            1377: (e, t, i) => {
                "use strict";
                var n = i(7584),
                    r = i(5374),
                    o = i(1833),
                    a = i(9866);
                n({
                    target: "Iterator",
                    proto: !0,
                    real: !0
                }, {
                    forEach: function(e) {
                        var t = a(this),
                            i = 0;
                        o(e), r(t, (function(t) {
                            e(t, i++)
                        }), {
                            IS_RECORD: !0
                        })
                    }
                })
            },
            5347: (e, t, i) => {
                i(7584)({
                    target: "Iterator",
                    proto: !0,
                    real: !0
                }, {
                    map: i(4490)
                })
            },
            2620: (e, t, i) => {
                var n = {
                    "./Accordions/index.js": [1557, 9, 4921, 1057],
                    "./AccountsListing/index.js": [4484, 9, 4921, 8273, 3864, 2978, 2476],
                    "./AlgoliaSearch/component/index.js": [8613, 9, 4921, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 163, 5821, 4675, 1687, 86, 5351, 2901, 7414, 8273, 1786, 1987, 3304, 3364, 7853, 400, 2464, 8776, 9187, 7033, 1964, 4289],
                    "./AlgoliaSearch/index.js": [1877, 9, 4921, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 163, 5821, 4675, 1687, 86, 5351, 2901, 7414, 8273, 1786, 1987, 3304, 3364, 7853, 400, 2464, 8776, 9187, 7033, 1964, 4289, 9243],
                    "./AnimatedNumbers/index.js": [5002, 9, 4921, 1793],
                    "./AnimatedNumbersSlider/index.js": [9815, 9, 4921, 3014, 2771, 3653],
                    "./Article/index.js": [5575, 9, 4588, 7317, 2490, 3014, 5351, 2901, 9182],
                    "./ArticlePage/index.js": [1326, 9, 4209],
                    "./AuthorImageNavigation/index.js": [8556, 9, 4921, 1987, 2291],
                    "./Awards/index.js": [4306, 9, 1987, 2327],
                    "./AwardsSlider/index.js": [3572, 9, 4921, 3014, 2771, 7909],
                    "./Breadcrumb/index.js": [9499, 9, 4921, 1987, 1370],
                    "./CardsTags/index.js": [3850, 9, 7962],
                    "./ClientSentiment/HistoricalData/index.js": [8357, 9, 4588, 7317, 5385, 7135, 8273, 1786, 9124, 2226, 1472, 2566, 1208],
                    "./ClientSentiment/HistoricalData/plugins/Gradient/index.js": [6965, 9, 2226],
                    "./ClientSentiment/HistoricalData/plugins/HorizontalLabels/index.js": [7369, 9, 1472],
                    "./ClientSentiment/HistoricalData/plugins/Tooltip/index.js": [1447, 9, 9124],
                    "./ClientSentiment/HistoricalData/plugins/VerticalLabels/index.js": [472, 9, 2566],
                    "./ClientSentiment/index.js": [9393, 9, 4588, 7317, 5385, 2490, 8012, 7135, 5351, 2901, 7414, 8273, 1786, 9124, 2226, 1472, 2566, 1208, 9374],
                    "./ClipboardCopy/index.js": [7928, 7, 6036],
                    "./CollapsibleContainer/index.js": [6884, 9, 4921, 6826],
                    "./CookieBanner/index.js": [3184, 9, 7348],
                    "./CountryOffices/index.js": [6628, 9, 4588, 7317, 5385, 2490, 8012, 5351, 2901, 7414, 8273, 1786, 1724],
                    "./CountrySelector/index.js": [8872, 9, 4921, 4588, 7317, 5385, 2490, 8012, 6477, 5351, 2901, 7414, 8273, 1786, 7879],
                    "./CtaMobileSlider/index.js": [2809, 9, 4921, 3014, 2771, 5874, 5089],
                    "./CtaWithModal/index.js": [364, 9, 8114, 2197],
                    "./CurrencyConverter/index.js": [933, 9, 4588, 7317, 5385, 2490, 8012, 163, 4675, 1687, 5351, 2901, 7414, 8273, 1786, 3364, 9187, 771],
                    "./DemoConfirmationCopyUser/index.js": [8950, 7, 3781],
                    "./Dropdown/index.js": [3286, 9, 4921, 1655],
                    "./EconomicCalendar/index.js": [3316, 9, 4921, 9446],
                    "./EducationalQuiz/index.js": [5595, 9, 6789],
                    "./Eligible/index.js": [3855, 9, 3864, 9188],
                    "./EmailCaptureModal/index.js": [7450, 9, 4921, 8114, 6108],
                    "./FAQ/FAQPageWrapper/index.js": [8054, 9, 5351, 5395],
                    "./FAQ/index.js": [9363, 9, 4921, 2670],
                    "./FAQSurveyForm/index.js": [2078, 9, 4921, 8273, 3864, 218],
                    "./FilterGrid/index.js": [3229, 9, 4921, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 6477, 7285, 5351, 2901, 7414, 1786, 9957, 7962, 5061, 9182, 1482, 6181],
                    "./Filters/index.js": [2962, 9, 4921, 4588, 7317, 5385, 3014, 5977, 6477, 5351, 2901, 9957],
                    "./Footer/index.js": [8295, 7, 9652],
                    "./Forms/Checkbox/index.js": [9377, 9, 9211],
                    "./Forms/CountriesSelect/index.js": [8940, 9, 8305],
                    "./Forms/CountryAndPhoneSelectSync/index.js": [6335, 9, 5385, 6588],
                    "./Forms/Disabled/index.js": [5599, 9, 3351, 1164],
                    "./Forms/FloatingLables/index.js": [7207, 9, 4921, 3351, 674],
                    "./Forms/GoogleClientId/index.js": [9829, 7, 4921, 6923],
                    "./Forms/LimitedTextarea/index.js": [7076, 9, 4921, 6730],
                    "./Forms/OpenInPopup/index.js": [1609, 9, 3181],
                    "./Forms/Password/index.js": [7463, 9, 8885],
                    "./Forms/PhoneCodeSelect/index.js": [2429, 9, 4921, 6627],
                    "./Forms/PlaceholderSelect/index.js": [8429, 9, 1849],
                    "./Forms/Recaptcha/index.js": [9691, 9, 2219],
                    "./Forms/RegionsSelect/index.js": [5442, 9, 4921, 8273, 6911],
                    "./Forms/Select/index.js": [3313, 9, 4921, 6477, 3911],
                    "./Forms/Turnstile/index.js": [9934, 9, 3351, 4955],
                    "./Forms/Validate/index.js": [9566, 7, 796],
                    "./Forms/index.js": [986, 9, 4921, 3351, 8560],
                    "./GTMDataLayer/index.js": [1136, 7, 3495],
                    "./GenericTable/index.js": [7919, 9, 4921, 5087, 1434],
                    "./GeoIpCountry/index.js": [6250, 7, 7753],
                    "./GeoIpModal/index.js": [7588, 9, 4921, 6060, 5567, 2189],
                    "./GlobalSearchBox/index.js": [2888, 9, 7997],
                    "./Glossary/index.js": [8052, 9, 4921, 9214],
                    "./HeaderWithMegamenu/index.js": [8697, 7, 965],
                    "./HeadingSearchBox/index.js": [3400, 9, 8273, 3864, 2393, 6032, 4263, 6407],
                    "./HelpIconModal/index.js": [181, 9, 6060, 2254],
                    "./InfoIcon/index.js": [2908, 9, 6060, 321],
                    "./InstrumentDetailTabs/index.js": [8968, 9, 4921, 6619],
                    "./InstrumentHeadingBar/index.js": [1050, 9, 4588, 7317, 5385, 2490, 8012, 5351, 2901, 7414, 7915, 9080],
                    "./InstrumentHeadingBar_New/index.js": [7523, 9, 4588, 7317, 5385, 2490, 8012, 3014, 5351, 2901, 7414, 2207],
                    "./InstrumentPageModal/index.js": [2342, 7, 1053],
                    "./InstrumentPricingBar/index.js": [9722, 9, 4588, 7317, 5385, 2490, 8012, 5351, 2901, 7414, 3304, 7915, 3897, 8575],
                    "./InstrumentPricingBar_New/index.js": [5143, 9, 4588, 7317, 5385, 2490, 8012, 5351, 2901, 7414, 3304, 7915, 3897, 7188],
                    "./InstrumentTiles/index.js": [2934, 9, 4921, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 163, 5821, 4675, 1687, 5351, 2901, 7414, 8273, 1786, 1987, 3304, 3364, 7853, 400, 2464, 8776, 9187, 7033, 1964, 8123],
                    "./InteractivePivotPoints/index.js": [1627, 9, 4921, 4588, 7317, 5385, 2490, 8012, 163, 5821, 5351, 2901, 7414, 8273, 1786, 3364, 7016, 5302, 907],
                    "./LanguageSwitcher/index.js": [2545, 9, 2978, 4657],
                    "./LeadershipTeam/index.js": [5610, 9, 1987, 7905],
                    "./LessonSidebar/index.js": [8691, 9, 4921, 240],
                    "./LessonSurvey/index.js": [4927, 9, 4921, 7781],
                    "./LinkList/index.js": [7659, 9, 1579],
                    "./Login/index.js": [9918, 9, 4921, 3351, 5567, 6641],
                    "./MIArticle/index.js": [690, 9, 4588, 7317, 3014, 7285, 5351, 2901, 2142],
                    "./MISearchGrid/index.js": [4422, 9, 4921, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 6477, 7285, 5351, 2901, 7414, 1786, 9957, 2142, 5061, 1482, 2169, 1981],
                    "./MITagArticles/index.js": [7337, 9, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 7285, 5351, 2901, 7414, 8273, 1786, 2142, 5061, 2169, 7907],
                    "./MapOffices/index.js": [8110, 9, 4921, 5874, 9880],
                    "./MapRegulations/index.js": [9034, 9, 4921, 5159],
                    "./MapTradingHours/index.js": [5353, 9, 8988],
                    "./MarginPipCalculator/index.js": [148, 9, 4921, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 163, 5821, 5351, 2901, 7414, 8273, 1786, 3364, 400, 8776, 5464],
                    "./MarketPrices/index.js": [2619, 9, 4921, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 163, 5821, 4675, 1687, 5351, 2901, 7414, 8273, 1786, 1987, 3304, 3364, 7853, 400, 2464, 8776, 9187, 7033, 1964, 9616],
                    "./MarketsHoliday/index.js": [6320, 9, 4921, 5808],
                    "./Menu/index.js": [4726, 9, 2978, 2634],
                    "./NotificationsBadge/index.js": [1203, 9, 4057],
                    "./NotificationsList/index.js": [1202, 9, 4921, 9265],
                    "./NotificationsWidget/index.js": [2774, 9, 4921, 6060, 6843],
                    "./PageHeading/index.js": [8815, 9, 9040],
                    "./PersonalizationTabs/index.js": [5675, 9, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 5351, 2901, 7414, 3219],
                    "./PivotPoints/index.js": [8229, 9, 4921, 4588, 7317, 5385, 2490, 8012, 5351, 2901, 7414, 7016, 5302, 6755],
                    "./PivotPointsTab/index.js": [3560, 9, 4921, 4588, 7317, 5385, 2490, 8012, 5351, 2901, 7414, 7016, 2302],
                    "./PresentationalVideo/index.js": [8719, 9, 7738, 1355],
                    "./ProfessionalNav/index.js": [1052, 7, 1573],
                    "./Progressbar/index.js": [8539, 9, 4921, 8273, 3864, 2051],
                    "./Quiz/index.js": [5480, 9, 4921, 8273, 6060, 8264],
                    "./RateDisplay/index.js": [1007, 9, 4588, 7317, 5385, 2490, 8012, 5351, 2901, 7414, 3304, 1730],
                    "./RatesBar/index.js": [2141, 9, 4588, 7317, 5385, 2490, 8012, 5977, 5351, 2901, 7414, 3304, 7853, 400, 585],
                    "./RatesTable/index.js": [9788, 9, 4921, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 163, 5821, 4675, 1687, 5351, 2901, 7414, 8273, 1786, 1987, 3304, 3364, 7853, 400, 2464, 8776, 9187, 7033, 1964, 9048],
                    "./RegionalSwitcher/index.js": [5980, 7, 2856],
                    "./SXATabs/index.js": [7703, 9, 4921, 5351, 4605],
                    "./SearchGrid/index.js": [1342, 9, 8273, 3864, 2978, 7962, 6032, 7736],
                    "./SearchResults/index.js": [5846, 9, 1001],
                    "./SectionSearchBox/index.js": [266, 9, 3864, 2393, 5610],
                    "./SidebarNavigation/index.js": [2548, 9, 4921, 1533],
                    "./StickyAnchors/index.js": [6768, 9, 4921, 5087, 5007],
                    "./StickyCTA/index.js": [1516, 9, 2524],
                    "./StickyContainer/index.js": [7819, 9, 5942],
                    "./Submenu/index.js": [7828, 9, 4921, 1987, 849],
                    "./TableWithSearch/index.js": [584, 9, 4588, 2978, 6895],
                    "./Tabs/index.js": [9118, 9, 4921, 8474, 337],
                    "./TabsContainer/index.js": [4449, 9, 4921, 1987, 2854],
                    "./TabsWithFilters/index.js": [9211, 9, 4921, 5821, 5351, 8273, 3864, 2978, 6032, 4263, 4288],
                    "./TabsWithImages/index.js": [8771, 9, 4921, 8474, 6673],
                    "./Teasers/index.js": [1051, 9, 4921, 9563],
                    "./TestimonialsSlider/index.js": [3772, 9, 4921, 3014, 2771, 5874, 7211],
                    "./Timeline/index.js": [5941, 9, 4921, 2415],
                    "./TradingCourseList/index.js": [4075, 9, 4921, 7140],
                    "./TradingViewChart/index.js": [3259, 9, 2531],
                    "./TypicalSpreads/index.js": [4203, 9, 4588, 7317, 5385, 2490, 8012, 3014, 163, 5351, 2901, 7414, 8273, 1786, 7033, 8731],
                    "./Umbrella/index.js": [4789, 9, 1112],
                    "./Video/index.js": [2174, 9, 6060, 2978, 3796],
                    "./WarningBanner/index.js": [6900, 9, 5096],
                    "./WebinarRegistration/index.js": [7657, 9, 4921, 4966, 6060, 3351, 9733],
                    "./WebinarsListing/index.js": [6460, 9, 4921, 4588, 7317, 5385, 2490, 8012, 3014, 5977, 163, 4675, 1687, 9894, 3412, 5351, 2901, 7414, 1786, 7853, 2464, 2823, 4926],
                    "./WebinarsTimer/index.js": [259, 9, 4588, 7317, 5385, 2490, 8012, 4675, 9894, 5351, 2901, 7414, 2823, 2213],
                    "./WistiaIframe/index.js": [281, 9, 5985],
                    "./ZoomImg/index.js": [6689, 9, 2509]
                };

                function r(e) {
                    if (!i.o(n, e)) return Promise.resolve().then((() => {
                        var t = new Error("Cannot find module '" + e + "'");
                        throw t.code = "MODULE_NOT_FOUND", t
                    }));
                    var t = n[e],
                        r = t[0];
                    return Promise.all(t.slice(2).map(i.e)).then((() => i.t(r, 16 | t[1])))
                }
                r.keys = () => Object.keys(n), r.id = 2620, e.exports = r
            },
            5380: (e, t, i) => {
                var n = {
                    "./PageSelector/index.js": [1749, 1317]
                };

                function r(e) {
                    if (!i.o(n, e)) return Promise.resolve().then((() => {
                        var t = new Error("Cannot find module '" + e + "'");
                        throw t.code = "MODULE_NOT_FOUND", t
                    }));
                    var t = n[e],
                        r = t[0];
                    return i.e(t[1]).then((() => i(r)))
                }
                r.keys = () => Object.keys(n), r.id = 5380, e.exports = r
            },
            5311: e => {
                "use strict";
                e.exports = jQuery
            }
        },
        a = {};

    function s(e) {
        var t = a[e];
        if (void 0 !== t) return t.exports;
        var i = a[e] = {
            exports: {}
        };
        return o[e].call(i.exports, i, i.exports, s), i.exports
    }
    s.m = o, s.amdO = {}, s.n = e => {
        var t = e && e.__esModule ? () => e.default : () => e;
        return s.d(t, {
            a: t
        }), t
    }, i = Object.getPrototypeOf ? e => Object.getPrototypeOf(e) : e => e.__proto__, s.t = function(e, n) {
        if (1 & n && (e = this(e)), 8 & n) return e;
        if ("object" == typeof e && e) {
            if (4 & n && e.__esModule) return e;
            if (16 & n && "function" == typeof e.then) return e
        }
        var r = Object.create(null);
        s.r(r);
        var o = {};
        t = t || [null, i({}), i([]), i(i)];
        for (var a = 2 & n && e;
            "object" == typeof a && !~t.indexOf(a); a = i(a)) Object.getOwnPropertyNames(a).forEach((t => o[t] = () => e[t]));
        return o.default = () => e, s.d(r, o), r
    }, s.d = (e, t) => {
        for (var i in t) s.o(t, i) && !s.o(e, i) && Object.defineProperty(e, i, {
            enumerable: !0,
            get: t[i]
        })
    }, s.f = {}, s.e = (e, t) => Promise.all(Object.keys(s.f).reduce(((i, n) => (s.f[n](e, i, t), i)), [])), s.u = e => 4588 === e ? "4588-pre-optimized-min.js?v=207f7da647a881f7f0e4" : 7317 === e ? "7317-pre-optimized-min.js?v=78ee81d3b7d001e766a4" : 5385 === e ? "5385-pre-optimized-min.js?v=cab2054d3fccf20c7fee" : 2490 === e ? "2490-pre-optimized-min.js?v=ec4f1c069506108eed75" : 8012 === e ? "8012-pre-optimized-min.js?v=71ad07fc693073eac0d6" : 5351 === e ? "5351-pre-optimized-min.js?v=80969351531fb047d4f0" : 2901 === e ? "2901-pre-optimized-min.js?v=e0f7cb0255a64242c72a" : 7414 === e ? "PreactwidgetContainer-pre-optimized-min.js?v=f99cdb4fd022210d2d5f" : 4921 === e ? "4921-pre-optimized-min.js?v=9498f1797ba9a2959c47" : 1057 === e ? "Accordions-pre-optimized-min.js?v=ed4e30ce19e9b179ce8a" : 8273 === e ? "8273-pre-optimized-min.js?v=1ddd5f43d382f936b23d" : 3864 === e ? "3864-pre-optimized-min.js?v=9b1d45d94d83353cc43d" : 2978 === e ? "2978-pre-optimized-min.js?v=7dffe2d55f315cfcde21" : 2476 === e ? "AccountsListing-pre-optimized-min.js?v=348a153910ae832fba72" : 3014 === e ? "3014-pre-optimized-min.js?v=43e98b976c82e3583030" : 5977 === e ? "5977-pre-optimized-min.js?v=2e52f106efe8381ca6bb" : 163 === e ? "163-pre-optimized-min.js?v=768c45e971b6f6c79880" : 5821 === e ? "5821-pre-optimized-min.js?v=da6ec24dfc271169b336" : 4675 === e ? "4675-pre-optimized-min.js?v=a9331a8b63839f8c8cf8" : 1687 === e ? "1687-pre-optimized-min.js?v=c7cae718fc6b6f906010" : 86 === e ? "86-pre-optimized-min.js?v=2af96e48a4dcd2fce12b" : 1786 === e ? "1786-pre-optimized-min.js?v=648107d910664c79e345" : 1987 === e ? "1987-pre-optimized-min.js?v=aa3bffdd3c963d7be260" : 3304 === e ? "3304-pre-optimized-min.js?v=38eca9ea454207696efd" : 3364 === e ? "3364-pre-optimized-min.js?v=8897aacca12a387cc7e2" : 7853 === e ? "7853-pre-optimized-min.js?v=063096605a3688d90fed" : 400 === e ? "400-pre-optimized-min.js?v=12dd6958d88dc5668c4d" : 2464 === e ? "2464-pre-optimized-min.js?v=f28c50a8c32b3e690ead" : 8776 === e ? "8776-pre-optimized-min.js?v=0f00da030a109d2ce338" : 9187 === e ? "9187-pre-optimized-min.js?v=9cb124607c7d52a07a0a" : 7033 === e ? "7033-pre-optimized-min.js?v=1343e6915d422e98552c" : 1964 === e ? "1964-pre-optimized-min.js?v=471a61b0170460826dd2" : 4289 === e ? "AlgoliaSearch-component-pre-optimized-min.js?v=7ccce9c36f3bcc959c7e" : 9243 === e ? "AlgoliaSearch-pre-optimized-min.js?v=a52ffd71b1694809da1d" : 1793 === e ? "AnimatedNumbers-pre-optimized-min.js?v=8f68016901752620f568" : 2771 === e ? "2771-pre-optimized-min.js?v=fd74f19536ce05532e8e" : 3653 === e ? "AnimatedNumbersSlider-pre-optimized-min.js?v=52b130521269a0d1033c" : 9182 === e ? "Article-pre-optimized-min.js?v=0646ae9c3970464b87bd" : 4209 === e ? "ArticlePage-pre-optimized-min.js?v=a955e33e7ac075cb7e5c" : 2291 === e ? "AuthorImageNavigation-pre-optimized-min.js?v=2e652b918fef0560276a" : 2327 === e ? "Awards-pre-optimized-min.js?v=173845b1647d17b33ce4" : 7909 === e ? "AwardsSlider-pre-optimized-min.js?v=a4be5f6a7b4da7b492bf" : 1370 === e ? "Breadcrumb-pre-optimized-min.js?v=91c4398dc027e7f0a38d" : 7962 === e ? "CardsTags-pre-optimized-min.js?v=38249348debb32f0927c" : 7135 === e ? "7135-pre-optimized-min.js?v=72670b6e9e66c07b953d" : 9124 === e ? "ClientSentiment-HistoricalData-plugins-Tooltip-pre-optimized-min.js?v=a857e5463f594c306bb0" : 2226 === e ? "ClientSentiment-HistoricalData-plugins-Gradient-pre-optimized-min.js?v=a303d3e51d53a2953353" : 1472 === e ? "ClientSentiment-HistoricalData-plugins-HorizontalLabels-pre-optimized-min.js?v=df2558a23909f34cb17d" : 2566 === e ? "ClientSentiment-HistoricalData-plugins-VerticalLabels-pre-optimized-min.js?v=a18f34b51c3d116aec9c" : 1208 === e ? "ClientSentiment-HistoricalData-pre-optimized-min.js?v=e57abb7772aed980a8c8" : 9374 === e ? "ClientSentiment-pre-optimized-min.js?v=891554545141887cb655" : 6036 === e ? "ClipboardCopy-pre-optimized-min.js?v=25245b5e85182ffe4cfc" : 6826 === e ? "CollapsibleContainer-pre-optimized-min.js?v=6479fc4ebdfee02ef8a2" : 7348 === e ? "CookieBanner-pre-optimized-min.js?v=c9c68c0a73a12a7d8847" : 1724 === e ? "CountryOffices-pre-optimized-min.js?v=358d25f13aad51860a7e" : 6477 === e ? "6477-pre-optimized-min.js?v=991ab663c6d16f28d771" : 7879 === e ? "CountrySelector-pre-optimized-min.js?v=c3725264bbdc6835e4c2" : 5874 === e ? "5874-pre-optimized-min.js?v=64c4f374552705dd2461" : 5089 === e ? "CtaMobileSlider-pre-optimized-min.js?v=a38d01d2bacb78f82eb9" : 8114 === e ? "8114-pre-optimized-min.js?v=a159ab3019149c8b8944" : 2197 === e ? "CtaWithModal-pre-optimized-min.js?v=1ba0a7f05b7741095109" : 771 === e ? "CurrencyConverter-pre-optimized-min.js?v=0af338ec2d8cee277be3" : 3781 === e ? "DemoConfirmationCopyUser-pre-optimized-min.js?v=8021e09f3cb1ddff001f" : 1655 === e ? "Dropdown-pre-optimized-min.js?v=763cbd4c43579984f3d2" : 9446 === e ? "EconomicCalendar-pre-optimized-min.js?v=9631e83ee544f125ee18" : 6789 === e ? "EducationalQuiz-pre-optimized-min.js?v=69d29c5c0e4051cdb82d" : 9188 === e ? "Eligible-pre-optimized-min.js?v=aadf6d2b2808407d90bf" : 6108 === e ? "EmailCaptureModal-pre-optimized-min.js?v=03e48989b13080dceac0" : 5395 === e ? "FAQ-FAQPageWrapper-pre-optimized-min.js?v=9c8eb17695b3ab29b44f" : 2670 === e ? "FAQ-pre-optimized-min.js?v=aa619a0b817831e80558" : 218 === e ? "FAQSurveyForm-pre-optimized-min.js?v=23c56c42faef3436e1d6" : 7285 === e ? "7285-pre-optimized-min.js?v=9b51105a02bc69c1d484" : 9957 === e ? "Filters-pre-optimized-min.js?v=776627951397645c7008" : 5061 === e ? "5061-pre-optimized-min.js?v=a0cec5be73e2d6a296ca" : 1482 === e ? "1482-pre-optimized-min.js?v=7e2e983c5a9eaeb6334d" : 6181 === e ? "FilterGrid-pre-optimized-min.js?v=aff4e9263104c431fa9e" : 9652 === e ? "Footer-pre-optimized-min.js?v=27f2e6f2496774eb4e33" : 9211 === e ? "Forms-Checkbox-pre-optimized-min.js?v=1b5cf5d2c374cb8c75f3" : 8305 === e ? "Forms-CountriesSelect-pre-optimized-min.js?v=8bc0c539ebf8c315d9bf" : 6588 === e ? "Forms-CountryAndPhoneSelectSync-pre-optimized-min.js?v=601738042a82f9e2f1d6" : 3351 === e ? "3351-pre-optimized-min.js?v=e08bbe0f9c4b7ca18cb8" : 1164 === e ? "Forms-Disabled-pre-optimized-min.js?v=a3758f706738670a1656" : 674 === e ? "Forms-FloatingLables-pre-optimized-min.js?v=7a4d9fa8e8d9f904f851" : 6923 === e ? "Forms-GoogleClientId-pre-optimized-min.js?v=fd00849f782a74cc5470" : 6730 === e ? "Forms-LimitedTextarea-pre-optimized-min.js?v=8527c671bf30804ee86f" : 3181 === e ? "Forms-OpenInPopup-pre-optimized-min.js?v=18bbd0eeeb97cb262fbf" : 8885 === e ? "Forms-Password-pre-optimized-min.js?v=18a4a5c5b05a7c51f0fc" : 6627 === e ? "Forms-PhoneCodeSelect-pre-optimized-min.js?v=df5a1e75e4c2ea5e02c0" : 1849 === e ? "Forms-PlaceholderSelect-pre-optimized-min.js?v=c13a5f326e8bcbfaf0da" : 2219 === e ? "Forms-Recaptcha-pre-optimized-min.js?v=bcb6971279d4082acc70" : 6911 === e ? "Forms-RegionsSelect-pre-optimized-min.js?v=7d9a2da48dd685f9e062" : 3911 === e ? "Forms-Select-pre-optimized-min.js?v=af66246a6c118f2779fc" : 4955 === e ? "Forms-Turnstile-pre-optimized-min.js?v=d6f4ea54f6fffe5641a4" : 796 === e ? "Forms-Validate-pre-optimized-min.js?v=f040cde83ae6a58ef97c" : 8560 === e ? "Forms-pre-optimized-min.js?v=368bc73e5d08dbd079be" : 3495 === e ? "GTMDataLayer-pre-optimized-min.js?v=60cc65967f134a8f9cfb" : 5087 === e ? "5087-pre-optimized-min.js?v=23c9caa44c043927ab24" : 1434 === e ? "GenericTable-pre-optimized-min.js?v=10444cbab62fd27672fc" : 7753 === e ? "GeoIpCountry-pre-optimized-min.js?v=a5e281a71193d54bd23a" : 6060 === e ? "6060-pre-optimized-min.js?v=afc0df8aec51073a3118" : 5567 === e ? "5567-pre-optimized-min.js?v=1fff82ef5bf144e79b70" : 2189 === e ? "GeoIpModal-pre-optimized-min.js?v=454f86eac1ed54ff31e3" : 7997 === e ? "GlobalSearchBox-pre-optimized-min.js?v=109d61b9555289b66089" : 9214 === e ? "Glossary-pre-optimized-min.js?v=16e2a3c448697c3b799f" : 965 === e ? "HeaderWithMegamenu-pre-optimized-min.js?v=1bbeaaa9d791fba3b822" : 2393 === e ? "2393-pre-optimized-min.js?v=0e597f966ff14f57084d" : 6032 === e ? "6032-pre-optimized-min.js?v=8256a1303fa2e8c99e16" : 4263 === e ? "4263-pre-optimized-min.js?v=45c6a0ab9829f8e8b6e3" : 6407 === e ? "HeadingSearchBox-pre-optimized-min.js?v=9e327a1d0661c3b9ddcc" : 2254 === e ? "HelpIconModal-pre-optimized-min.js?v=482e61964cb1771a35e7" : 321 === e ? "InfoIcon-pre-optimized-min.js?v=339450d49d42bb94823b" : 6619 === e ? "InstrumentDetailTabs-pre-optimized-min.js?v=0af723b84ec74003b81b" : 7915 === e ? "7915-pre-optimized-min.js?v=bad824ce5a99d0bbddcb" : 9080 === e ? "InstrumentHeadingBar-pre-optimized-min.js?v=9eb6f82d99281b665b1e" : 2207 === e ? "InstrumentHeadingBar_New-pre-optimized-min.js?v=17bf3dbbaf7b97c117c5" : 1053 === e ? "InstrumentPageModal-pre-optimized-min.js?v=a8aed0683185bbff5de3" : 3897 === e ? "3897-pre-optimized-min.js?v=c06cf9874bc8da9d1bf2" : 8575 === e ? "InstrumentPricingBar-pre-optimized-min.js?v=f190cb4a12909f7104f1" : 7188 === e ? "InstrumentPricingBar_New-pre-optimized-min.js?v=9ae584ece61ef6b4a5ac" : 8123 === e ? "InstrumentTiles-pre-optimized-min.js?v=e76668c14a8f45c91b4f" : 7016 === e ? "7016-pre-optimized-min.js?v=10368c7d7ed06fe60bb3" : 5302 === e ? "5302-pre-optimized-min.js?v=056480842895e36a4ec8" : 907 === e ? "InteractivePivotPoints-pre-optimized-min.js?v=e094b2e27eb18f097e9f" : 4657 === e ? "LanguageSwitcher-pre-optimized-min.js?v=cb45149e1d0350bd096a" : 7905 === e ? "LeadershipTeam-pre-optimized-min.js?v=4b9a4015f0777e34c166" : 240 === e ? "LessonSidebar-pre-optimized-min.js?v=6a2b4eef6ed133380765" : 7781 === e ? "LessonSurvey-pre-optimized-min.js?v=ad63dd249c04ff03cd4d" : 1579 === e ? "LinkList-pre-optimized-min.js?v=54df7ba69417452beae3" : 6641 === e ? "Login-pre-optimized-min.js?v=474d2e7c66922b1540f6" : 2142 === e ? "MIArticle-pre-optimized-min.js?v=27fc80c4260642f07ba1" : 2169 === e ? "2169-pre-optimized-min.js?v=96472516901a507a9066" : 1981 === e ? "MISearchGrid-pre-optimized-min.js?v=dede8c5e6d4b2f00dc51" : 7907 === e ? "MITagArticles-pre-optimized-min.js?v=cb7f0f941c967a1c00c1" : 9880 === e ? "MapOffices-pre-optimized-min.js?v=bbbae55da00573c636cb" : 5159 === e ? "MapRegulations-pre-optimized-min.js?v=d45edc32e121b7e086ba" : 8988 === e ? "MapTradingHours-pre-optimized-min.js?v=a353c486634410d69c72" : 5464 === e ? "MarginPipCalculator-pre-optimized-min.js?v=f4fb1acaebe9873ee143" : 9616 === e ? "MarketPrices-pre-optimized-min.js?v=298d7d37a00f0aa41363" : 5808 === e ? "MarketsHoliday-pre-optimized-min.js?v=e42ac1b50aba950e70ae" : 2634 === e ? "Menu-pre-optimized-min.js?v=ad50cc6abc5dbbef097c" : 4057 === e ? "NotificationsBadge-pre-optimized-min.js?v=d96b7419a6582195b803" : 9265 === e ? "NotificationsList-pre-optimized-min.js?v=91626dc701fcc47ab954" : 6843 === e ? "NotificationsWidget-pre-optimized-min.js?v=30a53cdab97a436f2aaf" : 9040 === e ? "PageHeading-pre-optimized-min.js?v=f685dafd3c1afb1b98b6" : 3219 === e ? "PersonalizationTabs-pre-optimized-min.js?v=9aa34374b3a1385d7e76" : 6755 === e ? "PivotPoints-pre-optimized-min.js?v=55ad04d4a932f3a6aa83" : 2302 === e ? "PivotPointsTab-pre-optimized-min.js?v=beb431fad072ba4308ea" : 7738 === e ? "7738-pre-optimized-min.js?v=352f29219a45d5656b18" : 1355 === e ? "PresentationalVideo-pre-optimized-min.js?v=cd737bc9069c706a08e0" : 1573 === e ? "ProfessionalNav-pre-optimized-min.js?v=b8d016555105f7bec8ee" : 2051 === e ? "Progressbar-pre-optimized-min.js?v=34dcae042757d98aa151" : 8264 === e ? "Quiz-pre-optimized-min.js?v=b3b49a8f52407c7edc9a" : 1730 === e ? "RateDisplay-pre-optimized-min.js?v=7231e5947b274341ee2e" : 585 === e ? "RatesBar-pre-optimized-min.js?v=37f76d9cb0304c05fdf6" : 9048 === e ? "RatesTable-pre-optimized-min.js?v=b2b174aafaac699caab0" : 2856 === e ? "RegionalSwitcher-pre-optimized-min.js?v=9f5790f5b0da50bf9b28" : 4605 === e ? "SXATabs-pre-optimized-min.js?v=14ae8897f9fe474db44f" : 7736 === e ? "SearchGrid-pre-optimized-min.js?v=0aef1f57f29e6a1d8dea" : 1001 === e ? "SearchResults-pre-optimized-min.js?v=5af53e05c8c424d8acdf" : 5610 === e ? "SectionSearchBox-pre-optimized-min.js?v=20d02602c23cc8aaa63c" : 1533 === e ? "SidebarNavigation-pre-optimized-min.js?v=db94cbd4930c278f8b3c" : 5007 === e ? "StickyAnchors-pre-optimized-min.js?v=cbc56f089cf0c0035ecd" : 2524 === e ? "StickyCTA-pre-optimized-min.js?v=a744228b723d9e678b4d" : 5942 === e ? "StickyContainer-pre-optimized-min.js?v=1f7c46a9c37ef5e782f8" : 849 === e ? "Submenu-pre-optimized-min.js?v=1ea82bbe94134996d812" : 6895 === e ? "TableWithSearch-pre-optimized-min.js?v=99e7b5011bbe790a3913" : 8474 === e ? "8474-pre-optimized-min.js?v=e33576d6a522c17a48ba" : 337 === e ? "Tabs-pre-optimized-min.js?v=e39977146da2265ae854" : 2854 === e ? "TabsContainer-pre-optimized-min.js?v=9897d42489f89744d018" : 4288 === e ? "TabsWithFilters-pre-optimized-min.js?v=65f90aa9e6c1be773dfe" : 6673 === e ? "TabsWithImages-pre-optimized-min.js?v=e9b1c616caaff9f558ba" : 9563 === e ? "Teasers-pre-optimized-min.js?v=aff31d1e1980cfcc6bbf" : 7211 === e ? "TestimonialsSlider-pre-optimized-min.js?v=0c23a023df30b51a717f" : 2415 === e ? "Timeline-pre-optimized-min.js?v=18b49d13a4cfac80b6ab" : 7140 === e ? "TradingCourseList-pre-optimized-min.js?v=06c2736c69e090e63a11" : 2531 === e ? "TradingViewChart-pre-optimized-min.js?v=48dfee3c3d913dcad052" : 8731 === e ? "TypicalSpreads-pre-optimized-min.js?v=6e62157f33ceffb6d836" : 1112 === e ? "Umbrella-pre-optimized-min.js?v=ebfb5e6d3c39aba317a3" : 3796 === e ? "Video-pre-optimized-min.js?v=5a4dee565049d2ab6ed7" : 5096 === e ? "WarningBanner-pre-optimized-min.js?v=e9c204e9eaa555f5b3ca" : 4966 === e ? "4966-pre-optimized-min.js?v=7c4e3a738b5a8f6b1c3e" : 9733 === e ? "WebinarRegistration-pre-optimized-min.js?v=75c0e2e13b33a270f1f7" : 9894 === e ? "9894-pre-optimized-min.js?v=5fac2f71bbeec96a41a0" : 3412 === e ? "3412-pre-optimized-min.js?v=27e82a91f742febdd94e" : 2823 === e ? "2823-pre-optimized-min.js?v=9a9ea728b767f9b785b9" : 4926 === e ? "WebinarsListing-pre-optimized-min.js?v=e43a2a450bb049ed675f" : 2213 === e ? "WebinarsTimer-pre-optimized-min.js?v=983549e5d345c36e44fa" : 5985 === e ? "WistiaIframe-pre-optimized-min.js?v=e035838f715149538189" : 2509 === e ? "ZoomImg-pre-optimized-min.js?v=ec392dae7e434a3baf81" : 1317 === e ? "PageSelector-Self-pre-optimized-min.js?v=344b978e95c8db131d94" : 7205 === e ? "slick-carousel-latest-pre-optimized-min.js?v=27171605ada13cc68c75" : 4046 === e ? "closeGlobalSearch-pre-optimized-min.js?v=29b8be992e15629b237e" : 4495 === e ? "GlobalSearchBoxContent-pre-optimized-min.js?v=bbe3dd16d20e01ba5c6f" : void 0, s.g = function() {
        if ("object" == typeof globalThis) return globalThis;
        try {
            return this || new Function("return this")()
        } catch (e) {
            if ("object" == typeof window) return window
        }
    }(), s.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t), n = {}, r = "forex-sxa-theme:", s.l = (e, t, i, o, a) => {
        if (n[e]) n[e].push(t);
        else {
            var d, c;
            if (void 0 !== i)
                for (var l = document.getElementsByTagName("script"), p = 0; p < l.length; p++) {
                    var m = l[p];
                    if (m.getAttribute("src") == e || m.getAttribute("data-webpack") == r + i) {
                        d = m;
                        break
                    }
                }
            d || (c = !0, (d = document.createElement("script")).charset = "utf-8", d.timeout = 120, s.nc && d.setAttribute("nonce", s.nc), d.setAttribute("data-webpack", r + i), a && d.setAttribute("fetchpriority", a), d.src = e), n[e] = [t];
            var u = (t, i) => {
                    d.onerror = d.onload = null, clearTimeout(f);
                    var r = n[e];
                    if (delete n[e], d.parentNode && d.parentNode.removeChild(d), r && r.forEach((e => e(i))), t) return t(i)
                },
                f = setTimeout(u.bind(null, void 0, {
                    type: "timeout",
                    target: d
                }), 12e4);
            d.onerror = u.bind(null, d.onerror), d.onload = u.bind(null, d.onload), c && document.head.appendChild(d)
        }
    }, s.r = e => {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, (() => {
        var e;
        s.g.importScripts && (e = s.g.location + "");
        var t = s.g.document;
        if (!e && t && (t.currentScript && (e = t.currentScript.src), !e)) {
            var i = t.getElementsByTagName("script");
            if (i.length)
                for (var n = i.length - 1; n > -1 && !e;) e = i[n--].src
        }
        if (!e) throw new Error("Automatic publicPath is not supported in this browser");
        e = e.replace(/#.*$/, "").replace(/\?.*$/, "").replace(/\/[^\/]+$/, "/"), s.p = e
    })(), (() => {
        var e = {
            179: 0
        };
        s.f.j = (t, i, n) => {
            var r = s.o(e, t) ? e[t] : void 0;
            if (0 !== r)
                if (r) i.push(r[2]);
                else {
                    var o = new Promise(((i, n) => r = e[t] = [i, n]));
                    i.push(r[2] = o);
                    var a = s.p + s.u(t),
                        d = new Error;
                    s.l(a, (i => {
                        if (s.o(e, t) && (0 !== (r = e[t]) && (e[t] = void 0), r)) {
                            var n = i && ("load" === i.type ? "missing" : i.type),
                                o = i && i.target && i.target.src;
                            d.message = "Loading chunk " + t + " failed.\n(" + n + ": " + o + ")", d.name = "ChunkLoadError", d.type = n, d.request = o, r[1](d)
                        }
                    }), "chunk-" + t, t, n)
                }
        };
        var t = (t, i) => {
                var n, r, [o, a, d] = i,
                    c = 0;
                if (o.some((t => 0 !== e[t]))) {
                    for (n in a) s.o(a, n) && (s.m[n] = a[n]);
                    if (d) d(s)
                }
                for (t && t(i); c < o.length; c++) r = o[c], s.o(e, r) && e[r] && e[r][0](), e[r] = 0
            },
            i = self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || [];
        i.forEach(t.bind(null, 0)), i.push = t.bind(null, i.push.bind(i))
    })(), (() => {
        "use strict";
        s(7733), s(1377);
        var t = s(4278),
            i = s(201);
        let n;
        const r = () => ({
                umbrellaHeight: null !== document.getElementById("umbrella") ? document.getElementById("umbrella").getBoundingClientRect().height : 0,
                warningBannerHeight: null !== document.querySelector(".warning-banner") ? document.querySelector(".warning-banner").getBoundingClientRect().height : 0,
                alertBarHeight: null !== document.querySelector(".alert-bar") ? document.querySelector(".alert-bar").getBoundingClientRect().height : 0,
                comparisonBarHeight: null !== document.getElementById("comparison-bar") ? document.getElementById("comparison-bar").getBoundingClientRect().height : 0,
                navigationHeight: null !== document.getElementById("navigation") ? document.getElementById("navigation").getBoundingClientRect().height : 0,
                mobileHeaderHeight: null !== document.getElementById("mobile-header") ? document.getElementById("mobile-header").getBoundingClientRect().height : 0,
                simpleHeaderHeight: null !== document.getElementById("header-simple") ? document.getElementById("header-simple").getBoundingClientRect().height : 0
            }),
            o = e => {
                const t = document.querySelector(".sticky-anchors");
                if (!t) return;
                const i = t.querySelector(".sticky-anchors-heading-wrapper"),
                    n = i.scrollHeight;
                if ("True" === i ? .dataset.isSticky) {
                    const o = r(),
                        a = o.warningBannerHeight + (o.mobileHeaderHeight || o.navigationHeight) + ("up" === e ? o.umbrellaHeight : 0);
                    i.style.top = a + "px", t.getBoundingClientRect().top <= a ? (i.classList.add("sticked"), t.style.paddingTop = n + "px") : (i.classList.remove("sticked"), t.style.paddingTop = 0)
                }
            },
            a = (e, t, i) => {
                const n = document.getElementsByTagName("header")[0],
                    o = r(),
                    a = document.getElementById("navigation"),
                    s = document.getElementById("header-simple"),
                    d = document.getElementById("mobile-header"),
                    c = document.getElementById("umbrella"),
                    l = document.querySelector(".language-switcher"),
                    p = document.querySelector(".alert-bar"),
                    m = null !== p ? p.getBoundingClientRect().height : 0,
                    u = document.querySelector(".global-search-box"),
                    f = null !== c ? c.getBoundingClientRect().height + m : m,
                    g = void 0 !== i ? i : window.pageYOffset;
                document.body.clientWidth > 1024 ? null !== c && ("hide" === e && ("load" === t && (null !== p && (p.style.top = "0"), null !== a && (a.style.top = "0"), null !== s && (s.style.top = "0"), c.style.top = "0", null !== u && (u.style.top = o.warningBannerHeight + o.umbrellaHeight + o.alertBarHeight + "px")), "scroll" === t && (null !== l && void 0 !== l.classList && l.classList.contains("expanded") && (l.classList.remove("expanded"), c.style.zIndex = "3"), null !== p && (p.style.top = -m + "px", p.classList.add("is-hidden-behind")), null !== u && (u.style.top = o.warningBannerHeight + o.alertBarHeight + "px"), c.classList.add("is-hidden-behind"), c.style.top = -f + "px", null !== a && (a.style.top = -f + "px"), null !== s && (s.style.top = -f + "px"), n.style.height = o.warningBannerHeight + o.navigationHeight + o.simpleHeaderHeight + "px")), "show" === e && (g > m ? (c.style.top = -m + "px", c.classList.remove("is-hidden-behind"), null !== a && (a.style.top = -m + "px"), null !== s && (s.style.top = -m + "px"), null !== p && (p.style.top = -m + "px"), null !== p && p.classList.add("is-hidden-behind"), null !== u && (u.style.top = o.warningBannerHeight + o.umbrellaHeight + o.alertBarHeight + "px"), n.style.height = o.warningBannerHeight + o.simpleHeaderHeight + o.navigationHeight + o.umbrellaHeight + "px") : (c.style.top = "0", null !== a && (a.style.top = "0"), null !== s && (s.style.top = "0"), null !== p && (p.style.top = "0"), c.classList.remove("is-hidden-behind"), n.style.height = o.warningBannerHeight + o.simpleHeaderHeight + o.navigationHeight + o.alertBarHeight + o.umbrellaHeight + "px", null !== u && (u.style.top = o.warningBannerHeight + o.umbrellaHeight + o.alertBarHeight + "px")))) : (null !== p && "hide" === e && "scroll" === t && g > m && (p.style.top = -m - 10 + "px", d.style.top = -m - 10 + "px", p.classList.add("is-hidden-behind")), null !== p && "show" === e && g <= m && (p.style.top = "0", d.style.top = "0", p.classList.remove("is-hidden-behind")))
            },
            d = e => {
                if (document.body.clientWidth > 1024) {
                    const t = document.getElementsByTagName("header")[0],
                        i = document.getElementById("navigation"),
                        n = document.querySelector(".global-search-box");
                    if (null === i || null !== n && n.classList.contains("opened")) return !1;
                    const o = r();
                    "up" === e && (t.style.overflow = "unset", t.style.height = "auto"), "down" === e && (t.style.overflow = "hidden", t.style.height = o.navigationHeight + o.warningBannerHeight + 3 + "px")
                }
            },
            c = () => {
                if (document.body.classList.contains("disabled-scrolling") || document.body.classList.contains("modal-open")) return;
                let e = document.documentElement.scrollTop || document.body.scrollTop;
                e > 0 && n <= e ? (n = e, a("hide", "scroll", e), o("down"), d("down")) : (n = e, a("show", "scroll", e), o("up"), d("up")), p(e), l(e)
            },
            l = e => {
                const t = document.querySelector(".warning-banner"),
                    i = Boolean(t),
                    n = t ? .classList.contains("is-non-sticky"),
                    o = document.body.clientWidth <= 768;
                if (!i || !n || o) return;
                const a = r(),
                    s = e >= a.warningBannerHeight + a.umbrellaHeight ? -a.warningBannerHeight : Math.min(-e + a.umbrellaHeight, 0);
                t.style.marginTop = `${s}px`
            },
            p = e => {
                if (document.body.clientWidth <= 768) return;
                const t = document.getElementById("navigation"),
                    i = document.querySelector(".global-search-box"),
                    n = null !== i ? window.getComputedStyle(i) : void 0;
                t && (0 === e ? (t.classList.remove("opaque"), void 0 !== n && "none" === n.display && t.classList.remove("opaque")) : t.classList.add("opaque"))
            },
            m = () => {
                if (document.body.clientWidth > 1024) return;
                const e = document.getElementById("mega-menu"),
                    t = document.getElementById("main-menu"),
                    i = document.getElementById("navigation"),
                    n = document.querySelector(".global-search-box"),
                    o = r();
                if (n && (n.style.top = o.warningBannerHeight + "px"), i) {
                    const e = o.warningBannerHeight + o.alertBarHeight + o.mobileHeaderHeight;
                    i.style.top = e + "px"
                }
                if (e || t) {
                    const i = window.innerHeight,
                        n = document.getElementById("mobile-search-wrapper"),
                        r = null !== n ? n.getBoundingClientRect().height : 0,
                        a = i - o.warningBannerHeight - o.alertBarHeight - o.mobileHeaderHeight - r - 10;
                    e && (e.style.height = a + "px"), t && (t.style.height = a + "px")
                }
            },
            u = () => {
                if (null !== document.querySelector(".nav"))
                    if (document.querySelector(".nav ul li:not(:first-child).active")) document.querySelector(".nav ul li.first").classList.remove("active");
                    else if (document.querySelector(".nav ul li a.expanded")) {
                    document.querySelector(".nav ul li a.expanded").parentNode.classList.add("active"), document.querySelector(".nav ul li.first").classList.remove("active"), document.querySelector(".navTrigger").classList.add("active"), document.querySelector(".menu-overlay").classList.remove("opened")
                } else document.querySelector(".nav ul li.first").classList.add("active")
            },
            f = () => {
                document.getElementById("navigation").classList.toggle("opened"), document.querySelector(".navTrigger").classList.toggle("active"), document.body.classList.toggle("prevent-scroll")
            },
            g = () => {
                const e = document.getElementById("navigation"),
                    t = document.getElementsByTagName("header")[0],
                    i = document.getElementById("wrapper"),
                    n = document.querySelector(".page-heading"),
                    o = r();
                if (document.body.clientWidth > 1024)
                    if (null !== document.getElementById("header-simple")) {
                        let e = t.getBoundingClientRect().height;
                        i.style.paddingTop = e + "px"
                    } else if (null !== e) {
                    if (e.classList.contains("dark-theme")) {
                        let e = o.warningBannerHeight + o.umbrellaHeight + o.alertBarHeight + o.comparisonBarHeight;
                        i.style.paddingTop = e + "px"
                    }
                    if (e.classList.contains("light-theme")) {
                        let e = o.warningBannerHeight + o.umbrellaHeight + o.alertBarHeight + o.comparisonBarHeight + o.navigationHeight;
                        i.style.paddingTop = e + "px"
                    }
                } else {
                    let e = t.getBoundingClientRect().height;
                    i.style.paddingTop = e + "px"
                } else {
                    let e = r(),
                        t = e.warningBannerHeight + e.mobileHeaderHeight + e.alertBarHeight + e.simpleHeaderHeight;
                    i.style.paddingTop = t + "px", null !== n && 0 !== e.comparisonBarHeight && (n.style.paddingTop = e.comparisonBarHeight + "px")
                }
            },
            b = e => {
                const t = jQuery(decodeURI(e));
                if (!t ? .length) return;
                const i = jQuery("#mobile-header"),
                    n = i ? .is(":visible") ? i ? .[0] : jQuery("#navigation") ? .[0],
                    r = n ? .getBoundingClientRect() ? .bottom || 0,
                    o = t.offset().top - r;
                jQuery("html, body").animate({
                    scrollTop: o
                }, {
                    duration: 500
                })
            },
            v = () => {
                const e = document.getElementById("nav-trigger"),
                    i = document.querySelector(".warning-banner"),
                    n = document.querySelector(".close-alert-bar a");
                if ((() => {
                        let e = "";
                        e = /Android/.test(navigator.userAgent) ? "isAndroid" : window.cordova ? "isCordova" : /Edge/.test(navigator.userAgent) ? "isEdge" : /Firefox/.test(navigator.userAgent) ? "isFirefox" : /Google Inc/.test(navigator.vendor) ? "isChrome" : /Trident/.test(navigator.userAgent) ? "isIE" : /(iPhone|iPad|iPod)/.test(navigator.platform) ? "isIOS" : /OPR/.test(navigator.userAgent) ? "isOpera" : /Safari/.test(navigator.userAgent) && !/Chrome/.test(navigator.userAgent) ? "isSafari" : "unknown", document.body.dataset.browserType = e
                    })(), l(window.scrollY), p(window.scrollY), g(), a("hide", "load", 0), e && (e.onclick = f, e.classList.add("loaded")), document.getElementById("mega-menu") && document.getElementById("mega-menu").setAttribute("data-max-height", (() => {
                        const e = document.querySelectorAll(".mega-menu-column");
                        let t = 0;
                        for (let i = 0; i < e.length; i++) {
                            let n = e[i].getBoundingClientRect().height;
                            n >= t && (t = n)
                        }
                        return t
                    })()), document.querySelectorAll('a[href^="#"]').forEach((e => e.addEventListener("click", (e => {
                        e.preventDefault();
                        const t = e.currentTarget.getAttribute("href"),
                            i = e.currentTarget.classList.length;
                        "#" === t || "#0" === t || i > 0 || b(t)
                    })))), null !== n && n.addEventListener("click", (function() {
                        (0, t.d)("sw_alert", this.dataset.alertId, 365, this.dataset.cookiePath), document.querySelector(".alert-bar").remove(), g(), a()
                    })), null !== i && (window.innerWidth < parseInt(getComputedStyle(i).getPropertyValue("--warning-banner-breakpoint") ? .trim() || "768", 10) && i.addEventListener("click", (function(e) {
                        e.stopImmediatePropagation(), this.classList.toggle("expanded"), window.dispatchEvent(new CustomEvent("updateHeights")), (0, t.d)("wb_expanded", this.classList.contains("expanded"), null, i.querySelector(".component-content").dataset.cookiePath), g(), m()
                    })), "false" === (e => {
                        let t = document.cookie.split(";");
                        for (let i = 0; i < t.length; i++) {
                            let n = t[i].split("=");
                            if (e == n[0].trim()) return decodeURIComponent(n[1])
                        }
                        return null
                    })("wb_expanded") && (i.classList.remove("expanded"), g(), m())), document.body.clientWidth <= 1024 && (m(), u()), document.body.classList.contains("professional")) {
                    function r(e) {
                        e.preventDefault(), window.scrollTo(0, 0)
                    }
                    window.addEventListener("scroll", r, {
                        passive: !1
                    }), setTimeout((() => {
                        window.removeEventListener("scroll", r)
                    }), 500)
                }
                document.querySelector('img[alt="logo"]') ? .complete && g(), (() => {
                    const {
                        hash: e
                    } = window.location;
                    if (!e) return;
                    let t;
                    new URLSearchParams(e).forEach(((e, i) => {
                        i.includes("#") && (t = i)
                    })), b(t)
                })()
            },
            h = () => {
                "textarea" === document.activeElement.tagName.toLowerCase() && window.setTimeout((function() {
                    e.preventDefault();
                    var t = document.activeElement.getBoundingClientRect().top;
                    window.scrollTo(0, t)
                }), 0), document.body.clientWidth <= 1024 ? (u(), m()) : ((() => {
                    if (document.body.clientWidth <= 1024) return;
                    const e = document.getElementById("mega-menu"),
                        t = document.getElementById("main-menu"),
                        i = document.getElementById("navigation");
                    e && (e.style.height = "auto"), t && (t.style.height = "auto"), i && (i.style.top = "auto", i.classList.contains("opened") && document.body.classList.contains("prevent-scroll") && f())
                })(), a("show")), g()
            },
            j = () => {
                if (document.body.classList.contains("on-page-editor") || "partial" === document.body.id) return !1;
                if ((() => {
                        let e = window.location.href.split(window.location.origin)[1];
                        const t = void 0 !== e ? e.split("/")[1].toLowerCase() : "";
                        void 0 === t && "" === t || document.body.setAttribute("data-site-lang", t)
                    })(), (0, i.v)(v), window.addEventListener("scroll", c), window.addEventListener("resize", h), window.location.href.indexOf("what-is-forex") > -1 ? document.body.classList.add("inner-third-page") : document.body.classList.remove("inner-third-page"), window.outerWidth <= 1024) {
                    const e = document.querySelectorAll(".main-nav-active");
                    if (null !== e)
                        if (e.length > 1) {
                            const t = e[1].querySelector(".main-navigation-link").dataset.target;
                            e[0].classList.remove("active"), e[1].classList.add("active"), document.querySelector('.mega-menu-column[data-content="Home"]').classList.add("not-visible"), document.querySelector('.mega-menu-column[data-content="' + t + '"]').classList.remove("not-visible")
                        } else void 0 !== e[0] && e[0].classList.add("active"), null !== document.querySelector('.mega-menu-column[data-content="Home"]') && document.querySelector('.mega-menu-column[data-content="Home"]').classList.remove("not-visible")
                }
            };
        s(1578), s(5347);
        const y = [
                ["Accordions", ".accordion:not(.initialized)"],
                ["AccountsListing", ".account-cards-container"],
                ["AnimatedNumbers", ".animated-numbers"],
                ["AnimatedNumbersSlider", ".mobile-numbers-carousel"],
                ["ArticlePage", ".related-article-card"],
                ["AuthorImageNavigation", ".author-image-navigation"],
                ["Awards", ".component.awards .awards__list"],
                ["AwardsSlider", ".awards-slider"],
                ["Breadcrumb", ".breadcrumb"],
                ["CardsTags", ".card-tags"],
                ["ClipboardCopy", ".clipboard-copy"],
                ["CollapsibleContainer", ".collapsible-container"],
                ["CookieBanner", ".privacy-warning"],
                ["CtaMobileSlider", ".cta-mobile-slider"],
                ["CtaWithModal", ".cta-with-modal"],
                ["DemoConfirmationCopyUser", ".demo-confirmation-copy-button"],
                ["Dropdown", ".dropdown-composite"],
                ["EconomicCalendar", ".economic-calendar"],
                ["EducationalQuiz", ".education-quiz"],
                ["Eligible", '.div[data-type="eligible"]'],
                ["EmailCaptureModal", ".lead-capture"],
                ["FAQ", ".faq-item"],
                ["FAQ/FAQPageWrapper", "#FAQ-Page-Wrapper"],
                ["FAQSurveyForm", ".faq-feedback"],
                ["Forms", ".sitecore-form"],
                ["Forms/Checkbox", '.sitecore-form input[type="checkbox"]'],
                ["Forms/CountriesSelect", ".countries-select"],
                ["Forms/CountryAndPhoneSelectSync", ".phone-select .telephone-codes-select, .countries-select .countries-select-dropdown"],
                ["Forms/Disabled", "input.disabled, textarea.disabled, select.disabled"],
                ["Forms/FloatingLables", ".floating-label"],
                ["Forms/GoogleClientId", '[data-sc-field-name~="Google_Client_Id"]'],
                ["Forms/LimitedTextarea", "textarea.display-limit, .cancel-button"],
                ["Forms/OpenInPopup", "form.demo-form, form.contact-us-form, .demoform-in-popup, .contactform-in-popup"],
                ["Forms/Password", '.sitecore-form input[type="password"]'],
                ["Forms/PhoneCodeSelect", ".phonecode-select"],
                ["Forms/PlaceholderSelect", ".placeholder-select"],
                ["Forms/Recaptcha", ".recaptcha-component"],
                ["Forms/Turnstile", ".turnstile-component"],
                ["Forms/RegionsSelect", ".country-for-region, .region-from-country"],
                ["Forms/Select", ".forms-select, form select[data-sc-field-key]"],
                ["Forms/Validate", ".validation-rules__box"],
                ["GenericTable", ".generic-table"],
                ["GeoIpCountry", 'input[name="IP_Country__c"]'],
                ["GeoIpModal", ".geo-ip-modal"],
                ["GlobalSearchBox", ".global-search-box"],
                ["Glossary", ".glossary-alphabet-wrapper"],
                ["GTMDataLayer", "#gtm-data-layer"],
                ["HeaderWithMegamenu", ".header-with-megamenu.new-header"],
                ["HeadingSearchBox", ".heading-search-box"],
                ["HelpIconModal", ".help-icon"],
                ["InfoIcon", ".info-icon"],
                ["InstrumentDetailTabs", ".instrument-detail-tabs"],
                ["InstrumentPageModal", ".instrument-page-modal-window"],
                ["LanguageSwitcher", ".language-switcher"],
                ["LeadershipTeam", ".leadership-team"],
                ["LessonSidebar", ".lesson-sidebar"],
                ["LessonSurvey", ".lesson-survey-form"],
                ["LinkList", "#footer .link-list.vertical"],
                ["Footer", ".footer-main-menu__title"],
                ["Login", ".login-form"],
                ["MapOffices", ".office-map"],
                ["MapRegulations", ".country-regulators-map .map-tiles"],
                ["MapTradingHours", ".trading-hours"],
                ["MarketsHoliday", ".market-hours-tables"],
                ["Menu", ".main-navigation-link"],
                ["NotificationsBadge", ".notifications-badge"],
                ["NotificationsList", ".notifications-list"],
                ["NotificationsWidget", ".notifications-widget"],
                ["PageHeading", "#backgroundVideo, #backgroundVideoCanvas"],
                ["PresentationalVideo", ".showcase"],
                ["ProfessionalNav", "body.professional #nav-trigger, #professional-links-holder"],
                ["Progressbar", ".search-filters-container"],
                ["Quiz", ".lesson-quiz, .complete-lesson-button a"],
                ["RegionalSwitcher", ".stx-regional-switcher"],
                ["SXATabs", ".tabs:not(.initialized)"],
                ["SearchGrid", ".search-grid"],
                ["SearchResults", ".search-results"],
                ["SectionSearchBox", ".section-search-box"],
                ["SidebarNavigation", ".sidebar-navigation"],
                ["StickyAnchors", ".sticky-anchors, #scroll-to-top"],
                ["StickyCTA", "link.show-on-scroll, .button.show-on-scroll"],
                ["StickyContainer", ".sticky-boundaries"],
                ["Submenu", ".navigation.submenu"],
                ["TableWithSearch", "#tableSearchInput, .sticked-search-trigger"],
                ["Tabs", ".vertical-tabs, .horizontal-tabs-headings, .leadership-team, .category-tabs-heading, .mobile-categories"],
                ["TabsContainer", ".tabs-container"],
                ["TabsWithFilters", ".search-results-tabs"],
                ["Teasers", ".teasers-list, .market-hours-teaser"],
                ["TestimonialsSlider", ".testimonials-slider"],
                ["Timeline", ".timeline-toggler"],
                ["TradingCourseList", ".trading-course-list"],
                ["TradingViewChart", ".trading-view-chart"],
                ["Umbrella", "#umbrella .icon-link-list"],
                ["Video", ".extended-video, #backgroundVideo, .yt-player, .wistia-player"],
                ["WarningBanner", ".warning-banner"],
                ["WebinarRegistration", ".webinar-registration"],
                ["WistiaIframe", "iframe.wistia_embed"],
                ["ZoomImg", "[data-zoomable-image], .article-detail .field-content img"]
            ],
            x = [
                ["AlgoliaSearch", '[data-widget="algolia-search"]'],
                ["FilterGrid", '[data-widget="filter-grid"]'],
                ["ClientSentiment", '[data-widget="client-sentiment"]'],
                ["CountryOffices", '[data-widget="country-offices"]'],
                ["CountrySelector", '[data-widget="country-selector"]'],
                ["CurrencyConverter", '[data-widget="currency-converter"]'],
                ["InstrumentHeadingBar", '[data-widget="instrument-heading-bar"]'],
                ["InstrumentPricingBar", '[data-widget="instrument-pricing-bar"]'],
                ["InstrumentHeadingBar_New", '[data-widget="instrument-heading-bar_new"]'],
                ["InstrumentPricingBar_New", '[data-widget="instrument-pricing-bar_new"]'],
                ["InstrumentTiles", '[data-widget="instrument-tiles"]'],
                ["InteractivePivotPoints", '[data-widget="interactive-pivots"]'],
                ["MarginPipCalculator", '[data-widget="margin-pip-calculator"]'],
                ["MarketPrices", '[data-widget="rates-table"]'],
                ["MITagArticles", '[data-widget="mi-tag-articles"]'],
                ["MISearchGrid", '[data-widget="mi-search-grid"]'],
                ["SearchGrid", '[data-widget="search-grid"]'],
                ["TagArticles", '[data-widget="tag-articles"]'],
                ["PersonalizationTabs", '[data-widget="personalization-tabs"]'],
                ["PivotPoints", '[data-widget="pivot-points"]'],
                ["PivotPointsTab", '[data-widget="pivot-points--tab"]'],
                ["RateDisplay", '[data-widget="display-rate"]'],
                ["RatesBar", '[data-widget="rates-bar"]'],
                ["RatesTable", '[data-widget="rates-table"]'],
                ["TypicalSpreads", '[data-widget="typical-spreads"]'],
                ["WebinarsListing", '[data-widget="webinars-listing"]'],
                ["WebinarsTimer", '[data-widget="timer"]']
            ],
            w = ([e, t, i = "$common"]) => "$common" === i ? s(2620)(`./${e}/index.js`).catch((e => console.error(e))) : s(5380)(`./${e}/index.js`).catch((e => console.error(e))),
            S = ([, e]) => document.querySelectorAll(e).length > 0;
        ((e = [], t = [], i = [], n = []) => {
            document.documentElement.className = document.documentElement.className.replace("no-js", "js");
            const r = y.filter((e => !i.includes(e[0]))).concat(e.map((e => [...e, "$self"]))),
                o = x.filter((e => !n.includes(e[0]))).concat(t.map((e => [...e, "$self"])));
            r.filter(S).map(w), Promise.all(o.filter(S).map(w)).then((e => e ? .length > 0 && Promise.all([s.e(4588, "high"), s.e(7317, "high"), s.e(5385, "high"), s.e(2490, "high"), s.e(8012, "high"), s.e(5351, "high"), s.e(2901, "high"), s.e(7414, "high")]).then(s.bind(s, 4891)).then((({
                createWidgetsContainer: t
            }) => t(e.map((e => e.default))).init()))))
        })([
            ["PageSelector", ".page-selector"]
        ], []), j()
    })()
})();