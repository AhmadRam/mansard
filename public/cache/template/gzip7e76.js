var JFormValidator = function() {
    "use strict";

    function n(t, e, a) { a = "" === a || a, s[t] = { enabled: a, exec: e } }

    function i(t, e) {
        var a, r, n, i, l = e.data("label");
        void 0 === l && (a = e.attr("id"), r = e.get(0).form, i = jQuery(r), l = !!a && ((n = i.find("#" + a + "-lbl")).length ? n : !!(n = i.find('label[for="' + a + '"]')).length && n), e.data("label", l)), !1 === t ? (e.addClass("invalid").attr("aria-invalid", "true"), l && l.addClass("invalid")) : (e.removeClass("invalid").attr("aria-invalid", "false"), l && l.removeClass("invalid"))
    }

    function o(t) {
        var e, a = jQuery(t);
        if (a.attr("disabled")) return i(!0, a), !0;
        if (a.attr("required") || a.hasClass("required"))
            if ("fieldset" === a.prop("tagName").toLowerCase() && (a.hasClass("radio") || a.hasClass("checkboxes"))) { if (!a.find("input:checked").length) return i(!1, a), !1 } else if (!a.val() || a.hasClass("placeholder") || "checkbox" === a.attr("type") && !a.is(":checked")) return i(!1, a), !1;
        if (e = a.attr("class") && a.attr("class").match(/validate-([a-zA-Z0-9\_\-]+)/) ? a.attr("class").match(/validate-([a-zA-Z0-9\_\-]+)/)[1] : "", a.attr("pattern") && "" != a.attr("pattern")) { if (a.val().length) { var r = new RegExp("^" + a.attr("pattern") + "$").test(a.val()); return i(r, a), r } return a.attr("required") || a.hasClass("required") ? (i(!1, a), !1) : (i(!0, a), !0) }
        return "" === e ? (i(!0, a), !0) : e && "none" !== e && s[e] && a.val() && !0 !== s[e].exec(a.val(), a) ? (i(!1, a), !1) : (i(!0, a), !0)
    }

    function u(t) {
        var e, a, r, n, i, l, s = !0,
            u = [];
        for (i = 0, l = (e = jQuery(t).find("input, textarea, select, fieldset")).length; i < l; i++) jQuery(e[i]).hasClass("novalidate") || !1 === o(e[i]) && (s = !1, u.push(e[i]));
        if (jQuery.each(c, function(t, e) {!0 !== e.exec() && (s = !1) }), !s && 0 < u.length) {
            for (a = Joomla.JText._("JLIB_FORM_FIELD_INVALID"), r = { error: [] }, i = u.length - 1; 0 <= i; i--)(n = jQuery(u[i]).data("label")) && r.error.push(a + n.text().replace("*", ""));
            Joomla.renderMessages(r)
        }
        return s
    }

    function l(t) {
        for (var e, a = [], r = jQuery(t), n = 0, i = (e = r.find("input, textarea, select, fieldset, button")).length; n < i; n++) {
            var l = jQuery(e[n]),
                s = l.prop("tagName").toLowerCase();
            "input" !== s && "button" !== s || "submit" !== l.attr("type") && "image" !== l.attr("type") ? "button" === s || "input" === s && "button" === l.attr("type") || (l.hasClass("required") && l.attr("aria-required", "true").attr("required", "required"), "fieldset" !== s && (l.on("blur", function() { return o(this) }), l.hasClass("validate-email") && d && e[n].setAttribute("type", "email")), a.push(l)) : l.hasClass("validate") && l.on("click", function() { return u(t) })
        }
        r.data("inputfields", a)
    }
    var s, d, c;
    return function() {
        var t;
        s = {}, c = c || {}, (t = document.createElement("input")).setAttribute("type", "email"), d = "text" !== t.type, n("username", function(t, e) { return !new RegExp("[<|>|\"|'|%|;|(|)|&]", "i").test(t) }), n("password", function(t, e) { return /^\S[\S ]{2,98}\S$/.test(t) }), n("numeric", function(t, e) { return /^(\d|-)?(\d|,)*\.?\d*$/.test(t) }), n("email", function(t, e) { t = punycode.toASCII(t); return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(t) });
        for (var e = jQuery("form.form-validate"), a = 0, r = e.length; a < r; a++) l(e[a])
    }(), { isValid: u, validate: o, setHandler: n, attachToForm: l, custom: c }
};
document.formvalidator = null, jQuery(function() { document.formvalidator = new JFormValidator });