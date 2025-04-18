/*!
 DataTables Bootstrap 4 integration
 ©2011-2017 SpryMedia Ltd - datatables.net/license
*/
(function (c) { "function" === typeof define && define.amd ? define(["jquery", "datatables.net"], function (a) { return c(a, window, document) }) : "object" === typeof exports ? module.exports = function (a, d) { a || (a = window); if (!d || !d.fn.dataTable) d = require("datatables.net")(a, d).$; return c(d, a, a.document) } : c(jQuery, window, document) })(function (c, a, d, m) {
    var f = c.fn.dataTable; c.extend(!0, f.defaults, {
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        renderer: "bootstrap"
    }); c.extend(f.ext.classes, { sWrapper: "dataTables_wrapper dt-bootstrap4", sFilterInput: "form-control form-control-sm", sLengthSelect: "custom-select custom-select-sm form-control form-control-sm", sProcessing: "dataTables_processing card", sPageButton: "paginate_button page-item" }); f.ext.renderer.pageButton.bootstrap = function (a, h, r, s, j, n) {
        var o = new f.Api(a), t = a.oClasses, k = a.oLanguage.oPaginate, u = a.oLanguage.oAria.paginate || {}, e, g, p = 0, q = function (d, f) {
            var l, h, i, b, m = function (a) {
                a.preventDefault();
                !c(a.currentTarget).hasClass("disabled") && o.page() != a.data.action && o.page(a.data.action).draw("page")
            }; l = 0; for (h = f.length; l < h; l++)if (b = f[l], Array.isArray(b)) q(d, b); else {
                g = e = ""; switch (b) { case "ellipsis": e = "&#x2026;"; g = "disabled"; break; case "first": e = k.sFirst; g = b + (0 < j ? "" : " disabled"); break; case "previous": e = k.sPrevious; g = b + (0 < j ? "" : " disabled"); break; case "next": e = k.sNext; g = b + (j < n - 1 ? "" : " disabled"); break; case "last": e = k.sLast; g = b + (j < n - 1 ? "" : " disabled"); break; default: e = b + 1, g = j === b ? "active" : "" }e && (i = c("<li>",
                    { "class": t.sPageButton + " " + g, id: 0 === r && "string" === typeof b ? a.sTableId + "_" + b : null }).append(c("<a>", { href: "#", "aria-controls": a.sTableId, "aria-label": u[b], "data-dt-idx": p, tabindex: a.iTabIndex, "class": "page-link" }).html(e)).appendTo(d), a.oApi._fnBindAction(i, { action: b }, m), p++)
            }
        }, i; try { i = c(h).find(d.activeElement).data("dt-idx") } catch (v) { } q(c(h).empty().html('<ul class="pagination"/>').children("ul"), s); i !== m && c(h).find("[data-dt-idx=" + i + "]").trigger("focus")
    }; return f
});
