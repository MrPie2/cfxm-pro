(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [8012], {
        2083: e => {
            "use strict";
            var t = Object.prototype.hasOwnProperty,
                n = "~";

            function o() {}

            function r(e, t, n) {
                this.fn = e, this.context = t, this.once = n || !1
            }

            function i(e, t, o, i, a) {
                if ("function" != typeof o) throw new TypeError("The listener must be a function");
                var s = new r(o, i || e, a),
                    c = n ? n + t : t;
                return e._events[c] ? e._events[c].fn ? e._events[c] = [e._events[c], s] : e._events[c].push(s) : (e._events[c] = s, e._eventsCount++), e
            }

            function a(e, t) {
                0 == --e._eventsCount ? e._events = new o : delete e._events[t]
            }

            function s() {
                this._events = new o, this._eventsCount = 0
            }
            Object.create && (o.prototype = Object.create(null), (new o).__proto__ || (n = !1)), s.prototype.eventNames = function() {
                var e, o, r = [];
                if (0 === this._eventsCount) return r;
                for (o in e = this._events) t.call(e, o) && r.push(n ? o.slice(1) : o);
                return Object.getOwnPropertySymbols ? r.concat(Object.getOwnPropertySymbols(e)) : r
            }, s.prototype.listeners = function(e) {
                var t = n ? n + e : e,
                    o = this._events[t];
                if (!o) return [];
                if (o.fn) return [o.fn];
                for (var r = 0, i = o.length, a = new Array(i); r < i; r++) a[r] = o[r].fn;
                return a
            }, s.prototype.listenerCount = function(e) {
                var t = n ? n + e : e,
                    o = this._events[t];
                return o ? o.fn ? 1 : o.length : 0
            }, s.prototype.emit = function(e, t, o, r, i, a) {
                var s = n ? n + e : e;
                if (!this._events[s]) return !1;
                var c, l, u = this._events[s],
                    d = arguments.length;
                if (u.fn) {
                    switch (u.once && this.removeListener(e, u.fn, void 0, !0), d) {
                        case 1:
                            return u.fn.call(u.context), !0;
                        case 2:
                            return u.fn.call(u.context, t), !0;
                        case 3:
                            return u.fn.call(u.context, t, o), !0;
                        case 4:
                            return u.fn.call(u.context, t, o, r), !0;
                        case 5:
                            return u.fn.call(u.context, t, o, r, i), !0;
                        case 6:
                            return u.fn.call(u.context, t, o, r, i, a), !0
                    }
                    for (l = 1, c = new Array(d - 1); l < d; l++) c[l - 1] = arguments[l];
                    u.fn.apply(u.context, c)
                } else {
                    var p, g = u.length;
                    for (l = 0; l < g; l++) switch (u[l].once && this.removeListener(e, u[l].fn, void 0, !0), d) {
                        case 1:
                            u[l].fn.call(u[l].context);
                            break;
                        case 2:
                            u[l].fn.call(u[l].context, t);
                            break;
                        case 3:
                            u[l].fn.call(u[l].context, t, o);
                            break;
                        case 4:
                            u[l].fn.call(u[l].context, t, o, r);
                            break;
                        default:
                            if (!c)
                                for (p = 1, c = new Array(d - 1); p < d; p++) c[p - 1] = arguments[p];
                            u[l].fn.apply(u[l].context, c)
                    }
                }
                return !0
            }, s.prototype.on = function(e, t, n) {
                return i(this, e, t, n, !1)
            }, s.prototype.once = function(e, t, n) {
                return i(this, e, t, n, !0)
            }, s.prototype.removeListener = function(e, t, o, r) {
                var i = n ? n + e : e;
                if (!this._events[i]) return this;
                if (!t) return a(this, i), this;
                var s = this._events[i];
                if (s.fn) s.fn !== t || r && !s.once || o && s.context !== o || a(this, i);
                else {
                    for (var c = 0, l = [], u = s.length; c < u; c++)(s[c].fn !== t || r && !s[c].once || o && s[c].context !== o) && l.push(s[c]);
                    l.length ? this._events[i] = 1 === l.length ? l[0] : l : a(this, i)
                }
                return this
            }, s.prototype.removeAllListeners = function(e) {
                var t;
                return e ? (t = n ? n + e : e, this._events[t] && a(this, t)) : (this._events = new o, this._eventsCount = 0), this
            }, s.prototype.off = s.prototype.removeListener, s.prototype.addListener = s.prototype.on, s.prefixed = n, s.EventEmitter = s, e.exports = s
        },
        621: () => {
            /*!
             * ASP.NET SignalR JavaScript Library 2.4.3
             * http://signalr.net/
             *
             * Copyright (c) .NET Foundation. All rights reserved.
             * Licensed under the Apache License, Version 2.0. See License.txt in the project root for license information.
             *
             */
            ! function(e, t, n) {
                var o = {
                    nojQuery: "jQuery was not found. Please ensure jQuery is referenced before the SignalR client JavaScript file.",
                    noTransportOnInit: "No transport could be initialized successfully. Try specifying a different transport or none at all for auto initialization.",
                    errorOnNegotiate: "Error during negotiation request.",
                    stoppedWhileLoading: "The connection was stopped during page load.",
                    stoppedWhileNegotiating: "The connection was stopped during the negotiate request.",
                    errorParsingNegotiateResponse: "Error parsing negotiate response.",
                    errorRedirectionExceedsLimit: "Negotiate redirection limit exceeded.",
                    errorDuringStartRequest: "Error during start request. Stopping the connection.",
                    errorFromServer: "Error message received from the server: '{0}'.",
                    stoppedDuringStartRequest: "The connection was stopped during the start request.",
                    errorParsingStartResponse: "Error parsing start response: '{0}'. Stopping the connection.",
                    invalidStartResponse: "Invalid start response: '{0}'. Stopping the connection.",
                    protocolIncompatible: "You are using a version of the client that isn't compatible with the server. Client version {0}, server version {1}.",
                    aspnetCoreSignalrServer: "Detected a connection attempt to an ASP.NET Core SignalR Server. This client only supports connecting to an ASP.NET SignalR Server. See https://aka.ms/signalr-core-differences for details.",
                    sendFailed: "Send failed.",
                    parseFailed: "Failed at parsing response: {0}",
                    longPollFailed: "Long polling request failed.",
                    eventSourceFailedToConnect: "EventSource failed to connect.",
                    eventSourceError: "Error raised by EventSource",
                    webSocketClosed: "WebSocket closed.",
                    pingServerFailedInvalidResponse: "Invalid ping response when pinging server: '{0}'.",
                    pingServerFailed: "Failed to ping server.",
                    pingServerFailedStatusCode: "Failed to ping server.  Server responded with status code {0}, stopping the connection.",
                    pingServerFailedParse: "Failed to parse ping server response, stopping the connection.",
                    noConnectionTransport: "Connection is in an invalid state, there is no transport active.",
                    webSocketsInvalidState: "The Web Socket transport is in an invalid state, transitioning into reconnecting.",
                    reconnectTimeout: "Couldn't reconnect within the configured timeout of {0} ms, disconnecting.",
                    reconnectWindowTimeout: "The client has been inactive since {0} and it has exceeded the inactivity timeout of {1} ms. Stopping the connection.",
                    jsonpNotSupportedWithAccessToken: "The JSONP protocol does not support connections that require a Bearer token to connect, such as the Azure SignalR Service."
                };
                if ("function" != typeof e) throw new Error(o.nojQuery);
                var r, i, a, s, c = "complete" === t.document.readyState,
                    l = e(t),
                    u = "__Negotiate Aborted__",
                    d = {
                        onStart: "onStart",
                        onStarting: "onStarting",
                        onReceived: "onReceived",
                        onError: "onError",
                        onConnectionSlow: "onConnectionSlow",
                        onReconnecting: "onReconnecting",
                        onReconnect: "onReconnect",
                        onStateChanged: "onStateChanged",
                        onDisconnect: "onDisconnect"
                    },
                    p = function(t, n, o) {
                        return n === t.state && (t.state = o, e(t).triggerHandler(d.onStateChanged, [{
                            oldState: n,
                            newState: o
                        }]), !0)
                    },
                    g = function(e) {
                        return e._.keepAliveData.activated && e.transport.supportsKeepAlive(e)
                    };

                function f(e, t) {
                    return t.match(/:\d+$/) ? t : t + ":" + function(e) {
                        return "http:" === e ? 80 : "https:" === e ? 443 : void 0
                    }(e)
                }

                function v(t, n) {
                    var o = this,
                        r = [];
                    o.tryBuffer = function(n) {
                        return t.state === e.signalR.connectionState.connecting && (r.push(n), !0)
                    }, o.drain = function() {
                        if (t.state === e.signalR.connectionState.connected)
                            for (; r.length > 0;) n(r.shift())
                    }, o.clear = function() {
                        r = []
                    }
                }(r = function(e, t, n) {
                    return new r.fn.init(e, t, n)
                })._ = {
                    defaultContentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    ieVersion: ("Microsoft Internet Explorer" === t.navigator.appName && (s = /MSIE ([0-9]+\.[0-9]+)/.exec(t.navigator.userAgent)) && (a = t.parseFloat(s[1])), a),
                    error: function(e, t, n) {
                        var o = new Error(e);
                        return o.source = t, void 0 !== n && (o.context = n), o
                    },
                    transportError: function(e, t, n, o) {
                        var r = this.error(e, n, o);
                        return r.transport = t ? t.name : undefined, r
                    },
                    format: function() {
                        for (var e = arguments[0], t = 0; t < arguments.length - 1; t++) e = e.replace("{" + t + "}", arguments[t + 1]);
                        return e
                    },
                    firefoxMajorVersion: function(e) {
                        var t = e.match(/Firefox\/(\d+)/);
                        return !t || !t.length || t.length < 2 ? 0 : parseInt(t[1], 10)
                    },
                    configurePingInterval: function(n) {
                        var o = n._.config,
                            i = function(t) {
                                e(n).triggerHandler(d.onError, [t])
                            };
                        o && !n._.pingIntervalId && o.pingInterval && (n._.pingIntervalId = t.setInterval((function() {
                            r.transports._logic.pingServer(n).fail(i)
                        }), o.pingInterval))
                    }
                }, r.events = d, r.resources = o, r.ajaxDefaults = {
                    processData: !0,
                    timeout: null,
                    async: !0,
                    global: !1,
                    cache: !1
                }, r.changeState = p, r.isDisconnecting = function(e) {
                    return e.state === r.connectionState.disconnected
                }, r.connectionState = {
                    connecting: 0,
                    connected: 1,
                    reconnecting: 2,
                    disconnected: 4
                }, r.hub = {
                    start: function() {
                        throw new Error("SignalR: Error loading hubs. Ensure your hubs reference is correct, e.g. <script src='/signalr/js'><\/script>.")
                    }
                }, "function" == typeof l.on ? l.on("load", (function() {
                    c = !0
                })) : l.load((function() {
                    c = !0
                })), r.fn = r.prototype = {
                    init: function(t, n, o) {
                        var r = e(this);
                        this.url = t, this.qs = n, this.lastError = null, this._ = {
                            keepAliveData: {},
                            connectingMessageBuffer: new v(this, (function(e) {
                                r.triggerHandler(d.onReceived, [e])
                            })),
                            lastMessageAt: (new Date).getTime(),
                            lastActiveAt: (new Date).getTime(),
                            beatInterval: 5e3,
                            beatHandle: null,
                            totalTransportConnectTimeout: 0,
                            redirectQs: null
                        }, "boolean" == typeof o && (this.logging = o)
                    },
                    _parseResponse: function(e) {
                        return e && "string" == typeof e ? this.json.parse(e) : e
                    },
                    _originalJson: t.JSON,
                    json: t.JSON,
                    isCrossDomain: function(n, o) {
                        var r;
                        return n = e.trim(n), o = o || t.location, 0 === n.indexOf("http") && ((r = t.document.createElement("a")).href = n, r.protocol + f(r.protocol, r.host) !== o.protocol + f(o.protocol, o.host))
                    },
                    ajaxDataType: "text",
                    contentType: "application/json; charset=UTF-8",
                    logging: !1,
                    state: r.connectionState.disconnected,
                    clientProtocol: "2.1",
                    supportedProtocols: ["1.5", "2.0", "2.1"],
                    negotiateRedirectSupportedProtocols: ["2.0", "2.1"],
                    reconnectDelay: 2e3,
                    transportConnectTimeout: 0,
                    disconnectTimeout: 3e4,
                    reconnectWindow: 3e4,
                    keepAliveWarnAt: 2 / 3,
                    start: function(n, i) {
                        var a, s = this,
                            f = {
                                pingInterval: 3e5,
                                waitForPageLoad: !0,
                                transport: "auto",
                                jsonp: !1
                            },
                            v = s._deferral || e.Deferred(),
                            h = t.document.createElement("a"),
                            m = function(n, o) {
                                n.url === o && n.baseUrl || (n.url = o, h.href = n.url, h.protocol && ":" !== h.protocol ? (n.protocol = h.protocol, n.host = h.host) : (n.protocol = t.document.location.protocol, n.host = h.host || t.document.location.host), n.baseUrl = n.protocol + "//" + n.host, n.wsProtocol = "https:" === n.protocol ? "wss://" : "ws://", 0 === n.url.indexOf("//") && (n.url = t.location.protocol + n.url, n.log("Protocol relative URL detected, normalizing it to '" + n.url + "'.")), n.isCrossDomain(n.url) && (n.log("Auto detected cross domain url."), "auto" === f.transport && (f.transport = ["webSockets", "serverSentEvents", "longPolling"]), void 0 === n.withCredentials && (n.withCredentials = !0), e.support.cors || (n.ajaxDataType = "jsonp", n.log("Using jsonp because this browser doesn't support CORS.")), n.contentType = r._.defaultContentType))
                            };
                        if (s.lastError = null, s._deferral = v, !s.json) throw new Error("SignalR: No JSON parser found. Please ensure json2.js is referenced before the SignalR.js file if you need to support clients without native JSON parsing support, e.g. IE<8.");
                        if ("function" === e.type(n) ? i = n : "object" === e.type(n) && (e.extend(f, n), "function" === e.type(f.callback) && (i = f.callback)), f.transport = function(t, n) {
                                if (e.isArray(t)) {
                                    for (var o = t.length - 1; o >= 0; o--) {
                                        var i = t[o];
                                        "string" === e.type(i) && r.transports[i] || (n.log("Invalid transport: " + i + ", removing it from the transports list."), t.splice(o, 1))
                                    }
                                    0 === t.length && (n.log("No transports remain within the specified transport array."), t = null)
                                } else if (r.transports[t] || "auto" === t) {
                                    if ("auto" === t && r._.ieVersion <= 8) return ["longPolling"]
                                } else n.log("Invalid transport: " + t.toString() + "."), t = null;
                                return t
                            }(f.transport, s), !f.transport) throw new Error("SignalR: Invalid transport(s) specified, aborting start.");
                        if (s._.config = f, !c && !0 === f.waitForPageLoad) return s._.deferredStartHandler = function() {
                            s.start(n, i)
                        }, l.bind("load", s._.deferredStartHandler), v.promise();
                        if (s.state === r.connectionState.connecting) return v.promise();
                        if (!1 === p(s, r.connectionState.disconnected, r.connectionState.connecting)) return v.resolve(s), v.promise();
                        ! function(n) {
                            var o, i;
                            n._.configuredStopReconnectingTimeout || (i = function(t) {
                                var n = r._.format(r.resources.reconnectTimeout, t.disconnectTimeout);
                                t.log(n), e(t).triggerHandler(d.onError, [r._.error(n, "TimeoutException")]), t.stop(!1, !1)
                            }, n.reconnecting((function() {
                                var e = this;
                                e.state === r.connectionState.reconnecting && (o = t.setTimeout((function() {
                                    i(e)
                                }), e.disconnectTimeout))
                            })), n.stateChanged((function(e) {
                                e.oldState === r.connectionState.reconnecting && t.clearTimeout(o)
                            })), n._.configuredStopReconnectingTimeout = !0)
                        }(s), "auto" === f.transport && !0 === f.jsonp && (f.transport = "longPolling"), s.withCredentials = f.withCredentials, s._originalUrl = s.url, s.ajaxDataType = f.jsonp ? "jsonp" : "text", m(s, s.url), e(s).bind(d.onStart, (function(t, n) {
                            "function" === e.type(i) && i.call(s), v.resolve(s)
                        })), s._.initHandler = r.transports._logic.initHandler(s), a = function(n, i) {
                            var c = r._.error(o.noTransportOnInit);
                            if ((i = i || 0) >= n.length) return 0 === i ? s.log("No transports supported by the server were selected.") : 1 === i ? s.log("No fallback transports were selected.") : s.log("Fallback transports exhausted."), e(s).triggerHandler(d.onError, [c]), v.reject(c), void s.stop();
                            if (s.state !== r.connectionState.disconnected) {
                                var u = n[i],
                                    f = r.transports[u],
                                    h = function() {
                                        a(n, i + 1)
                                    };
                                s.transport = f;
                                try {
                                    s._.initHandler.start(f, (function() {
                                        var n = r._.firefoxMajorVersion(t.navigator.userAgent) >= 11;
                                        s.log("The start request succeeded. Transitioning to the connected state."), g(s) && r.transports._logic.monitorKeepAlive(s), s._.keepAliveData.activated && r.transports._logic.startHeartbeat(s), r._.configurePingInterval(s), p(s, r.connectionState.connecting, r.connectionState.connected) || s.log("WARNING! The connection was not in the connecting state."), s._.connectingMessageBuffer.drain(), e(s).triggerHandler(d.onStart), l.bind("unload", (function() {
                                            s.log("Window unloading, stopping the connection."), s.stop(true)
                                        })), n && l.bind("beforeunload", (function() {
                                            t.setTimeout((function() {
                                                s.stop(true)
                                            }), 0)
                                        }))
                                    }), h)
                                } catch (e) {
                                    s.log(f.name + " transport threw '" + e.message + "' when attempting to start."), h()
                                }
                            }
                        };
                        var S = s.url + "/negotiate",
                            _ = function(t, n) {
                                var i = r._.error(o.errorOnNegotiate, t, n._.negotiateRequest);
                                e(n).triggerHandler(d.onError, i), v.reject(i), n.stop()
                            };
                        return e(s).triggerHandler(d.onStarting), S = r.transports._logic.prepareQueryString(s, S), s.log("Negotiating with '" + S + "'."), s._.negotiateRequest = function() {
                            var t, n, i, c = 0,
                                l = [],
                                p = [],
                                g = function(e, t) {
                                    var n = r.transports._logic.prepareQueryString(e, e.url + "/negotiate");
                                    e.log("Negotiating with '" + n + "'.");
                                    var i = {
                                        url: n,
                                        error: function(t, n) {
                                            n !== u ? _(t, e) : v.reject(r._.error(o.stoppedWhileNegotiating, null, e._.negotiateRequest))
                                        },
                                        success: t
                                    };
                                    return e.accessToken && (i.headers = {
                                        Authorization: "Bearer " + e.accessToken
                                    }), r.transports._logic.ajax(e, i)
                                },
                                h = function(u) {
                                    try {
                                        t = s._parseResponse(u)
                                    } catch (e) {
                                        return void _(r._.error(o.errorParsingNegotiateResponse, e), s)
                                    }
                                    if (t.availableTransports) return i = r._.error(o.aspnetCoreSignalrServer), e(s).triggerHandler(d.onError, [i]), void v.reject(i);
                                    if (!t.ProtocolVersion || -1 === s.supportedProtocols.indexOf(t.ProtocolVersion)) return i = r._.error(r._.format(o.protocolIncompatible, s.clientProtocol, t.ProtocolVersion)), e(s).triggerHandler(d.onError, [i]), void v.reject(i);
                                    if (-1 !== s.negotiateRedirectSupportedProtocols.indexOf(t.ProtocolVersion)) {
                                        if (t.Error) return i = r._.error(r._.format(o.errorFromServer, t.Error)), e(s).triggerHandler(d.onError, [i]), void v.reject(i);
                                        if (t.RedirectUrl) {
                                            if (100 === c) return void _(r._.error(o.errorRedirectionExceedsLimit), s);
                                            "auto" === f.transport && (f.transport = ["webSockets", "serverSentEvents", "longPolling"]), s.log("Received redirect to: " + t.RedirectUrl), s.accessToken = t.AccessToken;
                                            var S = t.RedirectUrl.split("?", 2);
                                            return m(s, S[0]), s._.redirectQs = 2 === S.length ? S[1] : null, "jsonp" === s.ajaxDataType && s.accessToken ? void _(r._.error(o.jsonpNotSupportedWithAccessToken), s) : (c++, void g(s, h))
                                        }
                                    }
                                    n = s._.keepAliveData, s.appRelativeUrl = t.Url, s.id = t.ConnectionId, s.token = t.ConnectionToken, s.webSocketServerUrl = t.WebSocketServerUrl, s._.pollTimeout = 1e3 * t.ConnectionTimeout + 1e4, s.disconnectTimeout = 1e3 * t.DisconnectTimeout, s._.totalTransportConnectTimeout = s.transportConnectTimeout + 1e3 * t.TransportConnectTimeout, t.KeepAliveTimeout ? (n.activated = !0, n.timeout = 1e3 * t.KeepAliveTimeout, n.timeoutWarning = n.timeout * s.keepAliveWarnAt, s._.beatInterval = (n.timeout - n.timeoutWarning) / 3) : n.activated = !1, s.reconnectWindow = s.disconnectTimeout + (n.timeout || 0), e.each(r.transports, (function(e) {
                                        if (0 === e.indexOf("_") || "webSockets" === e && !t.TryWebSockets) return !0;
                                        p.push(e)
                                    })), e.isArray(f.transport) ? e.each(f.transport, (function(t, n) {
                                        e.inArray(n, p) >= 0 && l.push(n)
                                    })) : "auto" === f.transport ? l = p : e.inArray(f.transport, p) >= 0 && l.push(f.transport), a(l)
                                };
                            return g(s, h)
                        }(), v.promise()
                    },
                    starting: function(t) {
                        var n = this;
                        return e(n).bind(d.onStarting, (function(e, o) {
                            t.call(n)
                        })), n
                    },
                    send: function(e) {
                        var t = this;
                        if (t.state === r.connectionState.disconnected) throw new Error("SignalR: Connection must be started before data can be sent. Call .start() before .send()");
                        if (t.state === r.connectionState.connecting) throw new Error("SignalR: Connection has not been fully initialized. Use .start().done() or .start().fail() to run logic after the connection has started.");
                        return t.transport.send(t, e), t
                    },
                    received: function(t) {
                        var n = this;
                        return e(n).bind(d.onReceived, (function(e, o) {
                            t.call(n, o)
                        })), n
                    },
                    stateChanged: function(t) {
                        var n = this;
                        return e(n).bind(d.onStateChanged, (function(e, o) {
                            t.call(n, o)
                        })), n
                    },
                    error: function(t) {
                        var n = this;
                        return e(n).bind(d.onError, (function(e, o, r) {
                            n.lastError = o, t.call(n, o, r)
                        })), n
                    },
                    disconnected: function(t) {
                        var n = this;
                        return e(n).bind(d.onDisconnect, (function(e, o) {
                            t.call(n)
                        })), n
                    },
                    connectionSlow: function(t) {
                        var n = this;
                        return e(n).bind(d.onConnectionSlow, (function(e, o) {
                            t.call(n)
                        })), n
                    },
                    reconnecting: function(t) {
                        var n = this;
                        return e(n).bind(d.onReconnecting, (function(e, o) {
                            t.call(n)
                        })), n
                    },
                    reconnected: function(t) {
                        var n = this;
                        return e(n).bind(d.onReconnect, (function(e, o) {
                            t.call(n)
                        })), n
                    },
                    stop: function(n, i) {
                        var a = this,
                            s = a._deferral;
                        return a._.deferredStartHandler && l.unbind("load", a._.deferredStartHandler), delete a._.config, delete a._.deferredStartHandler, c || a._.config && !0 !== a._.config.waitForPageLoad ? a.state !== r.connectionState.disconnected ? (a.log("Stopping connection."), t.clearTimeout(a._.beatHandle), t.clearInterval(a._.pingIntervalId), a.transport && (a.transport.stop(a), !1 !== i && a.transport.abort(a, n), g(a) && r.transports._logic.stopMonitoringKeepAlive(a), a.transport = null), a._.negotiateRequest && (a._.negotiateRequest.abort(u), delete a._.negotiateRequest), a._.initHandler && a._.initHandler.stop(), delete a._deferral, delete a.messageId, delete a.groupsToken, delete a.id, delete a._.pingIntervalId, delete a._.lastMessageAt, delete a._.lastActiveAt, a._.connectingMessageBuffer.clear(), e(a).unbind(d.onStart), delete a.accessToken, delete a.protocol, delete a.host, delete a.baseUrl, delete a.wsProtocol, delete a.contentType, a.url = a._originalUrl, a._.redirectQs = null, p(a, a.state, r.connectionState.disconnected), e(a).triggerHandler(d.onDisconnect), a) : void 0 : (a.log("Stopping connection prior to negotiate."), void(s && s.reject(r._.error(o.stoppedWhileLoading))))
                    },
                    log: function(e) {
                        ! function(e, n) {
                            var o;
                            !1 !== n && void 0 !== t.console && (o = "[" + (new Date).toTimeString() + "] SignalR: " + e, t.console.debug ? t.console.debug(o) : t.console.log && t.console.log(o))
                        }(e, this.logging)
                    }
                }, r.fn.init.prototype = r.fn, r.noConflict = function() {
                    return e.connection === r && (e.connection = i), r
                }, e.connection && (i = e.connection), e.connection = e.signalR = r
            }(window.jQuery, window),
            function(e, t, n) {
                var o, r = e.signalR,
                    i = e.signalR.events,
                    a = e.signalR.changeState,
                    s = "__Start Aborted__";

                function c(n) {
                    n._.keepAliveData.monitoring && function(t) {
                        var n, o = t._.keepAliveData;
                        t.state === r.connectionState.connected && ((n = (new Date).getTime() - t._.lastMessageAt) >= o.timeout ? (t.log("Keep alive timed out.  Notifying transport that connection has been lost."), t.transport.lostConnection(t)) : n >= o.timeoutWarning ? o.userNotified || (t.log("Keep alive has been missed, connection may be dead/slow."), e(t).triggerHandler(i.onConnectionSlow), o.userNotified = !0) : o.userNotified = !1)
                    }(n), o.markActive(n) && (n._.beatHandle = t.setTimeout((function() {
                        c(n)
                    }), n._.beatInterval))
                }

                function l(e, t) {
                    var n = e.url + t;
                    return e.transport && (n += "?transport=" + e.transport.name), o.prepareQueryString(e, n)
                }

                function u(e) {
                    this.connection = e, this.startRequested = !1, this.startCompleted = !1, this.connectionStopped = !1
                }
                r.transports = {}, u.prototype = {
                    start: function(e, n, o) {
                        var r = this,
                            i = r.connection,
                            a = !1;
                        r.startRequested || r.connectionStopped ? i.log("WARNING! " + e.name + " transport cannot be started. Initialization ongoing or completed.") : (i.log(e.name + " transport starting."), e.start(i, (function() {
                            a || r.initReceived(e, n)
                        }), (function(t) {
                            return a || (a = !0, r.transportFailed(e, t, o)), !r.startCompleted || r.connectionStopped
                        })), r.transportTimeoutHandle = t.setTimeout((function() {
                            a || (a = !0, i.log(e.name + " transport timed out when trying to connect."), r.transportFailed(e, undefined, o))
                        }), i._.totalTransportConnectTimeout))
                    },
                    stop: function() {
                        this.connectionStopped = !0, t.clearTimeout(this.transportTimeoutHandle), r.transports._logic.tryAbortStartRequest(this.connection)
                    },
                    initReceived: function(e, n) {
                        var o = this,
                            i = o.connection;
                        o.startRequested ? i.log("WARNING! The client received multiple init messages.") : o.connectionStopped || (o.startRequested = !0, t.clearTimeout(o.transportTimeoutHandle), i.log(e.name + " transport connected. Initiating start request."), r.transports._logic.ajaxStart(i, (function() {
                            o.startCompleted = !0, n()
                        })))
                    },
                    transportFailed: function(n, o, a) {
                        var s, c = this.connection,
                            l = c._deferral;
                        this.connectionStopped || (t.clearTimeout(this.transportTimeoutHandle), this.startRequested ? this.startCompleted || (s = r._.error(r.resources.errorDuringStartRequest, o), c.log(n.name + " transport failed during the start request. Stopping the connection."), e(c).triggerHandler(i.onError, [s]), l && l.reject(s), c.stop()) : (n.stop(c), c.log(n.name + " transport failed to connect. Attempting to fall back."), a()))
                    }
                }, o = r.transports._logic = {
                    ajax: function(t, n) {
                        return e.ajax(e.extend(!0, {}, e.signalR.ajaxDefaults, {
                            type: "GET",
                            data: {},
                            xhrFields: {
                                withCredentials: t.withCredentials
                            },
                            contentType: t.contentType,
                            dataType: t.ajaxDataType
                        }, n))
                    },
                    pingServer: function(t) {
                        var n, i, a = e.Deferred();
                        return t.transport ? (n = t.url + "/ping", n = o.addQs(n, t.qs), i = o.ajax(t, {
                            url: n,
                            headers: t.accessToken ? {
                                Authorization: "Bearer " + t.accessToken
                            } : {},
                            success: function(e) {
                                var n;
                                try {
                                    n = t._parseResponse(e)
                                } catch (e) {
                                    return a.reject(r._.transportError(r.resources.pingServerFailedParse, t.transport, e, i)), void t.stop()
                                }
                                "pong" === n.Response ? a.resolve() : a.reject(r._.transportError(r._.format(r.resources.pingServerFailedInvalidResponse, e), t.transport, null, i))
                            },
                            error: function(e) {
                                401 === e.status || 403 === e.status ? (a.reject(r._.transportError(r._.format(r.resources.pingServerFailedStatusCode, e.status), t.transport, e, i)), t.stop()) : a.reject(r._.transportError(r.resources.pingServerFailed, t.transport, e, i))
                            }
                        })) : a.reject(r._.transportError(r.resources.noConnectionTransport, t.transport)), a.promise()
                    },
                    prepareQueryString: function(e, n) {
                        var r;
                        return r = o.addQs(n, "clientProtocol=" + e.clientProtocol), r = "string" == typeof e._.redirectQs ? o.addQs(r, e._.redirectQs) : o.addQs(r, e.qs), e.token && (r += "&connectionToken=" + t.encodeURIComponent(e.token)), e.data && (r += "&connectionData=" + t.encodeURIComponent(e.data)), r
                    },
                    addQs: function(t, n) {
                        var o, r = -1 !== t.indexOf("?") ? "&" : "?";
                        if (!n) return t;
                        if ("object" == typeof n) return t + r + e.param(n);
                        if ("string" == typeof n) return "?" !== (o = n.charAt(0)) && "&" !== o || (r = ""), t + r + n;
                        throw new Error("Query string property must be either a string or object.")
                    },
                    getUrl: function(e, n, r, i, a) {
                        var s = ("webSockets" === n ? "" : e.baseUrl) + e.appRelativeUrl,
                            c = "transport=" + n;
                        return !a && e.groupsToken && (c += "&groupsToken=" + t.encodeURIComponent(e.groupsToken)), r ? (s += i ? "/poll" : "/reconnect", !a && e.messageId && (c += "&messageId=" + t.encodeURIComponent(e.messageId))) : s += "/connect", s += "?" + c, s = o.prepareQueryString(e, s), e.transport && e.accessToken && ("serverSentEvents" !== e.transport.name && "webSockets" !== e.transport.name || (s += "&access_token=" + t.encodeURIComponent(e.accessToken))), a || (s += "&tid=" + Math.floor(11 * Math.random())), s
                    },
                    maximizePersistentResponse: function(e) {
                        return {
                            MessageId: e.C,
                            Messages: e.M,
                            Initialized: void 0 !== e.S,
                            ShouldReconnect: void 0 !== e.T,
                            LongPollDelay: e.L,
                            GroupsToken: e.G,
                            Error: e.E
                        }
                    },
                    updateGroups: function(e, t) {
                        t && (e.groupsToken = t)
                    },
                    stringifySend: function(e, t) {
                        return "string" == typeof t || null == t ? t : e.json.stringify(t)
                    },
                    ajaxSend: function(t, n) {
                        var a, s = o.stringifySend(t, n),
                            c = l(t, "/send"),
                            u = function(t, o) {
                                e(o).triggerHandler(i.onError, [r._.transportError(r.resources.sendFailed, o.transport, t, a), n])
                            };
                        return a = o.ajax(t, {
                            url: c,
                            type: "jsonp" === t.ajaxDataType ? "GET" : "POST",
                            contentType: r._.defaultContentType,
                            headers: t.accessToken ? {
                                Authorization: "Bearer " + t.accessToken
                            } : {},
                            data: {
                                data: s
                            },
                            success: function(e) {
                                var n;
                                if (e) {
                                    try {
                                        n = t._parseResponse(e)
                                    } catch (e) {
                                        return u(e, t), void t.stop()
                                    }
                                    o.triggerReceived(t, n)
                                }
                            },
                            error: function(e, n) {
                                "abort" !== n && "parsererror" !== n && u(e, t)
                            }
                        })
                    },
                    ajaxAbort: function(e, n) {
                        if (void 0 !== e.transport) {
                            n = void 0 === n || n;
                            var r = l(e, "/abort"),
                                i = e.accessToken ? {
                                    Authorization: "Bearer " + e.accessToken
                                } : {};
                            t.fetch ? t.fetch(r, {
                                method: "POST",
                                keepalive: !0,
                                headers: i,
                                credentials: !0 === e.withCredentials ? "include" : "same-origin"
                            }) : o.ajax(e, {
                                url: r,
                                async: n,
                                timeout: 1e3,
                                type: "POST",
                                headers: i,
                                dataType: "text"
                            }), e.log("Fired ajax abort async = " + n + ".")
                        }
                    },
                    ajaxStart: function(t, n) {
                        var a = function(e) {
                                var n = t._deferral;
                                n && n.reject(e)
                            },
                            c = function(n) {
                                t.log("The start request failed. Stopping the connection."), e(t).triggerHandler(i.onError, [n]), a(n), t.stop()
                            };
                        t._.startRequest = o.ajax(t, {
                            url: l(t, "/start"),
                            headers: t.accessToken ? {
                                Authorization: "Bearer " + t.accessToken
                            } : {},
                            success: function(e, o, i) {
                                var a;
                                try {
                                    a = t._parseResponse(e)
                                } catch (t) {
                                    return void c(r._.error(r._.format(r.resources.errorParsingStartResponse, e), t, i))
                                }
                                "started" === a.Response ? n() : c(r._.error(r._.format(r.resources.invalidStartResponse, e), null, i))
                            },
                            error: function(e, n, o) {
                                n !== s ? c(r._.error(r.resources.errorDuringStartRequest, o, e)) : (t.log("The start request aborted because connection.stop() was called."), a(r._.error(r.resources.stoppedDuringStartRequest, null, e)))
                            }
                        })
                    },
                    tryAbortStartRequest: function(e) {
                        e._.startRequest && (e._.startRequest.abort(s), delete e._.startRequest)
                    },
                    tryInitialize: function(e, t, n) {
                        t.Initialized && n ? n() : t.Initialized && e.log("WARNING! The client received an init message after reconnecting.")
                    },
                    triggerReceived: function(t, n) {
                        t._.connectingMessageBuffer.tryBuffer(n) || e(t).triggerHandler(i.onReceived, [n])
                    },
                    processMessages: function(t, n, i) {
                        var a;
                        if (n && void 0 !== n.I) o.triggerReceived(t, n);
                        else if (o.markLastMessage(t), n) {
                            if ((a = o.maximizePersistentResponse(n)).Error) return t.log("Received an error message from the server: " + n.E), e(t).triggerHandler(r.events.onError, [r._.error(n.E, "ServerError")]), void t.stop(!1, !1);
                            o.updateGroups(t, a.GroupsToken), a.MessageId && (t.messageId = a.MessageId), a.Messages && (e.each(a.Messages, (function(e, n) {
                                o.triggerReceived(t, n)
                            })), o.tryInitialize(t, a, i))
                        }
                    },
                    monitorKeepAlive: function(t) {
                        var n = t._.keepAliveData;
                        n.monitoring ? t.log("Tried to monitor keep alive but it's already being monitored.") : (n.monitoring = !0, o.markLastMessage(t), t._.keepAliveData.reconnectKeepAliveUpdate = function() {
                            o.markLastMessage(t)
                        }, e(t).bind(i.onReconnect, t._.keepAliveData.reconnectKeepAliveUpdate), t.log("Now monitoring keep alive with a warning timeout of " + n.timeoutWarning + ", keep alive timeout of " + n.timeout + " and disconnecting timeout of " + t.disconnectTimeout))
                    },
                    stopMonitoringKeepAlive: function(t) {
                        var n = t._.keepAliveData;
                        n.monitoring && (n.monitoring = !1, e(t).unbind(i.onReconnect, t._.keepAliveData.reconnectKeepAliveUpdate), t._.keepAliveData = {}, t.log("Stopping the monitoring of the keep alive."))
                    },
                    startHeartbeat: function(e) {
                        e._.lastActiveAt = (new Date).getTime(), c(e)
                    },
                    markLastMessage: function(e) {
                        e._.lastMessageAt = (new Date).getTime(), e._.lastActiveAt = e._.lastMessageAt
                    },
                    markActive: function(e) {
                        return !!o.verifyLastActive(e) && (e._.lastActiveAt = (new Date).getTime(), !0)
                    },
                    isConnectedOrReconnecting: function(e) {
                        return e.state === r.connectionState.connected || e.state === r.connectionState.reconnecting
                    },
                    ensureReconnectingState: function(t) {
                        return !0 === a(t, r.connectionState.connected, r.connectionState.reconnecting) && e(t).triggerHandler(i.onReconnecting), t.state === r.connectionState.reconnecting
                    },
                    clearReconnectTimeout: function(e) {
                        e && e._.reconnectTimeout && (t.clearTimeout(e._.reconnectTimeout), delete e._.reconnectTimeout)
                    },
                    verifyLastActive: function(t) {
                        if (!t._.keepAliveData.activated || (new Date).getTime() - t._.lastActiveAt < t.reconnectWindow) return !0;
                        var n = r._.format(r.resources.reconnectWindowTimeout, new Date(t._.lastActiveAt), t.reconnectWindow);
                        return t.log(n), e(t).triggerHandler(i.onError, [r._.error(n, "TimeoutException")]), t.stop(!1, !1), !1
                    },
                    reconnect: function(e, n) {
                        var i = r.transports[n];
                        if (o.isConnectedOrReconnecting(e) && !e._.reconnectTimeout) {
                            if (!o.verifyLastActive(e)) return;
                            e._.reconnectTimeout = t.setTimeout((function() {
                                o.verifyLastActive(e) && (i.stop(e), o.ensureReconnectingState(e) && (e.log(n + " reconnecting."), i.start(e)))
                            }), e.reconnectDelay)
                        }
                    },
                    handleParseFailure: function(t, n, o, a, s) {
                        var c = r._.transportError(r._.format(r.resources.parseFailed, n), t.transport, o, s);
                        a && a(c) ? t.log("Failed to parse server response while attempting to connect.") : (e(t).triggerHandler(i.onError, [c]), t.stop())
                    },
                    initHandler: function(e) {
                        return new u(e)
                    },
                    foreverFrame: {
                        count: 0,
                        connections: {}
                    }
                }
            }(window.jQuery, window),
            function(e, t, n) {
                var o = e.signalR,
                    r = e.signalR.events,
                    i = e.signalR.changeState,
                    a = o.transports._logic;
                o.transports.webSockets = {
                    name: "webSockets",
                    supportsKeepAlive: function() {
                        return !0
                    },
                    send: function(t, n) {
                        var i = a.stringifySend(t, n);
                        try {
                            t.socket.send(i)
                        } catch (i) {
                            e(t).triggerHandler(r.onError, [o._.transportError(o.resources.webSocketsInvalidState, t.transport, i, t.socket), n])
                        }
                    },
                    start: function(n, s, c) {
                        var l, u = !1,
                            d = this,
                            p = !s,
                            g = e(n);
                        t.WebSocket ? n.socket || (l = n.webSocketServerUrl ? n.webSocketServerUrl : n.wsProtocol + n.host, l += a.getUrl(n, this.name, p), n.log("Connecting to websocket endpoint '" + l + "'."), n.socket = new t.WebSocket(l), n.socket.onopen = function() {
                            u = !0, n.log("Websocket opened."), a.clearReconnectTimeout(n), !0 === i(n, o.connectionState.reconnecting, o.connectionState.connected) && g.triggerHandler(r.onReconnect)
                        }, n.socket.onclose = function(t) {
                            var i;
                            this === n.socket && (u && void 0 !== t.wasClean && !1 === t.wasClean ? (i = o._.transportError(o.resources.webSocketClosed, n.transport, t), n.log("Unclean disconnect from websocket: " + (t.reason || "[no reason given]."))) : n.log("Websocket closed."), c && c(i) || (i && e(n).triggerHandler(r.onError, [i]), d.reconnect(n)))
                        }, n.socket.onmessage = function(e) {
                            var t;
                            try {
                                t = n._parseResponse(e.data)
                            } catch (t) {
                                return void a.handleParseFailure(n, e.data, t, c, e)
                            }
                            t && a.processMessages(n, t, s)
                        }) : c()
                    },
                    reconnect: function(e) {
                        a.reconnect(e, this.name)
                    },
                    lostConnection: function(e) {
                        this.reconnect(e)
                    },
                    stop: function(e) {
                        a.clearReconnectTimeout(e), e.socket && (e.log("Closing the Websocket."), e.socket.close(), e.socket = null)
                    },
                    abort: function(e, t) {
                        a.ajaxAbort(e, t)
                    }
                }
            }(window.jQuery, window),
            function(e, t, n) {
                var o = e.signalR,
                    r = e.signalR.events,
                    i = e.signalR.changeState,
                    a = o.transports._logic,
                    s = function(e) {
                        t.clearTimeout(e._.reconnectAttemptTimeoutHandle), delete e._.reconnectAttemptTimeoutHandle
                    };
                o.transports.serverSentEvents = {
                    name: "serverSentEvents",
                    supportsKeepAlive: function() {
                        return !0
                    },
                    timeOut: 3e3,
                    start: function(n, c, l) {
                        var u, d = this,
                            p = !1,
                            g = e(n),
                            f = !c;
                        if (n.eventSource && (n.log("The connection already has an event source. Stopping it."), n.stop()), t.EventSource) {
                            u = a.getUrl(n, this.name, f);
                            try {
                                n.log("Attempting to connect to SSE endpoint '" + u + "'."), n.eventSource = new t.EventSource(u, {
                                    withCredentials: n.withCredentials
                                })
                            } catch (e) {
                                return n.log("EventSource failed trying to connect with error " + e.Message + "."), void(l ? l() : (g.triggerHandler(r.onError, [o._.transportError(o.resources.eventSourceFailedToConnect, n.transport, e)]), f && d.reconnect(n)))
                            }
                            f && (n._.reconnectAttemptTimeoutHandle = t.setTimeout((function() {
                                !1 === p && n.eventSource.readyState !== t.EventSource.OPEN && d.reconnect(n)
                            }), d.timeOut)), n.eventSource.addEventListener("open", (function(e) {
                                n.log("EventSource connected."), s(n), a.clearReconnectTimeout(n), !1 === p && (p = !0, !0 === i(n, o.connectionState.reconnecting, o.connectionState.connected) && g.triggerHandler(r.onReconnect))
                            }), !1), n.eventSource.addEventListener("message", (function(e) {
                                var t;
                                if ("initialized" !== e.data) {
                                    try {
                                        t = n._parseResponse(e.data)
                                    } catch (t) {
                                        return void a.handleParseFailure(n, e.data, t, l, e)
                                    }
                                    a.processMessages(n, t, c)
                                }
                            }), !1), n.eventSource.addEventListener("error", (function(e) {
                                var i = o._.transportError(o.resources.eventSourceError, n.transport, e);
                                this === n.eventSource && (l && l(i) || (n.log("EventSource readyState: " + n.eventSource.readyState + "."), e.eventPhase === t.EventSource.CLOSED ? (n.log("EventSource reconnecting due to the server connection ending."), d.reconnect(n)) : (n.log("EventSource error."), g.triggerHandler(r.onError, [i]))))
                            }), !1)
                        } else l && (n.log("This browser doesn't support SSE."), l())
                    },
                    reconnect: function(e) {
                        a.reconnect(e, this.name)
                    },
                    lostConnection: function(e) {
                        this.reconnect(e)
                    },
                    send: function(e, t) {
                        a.ajaxSend(e, t)
                    },
                    stop: function(e) {
                        s(e), a.clearReconnectTimeout(e), e && e.eventSource && (e.log("EventSource calling close()."), e.eventSource.close(), e.eventSource = null, delete e.eventSource)
                    },
                    abort: function(e, t) {
                        a.ajaxAbort(e, t)
                    }
                }
            }(window.jQuery, window),
            function(e, t, n) {
                var o, r, i = e.signalR,
                    a = e.signalR.events,
                    s = e.signalR.changeState,
                    c = i.transports._logic,
                    l = function() {
                        var e = t.document.createElement("iframe");
                        return e.setAttribute("style", "position:absolute;top:0;left:0;width:0;height:0;visibility:hidden;"), e
                    },
                    u = (o = null, r = 0, {
                        prevent: function() {
                            i._.ieVersion <= 8 && (0 === r && (o = t.setInterval((function() {
                                var e = l();
                                t.document.body.appendChild(e), t.document.body.removeChild(e), e = null
                            }), 1e3)), r++)
                        },
                        cancel: function() {
                            1 === r && t.clearInterval(o), r > 0 && r--
                        }
                    });
                i.transports.foreverFrame = {
                    name: "foreverFrame",
                    supportsKeepAlive: function() {
                        return !0
                    },
                    iframeClearThreshold: 50,
                    start: function(e, n, o) {
                        if (e.accessToken) o && (e.log("Forever Frame does not support connections that require a Bearer token to connect, such as the Azure SignalR Service."), o());
                        else {
                            var r, i = this,
                                a = c.foreverFrame.count += 1,
                                s = l(),
                                d = function() {
                                    e.log("Forever frame iframe finished loading and is no longer receiving messages."), o && o() || i.reconnect(e)
                                };
                            t.EventSource ? o && (e.log("Forever Frame is not supported by SignalR on browsers with SSE support."), o()) : (s.setAttribute("data-signalr-connection-id", e.id), u.prevent(), r = c.getUrl(e, this.name), r += "&frameId=" + a, t.document.documentElement.appendChild(s), e.log("Binding to iframe's load event."), s.addEventListener ? s.addEventListener("load", d, !1) : s.attachEvent && s.attachEvent("onload", d), s.src = r, c.foreverFrame.connections[a] = e, e.frame = s, e.frameId = a, n && (e.onSuccess = function() {
                                e.log("Iframe transport started."), n()
                            }))
                        }
                    },
                    reconnect: function(e) {
                        var n = this;
                        c.isConnectedOrReconnecting(e) && c.verifyLastActive(e) && t.setTimeout((function() {
                            if (c.verifyLastActive(e) && e.frame && c.ensureReconnectingState(e)) {
                                var t = e.frame,
                                    o = c.getUrl(e, n.name, !0) + "&frameId=" + e.frameId;
                                e.log("Updating iframe src to '" + o + "'."), t.src = o
                            }
                        }), e.reconnectDelay)
                    },
                    lostConnection: function(e) {
                        this.reconnect(e)
                    },
                    send: function(e, t) {
                        c.ajaxSend(e, t)
                    },
                    receive: function(t, n) {
                        var o, r, a;
                        if (t.json !== t._originalJson && (n = t._originalJson.stringify(n)), a = t._parseResponse(n), c.processMessages(t, a, t.onSuccess), t.state === e.signalR.connectionState.connected && (t.frameMessageCount = (t.frameMessageCount || 0) + 1, t.frameMessageCount > i.transports.foreverFrame.iframeClearThreshold && (t.frameMessageCount = 0, (o = t.frame.contentWindow || t.frame.contentDocument) && o.document && o.document.body)))
                            for (r = o.document.body; r.firstChild;) r.removeChild(r.firstChild)
                    },
                    stop: function(e) {
                        var n = null;
                        if (u.cancel(), e.frame) {
                            if (e.frame.stop) e.frame.stop();
                            else try {
                                (n = e.frame.contentWindow || e.frame.contentDocument).document && n.document.execCommand && n.document.execCommand("Stop")
                            } catch (t) {
                                e.log("Error occurred when stopping foreverFrame transport. Message = " + t.message + ".")
                            }
                            e.frame.parentNode === t.document.documentElement && t.document.documentElement.removeChild(e.frame), delete c.foreverFrame.connections[e.frameId], e.frame = null, e.frameId = null, delete e.frame, delete e.frameId, delete e.onSuccess, delete e.frameMessageCount, e.log("Stopping forever frame.")
                        }
                    },
                    abort: function(e, t) {
                        c.ajaxAbort(e, t)
                    },
                    getConnection: function(e) {
                        return c.foreverFrame.connections[e]
                    },
                    started: function(t) {
                        !0 === s(t, i.connectionState.reconnecting, i.connectionState.connected) && e(t).triggerHandler(a.onReconnect)
                    }
                }
            }(window.jQuery, window),
            function(e, t, n) {
                var o = e.signalR,
                    r = e.signalR.events,
                    i = e.signalR.changeState,
                    a = e.signalR.isDisconnecting,
                    s = o.transports._logic;
                o.transports.longPolling = {
                    name: "longPolling",
                    supportsKeepAlive: function() {
                        return !1
                    },
                    reconnectDelay: 3e3,
                    start: function(n, c, l) {
                        var u = this,
                            d = function() {
                                d = e.noop, n.log("LongPolling connected."), c ? c() : n.log("WARNING! The client received an init message after reconnecting.")
                            },
                            p = function(e) {
                                return !!l(e) && (n.log("LongPolling failed to connect."), !0)
                            },
                            g = n._,
                            f = 0,
                            v = function(n) {
                                t.clearTimeout(g.reconnectTimeoutId), g.reconnectTimeoutId = null, !0 === i(n, o.connectionState.reconnecting, o.connectionState.connected) && (n.log("Raising the reconnect event"), e(n).triggerHandler(r.onReconnect))
                            };
                        n.pollXhr && (n.log("Polling xhr requests already exists, aborting."), n.stop()), n.messageId = null, g.reconnectTimeoutId = null, g.pollTimeoutId = t.setTimeout((function() {
                            ! function i(c, l) {
                                var h = !(null === c.messageId),
                                    m = !l,
                                    S = s.getUrl(c, u.name, h, m, !0),
                                    _ = {};
                                c.messageId && (_.messageId = c.messageId), c.groupsToken && (_.groupsToken = c.groupsToken), !0 !== a(c) && (n.log("Opening long polling request to '" + S + "'."), c.pollXhr = s.ajax(n, {
                                    xhrFields: {
                                        onprogress: function() {
                                            s.markLastMessage(n)
                                        }
                                    },
                                    url: S,
                                    type: "POST",
                                    contentType: o._.defaultContentType,
                                    data: _,
                                    timeout: n._.pollTimeout,
                                    headers: n.accessToken ? {
                                        Authorization: "Bearer " + n.accessToken
                                    } : {},
                                    success: function(o) {
                                        var r, l, u, h = 0;
                                        n.log("Long poll complete."), f = 0;
                                        try {
                                            r = n._parseResponse(o)
                                        } catch (e) {
                                            return void s.handleParseFailure(c, o, e, p, c.pollXhr)
                                        }
                                        null !== g.reconnectTimeoutId && v(c), r && (l = s.maximizePersistentResponse(r)), s.processMessages(c, r, d), l && "number" === e.type(l.LongPollDelay) && (h = l.LongPollDelay), !0 !== a(c) && ((u = l && l.ShouldReconnect) && !s.ensureReconnectingState(c) || (h > 0 ? g.pollTimeoutId = t.setTimeout((function() {
                                            i(c, u)
                                        }), h) : i(c, u)))
                                    },
                                    error: function(a, l) {
                                        var d = o._.transportError(o.resources.longPollFailed, n.transport, a, c.pollXhr);
                                        if (t.clearTimeout(g.reconnectTimeoutId), g.reconnectTimeoutId = null, "abort" !== l) {
                                            if (!p(d)) {
                                                if (f++, n.state !== o.connectionState.reconnecting && (n.log("An error occurred using longPolling. Status = " + l + ".  Response = " + a.responseText + "."), e(c).triggerHandler(r.onError, [d])), (n.state === o.connectionState.connected || n.state === o.connectionState.reconnecting) && !s.verifyLastActive(n)) return;
                                                if (!s.ensureReconnectingState(c)) return;
                                                g.pollTimeoutId = t.setTimeout((function() {
                                                    i(c, !0)
                                                }), u.reconnectDelay)
                                            }
                                        } else n.log("Aborted xhr request.")
                                    }
                                }), h && !0 === l && (g.reconnectTimeoutId = t.setTimeout((function() {
                                    v(c)
                                }), Math.min(1e3 * (Math.pow(2, f) - 1), 36e5))))
                            }(n)
                        }), 250)
                    },
                    lostConnection: function(e) {
                        e.pollXhr && e.pollXhr.abort("lostConnection")
                    },
                    send: function(e, t) {
                        s.ajaxSend(e, t)
                    },
                    stop: function(e) {
                        t.clearTimeout(e._.pollTimeoutId), t.clearTimeout(e._.reconnectTimeoutId), delete e._.pollTimeoutId, delete e._.reconnectTimeoutId, e.pollXhr && (e.pollXhr.abort(), e.pollXhr = null, delete e.pollXhr)
                    },
                    abort: function(e, t) {
                        s.ajaxAbort(e, t)
                    }
                }
            }(window.jQuery, window),
            function(e, t, n) {
                var o = 0,
                    r = e.signalR;

                function i(e) {
                    return e + ".hubProxy"
                }

                function a(t) {
                    return e.isFunction(t) || "undefined" === e.type(t) ? null : t
                }

                function s(e) {
                    for (var t in e)
                        if (e.hasOwnProperty(t)) return !0;
                    return !1
                }

                function c(e, t) {
                    var n, o = e._.invocationCallbacks;
                    for (var r in s(o) && e.log("Clearing hub invocation callbacks with error: " + t + "."), e._.invocationCallbackId = 0, delete e._.invocationCallbacks, e._.invocationCallbacks = {}, o)(n = o[r]).method.call(n.scope, {
                        E: t
                    })
                }

                function l(t) {
                    return e.isFunction(t) && t.toString().slice(0, 256).indexOf("// Call the client hub method") >= 0
                }

                function u(e, t) {
                    return new u.fn.init(e, t)
                }

                function d(t, n) {
                    var o = {
                        qs: null,
                        logging: !1,
                        useDefaultPath: !0
                    };
                    return e.extend(o, n), t && !o.useDefaultPath || (t = (t || "") + "/signalr"), new d.fn.init(t, o)
                }
                u.fn = u.prototype = {
                    init: function(e, t) {
                        this.state = {}, this.connection = e, this.hubName = t, this._ = {
                            callbackMap: {}
                        }
                    },
                    constructor: u,
                    hasSubscriptions: function() {
                        return s(this._.callbackMap)
                    },
                    on: function(t, n, r) {
                        var a = this,
                            s = a._.callbackMap,
                            c = !r && l(n);
                        (r = r || n)._signalRGuid || (r._signalRGuid = o++);
                        var u, d = s[t = t.toLowerCase()];
                        d || (d = [], s[t] = d);
                        for (var p = 0; p < d.length; p++)(d[p].guid === r._signalRGuid || c && d[p].isFromOldGeneratedHubProxy) && (u = d[p]);
                        u || (u = {
                            guid: r._signalRGuid,
                            eventHandlers: [],
                            isFromOldGeneratedHubProxy: c
                        }, s[t].push(u));
                        var g = function(e, t) {
                            n.apply(a, t)
                        };
                        return u.eventHandlers.push(g), e(a).bind(i(t), g), a
                    },
                    off: function(t, n, o) {
                        var r, a = this,
                            s = a._.callbackMap,
                            c = !o && l(n);
                        if (o = o || n, r = s[t = t.toLowerCase()])
                            if (n) {
                                for (var u, d = 0; d < r.length; d++)(r[d].guid === o._signalRGuid || c && r[d].isFromOldGeneratedHubProxy) && (d, u = r[d]);
                                if (u) {
                                    for (var p = 0; p < u.eventHandlers.length; p++) e(a).unbind(i(t), u.eventHandlers[p]);
                                    r.splice(d, 1), 0 === r.length && delete s[t]
                                }
                            } else n || (e(a).unbind(i(t)), delete s[t]);
                        return a
                    },
                    invoke: function(t) {
                        var n = this,
                            o = n.connection,
                            i = function(e, t, n) {
                                var o, r = e.length,
                                    i = [];
                                for (o = 0; o < r; o += 1) e.hasOwnProperty(o) && (i[o] = t.call(n, e[o], o, e));
                                return i
                            }(e.makeArray(arguments).slice(1), a),
                            s = {
                                H: n.hubName,
                                M: t,
                                A: i,
                                I: o._.invocationCallbackId
                            },
                            c = e.Deferred();
                        return o._.invocationCallbacks[o._.invocationCallbackId.toString()] = {
                            scope: n,
                            method: function(i) {
                                var a, s, l = n._maximizeHubResponse(i);
                                e.extend(n.state, l.State), l.Progress ? c.notifyWith ? c.notifyWith(n, [l.Progress.Data]) : o._.progressjQueryVersionLogged || (o.log("A hub method invocation progress update was received but the version of jQuery in use (" + e.prototype.jquery + ") does not support progress updates. Upgrade to jQuery 1.7+ to receive progress notifications."), o._.progressjQueryVersionLogged = !0) : l.Error ? (l.StackTrace && o.log(l.Error + "\n" + l.StackTrace + "."), a = l.IsHubException ? "HubException" : "Exception", (s = r._.error(l.Error, a)).data = l.ErrorData, o.log(n.hubName + "." + t + " failed to execute. Error: " + s.message), c.rejectWith(n, [s])) : (o.log("Invoked " + n.hubName + "." + t), c.resolveWith(n, [l.Result]))
                            }
                        }, o._.invocationCallbackId += 1, e.isEmptyObject(n.state) || (s.S = n.state), o.log("Invoking " + n.hubName + "." + t), o.send(s), c.promise()
                    },
                    _maximizeHubResponse: function(e) {
                        return {
                            State: e.S,
                            Result: e.R,
                            Progress: e.P ? {
                                Id: e.P.I,
                                Data: e.P.D
                            } : null,
                            Id: e.I,
                            IsHubException: e.H,
                            Error: e.E,
                            StackTrace: e.T,
                            ErrorData: e.D
                        }
                    }
                }, u.fn.init.prototype = u.fn, d.fn = d.prototype = e.connection(), d.fn.init = function(t, n) {
                    var o = {
                            qs: null,
                            logging: !1,
                            useDefaultPath: !0
                        },
                        r = this;
                    e.extend(o, n), e.signalR.fn.init.call(r, t, o.qs, o.logging), r.proxies = {}, r._.invocationCallbackId = 0, r._.invocationCallbacks = {}, r.received((function(t) {
                        var n, o, a, s, c, l;
                        t && (void 0 !== t.P ? (a = t.P.I.toString(), (s = r._.invocationCallbacks[a]) && s.method.call(s.scope, t)) : void 0 !== t.I ? (a = t.I.toString(), (s = r._.invocationCallbacks[a]) && (r._.invocationCallbacks[a] = null, delete r._.invocationCallbacks[a], s.method.call(s.scope, t))) : (n = this._maximizeClientHubInvocation(t), r.log("Triggering client hub event '" + n.Method + "' on hub '" + n.Hub + "'."), c = n.Hub.toLowerCase(), l = n.Method.toLowerCase(), o = this.proxies[c], e.extend(o.state, n.State), e(o).triggerHandler(i(l), [n.Args])))
                    })), r.error((function(e, t) {
                        var n, o;
                        t && (n = t.I, (o = r._.invocationCallbacks[n]) && (r._.invocationCallbacks[n] = null, delete r._.invocationCallbacks[n], o.method.call(o.scope, {
                            E: e
                        })))
                    })), r.reconnecting((function() {
                        r.transport && "webSockets" === r.transport.name && c(r, "Connection started reconnecting before invocation result was received.")
                    })), r.disconnected((function() {
                        c(r, "Connection was disconnected before invocation result was received.")
                    }))
                }, d.fn._maximizeClientHubInvocation = function(e) {
                    return {
                        Hub: e.H,
                        Method: e.M,
                        Args: e.A,
                        State: e.S
                    }
                }, d.fn._registerSubscribedHubs = function() {
                    var t = this;
                    t._subscribedToHubs || (t._subscribedToHubs = !0, t.starting((function() {
                        var n = [];
                        e.each(t.proxies, (function(e) {
                            this.hasSubscriptions() && (n.push({
                                name: e
                            }), t.log("Client subscribed to hub '" + e + "'."))
                        })), 0 === n.length && t.log("No hubs have been subscribed to.  The client will not receive data from hubs.  To fix, declare at least one client side function prior to connection start for each hub you wish to subscribe to."), t.data = t.json.stringify(n)
                    })))
                }, d.fn.createHubProxy = function(e) {
                    e = e.toLowerCase();
                    var t = this.proxies[e];
                    return t || (t = u(this, e), this.proxies[e] = t), this._registerSubscribedHubs(), t
                }, d.fn.init.prototype = d.fn, e.hubConnection = d
            }(window.jQuery, window), window.jQuery.signalR.version = "2.4.3"
        }
    }
]);