!(function (n) {
    "use strict";
    function t() {
        (this.body = n("body")), (this.window = n(window)), (this.menuContainer = n("#leftside-menu-container"));
    }
    (t.prototype._reset = function () {
        this.body.removeAttr("data-leftbar-theme");
    }),
        (t.prototype.activateCondensedSidebar = function () {
            this.body.attr("data-leftbar-compact-mode", "condensed");
        }),
        (t.prototype.deactivateCondensedSidebar = function () {
            this.body.removeAttr("data-leftbar-compact-mode");
        }),
        (t.prototype.activateScrollableSidebar = function () {
            this.body.attr("data-leftbar-compact-mode", "scrollable");
        }),
        (t.prototype.deactivateScrollableSidebar = function () {
            this.body.removeAttr("data-leftbar-compact-mode");
        }),
        (t.prototype.activateDefaultTheme = function () {
            this._reset(), this.body.attr("data-leftbar-theme", "default");
        }),
        (t.prototype.activateLightTheme = function () {
            this._reset(), this.body.attr("data-leftbar-theme", "light");
        }),
        (t.prototype.activateDarkTheme = function () {
            this._reset(), this.body.attr("data-leftbar-theme", "dark");
        }),
        (t.prototype.initMenu = function () {
            var t,
                e = this;
            this._reset(),
                n(document).on("click", ".button-menu-mobile", function (t) {
                    t.preventDefault(),
                        e.body.toggleClass("sidebar-enable"),
                        "full" === e.body.attr("data-layout") || e.window.width() < 768
                            ? e.body.toggleClass("hide-menu")
                            : "condensed" === e.body.attr("data-leftbar-compact-mode")
                            ? e.deactivateCondensedSidebar()
                            : e.activateCondensedSidebar();
                }),
                n(".side-nav").length &&
                    ((t = n(".side-nav li .collapse")),
                    n(".side-nav li [data-bs-toggle='collapse']").on("click", function (t) {
                        return !1;
                    }),
                    t.on({
                        "show.bs.collapse": function (t) {
                            var e = n(t.target).parents(".collapse.show");
                            n(".side-nav .collapse.show").not(t.target).not(e).collapse("hide");
                        },
                    }),
                    n(".side-nav a").each(function () {
                        var t,
                            e,
                            a,
                            o = window.location.href.split(/[?#]/)[0];
                        this.href == o &&
                            (n(this).addClass("active"),
                            n(this).parent().addClass("menuitem-active"),
                            n(this).parent().parent().parent().addClass("show"),
                            n(this).parent().parent().parent().parent().addClass("menuitem-active"),
                            "sidebar-menu" !== (t = n(this).parent().parent().parent().parent().parent().parent()).attr("id") && t.addClass("show"),
                            n(this).parent().parent().parent().parent().parent().parent().parent().addClass("menuitem-active"),
                            "wrapper" !== (e = n(this).parent().parent().parent().parent().parent().parent().parent().parent().parent()).attr("id") && e.addClass("show"),
                            (a = n(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().parent()).is("body") || a.addClass("menuitem-active"));
                    }));
            var a = document.querySelectorAll("ul.navbar-nav .dropdown .dropdown-toggle"),
                o = !1;
            a.forEach(function (a) {
                a.addEventListener("click", function (t) {
                    var e;
                    a.parentElement.classList.contains("nav-item") ||
                        ((o = !0),
                        (e = a.parentElement.parentElement.parentElement.querySelector(".nav-link")),
                        bootstrap.Dropdown.getInstance(e).show(),
                        a.ariaExpanded ? bootstrap.Dropdown.getInstance(a).hide() : bootstrap.Dropdown.getInstance(e).show(),
                        (o = !0));
                }),
                    a.addEventListener("hide.bs.dropdown", function (t) {
                        o && (t.preventDefault(), t.stopPropagation(), (o = !1));
                    }),
                    a.addEventListener("show.bs.dropdown", function (t) {
                        o || a.parentElement.classList.contains("nav-item") || (t.preventDefault(), t.stopPropagation(), (o = !0));
                    });
            });
        }),
        (t.prototype.init = function () {
            this.initMenu();
        }),
        (n.LeftSidebar = new t()),
        (n.LeftSidebar.Constructor = t);
})(window.jQuery),
    (function (a) {
        "use strict";
        function t() {
            (this.$body = a("body")), (this.$window = a(window));
        }
        (t.prototype.initMenu = function () {
            a(".topnav-menu").length &&
                (a(".topnav-menu li a").each(function () {
                    var t = window.location.href.split(/[?#]/)[0];
                    this.href == t &&
                        (a(this).addClass("active"),
                        a(this).parent().parent().addClass("active"),
                        a(this).parent().parent().parent().parent().addClass("active"),
                        a(this).parent().parent().parent().parent().parent().parent().addClass("active"));
                }),
                a(".navbar-toggle").on("click", function () {
                    a(this).toggleClass("open"), a("#navigation").slideToggle(400);
                }));
        }),
            (t.prototype.initSearch = function () {
                var e = a(".navbar-custom .dropdown:not(.app-search)");
                a(document).on("click", function (t) {
                    return "top-search" == t.target.id || t.target.closest("#search-dropdown") ? a("#search-dropdown").addClass("d-block") : a("#search-dropdown").removeClass("d-block"), !0;
                }),
                    a("#top-search").on("focus", function (t) {
                        return t.preventDefault(), e.children(".dropdown-menu.show").removeClass("show"), a("#search-dropdown").addClass("d-block"), !1;
                    }),
                    e.on("show.bs.dropdown", function () {
                        a("#search-dropdown").removeClass("d-block");
                    });
            }),
            (t.prototype.init = function () {
                this.initMenu(), this.initSearch();
            }),
            (a.Topbar = new t()),
            (a.Topbar.Constructor = t);
    })(window.jQuery),
    (function (a) {
        "use strict";
        function t() {
            (this.body = a("body")), (this.window = a(window));
        }
        (t.prototype._selectOptionsFromConfig = function () {
            var t = a.App.getLayoutConfig();
            if (t) {
                switch ((a(".end-bar input[type=checkbox]").prop("checked", !1), t.sideBarTheme)) {
                    case "default":
                        a("#default-check").prop("checked", !0);
                        break;
                    case "light":
                        a("#light-check").prop("checked", !0);
                        break;
                    case "dark":
                        a("#dark-check").prop("checked", !0);
                }
                t.isBoxed ? a("#boxed-check").prop("checked", !0) : a("#fluid-check").prop("checked", !0),
                    t.isCondensed && a("#condensed-check").prop("checked", !0),
                    t.isScrollable && a("#scrollable-check").prop("checked", !0),
                    t.isScrollable || t.isCondensed || a("#fixed-check").prop("checked", !0),
                    t.isDarkModeEnabled || (a("#light-mode-check").prop("checked", !0), "vertical" === t.layout && a("input[type=checkbox][name=theme]").prop("disabled", !1)),
                    t.isDarkModeEnabled && (a("#dark-mode-check").prop("checked", !0), "vertical" === t.layout && a("input[type=checkbox][name=theme]").prop("disabled", !1));
            }
        }),
            (t.prototype.toggleRightSideBar = function () {
                this.body.toggleClass("end-bar-enabled"), this._selectOptionsFromConfig();
            }),
            (t.prototype.init = function () {
                var e = this;
                "true" == document.body.getAttribute("data-rightbar-onstart") && (localStorage.getItem("AlienCodes") || (localStorage.setItem("AlienCodes", !0), e.toggleRightSideBar())),
                    a(document).ready(function(){
                        const themeVal = localStorage.getItem('theme');
                        switch (themeVal) {
                            case "light":
                                a.App.deactivateDarkMode(), a("#default-check").prop("checked", !0), a("input[type=checkbox][name=theme]").prop("disabled", !1);
                                break;
                            case "dark":
                                a.App.activateDarkMode(), a("#dark-check").prop("checked", !0);
                        }
                    }),
                    a(document).on("click", ".end-bar-toggle", function () {
                        e.toggleRightSideBar();
                    }),
                    a(document).on("click", "body", function (t) {
                        0 < a(t.target).closest(".end-bar-toggle, .end-bar").length ||
                            0 < a(t.target).closest(".leftside-menu, .side-nav").length ||
                            a(t.target).hasClass("button-menu-mobile") ||
                            0 < a(t.target).closest(".button-menu-mobile").length ||
                            (a("body").removeClass("end-bar-enabled"), a("body").removeClass("sidebar-enable"));
                    }),
                    a("input[type=checkbox][name=width]").change(function () {
                        switch (a(this).val()) {
                            case "fluid":
                                a.App.activateFluid();
                                break;
                            case "boxed":
                                a.App.activateBoxed();
                        }
                        e._selectOptionsFromConfig();
                    }),
                    a("input[type=checkbox][name=theme]").change(function () {
                        switch (a(this).val()) {
                            case "default":
                                a.App.activateDefaultSidebarTheme();
                                break;
                            case "light":
                                a.App.activateLightSidebarTheme();
                                break;
                            case "dark":
                                a.App.activateDarkSidebarTheme();
                        }
                        e._selectOptionsFromConfig();
                    }),
                    a("input[type=checkbox][name=compact]").change(function () {
                        switch (a(this).val()) {
                            case "fixed":
                                a.App.deactivateCondensedSidebar(), a.App.deactivateScrollableSidebar();
                                break;
                            case "scrollable":
                                a.App.activateScrollableSidebar();
                                break;
                            case "condensed":
                                a.App.activateCondensedSidebar();
                        }
                        e._selectOptionsFromConfig();
                    }),
                    a("input[type=checkbox][name=color-scheme-mode]").change(function () {
                        localStorage.setItem('theme', a(this).val());
                        switch (a(this).val()) {
                            case "light":
                                a.App.deactivateDarkMode(), a("#default-check").prop("checked", !0), a("input[type=checkbox][name=theme]").prop("disabled", !1);
                                break;
                            case "dark":
                                a.App.activateDarkMode(), a("#dark-check").prop("checked", !0);
                        }
                        e._selectOptionsFromConfig();
                    }),
                    a("#resetBtn").on("click", function (t) {
                        t.preventDefault(),
                            a.App.resetLayout(function () {
                                e._selectOptionsFromConfig();
                            });
                    });
            }),
            (a.RightBar = new t()),
            (a.RightBar.Constructor = t);
    })(window.jQuery),
    (function (a) {
        "use strict";
        function t() {
            (this.body = a("body")), (this.window = a(window)), (this._config = {}), (this.defaultSelectedStyle = null);
        }
        var e = "default",
            o = "light",
            n = "dark",
            i = { sideBarTheme: e, isBoxed: !1, isCondensed: !1, isScrollable: !1, isDarkModeEnabled: !1 };
        (t.prototype._saveConfig = function (t) {
            a.extend(this._config, t);
        }),
            (t.prototype._getStoredConfig = function () {
                var t = i,
                    e = this.body.attr("data-layout-color");
                e && "dark" == e && (t.isDarkModeEnabled = !0), (t.sideBarTheme = this.body.attr("data-leftbar-theme")), "boxed" === this.body.attr("data-layout-mode") && (t.isBoxed = !0);
                var a = this.body.attr("data-leftbar-compact-mode");
                return "condensed" === a ? (t.isCondensed = !0) : "scrollable" === a && (t.isScrollable = !0), t;
            }),
            (t.prototype._applyConfig = function () {
                var t = this;
                switch (((this._config = this._getStoredConfig()), a.LeftSidebar.init(), t._config.sideBarTheme)) {
                    case n:
                        t.activateDarkSidebarTheme();
                        break;
                    case o:
                        t.activateLightSidebarTheme();
                        break;
                    case e:
                        t.activateDefaultSidebarTheme();
                }
                t._config.isDarkModeEnabled ? t.activateDarkMode() : t.deactivateDarkMode(),
                    t._config.isBoxed && t.activateBoxed(),
                    t._config.isCondensed && t.activateCondensedSidebar(),
                    t._config.isScrollable && t.activateScrollableSidebar();
            }),
            (t.prototype._adjustLayout = function () {
                var t;
                750 <= this.window.width() && this.window.width() <= 1028 ? this.activateCondensedSidebar(!0) : (t = this._getStoredConfig()).isCondensed || t.isScrollable || this.deactivateCondensedSidebar();
            }),
            (t.prototype.activateFluid = function () {
                this._saveConfig({ isBoxed: !1 }), this.body.attr("data-layout-mode", "fluid");
            }),
            (t.prototype.activateBoxed = function () {
                this._saveConfig({ isBoxed: !0 }), this.body.attr("data-layout-mode", "boxed");
            }),
            (t.prototype.activateCondensedSidebar = function (t) {
                t || this._saveConfig({ isCondensed: !0, isScrollable: !1 }), a.LeftSidebar.activateCondensedSidebar();
            }),
            (t.prototype.deactivateCondensedSidebar = function () {
                this._saveConfig({ isCondensed: !1 }), a.LeftSidebar.deactivateCondensedSidebar();
            }),
            (t.prototype.activateScrollableSidebar = function () {
                this._saveConfig({ isScrollable: !0, isCondensed: !1 }), a.LeftSidebar.activateScrollableSidebar();
            }),
            (t.prototype.deactivateScrollableSidebar = function () {
                this._saveConfig({ isScrollable: !1 }), a.LeftSidebar.deactivateScrollableSidebar();
            }),
            (t.prototype.activateDefaultSidebarTheme = function () {
                a.LeftSidebar.activateDefaultTheme(), this._saveConfig({ sideBarTheme: e });
            }),
            (t.prototype.activateLightSidebarTheme = function () {
                a.LeftSidebar.activateLightTheme(), this._saveConfig({ sideBarTheme: o });
            }),
            (t.prototype.activateDarkSidebarTheme = function () {
                a.LeftSidebar.activateDarkTheme(), this._saveConfig({ sideBarTheme: n });
            }),
            (t.prototype.activateDarkMode = function () {
                document.body.setAttribute("data-layout-color", "dark"),
                    "detached" === !this.body.attr("data-layout") ? (a.LeftSidebar.activateDarkTheme(), this._saveConfig({ isDarkModeEnabled: !0, sideBarTheme: n })) : this._saveConfig({ isDarkModeEnabled: !0 });
            }),
            (t.prototype.deactivateDarkMode = function () {
                document.body.setAttribute("data-layout-color", "light"), this._saveConfig({ isDarkModeEnabled: !1 });
            }),
            (t.prototype.clearSavedConfig = function () {
                this._config = i;
            }),
            (t.prototype.getConfig = function () {
                return this._config;
            }),
            (t.prototype.reset = function (t) {
                this.clearSavedConfig();
                var e = this;
                a("#main-style-container").length && (e.defaultSelectedStyle = a("#main-style-container").attr("href")), e.deactivateCondensedSidebar(), e.deactivateDarkMode(), e.activateDefaultSidebarTheme(), e.activateFluid(), t();
            }),
            (t.prototype.init = function () {
                var e = this;
                a("#main-style-container").length && (e.defaultSelectedStyle = a("#main-style-container").attr("href")),
                    this._applyConfig(),
                    this._adjustLayout(),
                    this.window.on("resize", function (t) {
                        t.preventDefault(), e._adjustLayout();
                    }),
                    a.Topbar.init();
            }),
            (a.LayoutThemeApp = new t()),
            (a.LayoutThemeApp.Constructor = t);
    })(window.jQuery),
    (function (n) {
        "use strict";
        function t() {
            (this.$body = n("body")), (this.$portletIdentifier = ".card"), (this.$portletCloser = '.card a[data-bs-toggle="remove"]'), (this.$portletRefresher = '.card a[data-bs-toggle="reload"]');
        }
        (t.prototype.init = function () {
            var o = this;
            n(document).on("click", this.$portletCloser, function (t) {
                t.preventDefault();
                var e = n(this).closest(o.$portletIdentifier),
                    a = e.parent();
                e.remove(), 0 == a.children().length && a.remove();
            }),
                n(document).on("click", this.$portletRefresher, function (t) {
                    t.preventDefault();
                    var e = n(this).closest(o.$portletIdentifier);
                    e.append('<div class="card-disabled"><div class="card-portlets-loader"></div></div>');
                    var a = e.find(".card-disabled");
                    setTimeout(function () {
                        a.fadeOut("fast", function () {
                            a.remove();
                        });
                    }, 500 + 5 * Math.random() * 300);
                });
        }),
            (n.Portlet = new t()),
            (n.Portlet.Constructor = t);
    })(window.jQuery),
    (function (i) {
        "use strict";
        function t() {
            (this.$body = i("body")), (this.$window = i(window));
        }
        (t.prototype.initSelect2 = function () {
            i('[data-toggle="select2"]').select2();
        }),
            (t.prototype.initMask = function () {
                i('[data-toggle="input-mask"]').each(function (t, e) {
                    var a = i(e).data("maskFormat"),
                        o = i(e).data("reverse");
                    null != o ? i(e).mask(a, { reverse: o }) : i(e).mask(a);
                });
            }),
            (t.prototype.initDateRange = function () {
                var o = { cancelClass: "btn-light", applyButtonClasses: "btn-success" };
                i('[data-toggle="date-picker"]').each(function (t, e) {
                    var a = i.extend({}, o, i(e).data());
                    i(e).daterangepicker(a);
                });
                var n = {
                    startDate: moment().subtract(29, "days"),
                    endDate: moment(),
                    ranges: {
                        Today: [moment(), moment()],
                        Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                        "Last 7 Days": [moment().subtract(6, "days"), moment()],
                        "Last 30 Days": [moment().subtract(29, "days"), moment()],
                        "This Month": [moment().startOf("month"), moment().endOf("month")],
                        "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
                    },
                };
                i('[data-toggle="date-picker-range"]').each(function (t, e) {
                    var a = i.extend({}, n, i(e).data()),
                        o = a.targetDisplay;
                    i(e).daterangepicker(a, function (t, e) {
                        o && i(o).html(t.format("MMMM D, YYYY") + " - " + e.format("MMMM D, YYYY"));
                    });
                });
            }),
            (t.prototype.initTimePicker = function () {
                var o = { showSeconds: !0, icons: { up: "mdi mdi-chevron-up", down: "mdi mdi-chevron-down" } };
                i('[data-toggle="timepicker"]').each(function (t, e) {
                    var a = i.extend({}, o, i(e).data());
                    i(e).timepicker(a);
                });
            }),
            (t.prototype.initTouchspin = function () {
                var o = {};
                i('[data-toggle="touchspin"]').each(function (t, e) {
                    var a = i.extend({}, o, i(e).data());
                    i(e).TouchSpin(a);
                });
            }),
            (t.prototype.initMaxlength = function () {
                var o = { warningClass: "badge bg-success", limitReachedClass: "badge bg-danger", separator: " out of ", preText: "You typed ", postText: " chars available.", placement: "bottom" };
                i('[data-toggle="maxlength"]').each(function (t, e) {
                    var a = i.extend({}, o, i(e).data());
                    i(e).maxlength(a);
                });
            }),
            (t.prototype.init = function () {
                this.initSelect2(), this.initMask(), this.initDateRange(), this.initTimePicker(), this.initTouchspin(), this.initMaxlength();
            }),
            (i.AdvanceFormApp = new t()),
            (i.AdvanceFormApp.Constructor = t);
    })(window.jQuery),
    (function (c) {
        "use strict";
        function t() {}
        (t.prototype.send = function (t, e, a, o, n, i, r, s) {
            var d = { heading: t, text: e, position: a, loaderBg: o, icon: n, hideAfter: (i = i || 3e3), stack: (r = r || 1) };
            (d.showHideTransition = s || "fade"), c.toast().reset("all"), c.toast(d);
        }),
            (c.NotificationApp = new t()),
            (c.NotificationApp.Constructor = t);
    })(window.jQuery),
    (function (a) {
        "use strict";
        function t() {}
        (t.prototype.initTooltipPlugin = function () {
            a.fn.tooltip && a('[data-toggle="tooltip"]').tooltip();
        }),
            (t.prototype.initPopoverPlugin = function () {
                a.fn.popover &&
                    a('[data-bs-toggle="popover"]').each(function (t, e) {
                        a(this).popover();
                    });
            }),
            (t.prototype.initToastPlugin = function () {
                a.fn.toast && a('[data-toggle="toast"]').toast();
            }),
            (t.prototype.initFormValidation = function () {
                a(".needs-validation").on("submit", function (t) {
                    return a(this).addClass("was-validated"), !1 !== a(this)[0].checkValidity() || (t.preventDefault(), t.stopPropagation(), !1);
                });
            }),
            (t.prototype.initShowHidePassword = function () {
                a("[data-password]").on("click", function () {
                    "false" == a(this).attr("data-password")
                        ? (a(this).siblings("input").attr("type", "text"), a(this).attr("data-password", "true"), a(this).addClass("show-password"))
                        : (a(this).siblings("input").attr("type", "password"), a(this).attr("data-password", "false"), a(this).removeClass("show-password"));
                });
            }),
            (t.prototype.initMultiDropdown = function () {
                a(".dropdown-menu a.dropdown-toggle").on("click", function () {
                    return a(this).next().hasClass("show") || a(this).parents(".dropdown-menu").first().find(".show").removeClass("show"), a(this).next(".dropdown-menu").toggleClass("show"), !1;
                });
            }),
            (t.prototype.initSyntaxHighlight = function () {
                a(document).ready(function (t) {
                    document.querySelectorAll("pre span.escape").forEach(function (t, e) {
                        for (var a = 1 / 0, o = (t.classList.contains("escape"), t.innerText).replace(/^\n/, "").trimRight().split("\n"), n = 0; n < o.length; n++) o[n].trim() && (a = Math.min(o[n].search(/\S/), a));
                        for (var i = [], n = 0; n < o.length; n++) i.push(o[n].replace(new RegExp("^ {" + a + "}", "g"), ""));
                        t.innerText = i.join("\n");
                    }),
                        document.querySelectorAll("pre span.escape").forEach(function (t) {
                            hljs.highlightBlock(t);
                        });
                });
            }),
            (t.prototype.init = function () {
                this.initTooltipPlugin(), this.initPopoverPlugin(), this.initToastPlugin(), this.initFormValidation(), this.initShowHidePassword(), this.initMultiDropdown(), this.initSyntaxHighlight();
            }),
            (a.Components = new t()),
            (a.Components.Constructor = t);
    })(window.jQuery),
    (function (n) {
        "use strict";
        function t() {
            (this.$body = n("body")), (this.$window = n(window));
        }
        (t.prototype.activateDefaultSidebarTheme = function () {
            n.LayoutThemeApp.activateDefaultSidebarTheme();
        }),
            (t.prototype.activateLightSidebarTheme = function () {
                n.LayoutThemeApp.activateLightSidebarTheme();
            }),
            (t.prototype.activateDarkSidebarTheme = function () {
                n.LayoutThemeApp.activateDarkSidebarTheme();
            }),
            (t.prototype.activateCondensedSidebar = function () {
                n.LayoutThemeApp.activateCondensedSidebar();
            }),
            (t.prototype.deactivateCondensedSidebar = function () {
                n.LayoutThemeApp.deactivateCondensedSidebar();
            }),
            (t.prototype.activateScrollableSidebar = function () {
                n.LayoutThemeApp.activateScrollableSidebar();
            }),
            (t.prototype.deactivateScrollableSidebar = function () {
                n.LayoutThemeApp.deactivateScrollableSidebar();
            }),
            (t.prototype.activateBoxed = function () {
                n.LayoutThemeApp.activateBoxed();
            }),
            (t.prototype.activateFluid = function () {
                n.LayoutThemeApp.activateFluid();
            }),
            (t.prototype.activateDarkMode = function () {
                n.LayoutThemeApp.activateDarkMode();
            }),
            (t.prototype.deactivateDarkMode = function () {
                n.LayoutThemeApp.deactivateDarkMode();
            }),
            (t.prototype.clearSavedConfig = function () {
                n.LayoutThemeApp.clearSavedConfig();
            }),
            (t.prototype.getLayoutConfig = function () {
                return n.LayoutThemeApp.getConfig();
            }),
            (t.prototype.resetLayout = function (t) {
                n.LayoutThemeApp.reset(t);
            }),
            (t.prototype.init = function () {
                n.LayoutThemeApp.init(),
                    setTimeout(function () {
                        document.body.classList.remove("loading"), n("[autofocus]").trigger("focus");
                    }, 400),
                    n.RightBar.init();
                var t = this.$body.data("layoutConfig");
                window.sessionStorage &&
                    t &&
                    t.hasOwnProperty("showRightSidebarOnStart") &&
                    t.showRightSidebarOnStart &&
                    (sessionStorage.getItem("AlienCodes!") || (n.RightBar.toggleRightSideBar(), sessionStorage.setItem("AlienCodes!", !0))),
                    n.Portlet.init(),
                    n.AdvanceFormApp.init(),
                    n.Components.init(),
                    n(window).on("load", function () {
                        n("#status").fadeOut(), n("#preloader").delay(350).fadeOut("slow");
                    });
                [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function (t) {
                    return new bootstrap.Popover(t);
                }),
                    [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (t) {
                        return new bootstrap.Tooltip(t, { trigger: "hover" });
                    }),
                    [].slice.call(document.querySelectorAll(".offcanvas")).map(function (t) {
                        return new bootstrap.Offcanvas(t);
                    });
                var e = document.getElementById("toastPlacement");
                e &&
                    document.getElementById("selectToastPlacement").addEventListener("change", function () {
                        e.dataset.originalClass || (e.dataset.originalClass = e.className), (e.className = e.dataset.originalClass + " " + this.value);
                    });
                [].slice.call(document.querySelectorAll(".toast")).map(function (t) {
                    return new bootstrap.Toast(t);
                });
                var o = document.getElementById("liveAlertPlaceholder"),
                    a = document.getElementById("liveAlertBtn");
                a &&
                    a.addEventListener("click", function () {
                        var t, e, a;
                        (t = "Nice, you triggered this alert message!"),
                            (e = "success"),
                            ((a = document.createElement("div")).innerHTML =
                                '<div class="alert alert-' + e + ' alert-dismissible" role="alert">' + t + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'),
                            o.append(a);
                    }),
                    document.getElementById("app-style").href.includes("rtl.min.css") && (document.getElementsByTagName("html")[0].dir = "rtl");
            }),
            (n.App = new t()),
            (n.App.Constructor = t);
    })(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.App.init();
    })();
//# sourceMappingURL=app.min.js.map
