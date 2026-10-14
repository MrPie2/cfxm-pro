(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [965], {
        8697: (e, t, s) => {
            s(7733), s(1377), (() => {
                const e = document.querySelector("header"),
                    t = e.querySelector(".header-with-megamenu"),
                    s = t.querySelector(".stx-hamburger"),
                    r = t.querySelector(".stx-main-bar"),
                    n = t.querySelector(".stx-navigation"),
                    o = n.querySelector(".stx-megamenu"),
                    i = o.querySelectorAll(".stx-megamenu__item--main"),
                    a = o.querySelectorAll(".stx-megamenu__item"),
                    l = o.querySelectorAll(".stx-megamenu a.with-children"),
                    c = "menu-visible",
                    d = "active",
                    m = () => t.classList.contains(c),
                    u = () => window.innerWidth <= 1024,
                    v = () => n.style.height = window.innerHeight - e.getBoundingClientRect().height + "px",
                    g = () => m() && L(),
                    h = e => {
                        if (u()) {
                            e.preventDefault(), e.stopPropagation();
                            (e.currentTarget || e.target).closest(".stx-megamenu__item").classList.toggle(d)
                        }
                    },
                    L = () => {
                        document.body.style.overflow = "", t.classList.remove(c), a.forEach((e => e.classList.remove(d))), n.style.height = "auto", window.removeEventListener("resize", g);
                        document.querySelectorAll(".stx-regional-switcher").forEach((e => e.classList.remove(d)))
                    },
                    y = () => !u() && void t.querySelectorAll(".stx-megamenu__submenu-container").forEach((e => {
                        const t = e.querySelectorAll(".stx-megamenu__submenu"),
                            s = {};
                        t.forEach((e => {
                            const t = e.getAttribute("grp-tag");
                            t && (void 0 === s[t] ? s[t] = e : s[t].appendChild(e))
                        }))
                    })),
                    f = () => i.forEach((e => e.classList.remove(d))),
                    E = e => {
                        if (!e.target.closest(".stx-megamenu__item--main label") || e.target.hasAttribute("href")) return;
                        const t = e.target.closest(".stx-megamenu__item--main"),
                            s = t.classList.contains(d);
                        "mouseover" !== e.type || s || (f(), t.classList.add(d)), "click" === e.type && (s ? t.classList.remove(d) : (f(), t.classList.add(d), setTimeout((() => {
                            n.scrollTo({
                                top: t.offsetTop,
                                behavior: "smooth"
                            })
                        }), 1)))
                    },
                    p = e => {
                        e.currentTarget.contains(e.relatedTarget) || f()
                    },
                    x = () => {
                        u() ? (o.addEventListener("click", E), o.removeEventListener("mouseover", E), r.removeEventListener("mouseleave", p)) : (o.addEventListener("mouseover", E), o.removeEventListener("click", E), r.addEventListener("mouseleave", p))
                    };
                s.addEventListener("click", (() => m() ? L() : (document.body.style.overflow = "hidden", v(), t.classList.add(c), void window.addEventListener("resize", g)))), l.forEach((e => e.addEventListener("click", h))), window.addEventListener("updateHeights", v), window.addEventListener("resize", _.debounce((() => {
                    y(), x()
                }), 500)), y(), (() => {
                    const e = t.querySelector(".stx-navigation .stx-umbrella");
                    if (!e) return;
                    e.setAttribute("tabindex", "0");
                    const s = Array.from(e.children).slice(1),
                        r = e.querySelector(".active") || e.children[0],
                        n = document.createElement("div");
                    s.forEach((e => n.appendChild(e))), e.appendChild(n), r.classList.add("toggle-only"), e.addEventListener("click", (t => {
                        t.target.classList.contains("toggle-only") && (t.preventDefault(), e.classList.toggle("has-focus"))
                    })), e.addEventListener("mousedown", (t => {
                        u() && document.activeElement === e && t.preventDefault()
                    }))
                })(), x()
            })()
        }
    }
]);