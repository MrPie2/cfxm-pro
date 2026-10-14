(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [1655], {
        3286: (t, e, i) => {
            "use strict";
            i.r(e);
            i(6528)
        },
        6528: (t, e, i) => {
            i(7733), i(4921),
                function(t) {
                    let e = !1;
                    const i = t("span[data-definitiontip]");
                    t(".dropdown").find(".dropdown-content").eq(0).show(), t(".dropdown-composite-selected").on("click", (function() {
                        t(this).toggleClass("expanded"), t(".dropdown-list").slideToggle()
                    })), t(".dropdown-list > li").on("click", (function() {
                        let e = t(this).closest(".dropdown"),
                            i = t(this).index(),
                            n = t(this).find(".field-dropdownvalue").text();
                        t("body").hasClass("on-page-editor") && (n = t(this).find(".field-dropdownvalue").find('span[scfieldtype="rich text"]').text()), t(this).closest(".dropdown-composite-selected").children(".row").find(".field-dropdownvalue").text(n), e.find(".dropdown-content").hide().eq(i).show()
                    })), i.on("mouseover touchstart", (function() {
                        if (!e) {
                            const i = t(window).outerWidth();
                            let n = t(this).data("definitiontip"),
                                o = t('<span class="definition-tip"><span class="definition-tip__arrow"></span></span>');
                            o.append(n), t(this).append(o);
                            const d = o.get(0).getBoundingClientRect(),
                                s = d.left,
                                c = i - d.right;
                            s < 0 && (o.css("left", "calc(50% + " + -1 * s + "px)"), o.find(".definition-tip__arrow").css("left", "calc(50% - " + (15 + -1 * s) + "px)")), c < 0 && (o.css("left", "calc(50% - " + -1 * c + "px)"), o.find(".definition-tip__arrow").css("left", "calc(50% + " + (-1 * c - 15) + "px)")), e = !0
                        }
                    })), i.on("mouseleave", (function() {
                        t(this).find(".definition-tip").remove(), e = !1
                    }))
                }(jQuery)
        }
    }
]);