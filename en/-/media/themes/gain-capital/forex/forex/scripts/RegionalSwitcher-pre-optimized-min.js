(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [2856], {
        5980: (e, t, r) => {
            r(7733), r(1377), (() => {
                const e = document.querySelectorAll(".stx-regional-switcher"),
                    t = "active",
                    r = () => e.forEach((e => e.classList.remove(t)));
                e.forEach((e => {
                    const r = e.querySelector(".stx-regional-switcher__trigger"),
                        s = e.querySelector(".stx-back-button--regional"),
                        c = () => e.classList.toggle(t);
                    r.addEventListener("click", c), s ? .addEventListener("click", c)
                })), document.addEventListener("keyup", (e => 27 === e.keyCode && r())), document.addEventListener("mousedown", (t => !Array.from(e) ? .find((e => e.contains(t.target))) && r()))
            })()
        }
    }
]);