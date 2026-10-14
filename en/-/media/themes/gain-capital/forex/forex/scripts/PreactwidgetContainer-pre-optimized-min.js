"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [7414], {
        11: (t, e, s) => {
            s.d(e, {
                Z: () => i
            });
            const i = (0, s(2979).kr)({
                siteId: document.body.dataset.siteId
            })
        },
        7625: (t, e, s) => {
            s.d(e, {
                mP: () => h,
                U2: () => a
            });
            s(7733), s(1578), s(621);
            var i = s(6954),
                n = s(2083),
                r = s.n(n);
            class c {
                static queue = [];
                static pendingPromise = !1;
                static enqueue(t) {
                    return new Promise(((e, s) => {
                        this.queue.push({
                            promise: t,
                            resolve: e,
                            reject: s
                        }), this.dequeue()
                    }))
                }
                static dequeue() {
                    if (this.workingOnPromise) return !1;
                    const t = this.queue.shift();
                    if (!t) return !1;
                    try {
                        this.workingOnPromise = !0, t.promise().then((e => {
                            this.workingOnPromise = !1, t.resolve(e), this.dequeue()
                        })).catch((e => {
                            this.workingOnPromise = !1, t.reject(e), this.dequeue()
                        }))
                    } catch (e) {
                        this.workingOnPromise = !1, t.reject(e), this.dequeue()
                    }
                    return !0
                }
            }
            const a = {
                    ERROR: -1,
                    ACTIVE: 1,
                    INACTIVE: 0
                },
                o = 0,
                u = 1;
            class h {
                constructor() {
                    this.actions = {}, this.subscriptions = {}, this.cache = {}, this.streamApi = null, this.eventEmitter = new(r()), this.debouncedInvalidateSubscriptions = _.debounce(this.queueInvalidation, 50)
                }
                isInitialized() {
                    return null !== this.streamApi
                }
                setApi(t) {
                    this.streamApi = new i.Z({
                        streamUrl: t
                    }), this.streamApi.onPriceUpdates(this.updatePrice)
                }
                async connect() {
                    try {
                        return await this.streamApi.startConnection()
                    } catch (t) {
                        console.warn("Error connecting to the rates service", t)
                    }
                    await this.retryConnection()
                }
                async retryConnection(t = 4) {
                    console.info(`Retrying with delay of ${t}ms`), await (async t => new Promise((e => setTimeout(e, t))))(t);
                    try {
                        return await this.streamApi.startConnection()
                    } catch {
                        if (!(t <= 64)) throw new Error("Rates service unavailable");
                        await this.retryConnection(4 * t)
                    }
                }
                subscribeAll(t) {
                    this.eventEmitter.on("*", t)
                }
                unsubscribeAll(t) {
                    this.eventEmitter.off("*", t)
                }
                subscribe(t, e) {
                    this.eventEmitter.on(t, e), this.eventEmitter.listeners(t).length > 0 && this.subscriptions[t] !== a.ACTIVE && (this.actions[t] = o), this.debouncedInvalidateSubscriptions()
                }
                unsubscribe(t, e) {
                    this.eventEmitter.off(t, e), 0 === this.eventEmitter.listeners(t).length && this.subscriptions[t] === a.ACTIVE && (this.actions[t] = u), this.debouncedInvalidateSubscriptions()
                }
                groupByState(t) {
                    const e = [],
                        s = [],
                        i = [];
                    for (const [n, r] of Object.entries(t)) switch (r) {
                        case a.ERROR:
                            e.push(n);
                            break;
                        case a.ACTIVE:
                            s.push(n);
                            break;
                        case a.INACTIVE:
                            i.push(n)
                    }
                    return {
                        error: e,
                        active: s,
                        inactive: i
                    }
                }
                groupByAction(t) {
                    const e = [],
                        s = [];
                    for (const [i, n] of Object.entries(t)) switch (n) {
                        case o:
                            e.push(i);
                            break;
                        case u:
                            s.push(i)
                    }
                    return {
                        toSubscribe: e,
                        toUnsubscribe: s
                    }
                }
                invalidateSubscriptions = async () => {
                    if (!this.isInitialized()) return;
                    const {
                        toSubscribe: t,
                        toUnsubscribe: e
                    } = this.groupByAction({ ...this.actions
                    });
                    this.actions = {};
                    const {
                        active: s
                    } = this.groupByState({ ...this.subscriptions
                    }), i = [...t, ...s].filter((t => !e.includes(t))), n = i.filter((t => !s.includes(t))), r = i.length > 0 && this.streamApi.disconnected, c = 0 === i.length && this.streamApi.connected;
                    if (r) try {
                        await this.connect()
                    } catch (s) {
                        return this.setStatuses([...t, ...e], a.ERROR)
                    }
                    try {
                        await Promise.all([n.length > 0 ? this.streamApi.subscribeToPricesUpdates(n) : null, e.length > 0 ? this.streamApi.unsubscribeFromPricesUpdates(e) : null])
                    } catch (t) {
                        return this.setStatuses([...n, ...e], a.ERROR)
                    }
                    this.setStatuses(n, a.ACTIVE), this.setStatuses(e, a.INACTIVE), c && await this.streamApi.stopConnection()
                };
                queueInvalidation = async () => {
                    c.enqueue(this.invalidateSubscriptions)
                };
                getCachedData = t => ({
                    current: {},
                    previous: this.cache[t] || {},
                    state: this.subscriptions[t] || a.QUEUED
                });
                updatePrice = t => {
                    this.eventEmitter.emit("*", t), this.eventEmitter.emit(t.MarketId, { ...this.getCachedData(t.MarketId),
                        current: t
                    }), this.cache[t.MarketId] = t
                };
                setStatuses(t, e) {
                    for (const s of t) this.subscriptions[s] = e, this.eventEmitter.emit(s, { ...this.getCachedData(s),
                        current: {}
                    })
                }
            }
        },
        6954: (t, e, s) => {
            s.d(e, {
                J: () => n,
                Z: () => p
            });
            s(7733), s(5385);
            const i = jQuery,
                n = {
                    UP: "UP",
                    DOWN: "DOWN"
                },
                r = ["MarketId", "MarketName", "TickDate", "Bid", "Offer", "Price", "High", "Low", "Change", "Decimals"],
                c = "SubscribeToPriceUpdates",
                a = "SubscribeToPricesUpdates",
                o = "UnsubscribeFromPriceUpdates",
                u = "UnsubscribeFromPricesUpdates",
                h = "updateMarketPrice";
            class d {
                constructor(t) {
                    Object.assign(this, t)
                }
                get ChangeInPercentage() {
                    return `${(parseFloat(this.Change)/parseFloat(this.Bid)*100).toFixed(2)}%`
                }
                get MedianSpread() {
                    return ((this.Offer - this.Bid) * Math.pow(10, this.Decimals - this.Decimals % 2)).toFixed(1)
                }
                get Mid() {
                    return this.Price
                }
                get ChangeInPoints() {
                    return this.Change
                }
                get Direction() {
                    return "-" !== this.Change[0] ? n.UP : n.DOWN
                }
            }
            const p = class {
                constructor({
                    streamUrl: t,
                    hubName: e = "ratesStreamer",
                    dataDelimitr: s = "|",
                    priceItemGroup: n = r
                } = {}) {
                    this.connection = i.hubConnection(t), this.hubProxy = this.connection.createHubProxy(e), this.dataDelimiter = s, this.priceItemGroup = n
                }
                get connected() {
                    return this.connection.state === i.signalR.connectionState.connected
                }
                get connecting() {
                    return this.connection.state === i.signalR.connectionState.connecting
                }
                get disconnected() {
                    return this.connection.state === i.signalR.connectionState.disconnected
                }
                get reconnecting() {
                    return this.connection.state === i.signalR.connectionState.reconnecting
                }
                async startConnection() {
                    return await this.connection.start()
                }
                async stopConnection() {
                    return this.connection.stop()
                }
                async subscribeToPriceUpdates(t) {
                    return this.hubProxy.invoke(c, t)
                }
                async subscribeToPricesUpdates(t) {
                    return 1 === t.length ? this.subscribeToPriceUpdates(t[0]) : this.hubProxy.invoke(a, t)
                }
                async unsubscribeFromPriceUpdates(t) {
                    return this.hubProxy.invoke(o, t)
                }
                async unsubscribeFromPricesUpdates(t) {
                    return 1 === t.length && this.unsubscribeFromPriceUpdates(t[0]), this.hubProxy.invoke(u, t)
                }
                _mapToObject = (t, e, s) => (t[this.priceItemGroup[s]] = e, t);
                _parseResponse = t => t.split(this.dataDelimiter).reduce(this._mapToObject, {});
                onPriceUpdates(t) {
                    this.hubProxy.on(h, (e => t(new d(this._parseResponse(e)))))
                }
            }
        },
        6911: (t, e, s) => {
            s.d(e, {
                U2: () => c.U2,
                YQ: () => o,
                md: () => a,
                z8: () => u
            });
            var i = s(2979),
                n = s(7317),
                r = s(11),
                c = s(7625);
            const a = (0, i.kr)(null),
                o = t => {
                    if (!t) throw new Error("MarketId is not specified!");
                    const e = (0, n.qp)(r.Z),
                        s = (0, n.qp)(a),
                        [i, c] = (0, n.eJ)(s.getCachedData(t));
                    return (0, n.d4)((() => {
                        if (!e.disableStreaming) return s.subscribe(t, c), () => s.unsubscribe(t, c)
                    }), [t, s]), i
                },
                u = () => {
                    const t = (0, n.qp)(a),
                        [e, s] = (0, n.eJ)(null);
                    return (0, n.d4)((() => (t.subscribeAll(s), () => t.unsubscribeAll(s))), [e, t]), e
                }
        },
        4891: (t, e, s) => {
            s.r(e), s.d(e, {
                PreactWidget: () => d,
                createWidgetsContainer: () => b,
                mountWidget: () => v,
                unmountWidget: () => y
            });
            s(7733), s(1377), s(5347);
            var i = s(2979),
                n = s(2490),
                r = s(2901),
                c = s(6911),
                a = s(7625);
            class o {
                constructor({
                    name: t,
                    defaultOptions: e = {}
                }) {
                    this.name = t, this.defaultOptions = e
                }
                getInitialOptions({
                    dataset: t
                }) {
                    const e = {};
                    for (const s of Object.keys(t)) try {
                        e[s] = JSON.parse(t[s])
                    } catch {
                        e[s] = t[s]
                    }
                    return { ...this.defaultOptions,
                        ...e
                    }
                }
                get targetElements() {
                    return Array.from(document.querySelectorAll(this.selector))
                }
                get selector() {
                    return `[data-widget="${this.name}"]`
                }
            }
            const u = new CustomEvent("destroyWidget"),
                h = new CustomEvent("mountWidget");
            class d extends o {
                constructor({
                    component: t,
                    append: e = !1,
                    ...s
                }) {
                    super(s), this.component = t, this.append = e
                }
            }
            const p = ({
                    component: t,
                    initialOptions: e,
                    targetElement: s
                }) => {
                    const [a, o] = (0, n.useState)(!0), u = (0, n.useContext)(c.md), h = document.body.getAttribute("data-stream-url"), d = "true" === document.body.getAttribute("data-is-streaming-enabled");
                    return (0, n.useEffect)((() => {
                        const t = () => o(!1),
                            e = () => o(!0);
                        return s.addEventListener("destroyWidget", t), s.addEventListener("mountWidget", e), () => {
                            s.removeEventListener("destroyWidget", t), s.removeEventListener("mountWidget", e)
                        }
                    }), [s]), (0, n.useEffect)((() => {
                        h && d && !u.isInitialized() && (u.setApi(h), u.invalidateSubscriptions())
                    }), []), a && (0, n.createPortal)((0, i.h)(r.pR, {
                        dictionary: { ...e.locales
                        }
                    }, (0, i.h)(t, e)), s)
                },
                l = ({
                    widget: t
                }) => t.targetElements.map(((e, s) => {
                    const n = t.getInitialOptions(e);
                    return t.append || (e.innerHTML = ""), (0, i.h)(p, {
                        key: `${t.name}`,
                        component: t.component,
                        initialOptions: n,
                        targetElement: e
                    })
                })),
                m = new a.mP,
                b = (g = t => (0, i.sY)((0, i.h)(c.md.Provider, {
                    value: m
                }, t.map((t => (0, i.h)(l, {
                    key: t.name,
                    widget: t
                })))), document.body), (t = []) => {
                    const e = new Map,
                        s = t => {
                            e.set(t.name, t)
                        };
                    return t.forEach(s), {
                        registerWidget: s,
                        getWidget: e => t.get("name"),
                        init: () => g([...e.values()])
                    }
                });
            var g;
            const v = t => (e, s = null, i = {}) => {
                    s && (e.dataset.widget = s), Object.entries(i).forEach((([t, s]) => {
                        e.dataset[t] = JSON.stringify(s)
                    })), e.dispatchEvent(h), t.init()
                },
                y = t => {
                    t.dispatchEvent(u)
                }
        }
    }
]);