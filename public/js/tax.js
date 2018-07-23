$(function () {
    var e = {
        cacheElements: function () {
            this.getCalcuateTaxId = $("#calculate-tax"), this.getResetFormId = $("#reset"), this.getYear = $("#year"), this.getCategory = $("#category"), this.getAmount = $("#income"), this.getHra = $("#hra"), this.getSection80g = $("#section80g"), this.getNumeric = $(".allow-numeric")
        }, bindEvents: function () {
            this.getCalcuateTaxId.on("click", this.calculateTax.bind(this)), this.getResetFormId.on("click", this.resetForm.bind(this)), this.getNumeric.on("keypress", this.acceptNumeric.bind(this))
        }, resetForm: function () {
            $("input").val(""), $("#tax_msg").html("")
        }, calculateTax: function () {
            var e = this.getYear.val();
            if (void 0 === t.others[e])return alert("Assessment year cannot be empty"), !1;
            var a = this.getCategory.val(), i = parseInt(this.getAmount.val()), n = this.getHra.val() ? parseInt(this.getHra.val()) : 0, s = this.validateField("ta", e), r = this.validateField("medical", e), l = this.validateField("homeloan", e), c = this.validateField("educationloan", e), o = this.validateField("section80c", e), h = this.validateField("section80ccd", e), d = this.getSection80g.val() ? parseInt(this.getSection80g.val()) : 0, u = parseInt(.1 * i);
            d >= u && (d = u), i -= n + s + r + l + c + o + h + d;
            var v = t.slab[e][a], g = 0;
            $.each(v, function (a, n) {
                var s = "";
                if (0 == a && i <= parseInt(n)); else {
                    var r = n.split("-");
                    0 != a && 1 == r.length && i > r[0] ? (s = i - r[0], g += s * parseInt(a) / 100) : r.length >= 2 && parseInt(r[1]) <= i ? (tax = parseInt(r[1] - r[0] + 1) * parseInt(a) / 100, g += tax) : r.length >= 2 && i <= parseInt(r[1]) && i >= parseInt(r[0]) && (s = i - (r[0] - 1), g += s * parseInt(a) / 100, 5e5 > i && "18-19" != e && (g -= parseInt(t.others[e].rebate)), i > 25e4 && 3e5 > i && "18-19" == e && (g -= parseInt(2500)), i > 25e4 && 35e4 > i && "18-19" == e && (g -= parseInt(5e3)))
                }
            }), i > 5e6 && 1e7 > i && "18-19" == e && (g += 10 * g / 100), i > 1e7 && (g += "16-17" != e ? 15 * g / 100 : 12 * g / 100);
            var m = 3 * g / 100, p = g + m;
            0 >= p && (p = 0), p = this.numberFormat(p.toFixed(2)), this.displayCalculatedTax(p)
        }, validateField: function (e, a) {
            var i = $("#" + e), n = i.val() ? parseInt(i.val()) : 0;
            return n > t.others[a][e] && (n = t.others[a][e]), n
        }, displayCalculatedTax: function (e) {
            var t = '<div class="alert alert-success"> Total Taxable Payable: <b>' + e + "</b></div>";
            $("#show-tax").html(t)
        }, numberFormat: function (e) {
            var t = e;
            t = t.toString();
            var a = "";
            t.indexOf(".") > 0 && (a = t.substring(t.indexOf("."), t.length)), t = Math.floor(t), t = t.toString();
            var i = t.substring(t.length - 3), n = t.substring(0, t.length - 3);
            return "" != n && (i = "," + i), n.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + i + a
        }, acceptNumeric: function (e) {
            var t, a;
            if (window.event) t = window.event.keyCode; else {
                if (!e)return !0;
                t = e.which
            }
            return 46 == t ? !1 : null == t || 0 == t || 8 == t || 13 == t || 27 == t || 46 == t ? !0 : (a = String.fromCharCode(t), /\d/.test(a) ? (window.status = "", !0) : (alert("Please enter numeric values only."), !1))
        }, init: function () {
            this.cacheElements(), this.bindEvents()
        }
    }, t = {
        slab: {
            "16-17": {
                male: {0: "250000", 10: "250001-500000", 20: "500001-1000000", 30: "1000000"},
                female: {0: "250000", 10: "250001-500000", 20: "500001-1000000", 30: "1000000"},
                senior: {0: "300000", 10: "300001-500000", 20: "500001-1000000", 30: "1000000"},
                vsenior: {0: "500000", 20: "500001-1000000", 30: "1000000"}
            },
            "17-18": {
                male: {0: "250000", 10: "250001-500000", 20: "500001-1000000", 30: "1000000"},
                female: {0: "250000", 10: "250001-500000", 20: "500001-1000000", 30: "1000000"},
                senior: {0: "300000", 10: "300001-500000", 20: "500001-1000000", 30: "1000000"},
                vsenior: {0: "500000", 20: "500001-1000000", 30: "1000000"}
            },
            "18-19": {
                male: {0: "250000", 5: "250001-500000", 20: "500001-1000000", 30: "1000000"},
                female: {0: "250000", 5: "250001-500000", 20: "500001-1000000", 30: "1000000"},
                senior: {0: "300000", 5: "300001-500000", 20: "500001-1000000", 30: "1000000"},
                vsenior: {0: "500000", 20: "500001-1000000", 30: "1000000"}
            }
        },
        others: {
            "16-17": {ta: 19200, medical: 45e3, homeloan: 2e5, section80c: 15e4, section80ccd: 5e4, rebate: 2e3},
            "17-18": {ta: 19200, medical: 85e3, homeloan: 2e5, section80c: 15e4, section80ccd: 5e4, rebate: 5e3},
            "18-19": {ta: 19200, medical: 85e3, homeloan: 2e5, section80c: 15e4, section80ccd: 5e4, rebate: 2500}
        }
    };
    e.init()
});