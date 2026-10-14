"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [7962], {
        3850: (e, t, l) => {
            l.r(t), l.d(t, {
                initTrimCardTags: () => i,
                trimCardTags: () => d
            });
            l(7733), l(1377);
            const s = ".card-tags_with-hidden-list";

            function a(e) {
                e.forEach((e => {
                    const t = e.querySelector(".hidden-tags"),
                        l = e.querySelector(".pill-trigger");
                    l && t && (l.classList.remove("active"), t.classList.remove("show"))
                }))
            }
            const d = (e, t = document.querySelectorAll(s)) => {
                    const l = e.querySelector(".default-tags");
                    if (!l) return;
                    if (e.querySelector(".hidden-tags:not(:empty)")) {
                        const e = [...l.querySelectorAll("li:not([class])")];
                        l.innerHTML = "", e.forEach((e => l.appendChild(e)))
                    }
                    l.scrollWidth > l.parentNode.clientWidth && function(e, t, l) {
                        const s = l.parentNode.clientWidth - 25,
                            d = [...e.querySelectorAll(".default-tags li:not([class])")],
                            i = document.createDocumentFragment();
                        let n = 0;
                        for (let e = d.length - 1; e >= 0; e -= 1) l.scrollWidth > s && (i.appendChild(d[e]), n++);
                        if (n > 0) {
                            let s = e.querySelector(".hidden-tags");
                            s || (s = document.createElement("ul"), s.classList.add("hidden-tags"));
                            let d = e.querySelector(".pill-trigger");
                            d || (d = document.createElement("li"), d.classList.add("pill", "pill-primary", "pill-trigger"), l.appendChild(d)), s.appendChild(i), d.textContent = `+${n}`;
                            let r = e.querySelector(".hidden-tags-wrapper");
                            r || (r = document.createElement("li"), r.classList.add("hidden-tags-wrapper"), r.appendChild(s), l.appendChild(r)), d.dataset.listenerAttached || (d.addEventListener("click", (e => {
                                e.stopPropagation();
                                const l = d.classList.contains("active");
                                a(t), d.classList.toggle("active", !l), s.classList.toggle("show", !l)
                            })), d.dataset.listenerAttached = "true")
                        }
                    }(e, t, l)
                },
                i = () => {
                    const e = document.querySelectorAll(s);
                    e.length > 0 && (e.forEach((t => {
                        t.classList.add("initialised"), d(t, e)
                    })), document.body.dataset.tagsListenerAttached || (document.body.addEventListener("click", (() => {
                        a(e)
                    })), document.body.dataset.tagsListenerAttached = "true"))
                };
            i(), window.addEventListener("resize", _.debounce(i, 250))
        }
    }
]);