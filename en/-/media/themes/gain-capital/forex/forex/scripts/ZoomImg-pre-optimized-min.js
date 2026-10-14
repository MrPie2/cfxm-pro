(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [2509], {
        6689: (e, t, n) => {
            "use strict";
            n.r(t);
            var i = n(6981),
                r = n.n(i);
            (() => {
                const e = [...document.querySelectorAll("[data-zoomable-image]:not(.prevent-zoom)"), ...document.querySelectorAll(".article-detail .field-content img:not(.prevent-zoom)")];
                r()(e, {
                    padding: 5,
                    offset: 5,
                    keyboard: !1,
                    background: "rgba(0,0,0, .75)",
                    zIndex: 2147483647,
                    beforeShow(e) {
                        e.target.src = e.target.src.split("?")[0]
                    }
                })
            })()
        },
        6981: e => {
            const t = (() => {
                "use strict";
                const e = {
                    time: 300,
                    padding: 40,
                    offset: 40,
                    keyboard: !0,
                    cubicBezier: "cubic-bezier(.2, 0, .1, 1)",
                    background: "var(--bg-color-80, rgba(255, 255, 255, .98))",
                    backgroundFilter: "blur(30px)",
                    zIndex: 1e6,
                    beforeShow: void 0,
                    afterShow: void 0,
                    beforeHide: void 0,
                    afterHide: void 0
                };
                var t, n = {};

                function i(e) {
                    const t = n[e];
                    if (t) {
                        if ("function" != typeof t) throw `config.${e} must be a function!`;
                        Reflect.apply(t, n, [n])
                    }
                }

                function r(t) {
                    t.src && !t.classList.contains("lightense-target") && (t.classList.add("lightense-target"), t.addEventListener("click", (function(r) {
                        if (n.keyboard && (r.metaKey || r.ctrlKey)) return window.open(t.src, "_blank");
                        ! function(t) {
                            if (n.target = t, n.target.classList.contains("lightense-open")) return a();
                            i("beforeShow"), n.scrollY = window.scrollY,
                                function(e, t, n) {
                                    e.addEventListener(t, (function i(r) {
                                        Reflect.apply(n, this, r), e.removeEventListener(t, i)
                                    }))
                                }(n.target, "transitionend", (function() {
                                    i("afterShow")
                                }));
                            var r = new Image;
                            r.onload = function() {
                                ! function(t) {
                                    var i = t.width,
                                        r = t.height,
                                        o = window.pageYOffset || document.documentElement.scrollTop || 0,
                                        a = window.pageXOffset || document.documentElement.scrollLeft || 0,
                                        s = n.target.getBoundingClientRect(),
                                        c = i / s.width,
                                        d = window.innerWidth || document.documentElement.clientWidth || 0,
                                        l = window.innerHeight || document.documentElement.clientHeight || 0,
                                        g = n.target.getAttribute("data-lightense-padding") || n.target.getAttribute("data-padding") || n.padding,
                                        u = d > g ? d - g : d - e.padding,
                                        h = l > g ? l - g : l - e.padding,
                                        p = i / r,
                                        f = u / h,
                                        m = t.src.split("?")[0].endsWith(".svg"),
                                        b = s.width > i;
                                    if (m && b) {
                                        var v = .85,
                                            w = 1.1;
                                        c = Math.max(w, u * v / s.width), i = u * v, r = h * v
                                    }
                                    n.scaleFactor = i < u && r < h ? c : p < f ? h / r * c : u / i * c;
                                    var k = d / 2,
                                        y = o + l / 2,
                                        x = s.left + a + s.width / 2,
                                        z = s.top + o + s.height / 2;
                                    n.translateX = Math.round(k - x), n.translateY = Math.round(y - z)
                                }(this),
                                function() {
                                    n.target.classList.add("lightense-open"), n.wrap = document.createElement("div"), n.wrap.className = "lightense-wrap", setTimeout((function() {
                                        n.target.style.transform = "scale(" + n.scaleFactor + ")"
                                    }), 20), n.target.parentNode.insertBefore(n.wrap, n.target), n.wrap.appendChild(n.target), setTimeout((function() {
                                        n.wrap.style.transform = "translate3d(" + n.translateX + "px, " + n.translateY + "px, 0)"
                                    }), 20);
                                    var e = {
                                            cubicBezier: n.target.getAttribute("data-lightense-cubic-bezier") || n.cubicBezier,
                                            background: n.target.getAttribute("data-lightense-background") || n.target.getAttribute("data-background") || n.background,
                                            zIndex: n.target.getAttribute("data-lightense-z-index") || n.zIndex
                                        },
                                        t = { ...n,
                                            ...e
                                        };
                                    o("lightense-images-css-computed", `\n    :root {\n      --lightense-z-index: ${t.zIndex-1};\n      --lightense-backdrop: ${t.background};\n      --lightense-duration: ${t.time}ms;\n      --lightense-timing-func: ${t.cubicBezier};\n    }`), n.container.style.visibility = "visible", setTimeout((function() {
                                        n.container.style.opacity = "1"
                                    }), 20)
                                }(), window.addEventListener("keyup", c, !1), window.addEventListener("scroll", s, !1), n.container.addEventListener("click", a, !1)
                            }, r.src = n.target.src
                        }(this)
                    }), !1))
                }

                function o(e, t) {
                    var n = document.head || document.getElementsByTagName("head")[0];
                    document.getElementById(e) && document.getElementById(e).remove();
                    var i = document.createElement("style");
                    i.id = e, i.styleSheet ? i.styleSheet.cssText = t : i.appendChild(document.createTextNode(t)), n.appendChild(i)
                }

                function a() {
                    i("beforeHide"), window.removeEventListener("keyup", c, !1), window.removeEventListener("scroll", s, !1), n.container.removeEventListener("click", a, !1), n.target.classList.remove("lightense-open"), n.wrap.style.transform = "", n.target.style.transform = "", n.target.classList.add("lightense-transitioning"), n.container.style.opacity = "", setTimeout((function() {
                        i("afterHide"), n.container.style.visibility = "", n.container.style.backgroundColor = "", n.wrap.parentNode.replaceChild(n.target, n.wrap), n.target.classList.remove("lightense-transitioning")
                    }), n.time)
                }

                function s() {
                    Math.abs(n.scrollY - window.scrollY) >= n.offset && a()
                }

                function c(e) {
                    e.preventDefault(), 27 === e.keyCode && a()
                }
                return function(i, a = {}) {
                    t = function(e) {
                            switch (typeof e) {
                                case "undefined":
                                    throw "You need to pass an element!";
                                case "string":
                                    return document.querySelectorAll(e);
                                case "object":
                                    return e
                            }
                        }(i), o("lightense-images-css", `\n:root {\n  --lightense-z-index: ${(n={...e,...a}).zIndex-1};\n  --lightense-backdrop: ${n.background};\n  --lightense-backdrop-filter: ${n.backgroundFilter};\n  --lightense-duration: ${n.time}ms;\n  --lightense-timing-func: ${n.cubicBezier};\n}\n\n.lightense-backdrop {\n  box-sizing: border-box;\n  width: 100%;\n  height: 100%;\n  position: fixed;\n  top: 0;\n  left: 0;\n  overflow: hidden;\n  z-index: calc(var(--lightense-z-index) - 1);\n  padding: 0;\n  margin: 0;\n  transition: opacity var(--lightense-duration) ease;\n  cursor: zoom-out;\n  opacity: 0;\n  background-color: var(--lightense-backdrop);\n  visibility: hidden;\n}\n\n@supports (-webkit-backdrop-filter: blur(30px)) {\n  .lightense-backdrop {\n    background-color: var(--lightense-backdrop);\n    -webkit-backdrop-filter: var(--lightense-backdrop-filter);\n  }\n}\n\n@supports (backdrop-filter: blur(30px)) {\n  .lightense-backdrop {\n    background-color: var(--lightense-backdrop);\n    backdrop-filter: var(--lightense-backdrop-filter);\n  }\n}\n\n.lightense-wrap {\n  position: relative;\n  transition: transform var(--lightense-duration) var(--lightense-timing-func);\n  z-index: var(--lightense-z-index);\n  pointer-events: none;\n}\n\n.lightense-target {\n  cursor: zoom-in;\n  transition: transform var(--lightense-duration) var(--lightense-timing-func);\n  pointer-events: auto;\n}\n\n.lightense-open {\n  cursor: zoom-out;\n}\n\n.lightense-transitioning {\n  pointer-events: none;\n}`), null === document.querySelector(".lightense-backdrop") ? (n.container = document.createElement("div"), n.container.className = "lightense-backdrop", document.body.appendChild(n.container)) : n.container = document.querySelector(".lightense-backdrop"),
                        function(e) {
                            var t = e.length;
                            if (t)
                                for (var n = 0; n < t; n++) r(e[n]);
                            else r(e)
                        }(t)
                }
            })();
            e.exports = t
        }
    }
]);