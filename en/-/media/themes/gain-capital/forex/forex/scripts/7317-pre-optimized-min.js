"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [7317], {
        2979: (_, n, e) => {
            e.d(n, {
                HY: () => g,
                Tm: () => q,
                Vf: () => m,
                YM: () => r,
                ZB: () => O,
                az: () => v,
                bR: () => T,
                h: () => v,
                kr: () => B,
                sY: () => I,
                wA: () => C
            });
            e(7733), e(1377), e(7288);
            var t, r, o, u, l, i, c, f, s = {},
                a = [],
                p = /acit|ex(?:s|g|n|p|$)|rph|grid|ows|mnc|ntw|ine[ch]|zoo|^ord|itera/i;

            function h(_, n) {
                for (var e in n) _[e] = n[e];
                return _
            }

            function d(_) {
                var n = _.parentNode;
                n && n.removeChild(_)
            }

            function v(_, n, e) {
                var r, o, u, l = {};
                for (u in n) "key" == u ? r = n[u] : "ref" == u ? o = n[u] : l[u] = n[u];
                if (arguments.length > 2 && (l.children = arguments.length > 3 ? t.call(arguments, 2) : e), "function" == typeof _ && null != _.defaultProps)
                    for (u in _.defaultProps) void 0 === l[u] && (l[u] = _.defaultProps[u]);
                return y(_, l, r, o, null)
            }

            function y(_, n, e, t, u) {
                var l = {
                    type: _,
                    props: n,
                    key: e,
                    ref: t,
                    __k: null,
                    __: null,
                    __b: 0,
                    __e: null,
                    __d: void 0,
                    __c: null,
                    __h: null,
                    constructor: void 0,
                    __v: null == u ? ++o : u
                };
                return null == u && null != r.vnode && r.vnode(l), l
            }

            function m() {
                return {
                    current: null
                }
            }

            function g(_) {
                return _.children
            }

            function b(_, n, e) {
                "-" === n[0] ? _.setProperty(n, null == e ? "" : e) : _[n] = null == e ? "" : "number" != typeof e || p.test(n) ? e : e + "px"
            }

            function k(_, n, e, t, r) {
                var o;
                _: if ("style" === n)
                    if ("string" == typeof e) _.style.cssText = e;
                    else {
                        if ("string" == typeof t && (_.style.cssText = t = ""), t)
                            for (n in t) e && n in e || b(_.style, n, "");
                        if (e)
                            for (n in e) t && e[n] === t[n] || b(_.style, n, e[n])
                    }
                else if ("o" === n[0] && "n" === n[1]) o = n !== (n = n.replace(/Capture$/, "")), n = n.toLowerCase() in _ ? n.toLowerCase().slice(2) : n.slice(2), _.l || (_.l = {}), _.l[n + o] = e, e ? t || _.addEventListener(n, o ? x : M, o) : _.removeEventListener(n, o ? x : M, o);
                else if ("dangerouslySetInnerHTML" !== n) {
                    if (r) n = n.replace(/xlink(H|:h)/, "h").replace(/sName$/, "s");
                    else if ("width" !== n && "height" !== n && "href" !== n && "list" !== n && "form" !== n && "tabIndex" !== n && "download" !== n && n in _) try {
                        _[n] = null == e ? "" : e;
                        break _
                    } catch (_) {}
                    "function" == typeof e || (null == e || !1 === e && -1 == n.indexOf("-") ? _.removeAttribute(n) : _.setAttribute(n, e))
                }
            }

            function M(_) {
                u = !0;
                try {
                    return this.l[_.type + !1](r.event ? r.event(_) : _)
                } finally {
                    u = !1
                }
            }

            function x(_) {
                u = !0;
                try {
                    return this.l[_.type + !0](r.event ? r.event(_) : _)
                } finally {
                    u = !1
                }
            }

            function C(_, n) {
                this.props = _, this.context = n
            }

            function H(_, n) {
                if (null == n) return _.__ ? H(_.__, _.__.__k.indexOf(_) + 1) : null;
                for (var e; n < _.__k.length; n++)
                    if (null != (e = _.__k[n]) && null != e.__e) return e.__e;
                return "function" == typeof _.type ? H(_) : null
            }

            function Y(_) {
                var n, e;
                if (null != (_ = _.__) && null != _.__c) {
                    for (_.__e = _.__c.base = null, n = 0; n < _.__k.length; n++)
                        if (null != (e = _.__k[n]) && null != e.__e) {
                            _.__e = _.__c.base = e.__e;
                            break
                        }
                    return Y(_)
                }
            }

            function E(_) {
                u ? setTimeout(_) : c(_)
            }

            function N(_) {
                (!_.__d && (_.__d = !0) && l.push(_) && !P.__r++ || i !== r.debounceRendering) && ((i = r.debounceRendering) || E)(P)
            }

            function P() {
                var _, n, e, t, r, o, u, i;
                for (l.sort((function(_, n) {
                        return _.__v.__b - n.__v.__b
                    })); _ = l.shift();) _.__d && (n = l.length, t = void 0, r = void 0, u = (o = (e = _).__v).__e, (i = e.__P) && (t = [], (r = h({}, o)).__v = o.__v + 1, U(i, o, r, e.__n, void 0 !== i.ownerSVGElement, null != o.__h ? [u] : null, t, null == u ? H(o) : u, o.__h), V(t, o), o.__e != u && Y(o)), l.length > n && l.sort((function(_, n) {
                    return _.__v.__b - n.__v.__b
                })));
                P.__r = 0
            }

            function S(_, n, e, t, r, o, u, l, i, c) {
                var f, p, h, d, v, m, b, k = t && t.__k || a,
                    M = k.length;
                for (e.__k = [], f = 0; f < n.length; f++)
                    if (null != (d = e.__k[f] = null == (d = n[f]) || "boolean" == typeof d ? null : "string" == typeof d || "number" == typeof d || "bigint" == typeof d ? y(null, d, null, null, d) : Array.isArray(d) ? y(g, {
                            children: d
                        }, null, null, null) : d.__b > 0 ? y(d.type, d.props, d.key, d.ref ? d.ref : null, d.__v) : d)) {
                        if (d.__ = e, d.__b = e.__b + 1, null === (h = k[f]) || h && d.key == h.key && d.type === h.type) k[f] = void 0;
                        else
                            for (p = 0; p < M; p++) {
                                if ((h = k[p]) && d.key == h.key && d.type === h.type) {
                                    k[p] = void 0;
                                    break
                                }
                                h = null
                            }
                        U(_, d, h = h || s, r, o, u, l, i, c), v = d.__e, (p = d.ref) && h.ref != p && (b || (b = []), h.ref && b.push(h.ref, null, d), b.push(p, d.__c || v, d)), null != v ? (null == m && (m = v), "function" == typeof d.type && d.__k === h.__k ? d.__d = i = w(d, i, _) : i = D(_, d, h, k, v, i), "function" == typeof e.type && (e.__d = i)) : i && h.__e == i && i.parentNode != _ && (i = H(h))
                    }
                for (e.__e = m, f = M; f--;) null != k[f] && ("function" == typeof e.type && null != k[f].__e && k[f].__e == e.__d && (e.__d = A(t).nextSibling), L(k[f], k[f]));
                if (b)
                    for (f = 0; f < b.length; f++) W(b[f], b[++f], b[++f])
            }

            function w(_, n, e) {
                for (var t, r = _.__k, o = 0; r && o < r.length; o++)(t = r[o]) && (t.__ = _, n = "function" == typeof t.type ? w(t, n, e) : D(e, t, t, r, t.__e, n));
                return n
            }

            function T(_, n) {
                return n = n || [], null == _ || "boolean" == typeof _ || (Array.isArray(_) ? _.some((function(_) {
                    T(_, n)
                })) : n.push(_)), n
            }

            function D(_, n, e, t, r, o) {
                var u, l, i;
                if (void 0 !== n.__d) u = n.__d, n.__d = void 0;
                else if (null == e || r != o || null == r.parentNode) _: if (null == o || o.parentNode !== _) _.appendChild(r), u = null;
                    else {
                        for (l = o, i = 0;
                            (l = l.nextSibling) && i < t.length; i += 1)
                            if (l == r) break _;
                        _.insertBefore(r, o), u = o
                    }
                return void 0 !== u ? u : r.nextSibling
            }

            function A(_) {
                var n, e, t;
                if (null == _.type || "string" == typeof _.type) return _.__e;
                if (_.__k)
                    for (n = _.__k.length - 1; n >= 0; n--)
                        if ((e = _.__k[n]) && (t = A(e))) return t;
                return null
            }

            function U(_, n, e, t, o, u, l, i, c) {
                var f, s, a, p, d, v, y, m, b, k, M, x, H, Y, E, N = n.type;
                if (void 0 !== n.constructor) return null;
                null != e.__h && (c = e.__h, i = n.__e = e.__e, n.__h = null, u = [i]), (f = r.__b) && f(n);
                try {
                    _: if ("function" == typeof N) {
                        if (m = n.props, b = (f = N.contextType) && t[f.__c], k = f ? b ? b.props.value : f.__ : t, e.__c ? y = (s = n.__c = e.__c).__ = s.__E : ("prototype" in N && N.prototype.render ? n.__c = s = new N(m, k) : (n.__c = s = new C(m, k), s.constructor = N, s.render = R), b && b.sub(s), s.props = m, s.state || (s.state = {}), s.context = k, s.__n = t, a = s.__d = !0, s.__h = [], s._sb = []), null == s.__s && (s.__s = s.state), null != N.getDerivedStateFromProps && (s.__s == s.state && (s.__s = h({}, s.__s)), h(s.__s, N.getDerivedStateFromProps(m, s.__s))), p = s.props, d = s.state, s.__v = n, a) null == N.getDerivedStateFromProps && null != s.componentWillMount && s.componentWillMount(), null != s.componentDidMount && s.__h.push(s.componentDidMount);
                        else {
                            if (null == N.getDerivedStateFromProps && m !== p && null != s.componentWillReceiveProps && s.componentWillReceiveProps(m, k), !s.__e && null != s.shouldComponentUpdate && !1 === s.shouldComponentUpdate(m, s.__s, k) || n.__v === e.__v) {
                                for (n.__v !== e.__v && (s.props = m, s.state = s.__s, s.__d = !1), n.__e = e.__e, n.__k = e.__k, n.__k.forEach((function(_) {
                                        _ && (_.__ = n)
                                    })), M = 0; M < s._sb.length; M++) s.__h.push(s._sb[M]);
                                s._sb = [], s.__h.length && l.push(s);
                                break _
                            }
                            null != s.componentWillUpdate && s.componentWillUpdate(m, s.__s, k), null != s.componentDidUpdate && s.__h.push((function() {
                                s.componentDidUpdate(p, d, v)
                            }))
                        }
                        if (s.context = k, s.props = m, s.__P = _, x = r.__r, H = 0, "prototype" in N && N.prototype.render) {
                            for (s.state = s.__s, s.__d = !1, x && x(n), f = s.render(s.props, s.state, s.context), Y = 0; Y < s._sb.length; Y++) s.__h.push(s._sb[Y]);
                            s._sb = []
                        } else
                            do {
                                s.__d = !1, x && x(n), f = s.render(s.props, s.state, s.context), s.state = s.__s
                            } while (s.__d && ++H < 25);
                        s.state = s.__s, null != s.getChildContext && (t = h(h({}, t), s.getChildContext())), a || null == s.getSnapshotBeforeUpdate || (v = s.getSnapshotBeforeUpdate(p, d)), E = null != f && f.type === g && null == f.key ? f.props.children : f, S(_, Array.isArray(E) ? E : [E], n, e, t, o, u, l, i, c), s.base = n.__e, n.__h = null, s.__h.length && l.push(s), y && (s.__E = s.__ = null), s.__e = !1
                    } else null == u && n.__v === e.__v ? (n.__k = e.__k, n.__e = e.__e) : n.__e = F(e.__e, n, e, t, o, u, l, c);
                    (f = r.diffed) && f(n)
                }
                catch (_) {
                    n.__v = null, (c || null != u) && (n.__e = i, n.__h = !!c, u[u.indexOf(i)] = null), r.__e(_, n, e)
                }
            }

            function V(_, n) {
                r.__c && r.__c(n, _), _.some((function(n) {
                    try {
                        _ = n.__h, n.__h = [], _.some((function(_) {
                            _.call(n)
                        }))
                    } catch (_) {
                        r.__e(_, n.__v)
                    }
                }))
            }

            function F(_, n, e, r, o, u, l, i) {
                var c, f, a, p = e.props,
                    h = n.props,
                    v = n.type,
                    y = 0;
                if ("svg" === v && (o = !0), null != u)
                    for (; y < u.length; y++)
                        if ((c = u[y]) && "setAttribute" in c == !!v && (v ? c.localName === v : 3 === c.nodeType)) {
                            _ = c, u[y] = null;
                            break
                        }
                if (null == _) {
                    if (null === v) return document.createTextNode(h);
                    _ = o ? document.createElementNS("http://www.w3.org/2000/svg", v) : document.createElement(v, h.is && h), u = null, i = !1
                }
                if (null === v) p === h || i && _.data === h || (_.data = h);
                else {
                    if (u = u && t.call(_.childNodes), f = (p = e.props || s).dangerouslySetInnerHTML, a = h.dangerouslySetInnerHTML, !i) {
                        if (null != u)
                            for (p = {}, y = 0; y < _.attributes.length; y++) p[_.attributes[y].name] = _.attributes[y].value;
                        (a || f) && (a && (f && a.__html == f.__html || a.__html === _.innerHTML) || (_.innerHTML = a && a.__html || ""))
                    }
                    if (function(_, n, e, t, r) {
                            var o;
                            for (o in e) "children" === o || "key" === o || o in n || k(_, o, null, e[o], t);
                            for (o in n) r && "function" != typeof n[o] || "children" === o || "key" === o || "value" === o || "checked" === o || e[o] === n[o] || k(_, o, n[o], e[o], t)
                        }(_, h, p, o, i), a) n.__k = [];
                    else if (y = n.props.children, S(_, Array.isArray(y) ? y : [y], n, e, r, o && "foreignObject" !== v, u, l, u ? u[0] : e.__k && H(e, 0), i), null != u)
                        for (y = u.length; y--;) null != u[y] && d(u[y]);
                    i || ("value" in h && void 0 !== (y = h.value) && (y !== _.value || "progress" === v && !y || "option" === v && y !== p.value) && k(_, "value", y, p.value, !1), "checked" in h && void 0 !== (y = h.checked) && y !== _.checked && k(_, "checked", y, p.checked, !1))
                }
                return _
            }

            function W(_, n, e) {
                try {
                    "function" == typeof _ ? _(n) : _.current = n
                } catch (_) {
                    r.__e(_, e)
                }
            }

            function L(_, n, e) {
                var t, o;
                if (r.unmount && r.unmount(_), (t = _.ref) && (t.current && t.current !== _.__e || W(t, null, n)), null != (t = _.__c)) {
                    if (t.componentWillUnmount) try {
                        t.componentWillUnmount()
                    } catch (_) {
                        r.__e(_, n)
                    }
                    t.base = t.__P = null, _.__c = void 0
                }
                if (t = _.__k)
                    for (o = 0; o < t.length; o++) t[o] && L(t[o], n, e || "function" != typeof _.type);
                e || null == _.__e || d(_.__e), _.__ = _.__e = _.__d = void 0
            }

            function R(_, n, e) {
                return this.constructor(_, e)
            }

            function I(_, n, e) {
                var o, u, l;
                r.__ && r.__(_, n), u = (o = "function" == typeof e) ? null : e && e.__k || n.__k, l = [], U(n, _ = (!o && e || n).__k = v(g, null, [_]), u || s, s, void 0 !== n.ownerSVGElement, !o && e ? [e] : u ? null : n.firstChild ? t.call(n.childNodes) : null, l, !o && e ? e : u ? u.__e : n.firstChild, o), V(l, _)
            }

            function O(_, n) {
                I(_, n, O)
            }

            function q(_, n, e) {
                var r, o, u, l = h({}, _.props);
                for (u in n) "key" == u ? r = n[u] : "ref" == u ? o = n[u] : l[u] = n[u];
                return arguments.length > 2 && (l.children = arguments.length > 3 ? t.call(arguments, 2) : e), y(_.type, l, r || _.key, o || _.ref, null)
            }

            function B(_, n) {
                var e = {
                    __c: n = "__cC" + f++,
                    __: _,
                    Consumer: function(_, n) {
                        return _.children(n)
                    },
                    Provider: function(_) {
                        var e, t;
                        return this.getChildContext || (e = [], (t = {})[n] = this, this.getChildContext = function() {
                            return t
                        }, this.shouldComponentUpdate = function(_) {
                            this.props.value !== _.value && e.some((function(_) {
                                _.__e = !0, N(_)
                            }))
                        }, this.sub = function(_) {
                            e.push(_);
                            var n = _.componentWillUnmount;
                            _.componentWillUnmount = function() {
                                e.splice(e.indexOf(_), 1), n && n.call(_)
                            }
                        }), _.children
                    }
                };
                return e.Provider.__ = e.Consumer.contextType = e
            }
            t = a.slice, r = {
                __e: function(_, n, e, t) {
                    for (var r, o, u; n = n.__;)
                        if ((r = n.__c) && !r.__) try {
                            if ((o = r.constructor) && null != o.getDerivedStateFromError && (r.setState(o.getDerivedStateFromError(_)), u = r.__d), null != r.componentDidCatch && (r.componentDidCatch(_, t || {}), u = r.__d), u) return r.__E = r
                        } catch (n) {
                            _ = n
                        }
                    throw _
                }
            }, o = 0, u = !1, C.prototype.setState = function(_, n) {
                var e;
                e = null != this.__s && this.__s !== this.state ? this.__s : this.__s = h({}, this.state), "function" == typeof _ && (_ = _(h({}, e), this.props)), _ && h(e, _), null != _ && this.__v && (n && this._sb.push(n), N(this))
            }, C.prototype.forceUpdate = function(_) {
                this.__v && (this.__e = !0, _ && this.__h.push(_), N(this))
            }, C.prototype.render = g, l = [], c = "function" == typeof Promise ? Promise.prototype.then.bind(Promise.resolve()) : setTimeout, P.__r = 0, f = 0
        },
        7317: (_, n, e) => {
            e.d(n, {
                I4: () => C,
                Me: () => N,
                Qb: () => Y,
                Ye: () => x,
                _Y: () => m,
                aP: () => M,
                bt: () => b,
                cO: () => E,
                d4: () => g,
                eJ: () => y,
                qp: () => H,
                sO: () => k
            });
            e(7733), e(4588), e(1578), e(1377), e(7288);
            var t, r, o, u, l = e(2979),
                i = 0,
                c = [],
                f = [],
                s = l.YM.__b,
                a = l.YM.__r,
                p = l.YM.diffed,
                h = l.YM.__c,
                d = l.YM.unmount;

            function v(_, n) {
                l.YM.__h && l.YM.__h(r, _, i || n), i = 0;
                var e = r.__H || (r.__H = {
                    __: [],
                    __h: []
                });
                return _ >= e.__.length && e.__.push({
                    __V: f
                }), e.__[_]
            }

            function y(_) {
                return i = 1, m(U, _)
            }

            function m(_, n, e) {
                var o = v(t++, 2);
                if (o.t = _, !o.__c && (o.__ = [e ? e(n) : U(void 0, n), function(_) {
                        var n = o.__N ? o.__N[0] : o.__[0],
                            e = o.t(n, _);
                        n !== e && (o.__N = [e, o.__[1]], o.__c.setState({}))
                    }], o.__c = r, !r.u)) {
                    r.u = !0;
                    var u = r.shouldComponentUpdate;
                    r.shouldComponentUpdate = function(_, n, e) {
                        if (!o.__c.__H) return !0;
                        var t = o.__c.__H.__.filter((function(_) {
                            return _.__c
                        }));
                        if (t.every((function(_) {
                                return !_.__N
                            }))) return !u || u.call(this, _, n, e);
                        var r = !1;
                        return t.forEach((function(_) {
                            if (_.__N) {
                                var n = _.__[0];
                                _.__ = _.__N, _.__N = void 0, n !== _.__[0] && (r = !0)
                            }
                        })), !(!r && o.__c.props === _) && (!u || u.call(this, _, n, e))
                    }
                }
                return o.__N || o.__
            }

            function g(_, n) {
                var e = v(t++, 3);
                !l.YM.__s && A(e.__H, n) && (e.__ = _, e.i = n, r.__H.__h.push(e))
            }

            function b(_, n) {
                var e = v(t++, 4);
                !l.YM.__s && A(e.__H, n) && (e.__ = _, e.i = n, r.__h.push(e))
            }

            function k(_) {
                return i = 5, x((function() {
                    return {
                        current: _
                    }
                }), [])
            }

            function M(_, n, e) {
                i = 6, b((function() {
                    return "function" == typeof _ ? (_(n()), function() {
                        return _(null)
                    }) : _ ? (_.current = n(), function() {
                        return _.current = null
                    }) : void 0
                }), null == e ? e : e.concat(_))
            }

            function x(_, n) {
                var e = v(t++, 7);
                return A(e.__H, n) ? (e.__V = _(), e.i = n, e.__h = _, e.__V) : e.__
            }

            function C(_, n) {
                return i = 8, x((function() {
                    return _
                }), n)
            }

            function H(_) {
                var n = r.context[_.__c],
                    e = v(t++, 9);
                return e.c = _, n ? (null == e.__ && (e.__ = !0, n.sub(r)), n.props.value) : _.__
            }

            function Y(_, n) {
                l.YM.useDebugValue && l.YM.useDebugValue(n ? n(_) : _)
            }

            function E(_) {
                var n = v(t++, 10),
                    e = y();
                return n.__ = _, r.componentDidCatch || (r.componentDidCatch = function(_, t) {
                    n.__ && n.__(_, t), e[1](_)
                }), [e[0], function() {
                    e[1](void 0)
                }]
            }

            function N() {
                var _ = v(t++, 11);
                if (!_.__) {
                    for (var n = r.__v; null !== n && !n.__m && null !== n.__;) n = n.__;
                    var e = n.__m || (n.__m = [0, 0]);
                    _.__ = "P" + e[0] + "-" + e[1]++
                }
                return _.__
            }

            function P() {
                for (var _; _ = c.shift();)
                    if (_.__P && _.__H) try {
                        _.__H.__h.forEach(T), _.__H.__h.forEach(D), _.__H.__h = []
                    } catch (n) {
                        _.__H.__h = [], l.YM.__e(n, _.__v)
                    }
            }
            l.YM.__b = function(_) {
                r = null, s && s(_)
            }, l.YM.__r = function(_) {
                a && a(_), t = 0;
                var n = (r = _.__c).__H;
                n && (o === r ? (n.__h = [], r.__h = [], n.__.forEach((function(_) {
                    _.__N && (_.__ = _.__N), _.__V = f, _.__N = _.i = void 0
                }))) : (n.__h.forEach(T), n.__h.forEach(D), n.__h = [])), o = r
            }, l.YM.diffed = function(_) {
                p && p(_);
                var n = _.__c;
                n && n.__H && (n.__H.__h.length && (1 !== c.push(n) && u === l.YM.requestAnimationFrame || ((u = l.YM.requestAnimationFrame) || w)(P)), n.__H.__.forEach((function(_) {
                    _.i && (_.__H = _.i), _.__V !== f && (_.__ = _.__V), _.i = void 0, _.__V = f
                }))), o = r = null
            }, l.YM.__c = function(_, n) {
                n.some((function(_) {
                    try {
                        _.__h.forEach(T), _.__h = _.__h.filter((function(_) {
                            return !_.__ || D(_)
                        }))
                    } catch (e) {
                        n.some((function(_) {
                            _.__h && (_.__h = [])
                        })), n = [], l.YM.__e(e, _.__v)
                    }
                })), h && h(_, n)
            }, l.YM.unmount = function(_) {
                d && d(_);
                var n, e = _.__c;
                e && e.__H && (e.__H.__.forEach((function(_) {
                    try {
                        T(_)
                    } catch (_) {
                        n = _
                    }
                })), e.__H = void 0, n && l.YM.__e(n, e.__v))
            };
            var S = "function" == typeof requestAnimationFrame;

            function w(_) {
                var n, e = function() {
                        clearTimeout(t), S && cancelAnimationFrame(n), setTimeout(_)
                    },
                    t = setTimeout(e, 100);
                S && (n = requestAnimationFrame(e))
            }

            function T(_) {
                var n = r,
                    e = _.__c;
                "function" == typeof e && (_.__c = void 0, e()), r = n
            }

            function D(_) {
                var n = r;
                _.__c = _.__(), r = n
            }

            function A(_, n) {
                return !_ || _.length !== n.length || n.some((function(n, e) {
                    return n !== _[e]
                }))
            }

            function U(_, n) {
                return "function" == typeof n ? n(_) : n
            }
        },
        7288: (_, n, e) => {
            var t = e(7584),
                r = e(5374),
                o = e(1833),
                u = e(9866);
            t({
                target: "Iterator",
                proto: !0,
                real: !0
            }, {
                some: function(_) {
                    var n = u(this),
                        e = 0;
                    return o(_), r(n, (function(n, t) {
                        if (_(n, e++)) return t()
                    }), {
                        IS_RECORD: !0,
                        INTERRUPTED: !0
                    }).stopped
                }
            })
        }
    }
]);