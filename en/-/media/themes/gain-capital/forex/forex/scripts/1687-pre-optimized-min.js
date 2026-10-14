(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [1687], {
        1687: function(t) {
            t.exports = function() {
                "use strict";
                var t = "minute",
                    s = /[+-]\d\d(?::?\d\d)?/g,
                    i = /([+-]|\d\d)/g;
                return function(e, f, u) {
                    var r = f.prototype;
                    u.utc = function(t) {
                        return new f({
                            date: t,
                            utc: !0,
                            args: arguments
                        })
                    }, r.utc = function(s) {
                        var i = u(this.toDate(), {
                            locale: this.$L,
                            utc: !0
                        });
                        return s ? i.add(this.utcOffset(), t) : i
                    }, r.local = function() {
                        return u(this.toDate(), {
                            locale: this.$L,
                            utc: !1
                        })
                    };
                    var n = r.parse;
                    r.parse = function(t) {
                        t.utc && (this.$u = !0), this.$utils().u(t.$offset) || (this.$offset = t.$offset), n.call(this, t)
                    };
                    var a = r.init;
                    r.init = function() {
                        if (this.$u) {
                            var t = this.$d;
                            this.$y = t.getUTCFullYear(), this.$M = t.getUTCMonth(), this.$D = t.getUTCDate(), this.$W = t.getUTCDay(), this.$H = t.getUTCHours(), this.$m = t.getUTCMinutes(), this.$s = t.getUTCSeconds(), this.$ms = t.getUTCMilliseconds()
                        } else a.call(this)
                    };
                    var o = r.utcOffset;
                    r.utcOffset = function(e, f) {
                        var u = this.$utils().u;
                        if (u(e)) return this.$u ? 0 : u(this.$offset) ? o.call(this) : this.$offset;
                        if ("string" == typeof e && (e = function(t) {
                                void 0 === t && (t = "");
                                var e = t.match(s);
                                if (!e) return null;
                                var f = ("" + e[0]).match(i) || ["-", 0, 0],
                                    u = f[0],
                                    r = 60 * +f[1] + +f[2];
                                return 0 === r ? 0 : "+" === u ? r : -r
                            }(e), null === e)) return this;
                        var r = Math.abs(e) <= 16 ? 60 * e : e,
                            n = this;
                        if (f) return n.$offset = r, n.$u = 0 === e, n;
                        if (0 !== e) {
                            var a = this.$u ? this.toDate().getTimezoneOffset() : -1 * this.utcOffset();
                            (n = this.local().add(r + a, t)).$offset = r, n.$x.$localOffset = a
                        } else n = this.utc();
                        return n
                    };
                    var h = r.format;
                    r.format = function(t) {
                        var s = t || (this.$u ? "YYYY-MM-DDTHH:mm:ss[Z]" : "");
                        return h.call(this, s)
                    }, r.valueOf = function() {
                        var t = this.$utils().u(this.$offset) ? 0 : this.$offset + (this.$x.$localOffset || this.$d.getTimezoneOffset());
                        return this.$d.valueOf() - 6e4 * t
                    }, r.isUTC = function() {
                        return !!this.$u
                    }, r.toISOString = function() {
                        return this.toDate().toISOString()
                    }, r.toString = function() {
                        return this.toDate().toUTCString()
                    };
                    var c = r.toDate;
                    r.toDate = function(t) {
                        return "s" === t && this.$offset ? u(this.format("YYYY-MM-DD HH:mm:ss:SSS")).toDate() : c.call(this)
                    };
                    var l = r.diff;
                    r.diff = function(t, s, i) {
                        if (t && this.$u === t.$u) return l.call(this, t, s, i);
                        var e = this.local(),
                            f = u(t).local();
                        return l.call(e, f, s, i)
                    }
                }
            }()
        }
    }
]);