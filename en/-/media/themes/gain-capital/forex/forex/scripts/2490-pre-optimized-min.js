"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [2490], {
        2490: (e, n, t) => {
            t.r(n), t.d(n, {
                Children: () => d,
                Component: () => r.wA,
                Fragment: () => r.HY,
                PureComponent: () => a,
                StrictMode: () => Q,
                Suspense: () => b,
                SuspenseList: () => R,
                __SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED: () => H,
                cloneElement: () => F,
                createContext: () => r.kr,
                createElement: () => r.az,
                createFactory: () => $,
                createPortal: () => N,
                createRef: () => r.Vf,
                default: () => te,
                findDOMNode: () => J,
                flushSync: () => q,
                forwardRef: () => f,
                hydrate: () => P,
                isValidElement: () => B,
                lazy: () => E,
                memo: () => l,
                render: () => x,
                startTransition: () => G,
                unmountComponentAtNode: () => j,
                unstable_batchedUpdates: () => Z,
                useCallback: () => o.I4,
                useContext: () => o.qp,
                useDebugValue: () => o.Qb,
                useDeferredValue: () => K,
                useEffect: () => o.d4,
                useErrorBoundary: () => o.cO,
                useId: () => o.Me,
                useImperativeHandle: () => o.aP,
                useInsertionEffect: () => ee,
                useLayoutEffect: () => o.bt,
                useMemo: () => o.Ye,
                useReducer: () => o._Y,
                useRef: () => o.sO,
                useState: () => o.eJ,
                useSyncExternalStore: () => ne,
                useTransition: () => X,
                version: () => W
            });
            t(7733), t(1377), t(5347);
            var r = t(2979),
                o = t(7317);

            function u(e, n) {
                for (var t in n) e[t] = n[t];
                return e
            }

            function i(e, n) {
                for (var t in e)
                    if ("__source" !== t && !(t in n)) return !0;
                for (var r in n)
                    if ("__source" !== r && e[r] !== n[r]) return !0;
                return !1
            }

            function _(e, n) {
                return e === n && (0 !== e || 1 / e == 1 / n) || e != e && n != n
            }

            function a(e) {
                this.props = e
            }

            function l(e, n) {
                function t(e) {
                    var t = this.props.ref,
                        r = t == e.ref;
                    return !r && t && (t.call ? t(null) : t.current = null), n ? !n(this.props, e) || !r : i(this.props, e)
                }

                function o(n) {
                    return this.shouldComponentUpdate = t, (0, r.az)(e, n)
                }
                return o.displayName = "Memo(" + (e.displayName || e.name) + ")", o.prototype.isReactComponent = !0, o.__f = !0, o
            }(a.prototype = new r.wA).isPureReactComponent = !0, a.prototype.shouldComponentUpdate = function(e, n) {
                return i(this.props, e) || i(this.state, n)
            };
            var c = r.YM.__b;
            r.YM.__b = function(e) {
                e.type && e.type.__f && e.ref && (e.props.ref = e.ref, e.ref = null), c && c(e)
            };
            var s = "undefined" != typeof Symbol && Symbol.for && Symbol.for("react.forward_ref") || 3911;

            function f(e) {
                function n(n) {
                    var t = u({}, n);
                    return delete t.ref, e(t, n.ref || null)
                }
                return n.$$typeof = s, n.render = n, n.prototype.isReactComponent = n.__f = !0, n.displayName = "ForwardRef(" + (e.displayName || e.name) + ")", n
            }
            var p = function(e, n) {
                    return null == e ? null : (0, r.bR)((0, r.bR)(e).map(n))
                },
                d = {
                    map: p,
                    forEach: p,
                    count: function(e) {
                        return e ? (0, r.bR)(e).length : 0
                    },
                    only: function(e) {
                        var n = (0, r.bR)(e);
                        if (1 !== n.length) throw "Children.only";
                        return n[0]
                    },
                    toArray: r.bR
                },
                h = r.YM.__e;
            r.YM.__e = function(e, n, t, r) {
                if (e.then)
                    for (var o, u = n; u = u.__;)
                        if ((o = u.__c) && o.__c) return null == n.__e && (n.__e = t.__e, n.__k = t.__k), o.__c(e, n);
                h(e, n, t, r)
            };
            var v = r.YM.unmount;

            function m(e, n, t) {
                return e && (e.__c && e.__c.__H && (e.__c.__H.__.forEach((function(e) {
                    "function" == typeof e.__c && e.__c()
                })), e.__c.__H = null), null != (e = u({}, e)).__c && (e.__c.__P === t && (e.__c.__P = n), e.__c = null), e.__k = e.__k && e.__k.map((function(e) {
                    return m(e, n, t)
                }))), e
            }

            function y(e, n, t) {
                return e && (e.__v = null, e.__k = e.__k && e.__k.map((function(e) {
                    return y(e, n, t)
                })), e.__c && e.__c.__P === n && (e.__e && t.insertBefore(e.__e, e.__d), e.__c.__e = !0, e.__c.__P = t)), e
            }

            function b() {
                this.__u = 0, this.t = null, this.__b = null
            }

            function C(e) {
                var n = e.__.__c;
                return n && n.__a && n.__a(e)
            }

            function E(e) {
                var n, t, o;

                function u(u) {
                    if (n || (n = e()).then((function(e) {
                            t = e.default || e
                        }), (function(e) {
                            o = e
                        })), o) throw o;
                    if (!t) throw n;
                    return (0, r.az)(t, u)
                }
                return u.displayName = "Lazy", u.__f = !0, u
            }

            function R() {
                this.u = null, this.o = null
            }
            r.YM.unmount = function(e) {
                var n = e.__c;
                n && n.__R && n.__R(), n && !0 === e.__h && (e.type = null), v && v(e)
            }, (b.prototype = new r.wA).__c = function(e, n) {
                var t = n.__c,
                    r = this;
                null == r.t && (r.t = []), r.t.push(t);
                var o = C(r.__v),
                    u = !1,
                    i = function() {
                        u || (u = !0, t.__R = null, o ? o(_) : _())
                    };
                t.__R = i;
                var _ = function() {
                        if (!--r.__u) {
                            if (r.state.__a) {
                                var e = r.state.__a;
                                r.__v.__k[0] = y(e, e.__c.__P, e.__c.__O)
                            }
                            var n;
                            for (r.setState({
                                    __a: r.__b = null
                                }); n = r.t.pop();) n.forceUpdate()
                        }
                    },
                    a = !0 === n.__h;
                r.__u++ || a || r.setState({
                    __a: r.__b = r.__v.__k[0]
                }), e.then(i, i)
            }, b.prototype.componentWillUnmount = function() {
                this.t = []
            }, b.prototype.render = function(e, n) {
                if (this.__b) {
                    if (this.__v.__k) {
                        var t = document.createElement("div"),
                            o = this.__v.__k[0].__c;
                        this.__v.__k[0] = m(this.__b, t, o.__O = o.__P)
                    }
                    this.__b = null
                }
                var u = n.__a && (0, r.az)(r.HY, null, e.fallback);
                return u && (u.__h = null), [(0, r.az)(r.HY, null, n.__a ? null : e.children), u]
            };
            var S = function(e, n, t) {
                if (++t[1] === t[0] && e.o.delete(n), e.props.revealOrder && ("t" !== e.props.revealOrder[0] || !e.o.size))
                    for (t = e.u; t;) {
                        for (; t.length > 3;) t.pop()();
                        if (t[1] < t[0]) break;
                        e.u = t = t[2]
                    }
            };

            function k(e) {
                return this.getChildContext = function() {
                    return e.context
                }, e.children
            }

            function w(e) {
                var n = this,
                    t = e.i;
                n.componentWillUnmount = function() {
                    (0, r.sY)(null, n.l), n.l = null, n.i = null
                }, n.i && n.i !== t && n.componentWillUnmount(), e.__v ? (n.l || (n.i = t, n.l = {
                    nodeType: 1,
                    parentNode: t,
                    childNodes: [],
                    appendChild: function(e) {
                        this.childNodes.push(e), n.i.appendChild(e)
                    },
                    insertBefore: function(e, t) {
                        this.childNodes.push(e), n.i.appendChild(e)
                    },
                    removeChild: function(e) {
                        this.childNodes.splice(this.childNodes.indexOf(e) >>> 1, 1), n.i.removeChild(e)
                    }
                }), (0, r.sY)((0, r.az)(k, {
                    context: n.context
                }, e.__v), n.l)) : n.l && n.componentWillUnmount()
            }

            function N(e, n) {
                var t = (0, r.az)(w, {
                    __v: e,
                    i: n
                });
                return t.containerInfo = n, t
            }(R.prototype = new r.wA).__a = function(e) {
                var n = this,
                    t = C(n.__v),
                    r = n.o.get(e);
                return r[0]++,
                    function(o) {
                        var u = function() {
                            n.props.revealOrder ? (r.push(o), S(n, e, r)) : o()
                        };
                        t ? t(u) : u()
                    }
            }, R.prototype.render = function(e) {
                this.u = null, this.o = new Map;
                var n = (0, r.bR)(e.children);
                e.revealOrder && "b" === e.revealOrder[0] && n.reverse();
                for (var t = n.length; t--;) this.o.set(n[t], this.u = [1, 0, this.u]);
                return e.children
            }, R.prototype.componentDidUpdate = R.prototype.componentDidMount = function() {
                var e = this;
                this.o.forEach((function(n, t) {
                    S(e, t, n)
                }))
            };
            var O = "undefined" != typeof Symbol && Symbol.for && Symbol.for("react.element") || 60103,
                Y = /^(?:accent|alignment|arabic|baseline|cap|clip(?!PathU)|color|dominant|fill|flood|font|glyph(?!R)|horiz|image|letter|lighting|marker(?!H|W|U)|overline|paint|pointer|shape|stop|strikethrough|stroke|text(?!L)|transform|underline|unicode|units|v|vector|vert|word|writing|x(?!C))[A-Z]/,
                g = "undefined" != typeof document,
                M = function(e) {
                    return ("undefined" != typeof Symbol && "symbol" == typeof Symbol() ? /fil|che|rad/i : /fil|che|ra/i).test(e)
                };

            function x(e, n, t) {
                return null == n.__k && (n.textContent = ""), (0, r.sY)(e, n), "function" == typeof t && t(), e ? e.__c : null
            }

            function P(e, n, t) {
                return (0, r.ZB)(e, n), "function" == typeof t && t(), e ? e.__c : null
            }
            r.wA.prototype.isReactComponent = {}, ["componentWillMount", "componentWillReceiveProps", "componentWillUpdate"].forEach((function(e) {
                Object.defineProperty(r.wA.prototype, e, {
                    configurable: !0,
                    get: function() {
                        return this["UNSAFE_" + e]
                    },
                    set: function(n) {
                        Object.defineProperty(this, e, {
                            configurable: !0,
                            writable: !0,
                            value: n
                        })
                    }
                })
            }));
            var A = r.YM.event;

            function U() {}

            function I() {
                return this.cancelBubble
            }

            function L() {
                return this.defaultPrevented
            }
            r.YM.event = function(e) {
                return A && (e = A(e)), e.persist = U, e.isPropagationStopped = I, e.isDefaultPrevented = L, e.nativeEvent = e
            };
            var T, z = {
                    configurable: !0,
                    get: function() {
                        return this.class
                    }
                },
                D = r.YM.vnode;
            r.YM.vnode = function(e) {
                var n = e.type,
                    t = e.props,
                    o = t;
                if ("string" == typeof n) {
                    var u = -1 === n.indexOf("-");
                    for (var i in o = {}, t) {
                        var _ = t[i];
                        g && "children" === i && "noscript" === n || "value" === i && "defaultValue" in t && null == _ || ("defaultValue" === i && "value" in t && null == t.value ? i = "value" : "download" === i && !0 === _ ? _ = "" : /ondoubleclick/i.test(i) ? i = "ondblclick" : /^onchange(textarea|input)/i.test(i + n) && !M(t.type) ? i = "oninput" : /^onfocus$/i.test(i) ? i = "onfocusin" : /^onblur$/i.test(i) ? i = "onfocusout" : /^on(Ani|Tra|Tou|BeforeInp|Compo)/.test(i) ? i = i.toLowerCase() : u && Y.test(i) ? i = i.replace(/[A-Z0-9]/g, "-$&").toLowerCase() : null === _ && (_ = void 0), /^oninput$/i.test(i) && (i = i.toLowerCase(), o[i] && (i = "oninputCapture")), o[i] = _)
                    }
                    "select" == n && o.multiple && Array.isArray(o.value) && (o.value = (0, r.bR)(t.children).forEach((function(e) {
                        e.props.selected = -1 != o.value.indexOf(e.props.value)
                    }))), "select" == n && null != o.defaultValue && (o.value = (0, r.bR)(t.children).forEach((function(e) {
                        e.props.selected = o.multiple ? -1 != o.defaultValue.indexOf(e.props.value) : o.defaultValue == e.props.value
                    }))), e.props = o, t.class != t.className && (z.enumerable = "className" in t, null != t.className && (o.class = t.className), Object.defineProperty(o, "className", z))
                }
                e.$$typeof = O, D && D(e)
            };
            var V = r.YM.__r;
            r.YM.__r = function(e) {
                V && V(e), T = e.__c
            };
            var H = {
                    ReactCurrentDispatcher: {
                        current: {
                            readContext: function(e) {
                                return T.__n[e.__c].props.value
                            }
                        }
                    }
                },
                W = "17.0.2";

            function $(e) {
                return r.az.bind(null, e)
            }

            function B(e) {
                return !!e && e.$$typeof === O
            }

            function F(e) {
                return B(e) ? r.Tm.apply(null, arguments) : e
            }

            function j(e) {
                return !!e.__k && ((0, r.sY)(null, e), !0)
            }

            function J(e) {
                return e && (e.base || 1 === e.nodeType && e) || null
            }
            var Z = function(e, n) {
                    return e(n)
                },
                q = function(e, n) {
                    return e(n)
                },
                Q = r.HY;

            function G(e) {
                e()
            }

            function K(e) {
                return e
            }

            function X() {
                return [!1, G]
            }
            var ee = o.bt;

            function ne(e, n) {
                var t = n(),
                    r = (0, o.eJ)({
                        h: {
                            __: t,
                            v: n
                        }
                    }),
                    u = r[0].h,
                    i = r[1];
                return (0, o.bt)((function() {
                    u.__ = t, u.v = n, _(u.__, n()) || i({
                        h: u
                    })
                }), [e, t, n]), (0, o.d4)((function() {
                    return _(u.__, u.v()) || i({
                        h: u
                    }), e((function() {
                        _(u.__, u.v()) || i({
                            h: u
                        })
                    }))
                }), [e]), t
            }
            var te = {
                useState: o.eJ,
                useId: o.Me,
                useReducer: o._Y,
                useEffect: o.d4,
                useLayoutEffect: o.bt,
                useInsertionEffect: ee,
                useTransition: X,
                useDeferredValue: K,
                useSyncExternalStore: ne,
                startTransition: G,
                useRef: o.sO,
                useImperativeHandle: o.aP,
                useMemo: o.Ye,
                useCallback: o.I4,
                useContext: o.qp,
                useDebugValue: o.Qb,
                version: "17.0.2",
                Children: d,
                render: x,
                hydrate: P,
                unmountComponentAtNode: j,
                createPortal: N,
                createElement: r.az,
                createContext: r.kr,
                createFactory: $,
                cloneElement: F,
                createRef: r.Vf,
                Fragment: r.HY,
                isValidElement: B,
                findDOMNode: J,
                Component: r.wA,
                PureComponent: a,
                memo: l,
                forwardRef: f,
                flushSync: q,
                unstable_batchedUpdates: Z,
                StrictMode: Q,
                Suspense: b,
                SuspenseList: R,
                lazy: E,
                __SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED: H
            }
        }
    }
]);